@extends('layouts.auth')

@section('title')
    <title>{{ config('app.name') }} × Registrieren</title>
@endsection

@section('auth-title')
    Registrieren
@endsection

@section('description')
    Registrieren Sie Ihren Account bei {{ config('app.name') }} und starten Sie heute noch.
@endsection

@section('content')
    <form method="POST" action="{{ route('register') }}" class="w-full">
        @csrf

        <x-auth-input class="w-full mb-3">
            <x-slot name="type">text</x-slot>
            <x-slot name="name">name</x-slot>
            <x-slot name="placeholder">Name</x-slot>
            <x-slot name="required">true</x-slot>
            @error('name')
                <x-slot name="error">{{ $message }}</x-slot>
            @enderror
        </x-auth-input>
        <x-auth-input class="w-full mb-3">
            <x-slot name="type">email</x-slot>
            <x-slot name="name">email</x-slot>
            <x-slot name="placeholder">E-Mail Adresse</x-slot>
            <x-slot name="required">true</x-slot>
            @error('email')
                <x-slot name="error">{{ $message }}</x-slot>
            @enderror
        </x-auth-input>
        <x-auth-input class="w-full mb-3">
            <x-slot name="type">password</x-slot>
            <x-slot name="name">password</x-slot>
            <x-slot name="placeholder">Sicheres Passwort</x-slot>
            <x-slot name="required">true</x-slot>
            @error('password')
                <x-slot name="error">{{ $message }}</x-slot>
            @enderror
        </x-auth-input>
        <x-auth-input class="w-full mb-8">
            <x-slot name="type">password</x-slot>
            <x-slot name="name">password_confirmation</x-slot>
            <x-slot name="placeholder">Passwort Bestätigen</x-slot>
            <x-slot name="required">true</x-slot>
        </x-auth-input>

        <x-action class="w-full py-2 mb-2">
            <button type="submit" class="w-full h-full text-white text-lg">Registrieren</button>
        </x-action>

        <section class="w-full flex flex-row items-center justify-start">
            <div class="h-full flex flex-row items-center justify-start mr-auto">
                <input checked type="checkbox" name="remember" required class="mr-2">
                <label for="remember" class="text-left text-neutral-300 text-sm">An mich erinnern</label>
            </div>
            <a href="/" class="text-right text-neutral-300 text-sm hover:text-blue-500">Informationen</a>
        </section>
    </form>
@endsection

@section('footer')
    <section class="w-full flex flex-col items-center justify-start">
        <h5 class="w-full text-left text-neutral-300 text-base mb-1">
            Schon bei {{ config('app.name') }}?
            <a href="{{ route('login') }}" class="text-white">Jetzt einloggen</a>
        </h5>
        <p class="w-full text-left text-neutral-300 text-xs">
            Diese Seite ist durch Magie abgesichert, um sicherzustellen, dass Sie kein Bot sind.
        </p>
    </section>
@endsection
