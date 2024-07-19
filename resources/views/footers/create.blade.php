@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Create Footer</h1>

        <form action="{{ route('footers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="text">Text</label>
                <textarea name="text" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
