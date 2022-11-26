@extends('layouts.browse-modal')

@section('modal-header')
    <h1 class="text-left text-2xl text-black text-ellipsis whitespace-nowrap overflow-hidden">
        <span class="font-bold">{{ $movie->title }}</span>
        <span class="text-red-500 ml-2">löschen?</span>
    </h1>
    <a href="{{ route('browse') }}" class="text-right text-xl text-black font-bold ml-auto">X</a>
@endsection

@section('modal-body')
    <form method="POST" action="{{ route('movies/delete', $movie->id) }}" class="w-full">
        @csrf
        <x-action class="w-full py-2">
            <button type="submit" class="w-full h-full text-white text-lg">Löschen</button>
        </x-action>
    </form>
@endsection

@section('modal-footer')
    <p class="w-full text-left text-base font-normal text-stone-700 mt-1">
        <span class="text-black font-bold">Achtung:</span>
        Änderungen werden sofort übernommen und können
        nicht rückgängig gemacht werden.
    </p>
@endsection
