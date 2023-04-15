<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        if (!Auth::attempt($request->only('email', 'password'))) {

            return response()->json(
                ['message' => 'Unauthorized'], 401   
            );
        }
        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(
            [
                'message'      =>  'welcome ' . $user->name,
                'access_token' =>  $token,
                'token_type'   => 'Bearer',
                'user'         =>  $user,
            ], 200
        );
    }

    public function logout()
    {
        $user = auth()->user();
        if ($user) {
            $user->tokens()->delete();
            return response()->json(
                ['message' => 'Has salido de la aplicación correctamente'], 200
            );
        }
        return response()->json(
            ['message' => 'Primero haz login'], 404 
        );
    }
}
