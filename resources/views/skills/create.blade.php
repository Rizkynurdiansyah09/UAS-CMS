@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Create Skill</h1>

        <form action="{{ route('skills.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="skill_name">Skill Name</label>
                <input type="text" name="skill_name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
