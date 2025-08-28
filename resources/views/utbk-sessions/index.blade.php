@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h2 class="fw-bold text-primary">
            <i class="bi bi-journal-text me-2"></i> Jadwal UTBK
        </h2>
        <a href="{{ route('utbk-sessions.create') }}" class="btn btn-success shadow-sm mt-2 mt-md-0">
            <i class="bi bi-plus-lg"></i> Tambah Sesi
        </a>
    </div>

    <ul class="nav nav-tabs mb-3" id="utbkTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="aktif-tab" data-bs-toggle="tab" data-bs-target="#aktif" type="button" role="tab">Aktif</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="lewat-tab" data-bs-toggle="tab" data-bs-target="#lewat" type="button" role="tab">Lewat</button>
        </li>
    </ul>

    <div class="tab-content" id="utbkTabContent">
        <!-- Tab Aktif -->
        <div class="tab-pane fade show active" id="aktif" role="tabpanel">
            @if($sessionsAktif->isEmpty())
                <div class="alert alert-info">Belum ada sesi aktif.</div>
            @else
                <div class="row">
                    @foreach($sessionsAktif as $session)
                        <div class="col-md-4 mb-4">
                            <div class="card shadow-sm border-0 h-100 hover-card">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">{{ $session->subject }}</h5>
                                    <p class="text-muted mb-1">
                                        <i class="bi bi-calendar-date me-2"></i>
                                        {{ \Carbon\Carbon::parse($session->date)->format('d M Y') }}
                                    </p>
                                    <p class="text-muted mb-1">
                                        <i class="bi bi-clock me-2"></i>
                                        {{ date('H:i', strtotime($session->start_time)) }} - {{ date('H:i', strtotime($session->end_time)) }}
                                    </p>
                                    @if($session->notes)
                                        <p class="text-muted"><i class="bi bi-card-text me-2"></i>{{ $session->notes }}</p>
                                    @endif

                                    <div class="d-flex justify-content-between mt-3">
                                        <a href="{{ route('utbk-sessions.edit', $session->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                        <form action="{{ route('utbk-sessions.destroy', $session->id) }}" method="POST" onsubmit="return confirm('Yakin hapus sesi ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Tab Lewat -->
        <div class="tab-pane fade" id="lewat" role="tabpanel">
            @if($sessionsLewat->isEmpty())
                <div class="alert alert-secondary">Belum ada sesi yang lewat.</div>
            @else
                <div class="row">
                    @foreach($sessionsLewat as $session)
                        <div class="col-md-4 mb-4">
                            <div class="card shadow-sm border-0 h-100">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">{{ $session->subject }}</h5>
                                    <p class="text-muted mb-1">
                                        <i class="bi bi-calendar-date me-2"></i>
                                        {{ \Carbon\Carbon::parse($session->date)->format('d M Y') }}
                                    </p>
                                    <p class="text-muted mb-1">
                                        <i class="bi bi-clock me-2"></i>
                                        {{ date('H:i', strtotime($session->start_time)) }} - {{ date('H:i', strtotime($session->end_time)) }}
                                    </p>
                                    @if($session->notes)
                                        <p class="text-muted"><i class="bi bi-card-text me-2"></i>{{ $session->notes }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

</div>
@endsection
