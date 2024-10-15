<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Storage;
class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews=Review::all();

        return view('admin.reviews.index',compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated=$request->validate([
            'name'=>'required',
            'image'=>'required',
            'job'=>'required',
            'description'=>'required',
        ]);

        $review=new Review();
        $review->name = $validated['name'];
        $review->job = $validated['job'];
        $review->description = $validated['description'];

        if($request->hasFile('image')){
            $get_file=$request->file('image')->store('public/images/reviews');
            $review->image=$get_file;
        }
        $review->save();
        // Review::create($validated);

        return to_route('admin.review.index')->with('message','Review data Saved');

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
    public function edit(Review $review)
    {
        return view('admin.reviews.edit',compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {

            $validated=$request->validate([
                'name'=>'required',
                // 'image'=>'required',
                'job'=>'required',
                'description'=>'required',
            ]);

          
            $review->name = $validated['name'];
            $review->job = $validated['job'];
            $review->description = $validated['description'];

            if($request->hasfile('image'))
            {
                Storage::delete($review->image);
                $get_file=$request->file('image')->store('public/images/reviews');
                $review->image=$get_file;

            }

            // echo '<pre>';
            // print_r($validated);
            //   die();
            $review->update($validated);

            return to_route('admin.review.index')->with('message','Review Updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
