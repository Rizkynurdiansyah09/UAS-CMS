@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Edit Education</h1>

        <form action="{{ route('education.update', $education->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="tahun_mulai">Starting Year</label>
                <input type="number" name="tahun_mulai" class="form-control" value="{{ $education->tahun_mulai }}" required>
            </div>
            <div class="form-group">
                <label for="tahun_selesai">Year End</label>
                <input type="number" name="tahun_selesai" class="form-control" value="{{ $education->tahun_selesai }}">
            </div>
            <div class="form-group">
                <label for="sekolah">School</label>
                <input type="text" name="sekolah" class="form-control" value="{{ $education->sekolah }}" required>
            </div>
            <div class="form-group">
                <label for="lokasi">Location</label>
                <input type="text" name="lokasi" class="form-control" value="{{ $education->lokasi }}" required>
            </div>
            <div class="form-group">
                <label for="status_kelulusan">Graduation Status</label>
                <input type="text" name="status_kelulusan" class="form-control" value="{{ $education->status_kelulusan }}" required>
            </div>
            <div class="form-group">
                <label for="jurusan">Major</label>
                <input type="text" name="jurusan" class="form-control" value="{{ $education->jurusan }}" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Description</label>
                <textarea name="deskripsi" class="form-control">{{ $education->deskripsi }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
