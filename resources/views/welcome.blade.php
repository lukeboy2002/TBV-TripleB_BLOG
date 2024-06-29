<x-app-layout>
    <x-slot name="hero">
        <img src="{{asset('storage/assets/blog.jpg')}}" alt="Background Image" class="absolute inset-0 w-full h-40 md:h-56 lg:h-72 object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-50 h-40 md:h-56 lg:h-72"></div>
        <div class="absolute inset-0 flex flex-col items-center justify-center h-40 md:h-56 lg:h-72">
            <h1 class="text-4xl text-white font-bold">TBV-TripleB</h1>
        </div>
    </x-slot>

    <div class="mb-8">
        <div class="w-full">
            <div class="text-lg text-orange-500 font-black uppercase pb-2">Our Featured Post</div>

            <div class="grid w-full grid-cols-1 gap-10">
                @foreach ($featuredPosts as $post)
                    <x-post-card :post="$post" class="col-span-3 md:col-span-1" />
                @endforeach
            </div>

            <div class="pt-2 flex justify-end items-center">
                <x-nav-link href="{{ route('posts.index') }}">More Posts</x-nav-link>
            </div>
        </div>
    </div>

    <div class="mb-8">
        <div class="w-full">
            <div class="text-lg text-orange-500 font-black uppercase pb-2">Our Latest Post</div>

            <div class="grid w-full grid-cols-3 gap-10">
                @foreach ($latestPosts as $post)
                    <x-post-card :post="$post" class="col-span-3 md:col-span-1" />
                @endforeach
            </div>
            <div class="pt-2 flex justify-end items-center">
                <x-nav-link href="{{ route('posts.index') }}">More Posts</x-nav-link>
            </div>
        </div>
    </div>


</x-app-layout>
