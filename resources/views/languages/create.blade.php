@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Create Language</h1>

        <form action="{{ route('languages.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titel1">Title 1</label>
                <input type="text" name="titel1" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
