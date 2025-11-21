<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Sesión #{{ $session->session_number }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow sm:rounded-lg p-6">

                <form method="POST" action="{{ route('therapy_sessions.update', $session->id) }}">
                    @csrf
                    @method('PUT')

                    {{-- FECHA --}}
                    <div class="mb-4">
                        <label class="block font-medium">Fecha *</label>
                        <input type="datetime-local" name="date"
                            value="{{ old('date', \Carbon\Carbon::parse($session->date)->format('Y-m-d\TH:i')) }}"
                            class="w-full border border-gray-300 rounded-md px-3 py-2"
                            required>

                        @error('date')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- OBJETIVOS --}}
                    <div class="mb-4">
                        <label class="block font-medium">Objetivos</label>
                        <textarea name="goals" rows="2"
                                  class="w-full border border-gray-300 rounded-md px-3 py-2">{{ old('goals', $session->goals) }}</textarea>
                        @error('goals')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ABSTRACT --}}
                    <div class="mb-4">
                        <label class="block font-medium">Resumen</label>
                        <textarea name="abstract" rows="2"
                                  class="w-full border border-gray-300 rounded-md px-3 py-2">{{ old('abstract', $session->abstract) }}</textarea>
                        @error('abstract')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- PROGRESS --}}
                    <div class="mb-4">
                        <label class="block font-medium">Progreso</label>
                        <textarea name="progress" rows="2"
                                  class="w-full border border-gray-300 rounded-md px-3 py-2">{{ old('progress', $session->progress) }}</textarea>
                        @error('progress')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- MOOD --}}
                    <div class="mb-4">
                        <label class="block font-medium">Estado de Ánimo *</label>
                        <textarea name="mood_last_term" rows="2"
                                  class="w-full border border-gray-300 rounded-md px-3 py-2">{{ old('mood_last_term', $session->mood_last_term) }}</textarea>
                        @error('mood_last_term')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- INSTRUMENTOS --}}
                    <div class="mb-4">
                        <label class="block font-medium">Instrumentos Psicológicos *</label>
                        <textarea name="psychological_instruments" rows="2"
                                  class="w-full border border-gray-300 rounded-md px-3 py-2">{{ old('psychological_instruments', $session->psychological_instruments) }}</textarea>
                        @error('psychological_instruments')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('therapy_sessions.index') }}"
                           class="bg-gray-500 text-white px-4 py-2 rounded mr-3">
                            Cancelar
                        </a>

                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                            Guardar cambios
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>
