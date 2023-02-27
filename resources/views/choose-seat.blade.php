@extends('layout')
@section('title', "Home Page")

@section('content')
    <h1>Choose Your Seat</h1>

    <div class="seating-chart">
        <!-- Your seating chart HTML goes here -->
    </div>

    @if($errors->any())
        <div class="col-12">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        </div>
    @endif
    <form action="{{route('checkout.post',[$showtime])}}" method="POST">
        @csrf
        <label for="seat">Select your seat:</label>
        <select name="seat" id="seat">
			@foreach($availableSeats as $seat)
				<option class="seat available" value="{{$seat->id}}">{{$seat->name}}</option>
			@endforeach
        </select>
        <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label  class="form-label">Mobile</label>
            <input type="text" class="form-control" name="mobile">
        </div>
        <button type="submit" class="btn btn-primary">Proceed to Checkout</button>
        <!-- <button type="submit">Proceed to Checkout</button> -->
    </form>
@endsection
