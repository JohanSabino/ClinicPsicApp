<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/home.js'])
</head>

<body class="leading-normal tracking-normal text-white background-clinic-gradient"
    style="font-family: 'Source Sans Pro', sans-serif;">
    <!--Nav-->
    <nav id="header" class="fixed w-full z-30 top-0 bg-transparent text-white transition-colors duration-300">

        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
            <div class="pl-4 flex items-center">
                <x-logo />
            </div>
            <div class="block lg:hidden pr-4">
                <button id="nav-toggle"
                    class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>{{ __('Menu') }}</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>
            <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0
                    bg-white lg:bg-transparent text-gray-800 lg:text-white
                    p-4 lg:p-0 z-20 transition-colors duration-300" id="nav-content">

                <ul class="list-reset lg:flex justify-end flex-1 items-center">
                    <li class="mr-3">
                        <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                            {{ __('Home') }}
                        </x-nav-link>
                    </li>

                    <li class="mr-3">
                        <x-nav-link href="#">
                            {{ __('Contact us') }}
                        </x-nav-link>
                    </li>

                    <li class="mr-3">
                        <x-nav-link href="#">
                            {{ __('Services') }}
                        </x-nav-link>
                    </li>

                    <li class="mr-3">
                        <x-nav-link href="{{ route('psychologist.login') }}">
                            {{ __('Login') }}
                        </x-nav-link>
                    </li>
                </ul>

                {{-- Acciones: Subscribe + Toggle idioma --}}
                @php
                $isEn = app()->getLocale() === 'en';
                @endphp

                <div class="flex flex-col lg:flex-row items-center gap-3 w-full lg:w-auto">
                    {{-- Botón Subscribe --}}
                    <a id="navAction" class="w-full lg:w-auto text-center mx-auto lg:mx-0 hover:underline bg-gray-200 text-gray-900 font-bold rounded-full
              mt-4 lg:mt-0 py-4 px-8 shadow-lg opacity-100 border-2 border-white
              focus:outline-none focus:shadow-outline transform transition hover:scale-105
              duration-300 ease-in-out" href="{{ route('psychologist.register') }}">
                        {{ __('Subscribe') }}
                    </a>

                    {{-- Toggle ES/EN --}}
                    <div class="ml-0 lg:ml-3 mt-3 lg:mt-0 flex items-center">
                        <span class="text-xs font-semibold mr-2 {{ $isEn ? 'text-white/60' : 'text-white' }}">ES</span>

                        <label class="relative inline-flex items-center cursor-pointer select-none">
                            <input id="langToggle" type="checkbox" class="sr-only" {{ $isEn ? 'checked' : '' }}>

                            {{-- Track --}}
                            <div class="w-10 h-6 rounded-full border transition-colors duration-300
            {{ $isEn ? 'bg-gray-200 border-white' : 'bg-white/15 border-white/40' }}">
                            </div>

                            {{-- Knob --}}
                            <div class="absolute left-0.5 top-0.5 w-5 h-5 rounded-full bg-white shadow
            transition-transform duration-300 transform
            {{ $isEn ? 'translate-x-4' : 'translate-x-0' }}">
                            </div>
                        </label>

                        <span
                            class="text-xs font-semibold ml-2 {{ $isEn ? 'text-gray-900' : 'text-white/60' }}">EN</span>
                    </div>
                </div>

                <script>
                    const langToggle = document.getElementById('langToggle');
                    if (langToggle) {
                        langToggle.addEventListener('change', function() {
                            window.location.href = this.checked ?
                                "{{ route('lang.switch', 'en') }}" :
                                "{{ route('lang.switch', 'es') }}";
                        });
                    }
                </script>

            </div>

        </div>
        <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
    </nav>

    {{ $slot }}

    <!--Footer-->
    <footer class="bg-white border-t border-gray-200">
        <div class="container mx-auto px-8">
            <div class="w-full flex flex-col md:flex-row py-8">
                <!-- Logo y descripción -->
                <div class="flex-1 mb-6 text-black">
                    <x-logo />
                    <p class="text-gray-600 mt-4 text-sm leading-relaxed">
                        Clinic PsicApp es la solución integral para la gestión de historias clínicas y administración de
                        pacientes en el sector de salud mental.
                    </p>
                    <div class="flex items-center mt-4 space-x-4">
                        <span class="text-sm text-gray-500">📞 +57 (1) 234-5678</span>
                        <span class="text-sm text-gray-500">✉️ info@clinicpsicapp.com</span>
                    </div>
                </div>

                <!-- Enlaces de Ayuda -->
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6 text-sm font-semibold">Ayuda y Soporte</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-blue-600 text-sm transition-colors">Preguntas
                                Frecuentes</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-blue-600 text-sm transition-colors">Centro
                                de Ayuda</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-blue-600 text-sm transition-colors">Soporte
                                Técnico</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-blue-600 text-sm transition-colors">Tutoriales</a>
                        </li>
                    </ul>
                </div>

                <!-- Enlaces Legales -->
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6 text-sm font-semibold">Legal</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-blue-600 text-sm transition-colors">Términos
                                de Servicio</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-blue-600 text-sm transition-colors">Política
                                de Privacidad</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-blue-600 text-sm transition-colors">Protección
                                de Datos</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-blue-600 text-sm transition-colors">Cookies</a>
                        </li>
                    </ul>
                </div>

                <!-- Redes Sociales -->
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6 text-sm font-semibold">Síguenos</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-blue-600 text-sm transition-colors flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                </svg>
                                Twitter
                            </a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-blue-600 text-sm transition-colors flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z" />
                                </svg>
                                Facebook
                            </a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-blue-600 text-sm transition-colors flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                </svg>
                                LinkedIn
                            </a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-blue-600 text-sm transition-colors flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.890 2.745.098.118.112.221.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.758-1.378l-.749 2.848c-.269 1.045-1.004 2.352-1.498 3.146 1.123.345 2.306.535 3.55.535 6.624 0 11.99-5.367 11.99-11.987C24.007 5.367 18.641.001 12.017.001z" />
                                </svg>
                                Instagram
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Empresa -->
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6 text-sm font-semibold">Empresa</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-blue-600 text-sm transition-colors">Blog
                                Oficial</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-blue-600 text-sm transition-colors">Acerca
                                de Nosotros</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-blue-600 text-sm transition-colors">Contacto</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-blue-600 text-sm transition-colors">Trabaja
                                con Nosotros</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Copyright y información adicional -->
            <div class="border-t border-gray-200 pt-6 pb-4">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="text-center md:text-left mb-4 md:mb-0">
                        <p class="text-sm text-gray-600">
                            © {{ date('Y') }} <strong>Clinic PsicApp</strong>. Todos los derechos reservados.
                        </p>
                        <p class="text-xs text-gray-500 mt-1">
                            Desarrollado con 💙 para profesionales de la salud mental en Colombia
                        </p>
                    </div>
                    <div class="flex items-center space-x-4 text-xs text-gray-500">
                        <span>🔒 Seguro y Confiable</span>
                        <span>🏥 Certificado HIPAA</span>
                        <span>🇨🇴 Hecho en Colombia</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>