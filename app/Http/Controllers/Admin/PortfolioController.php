<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $portfolios=Portfolio::all();

        $portfolios=Portfolio::with('category')->get();
        // dd($portfolios);
        return view('admin.portfolios.index',compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.portfolios.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated=$request->validate([
            'title'=>'required',
            'project_url'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'category_id'=>'required|exists:categories,id'

        ]);

        $portfolio=new Portfolio();
        $portfolio->title = $validated['title'];
        $portfolio->project_url = $validated['project_url'];
        $portfolio->category_id = $validated['category_id'];

        if($request->hasFile('image')){
            $get_file=$request->file('image')->store('public/images/portfolios');
            $portfolio->image=$get_file;
        }
        $portfolio->save();
        return to_route('admin.portfolio.index')->with('message','Portfolio Saved');

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
    public function edit(Portfolio $portfolio)
    {
        $categories=Category::all();

        return view('admin.portfolios.edit',compact('portfolio','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $validated=$request->validate([
            'title'=>'required',
            'project_url'=>'required',
            'category_id'=>'required'

        ]);
        $portfolio->title=$validated['title'];
        $portfolio->project_url=$validated['project_url'];
        $portfolio->category_id=$validated['category_id'];

        if($request->hasfile('image'))
        {
            Storage::delete($portfolio->image);
            $get_file=$request->file('image')->store('public/images/portfolios');
            $portfolio->image=$get_file;
        }
       $portfolio->update($validated);

        return to_route('admin.portfolio.index')->with('message','Portfolio Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();

        return back()->with('message','portfolio deleted successfully');
    }
}
