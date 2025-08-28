@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Sesi UTBK</h2>

    <form action="{{ route('utbk-sessions.update', $utbk_session->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="subject" class="form-label">Mata Pelajaran</label>
            <input type="text" class="form-control" name="subject" value="{{ $utbk_session->subject }}" required>
        </div>

        <div class="mb-3">
            <label for="day" class="form-label">Hari</label>
            <input type="text" class="form-control" name="day" value="{{ $utbk_session->day }}" required>
        </div>

        <div class="mb-3">
            <label for="start_time" class="form-label">Jam Mulai</label>
            <input type="time" class="form-control" name="start_time" value="{{ $utbk_session->start_time }}" required>
        </div>

        <div class="mb-3">
            <label for="end_time" class="form-label">Jam Selesai</label>
            <input type="time" class="form-control" name="end_time" value="{{ $utbk_session->end_time }}" required>
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">Catatan</label>
            <textarea class="form-control" name="notes">{{ $utbk_session->notes }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('utbk-sessions.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
