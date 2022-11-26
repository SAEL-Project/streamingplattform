@extends('layouts.app')

@section('head')
    <title>{{ config('app.name') }} × Entdecken</title>
@endsection

@section('body')
    <x-navbar class="fixed" />
    <x-body class="absolute top-[54px]">
        <ul class="w-full h-auto px-16 flex flex-col items-center justify-start">
            @foreach ($categories as $category)
                <li class="w-full h-auto mt-6">
                    <x-browse-slider :category="$category"></x-browse-slider>
                </li>
            @endforeach

            @if ($categories->count() == 0)
                <li class="w-full mt-6 flex flex-col items-center justify-center" style="height: calc(100vh - 120px);">
                    <h1 class="w-full text-center text-xl font-bold text-black">Leider stehen im Moment keine Inhalte zur
                        Verfügung</h1>

                    @can('manage content')
                        <x-action class="px-4 py-1 mt-2">
                            <a href="{{ route('categories/create') }}" class="text-white">Jetzt Kategorie anlegen</a>
                        </x-action>
                    @else
                        <p class="w-full text-center text-base font-normal text-stone-700">Wenden Sie sich an einen Administrator
                            oder besuchen Sie die Seite später nochmal.</p>
                    @endcan
                </li>
            @endif
        </ul>
    </x-body>
    @yield('content')
@endsection
