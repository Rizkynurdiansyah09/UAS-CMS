<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FooterController extends Controller
{
    public function index(): View
    {
        $footers = Footer::orderBy('created_at', 'DESC')->get();
        return view('footers.index', compact('footers'));
    }
    
    public function create(): View
    {
        return view('footers.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'text' => 'required|string',
        ]);

        $footer = new Footer();
        $footer->text = $request->input('text');
        $footer->save();

        return redirect()->route('footers.index')->with('status', 'Footer created successfully!');
    }

    public function show($id): View
    {
        $footer = Footer::findOrFail($id);
        return view('footers.show', compact('footer'));
    }

    public function edit($id): View
    {
        $footer = Footer::findOrFail($id);
        return view('footers.edit', compact('footer'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'text' => 'required|string',
        ]);

        $footer = Footer::findOrFail($id);
        $footer->text = $request->input('text');
        $footer->save();

        return redirect()->route('footers.index')->with('status', 'Footer updated successfully!');
    }

    public function destroy($id): RedirectResponse
    {
        $footer = Footer::findOrFail($id);
        $footer->delete();

        return redirect()->route('footers.index')->with('status', 'Footer deleted successfully!');
    }
}
