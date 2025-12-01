@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Student') }}</div>

                    <div class="card-body">
                        <h5>Form</h5>
                        <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    {{-- Full Name --}}
                                    <div class="mb-3 row align-items-center">
                                        <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" placeholder="Full Name" id="name"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback"> {{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Gender --}}
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-2 col-form-label">Gender</label>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline ">
                                                <input class="form-check-input @error('gender') is-invalid @enderror"
                                                    type="radio" name="gender" id="male" value="m"
                                                    {{ old('gender') == 'm' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="male">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input  @error('gender') is-invalid @enderror"
                                                    type="radio" name="gender" id="female" value="f"
                                                    {{ old('gender') == 'f' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="female">Female</label>
                                            </div>
                                            @error('gender')
                                                <p class="text-danger small">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Place, Date of Birth --}}
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-2 col-form-label">Place, Date of Birth</label>
                                        <div class="col-sm-10">
                                            <div class="row g-2">
                                                <div class="col-md-6">
                                                    <input type="text"
                                                        class="form-control @error('place') is-invalid @enderror"
                                                        name="place" placeholder="Place" value="{{ old('place') }}">
                                                    @error('place')
                                                        <div class="invalid-feedback"> {{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="date"
                                                        class="form-control  @error('dateofbirth') is-invalid @enderror"
                                                        id="dateofbirth" name="dateofbirth"
                                                        value="{{ old('dateofbirth') }}">
                                                    @error('dateofbirth')
                                                        <div class="invalid-feedback"> {{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Alamat --}}
                                    <div class="mb-3 row align-items-center">
                                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Address"
                                                id="address">{{ old('address') }}</textarea>
                                            @error('address')
                                                <div class="invalid-feedback"> {{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Phone --}}
                                    <div class="mb-3 row align-items-center">
                                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                                id="phone" name="phone" placeholder="Enter your phone number"
                                                value="{{ old('phone') }}" maxlength="15"
                                                oninput="this.value.replace(/[^0-9]/g,'')">
                                            @error('phone')
                                                <div class="invalid-feedback"> {{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Subject --}}
                                    <div class="mb-3 row align-items-center">
                                        <label for="subject" class="col-sm-2 col-form-label">Subject</label>
                                        <div class="col-sm-10">
                                            <select class="form-select @error('subject') is-invalid @enderror"
                                                name="subject" id="subject">
                                                <option value="" selected disabled>Select the Subject</option>
                                                <option value="pg" {{ old('subject') == 'pg' ? 'selected' : '' }}>
                                                    Programming</option>
                                                <option value="dg" {{ old('subject') == 'dg' ? 'selected' : '' }}>
                                                    Design</option>
                                                <option value="ap" {{ old('subject') == 'ap' ? 'selected' : '' }}>
                                                    Office</option>
                                                <option value="jk" {{ old('subject') == 'jk' ? 'selected' : '' }}>
                                                    Network</option>
                                            </select>
                                            @error('subject')
                                                <div class="invalid-feedback"> {{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Education --}}
                                    <div class="mb-3 row align-items-center">
                                        <label for="education" class="col-sm-2 col-form-label">Highest Education</label>
                                        <div class="col-sm-10">
                                            <select class="form-select @error('education') is-invalid @enderror"
                                                id="education" name="education">
                                                <option value="" selected disabled>Select your education</option>
                                                <option value="junior"
                                                    {{ old('education') == 'junior' ? 'selected' : '' }}>Junior High School
                                                </option>
                                                <option value="senior"
                                                    {{ old('education') == 'senior' ? 'selected' : '' }}>Senior High School
                                                </option>
                                                <option value="bachelor"
                                                    {{ old('education') == 'bachelor' ? 'selected' : '' }}>
                                                    Bachelor's Degree</option>
                                            </select>
                                            @error('education')
                                                <div class="invalid-feedback"> {{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Photo  --}}
                                    <div class="mb-3 row align-items-center">
                                        <label for="photo" class="col-sm-2 col-form-label">Upload Photo</label>
                                        <div class="col-sm-10">
                                            <input class="form-control @error('photo') is-invalid @enderror"
                                                type="file" id="photo" name="photo" accept="image/*">

                                            @error('photo')
                                                <div class="invalid-feedback"> {{ $message }}</div>
                                            @enderror
                                            <button type="submit" class="btn btn-primary mt-3 w-25">Submit</button>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <h6>Foto</h6>
                                    <img src="/assets/img/user.png" class="img-thumbnail" id="previewphoto"
                                        alt="">
                                </div>
                            </div>
                        </form>

                        <script>
                            document.getElementById("photo").addEventListener("change", function(e) {
                                const file = e.target.files[0];
                                const preview = document.getElementById("previewphoto");

                                if (file) {
                                    if (file.type.startsWith("image/")) {
                                        preview.src = URL.createObjectURL(file);
                                    } else {
                                        alert("Please upload a valid image file.");
                                        e.target.value = "";
                                        preview.src = "/assets/img/user.png";
                                    }
                                }
                            });

                            // document.getElementById("photo").addEventListener("change", function(e) {
                            //     const file = e.target.files[0];
                            //     if (file) {
                            //         if (file.type.startsWith('image/')) { // Cek apakah file adalah gambar
                            //             document.getElementById("previewphoto").src = URL.createObjectURL(file);
                            //         } else {
                            //             alert("Please upload a valid image file.");
                            //         }
                            //     }
                            // });

                            // document.getElementById('phone').addEventListener("input", function(e) {
                            //     const phone = this.value.replace(/\D/g, "").slice(0, 12);
                            //     phone = phone.replace(/(\d{4})(\d)/, "$1-$2");
                            //     phone = phone.replace(/(\d{4})(\d)/, "$1-$2");
                            // })
                        </script>
                    </div>
                </div>
            </div>
        </div>
    @endsection
