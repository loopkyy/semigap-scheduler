@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Jadwal Belajar UTBK</h1>

    <a href="{{ route('utbk-sessions.create') }}" class="btn btn-primary mb-3">+ Tambah Sesi Belajar</a>

    @if($sessions->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mapel</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Catatan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sessions as $session)
                    <tr>
                        <td>{{ $session->subject }}</td>
                        <td>{{ $session->day }}</td>
                        <td>{{ $session->start_time }} - {{ $session->end_time }}</td>
                        <td>{{ $session->notes }}</td>
                        <td>
                            @if($session->is_done)
                                ✅ Selesai
                            @else
                                ⏳ Belum
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('utbk-sessions.edit', $session->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('utbk-sessions.destroy', $session->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Belum ada jadwal belajar.</p>
    @endif
</div>
@endsection
