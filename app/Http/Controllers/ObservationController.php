<?php

namespace App\Http\Controllers;

use App\Http\Requests\ObservationRequest;
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
}
