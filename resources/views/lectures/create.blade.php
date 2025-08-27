@extends('layouts.app')

@section('title', 'Tambah Jadwal Kuliah')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">➕ Tambah Jadwal Kuliah</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm p-4">
        <form action="{{ route('lectures.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Mata Kuliah</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Contoh: Algoritma" required>
            </div>

            <div class="mb-3">
                <label for="lecturer" class="form-label">Dosen</label>
                <input type="text" id="lecturer" name="lecturer" class="form-control" placeholder="Nama dosen" required>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Tanggal</label>
                <input type="date" id="date" name="date" class="form-control" required>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="start_time" class="form-label">Jam Mulai</label>
                    <input type="time" id="start_time" name="start_time" class="form-control" required>
                </div>
                <div class="col">
                    <label for="end_time" class="form-label">Jam Selesai</label>
                    <input type="time" id="end_time" name="end_time" class="form-control" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="room" class="form-label">Ruangan</label>
                <input type="text" id="room" name="room" class="form-control" placeholder="Contoh: Lab 1" required>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success shadow-sm">
                    <i class="bi bi-check-lg"></i> Simpan
                </button>
                <a href="{{ route('lectures.index') }}" class="btn btn-secondary shadow-sm">
                    <i class="bi bi-x-lg"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
