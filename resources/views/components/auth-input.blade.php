<div {{ $attributes->class('flex flex-col items-center justify-start')->merge() }}>
    <input type="{{ $type }}" name="{{ $name }}"
        @isset($placeholder)
            placeholder="{{ $placeholder }}"
        @endisset
        @isset($required)
            required="{{ $required }}"
        @endisset
        @isset($accept)
            accept="{{ $accept }}"
        @endisset
        class="h-full w-full
        @isset($color)
        {{ $color }}
        @else
        bg-neutral-800 border-0 text-white
        @endisset
        rounded-lg pl-4 pr-3 py-4 font-normal text-base outline-none ring-transparent placeholder:text-neutral-500">

    @isset($error)
        <p class="w-full p-1 text-left font-normal text-base text-orange-400">{{ $error }}</p>
    @endisset
</div>
