@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Create Home</h1>

        <form action="{{ route('home.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title_1">Title 1</label>
                <input type="text" name="title_1" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="title_2">Title 2</label>
                <input type="text" name="title_2" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="title_3">Title 3</label>
                <input type="text" name="title_3" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="button_left">Button Left</label>
                <input type="text" name="button_left" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="button_right">Button Right</label>
                <input type="text" name="button_right" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="about_me_title">About Me Title</label>
                <input type="text" name="about_me_title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="about_me_description">About Me Description 1</label>
                <textarea name="about_me_description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="image_path">Profile Image</label>
                <input type="file" name="image_path" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
