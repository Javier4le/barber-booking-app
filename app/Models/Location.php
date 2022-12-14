<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use HasFactory, SoftDeletes;

    // /**
    //  * The attributes that are mass assignable.
    //  */
    // protected $fillable = [
    //     'name',
    //     'address',
    //     'phone',
    // ];

    /**
     * Get the users for the location.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'location_service_user')->withTimestamps();
    }

    /**
     * Get the services for the location.
     */
    public function services()
    {
        return $this->belongsToMany(Service::class, 'location_service_user')->withTimestamps();
    }
}
