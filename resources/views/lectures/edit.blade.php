@extends('layouts.app')

@section('title', 'Edit Jadwal Kuliah')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">✏️ Edit Jadwal Kuliah</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm p-4">
        <form action="{{ route('lectures.update', $lecture->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Mata Kuliah</label>
                <input type="text" id="name" name="name" class="form-control" 
                       value="{{ old('name', $lecture->name) }}" placeholder="Contoh: Algoritma" required>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="lecturer" class="form-label">Dosen</label>
                <input type="text" id="lecturer" name="lecturer" class="form-control" 
                       value="{{ old('lecturer', $lecture->lecturer) }}" placeholder="Nama dosen" required>
                @error('lecturer')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Tanggal</label>
                <input type="date" id="date" name="date" class="form-control" 
                       value="{{ old('date', $lecture->date->format('Y-m-d')) }}" required>
                @error('date')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="start_time" class="form-label">Jam Mulai</label>
                    <input type="time" id="start_time" name="start_time" class="form-control" 
                           value="{{ old('start_time', $lecture->start_time) }}" required>
                    @error('start_time')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col">
                    <label for="end_time" class="form-label">Jam Selesai</label>
                    <input type="time" id="end_time" name="end_time" class="form-control" 
                           value="{{ old('end_time', $lecture->end_time) }}" required>
                    @error('end_time')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label for="room" class="form-label">Ruangan</label>
                <input type="text" id="room" name="room" class="form-control" 
                       value="{{ old('room', $lecture->room) }}" placeholder="Contoh: Lab 1" required>
                @error('room')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
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
