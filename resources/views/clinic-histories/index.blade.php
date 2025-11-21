<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Historias Clínicas
            </h2>
            <a href="{{ route('clinic-histories.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                Nueva historia
            </a>
        </div>
    </x-slot>

  <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if(session('success'))
                        <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($clinicHistories->count() === 0)
                        <p class="text-gray-600 text-center">
                            Aún no hay historias clínicas registradas.
                        </p>
                    @else
                        <table class="min-w-full bg-white border border-gray-200 rounded-lg text-left">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2 border-b">Paciente</th>
                                    <th class="px-4 py-2 border-b">Motivo de consulta</th>
                                    <th class="px-4 py-2 border-b">Tipo</th>
                                    <th class="px-4 py-2 border-b">Registrada</th>
                                    <th class="px-4 py-2 border-b">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clinicHistories as $history)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-2 border-b">
                                            {{ $history->patient->first_name }} {{ $history->patient->last_name }}
                                        </td>
                                        <td class="px-4 py-2 border-b">
                                            {{ \Illuminate\Support\Str::limit($history->reason_for_consultation, 50) }}
                                        </td>
                                        <td class="px-4 py-2 border-b">
                                            {{ $history->reason_for_consultation_type }}
                                        </td>
                                        <td class="px-4 py-2 border-b">
                                            {{ $history->created_at?->format('d/m/Y') }}
                                        </td>
                                        <td class="px-4 py-2 border-b">
                                            <a href="{{ route('clinic-histories.show', $history->id) }}"
                                               class="text-blue-600 hover:underline">
                                                Ver
                                            </a>

                                            <span class="text-gray-400 mx-1">|</span>

                                            <a href="{{ route('clinic-histories.edit', $history->id) }}"
                                               class="text-yellow-600 hover:underline">
                                                Editar
                                            </a>

                                            <span class="text-gray-400 mx-1">|</span>

                                            <form action="{{ route('clinic-histories.destroy', $history->id) }}"
                                                  method="POST" class="inline"
                                                  onsubmit="return confirm('¿Eliminar esta historia clínica?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-red-600 hover:underline">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4">
                            {{ $clinicHistories->links() }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
