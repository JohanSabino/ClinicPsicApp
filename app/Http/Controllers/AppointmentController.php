<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Psychologist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['patient'])
            ->where('psychologist_id', Auth::id())
            ->orderBy('schedule_at', 'asc')
            ->paginate(10);

        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $patients = Patient::orderBy('first_name')->get();

        return view('appointments.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'schedule_at' => 'required|date|after_or_equal:today',
            'status' => 'required|string|in:paid,owed,partial',
            'notes' => 'nullable|string|max:500',
        ], [
            'schedule_at.after_or_equal' => 'La fecha debe ser igual o posterior al día de hoy.',
        ]);

        // Calcular el número de sesión del paciente
        $sessionNumber = Appointment::where('patient_id', $request->patient_id)->count() + 1;

        Appointment::create([
            'patient_id' => $request->patient_id,
            'psychologist_id' => Auth::id(),
            'schedule_at' => $request->schedule_at,
            'status' => $request->status,
            'notes' => $request->notes,
            'session_number' => $sessionNumber,
        ]);

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Cita agendada correctamente.');
    }


    public function show(Appointment $appointment)
    {
        if ($appointment->psychologist_id !== Auth::id()) {
            abort(403, 'No tienes permiso para ver esta cita.');
        }

        $appointment->load(['patient']);
        return view('appointments.show', compact('appointment'));
    }

    public function edit(Appointment $appointment)
    {
        if ($appointment->psychologist_id !== Auth::id()) {
            abort(403, 'No tienes permiso para editar esta cita.');
        }

        $patients = Patient::all();

        return view('appointments.edit', compact('appointment', 'patients'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        if ($appointment->psychologist_id !== Auth::id()) {
            abort(403, 'No tienes permiso para editar esta cita.');
        }

        $request->validate([
            'schedule_at' => 'required|date|after_or_equal:today',
            'status' => 'required|string|in:paid,owed,partial',
            'notes' => 'nullable|string|max:500',
        ]);

        $appointment->update([
            'schedule_at' => $request->schedule_at,
            'status' => $request->status,
            'notes' => $request->notes,
        ]);

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Cita actualizada correctamente.');
    }

    public function destroy(Appointment $appointment)
    {
        if ($appointment->psychologist_id !== Auth::id()) {
            abort(403, 'No tienes permiso para eliminar esta cita.');
        }

        $appointment->delete();

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Cita eliminada.');
    }
}