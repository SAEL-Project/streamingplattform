<div class="w-full h-full flex flex-col items-center justify-start">
    <a href="{{ route('watch', $movie->id) }}"
        class="w-full h-full flex flex-col items-center justify-start cursor-pointer">
        <img class="w-full aspect-video rounded-lg bg-stone-700 text-white object-cover"
            src="{{ $movie->relativeThumbnailURL() }}" alt="thumbnail" style="box-shadow: 0 4px 7px rgb(0 0 0 / 25%);" />
    </a>
    <div class="w-full px-2 flex flex-row items-center justify-start">
        <h5 class="mr-auto text-left text-lg font-bold text-black mt-1 text-ellipsis whitespace-nowrap overflow-hidden">
            {{ $movie->title }}
        </h5>
        @can('manage content')
            <a href="{{ route('movies/edit', $movie->id) }}" class="text-stone-700 hover:text-stone-800 mr-2">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <a href="{{ route('movies/delete', $movie->id) }}" class="text-red-500 hover:text-red-600">
                <i class="fa-solid fa-trash"></i>
            </a>
        @endcan
    </div>
    <p class="w-full px-2 text-left text-sm font-normal text-stone-700 text-ellipsis whitespace-nowrap overflow-hidden">
        {{ $movie->description }}
    </p>
</div>
