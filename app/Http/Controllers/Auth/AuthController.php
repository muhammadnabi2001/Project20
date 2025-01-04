<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3|max:30'
        ]);
        Auth::attempt($request->only('email', 'password'));
        if (Auth::check()) {
            $token = Auth::user()->createToken('Token')->plainTextToken;
            $responce = [
                'success' => true,
                'data' => Auth::user(),
                'token' => $token
            ];
            return response()->json($responce, 200);
        }
        return response()->json(['error' => 'Unautherized'], 401);
    }
    public function updateProfile(UpdateUserRequest $request)
    {
        $user = $request->user();
        $validated = $request->validated();

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user,
        ], 200);
    }
}
