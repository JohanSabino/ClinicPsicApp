<?php

namespace App\Http\Controllers\Psychologist\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePsychologistRequest;
use App\Models\DocumentType;
use App\Models\Psychologist;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisteredPsychologistController extends Controller
{
    /**
     * @return View|Factory
     */
    public function create(): View|Factory
    {
        $documentTypes = DocumentType::psychologistDocumentTypes()->get();
        return view('psychologist.auth.create', ['documentTypes' => $documentTypes]);
    }

    /**
     * Creates a new Psychologist
     * @param StorePsychologistRequest $request
     * @return RedirectResponse
     */
    public function store(StorePsychologistRequest $request): RedirectResponse
    {
        $psychologist = new Psychologist();
        $psychologist->first_name = $request->get('first-name');
        $psychologist->last_name = $request->get('last-name');
        $psychologist->email = $request->get('email');
        $psychologist->document_type_id = $request->get('document-type');
        $psychologist->identification_number = $request->get('identification-number');
        $psychologist->professional_card_number = $request->get('professional-card-number');
        $psychologist->password = Hash::make($request->get('password'));
        $psychologist->save();

        return redirect()->route('psychologist.create')->with('success', 'Psychologist created successfully');
    }
}
