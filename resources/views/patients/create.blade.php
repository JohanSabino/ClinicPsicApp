<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Nuevo Paciente') }}
            </h2>
            <a href="{{ route('patients.index') }}" 
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
                    
                    <!-- Formulario de Nuevo Paciente -->
                    <form action="{{ route('patients.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- INFORMACIÓN PERSONAL -->
                        <div class="border-b border-gray-200 pb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Información Personal</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

                                <!-- Tipo Documento -->
                                <div>
                                    <label for="document_type_id" class="block text-sm font-medium text-gray-700 mb-2">
                                        Tipo de Documento *
                                    </label>
                                    <select name="document_type_id" id="document_type_id"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                                        <option value="">Seleccione...</option>
                                        @foreach(\App\Models\DocumentType::all() as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Número de documento -->
                                <div>
                                    <label for="identification_number" class="block text-sm font-medium text-gray-700 mb-2">
                                        Número de Documento *
                                    </label>
                                    <input type="text" id="identification_number" name="identification_number"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                                         @error('identification_number')
                                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                        @enderror
                                </div>
                               


                            </div>

                            <!-- Nombres y apellidos -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">Nombres *</label>
                                    <input type="text" id="first_name" name="first_name"
                                        class="w-full px-3 py-2 border rounded-md border-gray-300" required>
                                </div>

                                <div>
                                    <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Apellidos *</label>
                                    <input type="text" id="last_name" name="last_name"
                                        class="w-full px-3 py-2 border rounded-md border-gray-300" required>
                                </div>
                            </div>

                            <!-- Fecha nacimiento -->
                            <div>
                                <label for="birth_date" class="block text-sm font-medium text-gray-700 mb-2">
                                    Fecha de nacimiento *
                                </label>
                                <input type="date" id="birth_date" name="birth_date"
                                    class="w-full px-3 py-2 border rounded-md border-gray-300" required>
                                    @error('birth_date')
                                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                    @enderror
                            </div>
                            
                        </div>

                        <!-- INFORMACIÓN CLÍNICA -->
                        <div class="border-b border-gray-200 pb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Información Clínica</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

                                <!-- Género -->
                                <div>
                                    <label for="gender" class="block text-sm font-medium text-gray-700 mb-2">Género *</label>
                                    <select id="gender" name="gender" class="w-full px-3 py-2 border rounded-md border-gray-300" required>
                                        <option value="">Seleccione...</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>

                                <!-- Orientación Sexual -->
                                <div>
                                    <label for="sexual_orientation" class="block text-sm font-medium text-gray-700 mb-2">
                                        Orientación Sexual
                                    </label>
                                    <input type="text" id="sexual_orientation" name="sexual_orientation"
                                        class="w-full px-3 py-2 border rounded-md border-gray-300">
                                </div>

                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

                                <!-- Peso -->
                                <div>
                                    <label for="weight" class="block text-sm font-medium text-gray-700 mb-2">Peso (Kg)</label>
                                    <input type="number" step="0.1" id="weight" name="weight"
                                        class="w-full px-3 py-2 border rounded-md border-gray-300">
                                </div>

                                <!-- Estatura -->
                                <div>
                                    <label for="height" class="block text-sm font-medium text-gray-700 mb-2">Estatura (cm)</label>
                                    <input type="number" id="height" name="height"
                                        class="w-full px-3 py-2 border rounded-md border-gray-300">
                                </div>

                            </div>

                            <!-- Estado civil -->
                            <div class="mb-4">
                                <label for="marital_status" class="block text-sm font-medium text-gray-700 mb-2">Estado civil</label>
                                <input type="text" id="marital_status" name="marital_status"
                                    class="w-full px-3 py-2 border rounded-md border-gray-300">
                            </div>

                            <!-- Escolaridad -->
                            <div class="mb-4">
                                <label for="school_grades" class="block text-sm font-medium text-gray-700 mb-2">Escolaridad</label>
                                <input type="text" id="school_grades" name="school_grades"
                                    class="w-full px-3 py-2 border rounded-md border-gray-300">
                            </div>

                            <!-- EPS -->
                            <div class="mb-4">
                                <label for="eps_company" class="block text-sm font-medium text-gray-700 mb-2">EPS</label>
                                <input type="text" id="eps_company" name="eps_company"
                                    class="w-full px-3 py-2 border rounded-md border-gray-300">
                            </div>

                            <!-- Ocupación -->
                            <div class="mb-4">
                                <label for="occupation" class="block text-sm font-medium text-gray-700 mb-2">Ocupación</label>
                                <input type="text" id="occupation" name="occupation"
                                    class="w-full px-3 py-2 border rounded-md border-gray-300">
                            </div>

                            <!-- Dirección -->
                            <div class="mb-4">
                                <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Dirección</label>
                                <input type="text" id="address" name="address"
                                    class="w-full px-3 py-2 border rounded-md border-gray-300">
                            </div>

                            <!-- Teléfono -->
                            <div class="mb-4">
                                <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-2">Teléfono</label>
                                <input type="text" id="phone_number" name="phone_number"
                                    class="w-full px-3 py-2 border rounded-md border-gray-300">
                            </div>
                        </div>

                        <!-- BOTONES -->
                        <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                            <a href="{{ route('patients.index') }}"
                            class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-6 rounded-md transition duration-300">
                                Cancelar
                            </a>
                            <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-md transition duration-300">
                                Crear Paciente
                            </button>
                        </div>

                    </form>
                     @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-800 rounded-md">
                            <strong>Se encontraron errores en el formulario:</strong>
                            <ul class="mt-2 list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif       
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript para validación básica -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const requiredFields = form.querySelectorAll('input[required]');
            
            form.addEventListener('submit', function(e) {
                let isValid = true;
                
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        field.classList.add('border-red-500');
                        isValid = false;
                    } else {
                        field.classList.remove('border-red-500');
                    }
                });
                
                if (!isValid) {
                    e.preventDefault();
                    alert('Por favor, complete todos los campos obligatorios marcados con *');
                }
            });
        });
    </script>
</x-app-layout>