<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use App\Models\Psychologist;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PsychologistController extends Controller
{
    /**
     * @return View|Factory
     */
    public function create(): View|Factory
    {
        $documentTypes = DocumentType::psychologistDocumentTypes()->get();
        return view('psychologist.create', ['documentTypes' => $documentTypes]);
    }

    /**
     * Creates a new Psychologist
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first-name' => ['required', 'string', 'max:255'],
            'last-name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:psychologists'],
            'document-type' => ['required', 'numeric', 'exists:document_types,id'],
            'identification-number' => ['required', 'numeric'],
            'professional-card-number' => ['required', 'string'],
        ], [
            'first-name.required' => __('El campo nombre es obligatorio'),
            'last-name.required' => __('El campo apellido es obligatorio'),
        ]);


        $psychologist = new Psychologist();
        $psychologist->first_name = $request->get('first-name');
        $psychologist->last_name = $request->get('last-name');
        $psychologist->email = $request->get('email');
        $psychologist->document_type_id = $request->get('document-type');
        $psychologist->identification_number = $request->get('identification-number');
        $psychologist->professional_card_number = $request->get('professional-card-number');
        $psychologist->save();

        return redirect()->route('psychologist.create')->with('success', 'Psychologist created successfully');
    }
}
