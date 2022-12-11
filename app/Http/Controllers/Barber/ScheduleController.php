<?php

namespace App\Http\Controllers\Barber;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{

    private $days = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $active = $request->input('active') ?: [];
        $morning_start = $request->input('morning_start');
        $morning_end = $request->input('morning_end');
        $afternoon_start = $request->input('afternoon_start');
        $afternoon_end = $request->input('afternoon_end');

        $errors = [];

        for ($i = 0; $i < 7; $i++) {

            if ($morning_start[$i] > $morning_end[$i]) {
                $errors[] = "El intervalo de las horas del turno de la mañana del día {$this->days[$i]} no es válido";
            }

            if ($afternoon_start[$i] > $afternoon_end[$i]) {
                $errors[] = "El intervalo de las horas del turno de la tarde del día {$this->days[$i]} no es válido";
            }

            Schedule::updateOrCreate(
                [
                    'user_id' => auth()->id(),
                    'day' => $i
                ],
                [
                    'active' => in_array($i, $active),
                    'morning_start' => $morning_start[$i],
                    'morning_end' => $morning_end[$i],
                    'afternoon_start' => $afternoon_start[$i],
                    'afternoon_end' => $afternoon_end[$i],
                ]
            );
        }

        if (count($errors) > 0) {
            return back()->with(compact('errors'));
        }

        $notification = 'Los horarios se han guardado correctamente';

        return back()->with(compact('notification'));
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
    public function edit()
    {
        $schedules = Schedule::where('user_id', auth()->id())->get();

        if (count($schedules) > 0) {
            $schedules->map(function ($schedule) {
                $schedule->morning_start = Carbon::parse($schedule->morning_start)->format('H:i');
                $schedule->morning_end = Carbon::parse($schedule->morning_end)->format('H:i');
                $schedule->afternoon_start = Carbon::parse($schedule->afternoon_start)->format('H:i');
                $schedule->afternoon_end = Carbon::parse($schedule->afternoon_end)->format('H:i');
            });
        } else {
            $schedules = collect();
            for ($i = 0; $i < 7; $i++) {
                $schedules->push(new Schedule());
            }
        }


        // dd($schedules->toArray());

        $days = $this->days;

        return view('dashboard.schedules.edit', compact('days', 'schedules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
