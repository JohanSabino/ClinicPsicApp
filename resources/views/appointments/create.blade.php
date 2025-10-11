<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Nueva Cita') }}
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
                    <form action="{{ route('appointments.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Paciente -->
                        <div class="mb-4">
                            <label for="patient_id" class="block text-sm font-medium text-gray-700 mb-2">
                                Paciente *
                            </label>
                            <select id="patient_id" name="patient_id" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Seleccione un paciente</option>
                                @foreach($patients as $patient)
                                    <option value="{{ $patient->id }}">
                                        {{ $patient->first_name }} {{ $patient->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Psicólogo -->
                        <div class="mb-4">
                            <label for="psychologist_id" class="block text-sm font-medium text-gray-700 mb-2">
                                Psicólogo *
                            </label>
                            <select id="psychologist_id" name="psychologist_id" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Seleccione un psicólogo</option>
                                @foreach($psychologists as $psychologist)
                                    <option value="{{ $psychologist->id }}">
                                        {{ $psychologist->first_name }} {{ $psychologist->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Número de Sesión y Estado -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="session_number" class="block text-sm font-medium text-gray-700 mb-2">
                                    Número de Sesión *
                                </label>
                                <input type="number" id="session_number" name="session_number" min="1" required
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                                    Estado *
                                </label>
                                <select id="status" name="status" required
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Seleccione un estado</option>
                                    <option value="0">Pendiente</option>
                                    <option value="1">Completada</option>
                                    <option value="2">Cancelada</option>
                                </select>
                            </div>
                        </div>

                        <!-- Objetivos, Resumen y Progreso -->
                        <div class="mb-4">
                            <label for="goals" class="block text-sm font-medium text-gray-700 mb-2">
                                Objetivos
                            </label>
                            <textarea id="goals" name="goals" rows="2"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="abstract" class="block text-sm font-medium text-gray-700 mb-2">
                                Resumen
                            </label>
                            <textarea id="abstract" name="abstract" rows="2"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="progress" class="block text-sm font-medium text-gray-700 mb-2">
                                Progreso
                            </label>
                            <textarea id="progress" name="progress" rows="2"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>

                        <!-- Estado de Ánimo y Instrumentos Psicológicos -->
                        <div class="mb-4">
                            <label for="mood_last_term" class="block text-sm font-medium text-gray-700 mb-2">
                                Estado de Ánimo Último Período *
                            </label>
                            <textarea id="mood_last_term" name="mood_last_term" rows="2" required
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="psychological_instruments" class="block text-sm font-medium text-gray-700 mb-2">
                                Instrumentos Psicológicos *
                            </label>
                            <textarea id="psychological_instruments" name="psychological_instruments" rows="2" required
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>

                        <!-- Fecha y Hora de la Cita -->
                        <div class="mb-4">
                            <label for="schedule_at" class="block text-sm font-medium text-gray-700 mb-2">
                                Fecha y Hora de la Cita *
                            </label>
                            <input type="datetime-local" id="schedule_at" name="schedule_at" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Botones -->
                        <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                            <a href="{{ route('appointments.index') }}" 
                               class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-6 rounded-md transition duration-300">
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
