<?php

namespace App\Services;

use App\Models\Log;

class LogService{

    public static function record($action, $description)
    {
        Log::create([
            'user_id'=> auth()->id(),
            'action'=> $action,
            'description'=>$description

        ]);
    }
}

