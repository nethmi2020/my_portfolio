<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Qualification;
class QulificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $qualifications=Qualification::all();

        return view('admin.qualifications.index',compact('qualifications'));
    }

    public function showEducation()
    {

        $educations=Qualification::where('type',['Education'])->orderBy('id')->get();

        return view('admin.qualifications.edu', compact('educations'));
    }

    public function showExperience()
    {

        $experiences=Qualification::where('type',['Work'])->orderBy('id')->get();

        return view('admin.qualifications.exp', compact('experiences'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.qualifications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'association' => 'required',
            'description' => 'required',
            'type' => 'required',
            'from' => 'required|date|before:to',
            'to' => 'required|date|after:from',
        ]);
        Qualification::create($validated);

        return to_route('admin.qualification.edu')->with('message','Data Updated');

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
    public function edit(Qualification $qualification)
    {
        return view('admin.qualifications.edit',compact('qualification'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Qualification $qualification)
    {
        $validated = $request->validate([
            'title' => 'required',
            'association' => 'required',
            'description' => 'required',
            'type' => 'required',
            'from' => 'required|date|before:to',
            'to' => 'required|date|after:from',
        ]);
        $qualification->update($validated);
        if($request['type']=='Education')
        {
            return to_route('admin.qualification.edu')->with('message','Education Data Updated');
        }else{
            return to_route('admin.qualification.exp')->with('message','Experience Data Updated');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Qualification $qualification)
    {
        $qualification->delete();

        return back()->with('message','Data deleted successfully');
    }
}
