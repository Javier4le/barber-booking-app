<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarberSchedule extends Model
{
    use HasFactory;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var string[]
     */
    protected $fillable = [];

    public function barber()
    {
        return $this->belongsTo(Barber::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
