<nav
    {{ $attributes->class('w-screen h-[54px] px-10 flex flex-row items-center justify-center bg-black z-50')->merge() }}>
    <div class="w-full h-full max-w-[1600px] flex flex-row items-start justify-center">
        <div class="w-auto h-full mr-auto flex flex-col items-start justify-center">
            @isset($brand)
                {{ $brand }}
            @else
                <a href="{{ route('index') }}" class="text-left text-xl text-white font-bold">{{ config('app.name') }}</a>
            @endisset
        </div>
        <div class="w-auto h-full flex flex-col items-end justify-center">
            @isset($action)
                <x-action class="h-full my-3 flex items-center justify-center">
                    {{ $action }}
                </x-action>
            @else
                @auth
                    <p class="text-right text-base font-normal text-white">
                        {{ Auth::user()->name }}
                        @role('admin')
                            (Admin)
                        @endrole
                    </p>
                @endauth
            @endisset
        </div>
    </div>
</nav>
