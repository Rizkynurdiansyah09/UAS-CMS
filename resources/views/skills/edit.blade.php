@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Edit Skill</h1>

        <form action="{{ route('skills.update', $skill->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="skill_name">Skill Name</label>
                <input type="text" name="skill_name" class="form-control" value="{{ $skill->skill_name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
