@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <!-- Header & Tombol Tambah -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h2 class="fw-bold text-primary">
            <i class="bi bi-journal-text me-2"></i> Jadwal UTBK
        </h2>
        <a href="{{ route('utbk-sessions.create') }}" class="btn btn-success shadow-sm mt-2 mt-md-0">
            <i class="bi bi-plus-lg"></i> Tambah Sesi
        </a>
    </div>

    <!-- Tabs -->
    <ul class="nav nav-tabs mb-3" id="utbkTab" role="tablist">
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
                                    <h5 class="card-title fw-bold text-success">
                                        <i class="bi bi-bookmark-star me-2"></i>{{ $session->subject }}
                                    </h5>
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
                                        <a href="{{ route('utbk-sessions.edit', $session->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $session->id }}">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
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
                                    <h5 class="card-title fw-bold text-secondary">
                                        <i class="bi bi-clock-history me-2"></i>{{ $session->subject }}
                                    </h5>
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

                                    <div class="d-flex justify-content-end mt-3">
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModalLewat{{ $session->id }}">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <!-- Modals Aktif -->
    @foreach($sessionsAktif as $session)
        <div class="modal fade" id="hapusModal{{ $session->id }}" tabindex="-1" aria-labelledby="hapusModalLabel{{ $session->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusModalLabel{{ $session->id }}">Hapus Sesi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Yakin ingin menghapus sesi <strong>{{ $session->subject }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="{{ route('utbk-sessions.destroy', $session->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modals Lewat -->
    @foreach($sessionsLewat as $session)
        <div class="modal fade" id="hapusModalLewat{{ $session->id }}" tabindex="-1" aria-labelledby="hapusModalLewatLabel{{ $session->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusModalLewatLabel{{ $session->id }}">Hapus Sesi Lewat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Yakin ingin menghapus sesi <strong>{{ $session->subject }}</strong> yang sudah lewat?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="{{ route('utbk-sessions.destroy', $session->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>

{{-- Hover effect --}}
<style>
.hover-card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.hover-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
}
</style>
@endsection
