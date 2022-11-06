<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premise extends Model
{
    use HasFactory;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var string[]
     */
    protected $fillable = ['name', 'address', 'phone'];
}
