@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Subject') }}</div>

                    <div class="card-body">
                        <div class="row mb-3 align-items-center">
                            {{-- Tombol Add & Export --}}
                            <div class="col-md-6">
                                <a href="{{ route('subject.create') }}" class="btn btn-success me-2">Add</a>
                            </div>

                            {{-- Form Pencarian --}}
                            <div class="col-md-6">
                                <form action="{{ route('subject.index') }}" method="GET" class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search"
                                        value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if (session('delete'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session('delete') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover align-middle text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="min-width: 200px;">Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($subjects as $i => $row)
                                    <tr>
                                        <td>{{ $loop->iteration + ($subjects->currentPage() - 1) * $subjects->perPage() }}
                                        </td>
                                        <td> {{ $row->name }}</td>
                                        <td>
                                            <a href="{{ route('subject.show', $row->id) }}"
                                                class="text-primary text-decoration-none me-2">Detail</a>
                                            <a href="{{ route('subject.edit', $row->id) }}"
                                                class="text-warning text-decoration-none me-2">Edit</a>
                                            <form action="{{ route('subject.destroy', $row->id) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-link p-0 text-danger align-baseline">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center fst-italic">Data tidak ditemukan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $subjects->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
