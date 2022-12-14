<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Service;
use Termwind\Components\Dd;

class BarberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $barbers = User::where('role_id', 2)->get();

        // $barbers = User::whereHas('role', function ($query) {
        //     $query->where('name', 'barber');
        // })->get();

        $barbers = User::barbers()->paginate(10);

        return view('dashboard.barbers.index', compact('barbers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        $locationId = old('location_id');

        if ($locationId) {
            $location = Location::find($locationId);
            $services = $location->services;
        } else {
            $services = collect();
        }


        // servicios seleccionados
        $servicesSelected = old('services[]') ? Service::find(old('services[]')) : collect();


        return view('dashboard.barbers.create', compact('locations', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\User\UserStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $validated = $request->validated();

        $barber = User::create(
            $request->only('first_name', 'last_name', 'phone', 'username', 'email') + [
                //'password' => bcrypt($request->password),
                'password' => bcrypt($request->input('password')),
                'role_id' => 2,
            ]
        );

        // para relacionarlos juntos en una sola linea de codigo
        $barber->services()->attach($request->input('services'), ['location_id' => $request->input('location_id')]);


        $notification = 'El barbero se ha registrado correctamente.';

        return redirect()->route('barbers.index')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barber = User::barbers()->findOrFail($id);
        $locations = Location::all();

        $services = $barber->services;

        $barberServices = $barber->services->pluck('id')->toArray();
        $barberLocation = $barber->locations->pluck('id')->toArray();

        return view('dashboard.barbers.edit', compact('barber', 'locations', 'services', 'barberServices', 'barberLocation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\User\UserUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $validated = $request->validated();

        $barber = User::barbers()->findOrFail($id);

        $data = $request->only('first_name', 'last_name', 'phone', 'username', 'email');
        $password = $request->input('password');

        if ($password) {
            $data['password'] = bcrypt($password);
        }

        $barber->fill($data);
        $barber->save();


        $locationId = $request->input('location_id');
        $sevices = [];

        foreach ($request->input('services') as $serviceId) {
            $sevices[$serviceId] = ['location_id' => $locationId];
        }

        $barber->services()->sync($sevices);


        $notification = 'El barbero se ha actualizado correctamente.';

        return redirect()->route('barbers.index')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barber = User::barbers()->findOrFail($id);
        $barber->delete();

        $notification = "El barbero $barber->first_name se ha eliminado correctamente.";

        return redirect()->route('barbers.index')->with(compact('notification'));
    }
}
