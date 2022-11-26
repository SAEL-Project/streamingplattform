@extends('layouts.browse-modal')

@section('modal-header')
    <h1 class="text-left text-2xl text-black text-ellipsis whitespace-nowrap overflow-hidden">
        <span class="font-bold">{{ $movie->title }}</span>
        bearbeiten
    </h1>
    <a href="{{ route('browse') }}" class="text-right text-xl text-black font-bold ml-auto">X</a>
@endsection

@section('modal-body')
    <form method="POST" action="{{ route('movies/edit', $movie->id) }}" class="w-full">
        @csrf

        <x-auth-input class="w-full mb-3">
            <x-slot name="type">text</x-slot>
            <x-slot name="name">title</x-slot>
            <x-slot name="placeholder">Neuer Titel</x-slot>
            <x-slot name="required">true</x-slot>
            <x-slot name="color">border-2 border-stone-400 text-black</x-slot>
            @error('title')
                <x-slot name="error">{{ $message }}</x-slot>
            @enderror
        </x-auth-input>
        <x-auth-input class="w-full mb-3">
            <x-slot name="type">text</x-slot>
            <x-slot name="name">description</x-slot>
            <x-slot name="placeholder">Neue Beschreibung</x-slot>
            <x-slot name="required">true</x-slot>
            <x-slot name="color">border-2 border-stone-400 text-black</x-slot>
            @error('description')
                <x-slot name="error">{{ $message }}</x-slot>
            @enderror
        </x-auth-input>

        <x-action class="w-full py-2 mt-6">
            <button type="submit" class="w-full h-full text-white text-lg">Speichern</button>
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
