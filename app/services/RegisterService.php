<?php

namespace App\services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterService
{
    public function register(Request $request)
    {
       $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'date_naissance'=> $request->birth_date,
            'role' => 'user'
        ]);

        Auth::login($user);
        $request->session()->regenerate();
    }
}