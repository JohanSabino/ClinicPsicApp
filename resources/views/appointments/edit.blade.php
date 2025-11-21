<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            Editar Sesión
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- FORM -->
                    <form action="{{ route('appointments.update', $appointment->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- ERRORES -->
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

                        <!-- Número de Sesión -->
                        <div>
                            <label for="session_number" class="block text-sm font-medium text-gray-700 mb-2">
                                Número de Sesión *
                            </label>
                            <input type="number" id="session_number" name="session_number" min="1"
                                   value="{{ old('session_number', $appointment->session_number) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                            @error('session_number')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Estado -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                                Estado *
                            </label>
                            <select id="status" name="status"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                                <option value="">Seleccione un estado</option>
                                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Pagada</option>
                                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Adeudada</option>
                                <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Abonada</option>
                            </select>
                            @error('status')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Objetivos -->
                        <div>
                            <label for="goals" class="block text-sm font-medium text-gray-700 mb-2">
                                Objetivos
                            </label>
                            <textarea id="goals" name="goals" rows="2"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('goals', $appointment->goals) }}</textarea>
                            @error('goals')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Resumen -->
                        <div>
                            <label for="abstract" class="block text-sm font-medium text-gray-700 mb-2">
                                Resumen
                            </label>
                            <textarea id="abstract" name="abstract" rows="2"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('abstract', $appointment->abstract) }}</textarea>
                            @error('abstract')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Progreso -->
                        <div>
                            <label for="progress" class="block text-sm font-medium text-gray-700 mb-2">
                                Progreso
                            </label>
                            <textarea id="progress" name="progress" rows="2"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('progress', $appointment->progress) }}</textarea>
                            @error('progress')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Estado de Ánimo -->
                        <div>
                            <label for="mood_last_term" class="block text-sm font-medium text-gray-700 mb-2">
                                Estado de Ánimo Último Período
                            </label>
                            <textarea id="mood_last_term" name="mood_last_term" rows="2"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('mood_last_term', $appointment->mood_last_term) }}</textarea>
                            @error('mood_last_term')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Instrumentos Psicológicos -->
                        <div>
                            <label for="psychological_instruments" class="block text-sm font-medium text-gray-700 mb-2">
                                Instrumentos Psicológicos
                            </label>
                            <textarea id="psychological_instruments" name="psychological_instruments" rows="2"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md">{{ old('psychological_instruments', $appointment->psychological_instruments) }}</textarea>
                            @error('psychological_instruments')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Fecha y Hora -->
                        <div>
                            <label for="schedule_at" class="block text-sm font-medium text-gray-700 mb-2">
                                Fecha y Hora de la Sesión *
                            </label>
                            <input type="datetime-local" id="schedule_at" name="schedule_at" required
                                   value="{{ old('schedule_at', \Carbon\Carbon::parse($appointment->schedule_at)->format('Y-m-d\TH:i')) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md">
                            @error('schedule_at')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- BOTONES -->
                        <div class="flex justify-between pt-6 border-t border-gray-200">
                            <a href="{{ route('appointments.show', $appointment->id) }}"
                               class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded-md">
                                Cancelar
                            </a>

                            <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md">
                                Guardar Cambios
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
