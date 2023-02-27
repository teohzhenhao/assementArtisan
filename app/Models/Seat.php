<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $table='seat';

    public function showTimes(){
        return $this->belongsToMany('App\Models\Showtime', 'showtime_seat', 'seat_id', 'showtime_id');
    }
}
