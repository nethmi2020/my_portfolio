<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Setting;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user =User::find(1);
        $setting = Setting::first();

        if($user==null){
            return response()->json(['error'=>'User not found'],404);
        }else{
            return view('home',compact('user','setting'));
        }
       
    }
}
