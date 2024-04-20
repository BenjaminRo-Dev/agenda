<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function validateToken(Request $request)
    {
        $token = $request->headers->get('Authorization');
        return response()->json([
            'message' => 'Token valido',
            'status_code' => 200,
            'token' => $token,
        ], 200);
    }

    //Logout:
    public function logout(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $user->tokens()->delete();
        return response()->json([
            'message' => 'Sesion cerrada',
            'status_code' => 200,
        ], 200);
    }


    //Login:

    public function login(Request $request)
    {
        if(!Auth::attempt($request->only('email', 'password'))){
            return response()->json([
                'message' => 'Credenciales incorrectas',
                'status_code' => 401,
            ], 401);
        }

        $user = User::where('email', $request->email)->first();
        $token = $user->createToken($request->email.'_Token')->plainTextToken;

        return response()->json([
            'message' => 'Login exitoso',
            'status_code' => 200,
            'token' => $token,
            'user' => $user,
        ], 200);
    }

}

