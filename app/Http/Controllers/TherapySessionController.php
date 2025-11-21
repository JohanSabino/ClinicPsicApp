<?php

namespace App\Http\Controllers;

use App\Models\TherapySession;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TherapySessionController extends Controller
{
    public function index()
    {
        $sessions = TherapySession::with('patient')
            ->where('psychologist_id', Auth::id())
            ->orderBy('date', 'desc')
            ->paginate(15);

        return view('therapy_sessions.index', compact('sessions'));
    }

    public function create()
    {
        $patients = Patient::orderBy('first_name')->get();
        return view('therapy_sessions.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'date' => 'required|date|before_or_equal:today',
            'goals' => 'nullable|string|max:5000',
            'abstract' => 'nullable|string|max:5000',
            'progress' => 'nullable|string|max:5000',
            'mood_last_term' => 'required|string|max:2000',
            'psychological_instruments' => 'required|string|max:2000',
        ], [
            'date.before_or_equal' => 'La fecha de la sesión no puede ser posterior al día de hoy.',
        ]);

        $sessionNumber = TherapySession::where('patient_id', $request->patient_id)->count() + 1;

        $newSession = TherapySession::create([
            'patient_id' => $request->patient_id,
            'psychologist_id' => Auth::id(),
            'session_number' => $sessionNumber,
            'date' => $request->date,
            'goals' => $request->goals,
            'abstract' => $request->abstract,
            'progress' => $request->progress,
            'mood_last_term' => $request->mood_last_term,
            'psychological_instruments' => $request->psychological_instruments,
        ]);

        return redirect()
            ->route('therapy_sessions.show', $newSession->id)
            ->with('success', 'Sesión registrada exitosamente.');
    }

    public function show(TherapySession $session)
    {
        if ($session->psychologist_id !== Auth::id()) {
            abort(403, 'No tienes permiso para ver esta sesión.');
        }

        return view('therapy_sessions.show', compact('session'));
    }

    public function edit(TherapySession $session)
    {
        if ($session->psychologist_id !== Auth::id()) {
            abort(403, 'No tienes permiso para editar esta sesión.');
        }

        $patients = Patient::all();

        return view('therapy_sessions.edit', compact('session', 'patients'));
    }

    public function update(Request $request, TherapySession $session)
    {
        if ($session->psychologist_id !== Auth::id()) {
            abort(403, 'No tienes permiso para editar esta sesión.');
        }

        $request->validate([
            'date' => 'required|date|before_or_equal:today',
            'goals' => 'nullable|string|max:5000',
            'abstract' => 'nullable|string|max:5000',
            'progress' => 'nullable|string|max:5000',
            'mood_last_term' => 'required|string|max:2000',
            'psychological_instruments' => 'required|string|max:2000',
        ]);

        $session->update([
            'date' => $request->date,
            'goals' => $request->goals,
            'abstract' => $request->abstract,
            'progress' => $request->progress,
            'mood_last_term' => $request->mood_last_term,
            'psychological_instruments' => $request->psychological_instruments,
        ]);

        return redirect()
            ->route('therapy_sessions.show', $session->id)
            ->with('success', 'Sesión actualizada correctamente.');
    }

    public function destroy(TherapySession $session)
    {
        if ($session->psychologist_id !== Auth::id()) {
            abort(403, 'No tienes permiso para eliminar esta sesión.');
        }

        $session->delete();

        return redirect()
            ->route('therapy_sessions.index')
            ->with('success', 'Sesión eliminada.');
    }
}