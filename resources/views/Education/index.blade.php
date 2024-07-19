@extends('layouts.admin')

@section('main-content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Educations</h1>
        <div class="ml-auto">
            <a href="{{ route('education.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Create Education
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
            <h6 class="m-0 font-weight-bold text-primary">Education List</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Starting Year</th>
                            <th>Year End</th>
                            <th>School</th>
                            <th>Location</th>
                            <th>Graduation Status</th>
                            <th>Major</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($education) > 0)
                            @foreach ($education as $education)
                                <tr>
                                    <td>{{ $education->id }}</td>
                                    <td>{{ $education->tahun_mulai }}</td>
                                    <td>{{ $education->tahun_selesai }}</td>
                                    <td>{{ $education->sekolah }}</td>
                                    <td>{{ $education->lokasi }}</td>
                                    <td>{{ $education->status_kelulusan }}</td>
                                    <td>{{ $education->jurusan }}</td>
                                    <td>{{ $education->deskripsi }}</td>
                                    <td>
                                        <a href="{{ route('education.edit', $education->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('education.destroy', $education->id) }}" method="POST" class="d-inline">
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
