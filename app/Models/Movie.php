<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public function seats(){
        return $this->hasMany('App\Models\Seat');
    }

    public function getAvailableSeatsAttribute(){ //overide function
        return $this->seats->where('available',1);
    }

    public function showtimes(){
        return $this->hasMany('App\Models\Showtime','movieID');
    }
}
