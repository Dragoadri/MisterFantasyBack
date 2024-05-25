<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login()
    {
        $credentials = request(['correo', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'No autorizado'], 401);
        }

        return $this->respuestaToken($token);
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'nickname' => 'required|string|max:255|unique:usuarios',
            'correo' => 'required|string|email|max:255|unique:usuarios',
            'password' => 'required|string|min:6'
        ]);
        $user = Usuario::create([
            'nickname' => $request->nickname,
            'correo' => $request->correo,
            'password' => Hash::make($request->password),
            'rol' => 'user' //Rol de admin se da en bbdd, automaticamente se registran solo user
        ]);
        $token = auth()->login($user);

        return $this->respuestaToken($token);
    }

    protected function respuestaToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
