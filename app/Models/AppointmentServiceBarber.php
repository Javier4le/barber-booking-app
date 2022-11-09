<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentServiceBarber extends Model
{
    use HasFactory;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var string[]
     */
    protected $fillable = ['total_price', 'appointment_id', 'barber_id', 'service_id'];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function barber()
    {
        return $this->belongsTo(Barber::class);
    }

    protected $table = 'appointments_barbers_services';
}
