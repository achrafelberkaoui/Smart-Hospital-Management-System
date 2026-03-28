<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }
    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|string|max:100'
        ]);

        Service::create($request->only('name'));
        return redirect()->route('services.index')->with('success', 'sevice ajoute avec success');
    }

    public function show(Service $service)
    {
    }

    public function edit(Request $request, Service $service)
    {
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name'=>'required|string|max:100'
        ]);

        $service->update($request->only('name'));
        return redirect()->route('services.index')->with('success', 'service modifie avec success');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')->with('success', 'service supprime avec success');
    }
}
