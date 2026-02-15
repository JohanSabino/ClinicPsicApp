<div class="min-h-screen bg-gray-50 pt-16">

    {{-- Fondo detrás del navbar fixed --}}
    <div class="fixed top-0 left-0 w-full h-16 background-clinic-gradient -z-10"></div>

    @include('layouts.navigation')

    @isset($header)
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    @endisset

    <main>
        {{ $slot }}
    </main>
</div>