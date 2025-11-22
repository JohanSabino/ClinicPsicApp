<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Agendar nueva sesión') }}
            </h2>
            <a href="{{ route('appointments.index') }}" 
               class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md transition duration-300 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Volver
            </a>
        </div>
    </x-slot>

    <div class="py-12">
       <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <!-- FORMULARIO -->
                    <form action="{{ route('appointments.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- BLOQUE DE ERRORES -->
                        @if ($errors->any())
                            <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-800 rounded-md">
                                <strong>Por favor corrija los siguientes errores:</strong>
                                <ul class="mt-2 list-disc list-inside text-sm">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- PACIENTE -->
                        <div class="mb-4">
                            <label for="patient_id" class="block text-sm font-medium text-gray-700 mb-2">
                                Paciente *
                            </label>
                            <select id="patient_id" name="patient_id" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                <option value="">Seleccione un paciente</option>
                                @foreach($patients as $patient)
                                    <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected' : '' }}>
                                        {{ $patient->first_name }} {{ $patient->last_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('patient_id')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- ESTADO -->
                        <div class="mb-4">
                          <select id="status" name="status" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md">

                                <option value="">Seleccione un estado</option>

                                <option value="paid" {{ old('status') == 'paid' ? 'selected' : '' }}>
                                    Pagada
                                </option>

                                <option value="owed" {{ old('status') == 'owed' ? 'selected' : '' }}>
                                    Adeudada
                                </option>

                                <option value="partial" {{ old('status') == 'partial' ? 'selected' : '' }}>
                                    Abonada
                                </option>

                            </select>


                            @error('status')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror


                        <!-- FECHA Y HORA -->
                        <div class="mb-4">
                            <label for="schedule_at" class="block text-sm font-medium text-gray-700 mb-2">
                                Fecha y Hora de la Cita *
                            </label>
                            <input type="datetime-local" id="schedule_at" name="schedule_at" required
                                   value="{{ old('schedule_at') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md">
                            @error('schedule_at')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- NOTAS -->
                        <div class="mb-4">
                            <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">
                                Notas (opcional)
                            </label>
                            <textarea id="notes" name="notes" rows="2"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('notes') }}</textarea>
                            @error('notes')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- BOTONES -->
                        <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                            <a href="{{ route('appointments.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-6 rounded-md transition duration-300">
                                Cancelar
                            </a>

                            <button type="submit" 
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-md transition duration-300 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Crear Cita
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
