@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>➕ Tambah Sesi UTBK</h2>

    <form action="{{ route('utbk-sessions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Subject</label>
            <input type="text" name="subject" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jam Mulai</label>
            <input type="time" name="start_time" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jam Selesai</label>
            <input type="time" name="end_time" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Catatan</label>
            <textarea name="notes" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">💾 Simpan</button>
        <a href="{{ route('utbk-sessions.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
    </form>
</div>
@endsection
