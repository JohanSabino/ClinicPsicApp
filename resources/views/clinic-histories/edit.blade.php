<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar Historia Clínica
            </h2>

            <a href="{{ route('clinic-histories.index') }}"
               class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                Volver
            </a>
        </div>
    </x-slot>

   <div class="py-12">
       <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 shadow sm:rounded-lg text-gray-900">

                {{-- Errores --}}
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-100 text-red-800 border border-red-300 rounded">
                        <strong>Por favor corrija los siguientes errores:</strong>
                        <ul class="list-disc pl-5 mt-2 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('clinic-histories.update', $clinicHistory->id) }}" class="space-y-8">
                    @csrf
                    @method('PUT')

                    <!-- ============================
                         INFORMACIÓN BÁSICA
                    ============================ -->
                    <section>
                        <h3 class="text-lg font-semibold mb-3">Información básica</h3>

                        {{-- Paciente --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Paciente *</label>
                            <select name="patient_id"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2" required>
                                @foreach($patients as $patient)
                                    <option value="{{ $patient->id }}"
                                        {{ old('patient_id', $clinicHistory->patient_id) == $patient->id ? 'selected' : '' }}>
                                        {{ $patient->first_name }} {{ $patient->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Tipo motivo consulta --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Tipo de motivo de consulta *</label>
                            <input type="text" name="reason_for_consultation_type"
                                   value="{{ old('reason_for_consultation_type', $clinicHistory->reason_for_consultation_type) }}"
                                   class="w-full border border-gray-300 rounded-md px-3 py-2" required>
                        </div>

                        {{-- Motivo de consulta --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Motivo de consulta *</label>
                            <textarea name="reason_for_consultation" rows="3"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2"
                                      required>{{ old('reason_for_consultation', $clinicHistory->reason_for_consultation) }}</textarea>
                        </div>

                        {{-- Desencadenante --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Desencadenante *</label>
                            <textarea name="trigger_for_consultation" rows="3"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2"
                                      required>{{ old('trigger_for_consultation', $clinicHistory->trigger_for_consultation) }}</textarea>
                        </div>
                    </section>

                    <hr>

                    <!-- ============================
                         HISTORIA DE DESARROLLO
                    ============================ -->
                    <section>
                        <h3 class="text-lg font-semibold mb-3">Historia de desarrollo y nacimiento</h3>

                        {{-- Término del embarazo --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Término del embarazo</label>
                            <input type="text" name="term_of_pregnancy"
                                   value="{{ old('term_of_pregnancy', $clinicHistory->term_of_pregnancy) }}"
                                   class="w-full border border-gray-300 rounded-md px-3 py-2">
                        </div>

                        {{-- Prenatal issues --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Complicaciones prenatales</label>
                            @php 
                                $prenatal = old('prenatal_issues', $clinicHistory->prenatal_issues ?? ['']); 
                            @endphp
                            @foreach($prenatal as $item)
                                <input type="text" name="prenatal_issues[]"
                                       value="{{ $item }}"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 mb-2">
                            @endforeach
                        </div>

                        {{-- Birth data --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Datos de nacimiento</label>
                            @php $bdata = old('birth_data', $clinicHistory->birth_data ?? ['']); @endphp
                            @foreach($bdata as $b)
                                <input type="text" name="birth_data[]"
                                       value="{{ $b }}"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 mb-2">
                            @endforeach
                        </div>

                        {{-- Complemento --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Complemento datos de nacimiento</label>
                            <textarea name="birth_data_complement" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2">{{ old('birth_data_complement', $clinicHistory->birth_data_complement) }}</textarea>
                        </div>

                        {{-- Infancia --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Descripción de la infancia</label>
                            <textarea name="childhood_description" rows="3"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2">{{ old('childhood_description', $clinicHistory->childhood_description) }}</textarea>
                        </div>

                        {{-- Desarrollo cognitivo --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Desarrollo cognitivo</label>
                            @php 
                                $cog = old('cognitive_development', $clinicHistory->cognitive_development ?? ['']); 
                            @endphp
                            @foreach($cog as $c)
                                <input type="text" name="cognitive_development[]"
                                       value="{{ $c }}"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 mb-2">
                            @endforeach
                        </div>

                        {{-- Complemento cognitivo --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Complemento desarrollo cognitivo</label>
                            <textarea name="cognitive_development_complement" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2">{{ old('cognitive_development_complement', $clinicHistory->cognitive_development_complement) }}</textarea>
                        </div>
                    </section>

                    <hr>

                    <!-- ============================
                         SALUD Y PATOLOGÍAS
                    ============================ -->
                    <section>
                        <h3 class="text-lg font-semibold mb-3">Salud y antecedentes médicos</h3>

                        {{-- Patologías --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Patologías *</label>
                            @php 
                                $pats = old('pathologies', $clinicHistory->pathologies ?? ['']); 
                            @endphp
                            @foreach($pats as $pat)
                                <input type="text" name="pathologies[]" value="{{ $pat }}"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 mb-2">
                            @endforeach
                        </div>

                        {{-- Complemento --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Complemento patologías</label>
                            <textarea name="pathologies_complement" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2">{{ old('pathologies_complement', $clinicHistory->pathologies_complement) }}</textarea>
                        </div>

                        {{-- Medicación --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Medicación psiquiátrica *</label>
                            <textarea name="psychiatric_medication" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2"
                                      required>{{ old('psychiatric_medication', $clinicHistory->psychiatric_medication) }}</textarea>
                        </div>

                        {{-- Cirugías --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Cirugías</label>
                            <textarea name="surgeries" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2">{{ old('surgeries', $clinicHistory->surgeries) }}</textarea>
                        </div>

                        {{-- Hospitalizaciones --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Hospitalizaciones</label>
                            <textarea name="hospitalizations" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2">{{ old('hospitalizations', $clinicHistory->hospitalizations) }}</textarea>
                        </div>
                    </section>

                    <hr>

                    <!-- ============================
                         FAMILIA Y CONVIVENCIA
                    ============================ -->
                    <section>
                        <h3 class="text-lg font-semibold mb-3">Familia y convivencia</h3>

                        {{-- Hermanos dinámicos --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Hermanos</label>

                            <div id="siblings-container" class="space-y-3">
                                @php 
                                    $siblings = old('siblings', $clinicHistory->siblings ?? []);
                                    if (empty($siblings)) {
                                        $siblings = [['name'=>'','age'=>'','relationship'=>'']];
                                    }
                                @endphp

                                @foreach($siblings as $i => $s)
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2 sibling-row">
                                        <input type="text" name="siblings[{{ $i }}][name]"
                                               value="{{ $s['name'] ?? '' }}"
                                               placeholder="Nombre"
                                               class="border border-gray-300 rounded-md px-3 py-2">

                                        <input type="text" name="siblings[{{ $i }}][age]"
                                               value="{{ $s['age'] ?? '' }}"
                                               placeholder="Edad"
                                               class="border border-gray-300 rounded-md px-3 py-2">

                                        <input type="text" name="siblings[{{ $i }}][relationship]"
                                               value="{{ $s['relationship'] ?? '' }}"
                                               placeholder="Relación"
                                               class="border border-gray-300 rounded-md px-3 py-2">
                                    </div>
                                @endforeach
                            </div>

                            <button type="button" id="add-sibling"
                                    class="mt-2 text-sm text-blue-600 hover:underline">
                                + Agregar otro hermano
                            </button>
                        </div>

                        {{-- Vive con --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Vive con</label>
                            <textarea name="living_with" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2">{{ old('living_with', $clinicHistory->living_with) }}</textarea>
                        </div>

                        {{-- Hogar --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Descripción del hogar</label>
                            <textarea name="household" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2">{{ old('household', $clinicHistory->household) }}</textarea>
                        </div>

                        {{-- Matrimonio --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Historia de pareja / matrimonio</label>
                            <textarea name="marriage_history" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2">{{ old('marriage_history', $clinicHistory->marriage_history) }}</textarea>
                        </div>

                        {{-- Hijos --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Hijos</label>
                            <input type="text" name="children"
                                   value="{{ old('children', $clinicHistory->children) }}"
                                   class="w-full border border-gray-300 rounded-md px-3 py-2">
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium mb-1">Relación con hijos</label>
                            <textarea name="children_relationship" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2">{{ old('children_relationship', $clinicHistory->children_relationship) }}</textarea>
                        </div>

                        {{-- Padres --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Padres</label>
                            <input type="text" name="parents"
                                   value="{{ old('parents', $clinicHistory->parents) }}"
                                   class="w-full border border-gray-300 rounded-md px-3 py-2">
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium mb-1">Relación con padres</label>
                            <textarea name="parents_relationship" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2">{{ old('parents_relationship', $clinicHistory->parents_relationship) }}</textarea>
                        </div>
                    </section>

                    <hr>

                    <!-- ============================
                         HÁBITOS Y DÍA A DÍA
                    ============================ -->
                    <section>
                        <h3 class="text-lg font-semibold mb-3">Hábitos y día a día</h3>

                        {{-- Hábitos --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Hábitos de salud</label>
                            @php 
                                $habits = old('health_habits', $clinicHistory->health_habits ?? ['']);
                            @endphp

                            @foreach($habits as $h)
                                <input type="text" name="health_habits[]" value="{{ $h }}"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 mb-2">
                            @endforeach
                        </div>

                        {{-- Día normal --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Un día normal del paciente</label>
                            <textarea name="patient_normal_day" rows="3"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2">{{ old('patient_normal_day', $clinicHistory->patient_normal_day) }}</textarea>
                        </div>
                    </section>

                    <hr>

                    <!-- ============================
                         ANTECEDENTES FAMILIARES
                    ============================ -->
                    <section>
                        <h3 class="text-lg font-semibold mb-3">Antecedentes familiares</h3>

                        {{-- Psicológicos --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Antecedentes psicológicos</label>
                            @php 
                                $fp = old('family_psychological_history', $clinicHistory->family_psychological_history ?? ['']);
                            @endphp

                            @foreach($fp as $item)
                                <input type="text" name="family_psychological_history[]"
                                       value="{{ $item }}"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 mb-2">
                            @endforeach

                            <textarea name="family_psychological_history_complement" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2"
                                      placeholder="Comentarios...">{{ old('family_psychological_history_complement', $clinicHistory->family_psychological_history_complement) }}</textarea>
                        </div>

                        {{-- Médicos --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Antecedentes médicos</label>
                            @php 
                                $fm = old('family_medical_history', $clinicHistory->family_medical_history ?? ['']);
                            @endphp

                            @foreach($fm as $item)
                                <input type="text" name="family_medical_history[]"
                                       value="{{ $item }}"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 mb-2">
                            @endforeach

                            <textarea name="family_medical_history_complement" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2"
                                      placeholder="Comentarios...">{{ old('family_medical_history_complement', $clinicHistory->family_medical_history_complement) }}</textarea>
                        </div>

                        {{-- Neurológicos --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Antecedentes neurológicos</label>
                            @php 
                                $fn = old('family_neurological_history', $clinicHistory->family_neurological_history ?? ['']);
                            @endphp

                            @foreach($fn as $item)
                                <input type="text" name="family_neurological_history[]"
                                       value="{{ $item }}"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2 mb-2">
                            @endforeach

                            <textarea name="family_neurological_history_complement" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2"
                                      placeholder="Comentarios...">{{ old('family_neurological_history_complement', $clinicHistory->family_neurological_history_complement) }}</textarea>
                        </div>
                    </section>

                    <hr>

                    <!-- ============================
                         PROCESO PSICOLÓGICO
                    ============================ -->
                    <section>
                        <h3 class="text-lg font-semibold mb-3">Proceso psicológico</h3>

                        {{-- Terapias previas --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Terapias previas</label>
                            <textarea name="previous_therapy" rows="2"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2">{{ old('previous_therapy', $clinicHistory->previous_therapy) }}</textarea>
                        </div>

                        {{-- Diagnóstico DSM-V --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Impresión diagnóstica (DSM-V)</label>
                            <input type="text" name="diagnostic_impression_dsmv"
                                   value="{{ old('diagnostic_impression_dsmv', $clinicHistory->diagnostic_impression_dsmv) }}"
                                   class="w-full border border-gray-300 rounded-md px-3 py-2">
                        </div>

                        {{-- Observaciones --}}
                        <div class="mb-4">
                            <label class="block font-medium mb-1">Observaciones generales</label>
                            <textarea name="general_observations" rows="3"
                                      class="w-full border border-gray-300 rounded-md px-3 py-2">{{ old('general_observations', $clinicHistory->general_observations) }}</textarea>
                        </div>
                    </section>

                    <div class="flex justify-end">
                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                            Guardar cambios
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    {{-- JS para agregar hermanos --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.getElementById('siblings-container');
            const addBtn = document.getElementById('add-sibling');
            let index = {{ count($siblings ?? []) }};

            addBtn.addEventListener('click', () => {
                const row = document.createElement('div');
                row.className = 'grid grid-cols-1 md:grid-cols-3 gap-2 sibling-row';

                row.innerHTML = `
                    <input type="text" name="siblings[${index}][name]" placeholder="Nombre"
                           class="border border-gray-300 rounded-md px-3 py-2">
                    <input type="text" name="siblings[${index}][age]" placeholder="Edad"
                           class="border border-gray-300 rounded-md px-3 py-2">
                    <input type="text" name="siblings[${index}][relationship]" placeholder="Relación"
                           class="border border-gray-300 rounded-md px-3 py-2">
                `;

                container.appendChild(row);
                index++;
            });
        });
    </script>

</x-app-layout>
