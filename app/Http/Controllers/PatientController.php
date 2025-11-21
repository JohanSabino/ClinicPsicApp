<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{
    /* ==============================================
       VISTAS
    ============================================== */

    // Mostrar la vista de todos los pacientes
    public function indexView()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    // Mostrar formulario para crear paciente
    public function create()
    {
        return view('patients.create');
    }

    // Mostrar formulario para editar paciente
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    // Mostrar detalles de un paciente
    public function showView($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.show', compact('patient'));
    }

    /* ==============================================
       ACCIONES (POST/PUT/DELETE)
    ============================================== */

    public function store(Request $request)
    {
        $request->validate([
            'document_type_id' => 'required|integer',
            'identification_number' => 'required|numeric|unique:patients,identification_number',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'birth_date' => 'required|date|before_or_equal:today',
            'gender' => 'required|string|max:50',
            'sexual_orientation' => 'nullable|string|max:50',
            'height' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'address' => 'nullable|string',
            'marital_status' => 'nullable|string|max:50',
            'school_grades' => 'nullable|string',
            'eps_company' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
        ], [
            'identification_number.numeric' => 'El número de documento solo puede contener dígitos.',
            'identification_number.unique' => 'Este documento ya está registrado en el sistema.',
            'document_type_id.required' => 'Debe seleccionar un tipo de documento.',
            'first_name.required' => 'El campo nombres es obligatorio.',
            'last_name.required' => 'El campo apellidos es obligatorio.',
            'gender.required' => 'Debe seleccionar un género.',
            'birth_date.required' => 'Debe ingresar la fecha de nacimiento.',
            'birth_date.before_or_equal' => 'La fecha de nacimiento no puede ser mayor a la fecha actual.',
        ]);

        Patient::create($request->all());

        return redirect()->route('patients.index')
                        ->with('success', 'Paciente creado correctamente.');
    }

    public function update(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);

        $request->validate([
            'document_type_id' => 'sometimes|required|integer',
            'identification_number' => ['sometimes', 'required', 'string', Rule::unique('patients')->ignore($patient->id)],
            'first_name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'phone_number' => 'sometimes|nullable|string|max:20',
            'email' => 'sometimes|nullable|email|max:255',
            'birth_date' => 'sometimes|required|date',
            'gender' => 'sometimes|required|string|max:50',
            'sexual_orientation' => 'sometimes|nullable|string|max:50',
            'height' => 'sometimes|nullable|numeric',
            'weight' => 'sometimes|nullable|numeric',
            'address' => 'sometimes|nullable|string',
            'marital_status' => 'sometimes|nullable|string|max:50',
            'school_grades' => 'sometimes|nullable|string',
            'eps_company' => 'sometimes|nullable|string|max:255',
            'occupation' => 'sometimes|nullable|string|max:255',
        ]);

        $patient->update($request->all());

        return redirect()->route('patients.index')->with('success', 'Paciente actualizado correctamente.');
    }

    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Paciente eliminado correctamente.');
    }

    /* ==============================================
       API (JSON)
    ============================================== */

    public function indexApi()
    {
        $patients = Patient::all();
        return response()->json(['status' => 'success', 'data' => $patients], 200);
    }

    public function showApi($id)
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return response()->json(['status' => 'error', 'message' => 'Paciente no encontrado'], 404);
        }

        return response()->json(['status' => 'success', 'data' => $patient], 200);
    }
}