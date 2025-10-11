<?php

namespace App\Http\Controllers;

use App\Models\ClinicHistories;
use Illuminate\Http\Request;

class ClinicHistoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los registros
        $clinicHistories = ClinicHistories::latest()->paginate(10);
        return view('clinic-histories.index', compact('clinicHistories'));
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    // Trae todos los pacientes
    $patients = \App\Models\Patient::all();

    // Envía la variable a la vista
    return view('clinic-histories.create', compact('patients'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'description' => 'required|string',
            'notes' => 'nullable|string',
            // Agrega aquí otros campos según tu tabla
        ]);

        ClinicHistories::create($request->all());

        return redirect()->route('clinic-histories.index')
                         ->with('success', 'Historia clínica creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ClinicHistories $clinicHistories)
    {
        return view('clinic-histories.show', compact('clinicHistories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClinicHistories $clinicHistories)
    {
        return view('clinic-histories.edit', compact('clinicHistories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClinicHistories $clinicHistories)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'description' => 'required|string',
            'notes' => 'nullable|string',
            // Agrega aquí otros campos según tu tabla
        ]);

        $clinicHistories->update($request->all());

        return redirect()->route('clinic-histories.index')
                         ->with('success', 'Historia clínica actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClinicHistories $clinicHistories)
    {
        $clinicHistories->delete();

        return redirect()->route('clinic-histories.index')
                         ->with('success', 'Historia clínica eliminada correctamente.');
    }
}