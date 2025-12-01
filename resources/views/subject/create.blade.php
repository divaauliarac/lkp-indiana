@extends('layouts.app')

@section('content')
    <h1>Tambah Subject</h1>

    @if ($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('subject.store') }}" method="POST">
        @csrf
        <div>
            <label>Nama Subject</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>
        <button type="submit">Simpan</button>
        <a href="{{ route('subject.index') }}">Kembali</a>
    </form>
@endsection
