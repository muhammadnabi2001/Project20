<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('Users.users', ['users' => $users]);
    }
    public function store(UserStoreRequest $request)
    {
        //dd($request->all());
        $validated = $request->validated();
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        return back();
    }
    public function update(UserUpdateRequest $request, User $user)
    {
        //dd($request->all());
        $validated = $request->validated();

        $user->update([
            'name' => $validated['editname'],
            'email' => $validated['editemail'],
            'password' => isset($validated['editpassword']) ? bcrypt($validated['editpassword']) : $user->password, 
        ]);
        return back();
    }
    public function delete(User $user)
    {
        $user->delete();
        return back();
    }
}
