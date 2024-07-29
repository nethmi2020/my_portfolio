<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Category;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios=Portfolio::all();

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
            $get_file=$request->file('image')->store('images/portfolios');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
