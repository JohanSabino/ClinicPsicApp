<?php

namespace App\Http\Controllers;

use App\Models\ClinicHistories;
use App\Models\Patient;
use Illuminate\Http\Request;

class ClinicHistoriesController extends Controller
{
    /**
     * Listado de historias clínicas.
     */
    public function index()
    {
        $clinicHistories = ClinicHistories::with('patient')
            ->latest()
            ->paginate(10);

        return view('clinic-histories.index', compact('clinicHistories'));
    }

    /**
     * Formulario de creación.
     */
    public function create()
    {
        $patients = Patient::orderBy('first_name')->get();

        return view('clinic-histories.create', compact('patients'));
    }

    /**
     * Guardar historia clínica.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',

            'reason_for_consultation_type' => 'required|string',
            'reason_for_consultation' => 'required|string',
            'trigger_for_consultation' => 'required|string',

            'term_of_pregnancy' => 'nullable|string',

            'prenatal_issues' => 'nullable|array',
            'birth_data' => 'nullable|array',
            'birth_data_complement' => 'nullable|string',

            'childhood_description' => 'nullable|string',

            'cognitive_development' => 'nullable|array',
            'cognitive_development_complement' => 'nullable|string',

            'pathologies' => 'required|array',
            'pathologies_complement' => 'nullable|string',

            'psychiatric_medication' => 'required|string',

            'surgeries' => 'nullable|string',
            'hospitalizations' => 'nullable|string',

            'siblings' => 'nullable|array',

            'living_with' => 'nullable|string',
            'household' => 'nullable|string',
            'marriage_history' => 'nullable|string',

            'children' => 'nullable|string',
            'children_relationship' => 'nullable|string',

            'parents' => 'nullable|string',
            'parents_relationship' => 'nullable|string',

            'health_habits' => 'nullable|array',

            'patient_normal_day' => 'nullable|string',

            'family_psychological_history' => 'nullable|array',
            'family_psychological_history_complement' => 'nullable|string',

            'family_medical_history' => 'nullable|array',
            'family_medical_history_complement' => 'nullable|string',

            'family_neurological_history' => 'nullable|array',
            'family_neurological_history_complement' => 'nullable|string',

            'previous_therapy' => 'nullable|string',

            'diagnostic_impression_dsmv' => 'nullable|string',

            'general_observations' => 'nullable|string',
        ]);

        ClinicHistories::create($validated);

        return redirect()
            ->route('clinic-histories.index')
            ->with('success', 'Historia clínica registrada correctamente.');
    }

    /**
     * Mostrar una historia clínica.
     */
    public function show(ClinicHistories $clinicHistory)
    {
        $clinicHistory->load('patient');

        return view('clinic-histories.show', compact('clinicHistory'));
    }

    /**
     * Formulario de edición.
     */
    public function edit(ClinicHistories $clinicHistory)
    {
        $patients = Patient::orderBy('first_name')->get();

        return view('clinic-histories.edit', compact('clinicHistory', 'patients'));
    }

    /**
     * Actualizar historia clínica.
     */
    public function update(Request $request, ClinicHistories $clinicHistory)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',

            'reason_for_consultation_type' => 'required|string',
            'reason_for_consultation' => 'required|string',
            'trigger_for_consultation' => 'required|string',

            'term_of_pregnancy' => 'nullable|string',

            'prenatal_issues' => 'nullable|array',
            'birth_data' => 'nullable|array',
            'birth_data_complement' => 'nullable|string',

            'childhood_description' => 'nullable|string',

            'cognitive_development' => 'nullable|array',
            'cognitive_development_complement' => 'nullable|string',

            'pathologies' => 'required|array',
            'pathologies_complement' => 'nullable|string',

            'psychiatric_medication' => 'required|string',

            'surgeries' => 'nullable|string',
            'hospitalizations' => 'nullable|string',

            'siblings' => 'nullable|array',

            'living_with' => 'nullable|string',
            'household' => 'nullable|string',
            'marriage_history' => 'nullable|string',

            'children' => 'nullable|string',
            'children_relationship' => 'nullable|string',

            'parents' => 'nullable|string',
            'parents_relationship' => 'nullable|string',

            'health_habits' => 'nullable|array',

            'patient_normal_day' => 'nullable|string',

            'family_psychological_history' => 'nullable|array',
            'family_psychological_history_complement' => 'nullable|string',

            'family_medical_history' => 'nullable|array',
            'family_medical_history_complement' => 'nullable|string',

            'family_neurological_history' => 'nullable|array',
            'family_neurological_history_complement' => 'nullable|string',

            'previous_therapy' => 'nullable|string',

            'diagnostic_impression_dsmv' => 'nullable|string',

            'general_observations' => 'nullable|string',
        ]);

        $clinicHistory->update($validated);

        return redirect()
            ->route('clinic-histories.show', $clinicHistory->id)
            ->with('success', 'Historia clínica actualizada correctamente.');
    }

    /**
     * Eliminar historia clínica.
     */
    public function destroy(ClinicHistories $clinicHistory)
    {
        $clinicHistory->delete();

        return redirect()
            ->route('clinic-histories.index')
            ->with('success', 'Historia clínica eliminada correctamente.');
    }
}