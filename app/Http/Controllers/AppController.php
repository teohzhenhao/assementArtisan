<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Showtime;
use App\Models\Seat;
use App\Models\ShowtimeSeat;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    //
    public function showMoviesPage(){
        $movies = Movie::all();

        // dd($movies);
        return view("welcome", ['movies'=>$movies]);
    }

    public function showSeatPage(Movie $movie){

        // dd($movie->seats); 
        return view("choose-seat", ['movie'=>$movie]);
    }

    public function showShowtimePage(Showtime $showtime){

        $availableSeats = Seat::whereDoesntHave('showtimes', function($query) use ($showtime) {
            $query->where('showtime_id', $showtime->id);
        })->get();

        return view("choose-seat", ['showtime'=>$showtime, 'availableSeats' => $availableSeats]);
    }

    public function handleCheckoutAction(Showtime $showtime, Request $request) {
       
        
        // dd($request->all());
        // dd(Auth::user());
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
        ]);

        $data['showtime_id'] = $showtime->id;
        $data['user_id'] = Auth::user()->id;
        $data['name'] = $request->name;
        $data['mobile'] = $request->mobile;
        $data['seat_id'] = $request->seat;

        $doneBooking = ShowtimeSeat::create($data);

        if(!$doneBooking){
            return redirect(route('showtime'))->with("error", "booking failed please try again.");
        }
        return redirect(route('movie'))->with("success", "Booking success.");
        
    }
}
