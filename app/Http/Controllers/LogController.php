<?php

namespace App\Http\Controllers;

use App\Models\Log;

class LogController extends Controller
{
    public function index()
        {
            if(auth()->user()->role !== 'admin'){
                abort(403);
            }
        
            $logs = Log::with('user')->latest()->paginate(10);
        
            return view('admin.log', compact('logs'));
        }
}
