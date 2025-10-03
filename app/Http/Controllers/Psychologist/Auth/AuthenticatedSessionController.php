<?php
namespace App\Http\Controllers\Psychologist\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Psychologist\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use App\Models\Psychologist;

class AuthenticatedSessionController extends Controller
{
    // --- WEB ---
    public function create()
    {
        Auth::guard('psychologist')->logout();
        return view('psychologist.auth.login');
    }

    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
        return redirect()->intended(route('psychologist.dashboard', absolute: false));
    }

    public function destroy(Request $request)
    {
        Auth::guard('psychologist')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // --- API ---
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
            'user' => $psychologist,
            'token' => $token
        ], 200);
    }

    public function apiLogout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Sesión cerrada correctamente'
        ], 200);
    }

    public function apiMe(Request $request): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'user' => $request->user()
        ], 200);
    }
}