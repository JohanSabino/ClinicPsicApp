@props(['header'])


<div class="min-h-screen bg-gray-100">


    {{-- NAVBAR SUPERIOR (igual al de Jetstream) --}}
    @include('layouts.navigation')

    {{-- ENCABEZADO --}}
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    {{-- CONTENIDO PRINCIPAL --}}
    <main>
        {{ $slot }}
    </main>

</div>
