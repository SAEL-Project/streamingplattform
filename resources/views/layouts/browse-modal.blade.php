@extends('layouts.browse')

@section('content')
    <div class="absolute w-screen top-[54px] left-0 backdrop-blur-sm flex flex-col items-center justify-center"
        style="height: calc(100vh - 54px);">
        <section
            class="pointer-events-auto w-full max-w-[450px] p-6 bg-white rounded-md border-[1px] border-stone-700 flex flex-col items-center justify-start">
            <header class="w-full h-auto flex flex-row items-center justify-start">
                @yield('modal-header')
            </header>
            <div class="w-full h-auto flex flex-col items-center justify-start mt-6">
                @yield('modal-body')
            </div>
            <footer class="w-full h-auto flex flex-col items-center justify-start">
                @yield('modal-footer')
            </footer>
        </section>
    </div>
@endsection
