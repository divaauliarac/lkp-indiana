@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Subject') }}</div>

                    <div class="card-body">
                        <h5>Form</h5>
                        <form action="{{ route('subject.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="subject" class="form-label">Subject</label>
                                        <input type="text" name="subject" id="subject"
                                            class="form-control @error('subject') is-invalid @enderror"
                                            placeholder="Enter subject name" value="{{ $subject->name }}">

                                        @error('subject')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        <button type="submit" class="btn btn-primary mt-3 w-25">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
