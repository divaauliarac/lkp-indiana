@extends('layouts.app')

@section('content')
    <h1>Edit Subject</h1>

    @if ($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('subject.update', $subject->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Nama Subject</label>
            <input type="text" name="name" value="{{ old('name', $subject->name) }}" required>
        </div>
        <button type="submit">Update</button>
        <a href="{{ route('subject.index') }}">Kembali</a>
    </form>
@endsection
