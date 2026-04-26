<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Services\LogService;
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

        $service = Service::create($request->only('name'));
        LogService::record('create', 'Created Service Name '.$service->name);
        return redirect()->route('services.index')->with('success', 'sevice ajoute avec success');
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
        LogService::record('update', 'Update Service Name '.$service->name);
        return redirect()->route('services.index')->with('success', 'service modifie avec success');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        LogService::record('delete', 'Delete Service Name '.$service->name);
        return redirect()->route('services.index')->with('success', 'service supprime avec success');
    }
}
