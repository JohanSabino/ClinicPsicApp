<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            Detalles de la Cita
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h3 class="text-lg font-bold mb-6 text-center">
                        Sesión #{{ $appointment->session_number }}
                    </h3>

                    <div class="space-y-4">

                        <!-- Paciente -->
                        <p>
                            <strong>Paciente:</strong><br>
                            {{ $appointment->patient->first_name }} {{ $appointment->patient->last_name }}
                        </p>

                        <!-- Psicólogo -->
                        <p>
                            <strong>Psicólogo:</strong><br>
                            {{ $appointment->psychologist->first_name }} {{ $appointment->psychologist->last_name }}
                        </p>

                        <!-- Estado -->
                        <p>
                            <strong>Estado de Pago:</strong><br>

                            @if ($appointment->status === 'paid')
                                <span class="text-green-600 font-semibold">Pagada</span>

                            @elseif ($appointment->status === 'owed')
                                <span class="text-red-600 font-semibold">Adeudada</span>

                            @elseif ($appointment->status === 'partial')
                                <span class="text-yellow-600 font-semibold">Abonada</span>

                            @else
                                <span class="text-gray-600">Desconocido</span>
                            @endif
                        </p>

                        <!-- Fecha -->
                        <p>
                            <strong>Fecha y hora:</strong><br>
                            {{ \Carbon\Carbon::parse($appointment->schedule_at)->format('d/m/Y H:i') }}
                        </p>

                        <!-- Notas -->
                        <p>
                            <strong>Notas:</strong><br>
                            {{ $appointment->notes ?: 'Sin información' }}
                        </p>

                    </div>

                    <div class="mt-8 flex justify-between">
                        <a href="{{ route('appointments.index') }}"
                           class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-md">
                            Volver
                        </a>

                        <a href="{{ route('appointments.edit', $appointment->id) }}"
                           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
                            Editar sesión
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
