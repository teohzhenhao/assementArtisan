@extends('layout')
@section('title', "Home Page")
@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="movies">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Movies</h2>
            <!-- <div class="grid grid-cols-4 gap-8"> -->
            <!-- <div style="display:flex;justify-content: space-between;">
                <div class="col-3">
                    <div class="mt-8">
                        <a href="#">
                            <img src="/img/AGuiltyConscience.jfif" alt="AGuiltyConscience" style="width: 100%;" class="">
                        </a>
                    </div>
                </div>

                <div class="col-3">
                    <div class="mt-8">
                        <a href="#">
                            <img src="/img/AGuiltyConscience.jfif" alt="AGuiltyConscience" style=" width: 100%;" class="">
                        </a>
                    </div>
                </div>

                <div class="col-3">
                    <div class="mt-8">
                        <a href="#">
                            <img src="/img/AGuiltyConscience.jfif" alt="AGuiltyConscience" style=" width: 100%;" class="">
                        </a>
                    </div>
                </div>
            <div> -->

            <div class="row" style="justify-content: space-between;">
            @foreach($movies as $movie)
                <div class="col-4 m-5">
                    <div class="mt-8">
                        <a href="#">
                            <img src="{{$movie->image}}" alt="AGuiltyConscience" style="width: 100%;" class="">
                        </a>
                        <div class= "mt-2">
                            <a href="#" class="text-Lg-mt-2  hover: text-gray:300">{{$movie->name}}</a>
                            <div class="flex-items-center:text-gray-400-text-sm:mt-1">
                                <span>{{$movie->releaseDate}}</span>
                            </div>
                        </div>
                        <div class="text-gray-400-text-sm">{{$movie->type}}</div>

                        @foreach($movie->showtimes as $showtime)
                        <a href="{{route('showtime',$showtime->id)}}" style="display: flex;justify-content: space-between;">
                        <div class="text-gray-400-text-sm">{{$showtime->startTime}}</div>
                        <div class="text-gray-400-text-sm">{{$showtime->endTime}}</div>
                        </a>
                        @endforeach
                    </div>
                </div>
            @endforeach


            </div>
            
        </div>
    </div>
@endsection