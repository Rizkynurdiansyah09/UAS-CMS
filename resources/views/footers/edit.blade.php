@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Edit Footer</h1>

        <form action="{{ route('footers.update', $footer->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="text">Text</label>
                <textarea name="text" class="form-control" required>{{ $footer->text }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
