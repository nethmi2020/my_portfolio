<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();

        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'percent' => 'required',
            'color' => 'required',
        ]);
        Skill::create($validated);

        return to_route('admin.skill.index')->with('message', 'New Skill Added');

    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name' => 'required',
            'percent' => 'required',
            'color' => 'required',
        ]);
        $skill->update($validated);

        return to_route('admin.skill.index')->with('message', 'skill Data Updated');
    }


    public function destroy(Skill $skill)
    {
        $skill->delete();

        return back()->with('message','skill deleted successfully');
    }
}
