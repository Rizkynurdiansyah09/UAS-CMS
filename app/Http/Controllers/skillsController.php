<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SkillsController extends Controller
{
    public function index(): View
    {
        $skills = Skill::orderBy('created_at', 'DESC')->get();
        return view('skills.index', compact('skills'));
    }
    
    public function create(): View
    {
        return view('skills.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'skill_name' => 'required|string',
        ]);
    
        $skill = new Skill();
        $skill->skill_name = $request->input('skill_name');
        $skill->save();
    
        return redirect()->route('skills.index')->with('status', 'Skill created successfully!');
    }
    

    public function show($id): View
    {
        $skill = Skill::findOrFail($id);
        return view('skills.show', compact('skill'));
    }

    public function edit($id): View
    {
        $skill = Skill::findOrFail($id);
        return view('skills.edit', compact('skill'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'skill_name' => 'required|string',
        ]);

        $skill = Skill::findOrFail($id);
        $skill->skill_name = $request->input('skill_name');
        $skill->save();

        return redirect()->route('skills.index')->with('status', 'Skill updated successfully!');
    }

    public function destroy($id): RedirectResponse
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();

        return redirect()->route('skills.index')->with('status', 'Skill deleted successfully!');
    }
}
