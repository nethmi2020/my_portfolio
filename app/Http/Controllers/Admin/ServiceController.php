<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        Service::create($validated);

        return to_route('admin.service.index')->with('message', 'New Service Added');

    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $service->update($validated);

        return to_route('admin.service.index')->with('message', 'Service Data Updated');

    }

    public function destroy(Service $service)
    {
        $service->delete();

        return back()->with('message','Data deleted successfully');
    }

}
