<x-app-layout>
    <x-slot name="hero">
        <img class="h-40 md:h-56 overflow-hidden lg:h-72 w-full object-cover" src="{{asset('storage/assets/blog.jpg')}}" alt="TripleB">
    </x-slot>

    <div class="mb-8">
        <div class="w-full">
            <div class="text-lg text-orange-500 font-black uppercase pb-2">Our Featured Post</div>

            <div class="grid w-full grid-cols-1 gap-10">
                @foreach ($featuredPosts as $post)
                    <x-card-post :post="$post" class="col-span-3 md:col-span-1" />
                @endforeach
            </div>

            <div class="pt-2 flex justify-end items-center">
                <x-nav-link href="#">More Posts</x-nav-link>
            </div>
        </div>
    </div>

    <div class="mb-8">
        <div class="w-full">
            <div class="text-lg text-orange-500 font-black uppercase pb-2">Our Latest Post</div>

            <div class="grid w-full grid-cols-3 gap-10">
                @foreach ($latestPosts as $post)
                    <x-card-post :post="$post" class="col-span-3 md:col-span-1" />
                @endforeach
            </div>
            <div class="pt-2 flex justify-end items-center">
                <x-nav-link href="#">More Posts</x-nav-link>
            </div>
        </div>
    </div>


</x-app-layout>
