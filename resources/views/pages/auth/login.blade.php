@extends('layouts.auth')

@section('title')
    <title>{{ config('app.name') }} × Einloggen</title>
@endsection

@section('auth-title')
    Einloggen
@endsection

@section('description')
    Loggen Sie sich in Ihren {{ config('app.name') }} Account ein und starten Sie sofort durch.
@endsection

@section('content')
    <form method="POST" action="{{ route('login') }}" class="w-full">
        @csrf

        <x-auth-input class="w-full mb-3">
            <x-slot name="type">email</x-slot>
            <x-slot name="name">email</x-slot>
            <x-slot name="placeholder">E-Mail Adresse</x-slot>
            <x-slot name="required">true</x-slot>
            @error('email')
                <x-slot name="error">{{ $message }}</x-slot>
            @enderror
        </x-auth-input>
        <x-auth-input class="w-full mb-8">
            <x-slot name="type">password</x-slot>
            <x-slot name="name">password</x-slot>
            <x-slot name="placeholder">Passwort</x-slot>
            <x-slot name="required">true</x-slot>
            @error('password')
                <x-slot name="error">{{ $message }}</x-slot>
            @enderror
        </x-auth-input>

        <x-action class="w-full py-2 mb-2">
            <button type="submit" class="w-full h-full text-white text-lg">Einloggen</button>
        </x-action>

        <section class="w-full flex flex-row items-center justify-start">
            <div class="h-full flex flex-row items-center justify-start mr-auto">
                <input checked type="checkbox" name="remember" required class="mr-2">
                <label for="remember" class="text-left text-neutral-300 text-sm">An mich erinnern</label>
            </div>
        </section>
    </form>
@endsection

@section('footer')
    <section class="w-full flex flex-col items-center justify-start">
        <h5 class="w-full text-left text-neutral-300 text-base mb-1">
            Neu bei {{ config('app.name') }}?
            <a href="{{ route('register') }}" class="text-white">Jetzt registrieren</a>
        </h5>
        <p class="w-full text-left text-neutral-300 text-xs">
            Diese Seite ist durch Magie abgesichert, um sicherzustellen, dass Sie kein Bot sind.
        </p>
    </section>
@endsection
