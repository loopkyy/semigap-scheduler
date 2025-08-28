@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2><i class="bi bi-plus-lg"></i> Tambah Sesi UTBK</h2>

    <form action="{{ route('utbk-sessions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label"><i class="bi bi-book"></i> Mapel</label>
            <input type="text" name="subject" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label"><i class="bi bi-calendar-date"></i> Tanggal</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label"><i class="bi bi-clock"></i> Jam Mulai</label>
            <input type="time" name="start_time" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label"><i class="bi bi-clock-history"></i> Jam Selesai</label>
            <input type="time" name="end_time" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label"><i class="bi bi-card-text"></i> Catatan</label>
            <textarea name="notes" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Simpan
        </button>
        <a href="{{ route('utbk-sessions.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </form>
</div>
@endsection
