<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Interfaces\ScheduleServiceInterface;
use App\Models\Appointment;
use App\Models\CancelledAppointment;
use App\Models\Location;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Consulta para obtener el estado de la cita segun el rol del usuario
        $role = auth()->user()->role->name;

        if ($role == 'admin') {
            $confirmedAppointments = Appointment::all()
                ->where('status', 'Confirmada');

            $pendingAppointments = Appointment::all()
                ->where('status', 'Reservada');

            $oldAppointments = Appointment::all()
                ->whereIn('status', ['Atendida', 'No asistió', 'Cancelada']);
                // ->whereIn('status', ['Atendida', 'Cancelada']);

        } elseif ($role == 'barber') {
            $confirmedAppointments = Appointment::all()
                ->where('status', 'Confirmada')
                ->where('barber_id', auth()->user()->id);

            $pendingAppointments = Appointment::all()
                ->where('status', 'Reservada')
                ->where('barber_id', auth()->user()->id);

            $oldAppointments = Appointment::all()
                ->whereIn('status', ['Atendida', 'No asistió', 'Cancelada'])
                // ->whereIn('status', ['Atendida', 'Cancelada'])
                ->where('barber_id', auth()->user()->id);

        } elseif($role == 'client') {
            $confirmedAppointments = Appointment::all()
                ->where('status', 'Confirmada')
                ->where('client_id', auth()->user()->id);

            $pendingAppointments = Appointment::all()
                ->where('status', 'Reservada')
                ->where('client_id', auth()->user()->id);

            $oldAppointments = Appointment::all()
                ->whereIn('status', ['Atendida', 'No asistió', 'Cancelada'])
                // ->whereIn('status', ['Atendida', 'Cancelada'])
                ->where('client_id', auth()->user()->id);
        }

        return view('dashboard.appointments.index', compact('confirmedAppointments', 'pendingAppointments', 'oldAppointments', 'role'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ScheduleServiceInterface $scheduleServiceInterface)
    {
        $locations = Location::all();
        $locationId = old('location_id');

        if ($locationId) {
            $location = Location::find($locationId);
            $services = $location->services;
        } else {
            $services = collect();
        }


        $serviceId = old('service_id');

        // si existe el servicio seleccionado
        if ($serviceId) {
            // se busca el servicio
            $service = Service::find($serviceId);
            // $barbers = User::where('role_id', 2)->get();

            // y se obtienen los barberos que prestan el servicio
            $barbers = $service->users;
        } else {
            // si no existe el servicio no se obtienen barberos
            $barbers = collect();
        }


        $date = old('scheduled_date');
        $barberId = old('barber_id');

        if ($date && $barberId) {
            $intervals = $scheduleServiceInterface->getAvailableIntervals($date, $barberId);
        } else {
            $intervals = null;
        }

        return view('dashboard.appointments.create', compact('locations', 'services', 'barbers', 'intervals'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ScheduleServiceInterface $scheduleServiceInterface)
    {
        // dd($request->only('scheduled_date', 'scheduled_time'));
        // $validator = $request->validated();
        $rules = [
            'barber_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'location_id' => 'required|exists:locations,id',
            // 'scheduled_date' => 'required|date_format:"Y-m-d"',
            'scheduled_time' => 'required',
            'comments' => 'nullable|string',
        ];

        $messages = [
            'barber_id.required' => 'Es necesario seleccionar un barbero',
            'barber_id.exists' => 'El barbero seleccionado no existe',

            'service_id.required' => 'Es necesario seleccionar un servicio',
            'service_id.exists' => 'El servicio seleccionado no existe',

            'location_id.required' => 'Es necesario seleccionar un local',
            'location_id.exists' => 'El local seleccionada no existe',

            // 'scheduled_date.required' => 'Es necesario seleccionar una fecha',
            // 'scheduled_date.date_format' => 'El formato de la fecha es incorrecto',

            'scheduled_time.required' => 'Es necesario seleccionar una hora en la mañana o en la tarde',

            'comments.string' => 'El campo de comentarios debe ser una cadena de caracteres',
        ];


        $validator = Validator::make($request->all(), $rules, $messages);

        $validator->after(function ($validator) use ($request, $scheduleServiceInterface) {
            $date = $request['scheduled_date'];
            $barberId = $request['barber_id'];
            $time = $request['scheduled_time'];

            if ($date && $barberId && $time) {
                $start = new Carbon($time);
            } else {
                return;
            }

            if (!$scheduleServiceInterface->isAvailableInterval($date, $barberId, $start)) {
                $validator->errors()->add(
                    'available_time', 'La hora seleccionada ya se encuentra reservada para otro cliente'
                );
            }
        });

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }


        $data = $request->only(['barber_id', 'service_id', 'location_id', 'scheduled_date', 'scheduled_time', 'comments']);
        $data['client_id'] = auth()->id();

        // dd($data);

        $carbonTime = Carbon::createFromFormat('g:i A', $data['scheduled_time']);
        $data['scheduled_time'] = $carbonTime->format('H:i:s');

        Appointment::create($data);

        $notification = "La cita ha sido agendada correctamente";

        return redirect('dashboard/appointments')->with(compact('notification'));
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        $role = auth()->user()->role->name;

        return view('dashboard.appointments.show', compact('appointment', 'role'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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




    /**
     * Confirm the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm(Appointment $appointment)
    {
        $appointment->status = 'Confirmada';
        $appointment->save();

        $notification = 'La cita ha sido confirmada correctamente';

        return redirect('dashboard/appointments')->with(compact('notification'));
    }




    /**
     * Cancel the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel(Appointment $appointment, Request $request)
    {
        if ($request->has('reason')) {
            $cancellation = new CancelledAppointment();
            $cancellation->reason = $request->input('reason');
            $cancellation->cancelled_by_id = auth()->id();

            $appointment->cancellation()->save($cancellation);
        }

        $appointment->status = 'Cancelada';
        $appointment->save();

        $notification = 'La cita ha sido cancelada correctamente';

        return redirect('dashboard/appointments')->with(compact('notification'));
    }


    public function formCancel(Appointment $appointment)
    {
        if ($appointment->status == 'Confirmada') {
            $role = auth()->user()->role->name;

            return view('dashboard.appointments.cancel', compact('appointment', 'role'));
        }

        return redirect('dashboard/appointments');
    }
}
