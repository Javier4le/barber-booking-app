<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var string[]
     */
    protected $fillable = ['name', 'price', 'duration', 'description'];
}
