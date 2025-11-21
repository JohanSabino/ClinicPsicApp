<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            @php 
                $p = $clinicHistory->patient; 
            @endphp

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Historia Clínica de 
                {{ $p ? $p->first_name . ' ' . $p->last_name : 'Paciente eliminado' }}
            </h2>

            <a href="{{ route('clinic-histories.index') }}"
               class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                Volver
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6 text-gray-900">

                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- INFO BÁSICA --}}
                <section class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Información básica</h3>

                    <p>
                        <span class="font-semibold">Paciente:</span>
                        {{ $p ? $p->first_name . ' ' . $p->last_name : 'Paciente eliminado' }}
                    </p>

                    <p><span class="font-semibold">Tipo motivo consulta:</span>
                        {{ $clinicHistory->reason_for_consultation_type }}
                    </p>

                    <p class="mt-2">
                        <span class="font-semibold">Motivo de consulta:</span><br>
                        <span class="whitespace-pre-line">
                            {{ $clinicHistory->reason_for_consultation }}
                        </span>
                    </p>

                    <p class="mt-2">
                        <span class="font-semibold">Desencadenante:</span><br>
                        <span class="whitespace-pre-line">
                            {{ $clinicHistory->trigger_for_consultation }}
                        </span>
                    </p>
                </section>

                <hr class="my-4">

                {{-- DESARROLLO Y NACIMIENTO --}}
                <section class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Historia de desarrollo y nacimiento</h3>

                    @if($clinicHistory->term_of_pregnancy)
                        <p><span class="font-semibold">Término del embarazo:</span>
                            {{ $clinicHistory->term_of_pregnancy }}
                        </p>
                    @endif

                    {{-- Complicaciones prenatales --}}
                    @php
                        $prenatal = is_array($clinicHistory->prenatal_issues) ? $clinicHistory->prenatal_issues : [];
                    @endphp
                    @if(count($prenatal))
                        <div class="mt-2">
                            <p class="font-semibold">Complicaciones prenatales:</p>
                            <ul class="list-disc pl-5">
                                @foreach($prenatal as $item)
                                    @if($item)
                                        <li>{{ $item }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- birth_data --}}
                    @php
                        $birth = is_array($clinicHistory->birth_data) ? $clinicHistory->birth_data : [];
                    @endphp
                    @if(count($birth))
                        <div class="mt-2">
                            <p class="font-semibold">Datos de nacimiento:</p>
                            <div class="whitespace-pre-line">
                                @foreach($birth as $line)
                                    @if($line)
                                        {{ $line }}@if(!$loop->last){{ "\n" }}@endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if($clinicHistory->birth_data_complement)
                        <p class="mt-2">
                            <span class="font-semibold">Complemento datos de nacimiento:</span><br>
                            <span class="whitespace-pre-line">
                                {{ $clinicHistory->birth_data_complement }}
                            </span>
                        </p>
                    @endif

                    @if($clinicHistory->childhood_description)
                        <p class="mt-2">
                            <span class="font-semibold">Descripción de la infancia:</span><br>
                            <span class="whitespace-pre-line">
                                {{ $clinicHistory->childhood_description }}
                            </span>
                        </p>
                    @endif

                    {{-- Desarrollo cognitivo --}}
                    @php
                        $cog = is_array($clinicHistory->cognitive_development) ? $clinicHistory->cognitive_development : [];
                    @endphp
                    @if(count($cog))
                        <div class="mt-2">
                            <p class="font-semibold">Desarrollo cognitivo (hitos):</p>
                            <ul class="list-disc pl-5">
                                @foreach($cog as $c)
                                    @if($c)
                                        <li>{{ $c }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if($clinicHistory->cognitive_development_complement)
                        <p class="mt-2">
                            <span class="font-semibold">Complemento desarrollo cognitivo:</span><br>
                            <span class="whitespace-pre-line">
                                {{ $clinicHistory->cognitive_development_complement }}
                            </span>
                        </p>
                    @endif
                </section>

                <hr class="my-4">

                {{-- SALUD FÍSICA Y MENTAL --}}
                <section class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Antecedentes de salud</h3>

                    @php
                        $paths = is_array($clinicHistory->pathologies) ? $clinicHistory->pathologies : [];
                    @endphp
                    @if(count($paths))
                        <div class="mt-2">
                            <p class="font-semibold">Patologías relevantes:</p>
                            <ol class="list-decimal pl-5">
                                @foreach($paths as $p)
                                    @if($p)
                                        <li>{{ $p }}</li>
                                    @endif
                                @endforeach
                            </ol>
                        </div>
                    @endif

                    @if($clinicHistory->pathologies_complement)
                        <p class="mt-2 whitespace-pre-line">
                            <span class="font-semibold">Complemento de patologías:</span><br>
                            {{ $clinicHistory->pathologies_complement }}
                        </p>
                    @endif

                    <p class="mt-2">
                        <span class="font-semibold">Medicación psiquiátrica:</span><br>
                        <span class="whitespace-pre-line">
                            {{ $clinicHistory->psychiatric_medication }}
                        </span>
                    </p>

                    @if($clinicHistory->surgeries)
                        <p class="mt-2 whitespace-pre-line">
                            <span class="font-semibold">Cirugías:</span><br>
                            {{ $clinicHistory->surgeries }}
                        </p>
                    @endif

                    @if($clinicHistory->hospitalizations)
                        <p class="mt-2 whitespace-pre-line">
                            <span class="font-semibold">Hospitalizaciones:</span><br>
                            {{ $clinicHistory->hospitalizations }}
                        </p>
                    @endif
                </section>

                <hr class="my-4">

                {{-- FAMILIA Y CONVIVENCIA --}}
                <section class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Familia y convivencia</h3>

                    @php
                        $siblings = is_array($clinicHistory->siblings) ? $clinicHistory->siblings : [];
                    @endphp

                    @if(count($siblings))
                        <div class="mt-2">
                            <p class="font-semibold">Hermanos/as:</p>
                            <ul class="list-disc pl-5">
                                @foreach($siblings as $s)
                                    <li>
                                        @if(is_array($s))
                                            {{ $s['name'] ?? '' }}
                                            @if(!empty($s['age'])) ({{ $s['age'] }} años) @endif
                                            @if(!empty($s['relationship'])) - {{ $s['relationship'] }} @endif
                                        @else
                                            {{ $s }}
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if($clinicHistory->living_with)
                        <p class="mt-2">
                            <span class="font-semibold">Vive con:</span><br>
                            <span class="whitespace-pre-line">{{ $clinicHistory->living_with }}</span>
                        </p>
                    @endif

                    @if($clinicHistory->household)
                        <p class="mt-2">
                            <span class="font-semibold">Descripción del hogar:</span><br>
                            <span class="whitespace-pre-line">{{ $clinicHistory->household }}</span>
                        </p>
                    @endif

                    @if($clinicHistory->marriage_history)
                        <p class="mt-2">
                            <span class="font-semibold">Historia de pareja / matrimonio:</span><br>
                            <span class="whitespace-pre-line">{{ $clinicHistory->marriage_history }}</span>
                        </p>
                    @endif

                    @if($clinicHistory->children)
                        <p class="mt-2">
                            <span class="font-semibold">Hijos:</span> {{ $clinicHistory->children }}
                        </p>
                    @endif

                    @if($clinicHistory->children_relationship)
                        <p class="mt-2">
                            <span class="font-semibold">Relación con hijos:</span><br>
                            <span class="whitespace-pre-line">{{ $clinicHistory->children_relationship }}</span>
                        </p>
                    @endif

                    @if($clinicHistory->parents)
                        <p class="mt-2">
                            <span class="font-semibold">Padres:</span> {{ $clinicHistory->parents }}
                        </p>
                    @endif

                    @if($clinicHistory->parents_relationship)
                        <p class="mt-2">
                            <span class="font-semibold">Relación con padres:</span><br>
                            <span class="whitespace-pre-line">{{ $clinicHistory->parents_relationship }}</span>
                        </p>
                    @endif
                </section>

                <hr class="my-4">

                {{-- HÁBITOS --}}
                <section class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Hábitos y día a día</h3>

                    @php
                        $habits = is_array($clinicHistory->health_habits) ? $clinicHistory->health_habits : [];
                    @endphp

                    @if(count($habits))
                        <div class="mt-2">
                            <p class="font-semibold">Hábitos de salud:</p>
                            <ul class="list-disc pl-5">
                                @foreach($habits as $h)
                                    @if($h)<li>{{ $h }}</li>@endif
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if($clinicHistory->patient_normal_day)
                        <p class="mt-2">
                            <span class="font-semibold">Un día normal del paciente:</span><br>
                            <span class="whitespace-pre-line">{{ $clinicHistory->patient_normal_day }}</span>
                        </p>
                    @endif
                </section>

                <hr class="my-4">

                {{-- ANTECEDENTES FAMILIARES --}}
                <section class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Antecedentes familiares</h3>

                    @php
                        $famP = is_array($clinicHistory->family_psychological_history) ? $clinicHistory->family_psychological_history : [];
                        $famM = is_array($clinicHistory->family_medical_history) ? $clinicHistory->family_medical_history : [];
                        $famN = is_array($clinicHistory->family_neurological_history) ? $clinicHistory->family_neurological_history : [];
                    @endphp

                    {{-- Psicológicos --}}
                    @if(count($famP))
                        <p class="font-semibold">Psicológicos:</p>
                        <ul class="list-disc pl-5">
                            @foreach($famP as $fp)
                                @if($fp)<li>{{ $fp }}</li>@endif
                            @endforeach
                        </ul>
                    @endif

                    @if($clinicHistory->family_psychological_history_complement)
                        <p class="text-sm text-gray-700 whitespace-pre-line mt-1">
                            {{ $clinicHistory->family_psychological_history_complement }}
                        </p>
                    @endif

                    {{-- Médicos --}}
                    @if(count($famM))
                        <p class="font-semibold mt-3">Médicos:</p>
                        <ul class="list-disc pl-5">
                            @foreach($famM as $fm)
                                @if($fm)<li>{{ $fm }}</li>@endif
                            @endforeach
                        </ul>
                    @endif

                    @if($clinicHistory->family_medical_history_complement)
                        <p class="text-sm text-gray-700 whitespace-pre-line mt-1">
                            {{ $clinicHistory->family_medical_history_complement }}
                        </p>
                    @endif

                    {{-- Neurológicos --}}
                    @if(count($famN))
                        <p class="font-semibold mt-3">Neurológicos:</p>
                        <ul class="list-disc pl-5">
                            @foreach($famN as $fn)
                                @if($fn)<li>{{ $fn }}</li>@endif
                            @endforeach
                        </ul>
                    @endif

                    @if($clinicHistory->family_neurological_history_complement)
                        <p class="text-sm text-gray-700 whitespace-pre-line mt-1">
                            {{ $clinicHistory->family_neurological_history_complement }}
                        </p>
                    @endif
                </section>

                <hr class="my-4">

                {{-- PROCESO PSICOLÓGICO --}}
                <section class="mb-2">
                    <h3 class="text-lg font-semibold mb-2">Proceso psicológico</h3>

                    @if($clinicHistory->previous_therapy)
                        <p class="mt-2 whitespace-pre-line">
                            <span class="font-semibold">Terapias previas:</span><br>
                            {{ $clinicHistory->previous_therapy }}
                        </p>
                    @endif

                    @if($clinicHistory->diagnostic_impression_dsmv)
                        <p class="mt-2">
                            <span class="font-semibold">Impresión diagnóstica (DSM-V):</span>
                            {{ $clinicHistory->diagnostic_impression_dsmv }}
                        </p>
                    @endif

                    @if($clinicHistory->general_observations)
                        <p class="mt-2 whitespace-pre-line">
                            <span class="font-semibold">Observaciones generales:</span><br>
                            {{ $clinicHistory->general_observations }}
                        </p>
                    @endif
                </section>

                <div class="flex justify-end mt-6 gap-3">
                    <a href="{{ route('clinic-histories.edit', $clinicHistory->id) }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Editar
                    </a>

                    <a href="{{ route('clinic-histories.index') }}"
                       class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded">
                        Volver
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
