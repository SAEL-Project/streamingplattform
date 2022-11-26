@extends('layouts.app')

@section('head')
    <style>
        html,
        body,
        #app {
            background-color: black;
            overflow: hidden;
        }

        body {
            background-image: url("{{ asset('assets/images/movies_bg.jpg') }}");
            background-size: contain;
        }
    </style>
    @yield('title')
@endsection

@section('body')
    <x-navbar />
    <x-body class="w-screen h-[90vh] justify-center">
        <section class="w-[450px] bg-black bg-opacity-90 rounded-xl flex flex-col justify-start items-center py-16 px-16">
            <header class="w-full flex flex-col justify-start items-center">
                <h3 class="w-full mb-2 text-left font-bold text-4xl text-white">
                    @yield('auth-title')
                </h3>
                <p class="w-full text-left font-light text-base text-gray-300">
                    @yield('description')
                </p>
            </header>
            <div class="w-full flex flex-col items-center justify-start my-8">
                @yield('content')
            </div>
            <footer class="w-full flex flex-col justify-start items-center">
                @yield('footer')
            </footer>
        </section>
    </x-body>
@endsection
