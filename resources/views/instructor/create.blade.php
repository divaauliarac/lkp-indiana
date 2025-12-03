@extends('layouts.app')

@section('content')
    <div class="container">

        <h3 class="mb-4">Tambah Instructor</h3>

        <div class="row">
            {{-- LEFT SIDE: FORM --}}
            <div class="col-md-8">

                <div class="card shadow-sm p-4">
                    <form action="{{ route('instructor.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- NAME --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        {{-- GENDER --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Gender</label><br>

                            <label class="me-3">
                                <input type="radio" name="gender" value="male" required>
                                Male
                            </label>

                            <label>
                                <input type="radio" name="gender" value="female" required>
                                Female
                            </label>
                        </div>

                        {{-- EXPERTISE --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Expertise</label>
                            <select class="form-select" name="expertise" required>
                                <option value="" disabled selected>Select Expertise</option>
                                <option value="pg">Programming</option>
                                <option value="dg">Design</option>
                                <option value="ap">Office</option>
                                <option value="jk">Network</option>
                            </select>
                        </div>

                        {{-- PHONE --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Phone</label>
                            <input type="text" name="phone" class="form-control">
                        </div>

                        {{-- ADDRESS --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Address</label>
                            <textarea name="address" class="form-control"></textarea>
                        </div>

                        {{-- PHOTO UPLOAD --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Photo</label>
                            <input type="file" name="photo" class="form-control" accept="image/*" id="photoInput">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('instructor.index') }}" class="btn btn-secondary">Back</a>

                    </form>

                    {{-- JS PREVIEW --}}
                    <script>
                        document.getElementById("photo").addEventListener("change", function(e) {
                            const file = e.target.files[0];
                            const preview = document.getElementById("photoPreview");

                            if (file) {
                                if (file.type.startsWith("image/")) {
                                    preview.src = URL.createObjectURL(file);
                                } else {
                                    alert("Please upload a valid image file.");
                                    e.target.value = "";
                                    preview.src = "/assets/img/instructor/default.png";
                                }
                            }
                        });
                    </script>
                </div>
            </div>
            {{-- RIGHT SIDE: PHOTO PREVIEW --}}
            <div class="col-md-4">

                <div class="card shadow-sm p-3 text-center">
                    <h5 class="mb-3">Preview Photo</h5>

                    <img id="photoPreview" src="{{ asset('assets/img/instructor/default.png') }}"
                        class="img-fluid rounded border" style="max-height: 400px; object-fit: cover;">
                </div>

            </div>
        </div>
    </div>
@endsection
