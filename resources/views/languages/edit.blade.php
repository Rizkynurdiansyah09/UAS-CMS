@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Edit Language</h1>

        <form action="{{ route('languages.update', $language->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="titel1">Title 1</label>
                <input type="text" name="titel1" class="form-control" value="{{ $language->titel1 }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
