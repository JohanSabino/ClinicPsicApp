<x-web-layout>
    <!--Hero Section-->
    <div class="pt-16 sm:pt-20 lg:pt-24 pb-8 sm:pb-12 lg:pb-16">
        <div class="container px-4 sm:px-6 lg:px-8 mx-auto">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-8 lg:gap-12">
                <!--Left Col - Content-->
                <div class="flex flex-col w-full lg:w-1/2 justify-center items-center lg:items-start text-center lg:text-left order-2 lg:order-1">
                    <p class="uppercase tracking-wide text-xs sm:text-sm text-white/80 mb-4 font-medium">
                        {{ __('Tu aliado para una gestión integral de la salud mental') }}
                    </p>
                    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold leading-tight text-white mb-6">
                        {{ config('app.name', 'Laravel') }}
                    </h1>
                    <p class="text-base sm:text-lg lg:text-xl leading-relaxed text-white/90 mb-8 max-w-2xl">
                        Es una aplicación web completa y fácil de usar, diseñada específicamente para psicólogos y psiquiatras, que les permite gestionar de manera eficiente las historias clínicas de sus pacientes.
                    </p>
                    
                    <!-- Botones de acción -->
                    <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                        <button class="w-full sm:w-auto bg-white text-gray-800 font-bold rounded-full py-3 sm:py-4 px-6 sm:px-8 shadow-lg hover:shadow-xl focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                            <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            {{ __("Comenzar Gratis") }}
                        </button>
                        <button class="w-full sm:w-auto border-2 border-white text-white font-semibold rounded-full py-3 sm:py-4 px-6 sm:px-8 hover:bg-white hover:text-gray-800 transition duration-300 ease-in-out">
                            <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m0 0h1m0-1h1M8 9h1v3H8V9zm5 0v5"/>
                            </svg>
                            {{ __("Ver Demo") }}
                        </button>
                    </div>
                    
                    <!-- Stats o badges -->
                    {{-- <div class="flex flex-wrap justify-center lg:justify-start gap-6 mt-8">
                        <div class="text-center">
                            <div class="text-2xl sm:text-3xl font-bold text-white">500+</div>
                            <div class="text-xs sm:text-sm text-white/70">Psicólogos</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl sm:text-3xl font-bold text-white">10K+</div>
                            <div class="text-xs sm:text-sm text-white/70">Pacientes</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl sm:text-3xl font-bold text-white">50K+</div>
                            <div class="text-xs sm:text-sm text-white/70">Consultas</div>
                        </div>
                    </div> --}}
                </div>
                
                <!--Right Col - Image-->
                <div class="w-full lg:w-1/2 order-1 lg:order-2">
                    <div class="relative max-w-lg mx-auto lg:max-w-none">
                        <x-home.home-image-1/>
                        
                        <!-- Floating cards para mejorar el diseño -->
                        <div class="absolute top-4 right-4 bg-white/10 backdrop-blur-md rounded-lg p-3 hidden sm:block">
                            <div class="flex items-center text-white text-sm">
                                <svg class="w-4 h-4 mr-2 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                                Seguro y confiable
                            </div>
                        </div>
                        
                        <div class="absolute bottom-4 left-4 bg-white/10 backdrop-blur-md rounded-lg p-3 hidden sm:block">
                            <div class="flex items-center text-white text-sm">
                                <svg class="w-4 h-4 mr-2 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                HIPAA Compliant
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="relative -mt-12 lg:-mt-24">
        <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg"
             xmlns:xlink="http://www.w3.org/1999/xlink">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <path
                        d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                        opacity="0.100000001"></path>
                    <path
                        d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                        opacity="0.100000001"
                    ></path>
                    <path
                        d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                        id="Path-4" opacity="0.200000003"></path>
                </g>
                <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <path
                        d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"
                    ></path>
                </g>
            </g>
        </svg>
    </div>
    <!-- Features Section -->
    <section class="bg-white py-12 sm:py-16 lg:py-20">
        <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-12 lg:mb-16">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-800 mb-4">
                    Con {{ config('app.name', 'Laravel') }} Puedes:
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-purple-600 mx-auto rounded-full"></div>
                <p class="mt-6 text-lg text-gray-600 max-w-3xl mx-auto">
                    Descubre las herramientas profesionales que transformarán tu práctica clínica
                </p>
            </div>

            <!-- Feature 1 -->
            <div class="flex flex-col lg:flex-row items-center gap-8 lg:gap-12 mb-16 lg:mb-24">
                <div class="w-full lg:w-1/2 order-2 lg:order-1">
                    <div class="max-w-xl">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <span class="text-sm font-semibold text-blue-600 uppercase tracking-wide">Gestión Clínica</span>
                        </div>
                        <h3 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4">
                            Crear y gestionar historias clínicas
                        </h3>
                        <p class="text-base sm:text-lg text-gray-600 mb-6 leading-relaxed">
                            Almacena de forma organizada toda la información relevante de tus pacientes, incluyendo datos demográficos, historial clínico, evaluaciones, planes de tratamiento, notas de sesión y mucho más.
                        </p>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                                Plantillas personalizables para diferentes especialidades
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                                Búsqueda avanzada y filtros inteligentes
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                                Backup automático y seguridad de datos
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 order-1 lg:order-2">
                    <div class="relative">
                        <x-home.home-image-2/>
                        <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-blue-600 rounded-full opacity-20 hidden sm:block"></div>
                        <div class="absolute -top-4 -left-4 w-16 h-16 bg-purple-600 rounded-full opacity-20 hidden sm:block"></div>
                    </div>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="flex flex-col lg:flex-row items-center gap-8 lg:gap-12 mb-16 lg:mb-24">
                <div class="w-full lg:w-1/2">
                    <div class="relative">
                        <x-home.home-image-3/>
                        <div class="absolute -bottom-4 -left-4 w-24 h-24 bg-green-600 rounded-full opacity-20 hidden sm:block"></div>
                        <div class="absolute -top-4 -right-4 w-16 h-16 bg-yellow-600 rounded-full opacity-20 hidden sm:block"></div>
                    </div>
                </div>
                <div class="w-full lg:w-1/2">
                    <div class="max-w-xl lg:ml-auto">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <span class="text-sm font-semibold text-green-600 uppercase tracking-wide">Calendario Inteligente</span>
                        </div>
                        <h3 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4">
                            Agendar citas y gestionar tu calendario
                        </h3>
                        <p class="text-base sm:text-lg text-gray-600 mb-6 leading-relaxed">
                            Programa tus citas de manera eficiente, visualiza tu disponibilidad en tiempo real y envía recordatorios automáticos a tus pacientes.
                        </p>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                                Sincronización con Google Calendar y Outlook
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                                Recordatorios por SMS y email automatizados
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                                Gestión de listas de espera y reprogramación
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap">
                <div class="w-5/6 sm:w-1/2 p-6">
                    <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                        Acceder a tus datos desde cualquier lugar:
                    </h3>
                    <p class="text-gray-600 mb-8">
                        Es una aplicación basada en la nube, por lo que puedes acceder a tu información desde cualquier dispositivo con conexión a internet.
                    </p>
                </div>
                <div class="w-full sm:w-1/2 p-6">
                    <x-home.home-image-4/>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing Section -->
    <section class="bg-gray-50 py-12 sm:py-16 lg:py-20">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-12 lg:mb-16">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-800 mb-4">
                    Planes y Precios
                </h2>
                <p class="text-base sm:text-lg text-gray-600 mb-6 max-w-3xl mx-auto">
                    Elige el plan que mejor se adapte a tu práctica profesional. Todos incluyen soporte técnico y actualizaciones gratuitas.
                </p>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-purple-600 mx-auto rounded-full"></div>
            </div>

            <!-- Pricing Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 max-w-7xl mx-auto">
                <!-- Plan Gratuito -->
                <div class="relative bg-white rounded-2xl shadow-lg border border-gray-200 hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6 sm:p-8">
                        <div class="text-center mb-6">
                            <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-2">Plan Gratuito</h3>
                            <p class="text-gray-600 text-sm">Perfecto para comenzar</p>
                        </div>
                        
                        <div class="text-center mb-6">
                            <div class="text-3xl sm:text-4xl font-bold text-gray-800">$0 COP</div>
                            <div class="text-gray-500 text-sm">por mes</div>
                        </div>

                        <ul class="space-y-3 mb-8">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                                <span class="text-sm text-gray-600">Hasta 5 pacientes registrados</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                                <span class="text-sm text-gray-600">Gestión básica de historias clínicas</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                                <span class="text-sm text-gray-600">Programación de citas manual</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                                <span class="text-sm text-gray-600">Soporte por email</span>
                            </li>
                        </ul>

                        <button class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold py-3 px-6 rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-200 transform hover:scale-105">
                            Comenzar Gratis
                        </button>
                    </div>
                </div>
                <!-- Plan Básico (Destacado) -->
                <div class="relative bg-white rounded-2xl shadow-xl border-2 border-blue-500 hover:shadow-2xl transition-shadow duration-300 transform md:scale-105">
                    <!-- Badge "Más Popular" -->
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                        <span class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                            Más Popular
                        </span>
                    </div>
                    
                    <div class="p-6 sm:p-8">
                        <div class="text-center mb-6">
                            <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-2">Plan Básico</h3>
                            <p class="text-gray-600 text-sm">Para profesionales establecidos</p>
                        </div>
                        
                        <div class="text-center mb-6">
                            <div class="text-3xl sm:text-4xl font-bold text-blue-600">$89.900 COP</div>
                            <div class="text-gray-500 text-sm">por mes</div>
                            <div class="text-green-600 text-xs font-semibold mt-1">¡Ahorra 15% anual!</div>
                        </div>

                        <div class="mb-4">
                            <p class="text-sm font-semibold text-gray-700 mb-3">Todo del Plan Gratuito, más:</p>
                        </div>

                        <ul class="space-y-3 mb-8">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-blue-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                                <span class="text-sm text-gray-600">Hasta 50 pacientes registrados</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-blue-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                                <span class="text-sm text-gray-600">Calendario inteligente de citas</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-blue-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                                <span class="text-sm text-gray-600">Recordatorios automáticos SMS</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-blue-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                                <span class="text-sm text-gray-600">Reportes básicos de consultas</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-blue-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                                <span class="text-sm text-gray-600">Soporte telefónico prioritario</span>
                            </li>
                        </ul>

                        <button class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold py-3 px-6 rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-200 transform hover:scale-105 shadow-lg">
                            Comenzar Prueba
                        </button>
                    </div>
                </div>
                <!-- Plan Profesional -->
                <div class="relative bg-white rounded-2xl shadow-lg border border-gray-200 hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6 sm:p-8">
                        <div class="text-center mb-6">
                            <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-2">Plan Profesional</h3>
                            <p class="text-gray-600 text-sm">Para clínicas y centros</p>
                        </div>
                        
                        <div class="text-center mb-6">
                            <div class="text-3xl sm:text-4xl font-bold text-gray-800">$189.900 COP</div>
                            <div class="text-gray-500 text-sm">por mes</div>
                            <div class="text-green-600 text-xs font-semibold mt-1">¡Ahorra 25% anual!</div>
                        </div>

                        <div class="mb-4">
                            <p class="text-sm font-semibold text-gray-700 mb-3">Todo lo anterior, más:</p>
                        </div>

                        <ul class="space-y-3 mb-8">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-purple-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                                <span class="text-sm text-gray-600">Pacientes ilimitados</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-purple-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                                <span class="text-sm text-gray-600">Análisis avanzados con IA</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-purple-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                                <span class="text-sm text-gray-600">Integración con laboratorios</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-purple-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                                <span class="text-sm text-gray-600">API personalizada</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-purple-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                                <span class="text-sm text-gray-600">Soporte 24/7 dedicado</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-purple-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                                <span class="text-sm text-gray-600">Backup automático diario</span>
                            </li>
                        </ul>

                        <button class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-semibold py-3 px-6 rounded-lg hover:from-purple-700 hover:to-indigo-700 transition-all duration-200 transform hover:scale-105">
                            Contactar Ventas
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Change the colour #f8fafc to match the previous section colour -->
    <svg class="wave-top" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg"
         xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g transform="translate(-1.000000, -14.000000)" fill-rule="nonzero">
                <g class="wave" fill="#f8fafc">
                    <path
                        d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z"
                    ></path>
                </g>
                <g transform="translate(1.000000, 15.000000)" fill="#FFFFFF">
                    <g transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
                        <path
                            d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                            opacity="0.100000001"></path>
                        <path
                            d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                            opacity="0.100000001"
                        ></path>
                        <path
                            d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                            opacity="0.200000003"></path>
                    </g>
                </g>
            </g>
        </g>
    </svg>
    <section class="container mx-auto text-center py-6 mb-12">
        <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-white">
            Suscríbete
        </h2>
        <div class="w-full mb-4">
            <div class="h-1 mx-auto bg-white w-1/6 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <h3 class="my-4 text-3xl leading-tight">
            ¡Comienza a usarlo hoy mismo y experimenta la diferencia!
        </h3>
        <button
            class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            Suscríbete!
        </button>
    </section>
</x-web-layout>
