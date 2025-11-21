<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Paciente: {{ $patient->first_name }} {{ $patient->last_name }}
            </h2>
            <a href="{{ route('patients.index') }}"
               class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                Volver
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow sm:rounded-lg p-6 text-gray-900">

                {{-- Mensaje de éxito --}}
                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- INFORMACIÓN PERSONAL --}}
                <section class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Información Básica</h3>

                    <p><span class="font-semibold">Nombre:</span>
                        {{ $patient->first_name }} {{ $patient->last_name }}
                    </p>

                    <p class="mt-1"><span class="font-semibold">Documento:</span>
                        {{ $patient->identification_number }}
                    </p>

                    <p class="mt-1"><span class="font-semibold">Tipo Documento:</span>
                        {{ $patient->document_type_id }}
                    </p>

                    <p class="mt-1"><span class="font-semibold">Email:</span>
                        {{ $patient->email ?? 'No registrado' }}
                    </p>

                    <p class="mt-1"><span class="font-semibold">Teléfono:</span>
                        {{ $patient->phone_number ?? 'No registrado' }}
                    </p>

                    <p class="mt-1"><span class="font-semibold">Dirección:</span>
                        {{ $patient->address ?? 'N/A' }}
                    </p>

                    <p class="mt-1"><span class="font-semibold">Estado civil:</span>
                        {{ $patient->marital_status ?? 'N/A' }}
                    </p>
                </section>

                <hr class="my-4">

                {{-- DATOS CLÍNICOS --}}
                <section class="mb-6">

                    <h3 class="text-lg font-semibold mb-2">Datos Clínicos</h3>

                    <p><span class="font-semibold">Género:</span> {{ $patient->gender }}</p>
                    <p><span class="font-semibold">Orientación sexual:</span> {{ $patient->sexual_orientation }}</p>
                    <p><span class="font-semibold">Ocupación:</span> {{ $patient->occupation }}</p>
                    <p><span class="font-semibold">EPS:</span> {{ $patient->eps_company }}</p>
                    <p><span class="font-semibold">Peso:</span> {{ $patient->weight }} kg</p>
                    <p><span class="font-semibold">Estatura:</span> {{ $patient->height }} cm</p>
                </section>

                <hr class="my-4">

                {{-- CITAS --}}
                <section class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Citas del Paciente</h3>

                    <p><span class="font-semibold">Última cita:</span>
                        {{ $lastAppointment ? $lastAppointment->format('d/m/Y') : 'N/A' }}
                    </p>

                    <p class="mt-1"><span class="font-semibold">Próxima cita:</span>
                        {{ $nextAppointment ? $nextAppointment->format('d/m/Y') : 'N/A' }}
                    </p>
                </section>

                <div class="flex justify-end mt-6 gap-3">
                    <a href="{{ route('patients.edit', $patient->id) }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Editar
                    </a>
                    <a href="{{ route('patients.index') }}"
                       class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded">
                        Volver
                    </a>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
