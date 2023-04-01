<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'category' => 'required|exists:categories,category_id',
            'image' => 'required|image|mimes:jpg,png,raw,tiff,jpeg,gif,webp,svg',
        ]);
        $response = cloudinary()->upload($request->file('image')->getRealPath(), [
            'folder' => 'new-post'
        ]);
        Post::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category,
            'uuid' => Str::uuid(),
            'title' => $request->title,
            'content' => $request->description,
            'image_public_id' => $response->getPublicId(),
            'image_url' => $response->getSecurePath(),
        ]);

        return Redirect::route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($uuid)
    {
        $posts = Post::where('uuid', $uuid)->get();
        return view('post.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($uuid): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $posts = Post::where('uuid', $uuid)->get();
        $categories = Category::all();
        return view('post.edit', compact('posts', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $uuid): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'category' => 'required|exists:categories,category_id',
//            'image' => 'required|mimes:jpg,png,raw,tiff,jpeg,gif,webp,svg',
        ]);
        if (filled($request->file('image'))){
            foreach (Post::where('uuid', $uuid)->get('image_public_id') as $image)
                Cloudinary::destroy($image->image_public_id);
            $response = cloudinary()->upload($request->file('image')->getRealPath(), [
                'folder' => 'new-post'
            ]);
            Post::where('uuid', $uuid)->update([
                'category_id' => $request->category,
                'title' => $request->title,
                'content' => $request->description,
                'image_public_id' => $response->getPublicId(),
                'image_url' => $response->getSecurePath(),
            ]);
            return Redirect::route('post.index');
        }
        Post::where('uuid', $uuid)->update([
            'category_id' => $request->category,
            'title' => $request->title,
            'content' => $request->description,
            'updated_at' => now()
        ]);
        return Redirect::route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($uuid): \Illuminate\Http\RedirectResponse
    {
        foreach (Post::where('uuid', $uuid)->get('image_public_id') as $image)
            Cloudinary::destroy($image->image_public_id);
        Post::where('uuid', $uuid)->delete();
        return Redirect::route('post.index');
    }
}
