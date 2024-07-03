<x-guest-layout>
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
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Registro de Psicologos</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Por favor diligencie el formulario con los datos requeridos.</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <x-form.form-label for="first_name">{{ __('Nombres') }}</x-form.form-label>
                            <div class="mt-2">
                                <x-form.form-input type="text" name="first-name" id="first-name" autocomplete="first-name"/>
                                <x-form.form-error name="first-name"/>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <x-form.form-label for="last-name">{{ __('Apellidos') }}</x-form.form-label>
                            <div class="mt-2">
                                <x-form.form-input type="text" name="last-name" id="last-name" autocomplete="last-name"/>
                                <x-form.form-error name="last-name"/>
                            </div>
                        </div>

                        <div class="sm:col-span-6">
                            <x-form.form-label for="email">{{ __('Correo electrónico') }}</x-form.form-label>
                            <div class="mt-2">
                                <x-form.form-input id="email" name="email" type="email" autocomplete="email"/>
                                <x-form.form-error name="email"/>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <x-form.form-label for="document-type">{{ __('Tipo de Documento') }}</x-form.form-label>
                            <div class="mt-2">
                                <select id="document-type" name="document-type" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <option value="">-- Selecciona una opción --</option>
                                    @foreach($documentTypes as $documentType)
                                        <option value="{{ $documentType->id }}">{{ $documentType->name }}</option>
                                    @endforeach
                                </select>
                                <x-form.form-error name="document-type"/>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <x-form.form-label for="identification-number">{{ __('Número de Documento') }}</x-form.form-label>
                            <div class="mt-2">
                                <x-form.form-input type="number" name="identification-number" id="identification-number" autocomplete="identification-number"/>
                                <x-form.form-error name="identification-number"/>
                            </div>
                        </div>


                        <div class="sm:col-span-6">
                            <x-form.form-label for="professional-card-number">{{ __('Número de Tarjeta Profesional') }}</x-form.form-label>
                            <div class="mt-2">
                                <x-form.form-input type="text" name="professional-card-number" id="professional-card-number" autocomplete="professional-card-number"/>
                                <x-form.form-error name="professional-card-number"/>
                            </div>
                        </div>


                        <div class="sm:col-span-3">
                            <x-form.form-label for="password">{{ __('Contraseña') }}</x-form.form-label>
                            <div class="mt-2">
                                <x-form.form-input type="text" name="password" id="password" autocomplete="password"/>
                                <x-form.form-error name="password"/>
                            </div>
                        </div>


                        <div class="sm:col-span-3">
                            <x-form.form-label for="password_confirmation">{{ __('Confirmación de contraseña') }}</x-form.form-label>
                            <div class="mt-2">
                                <x-form.form-input type="text" name="password_confirmation" id="password_confirmation" autocomplete="password_confirmation"/>
                                <x-form.form-error name="password_confirmation"/>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>

    </div>
</x-guest-layout>
