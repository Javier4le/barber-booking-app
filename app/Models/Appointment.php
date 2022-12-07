<?php

namespace App\Models;

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
}
