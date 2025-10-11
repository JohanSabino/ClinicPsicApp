<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Muestra los reportes del psicólogo autenticado.
     */
    public function index()
    {
        $psychologist = Auth::user();

        // Obtiene solo los reportes creados por el psicólogo autenticado
        $reports = $psychologist->reports()->latest()->get();

        return view('reports.index', compact('reports'));
    }

    /**
     * Muestra el formulario para crear un nuevo reporte.
     */
    public function create()
    {
        return view('reports.create');
    }

    /**
     * Guarda un nuevo reporte.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $psychologist = Auth::user();

        // Crea el reporte vinculado al psicólogo autenticado
        $psychologist->reports()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('reports.index')
            ->with('success', 'Reporte creado exitosamente.');
    }

    /**
     * Muestra un reporte específico (solo si pertenece al psicólogo).
     */
    public function show(string $id)
    {
        $psychologist = Auth::user();
        $report = $psychologist->reports()->findOrFail($id);

        return view('reports.show', compact('report'));
    }

    /**
     * Muestra el formulario de edición de un reporte.
     */
    public function edit(string $id)
    {
        $psychologist = Auth::user();
        $report = $psychologist->reports()->findOrFail($id);

        return view('reports.edit', compact('report'));
    }

    /**
     * Actualiza un reporte.
     */
    public function update(Request $request, string $id)
    {
        $psychologist = Auth::user();
        $report = $psychologist->reports()->findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $report->update($request->only('title', 'content'));

        return redirect()->route('reports.index')
            ->with('success', 'Reporte actualizado correctamente.');
    }

    /**
     * Elimina un reporte (solo si pertenece al psicólogo).
     */
    public function destroy(string $id)
    {
        $psychologist = Auth::user();
        $report = $psychologist->reports()->findOrFail($id);

        $report->delete();

        return redirect()->route('reports.index')
            ->with('success', 'Reporte eliminado exitosamente.');
    }
}