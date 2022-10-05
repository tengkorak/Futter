<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //dd('home');

        //dd(auth()->user());
        $pemain = auth()->user();
        $arr_ip = geoip()->getLocation($_SERVER['REMOTE_ADDR']);
        //dd($arr_ip);
        // return $avatar = auth()->user()->getMedia();
        return view('home', compact('avatars','pemain'));
        
    }
}
