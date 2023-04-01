<x-app-layout>
    <!-- Snippet -->
    @foreach( $posts as $post)
        <section class="flex flex-col justify-center antialiased bg-gray-100 text-gray-700 min-h-screen">
            <div class="max-w-6xl mx-auto p-4 sm:px-6 h-full">
                <!-- Blog post -->

                <article
                    class="max-w-sm mx-auto md:max-w-none grid md:grid-cols-2 gap-6 md:gap-8 lg:gap-12 xl:gap-16 items-center">
                    <div class="relative block group">
    
                        <img src="{{ $post->image_url }}" alt="Blog post">
                        {{-- </figure>--}}
                    </div>
                    <div>
                        <header>
                            <div class="mb-3">
                                <ul class="flex flex-wrap text-xs font-medium -m-1">
                                    <li class="m-1 text-lg self-center">
                                        Category:
                                    </li>
                                    <li class="m-1 self-center">
                                        <p class="inline-flex text-center text-gray-100 py-1 px-3 rounded-full bg-blue-500 hover:bg-blue-600 transition duration-150 ease-in-out">
                                            {{$post->category->category}}</p>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="text-2xl lg:text-3xl font-bold leading-tight mb-2">
                                {{ $post->title }}
                            </h3>
                        </header>
                        <p class="text-lg text-gray-500 flex-grow">{{ $post->content }}</p>
                        <p class="text-md text-gray-500 flex-grow">Updated at: {{ $post->updated_at }}</p>
                        <p class="text-md text-gray-500 flex-grow">Author: {{ $post->user->name }}</p>

                        @if(Auth::user() && Auth::user()->id === $post->user->id)
                            <div class="flex gap-3 mt-7">
                                <a class="text-white bg-yellow-500 hover:bg-yellow-700 duration-300 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center"
                                   href="{{ route('post.edit', $post->uuid) }}">
                                    Edit
                                </a>
                                <form
                                    action="{{ route('post.destroy', $post->uuid) }}"
                                    method="post" enctype="multipart/form-data">
                                    @method('delete')
                                    @csrf
                                    <button type="submit"
                                            class="text-white bg-red-500 hover:bg-red-700 duration-300 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </article>

            </div>
        </section>
    @endforeach
</x-app-layout>
