<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\services\RegisterService;

class SignUpController extends Controller
{
    public function __construct(private RegisterService $registerService) 
    {

    }
    public function showRegister()
    {
       return view('auth.register');
    }
    public function register(RegisterRequest $request)
    {
        $this->registerService->register($request);
        return redirect('/');
    }
}
