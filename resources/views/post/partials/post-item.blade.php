<div class="flex gap-5">
    @foreach( $posts as $post)
    <a href="{{ route('post.show', $post->uuid) }}">
        <section class="mx-auto">
            <div class="max-w-lg mx-auto">
                <div class="bg-gray-500 shadow-md border border-gray-200 rounded-lg max-w-sm mb-5">
                    <img class="t-lg rounded-lg object-cover object-center w-sm" src="{{ $post->image_url }}" alt="" width="300">
                    <div class="p-5">
                        <h5 class="text-white font-bold text-2xl tracking-tight mb-2">{{ $post->title }}</h5>
                        <p class="font-normal text-white mb-3">{{ $post->content }}</p>
                        <div class="mb-3">
                                <ul class="flex flex-wrap text-xs font-medium -m-1">
                                    <li class="m-1 self-center">
                                        <p class="inline-flex text-center text-black py-1 px-3 rounded-full bg-white hover:bg-blue-600 transition duration-150 ease-in-out">
                                            {{$post->category->category}}</p>
                                    </li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </a>
    @endforeach
</div>
