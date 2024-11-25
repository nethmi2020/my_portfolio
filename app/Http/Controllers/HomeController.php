<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Qualification;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\Service;
use App\Models\Category;
use App\Models\Portfolio;
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

        $educations=Qualification::where('type','Education')->orderBy('id','desc')->take(3)->get();

        $works=Qualification::where('type','Work')->orderBy('id','desc')->take(3)->get();

        $skills=Skill::orderBy('id','desc')->take(6)->get();

        $services=Service::orderBy('id','desc')->take(3)->get();

        $categories=Category::all();

        $portfolios=Portfolio::with('category')->orderBy('id','desc')->take(6)->get();


        if($user==null){
            return response()->json(['error'=>'User not found'],404);
        }else{
            return view('home',compact('user','setting','educations','works','skills','services','categories','portfolios'));
        }

    }
}
