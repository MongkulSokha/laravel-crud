<div class="flex gap-5">
    @foreach( $posts as $post)
    <a href="{{ route('post.show', $post->uuid) }}">
        <section class="mx-auto">
            <div class="max-w-lg mx-auto">
                <div class="bg-white shadow-md border border-gray-200 lg max-w-sm mb-5">
                    <img class="t-lg object-cover object-center w-sm" src="{{ $post->image_url }}" alt="" width="300">
                    <div class="p-5">
                        <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2">{{ $post->title }}</h5>
                        <p class="font-normal text-gray-700 mb-3">{{ $post->content }}</p>
                    </div>
                </div>
            </div>
        </section>
    </a>
    @endforeach
</div>
