<x-app-layout>
    <x-slot name="hero">
        <img class="absolute inset-0 w-full h-40 md:h-56 lg:h-72 object-cover" src="{{asset('storage/assets/blog.jpg')}}" alt="Blog">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="absolute inset-0 flex flex-col items-center justify-center">
            <h1 class="text-4xl text-white font-bold">TBV-TripleB Blog</h1>
        </div>
    </x-slot>

    <div>
        <div class="flex justify-end space-x-4 pb-4">
            <a href="" class="text-gray-700 dark:text-white hover:text-orange-500 dark:hover:text-orange-500 hover:underline dark:hover:underline focus:outline-none focus:text-orange-500 dark:focus:text-orange-500 focus:underline dark:focus:underline">Latest</a>
            <a href="" class="text-gray-700 dark:text-white hover:text-orange-500 dark:hover:text-orange-500 hover:underline dark:hover:underline focus:outline-none focus:text-orange-500 dark:focus:text-orange-500 focus:underline dark:focus:underline">Oldest</a>
        </div>
        @foreach($posts as $post)
            <x-post-item :post="$post" />
        @endforeach
    <x-slot name="side">
        To be continued
    </x-slot>
</x-app-layout>
