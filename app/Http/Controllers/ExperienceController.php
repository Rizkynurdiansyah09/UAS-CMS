<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExperienceController extends Controller
{
    public function index(): View
    {
        $experiences = Experience::orderBy('created_at', 'DESC')->get();
        return view('experiences.index', compact('experiences'));
    }
    
    public function create(): View
    {
        return view('experiences.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'starting_year' => 'required|integer',
            'year_end' => 'nullable|integer',
            'field' => 'required|string',
            'company' => 'required|string',
            'address' => 'required|string',
            'work_description' => 'required|string',
        ]);
    
        $experience = new Experience();
        $experience->starting_year = $request->input('starting_year');
        $experience->year_end = $request->input('year_end');
        $experience->field = $request->input('field');
        $experience->company = $request->input('company');
        $experience->address = $request->input('address');
        $experience->work_description = $request->input('work_description');
        $experience->save();
    
        return redirect()->route('experiences.index')->with('status', 'Experience created successfully!');
    }
    

    public function show($id): View
    {
        $experience = Experience::findOrFail($id);
        return view('experiences.show', compact('experience'));
    }

    public function edit($id): View
    {
        $experience = Experience::findOrFail($id);
        return view('experiences.edit', compact('experience'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'starting_year' => 'required|integer',
            'year_end' => 'nullable|integer',
            'field' => 'required|string',
            'company' => 'required|string',
            'address' => 'required|string',
            'work_description' => 'required|string',
        ]);

        $experience = Experience::findOrFail($id);
        $experience->starting_year = $request->input('starting_year');
        $experience->year_end = $request->input('year_end');
        $experience->field = $request->input('field');
        $experience->company = $request->input('company');
        $experience->address = $request->input('address');
        $experience->work_description = $request->input('work_description');
        $experience->save();

        return redirect()->route('experiences.index')->with('status', 'Experience updated successfully!');
    }

    public function destroy($id): RedirectResponse
    {
        $experience = Experience::findOrFail($id);
        $experience->delete();

        return redirect()->route('experiences.index')->with('status', 'Experience deleted successfully!');
    }
}
