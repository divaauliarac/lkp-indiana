@extends('layouts.app')

@section('content')
    <h1>Detail Subject</h1>

    @if (session('success'))
        <div style="color:green">{{ session('success') }}</div>
    @endif

    <div>
        <strong>Nama Subject:</strong> {{ $subject->name }}
    </div>

    <div style="margin-top: 10px;">
        <a href="{{ route('subject.index') }}">Kembali ke Daftar Subject</a> |
        <a href="{{ route('subject.edit', $subject->id) }}">Edit Subject</a>
    </div>
@endsection
