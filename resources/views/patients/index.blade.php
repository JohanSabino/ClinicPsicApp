<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Gestión de Pacientes') }}
            </h2>
            <a href="{{ route('patients.create') }}" 
               class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md transition duration-300 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Nuevo Paciente
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Mensaje de éxito -->
            @if(session('success'))
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" onclick="this.parentElement.parentElement.style.display='none';">
                            <title>Cerrar</title>
                            <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                        </svg>
                    </span> 
                </div>
            @endif
            
            <!-- Estadísticas de Pacientes -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700">Total Pacientes</h3>
                            <p class="text-3xl font-bold text-blue-600">{{ count($patients) }}</p>
                        </div>
                        <div class="text-blue-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700">Activos</h3>
                            <p class="text-3xl font-bold text-green-600">{{ collect($patients)->where('status', 'Activo')->count() }}</p>
                        </div>
                        <div class="text-green-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-yellow-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700">Pendientes</h3>
                            <p class="text-3xl font-bold text-yellow-600">{{ collect($patients)->where('status', 'Pendiente')->count() }}</p>
                        </div>
                        <div class="text-yellow-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-red-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700">Inactivos</h3>
                            <p class="text-3xl font-bold text-red-600">{{ collect($patients)->where('status', 'Inactivo')->count() }}</p>
                        </div>
                        <div class="text-red-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabla de Pacientes -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <!-- Filtros y Búsqueda -->
                    <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
                        <div class="flex space-x-4">
                            <div>
                                <input type="text" 
                                       placeholder="Buscar paciente..." 
                                       class="px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <select class="px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Todos los estados</option>
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                    <option value="Pendiente">Pendiente</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Tabla -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Paciente
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Contacto
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Documento
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Estado
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Última Cita
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Próxima Cita
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                           <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($patients as $patient)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">

                                    <!-- PACIENTE -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                                    <span class="text-blue-600 font-medium text-sm">
                                                        {{ strtoupper(substr($patient->first_name, 0, 1) . substr($patient->last_name, 0, 1)) }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $patient->first_name }} {{ $patient->last_name }}
                                                </div>
                                                <div class="text-sm text-gray-500">ID: {{ $patient->id }}</div>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- CONTACTO -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $patient->email ?? 'N/A' }}</div>
                                        <div class="text-sm text-gray-500">{{ $patient->phone_number ?? 'Sin teléfono' }}</div>
                                    </td>

                                    <!-- DOCUMENTO -->
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $patient->identification_number }}
                                    </td>

                                    <!-- ESTADO -->
                                 <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        // Última cita del paciente
                                        $lastAppointment = $patient->appointments->sortByDesc('schedule_at')->first();
                                        $status = $lastAppointment->status ?? null;
                                    @endphp

                                    @if(!$lastAppointment)
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-200 text-gray-700">
                                            Sin citas
                                        </span>

                                    @elseif($status === 0)
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                            Pagada
                                        </span>

                                    @elseif($status === 2)
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Abonada
                                        </span>

                                    @elseif($status === 1)
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                            Adeudada
                                        </span>

                                    @else
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                                            Desconocido
                                        </span>
                                    @endif

                                </td>
                                    <!-- ÚLTIMA CITA -->
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        @php
                                            $last = $patient->appointments->sortByDesc('date')->first();
                                        @endphp
                                        {{ $last ? \Carbon\Carbon::parse($last->date)->format('d/m/Y') : 'N/A' }}
                                    </td>

                                    <!-- PRÓXIMA CITA -->
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        @php
                                            $next = $patient->appointments->where('date','>',now())->sortBy('date')->first();
                                        @endphp
                                        {{ $next ? \Carbon\Carbon::parse($next->date)->format('d/m/Y') : 'N/A' }}
                                    </td>

                                    <!-- ACCIONES -->
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                        <a href="{{ route('patients.show', $patient->id) }}" 
                                        class="text-blue-600 hover:text-blue-900 transition-colors duration-200">
                                            Ver
                                        </a>
                                        <a href="{{ route('patients.edit', $patient->id) }}" 
                                        class="text-indigo-600 hover:text-indigo-900 transition-colors duration-200">
                                            Editar
                                        </a>
                                       <button onclick="confirmDelete({{ $patient->id }})" 
                                                class="text-red-600 hover:text-red-900 transition-colors duration-200">
                                            Eliminar
                                        </button>
                                        <form id="delete-form" action="" method="POST" class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                    </td>

                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>

                    <!-- Paginación -->
                    <div class="mt-6 flex items-center justify-between">
                        <div class="text-sm text-gray-700">
                            Mostrando <span class="font-medium">1</span> a <span class="font-medium">{{ count($patients) }}</span> de <span class="font-medium">{{ count($patients) }}</span> resultados
                        </div>
                        <div class="flex space-x-2">
                            <button class="px-3 py-1 text-sm bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors duration-200">
                                Anterior
                            </button>
                            <button class="px-3 py-1 text-sm bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors duration-200">
                                1
                            </button>
                            <button class="px-3 py-1 text-sm bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors duration-200">
                                Siguiente
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript para confirmación de eliminación -->
        <script>
            function confirmDelete(patientId) {
                if (confirm('¿Estás seguro de que deseas eliminar este paciente?')) {
                    const form = document.getElementById('delete-form');
                    form.action = "/patients/" + patientId; // ruta RESTful
                    form.submit();
                }
            }
        </script>
</x-app-layout>