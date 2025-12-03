@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h3 class="mb-4 fw-bold">Dashboard</h3>

        <div class="row g-4 justify-content-center">
            {{-- Number of Students --}}
            <div class="col-md-3 col-sm-6">
                <div class="card shadow-sm border-0 rounded-3 text-center p-4">
                    <h6 class="text-muted mb-2">Number of Students</h6>
                    <h2 class="fw-bold text-primary">{{ $siswaCount }}</h2>
                </div>
            </div>

            {{-- Number of Subjects --}}
            <div class="col-md-3 col-sm-6">
                <div class="card shadow-sm border-0 rounded-3 text-center p-4">
                    <h6 class="text-muted mb-2">Number of Subjects</h6>
                    <h2 class="fw-bold text-warning">{{ $subjectsCount }}</h2>
                </div>
            </div>

            {{-- Number of Instructors --}}
            <div class="col-md-3 col-sm-6">
                <div class="card shadow-sm border-0 rounded-3 text-center p-4">
                    <h6 class="text-muted mb-2">Number of Instructors</h6>
                    <h2 class="fw-bold text-success">{{ $instructorCount }}</h2>
                </div>
            </div>
        </div>
    </div>
@endsection
