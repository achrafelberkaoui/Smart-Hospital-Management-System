<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\services\LoginService;

class LoginController extends Controller
{
    public function __construct(private LoginService $loginService) 
    {

    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        // dd($request);
        if($this->loginService->login($request)){
        return redirect()->intended('/');
    }
        return back()->withErrors(['email'=>'identifiants incorrects']);
    }
}
