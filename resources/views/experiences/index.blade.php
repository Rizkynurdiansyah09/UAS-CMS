@extends('layouts.admin')

@section('main-content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Experiences</h1>
        <div class="ml-auto">
            <a href="{{ route('experiences.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Create Experience
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
            <h6 class="m-0 font-weight-bold text-primary">Experience List</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Starting Year</th>
                            <th>Year End</th>
                            <th>Field</th>
                            <th>Company</th>
                            <th>Address</th>
                            <th>Work Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($experiences) > 0)
                            @foreach ($experiences as $experience)
                                <tr>
                                    <td>{{ $experience->id }}</td>
                                    <td>{{ $experience->starting_year }}</td>
                                    <td>{{ $experience->year_end }}</td>
                                    <td>{{ $experience->field }}</td>
                                    <td>{{ $experience->company }}</td>
                                    <td>{{ $experience->address }}</td>
                                    <td>{{ $experience->work_description }}</td>
                                    <td>
                                        <a href="{{ route('experiences.edit', $experience->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('experiences.destroy', $experience->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8">No Data Found</td>
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
