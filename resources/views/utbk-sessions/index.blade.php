@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <!-- Header & Tambah Jadwal -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h2><i class="bi bi-journal-text"></i> Jadwal UTBK</h2>
        <a href="{{ route('utbk_sessions.create') }}" class="btn btn-success shadow-sm mt-2 mt-md-0">
            <i class="bi bi-plus-lg"></i> Tambah Jadwal
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabs -->
    <ul class="nav nav-tabs" id="utbkTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="aktif-tab" data-bs-toggle="tab" data-bs-target="#aktif" type="button" role="tab">
                Aktif
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="lewat-tab" data-bs-toggle="tab" data-bs-target="#lewat" type="button" role="tab">
                Lewat
            </button>
        </li>
    </ul>

    <div class="tab-content mt-3">
        <!-- Tab Aktif -->
        <div class="tab-pane fade show active" id="aktif" role="tabpanel">
            <div class="row g-3">
                @php
                    $today = \Carbon\Carbon::today();
                    $aktifSessions = $sessions->filter(fn($s) => \Carbon\Carbon::parse($s->date)->gte($today));
                @endphp
                @forelse($aktifSessions as $session)
                    @include('utbk_sessions._card', ['session' => $session])
                @empty
                    <div class="col-12 text-center text-muted">
                        <i class="bi bi-inbox"></i> Belum ada jadwal aktif.
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Tab Lewat -->
        <div class="tab-pane fade" id="lewat" role="tabpanel">
            <div class="row g-3">
                @php
                    $lewatSessions = $sessions->filter(fn($s) => \Carbon\Carbon::parse($s->date)->lt($today));
                @endphp
                @forelse($lewatSessions as $session)
                    @include('utbk_sessions._card', ['session' => $session])
                @empty
                    <div class="col-12 text-center text-muted">
                        <i class="bi bi-inbox"></i> Tidak ada jadwal lewat.
                    </div>
                @endforelse
            </div>
        </div>
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
