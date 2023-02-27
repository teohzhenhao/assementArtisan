<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    use HasFactory;

    protected $table= 'showtime';

    public function seats(){
        return $this->belongsToMany('App\Models\Seat', 'showtime_seat', 'seat_id', 'showtime_id');
    }
}
