<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{
    public function index(): JsonResponse
    {
        $patients = Patient::all();
        return response()->json([
            'status' => 'success',
            'data' => $patients
        ], 200);
    }

    public function show($id): JsonResponse
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return response()->json([
                'status' => 'error',
                'message' => 'Paciente no encontrado'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $patient
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'document_type_id' => 'required|integer',
            'identification_number' => 'required|string|unique:patients,identification_number',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'birth_date' => 'required|date',
            'gender' => 'required|string|max:50',
            'sexual_orientation' => 'nullable|string|max:50',
            'height' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'address' => 'nullable|string',
            'marital_status' => 'nullable|string|max:50',
            'school_grades' => 'nullable|string',
            'eps_company' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
        ]);

        $patient = Patient::create($request->all());

        return response()->json([
            'status' => 'success',
            'data' => $patient
        ], 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return response()->json([
                'status' => 'error',
                'message' => 'Paciente no encontrado'
            ], 404);
        }

        $request->validate([
            'document_type_id' => 'sometimes|required|integer',
            'identification_number' => ['sometimes', 'required', 'string', Rule::unique('patients')->ignore($patient->id)],
            'first_name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'phone_number' => 'sometimes|nullable|string|max:20',
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

        return response()->json([
            'status' => 'success',
            'data' => $patient
        ], 200);
    }

    public function destroy($id): JsonResponse
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return response()->json([
                'status' => 'error',
                'message' => 'Paciente no encontrado'
            ], 404);
        }

        $patient->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Paciente eliminado correctamente'
        ], 200);
    }
}