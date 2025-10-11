<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow-sm">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo Mejorado -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2 group">
                        <!-- Icono del Logo -->
                        <div class="h-10 w-10 background-clinic-gradient rounded-lg flex items-center justify-center shadow-md group-hover:shadow-lg transition-all duration-200 group-hover:scale-105">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                        </div>
                        <!-- Nombre de la App -->
                        <div class="hidden lg:block">
                            <span class="text-xl font-bold text-gradient">
                                {{ config('app.name', 'PsicoApp') }}
                            </span>
                            <div class="text-xs text-gray-500 -mt-1">Gestión Clínica</div>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-1 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link :href="route('patients.index')" :active="request()->routeIs('patients.*')" class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        {{ __('Pacientes') }}
                    </x-nav-link>

                    <x-nav-link :href="route('appointments.index')" :active="request()->routeIs('appointments.*')" class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        {{ __('Agenda') }}
                    </x-nav-link>

                    <x-nav-link :href="route('clinic-histories.index')" :active="request()->routeIs('clinic-histories.*')" class="flex items-center gap-2 leading-tight">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        {{ __('Historias Clínicas') }}
                    </x-nav-link>

                    <x-nav-link :href="route('reports.index')" :active="request()->routeIs('reports.*')" class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        {{ __('Reportes') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown MEJORADO -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="64">
                    <x-slot name="trigger">
                        <button class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 transition-all duration-200">
                            <!-- Foto del Psicólogo -->
                            <div class="relative">
                                @if(Auth::user()->profile_photo)
                                    <img class="h-10 w-10 rounded-full object-cover border-2 border-blue-500" src="{{ Storage::url(Auth::user()->profile_photo) }}" alt="{{ Auth::user()->name }}">
                                @else
                                    <div class="h-10 w-10 rounded-full background-clinic-gradient flex items-center justify-center border-2 border-blue-500">
                                        <span class="text-white font-bold text-sm">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</span>
                                    </div>
                                @endif
                                <!-- Indicador de estado online -->
                                <span class="absolute bottom-0 right-0 block h-3 w-3 rounded-full bg-green-400 border-2 border-white"></span>
                            </div>

                            <!-- Información del Usuario -->
                            <div class="hidden md:block text-left">
                                <div class="text-sm font-semibold text-gray-700">{{ Auth::user()->name }}</div>
                                <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
                            </div>

                            <!-- Icono de flecha -->
                            <svg class="h-4 w-4 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Header del Dropdown -->
                        <div class="px-4 py-3 bg-gradient-to-r from-blue-500 to-purple-600">
                            <div class="flex items-center gap-3">
                                @if(Auth::user()->profile_photo)
                                    <img class="h-12 w-12 rounded-full object-cover border-2 border-white" src="{{ Storage::url(Auth::user()->profile_photo) }}" alt="{{ Auth::user()->name }}">
                                @else
                                    <div class="h-12 w-12 rounded-full bg-white/20 flex items-center justify-center border-2 border-white">
                                        <span class="text-white font-bold text-lg">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</span>
                                    </div>
                                @endif
                                <div class="text-white">
                                    <div class="font-semibold">{{ Auth::user()->name }}</div>
                                    <div class="text-xs text-white/80">{{ Auth::user()->specialty ?? 'Psicólogo' }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Sección: Mi Cuenta -->
                        <div class="py-2">
                            <div class="px-4 py-2">
                                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Mi Cuenta</span>
                            </div>

                            <x-dropdown-link :href="route('profile.edit')" class="flex items-center gap-3 group">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <div>
                                    <div class="font-medium">{{ __('Mi Perfil') }}</div>
                                    <div class="text-xs text-gray-500">Ver y editar información personal</div>
                                </div>
                            </x-dropdown-link>

                            <x-dropdown-link href="#" class="flex items-center gap-3 group">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <div>
                                    <div class="font-medium">{{ __('Configuración') }}</div>
                                    <div class="text-xs text-gray-500">Preferencias y ajustes</div>
                                </div>
                            </x-dropdown-link>
                        </div>

                        <div class="border-t border-gray-100"></div>

                        <!-- Sección: Gestión -->
                        <div class="py-2">
                            <div class="px-4 py-2">
                                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Gestión</span>
                            </div>

                            <x-dropdown-link href="#" class="flex items-center gap-3 group">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-green-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <div>
                                    <div class="font-medium">{{ __('Mi Horario') }}</div>
                                    <div class="text-xs text-gray-500">Configurar disponibilidad</div>
                                </div>
                            </x-dropdown-link>

                            <x-dropdown-link href="#" class="flex items-center gap-3 group">
                                <div class="relative">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-yellow-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-medium">{{ __('Notificaciones') }}</div>
                                    <div class="text-xs text-gray-500">Todo al día</div>
                                </div>
                            </x-dropdown-link>

                            <x-dropdown-link href="#" class="flex items-center gap-3 group">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-purple-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                </svg>
                                <div>
                                    <div class="font-medium">{{ __('Facturación') }}</div>
                                    <div class="text-xs text-gray-500">Planes y pagos</div>
                                </div>
                            </x-dropdown-link>
                        </div>

                        <div class="border-t border-gray-100"></div>

                        <!-- Sección: Soporte -->
                        <div class="py-2">
                            <div class="px-4 py-2">
                                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Soporte</span>
                            </div>

                            <x-dropdown-link href="#" class="flex items-center gap-3 group">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-indigo-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div>
                                    <div class="font-medium">{{ __('Centro de Ayuda') }}</div>
                                    <div class="text-xs text-gray-500">Tutoriales y FAQ</div>
                                </div>
                            </x-dropdown-link>

                            <x-dropdown-link href="#" class="flex items-center gap-3 group">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-pink-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                </svg>
                                <div>
                                    <div class="font-medium">{{ __('Enviar Feedback') }}</div>
                                    <div class="text-xs text-gray-500">Sugerencias y mejoras</div>
                                </div>
                            </x-dropdown-link>
                        </div>

                        <div class="border-t border-gray-100"></div>

                        <!-- Sección: Información de Plan -->
                        <div class="px-4 py-3 bg-gradient-to-r from-amber-50 to-orange-50">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="text-sm font-semibold text-gray-700">Plan Gratuito</div>
                                    <div class="text-xs text-gray-500">4 de 5 pacientes</div>
                                </div>
                                <a href="#" class="text-xs font-semibold text-blue-600 hover:text-blue-700 flex items-center gap-1">
                                    Mejorar
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                    </svg>
                                </a>
                            </div>
                            <!-- Barra de progreso -->
                            <div class="mt-2 h-2 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-blue-500 to-purple-600 rounded-full" style="width: 80%"></div>
                            </div>
                        </div>

                        <div class="border-t border-gray-100"></div>

                        <!-- Cerrar Sesión -->
                        <div class="py-2">
                            <form method="POST" action="{{ route('psychologist.logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-3 text-sm hover:bg-red-50 transition-colors flex items-center gap-3 group">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-red-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    <div>
                                        <div class="font-medium text-red-600">{{ __('Cerrar Sesión') }}</div>
                                        <div class="text-xs text-gray-500">Finalizar sesión actual</div>
                                    </div>
                                </button>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"> {{ __('Dashboard') }} </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <!-- Header del usuario móvil -->
            <div class="px-4 py-3 bg-gradient-to-r from-blue-500 to-purple-600">
                <div class="flex items-center gap-3">
                    @if(Auth::user()->profile_photo)
                        <img class="h-12 w-12 rounded-full object-cover border-2 border-white" src="{{ Storage::url(Auth::user()->profile_photo) }}" alt="{{ Auth::user()->name }}">
                    @else
                        <div class="h-12 w-12 rounded-full bg-white/20 flex items-center justify-center border-2 border-white">
                            <span class="text-white font-bold text-lg">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</span>
                        </div>
                    @endif
                    <div>
                        <div class="font-semibold text-white">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-white/80">{{ Auth::user()->email }}</div>
                    </div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')"> {{ __('Mi Perfil') }} </x-responsive-nav-link>
                <x-responsive-nav-link href="#"> {{ __('Configuración') }} </x-responsive-nav-link>
                <x-responsive-nav-link href="#"> {{ __('Mi Horario') }} </x-responsive-nav-link>
                <x-responsive-nav-link href="#"> {{ __('Notificaciones') }} </x-responsive-nav-link>
                <x-responsive-nav-link href="#"> {{ __('Centro de Ayuda') }} </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('psychologist.logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('psychologist.logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Cerrar Sesión') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
