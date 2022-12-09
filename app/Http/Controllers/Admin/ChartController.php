<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\CssSelector\Parser\Token;

class ChartController extends Controller
{
    public function appointments()
    {
        // dd(
        // $monthCounts = Appointment::selectRaw('MONTH(created_at) as month, COUNT(1) as count')
        //     // ->whereYear('created_at', date('Y'))
        //     // ->groupBy('month')
        //     // ->pluck('count', 'month')
        //     ->groupBy('month')
        //     ->get()
        //     ->toArray()

        // Consulta para obtener los meses y la cantidad de citas por mes
        $monthCounts = Appointment::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(1) as count'))
            ->groupBy('month')
            ->get()
            ->toArray();

        // );

        // Se crea un array que comienza con 0, tiene 12 posiciones y todas con valor 0
        $counts = array_fill(0, 12, 0);

        // Se recorre el array de meses y se asigna el valor de la cantidad de citas
        foreach ($monthCounts as $monthCount) {
            $index = $monthCount['month'] - 1; // Se resta 1 porque el array comienza en 0 por el mes de enero
            $counts[$index] = $monthCount['count'];
        }


        return view('dashboard.charts.appointments', compact('counts'));
    }


    public function barbers()
    {
        $now = Carbon::now();
        $end = $now->format('Y-m-d');
        $start = $now->subYear()->format('Y-m-d');

        return view('dashboard.charts.barbers', compact('start', 'end'));
    }


    public function barbersJson(Request $request) {
        $start = $request['start'];
        $end = $request['end'];

        $barbers = User::barbers()
            ->select('first_name', 'last_name')
            ->withCount(['attendedAppointments' => function ($query) use ($start, $end) {
                    $query->whereBetween('scheduled_date', [$start, $end]);
                },
                'cancelledAppointments' => function ($query) use ($start, $end) {
                    $query->whereBetween('scheduled_date', [$start, $end]);
                }
            ])
            ->orderBy('attended_appointments_count', 'desc')
            ->take(5)
            ->get();


        $data = [];

        $data['categories'] = $barbers->map(function ($barber) {
            return $barber->first_name . ' ' . $barber->last_name;
        });

        $data['series'] = [
            [
                'name' => 'Citas atendidas',
                'data' => $barbers->pluck('attended_appointments_count')
            ],
            [
                'name' => 'Citas canceladas',
                'data' => $barbers->pluck('cancelled_appointments_count')
            ]
        ];

        return $data;
    }
}
