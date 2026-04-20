<?php

namespace App\Services;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function login(LoginRequest $request): bool
    {
        $logUser = $request->only('email', 'password');
        if(Auth::attempt($logUser)){
            $request->session()->regenerate();
            return true;
        }
        return false;
    }
}