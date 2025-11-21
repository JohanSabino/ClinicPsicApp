<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar Paciente
            </h2>

            <a href="{{ route('patients.index') }}"
               class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                Volver
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white p-6 shadow sm:rounded-lg text-gray-900">

                {{-- Errores --}}
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-100 text-red-800 border border-red-300 rounded">
                        <strong>Por favor corrija los siguientes errores:</strong>
                        <ul class="list-disc pl-5 mt-2 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('patients.update', $patient->id) }}" class="space-y-8">
                    @csrf
                    @method('PUT')

                    <section>
                        <h3 class="text-lg font-semibold mb-3">Información Básica</h3>

                        <div class="mb-4">
                            <label class="block font-medium mb-1">Nombres *</label>
                            <input type="text" name="first_name"
                                   value="{{ old('first_name', $patient->first_name) }}"
                                   class="w-full border border-gray-300 rounded-md px-3 py-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium mb-1">Apellidos *</label>
                            <input type="text" name="last_name"
                                   value="{{ old('last_name', $patient->last_name) }}"
                                   class="w-full border border-gray-300 rounded-md px-3 py-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium mb-1">Documento *</label>
                            <input type="text" name="identification_number"
                                   value="{{ old('identification_number', $patient->identification_number) }}"
                                   class="w-full border border-gray-300 rounded-md px-3 py-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium mb-1">Email</label>
                            <input type="email" name="email"
                                   value="{{ old('email', $patient->email) }}"
                                   class="w-full border border-gray-300 rounded-md px-3 py-2">
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium mb-1">Teléfono</label>
                            <input type="text" name="phone_number"
                                   value="{{ old('phone_number', $patient->phone_number) }}"
                                   class="w-full border border-gray-300 rounded-md px-3 py-2">
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium mb-1">Dirección</label>
                            <input type="text" name="address"
                                   value="{{ old('address', $patient->address) }}"
                                   class="w-full border border-gray-300 rounded-md px-3 py-2">
                        </div>
                    </section>

                    <hr>

                    <section>
                        <h3 class="text-lg font-semibold mb-3">Datos Clínicos</h3>

                        <div class="mb-4">
                            <label class="block font-medium mb-1">Género</label>
                            <input type="text" name="gender"
                                   value="{{ old('gender', $patient->gender) }}"
                                   class="w-full border border-gray-300 rounded-md px-3 py-2">
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium mb-1">Ocupación</label>
                            <input type="text" name="occupation"
                                   value="{{ old('occupation', $patient->occupation) }}"
                                   class="w-full border border-gray-300 rounded-md px-3 py-2">
                        </div>
                    </section>

                    <div class="flex justify-end">
                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                            Guardar cambios
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>
