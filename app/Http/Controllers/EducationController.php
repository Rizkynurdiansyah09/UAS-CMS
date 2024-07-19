<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EducationController extends Controller
{
    public function index(): View
    {
        $education = Education::orderBy('created_at', 'DESC')->get();
        return view('Education.index', compact('education'));
    }

    public function create(): View
    {
        return view('education.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'tahun_mulai' => 'required|integer',
            'tahun_selesai' => 'nullable|integer',
            'sekolah' => 'required|string',
            'lokasi' => 'required|string',
            'status_kelulusan' => 'required|string',
            'jurusan' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $education = new Education();
        $education->tahun_mulai = $request->input('tahun_mulai');
        $education->tahun_selesai = $request->input('tahun_selesai');
        $education->sekolah = $request->input('sekolah');
        $education->lokasi = $request->input('lokasi');
        $education->status_kelulusan = $request->input('status_kelulusan');
        $education->jurusan = $request->input('jurusan');
        $education->deskripsi = $request->input('deskripsi');
        $education->save();

        return redirect()->route('education.index')->with('status', 'Education created successfully!');
    }

    public function edit($id): View
    {
        $education = Education::findOrFail($id);
        return view('education.edit', compact('education'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'tahun_mulai' => 'required|integer',
            'tahun_selesai' => 'nullable|integer',
            'sekolah' => 'required|string',
            'lokasi' => 'required|string',
            'status_kelulusan' => 'required|string',
            'jurusan' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $education = Education::findOrFail($id);
        $education->tahun_mulai = $request->input('tahun_mulai');
        $education->tahun_selesai = $request->input('tahun_selesai');
        $education->sekolah = $request->input('sekolah');
        $education->lokasi = $request->input('lokasi');
        $education->status_kelulusan = $request->input('status_kelulusan');
        $education->jurusan = $request->input('jurusan');
        $education->deskripsi = $request->input('deskripsi');
        $education->save();

        return redirect()->route('education.index')->with('status', 'Education updated successfully!');
    }

    public function destroy($id): RedirectResponse
    {
        $education = Education::findOrFail($id);
        $education->delete();

        return redirect()->route('education.index')->with('status', 'Education deleted successfully!');
    }
}
