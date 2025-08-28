@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Tambah Sesi UTBK</h2>

    <form action="{{ route('utbk-sessions.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="subject" class="form-label">Mata Pelajaran</label>
            <input type="text" class="form-control" name="subject" required>
        </div>

        <div class="mb-3">
            <label for="day" class="form-label">Hari</label>
            <input type="text" class="form-control" name="day" required>
        </div>

        <div class="mb-3">
            <label for="start_time" class="form-label">Jam Mulai</label>
            <input type="time" class="form-control" name="start_time" required>
        </div>

        <div class="mb-3">
            <label for="end_time" class="form-label">Jam Selesai</label>
            <input type="time" class="form-control" name="end_time" required>
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">Catatan</label>
            <textarea class="form-control" name="notes"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('utbk-sessions.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
