<x-app-layout>
    <section class="max-w-3xl mx-auto bg-white p-16 rounded mt-5">
        @foreach($posts as $post)
        <form action="{{ route('post.update', $post->uuid) }}" method="post" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <h3 class="font-semibold text-lg mb-9">
                Update your post
            </h3>
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="title" id="title" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       value="{{ old('title', $post->title) }}" placeholder=" "
                       autocomplete="title"
                       required
                />
                <label for="title" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Title</label>
                @error('title')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!
                    </span> {{ $message }}
                </p>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="description" id="description" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       value="{{ old('description', $post->content) }}" placeholder=" "
                       autocomplete="description"
                       required/>
                <label for="description" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Content</label>
                @error('description')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                    {{ $message }}</p>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <label for="category" class="peer-focus:font-medium text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Category</label>
                <select
{{--                    required --}}
                    name="category"
                    id="category"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                    <option >Select</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->category_id }}" selected="{{ old('category', $post->category->category_id) === $category->category_id }}">{{ $category->category }}</option>
                    @endforeach
                </select>
                @error('category')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                    {{ $message }}</p>
                @enderror
            </div>
            <img src="{{ $post->image_url }}" alt="image not found">
            <div class="relative z-0 w-full mb-6 group">
                <label for="image" class="text-sm text-gray-500">
                    Post</label>
                <input type="file" name="image" id="image" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       value="{{ old('image', $post->image_url) }}" placeholder=" "
{{--                       required--}}
                       accept=".jpg, .png, .jpeg, .gif, .webp, .svg"
                />
                @error('image')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                    {{ $message }}</p>
                @enderror

            </div>

            <button type="submit" class="text-white bg-yellow-500 hover:bg-yellow-700 duration-300 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center inline-flex items-center">
                Update
            </button>
        </form>
        @endforeach
    </section>
</x-app-layout>
