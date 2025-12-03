@extends('layouts.app')

@section('content')
    <div class="container">

        <h3 class="mb-4">Tambah Subject</h3>

        <div class="row">
            {{-- LEFT SIDE: FORM --}}
            <div class="col-md-8">

                <div class="card shadow-sm p-4">
                    <form action="{{ route('subject.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- NAME --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $subjects->name }}" required
                                disabled>
                        </div>

                        <a href="{{ route('subject.edit', $subjects->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('subject.index') }}" class="btn btn-secondary">Back</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
