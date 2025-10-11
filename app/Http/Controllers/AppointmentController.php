<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Solo ver las citas del psicólogo autenticado
        $appointments = Appointment::with(['patient'])
            ->forPsychologist(Auth::id())
            ->orderBy('schedule_at', 'desc')
            ->paginate(15);

        return view('appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    $patients = \App\Models\Patient::all();           // Trae todos los pacientes
    $psychologists = \App\Models\Psychologist::all(); // Trae todos los psicólogos
    return view('appointments.create', compact('patients', 'psychologists'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'session_number' => 'required|integer|min:1',
            'schedule_at' => 'required|date|after:now',
            'goals' => 'nullable|string|max:1000',
        ]);

        $validated['psychologist_id'] = Auth::id();
        $validated['status'] = Appointment::STATUS_SCHEDULED;

        $appointment = Appointment::create($validated);

        return redirect()
            ->route('appointments.show', $appointment)
            ->with('success', 'Cita creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        // 🔒 Solo el psicólogo dueño de la cita puede verla
        if ($appointment->psychologist_id !== Auth::id()) {
            abort(403, 'No tienes permiso para ver esta cita.');
        }

        $appointment->load(['patient', 'psychologist']);

        return view('appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        if ($appointment->psychologist_id !== Auth::id()) {
            abort(403, 'No tienes permiso para editar esta cita.');
        }

        return view('appointments.edit', compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        if ($appointment->psychologist_id !== Auth::id()) {
            abort(403, 'No tienes permiso para actualizar esta cita.');
        }

        $validated = $request->validate([
            'session_number' => 'required|integer|min:1',
            'status' => 'required|integer|min:1|max:6',
            'schedule_at' => 'required|date',
            'goals' => 'nullable|string|max:1000',
            'abstract' => 'nullable|string|max:2000',
            'progress' => 'nullable|string|max:2000',
            'mood_last_term' => 'nullable|string|max:500',
            'psychological_instruments' => 'nullable|string|max:500',
        ]);

        $appointment->update($validated);

        return redirect()
            ->route('appointments.show', $appointment)
            ->with('success', 'Cita actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        if ($appointment->psychologist_id !== Auth::id()) {
            abort(403, 'No tienes permiso para eliminar esta cita.');
        }

        $appointment->delete();

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Cita eliminada exitosamente.');
    }
}