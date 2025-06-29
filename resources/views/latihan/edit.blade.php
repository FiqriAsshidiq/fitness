@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Teknik Latihan</h2>

    <form action="{{ route('latihan.update', $latihan->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Kode</label>
            <input type="text" name="kode" class="form-control" value="{{ $latihan->kode }}" required>
        </div>

        <div class="mb-3">
            <label>Nama Teknik</label>
            <input type="text" name="nama_teknik" class="form-control" value="{{ $latihan->nama_teknik }}" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('latihan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
