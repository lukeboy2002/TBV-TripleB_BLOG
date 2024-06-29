@props(['post'])
<article {{ $attributes->merge(['class' => 'flex flex-col bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700']) }}>
    <div class="relative">
        <a wire:navigate href="#">
            <img class="mx-auto h-52 w-full object-cover rounded-t-lg" src="{{ asset($post->getImage() )}}" alt="{{ $post->title }}">
        </a>
        <div class="absolute bg-orange-500 block h-16 mr-4 right-0 text-center text-lg text-white top-0 w-16">
            <p class="text-3xl font-extrabold">{{ $post->published_at->format('d') }}</p>
            <p class="text-sm">{{ $post->published_at->format('M') }}</p>
        </div>
    </div>
    <div class="p-3">
        <div class="flex justify-between items-center mb-2 text-xs text-gray-500">
            <div class="flex">
                <div class="flex items-center text-gray-700 dark:text-white">
                    <x-heroicon-o-user-circle class="size-5 mr-2" />{{ $post->user->username }}
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
        <div class="flex justify-end items-center">
            <x-link-default href="#">
                <x-heroicon-s-arrow-right-circle class="size-4 mr-2" />Read more
            </x-link-default>
        </div>

    </div>
</article>
