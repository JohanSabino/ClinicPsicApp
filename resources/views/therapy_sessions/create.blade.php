<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Registrar Sesión Atendida') }}
            </h2>
            <a href="{{ route('therapy_sessions.index') }}" 
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
                    <form action="{{ route('therapy_sessions.store') }}" method="POST" class="space-y-6">
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

                        <!-- NÚMERO DE SESIÓN + ESTADO -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

                            <div>
                                <label for="session_number" class="block text-sm font-medium text-gray-700 mb-2">
                                    Número de Sesión *
                                </label>
                                <input type="number" id="session_number" name="session_number" min="1"
                                       value="{{ old('session_number') }}"
                                       required
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                @error('session_number')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                                    Estado *
                                </label>
                                <select id="status" name="status" required
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    <option value="">Seleccione un estado</option>
                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Pendiente</option>
                                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Completada</option>
                                    <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Cancelada</option>
                                </select>
                                @error('status')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <!-- GOALS (VALIDACIÓN V-04) -->
                        <div class="mb-4">
                            <label for="goals" class="block text-sm font-medium text-gray-700 mb-2">
                                Objetivos (máx. 300 caracteres)
                            </label>
                            <textarea id="goals" name="goals" rows="2"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('goals') }}</textarea>
                            @error('goals')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- ABSTRACT -->
                        <div class="mb-4">
                            <label for="abstract" class="block text-sm font-medium text-gray-700 mb-2">
                                Resumen
                            </label>
                            <textarea id="abstract" name="abstract" rows="2"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('abstract') }}</textarea>
                            @error('abstract')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- PROGRESS -->
                        <div class="mb-4">
                            <label for="progress" class="block text-sm font-medium text-gray-700 mb-2">
                                Progreso
                            </label>
                            <textarea id="progress" name="progress" rows="2"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('progress') }}</textarea>
                            @error('progress')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- MOOD LAST TERM -->
                        <div class="mb-4">
                            <label for="mood_last_term" class="block text-sm font-medium text-gray-700 mb-2">
                                Estado de Ánimo Último Período *
                            </label>
                            <textarea id="mood_last_term" name="mood_last_term" rows="2" required
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('mood_last_term') }}</textarea>
                            @error('mood_last_term')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- PSYCHOLOGICAL INSTRUMENTS -->
                        <div class="mb-4">
                            <label for="psychological_instruments" class="block text-sm font-medium text-gray-700 mb-2">
                                Instrumentos Psicológicos *
                            </label>
                            <textarea id="psychological_instruments" name="psychological_instruments" rows="2" required
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('psychological_instruments') }}</textarea>
                            @error('psychological_instruments')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- FECHA Y HORA -->
                        <div class="mb-4">
                            <label for="date" class="block text-sm font-medium text-gray-700 mb-2">
                                Fecha de la sesión *
                            </label>
                            <input type="datetime-local" name="date"
                                value="{{ old('date') }}"
                                class="w-full border border-gray-300 rounded-md px-3 py-2"
                                required>
                            @error('date')
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
                                Registrar sesión
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
