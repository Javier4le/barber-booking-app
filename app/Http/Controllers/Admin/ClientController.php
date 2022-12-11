<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $clients = User::where('role_id', 3)->get();

        // $clients = User::whereHas('role', function ($query) {
        //     $query->where('name', 'client');
        // })->get();

        $clients = User::clients()->paginate(10);

        return view('dashboard.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.clients.create');
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

        User::create(
            $request->only('first_name', 'last_name', 'phone', 'username', 'email') + [
                //'password' => bcrypt($request->password),
                'password' => bcrypt($request->input('password')),
                'role_id' => 3,
            ]
        );

        $notification = 'El cliente se ha registrado correctamente.';

        return redirect()->route('clients.index')->with(compact('notification'));
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
        $client = User::clients()->findOrFail($id);

        return view('dashboard.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $validated = $request->validated();

        // $user = User::findOrFail($id);
        $user = User::clients()->findOrFail($id);

        $data = $request->only('first_name', 'last_name', 'phone', 'username', 'email');
        $password = $request->input('password');

        if ($password) {
            $data['password'] = bcrypt($password);
        }

        $user->fill($data);
        $user->save();

        $notification = 'El cliente se ha actualizado correctamente.';

        return redirect()->route('clients.index')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = User::clients()->findOrFail($id);
        $client->delete();

        $notification = "El cliente $client->first_name se ha eliminado correctamente.";

        return redirect()->route('clients.index')->with(compact('notification'));
    }
}
