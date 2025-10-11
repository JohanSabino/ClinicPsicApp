<x-psychologist-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Historias Clínicas') }}
            </h2>
            <a href="{{ route('clinic-histories.create') }}" 
               class="bg-gradient-to-r from-green-500 to-teal-600 hover:from-green-600 hover:to-teal-700 text-white font-bold py-2 px-4 rounded-lg shadow-lg transition-all duration-200">
                + Nueva Historia
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="text-center text-gray-500 py-8">Aquí irán las historias clínicas...</p>
                </div>
            </div>
        </div>
    </div>
</x-psychologist-app-layout>