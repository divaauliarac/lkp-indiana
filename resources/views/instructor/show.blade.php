@extends('layouts.app')

@section('content')
    <div class="container">

        <h3 class="mb-4">Detail Instructor</h3>

        <div class="row">

            {{-- LEFT — INFORMATION --}}
            <div class="col-md-8">

                <div class="card shadow-sm p-4">

                    <h4 class="fw-semibold mb-4">{{ $instructor->name }}</h4>

                    <table class="table table-borderless">

                        <tr>
                            <th width="150" class="text-secondary">Gender</th>
                            <td class="fw-semibold">
                                {{ $instructor->gender == 'male' ? 'Male' : 'Female' }}
                            </td>
                        </tr>

                        <tr>
                            <th class="text-secondary">Expertise</th>
                            <td class="fw-semibold">
                                @if ($instructor->expertise == 'pg')
                                    Programming
                                @elseif ($instructor->expertise == 'dg')
                                    Design
                                @elseif ($instructor->expertise == 'ap')
                                    Office
                                @elseif ($instructor->expertise == 'jk')
                                    Network
                                @else
                                    -
                                @endif

                            </td>
                        </tr>

                        <tr>
                            <th class="text-secondary">Phone</th>
                            <td class="fw-semibold">{{ $instructor->phone ?? '-' }}</td>
                        </tr>

                        <tr>
                            <th class="text-secondary">Address</th>
                            <td class="fw-semibold">{{ $instructor->address ?? '-' }}</td>
                        </tr>

                        <tr>
                            <th class="text-secondary">Created At</th>
                            <td>{{ $instructor->created_at->format('d M Y') }}</td>
                        </tr>

                        <tr>
                            <th class="text-secondary">Updated At</th>
                            <td>{{ $instructor->updated_at->format('d M Y') }}</td>
                        </tr>

                    </table>

                    <div class="mt-3">
                        <a href="{{ route('instructor.index') }}" class="btn btn-secondary">
                            Back
                        </a>

                        <a href="{{ route('instructor.edit', $instructor->id) }}" class="btn btn-primary">
                            Edit
                        </a>
                    </div>

                </div>

            </div>

            {{-- RIGHT — PHOTO --}}
            <div class="col-md-4">

                <div class="card shadow-sm p-3 text-center">

                    <h5 class="mb-3 fw-semibold">Photo</h5>

                    <img src="{{ $instructor->photo ? asset('assets/img/instructor/' . $instructor->photo) : asset('assets/img/instructor/default.png') }}"class="img-fluid rounded border"
                        style="max-height: 400px; object-fit: cover;">

                </div>

            </div>

        </div>

    </div>
@endsection
