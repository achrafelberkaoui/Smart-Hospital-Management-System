<?php

namespace App\Http\Controllers;

use App\Http\Requests\ObservationRequest;
use App\Models\Observation;
use App\Services\ObservationService;

class ObservationController extends Controller
{
    public function __construct(private ObservationService $service)
    {
    }
    public function store(ObservationRequest $request)
    {
        $this->service->create($request->validated());
        return back()->with('succes', 'observation ajoute');
    }
    public function observations()
    {
        $observations = Observation::with('dossier.patient')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('infirmier.observations', compact('observations'));
    }
}
