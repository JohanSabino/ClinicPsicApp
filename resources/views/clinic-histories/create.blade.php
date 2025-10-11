<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Nueva Historia Clínica') }}
            </h2>
            <a href="{{ route('clinic-histories.index') }}" 
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
                    <form action="{{ route('clinic-histories.store') }}" method="POST" class="space-y-6">
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

                        <!-- Motivo de Consulta -->
                        <div class="border-b border-gray-200 pb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Motivo de Consulta</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="reason_for_consultation_type" class="block text-sm font-medium text-gray-700 mb-2">
                                        Tipo de Motivo *
                                    </label>
                                    <input type="text" id="reason_for_consultation_type" name="reason_for_consultation_type" required
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label for="reason_for_consultation" class="block text-sm font-medium text-gray-700 mb-2">
                                        Motivo de Consulta *
                                    </label>
                                    <textarea id="reason_for_consultation" name="reason_for_consultation" required rows="2"
                                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                                </div>
                            </div>

                            <div class="mt-4">
                                <label for="trigger_for_consultation" class="block text-sm font-medium text-gray-700 mb-2">
                                    Desencadenante
                                </label>
                                <textarea id="trigger_for_consultation" name="trigger_for_consultation" rows="2"
                                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>
                        </div>

                        <!-- Datos del embarazo / nacimiento -->
                        <div class="border-b border-gray-200 pb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Datos de Nacimiento</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label for="term_of_pregnancy" class="block text-sm font-medium text-gray-700 mb-2">
                                        Tiempo de Gestación
                                    </label>
                                    <input type="text" id="term_of_pregnancy" name="term_of_pregnancy"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label for="prenatal_issues" class="block text-sm font-medium text-gray-700 mb-2">
                                        Problemas Prenatales
                                    </label>
                                    <input type="text" id="prenatal_issues" name="prenatal_issues"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                           placeholder='["Ejemplo1", "Ejemplo2"]'>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="birth_data" class="block text-sm font-medium text-gray-700 mb-2">
                                    Datos del Nacimiento
                                </label>
                                <input type="text" id="birth_data" name="birth_data"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                       placeholder='{"weight": "3kg", "height": "50cm"}'>
                            </div>
                            <div class="mb-4">
                                <label for="birth_data_complement" class="block text-sm font-medium text-gray-700 mb-2">
                                    Complemento del Nacimiento
                                </label>
                                <textarea id="birth_data_complement" name="birth_data_complement" rows="2"
                                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>
                        </div>

                        <!-- Desarrollo Cognitivo -->
                        <div class="border-b border-gray-200 pb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Desarrollo Cognitivo</h3>
                            <div class="mb-4">
                                <label for="cognitive_development" class="block text-sm font-medium text-gray-700 mb-2">
                                    Desarrollo Cognitivo
                                </label>
                                <input type="text" id="cognitive_development" name="cognitive_development"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                       placeholder='["Hitos1", "Hitos2"]'>
                            </div>
                            <div class="mb-4">
                                <label for="cognitive_development_complement" class="block text-sm font-medium text-gray-700 mb-2">
                                    Complemento
                                </label>
                                <textarea id="cognitive_development_complement" name="cognitive_development_complement" rows="2"
                                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>
                        </div>

                        <!-- Patologías y Medicación -->
                        <div class="border-b border-gray-200 pb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Patologías y Medicación</h3>
                            <div class="mb-4">
                                <label for="pathologies" class="block text-sm font-medium text-gray-700 mb-2">
                                    Patologías
                                </label>
                                <input type="text" id="pathologies" name="pathologies"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                       placeholder='["Patología1", "Patología2"]'>
                            </div>
                            <div class="mb-4">
                                <label for="pathologies_complement" class="block text-sm font-medium text-gray-700 mb-2">
                                    Complemento
                                </label>
                                <textarea id="pathologies_complement" name="pathologies_complement" rows="2"
                                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="psychiatric_medication" class="block text-sm font-medium text-gray-700 mb-2">
                                    Medicación Psiquiátrica
                                </label>
                                <textarea id="psychiatric_medication" name="psychiatric_medication" rows="2"
                                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>
                        </div>

                        <!-- Botones -->
                        <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                            <a href="{{ route('clinic-histories.index') }}" 
                               class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-6 rounded-md transition duration-300">
                                Cancelar
                            </a>
                            <button type="submit" 
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-md transition duration-300 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Crear Historia Clínica
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
