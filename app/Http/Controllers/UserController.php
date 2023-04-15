<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'address' => 'required',
                'birthdate' => 'required',
                'city' => 'required'
            ]
        );
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->address = $request->address;
        $user->birthdate = $request->birthdate;
        $user->city = $request->city;
        $user->save();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(
            [
                'user'         => $user,
                'access_token' => $token,
                'token_type'   => 'Bearer'
            ], 200
        );
    }
    public function show(User $user)
    {
        return response()->json(
            [
                'user' => $user,
            ], 200
        );
    }

    public function update(Request $request, User $user)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'address' => 'required',
                'birthdate' => 'required',
                'city' => 'required'
            ]
        );
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->address = $request->address;
        $user->birthdate = $request->birthdate;
        $user->city = $request->city;

        $user->update();

        return response()->json(
            [
                'user' => $user,
            ], 200
        );
    }
    public function destroy($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return response()->json('operación invalida', 404);
        }
        $user->delete();
        return response()->noContent();
    }
}
