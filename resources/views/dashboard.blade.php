<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Panel de Control') }}
            </h2>
            <div class="text-sm text-gray-600">
                {{ __('Bienvenido de nuevo, ') }} <span class="font-medium">{{ Auth::user()->first_name }}</span>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Cards de Estadísticas -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Card 1: Pacientes Totales -->
                <div class="bg-white overflow-hidden shadow-lg rounded-xl border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Pacientes Activos</p>
                                <p class="text-2xl font-bold text-gray-900">156</p>
                                <p class="text-xs text-green-600">+12% este mes</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Citas Hoy -->
                <div class="bg-white overflow-hidden shadow-lg rounded-xl border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Citas Hoy</p>
                                <p class="text-2xl font-bold text-gray-900">8</p>
                                <p class="text-xs text-blue-600">2 pendientes</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Historias Clínicas -->
                <div class="bg-white overflow-hidden shadow-lg rounded-xl border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Historias Clínicas</p>
                                <p class="text-2xl font-bold text-gray-900">342</p>
                                <p class="text-xs text-gray-600">Total registradas</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Psicólogos -->
                <div class="bg-white overflow-hidden shadow-lg rounded-xl border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Psicólogos</p>
                                <p class="text-2xl font-bold text-gray-900">12</p>
                                <p class="text-xs text-green-600">10 activos</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sección Principal con 2 Columnas -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Columna Izquierda: Accesos Rápidos y Actividad Reciente -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Accesos Rápidos -->
                    <div class="bg-white shadow-lg rounded-xl border border-gray-100">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">{{ __('Accesos Rápidos') }}</h3>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                <a href="{{ route('patients.index') }}" class="group flex flex-col items-center p-4 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        </svg>
                                    </div>
                                    <span class="mt-2 text-sm font-medium text-gray-900">Gestión Pacientes</span>
                                </a>
                                
                                <a href="#" class="group flex flex-col items-center p-4 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center group-hover:bg-green-200 transition-colors">
                                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                        </svg>
                                    </div>
                                    <span class="mt-2 text-sm font-medium text-gray-900">Nueva Cita</span>
                                </a>

                                <a href="#" class="group flex flex-col items-center p-4 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center group-hover:bg-purple-200 transition-colors">
                                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                    </div>
                                    <span class="mt-2 text-sm font-medium text-gray-900">Historial</span>
                                </a>

                                <a href="#" class="group flex flex-col items-center p-4 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center group-hover:bg-indigo-200 transition-colors">
                                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                        </svg>
                                    </div>
                                    <span class="mt-2 text-sm font-medium text-gray-900">Reportes</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Lista Ordenada: Proceso de Atención -->
                    <div class="bg-white shadow-lg rounded-xl border border-gray-100">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">{{ __('Proceso de Atención Clínica') }}</h3>
                        </div>
                        <div class="p-6">
                            <ol class="list-decimal list-inside space-y-3 text-gray-700">
                                <li class="flex items-start">
                                    <span class="font-medium text-blue-600 mr-2">1.</span>
                                    <div>
                                        <span class="font-semibold">Registro inicial del paciente</span>
                                        <p class="text-sm text-gray-600 mt-1">Recopilación de datos personales, antecedentes médicos y motivo de consulta</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <span class="font-medium text-green-600 mr-2">2.</span>
                                    <div>
                                        <span class="font-semibold">Evaluación psicológica inicial</span>
                                        <p class="text-sm text-gray-600 mt-1">Aplicación de pruebas diagnósticas y entrevista clínica estructurada</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <span class="font-medium text-purple-600 mr-2">3.</span>
                                    <div>
                                        <span class="font-semibold">Formulación del plan de tratamiento</span>
                                        <p class="text-sm text-gray-600 mt-1">Definición de objetivos terapéuticos y estrategias de intervención</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <span class="font-medium text-indigo-600 mr-2">4.</span>
                                    <div>
                                        <span class="font-semibold">Implementación del tratamiento</span>
                                        <p class="text-sm text-gray-600 mt-1">Sesiones terapéuticas regulares con seguimiento continuo del progreso</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <span class="font-medium text-red-600 mr-2">5.</span>
                                    <div>
                                        <span class="font-semibold">Evaluación y cierre del proceso</span>
                                        <p class="text-sm text-gray-600 mt-1">Análisis de resultados, planificación de seguimiento y alta terapéutica</p>
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

                <!-- Columna Derecha: Citas del Día y Notificaciones -->
                <div class="space-y-8">
                    <!-- Citas del Día -->
                    <div class="bg-white shadow-lg rounded-xl border border-gray-100">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">{{ __('Citas de Hoy') }}</h3>
                        </div>
                        <div class="p-6">
                            <div class="space-y-4">
                                <div class="flex items-center p-3 bg-blue-50 rounded-lg">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                            <span class="text-sm font-medium text-blue-600">09:00</span>
                                        </div>
                                    </div>
                                    <div class="ml-3 flex-1">
                                        <p class="text-sm font-medium text-gray-900">María González</p>
                                        <p class="text-xs text-gray-600">Consulta de seguimiento</p>
                                    </div>
                                </div>

                                <div class="flex items-center p-3 bg-green-50 rounded-lg">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                            <span class="text-sm font-medium text-green-600">11:30</span>
                                        </div>
                                    </div>
                                    <div class="ml-3 flex-1">
                                        <p class="text-sm font-medium text-gray-900">Carlos Rodríguez</p>
                                        <p class="text-xs text-gray-600">Primera consulta</p>
                                    </div>
                                </div>

                                <div class="flex items-center p-3 bg-purple-50 rounded-lg">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                                            <span class="text-sm font-medium text-purple-600">14:00</span>
                                        </div>
                                    </div>
                                    <div class="ml-3 flex-1">
                                        <p class="text-sm font-medium text-gray-900">Ana Martínez</p>
                                        <p class="text-xs text-gray-600">Terapia familiar</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-4">
                                <a href="#" class="text-sm text-blue-600 hover:text-blue-800 font-medium">Ver todas las citas →</a>
                            </div>
                        </div>
                    </div>

                    <!-- Panel de Notificaciones -->
                    <div class="bg-white shadow-lg rounded-xl border border-gray-100">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">{{ __('Notificaciones') }}</h3>
                        </div>
                        <div class="p-6">
                            <div class="space-y-3">
                                <div class="flex items-start p-3 bg-yellow-50 rounded-lg">
                                    <div class="flex-shrink-0">
                                        <svg class="w-5 h-5 text-yellow-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-gray-900">Recordatorio: Cita con María González en 30 minutos</p>
                                        <p class="text-xs text-gray-600 mt-1">Hace 5 minutos</p>
                                    </div>
                                </div>

                                <div class="flex items-start p-3 bg-green-50 rounded-lg">
                                    <div class="flex-shrink-0">
                                        <svg class="w-5 h-5 text-green-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-gray-900">Historia clínica de Juan Pérez actualizada</p>
                                        <p class="text-xs text-gray-600 mt-1">Hace 1 hora</p>
                                    </div>
                                </div>

                                <div class="flex items-start p-3 bg-blue-50 rounded-lg">
                                    <div class="flex-shrink-0">
                                        <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-gray-900">Nuevo mensaje del Dr. López</p>
                                        <p class="text-xs text-gray-600 mt-1">Hace 2 horas</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
