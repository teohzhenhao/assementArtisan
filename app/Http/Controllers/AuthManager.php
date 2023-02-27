<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    //
    function login(){
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('login');
    }

    function loginPost(Request $request){//receive from login form
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route("movie"));
        }
        return redirect(route('login'))->with("error", "Login details are not valid");
    }

    function register(){
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('register');
    }

    function registerPost(Request $request){//receive from login form
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        if(!$user){
            return redirect(route('register'))->with("error", "Register failed, Try again.");
        }
        return redirect(route('login'))->with("success", "Registration succes. Login to access the app");
    }

    function logout(){
        Session::flush();
        Auth::logout();

        return redirect(route('login'));
    }

    public function index()
    {
        return view('choose-seat');
    }

    public function checkout(Request $request)
    {
        // Get the selected seat from the request
        $seat = $request->input('seat');

        // Save the selected seat to the session
        $request->session()->put('selected_seat', $seat);

        // Redirect the user to the checkout page
        return redirect()->route('checkout');
    }
}
