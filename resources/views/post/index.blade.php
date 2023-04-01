<x-app-layout>
    <div class="max-w-7xl mx-auto">
        <div class="text-right max-w-xl mx-auto my-7">
            <a href="{{ route('post.create') }}" class="text-white bg-blue-500 hover:bg-blue-700 duration-300 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-md px-9 py-3 text-center inline-flex items-center">
                New Post
            </a>
        </div>
        @include('post.partials.post-item')
    </div>
</x-app-layout>

