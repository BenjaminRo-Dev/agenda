<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //Login:
    public function login(Request $request){
        try {
            $user = User::where('email', $request->email)->first();
            if($user){

                if (Auth::attempt($request->only('email', 'password'))) {
                    $user = Auth::user();
                    $token = $request->user()->createToken($request->email.'_Token');
                    
                    return response()->json([
                        'message' => 'Login success',
                        'user' => $user,
                        'token' => $token->plainTextToken,
                        'status_code' => 200,
                    ], 200);
                }else{
                    return response()->json([
                    'message' => 'Password incorrect',
                    'status_code' => 401,
                ], 401);
                }
            }else{
                return response()->json([
                    'message' => 'User not found',
                    'status_code' => 404,
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: '.$e->getMessage(),
                // 'message' => 'Error interno del servidor',
                'status_code' => 500,
            ], 500);
        }
    }
}

// $data = $request->all();
//         $user = User::where('email', $data['email'])->first();
//         if($user && password_verify($data['password'], $user->password)){
//             return response()->json([
//                 'status_code' => 200,
//                 'message' => 'Login exitoso',
//                 'data' => $user
//             ], 200);
//         }else{
//             return response()->json([
//                 'status_code' => 400,
//                 'message' => 'Credenciales incorrectas'
//             ], 400);
//         }
