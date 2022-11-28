<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Http\Requests\LocationRequest;

class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();
        return view('dashboard.locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\LocationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationRequest $request)
    {
        // $rules = [
        //     'address' => 'required|string|max:100',
        //     'phone' => 'required|numeric|digits:9',
        // ];

        // $messages = [
        //     'address.required' => 'Es necesario ingresar una dirección',

        //     'phone.required' => 'Es necesario ingresar un número de teléfono',
        //     'phone.numeric' => 'El campo de teléfono debe ser numérico',
        //     'phone.digits' => 'El número de teléfono debe tener 9 dígitos',
        // ];

        // $this->validate($request, $rules, $messages);

        $validated = $request->validated();

        $location = new Location();
        $location->name = $request->name;
        $location->address = $request->address;
        $location->phone = $request->phone;
        $location->save();

        $notification = 'El local se ha registrado correctamente';

        // return redirect('/dashboard/locations')->with(compact('notification'));
        return redirect()->route('locations.index')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        return view('dashboard.locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\LocationRequest  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(LocationRequest $request, Location $location)
    {
        // $rules = [
        //     'address' => 'required|string|max:100',
        //     'phone' => 'required|numeric|digits:9',
        // ];

        // $messages = [
        //     'address.required' => 'Es necesario ingresar una dirección',

        //     'phone.required' => 'Es necesario ingresar un número de teléfono',
        //     'phone.numeric' => 'El campo de teléfono debe ser numérico',
        //     'phone.digits' => 'El número de teléfono debe tener 9 dígitos',
        // ];

        // $this->validate($request, $rules, $messages);

        $validated = $request->validated();

        $location->name = $request->name;
        $location->address = $request->address;
        $location->phone = $request->phone;
        $location->save();

        $notification = 'El local se ha actualizado correctamente';

        // return redirect('/dashboard/locations')->with(compact('notification'));
        return redirect()->route('locations.index')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $location->delete();

        $notification = 'El local '.$location->name.' se ha eliminado correctamente';

        // return redirect('/dashboard/locations')->with(compact('notification'));
        return redirect()->route('locations.index')->with(compact('notification'));
    }
}
