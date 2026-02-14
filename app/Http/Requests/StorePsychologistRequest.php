<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StorePsychologistRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first-name' => ['required', 'string', 'max:255'],
            'last-name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:psychologists'],
            'document-type' => ['required', 'numeric', 'exists:document_types,id'],
            'identification-number' => ['required', 'numeric', 'unique:psychologists,identification_number'],
            'professional-card-number' => ['required', 'integer', 'regex:/^\d{5,6}$/', 'unique:psychologists,professional_card_number'],
            'academic-profile' => ['required', 'string', 'max:1000'],
            'specialty' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function messages(): array
    {
        return [
            'first-name.required' => __('El campo nombre es obligatorio'),
            'last-name.required' => __('El campo apellido es obligatorio'),
            'email.required' => __('El campo "correo electrónico" es obligatorio'),
            'document-type.required' => __('El campo "tipo de documento" es obligatorio'),
            'identification-number.required' => __('El campo "número de documento" es obligatorio'),
            'professional-card-number.required' => __('El campo "número de tarjeta profesional" es obligatorio'),
            'professional-card-number.regex' => __('El campo "número de tarjeta profesional" debe tener una longitud mínima de 5 y máxima de 6 caracteres.'),
            'academic-profile.required' => __('El campo "perfil académico" es obligatorio'),
            'specialty.required' => __('El campo "especialidad" es obligatorio'),
            'phone.required' => __('El campo "teléfono" es obligatorio'),
        ];
    }
}
