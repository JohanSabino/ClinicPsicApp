        <x-psychologist-guest-layout>
    <div class="container pt-24 px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center h-full">
        @if(Session::exists('success'))
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Success alert!</span> {{ Session::get('success') }}
                </div>
            </div>
        @endif
        <form method="POST" action="{{ route('psychologist.store') }}">
            @csrf
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold leading-9 text-gray-900">Registro para Psicólogos</h2>
                        <p class="mt-2 text-lg leading-6 text-gray-600">Únete a Clinic PsicApp</p>
                        <p class="mt-1 text-sm leading-6 text-gray-500">
                            Completa el formulario para crear tu cuenta profesional y comenzar a gestionar tus pacientes de manera eficiente.
                        </p>
                    </div>
                    
                    <!-- Información importante -->
                    <div class="mb-8 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-blue-600 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <div>
                                <h4 class="text-sm font-semibold text-blue-800">Información importante</h4>
                                <p class="mt-1 text-sm text-blue-700">
                                    • Tu registro será revisado por nuestro equipo antes de la activación<br>
                                    • Necesitarás tu número de tarjeta profesional válida<br>
                                    • Recibirás un correo de confirmación una vez aprobado tu registro
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <x-form.form-label for="first_name">{{ __('Nombres') }}</x-form.form-label>
                            <div class="mt-2">
                                <x-form.form-input type="text" name="first-name" id="first-name" 
                                                   placeholder="Ingresa tu(s) nombre(s)" 
                                                   autocomplete="first-name" 
                                                   value="{{ old('first-name') }}"/>
                                <x-form.form-error name="first-name"/>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <x-form.form-label for="last-name">{{ __('Apellidos') }}</x-form.form-label>
                            <div class="mt-2">
                                <x-form.form-input type="text" name="last-name" id="last-name" 
                                                   placeholder="Ingresa tu(s) apellido(s)" 
                                                   autocomplete="last-name" 
                                                   value="{{ old('last-name') }}"/>
                                <x-form.form-error name="last-name"/>
                            </div>
                        </div>

                        <div class="sm:col-span-6">
                            <x-form.form-label for="email">{{ __('Correo electrónico') }}</x-form.form-label>
                            <div class="mt-2">
                                <x-form.form-input id="email" name="email" type="email" 
                                                   placeholder="ejemplo@gmail.com" 
                                                   autocomplete="email" 
                                                   value="{{ old('email') }}"/>
                                <x-form.form-error name="email"/>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <x-form.form-label for="document-type">{{ __('Tipo de Documento') }}</x-form.form-label>
                            <div class="mt-2">
                                <select id="document-type" name="document-type" autocomplete="document-type" 
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="">-- Selecciona tu tipo de documento --</option>
                                    @foreach($documentTypes as $documentType)
                                        <option value="{{ $documentType->id }}" {{ (int)old('document-type') === $documentType->id ? "selected" : '' }}>{{ $documentType->name }}</option>
                                    @endforeach
                                </select>
                                <x-form.form-error name="document-type"/>
                                <p class="mt-1 text-xs text-gray-500">
                                    Selecciona el tipo de documento de identidad oficial
                                </p>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <x-form.form-label for="identification-number">{{ __('Número de Documento') }}</x-form.form-label>
                            <div class="mt-2">
                                <x-form.form-input type="number" name="identification-number" id="identification-number" 
                                                   placeholder="12345678" 
                                                   autocomplete="identification-number" 
                                                   value="{{ old('identification-number') }}"/>
                                <x-form.form-error name="identification-number"/>
                            </div>
                        </div>

                        <div class="sm:col-span-6">
                            <x-form.form-label for="professional-card-number">{{ __('Número de Tarjeta Profesional') }}</x-form.form-label>
                            <div class="mt-2">
                                <x-form.form-input type="number" name="professional-card-number" id="professional-card-number" 
                                                   placeholder="Ej: 123456789 (Tarjeta profesional COLPSIC)" 
                                                   autocomplete="professional-card-number" 
                                                   value="{{ old('professional-card-number') }}"/>
                                <x-form.form-error name="professional-card-number"/>
                            </div>
                        </div>


                        <div class="sm:col-span-3">
                            <x-form.form-label for="password">{{ __('Contraseña') }}</x-form.form-label>
                            <div class="mt-2">
                                <x-form.form-input type="password" name="password" id="password" 
                                                   placeholder="Mínimo 8 caracteres" 
                                                   autocomplete="new-password"/>
                                <x-form.form-error name="password"/>
                                <p class="mt-1 text-xs text-gray-500">
                                    La contraseña debe tener al menos 8 caracteres e incluir mayúsculas, minúsculas y números.
                                </p>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <x-form.form-label for="password_confirmation">{{ __('Confirmación de contraseña') }}</x-form.form-label>
                            <div class="mt-2">
                                <x-form.form-input type="password" name="password_confirmation" id="password_confirmation" 
                                                   placeholder="Repite tu contraseña" 
                                                   autocomplete="new-password"/>
                                <x-form.form-error name="password_confirmation"/>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="mt-8 space-y-4">
                <!-- Botones principales -->
                <div class="flex items-center justify-between gap-x-6">
                    <a href="{{ route('psychologist.login') }}" 
                       class="text-sm font-semibold leading-6 text-gray-900 hover:text-gray-600 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        {{ __('Volver al Login') }}
                    </a>
                    
                    <div class="flex gap-x-3">
                        <button type="button" 
                                onclick="window.location.href='{{ route('home') }}'"
                                class="rounded-md px-4 py-2 text-sm font-semibold text-gray-900 border border-gray-300 hover:bg-gray-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
                            {{ __('Cancelar') }}
                        </button>
                        <button type="submit" 
                                class="rounded-md bg-gradient-to-r from-blue-600 to-purple-600 px-6 py-2 text-sm font-semibold text-white shadow-sm hover:from-blue-700 hover:to-purple-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 transform transition hover:scale-105 duration-200">
                            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                            </svg>
                            {{ __('Crear Cuenta Profesional') }}
                        </button>
                    </div>
                </div>
                
                <!-- Información adicional -->
                <div class="text-center text-sm text-gray-500 border-t border-gray-200 pt-4">
                    <p>¿Ya tienes una cuenta? 
                        <a href="{{ route('psychologist.login') }}" 
                           class="font-medium text-blue-600 hover:text-blue-500">
                            Inicia sesión aquí
                        </a>
                    </p>
                    <p class="mt-2 text-xs">
                        Al registrarte, aceptas nuestros 
                        <a href="#" class="text-blue-600 hover:text-blue-500">Términos de Servicio</a> 
                        y 
                        <a href="#" class="text-blue-600 hover:text-blue-500">Política de Privacidad</a>
                    </p>
                </div>
            </div>
        </form>

    </div>
</x-psychologist-guest-layout>
