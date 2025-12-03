@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Details Student') }}</div>

                    <div class="card-body">
                        <h5>Detail Siswa<h5>
                                <div class="row">
                                    <div class="col-md-8">
                                        {{-- Full Name --}}
                                        <div class="mb-3 row align-items-center">
                                            <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control text-uppercase" name="name"
                                                    placeholder="Full Name" id="name" value="{{ $siswa->name }}"
                                                    disabled>
                                            </div>
                                        </div>

                                        {{-- Gender --}}
                                        <div class="mb-3 row align-items-center">
                                            <label class="col-sm-2 col-form-label">Gender</label>
                                            <div class="col-sm-10">
                                                <div class="form-check form-check-inline ">
                                                    <input class="form-check-input " type="radio" name="gender"
                                                        id="male" value="m"
                                                        {{ $siswa->gender == 'm' ? 'checked' : '' }} disabled>
                                                    <label class="form-check-label" for="male">Male</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        id="female" value="f"
                                                        {{ $siswa->gender == 'f' ? 'checked' : '' }} disabled>
                                                    <label class="form-check-label" for="female">Female</label>
                                                </div>

                                            </div>
                                        </div>

                                        {{-- Place, Date of Birth --}}
                                        <div class="mb-3 row align-items-center">
                                            <label class="col-sm-2 col-form-label">Place, Date of Birth</label>
                                            <div class="col-sm-10">
                                                <div class="row g-2">
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control text-capitalize" disabled
                                                            name="place" placeholder="Place" value="{{ $siswa->place }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control text-capitalize"
                                                            id="dateofbirth"name="dateofbirth"
                                                            value="{{ \Carbon\Carbon::parse($siswa->dateofbirth)->format('d M Y') }}"
                                                            disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Alamat --}}
                                        <div class="mb-3 row align-items-center">
                                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="address" placeholder="Address" id="address" disabled>{{ $siswa->address }}</textarea>
                                            </div>
                                        </div>

                                        {{-- Phone --}}
                                        <div class="mb-3 row align-items-center">
                                            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                            <div class="col-sm-10">
                                                <input type="tel" class="form-control" id="phone" name="phone"
                                                    disabled placeholder="Enter your phone number"
                                                    value="{{ $siswa->phone }}" disabled>
                                            </div>
                                        </div>

                                        {{-- Subject --}}
                                        <div class="mb-3 row align-items-center">
                                            <label for="subject" class="col-sm-2 col-form-label">Subject</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="subject" id="subject" disabled>
                                                    @if ($siswa->subject == 'ap')
                                                        <option>Office</option>
                                                    @endif
                                                    @if ($siswa->subject == 'dg')
                                                        <option>Design</option>
                                                    @endif
                                                    @if ($siswa->subject == 'pg')
                                                        <option>Programming</option>
                                                    @endif
                                                    @if ($siswa->subject == 'jk')
                                                        <option>Network</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        {{-- Education --}}
                                        <div class="mb-3 row align-items-center">
                                            <label for="education" class="col-sm-2 col-form-label">Highest Education</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" id="education" name="education" disabled>
                                                    {{-- <option >{{ strtoupper ($siswa->education) }}</option> --}}
                                                    <option value="" selected disabled>Select the Subject</option>
                                                    <option value="junior"
                                                        {{ $siswa->education == 'junior' ? 'selected' : '' }}>Junior High
                                                        School</option>
                                                    <option value="senior"
                                                        {{ $siswa->education == 'senior' ? 'selected' : '' }}>Senior High
                                                        School</option>
                                                    <option
                                                        value="bachelor"{{ $siswa->education == 'bachelor' ? 'selected' : '' }}>
                                                        Bachelor's Degree</option>
                                                </select>
                                            </div>
                                        </div>

                                        {{-- Photo  --}}
                                        <div class="mb-3 row align-items-center">
                                            <div class="col-sm-10">
                                                <a href="{{ route('siswa.edit', $siswa->id) }}"
                                                    class="btn btn-warning mt-3 w-25">Edit</a>
                                                <a href="{{ route('siswa.index', $siswa->id) }}"
                                                    class="btn btn-secondary mt-3 w-25">Back</a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <h6>Foto</h6>
                                        <img src="{{ '/assets/img/foto-siswa/' . $siswa->photo }}" class="img-thumbnail"
                                            id="previewphoto" alt="">
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
