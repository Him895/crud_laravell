<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Trade;

class Authscontroller extends Controller

{
public function register(Request $request)
    {
    $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:trade,email',
            'password' => 'required|min:6',
        ]);

        $user = Trade::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'User registered successfully!',
            'user' => $user
        ], 201);
    }
    //
}
