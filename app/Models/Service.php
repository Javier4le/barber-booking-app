<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Get the users for the service.
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
