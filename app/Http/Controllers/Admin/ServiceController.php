<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::paginate(10);

        foreach ($services as $service) {
            if ($service->duration < 60) {
                $service->duration = $service->duration . " min.";
            } else if ($service->duration < 120) {
                // $service->duration = "1:" . (($service->duration - 60 < 10) ? "0" . ($service->duration - 60) : ($service->duration - 60)) . " hrs.";
                $service->duration = "1" . (($service->duration - 60 < 10) ? " hr." : " hr. " . ($service->duration - 60) . " min." );
            } else {
                // $service->duration = "2:" . (($service->duration - 120 < 10) ? "0" . ($service->duration - 120) : ($service->duration - 120)) . " hrs.";
                $service->duration = "2" . (($service->duration - 120 < 10) ? " hr." : " hr. " . ($service->duration - 120) . " min." );
            }
        }

        return view('dashboard.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $validated = $request->validated();

        $service = new Service();
        $service->name = $request->name;
        $service->price = $request->price;
        $service->duration = $request->duration;
        $service->description = $request->description;
        $service->save();

        $notification = 'El servicio se ha registrado correctamente.';

        // return back()->with('notification', 'El servicio se ha registrado correctamente');
        return redirect()->route('services.index')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('dashboard.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ServiceRequest  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, Service $service)
    {
        $validated = $request->validated();

        $service->name = $request->name;
        $service->price = $request->price;
        $service->duration = $request->duration;
        $service->description = $request->description;
        $service->save();

        $notification = 'El servicio se ha actualizado correctamente.';

        // return back()->with('notification', 'El servicio se ha actualizado correctamente');
        return redirect()->route('services.index')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        $notification = "El servicio $service->name se ha eliminado correctamente.";

        // return back()->with('notification', 'El servicio se ha eliminado correctamente');
        return redirect()->route('services.index')->with(compact('notification'));
    }
}
