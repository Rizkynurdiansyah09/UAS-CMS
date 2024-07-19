<?php

namespace App\Http\Controllers\private;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $homes = Home::all();
        return view('homes.index', compact('homes'));
    }

    public function create()
    {
        return view('homes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_1' => 'required',
            'title_2' => 'required',
            'title_3' => 'required',
            'button_left' => 'required',
            'button_right' => 'required',
            'about_me_title' => 'required',
            'about_me_description' => 'required',
            'image_path' => 'nullable|image|max:2048'
        ]);

        $home = new Home();
        $home->title_1 = $request->title_1;
        $home->title_2 = $request->title_2;
        $home->title_3 = $request->title_3;
        $home->button_left = $request->button_left;
        $home->button_right = $request->button_right;
        $home->about_me_title = $request->about_me_title;
        $home->about_me_description = $request->about_me_description;

        if ($request->hasFile('image_path')) {
            $home->image_path = $request->file('image_path')->store('images', 'public');
        }

        // Simpan data ke database
        $home->save();

        // Berikan respon atau redirect
        return redirect()->route('home.index')->with('success', 'Data berhasil disimpan.');
    }

    public function edit(Home $home)
    {
        return view('homes.edit', compact('home'));
    }

    public function update(Request $request, Home $home)
    {
        $request->validate([
            'title_1' => 'required',
            'title_2' => 'required',
            'title_3' => 'required',
            'button_left' => 'required',
            'button_right' => 'required',
            'about_me_title' => 'required',
            'about_me_description' => 'required',
            'image_path' => 'nullable|image|max:2048'
        ]);

        $home->title_1 = $request->title_1;
        $home->title_2 = $request->title_2;
        $home->title_3 = $request->title_3;
        $home->button_left = $request->button_left;
        $home->button_right = $request->button_right;
        $home->about_me_title = $request->about_me_title;
        $home->about_me_description = $request->about_me_description;

        if ($request->hasFile('image_path')) {
            $home->image_path = $request->file('image_path')->store('images', 'public');
        }
        $home->save();

        return redirect()->route('home.index')->with('succes', 'Home update successfully');
    }

    public function destroy(Home $home)
    {
        // Pastikan instance ditemukan
        if (empty($home)) {
            // Jika tidak ditemukan, kembalikan response 404
            abort(404);
        }

        // Hapus instance dari database
        $home->delete();

        // Kembalikan response atau redirect ke halaman yang sesuai
        // Misalnya, redirect ke halaman daftar Home dengan pesan sukses
        return redirect()->route('home.index')->with('succes', 'Home delete successfully');
    }
}
