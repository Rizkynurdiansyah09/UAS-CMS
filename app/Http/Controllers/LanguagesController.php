<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LanguagesController extends Controller
{
    public function index(): View
    {
        $languages = Language::orderBy('created_at', 'DESC')->get();
        return view('languages.index', compact('languages'));
    }
    
    public function create(): View
    {
        return view('languages.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'titel1' => 'required|string',
        ]);
    
        $language = new Language();
        $language->titel1 = $request->input('titel1');
        $language->save();
    
        return redirect()->route('languages.index')->with('status', 'Language created successfully!');
    }

    public function show($id): View
    {
        $language = Language::findOrFail($id);
        return view('languages.show', compact('language'));
    }

    public function edit($id): View
    {
        $language = Language::findOrFail($id);
        return view('languages.edit', compact('language'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'titel1' => 'required|string',
        ]);

        $language = Language::findOrFail($id);
        $language->titel1 = $request->input('titel1');
        $language->save();

        return redirect()->route('languages.index')->with('status', 'Language updated successfully!');
    }

    public function destroy($id): RedirectResponse
    {
        $language = Language::findOrFail($id);
        $language->delete();

        return redirect()->route('languages.index')->with('status', 'Language deleted successfully!');
    }
}
