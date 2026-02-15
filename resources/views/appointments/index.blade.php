<x-psychologist-app-layout>
    <div class="pt-16">
        <div class="background-clinic-gradient py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center">
                    <h2 class="font-semibold text-2xl text-white leading-tight">
                        {{ __('Seguimiento de sesiones') }}
                    </h2>
                    <a href="{{ route('appointments.create') }}" 
                       class="bg-gradient-to-r from-green-500 to-teal-600 hover:from-green-600 hover:to-teal-700 text-white font-bold py-2 px-4 rounded-lg shadow-lg transition-all duration-200 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Nueva sesión
                    </a>
                </div>
            </div>
        </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($appointments->isEmpty())
    <p class="text-gray-600">No tienes sesiones registradas.</p>
@else
    <table class="min-w-full bg-white border border-gray-200 rounded-lg">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2 border-b">Sesión</th>
                <th class="px-4 py-2 border-b">Paciente</th>
                <th class="px-4 py-2 border-b">Fecha</th>
                <th class="px-4 py-2 border-b">Estado</th>
                <th class="px-4 py-2 border-b">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border-b">#{{ $appointment->session_number }}</td>

                    <td class="px-4 py-2 border-b">
                        {{ $appointment->patient->first_name }} {{ $appointment->patient->last_name }}
                    </td>

                    <td class="px-4 py-2 border-b">
                        {{ \Carbon\Carbon::parse($appointment->schedule_at)->format('d/m/Y H:i') }}
                    </td>

                    <td class="px-4 py-2 border-b">
                        @if($appointment->status === 'paid')
                            <span class="text-green-600 font-semibold">Pagada</span>
                        @elseif($appointment->status === 'owed')
                            <span class="text-red-600 font-semibold">Adeudada</span>
                        @elseif($appointment->status === 'partial')
                            <span class="text-yellow-600 font-semibold">Abonada</span>
                        @else
                            <span class="text-gray-500">Desconocido</span>
                        @endif
                    </td>


                    <td class="px-4 py-2 border-b">
                        <a href="{{ route('appointments.show', $appointment->id) }}"
                           class="text-blue-600 hover:underline">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $appointments->links() }}
    </div>
@endif

                </div>
            </div>
        </div>
    </div>
</x-psychologist-app-layout>