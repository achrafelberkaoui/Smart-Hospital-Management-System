<?php

namespace App\services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function login(Request $request): bool
    {
        $logUser = $request->only('email', 'password');
        if(Auth::attempt($logUser)){
            $request->session()->regenerate();
            return true;
        }
        return false;
    }
}