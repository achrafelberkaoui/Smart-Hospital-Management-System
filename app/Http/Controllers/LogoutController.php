<?php

namespace App\Http\Controllers;

use App\services\LogoutService;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __construct(private LogoutService $logoutService) {
       
    }
    public function logout(Request $request)
    {
        $this->logoutService->logout($request);
        return redirect('login');

    }
}
