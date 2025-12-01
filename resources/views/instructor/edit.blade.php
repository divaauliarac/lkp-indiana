@extends('layouts.app')

@section('content')
    <div class="container">

        <h3 class="mb-4">Edit Instructor</h3>

        <div class="row">
            {{-- BAGIAN KIRI --}}
            <div class="col-md-8">

                <div class="card shadow-sm p-4">
                    <form action="{{ route('instructor.update', $instructor->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- NAME --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $instructor->name }}"
                                required>
                        </div>

                        {{-- GENDER --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Gender</label><br>

                            <label class="me-3">
                                <input type="radio" name="gender" value="male"
                                    {{ $instructor->gender == 'male' ? 'checked' : '' }}>
                                Male
                            </label>

                            <label>
                                <input type="radio" name="gender" value="female"
                                    {{ $instructor->gender == 'female' ? 'checked' : '' }}>
                                Female
                            </label>
                        </div>

                        {{-- EXPERTISE --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Expertise</label>
                            <select class="form-select" name="expertise" required>
                                <option value="pg" {{ $instructor->expertise == 'pg' ? 'selected' : '' }}>Programming
                                </option>
                                <option value="dg" {{ $instructor->expertise == 'dg' ? 'selected' : '' }}>Design
                                </option>
                                <option value="ap" {{ $instructor->expertise == 'ap' ? 'selected' : '' }}>Office
                                </option>
                                <option value="jk" {{ $instructor->expertise == 'jk' ? 'selected' : '' }}>Network
                                </option>
                            </select>
                        </div>

                        {{-- PHONE --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ $instructor->phone }}">
                        </div>

                        {{-- ADDRESS --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Address</label>
                            <textarea name="address" class="form-control">{{ $instructor->address }}</textarea>
                        </div>

                        {{-- PHOTO --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Photo (Upload New)</label>
                            <input type="file" name="photo" class="form-control" accept="image/*" id="photoInput">
                        </div>

                        <button type="submit" class="btn btn-warning">Update</button>
                        <a href="{{ route('instructor.index') }}" class="btn btn-secondary">Back</a>

                    </form>
                </div>

            </div>

            {{-- PHOTO PREVIEW --}}
            <div class="col-md-4">

                <div class="card shadow-sm p-3 text-center">

                    <h5 class="mb-3">Current Photo</h5>

                    <img src="{{ $instructor->photo ? asset('assets/img/instructor/' . $instructor->photo) : asset('assets/img/instructor/default.png') }}"class="img-fluid rounded border"
                        style="max-height: 400px; object-fit: cover;">

                </div>

            </div>
        </div>

    </div>

    {{-- LIVE PREVIEW --}}
    <script>
        document.getElementById('photoInput').addEventListener('change', function(e) {
            const reader = new FileReader();
            reader.onload = (e) => {
                document.getElementById('photoPreview').src = e.target.result;
            }
            reader.readAsDataURL(this.files[0]);
        });
    </script>
@endsection
