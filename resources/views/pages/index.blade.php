@extends('layouts.app')

@section('head')
    <title>{{ config('app.name') }}</title>
    <style>
        #background-image {
            background-image: url("{{ asset('assets/images/movies_bg.jpg') }}");
            background-size: cover;
        }
    </style>
@endsection

@section('body')
    <x-navbar class="fixed">
        <x-slot name="action">
            <a href="{{ route('login') }}" class="text-center text-sm text-white font-normal">Anmelden</a>
        </x-slot>
    </x-navbar>
    <x-body class="bg-neutral-800 absolute top-[54px]">
        <section
            class="w-full h-[650px] md:max-w-[1680px] md:max-h-[650px] md:h-full md:aspect-video flex flex-col items-center justify-end">
            <div id="background-image"
                class="rounded-sm absolute w-full h-[650px] md:max-w-[1680px] md:max-h-[650px] md:h-full md:aspect-video blur-sm">
            </div>
            <div class="w-1/2 mb-24 flex flex-col items-center justify-start">
                <h1 class="w-full text-center text-2xl text-white font-bold z-10">
                    Das Zuhause der <br> besten Inhalte
                </h1>
                <h3 class="w-full mt-2 text-center text-xl text-gray-200 font-normal z-10">
                    Erlebe preisgekrönte Serien und Filme mit super Qualität.
                </h3>
                <a href="{{ route('register') }}"
                    class="mt-4 w-1/3 py-2 rounded-md cursor-pointer bg-white hover:bg-gray-200 text-center text-black font-bold z-10">Registrieren</a>
            </div>
        </section>
        <section class="w-full flex flex-col items-center justify-start bg-black py-14">
            <h1 class="w-full text-center text-4xl text-white font-bold">
                Sieh dir {{ config('app.name') }} hier und überall an.
                <span class="text-base">*1</span>
            </h1>
            <h3 class="w-2/5 mt-8 text-center text-2xl text-gray-200 font-normal">
                Du findest {{ config('app.name') }} unter dieser URL - verfügbar auf allen Desktop-Geräten, Smart-TVs und
                mehr.
            </h3>
            <ul class="w-2/5 mt-6 flex items-center justify-evenly">
                <x-index-device>TV-Box</x-index-device>
                <x-index-device>Smartphone</x-index-device>
                <x-index-device>Tablet</x-index-device>
                <x-index-device>Laptop</x-index-device>
                <x-index-device>Desktop</x-index-device>
            </ul>
            <h3 class="w-2/5 mt-6 text-center text-2xl text-gray-200 font-normal">Erlebe es auf dem großen Bildschirm.</h3>
            <ul class="w-2/5 mt-6 flex items-center justify-evenly">
                <x-index-device>Streaminggeräte</x-index-device>
                <x-index-device>Smart-TVs</x-index-device>
                <x-index-device>Spielekonsolen</x-index-device>
            </ul>
            <p class="mt-8 w-2/5 text-center text-xs text-gray-300 font-normal">
                *1 {{ config('app.name') }} gewährleistet nicht, dass die Erfahrung auf diesen Geräten funktioniert.
            </p>
        </section>
        <section class="w-full flex flex-col items-center justify-start py-14">
            <h1 class="w-full text-center text-4xl text-white font-bold">
                Fragen und Antworten
            </h1>
            <ul class="w-3/5 mt-6 flex flex-col items-start justify-center">
                <x-index-faq>
                    <x-slot name="question">Was ist {{ config('app.name') }}?</x-slot>
                    <x-slot name="answer">
                        {{ config('app.name') }} ist eine Streamingplattform für qualitative Inhalte. Es bietet exklusive
                        Inhalte von einigen der Besten der Branchen und eine glatte Eins.
                    </x-slot>
                </x-index-faq>
                <x-index-faq>
                    <x-slot name="question">Was beinhaltet {{ config('app.name') }}?</x-slot>
                    <x-slot name="answer">
                        {{ config('app.name') }} beinhaltet alle Inhalte die Sie wollen, diese Aussage können wir für Sie
                        treffen.
                    </x-slot>
                </x-index-faq>
                <x-index-faq>
                    <x-slot name="question">Kann ich {{ config('app.name') }} auf meinem Telefon ansehen?</x-slot>
                    <x-slot name="answer">
                        {{ config('app.name') }} geht davon aus dass dies im Rahmen des möglichen liegt, jedoch kann keine
                        offizielle Aussage nicht getroffen werden. Probieren Sie es einfach aus!
                    </x-slot>
                </x-index-faq>
                <x-index-faq>
                    <x-slot name="question">Wie kann ich {{ config('app.name') }} auf einem Dekstop ansehen?</x-slot>
                    <x-slot name="answer">
                        Öffnen Sie {{ config('app.name') }} durch Ihren Webbrowser.
                    </x-slot>
                </x-index-faq>
                <x-index-faq>
                    <x-slot name="question">Was kann ich {{ config('app.name') }} auf ansehen?</x-slot>
                    <x-slot name="answer">
                        Die Inhalte von {{ config('app.name') }}.
                    </x-slot>
                </x-index-faq>
            </ul>

        </section>
        <section class="w-full flex flex-row gap-5 items-center justify-center mb-10">
            <a href="{{ route('register') }}"
                class="py-2 px-8 rounded-md cursor-pointer bg-white hover:bg-gray-200 text-center text-xl text-black font-bold">Registrieren</a>
            <a href="{{ route('login') }}"
                class="py-2 px-8 rounded-md cursor-pointer bg-blue-500 hover:bg-blue-600 text-center text-xl text-white font-bold">Anmelden</a>
        </section>
    </x-body>
@endsection
