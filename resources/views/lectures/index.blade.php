@extends('layouts.app')

@section('content')
<div class="container mt-4">

<!-- Header & Tambah Jadwal -->
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
    <h2><i class="bi bi-calendar3"></i> Jadwal Kuliah</h2>
    <a href="{{ route('lectures.create') }}" class="btn btn-success shadow-sm mt-2 mt-md-0">
        <i class="bi bi-plus-lg"></i> Tambah Jadwal
    </a>
</div>


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabs Aktif & Lewat -->
<ul class="nav nav-tabs mb-3" id="lectureTabs" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="active-tab" data-bs-toggle="tab" data-bs-target="#active" type="button" role="tab">
            <i class="bi bi-pin-angle"></i> Aktif
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="past-tab" data-bs-toggle="tab" data-bs-target="#past" type="button" role="tab">
            <i class="bi bi-hourglass-split"></i> Lewat
        </button>
    </li>
</ul>


    <div class="tab-content">
        <!-- Jadwal Aktif -->
        <div class="tab-pane fade show active" id="active" role="tabpanel">
            <div class="row g-3">
                @forelse($activeLectures as $lecture)
                    @php
                        $dayColors = ['Senin'=>'primary','Selasa'=>'success','Rabu'=>'info','Kamis'=>'warning','Jumat'=>'danger','Sabtu'=>'secondary','Minggu'=>'dark'];
                        $dayName = \Carbon\Carbon::parse($lecture->date)->translatedFormat('l');
                        $badgeColor = $dayColors[$dayName] ?? 'primary';
                    @endphp
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card shadow-sm h-100 card-hover">
                            <div class="card-body">
                                <h6><span class="badge bg-{{ $badgeColor }}">{{ \Carbon\Carbon::parse($lecture->date)->translatedFormat('l, d M Y') }}</span></h6>
                                <h5 class="card-title mt-2">{{ $lecture->name }}</h5>
                                <p><i class="bi bi-person"></i> {{ $lecture->lecturer }}</p>
                                <p><i class="bi bi-clock"></i> 
                                    {{ \Carbon\Carbon::parse($lecture->start_time)->format('H:i') }} - 
                                    {{ \Carbon\Carbon::parse($lecture->end_time)->format('H:i') }}
                                </p>
                                <p><i class="bi bi-building"></i> {{ $lecture->room }}</p>
                            </div>
                            <div class="card-footer bg-transparent d-flex justify-content-end gap-2">
                                <a href="{{ route('lectures.edit', $lecture->id) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $lecture->id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Hapus -->
                    <div class="modal fade" id="deleteModal{{ $lecture->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Hapus Jadwal</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah kamu yakin ingin menghapus jadwal <strong>{{ $lecture->name }}</strong> pada {{ \Carbon\Carbon::parse($lecture->date)->translatedFormat('l, d M Y') }}?
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('lectures.destroy', $lecture->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted">Belum ada jadwal aktif.</div>
                @endforelse
            </div>
        </div>

        <!-- Jadwal Lewat -->
       <!-- Jadwal Lewat -->
<div class="tab-pane fade" id="past" role="tabpanel">
    <div class="row g-3">
        @forelse($pastLectures as $lecture)
            @php
                $dayColors = ['Senin'=>'primary','Selasa'=>'success','Rabu'=>'info','Kamis'=>'warning','Jumat'=>'danger','Sabtu'=>'secondary','Minggu'=>'dark'];
                $dayName = \Carbon\Carbon::parse($lecture->date)->translatedFormat('l');
                $badgeColor = $dayColors[$dayName] ?? 'secondary';
                $badgeClass = 'bg-' . $badgeColor . ' bg-opacity-50';
            @endphp
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow-sm h-100 card-hover bg-light">
                    <div class="card-body text-muted text-decoration-line-through">
                        <h6><span class="{{ $badgeClass }}">{{ \Carbon\Carbon::parse($lecture->date)->translatedFormat('l, d M Y') }}</span></h6>
                        <h5 class="card-title mt-2">{{ $lecture->name }}</h5>
                        <p><i class="bi bi-person"></i> {{ $lecture->lecturer }}</p>
                        <p><i class="bi bi-clock"></i> 
                            {{ \Carbon\Carbon::parse($lecture->start_time)->format('H:i') }} - 
                            {{ \Carbon\Carbon::parse($lecture->end_time)->format('H:i') }}
                        </p>
                        <p><i class="bi bi-building"></i> {{ $lecture->room }}</p>
                    </div>
                    <div class="card-footer bg-transparent d-flex justify-content-end gap-2">
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $lecture->id }}">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
                        <!-- Modal Hapus -->
                        <div class="modal fade" id="deleteModal{{ $lecture->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Hapus Jadwal</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah kamu yakin ingin menghapus jadwal <strong>{{ $lecture->name }}</strong> pada {{ \Carbon\Carbon::parse($lecture->date)->translatedFormat('l, d M Y') }}?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('lectures.destroy', $lecture->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="col-12 text-center text-muted">Tidak ada jadwal yang sudah lewat.</div>
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
