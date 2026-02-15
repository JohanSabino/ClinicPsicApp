<nav id="header" x-data="{ open: false }"
    class="fixed w-full z-50 top-0 background-clinic-gradient text-white transition-all duration-300 shadow-none">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo Mejorado -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2 group">
                        <!-- Icono del Logo -->
                        <div
                            class="h-10 w-10  rounded-lg flex items-center justify-center shadow-none group-hover:shadow-lg transition-all duration-200 group-hover:scale-105">
                            <svg class="h-10 inline" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                fill="#090979">
                                <style>
                                    @keyframes pulsate {

                                        0%,
                                        to {
                                            transform: scale(1)
                                        }

                                        50% {
                                            transform: scale(.9)
                                        }
                                    }
                                </style>
                                <g style="animation:pulsate .5s ease-in-out infinite both;transform-origin:center center"
                                    stroke-width="1.5">
                                    <path stroke="#00d4ff"
                                        d="M11.515 6.269l.134.132a.5.5 0 00.702 0l.133-.132A4.44 4.44 0 0115.599 5c.578 0 1.15.112 1.684.33a4.41 4.41 0 011.429.939c.408.402.733.88.954 1.406a4.274 4.274 0 010 3.316 4.331 4.331 0 01-.954 1.405l-6.36 6.259a.5.5 0 01-.702 0l-6.36-6.259A4.298 4.298 0 014 9.333c0-1.15.464-2.252 1.29-3.064A4.439 4.439 0 018.401 5c1.168 0 2.288.456 3.114 1.269z" />
                                    <path stroke="#00d4ff" stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.5 7.5c.802.304 1.862 1.43 2 2" />
                                </g>
                            </svg>
                        </div>
                        <!-- Nombre de la App -->
                        <div class="hidden lg:block">
                            <span class="text-xl font-bold toggleColour text-white">
                                {{ config('app.name', 'PsicoApp') }}
                            </span>
                            <div class="text-xs toggleColour text-white/70 -mt-1">Gestión Clínica</div>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <ul class="hidden list-reset sm:ms-10 sm:flex items-center">
                    <li class="mr-3">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    </li>

                    <li class="mr-3">
                        <x-nav-link :href="route('patients.index')" :active="request()->routeIs('patients.*')">
                            {{ __('Pacientes') }}
                        </x-nav-link>
                    </li>

                    <li class="mr-3">
                        <x-nav-link :href="route('appointments.index')" :active="request()->routeIs('appointments.*')">
                            {{ __('Agendar cita') }}
                        </x-nav-link>
                    </li>

                    <li class="mr-3">
                        <x-nav-link :href="route('therapy_sessions.index')"
                            :active="request()->routeIs('therapy_sessions.*')">
                            {{ __('Registrar sesión') }}
                        </x-nav-link>
                    </li>

                    <li class="mr-3">
                        <x-nav-link :href="route('clinic-histories.index')"
                            :active="request()->routeIs('clinic-histories.*')">
                            {{ __('Historias Clínicas') }}
                        </x-nav-link>
                    </li>

                    <li class="mr-3">
                        <x-nav-link :href="route('reports.index')" :active="request()->routeIs('reports.*')">
                            {{ __('Reportes') }}
                        </x-nav-link>
                    </li>
                </ul>
            </div>

            <!-- Settings Dropdown MEJORADO -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="64">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/10 transition-all duration-200">
                            <!-- Foto del Psicólogo -->
                            <div class="relative">
                                @if(Auth::user()->profile_photo)
                                <img class="h-10 w-10 rounded-full object-cover border-2 border-blue-500"
                                    src="{{ Storage::url(Auth::user()->profile_photo) }}"
                                    alt="{{ Auth::user()->name }}">
                                @else
                                <div
                                    class="h-10 w-10 rounded-full background-clinic-gradient flex items-center justify-center border-2 border-blue-500">
                                    <span class="text-white font-bold text-sm">{{ strtoupper(substr(Auth::user()->name,
                                        0, 2)) }}</span>
                                </div>
                                @endif
                                <!-- Indicador de estado online -->
                                <span
                                    class="absolute bottom-0 right-0 block h-3 w-3 rounded-full bg-green-400 border-2 border-white"></span>
                            </div>

                            <!-- Información del Usuario -->
                            <div class="hidden md:block text-left">
                                <div class="text-sm font-semibold toggleColour text-white">{{ Auth::user()->name }}
                                </div>
                                <div class="text-xs toggleColour text-white/80">{{ Auth::user()->email }}</div>
                            </div>

                            <!-- Icono de flecha -->
                            <svg class="h-4 w-4 toggleColour text-white/80 transition-transform duration-200"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Header del Dropdown -->
                        <div class="px-4 py-3 bg-gradient-to-r from-blue-500 to-purple-600">
                            <div class="flex items-center gap-3">
                                @if(Auth::user()->profile_photo)
                                <img class="h-12 w-12 rounded-full object-cover border-2 border-white"
                                    src="{{ Storage::url(Auth::user()->profile_photo) }}"
                                    alt="{{ Auth::user()->name }}">
                                @else
                                <div
                                    class="h-12 w-12 rounded-full bg-white/20 flex items-center justify-center border-2 border-white">
                                    <span class="text-white font-bold text-lg">{{ strtoupper(substr(Auth::user()->name,
                                        0, 2)) }}</span>
                                </div>
                                @endif
                                <div class="text-white">
                                    <div class="font-semibold">{{ Auth::user()->name }}</div>
                                    <div class="text-xs text-white/80">{{ Auth::user()->specialty ?? 'Psicólogo' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sección: Mi Cuenta -->
                        <div class="py-2">
                            <div class="px-4 py-2">
                                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Mi
                                    Cuenta</span>
                            </div>

                            <x-dropdown-link :href="route('profile.edit')" class="flex items-center gap-3 group">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <div>
                                    <div class="font-medium">{{ __('Mi Perfil') }}</div>
                                    <div class="text-xs text-gray-500">Ver y editar información personal</div>
                                </div>
                            </x-dropdown-link>

                            <x-dropdown-link href="#" class="flex items-center gap-3 group">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
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
                                <span
                                    class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Gestión</span>
                            </div>

                            <x-dropdown-link href="#" class="flex items-center gap-3 group">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-green-600 transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-yellow-600 transition-colors"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-purple-600 transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                <span
                                    class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Soporte</span>
                            </div>

                            <x-dropdown-link href="#" class="flex items-center gap-3 group">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-indigo-600 transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div>
                                    <div class="font-medium">{{ __('Centro de Ayuda') }}</div>
                                    <div class="text-xs text-gray-500">Tutoriales y FAQ</div>
                                </div>
                            </x-dropdown-link>

                            <x-dropdown-link href="#" class="flex items-center gap-3 group">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-pink-600 transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                        <!-- <div class="px-4 py-3 bg-gradient-to-r from-amber-50 to-orange-50">
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
                                </div> -->
                        <!-- Barra de progreso -->
                        <!-- <div class="mt-2 h-2 bg-gray-200 rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-blue-500 to-purple-600 rounded-full" style="width: 80%"></div>
                                </div>
                            </div> -->

                        <div class="border-t border-gray-100"></div>

                        <!-- Cerrar Sesión -->
                        <div class="py-2">
                            <form method="POST" action="{{ route('psychologist.logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-4 py-3 text-sm hover:bg-red-50 transition-colors flex items-center gap-3 group">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-red-600 transition-colors"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

                <!-- Language Toggle -->
                @php
                $isEn = app()->getLocale() === 'en';
                @endphp

                <div class="flex items-center ml-4">
                    <span
                        class="toggleColour text-xs mr-2 {{ $isEn ? 'font-normal opacity-60' : 'font-bold' }}">ES</span>

                    <label for="langToggle" class="relative inline-flex items-center cursor-pointer select-none">
                        <input id="langToggle" type="checkbox" class="sr-only" autocomplete="off" {{ $isEn ? 'checked'
                            : '' }}>

                        <!-- Track -->
                        <div class="w-10 h-6 rounded-full border transition-colors duration-300
                                {{ $isEn ? 'bg-gray-200 border-white' : 'bg-white/15 border-white/40' }}">
                        </div>

                        <!-- Knob -->
                        <div class="absolute left-0.5 top-0.5 w-5 h-5 rounded-full bg-white shadow
                                transition-transform duration-300 transform
                                {{ $isEn ? 'translate-x-4' : 'translate-x-0' }}">
                        </div>
                    </label>

                    <span
                        class="toggleColour text-xs ml-2 {{ $isEn ? 'font-bold' : 'font-normal opacity-60' }}">EN</span>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const langToggle = document.getElementById('langToggle');
                        if (langToggle) {
                            langToggle.addEventListener('change', function () {
                                const url = this.checked ?
                                    "{{ route('lang.switch', 'en') }}" :
                                    "{{ route('lang.switch', 'es') }}";
                                window.location.href = url;
                            });
                        }
                    });
                </script>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md toggleColour text-white/80 hover:text-white hover:bg-white/10 focus:outline-none focus:bg-white/10 focus:text-white transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden background-clinic-gradient">

        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"> {{
                __('Dashboard') }} </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <!-- Header del usuario móvil -->
            <div class="px-4 py-3 bg-gradient-to-r from-blue-500 to-purple-600">
                <div class="flex items-center gap-3">
                    @if(Auth::user()->profile_photo)
                    <img class="h-12 w-12 rounded-full object-cover border-2 border-white"
                        src="{{ Storage::url(Auth::user()->profile_photo) }}" alt="{{ Auth::user()->name }}">
                    @else
                    <div
                        class="h-12 w-12 rounded-full bg-white/20 flex items-center justify-center border-2 border-white">
                        <span class="text-white font-bold text-lg">{{ strtoupper(substr(Auth::user()->name, 0, 2))
                            }}</span>
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
                    <x-responsive-nav-link :href="route('psychologist.logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Cerrar Sesión') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

    <script>
        var header = document.getElementById("header");
        var toToggle = document.querySelectorAll(".toggleColour");

        function applyNavbar() {
            if (!header) return;

            var scrolled = window.scrollY > 10;

            // Header background: gradient (default) -> white (scrolled)
        if (scrolled) {
                header.classList.add("bg-white", "shadow-lg");
                header.classList.remove("background-clinic-gradient", "shadow-none");
            } else {
                header.classList.remove("bg-white", "shadow-lg");
                header.classList.add("background-clinic-gradient", "shadow-none");
            }


            // Toggle text colors: white (default) -> gray (scrolled)
            if (scrolled) {
                for (var i = 0; i < toToggle.length; i++) {
                    toToggle[i].classList.add("text-gray-800");
                    toToggle[i].classList.remove("text-white", "text-white/70", "text-white/80");
                }
            } else {
                for (var j = 0; j < toToggle.length; j++) {
                    toToggle[j].classList.remove("text-gray-800");
                    if (toToggle[j].classList.contains('text-xs')) {
                        toToggle[j].classList.add("text-white/70");
                    } else {
                        toToggle[j].classList.add("text-white");
                    }
                }
            }
        }

        document.addEventListener("DOMContentLoaded", applyNavbar);
        document.addEventListener("scroll", applyNavbar);
    </script>

