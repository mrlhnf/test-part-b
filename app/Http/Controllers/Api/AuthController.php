<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function userLogin(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validator->errors()
            ], 401);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('API Token')->plainTextToken;
        
            return response()->json([
                'status' => 200,
                'message' => 'Logged in',
                'result' => [
                    'user_id' => $user->id,
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                    'role_type' => $user->role_type,
                    'expires_at' => now()->toDateTimeString(),
                ],
            ], 200, [], JSON_PRETTY_PRINT);
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Unauthorized',
            ], 401, [], JSON_PRETTY_PRINT);
        }
    }
}
