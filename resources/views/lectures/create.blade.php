@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>➕ Tambah Sesi UTBK</h2>

    <form action="{{ route('utbk.store') }}" method="POST" class="mt-4">
        @csrf

        <!-- Mata Pelajaran -->
        <div class="mb-3">
            <label class="form-label">Mata Pelajaran</label>
            <input type="text" name="subject" class="form-control" required value="{{ old('subject') }}">
        </div>

        <!-- Tanggal -->
        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="date" class="form-control" required value="{{ old('date') }}">
        </div>

        <!-- Jam Mulai -->
        <div class="mb-3">
            <label class="form-label">Jam Mulai</label>
            <input type="time" name="start_time" class="form-control" required value="{{ old('start_time') }}">
        </div>

        <!-- Jam Selesai -->
        <div class="mb-3">
            <label class="form-label">Jam Selesai</label>
            <input type="time" name="end_time" class="form-control" required value="{{ old('end_time') }}">
        </div>

        <!-- Catatan -->
        <div class="mb-3">
            <label class="form-label">Catatan</label>
            <textarea name="notes" class="form-control">{{ old('notes') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('utbk.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
