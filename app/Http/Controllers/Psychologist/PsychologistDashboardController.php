<?php

namespace App\Http\Controllers\Psychologist;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
class PsychologistDashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // ✔ Próximas 3 Citas (HOY hacia adelante)
        $appointmentsToday = Appointment::with('patient')
            ->where('psychologist_id', $userId)
            ->where('schedule_at', '>=', Carbon::now()) // solo futuras
            ->orderBy('schedule_at', 'asc')
            ->take(3)
            ->get();

        // ✔ Conteo citas hoy (todas las de hoy, sin límite)
        $totalAppointmentsToday = Appointment::where('psychologist_id', $userId)
            ->whereDate('schedule_at', Carbon::today())
            ->count();

        // ✔ Pacientes activos
        // ✔ Pacientes activos según citas
        $activePatients = Appointment::where('psychologist_id', $userId)
            ->where('status', 0) // pagadas
            ->distinct('patient_id')
            ->count('patient_id');


        // ✔ Tareas pendientes (placeholder)
        $pendingTasks = 0;

        // ✔ Ingresos del mes (estatus 0 = pagada)
        $monthIncome = Appointment::where('psychologist_id', $userId)
            ->whereMonth('schedule_at', Carbon::now()->month)
            ->where('status', 0)
            ->count() * 50000;

        return view('psychologist.dashboard.dashboard', [
        'appointmentsToday' => $appointmentsToday,
        'totalAppointmentsToday' => $totalAppointmentsToday,
        'activePatients' => $activePatients,
        'pendingTasks' => $pendingTasks,
        'monthIncome' => $monthIncome,
        ]);

    }
}