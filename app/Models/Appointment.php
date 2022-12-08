<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'barber_id',
        'client_id',
        'service_id',
        'location_id',
        'scheduled_date',
        'scheduled_time',
        'comments',
    ];

    public function local()
    {
        return $this->belongsTo(Location::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function barber()
    {
        return $this->belongsTo(User::class, 'barber_id');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function getFormattedTimeAttribute()
    {
        return (new Carbon($this->scheduled_time))->format('g:i A');
    }

    public function cancellation()
    {
        return $this->hasOne(CancelledAppointment::class);
    }

}
