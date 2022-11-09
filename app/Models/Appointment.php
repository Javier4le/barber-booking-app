<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var string[]
     */
    protected $fillable = ['date', 'time'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function premise()
    {
        return $this->belongsTo(Premise::class);
    }
}
