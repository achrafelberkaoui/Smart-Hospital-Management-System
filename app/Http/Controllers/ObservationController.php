<?php

namespace App\Http\Controllers;

use App\Http\Requests\ObservationRequest;
use App\Models\Observation;
use App\Models\User;
use App\Services\LogService;
use App\Services\ObservationService;

class ObservationController extends Controller
{
    public function __construct(private ObservationService $service)
    {
    }
    public function store(ObservationRequest $request)
    {
        $observation = $this->service->create($request->validated());
        LogService::record('create', 'Created Observation Name '.$observation->name);
        return back()->with('succes', 'observation ajoute');
    }
    public function observations()
    {
    $observations = Observation::where('user_id', auth()->id())->latest()->get();
        return view('infirmier.observations', compact('observations'));
    }
    
}
