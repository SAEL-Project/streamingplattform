<div class="w-full flex flex-col items-center justify-start">
    <div class="w-full flex flex-row items-center justify-start text-black border-b-[1px] border-b-stone-400">
        <h4 class="text-left text-2xl font-bold">
            {{ $category->name }}
        </h4>
        @can('manage content')
            <a href="{{ route('categories/create') }}" class="ml-6 text-right text-base font-light text-stone-700">
                <i class="fa-solid fa-plus"></i>
            </a>
            <a href="{{ route('categories/edit', $category->id) }}"
                class="ml-2 text-right text-base font-light text-stone-700">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <a href="{{ route('categories/delete', $category->id) }}"
                class="ml-2 text-right text-base font-light text-red-500">
                <i class="fa-solid fa-trash"></i>
            </a>
        @endcan
    </div>
    <ul class="w-full min-h-[12rem] h-auto flex flex-row flex-wrap gap-3 items-center justify-star mt-4">
        @can('manage content')
            <li class="w-64 h-48">
                <x-movie-create-card :category="$category"></x-movie-create-card>
            </li>
        @endcan
        @foreach ($category->movies()->get() as $movie)
            <li class="w-64 h-48">
                <x-movie-card :movie="$movie"></x-movie-card>
            </li>
        @endforeach
    </ul>
</div>
