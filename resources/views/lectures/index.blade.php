@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Mata Kuliah</h1>

    <a href="{{ route('lectures.create') }}" class="btn btn-primary mb-3">+ Tambah Mata Kuliah</a>

    @if($lectures->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Dosen</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Ruangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lectures as $lecture)
                    <tr>
                        <td>{{ $lecture->name }}</td>
                        <td>{{ $lecture->lecturer }}</td>
                        <td>{{ $lecture->day }}</td>
                        <td>{{ $lecture->start_time }} - {{ $lecture->end_time }}</td>
                        <td>{{ $lecture->room }}</td>
                        <td>
                            <a href="{{ route('lectures.edit', $lecture->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('lectures.destroy', $lecture->id) }}" method="POST" style="display:inline;">
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
        <p>Belum ada data mata kuliah.</p>
    @endif
</div>
@endsection
