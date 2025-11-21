<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalle de la Sesión #{{ $session->session_number }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 shadow sm:rounded-lg">

                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Paciente</h3>
                    <p class="text-gray-700">
                        {{ $session->patient->first_name }} {{ $session->patient->last_name }}
                    </p>
                </div>

                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Fecha de la Sesión</h3>
                    <p class="text-gray-700">
                        {{ \Carbon\Carbon::parse($session->date)->format('d/m/Y') }}
                    </p>
                </div>

                <div class="mb-6">
                    <h3 class="text-lg font-semibold">Objetivos</h3>
                    <p class="text-gray-700 whitespace-pre-line">
                        {{ $session->goals ?? '―' }}
                    </p>
                </div>

                <div class="mb-6">
                    <h3 class="text-lg font-semibold">Resumen</h3>
                    <p class="text-gray-700 whitespace-pre-line">
                        {{ $session->abstract ?? '―' }}
                    </p>
                </div>

                <div class="mb-6">
                    <h3 class="text-lg font-semibold">Progreso</h3>
                    <p class="text-gray-700 whitespace-pre-line">
                        {{ $session->progress ?? '―' }}
                    </p>
                </div>

                <div class="mb-6">
                    <h3 class="text-lg font-semibold">Estado de Ánimo</h3>
                    <p class="text-gray-700 whitespace-pre-line">
                        {{ $session->mood_last_term }}
                    </p>
                </div>

                <div class="mb-6">
                    <h3 class="text-lg font-semibold">Instrumentos Psicológicos</h3>
                    <p class="text-gray-700 whitespace-pre-line">
                        {{ $session->psychological_instruments }}
                    </p>
                </div>

                <div class="flex justify-end mt-6">
                   <a href="{{ route('therapy_sessions.edit', $session->id) }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mr-3">
                        Editar
                    </a>

                    <a href="{{ route('therapy_sessions.index') }}"
                       class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded">
                        Volver
                    </a>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
