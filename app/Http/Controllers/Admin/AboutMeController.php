<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AboutMeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user =User::find(1);
        return view ('admin.aboutme.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,User $user){
        //  $validated = $request->validate(['name'=> ['required','min:3']]);
        $user = User::first();
        $validated = $request->validate([
          'name' => 'required|min:3',
          'email' => 'required|email',
          'phone' => 'required',
          'address' => 'required',
          'degree' => 'required',
          'experience' => 'required',
        //   'birthday' => 'required|date|before_or_equal:today',
          'job' => 'required',
          'image' => 'image|mimes:jpeg,png,jpg|max:2048',
      ]);
  
      if($request->hasfile('image')){
          if($user->profile_pic != null){
              Storage::delete($user->profile_pic);
          }
          $get_new_file = $request->file('image')->store('public/images');
          $user->profile_pic = $get_new_file;
      }
  
      $user->update($validated);
  
      return to_route('admin.aboutme.index')->with('message','Data Updated');
      }
  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
