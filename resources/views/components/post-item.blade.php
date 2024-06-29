<x-article class="flex justify-between w-full mb-4 last-of-type:mb-0">
    <div class="w-1/3">
        <div class="relative">
            <a wire:navigate href="#">
                <img class="h-auto w-full object-cover rounded-tl-lg" src="{{ asset($post->getImage() )}}" alt="{{ $post->title }}">
            </a>
            <div class="absolute bg-orange-500 block h-20 w-20 left-0 text-center text-lg text-white top-0 rounded-tl-lg rounded-br-lg">
                <p class="text-3xl font-extrabold">{{ $post->published_at->format('d') }}</p>
                <p class="text-sm">{{ $post->published_at->format('M') }}</p>
                <p class="text-sm">{{ $post->published_at->format('Y') }}</p>
            </div>
        </div>
    </div>
    <div class="w-2/3 p-3">
        <div class="flex justify-between items-center mb-2 text-xs text-gray-500">
            <div class="flex">
                <div class="flex items-center text-gray-700 dark:text-white">

                    <x-heroicon-o-user-circle class="size-5 mr-2" />{{ $post->author->username }}
                </div>
            </div>
            <div class="flex items-center">
                @foreach($post->categories as $category)
                    <x-badge wire:navigate href="#" :Color="$category->color">{{ $category->title }}</x-badge>
                @endforeach
            </div>
        </div>

        <div class="mb-4">
            <a wire:navigate href="#" class="font-bold text-2xl text-gray-900 dark:text-white hover:text-orange-500 dark:hover:text-orange-500 focus:outline-none focus:text-orange-500 dark:focus:text-orange-500 transition duration-150 ease-in-out">
                {{ $post->title }}
            </a>
        </div>
        <div class="mb-4 flex flex-wrap font-normal text-gray-700 dark:text-gray-400">
            {!! $post->shortBody() !!}
        </div>
        <div class="flex justify-between items-center">
            <div class="flex space-x-2 items-center">
                <div class="flex items-center text-green-500"><x-heroicon-o-hand-thumb-up class="size-5 mr-2" /> 1</div>
                <div class="flex items-center text-red-500"><x-heroicon-o-hand-thumb-down class="size-5 mr-2" />2</div>
                <div class="flex items-center text-gray-700 dark:text-white"><x-heroicon-o-chat-bubble-left-right class="size-5 mr-2" />{{ $post->comments->count() }}</div>
                <div class="flex items-center text-gray-700 dark:text-white"><x-heroicon-o-book-open class="size-5 mr-2" />{{ $post->getReadingTime() }} min</div>
            </div>
            <x-link-default href="#">
                <x-heroicon-s-arrow-right-circle class="size-4 mr-2" />Read more
            </x-link-default>
        </div>
    </div>
</x-article>
