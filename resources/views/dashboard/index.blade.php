@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <h3 class="mb-4 fw-bold">Dashboard</h3>

        <div class="row g-4">

            {{-- Number of Students --}}
            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body text-center p-4">
                        <h6 class="text-muted mb-2">Number of Students</h6>
                        <h2 class="fw-bold text-primary">{{ $siswaCount }}</h2>
                    </div>
                </div>
            </div>

            {{-- Number of Instructors --}}
            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body text-center p-4">
                        <h6 class="text-muted mb-2">Number of Instructors</h6>
                        <h2 class="fw-bold text-success">{{ $instructorCount }}</h2>
                    </div>
                </div>
            </div>

            {{-- Number of Subjects --}}
            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body text-center p-4">
                        <h6 class="text-muted mb-2">Number of Subjects</h6>
                        <h2 class="fw-bold text-warning">{{ $subjectCount }}</h2>
                    </div>
                </div>
            </div>

            {{-- Number of Staff --}}
            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body text-center p-4">
                        <h6 class="text-muted mb-2">Number of Staff</h6>
                        <h2 class="fw-bold text-danger">4</h2>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection


{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="row align-item-center justify-content-center text-center fw-bold">
                            <div class="col-md-3 ">Number of Students  <br> <span class="h3">56</span></div>
                            <div class="col-md-3">Number of Instructors <br> <span class="h3">10</span></div>
                            <div class="col-md-3">Number of Subjects<br> <span class="h3">4</span></div>
                            <div class="col-md-3">Number of Staff <br> <span class="h3">20</span></div>
                        </div>
                    </div>
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div> --}}
{{-- </div>
        </div>
    </div>
</div>
@endsection --}}
