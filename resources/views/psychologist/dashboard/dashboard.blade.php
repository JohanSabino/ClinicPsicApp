<x-psychologist-app-layout>
    <div class="background-clinic-gradient pt-24 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-white">
            <h1 class="text-3xl font-bold mb-2">
                ¡Bienvenido de nuevo, {{ Auth::user()->name }}! 👋
            </h1>
            <p class="text-blue-100">
                Aquí tienes un resumen de tu práctica hoy
            </p>
        </div>
    </div>
</div>

    <!-- Stats Cards -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 pb-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Card 1: Citas de Hoy -->
            <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-blue-500 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium uppercase mb-1">Citas Hoy</p>
                        <p class="text-3xl font-bold text-gray-800">8</p>
                        <p class="text-green-600 text-xs mt-2 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z"/>
                            </svg>
                            +12% vs ayer
                        </p>
                    </div>
                    <div class="bg-blue-100 rounded-full p-3">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Card 2: Pacientes Activos -->
            <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-green-500 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium uppercase mb-1">Pacientes Activos</p>
                        <p class="text-3xl font-bold text-gray-800">42</p>
                        <p class="text-blue-600 text-xs mt-2 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"/>
                            </svg>
                            +3 este mes
                        </p>
                    </div>
                    <div class="bg-green-100 rounded-full p-3">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Card 3: Pendientes -->
            <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-yellow-500 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium uppercase mb-1">Tareas Pendientes</p>
                        <p class="text-3xl font-bold text-gray-800">5</p>
                        <p class="text-gray-600 text-xs mt-2">
                            2 urgentes
                        </p>
                    </div>
                    <div class="bg-yellow-100 rounded-full p-3">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Card 4: Ingresos Mes -->
            <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-purple-500 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium uppercase mb-1">Ingresos Mes</p>
                        <p class="text-3xl font-bold text-gray-800">$4.2M</p>
                        <p class="text-green-600 text-xs mt-2 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z"/>
                            </svg>
                            +18% vs mes anterior
                        </p>
                    </div>
                    <div class="bg-purple-100 rounded-full p-3">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Columna Principal (2/3) -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Próximas Citas -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4">
                        <h3 class="text-lg font-semibold text-white flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Próximas Citas de Hoy
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <!-- Cita 1 -->
                            @forelse ($appointmentsToday as $appointment)
                                <div class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                                <div class="flex-shrink-0 w-16 text-center">
                                    <p class="text-2xl font-bold text-blue-600">
                                        {{ \Carbon\Carbon::parse($appointment->schedule_at)->format('H:i') }}
                                    </p>
                                    <p class="text-xs text-gray-500">
                                        {{ \Carbon\Carbon::parse($appointment->schedule_at)->format('A') }}
                                    </p>
                                </div>

                                <div class="ml-4 flex-1">
                                    <p class="font-semibold text-gray-800">
                                        {{ $appointment->patient->first_name }} {{ $appointment->patient->last_name }}
                                    </p>
                                    <p class="text-sm text-gray-600">
                                        Sesión #{{ $appointment->session_number }}
                                    </p>
                                </div>

                                <div class="flex gap-2">
                                    <a href="{{ route('appointments.show', $appointment->id) }}"
                                    class="px-3 py-1 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 text-sm font-medium">
                                        Ver
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500 text-center py-4">No tienes citas próximas.</p>
                        @endforelse
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-200">
                            <a href="#" class="text-blue-600 hover:text-blue-700 font-medium text-sm flex items-center justify-center">
                                Ver todas las citas
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Actividad Reciente -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-500 to-purple-600 px-6 py-4">
                        <h3 class="text-lg font-semibold text-white flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            Actividad Reciente
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-2 h-2 mt-2 bg-green-500 rounded-full"></div>
                                <div class="ml-4">
                                    <p class="text-sm text-gray-800">
                                        <span class="font-semibold">Nueva cita agendada</span> con Juan Pérez
                                    </p>
                                    <p class="text-xs text-gray-500 mt-1">Hace 5 minutos</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-2 h-2 mt-2 bg-blue-500 rounded-full"></div>
                                <div class="ml-4">
                                    <p class="text-sm text-gray-800">
                                        <span class="font-semibold">Historia clínica actualizada</span> para María González
                                    </p>
                                    <p class="text-xs text-gray-500 mt-1">Hace 1 hora</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-2 h-2 mt-2 bg-yellow-500 rounded-full"></div>
                                <div class="ml-4">
                                    <p class="text-sm text-gray-800">
                                        <span class="font-semibold">Recordatorio enviado</span> a 3 pacientes
                                    </p>
                                    <p class="text-xs text-gray-500 mt-1">Hace 2 horas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Columna Lateral (1/3) -->
            <div class="space-y-6">
                <!-- Accesos Rápidos -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-green-500 to-green-600 px-6 py-4">
                        <h3 class="text-lg font-semibold text-white">Accesos Rápidos</h3>
                    </div>
                    <div class="p-4">
                        <div class="grid grid-cols-2 gap-3">
                            <button class="flex flex-col items-center justify-center p-4 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors duration-200">
                                <svg class="w-8 h-8 text-blue-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                <span class="text-xs font-medium text-gray-700">Nueva Cita</span>
                            </button>
                            <button class="flex flex-col items-center justify-center p-4 bg-green-50 hover:bg-green-100 rounded-lg transition-colors duration-200">
                                <svg class="w-8 h-8 text-green-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <span class="text-xs font-medium text-gray-700">Nuevo Paciente</span>
                            </button>
                            <button class="flex flex-col items-center justify-center p-4 bg-purple-50 hover:bg-purple-100 rounded-lg transition-colors duration-200">
                                <svg class="w-8 h-8 text-purple-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <span class="text-xs font-medium text-gray-700">Crear Nota</span>
                            </button>
                            <button class="flex flex-col items-center justify-center p-4 bg-yellow-50 hover:bg-yellow-100 rounded-lg transition-colors duration-200">
                                <svg class="w-8 h-8 text-yellow-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                                <span class="text-xs font-medium text-gray-700">Reportes</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Recordatorios -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 px-6 py-4">
                        <h3 class="text-lg font-semibold text-white flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                            Recordatorios
                        </h3>
                    </div>
                    <div class="p-4">
                        <div class="space-y-3">
                            <div class="p-3 bg-red-50 border-l-4 border-red-500 rounded">
                                <p class="text-sm font-semibold text-red-800">Renovar suscripción</p>
                                <p class="text-xs text-red-600 mt-1">Vence en 5 días</p>
                            </div>
                            <div class="p-3 bg-blue-50 border-l-4 border-blue-500 rounded">
                                <p class="text-sm font-semibold text-blue-800">Revisar historial</p>
                                <p class="text-xs text-blue-600 mt-1">3 pacientes pendientes</p>
                            </div>
                            <div class="p-3 bg-green-50 border-l-4 border-green-500 rounded">
                                <p class="text-sm font-semibold text-green-800">Actualización disponible</p>
                                <p class="text-xs text-green-600 mt-1">Nueva versión 2.0</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tips del Día -->
                <div class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl shadow-lg overflow-hidden text-white p-6">
                    <div class="flex items-start">
                        <svg class="w-6 h-6 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <div>
                            <h4 class="font-semibold mb-2">💡 Tip del Día</h4>
                            <p class="text-sm text-white/90">
                                Tómate 5 minutos entre sesiones para hacer una pausa consciente. Tu bienestar también es importante.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-psychologist-app-layout>