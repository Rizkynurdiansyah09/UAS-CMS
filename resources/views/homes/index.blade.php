@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Homes</h1>
        <div class="ml-auto">
            <a href="{{ route('home.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Create Home
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Home List</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellsapcing="0">
                    <thead>
                        <tr>
                            <th>Title 1</th>
                            <th>Title 2</th>
                            <th>Title 3</th>
                            <th>Button Left</th>
                            <th>Button Right</th>
                            <th>About Me Title</th>
                            <th>ABout Me Description</th>
                            <th>Profile Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($homes) > 0)
                            @foreach ($homes as $home)
                                <tr>
                                    <td>{{ $home->title_1 }}</td>
                                    <td>{{ $home->title_2 }}</td>
                                    <td>{{ $home->title_3 }}</td>
                                    <td>{{ $home->button_left }}</td>
                                    <td>{{ $home->button_right }}</td>
                                    <td>{{ $home->about_me_title }}</td>
                                    <td>{{ $home->about_me_description }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $home->image_path) }}"
                                            alt="{{ $home->about_me_title }}" width="100">

                                    </td>
                                    <td>
                                        <a href="{{ route('home.edit', $home->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('home.destroy', $home->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="9">No Data Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endpush
