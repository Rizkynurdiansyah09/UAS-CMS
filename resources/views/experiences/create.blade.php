@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Create Experience</h1>

        <form action="{{ route('experiences.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="starting_year">Starting Year</label>
                <input type="number" name="starting_year" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="year_end">Year End</label>
                <input type="number" name="year_end" class="form-control">
            </div>
            <div class="form-group">
                <label for="field">Field</label>
                <input type="text" name="field" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="company">Company</label>
                <input type="text" name="company" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="work_description">Work Description</label>
                <textarea name="work_description" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
