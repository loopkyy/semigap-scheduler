@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="bi bi-journal-text"></i> UTBK Sessions</h2>
        <a href="{{ route('utbk-sessions.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Add Session
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row g-3">
        @forelse($sessions as $session)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card shadow-sm h-100 card-hover">
                <div class="card-body">
                    <h5>{{ $session->subject }}</h5>
                    <p><i class="bi bi-calendar-event"></i> {{ $session->day }}</p>
                    <p><i class="bi bi-clock"></i> {{ $session->start_time }} - {{ $session->end_time }}</p>
                    @if($session->notes)
                    <p><i class="bi bi-sticky"></i> {{ $session->notes }}</p>
                    @endif
                </div>
                <div class="card-footer d-flex justify-content-end gap-2 bg-transparent">
                    <a href="{{ route('utbk-sessions.edit', $session->id) }}" class="btn btn-sm btn-primary">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('utbk-sessions.destroy', $session->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
            <div class="col-12 text-center text-muted">No UTBK sessions yet.</div>
        @endforelse
    </div>
</div>
@endsection

@push('styles')
<style>
.card-hover { 
    transition: transform 0.2s, box-shadow 0.2s; 
}
.card-hover:hover { 
    transform: translateY(-5px); 
    box-shadow: 0 10px 25px rgba(0,0,0,0.15); 
}
</style>
@endpush
