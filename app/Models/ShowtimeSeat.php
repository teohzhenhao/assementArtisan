<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowtimeSeat extends Model
{
    use HasFactory;

    protected $table = "showtime_seat";

    protected $fillable = [
        'showtime_id',
        'user_id',
        'seat_id',
        'name',
        'mobile',
    ];
}
