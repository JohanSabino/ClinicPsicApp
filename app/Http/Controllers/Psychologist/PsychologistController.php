<?php

namespace App\Http\Controllers\Psychologist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Psychologist;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class PsychologistController extends Controller
{
    /**
     * Listar todos los psicólogos
     */
   public function index(): JsonResponse
        {
            return response()->json(Psychologist::all(), 200);
        }

    /**
     * Mostrar un psicólogo específico
     */
    public function show($id): JsonResponse
    {
        $psychologist = Psychologist::find($id);

        if (!$psychologist) {
            return response()->json([
                'status' => 'error',
                'message' => 'Psicólogo no encontrado'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $psychologist
        ], 200);
    }

    /**
     * Crear un nuevo psicólogo
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:psychologists,email',
            'password' => 'required|string|min:6',
            'document_type_id' => 'required|integer',
            'identification_number' => 'required|string|unique:psychologists,identification_number',
            'professional_card_number' => 'required|string|unique:psychologists,professional_card_number',
            'academic_profile' => 'required|string',
        ]);

        $psychologist = Psychologist::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'document_type_id' => $request->document_type_id,
            'identification_number' => $request->identification_number,
            'professional_card_number' => $request->professional_card_number,
            'academic_profile' => $request->academic_profile,
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $psychologist
        ], 201);
    }

    /**
     * Actualizar un psicólogo existente
     */
    public function update(Request $request, $id): JsonResponse
    {
        $psychologist = Psychologist::find($id);

        if (!$psychologist) {
            return response()->json([
                'status' => 'error',
                'message' => 'Psicólogo no encontrado'
            ], 404);
        }

        $request->validate([
            'first_name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'email' => ['sometimes', 'required', 'email', Rule::unique('psychologists')->ignore($psychologist->id)],
            'password' => 'sometimes|required|string|min:6',
            'document_type_id' => 'sometimes|required|integer',
            'identification_number' => ['sometimes','required', Rule::unique('psychologists')->ignore($psychologist->id)],
            'professional_card_number' => ['sometimes','required', Rule::unique('psychologists')->ignore($psychologist->id)],
            'academic_profile' => 'sometimes|required|string',
        ]);

        $psychologist->update([
            'first_name' => $request->first_name ?? $psychologist->first_name,
            'last_name' => $request->last_name ?? $psychologist->last_name,
            'email' => $request->email ?? $psychologist->email,
            'password' => $request->password ? Hash::make($request->password) : $psychologist->password,
            'document_type_id' => $request->document_type_id ?? $psychologist->document_type_id,
            'identification_number' => $request->identification_number ?? $psychologist->identification_number,
            'professional_card_number' => $request->professional_card_number ?? $psychologist->professional_card_number,
            'academic_profile' => $request->academic_profile ?? $psychologist->academic_profile,
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $psychologist
        ], 200);
    }

    /**
     * Eliminar un psicólogo
     */
    public function destroy($id): JsonResponse
    {
        $psychologist = Psychologist::find($id);

        if (!$psychologist) {
            return response()->json([
                'status' => 'error',
                'message' => 'Psicólogo no encontrado'
            ], 404);
        }

        $psychologist->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Psicólogo eliminado correctamente'
        ], 200);
    }
    public function all(): JsonResponse
    {
        return response()->json(Psychologist::all(), 200);
    }

}