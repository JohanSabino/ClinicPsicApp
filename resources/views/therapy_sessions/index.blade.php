<x-psychologist-app-layout>
    <div class="pt-16">
        <div class="background-clinic-gradient py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center">
                    <h2 class="font-semibold text-2xl text-white leading-tight">
                        Sesiones Clínicas
                    </h2>
                    <a href="{{ route('therapy_sessions.create') }}"
                        class="bg-gradient-to-r from-green-500 to-teal-600 hover:from-green-600 hover:to-teal-700 text-white font-bold py-2 px-4 rounded-lg shadow-lg transition-all duration-200 flex items-center">

                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Registrar sesión
                    </a>
                </div>
            </div>
        </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if(session('success'))
                        <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($sessions->isEmpty())
                        <p class="text-gray-600 text-center">Aún no hay sesiones registradas.</p>
                    @else
                        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                            <thead>
                                <tr class="bg-gray-100 text-left">
                                    <th class="px-4 py-2 border-b">Sesión</th>
                                    <th class="px-4 py-2 border-b">Paciente</th>
                                    <th class="px-4 py-2 border-b">Fecha</th>
                                    <th class="px-4 py-2 border-b">Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($sessions as $session)
                                    <tr class="hover:bg-gray-50">

                                        <td class="px-4 py-2 border-b font-semibold">
                                            #{{ $session->session_number }}
                                        </td>

                                        <td class="px-4 py-2 border-b">
                                            {{ $session->patient->first_name }} {{ $session->patient->last_name }}
                                        </td>

                                        <td class="px-4 py-2 border-b">
                                            {{ \Carbon\Carbon::parse($session->date)->format('d/m/Y') }}
                                        </td>

                                        <td class="px-4 py-2 border-b flex gap-3">

                                            <a href="{{ route('therapy_sessions.show', $session->id) }}"
                                               class="text-blue-600 hover:underline">
                                                Ver
                                            </a>

                                            <a href="{{ route('therapy_sessions.edit', $session->id) }}"
                                               class="text-yellow-600 hover:underline">
                                                Editar
                                            </a>

                                            <form action="{{ route('therapy_sessions.destroy', $session->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('¿Eliminar esta sesión?');">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="text-red-600 hover:underline">
                                                    Eliminar
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4">
                            {{ $sessions->links() }}
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</x-psychologist-app-layout>
