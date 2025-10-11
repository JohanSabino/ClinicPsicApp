<?php

namespace App\Http\Controllers\Psychologist\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Psychologist\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use App\Models\Psychologist;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    // --- WEB ---

    /**
     * Mostrar el formulario de login
     */
    public function create(): View
    {
        return view('psychologist.auth.login');
    }

    /**
     * Procesar login web del psicólogo.
     */
   public function store(LoginRequest $request): RedirectResponse 
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    /**
     * Cerrar sesión web del psicólogo.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    // --- API ---

    /**
     * Login vía API y generación de token.
     */
    public function apiLogin(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $psychologist = Psychologist::where('email', $request->email)->first();

        if (!$psychologist || !Hash::check($request->password, $psychologist->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Credenciales inválidas'
            ], 401);
        }

        $token = $psychologist->createToken('api-token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'user' => $psychologist->only(['id', 'first_name', 'last_name', 'email']),
            'token' => $token
        ], 200);
    }

    /**
     * Cerrar sesión vía API (eliminar token).
     */
    public function apiLogout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Sesión cerrada correctamente'
        ], 200);
    }

    /**
     * Obtener información del psicólogo autenticado vía API.
     */
    public function apiMe(Request $request): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'user' => $request->user()->only(['id', 'first_name', 'last_name', 'email'])
        ], 200);
    }
}