<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
             /** @var \App\Models\User $user */
            $user = Auth::user();
            $token = $user->createToken('EchoesToken')->plainTextToken;
            
            return response()->json([
                'user' => $user,
                'token' => $token
            ], 200);
        }

        return response()->json([
            'message' => 'Credenciales inválidas'
        ], 401);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        
        return response()->json([
            'message' => 'Sesión cerrada'
        ], 200);
    }
}