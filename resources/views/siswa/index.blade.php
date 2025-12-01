@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-16">
                <div class="card">
                    <div class="card-header">{{ __('Student') }}</div>

                    <div class="card-body">
                        <div class="row mb-3 align-items-center">
                            {{-- Tombol Add & Export --}}
                            <div class="col-md-6">
                                <a href="{{ route('siswa.create') }}" class="btn btn-success me-2">
                                    Add
                                </a>
                                <a href="{{ route('siswa-export') }}" class="btn btn-danger">
                                    Export PDF
                                </a>
                            </div>

                            {{-- Form Pencarian --}}
                            <div class="col-md-6">
                                <form action="{{ route('siswa.index') }}" method="GET" class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search"
                                        value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    @if (@session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (@session('delete'))
                        <div class="alert alert- alert-danger dismissible fade show" role="alert">
                            <strong>{{ session('delete') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <div class="row align-item-center justify-content-center text-center fw-bold">
                            <table class="table table-striped table-bordered table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="min-width: 200px;">Name</th>
                                        <th>Gender</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($siswa as $i => $row)
                                        <tr>
                                            <td>{{ $loop->iteration + ($siswa->currentPage() - 1) * $siswa->perPage() }}
                                            </td>
                                            <td class="name-column">
                                                <div style="text-align: justify;">
                                                    {{ ucwords($row->name) }}
                                                </div>
                                            </td>
                                            <td>{{ ucwords($row->gender == 'm' ? 'm' : 'f') }}</td>
                                            <td>
                                                <a href="https://wa.me/62{{ $row->phone }}" target="_blank"
                                                    class="text-success text-decoration-none ">{{ $row->phone }}</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('siswa.show', $row->id) }}"
                                                    class="text-decoration-none text-primary">Detail</a>
                                                <a href="{{ route('siswa.edit', $row->id) }}"
                                                    class="text-decoration-none text-warning">Edit</a>
                                                <form action="{{ route('siswa.destroy', $row->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="text-danger btn btn-link mx-0 px-0"
                                                        onclick="return confirm('Are you sure delete this data?')">Delete</button>
                                                    {{-- <a href="{{ route('siswa.destroy', $row->id ) }}" class="text-decoration-none text-danger">Delete</a> --}}
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Data yang anda cari tidak ada</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $siswa->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
