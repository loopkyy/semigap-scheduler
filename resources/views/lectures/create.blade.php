@extends('layouts.app')

@section('title', 'Tambah Jadwal Kuliah')

@section('content')
<h1 class="mb-4">➕ Tambah Jadwal Kuliah</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow-sm p-4">
    <form action="{{ route('lectures.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Mata Kuliah</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Hari</label>
            <select name="day" class="form-select" required>
                <option value="">Pilih Hari</option>
                <option>Senin</option>
                <option>Selasa</option>
                <option>Rabu</option>
                <option>Kamis</option>
                <option>Jumat</option>
                <option>Sabtu</option>
            </select>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Jam Mulai</label>
                <input type="time" name="start_time" class="form-control" required>
            </div>
            <div class="col">
                <label class="form-label">Jam Selesai</label>
                <input type="time" name="end_time" class="form-control" required>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Ruangan</label>
            <input type="text" name="room" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary shadow-sm">
    <i class="bi bi-check-lg"></i> Simpan
</button>
<a href="{{ route('lectures.index') }}" class="btn btn-secondary shadow-sm">
    <i class="bi bi-x-lg"></i> Batal
</a>

    </form>
</div>
@endsection
