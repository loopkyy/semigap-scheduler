@extends('layouts.app')

@section('title', 'Jadwal Kuliah')

@section('content')
<h1 class="mb-4">📖 Jadwal Kuliah</h1>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('lectures.create') }}" class="btn btn-success mb-3 shadow-sm">
    <i class="bi bi-plus-lg"></i> Tambah
</a>

<div class="card shadow-sm p-3">
    <table class="table table-hover align-middle">
        <thead class="table-primary">
            <tr>
                <th>Mata Kuliah</th>
                <th>Hari</th>
                <th>Jam</th>
                <th>Ruangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
          @foreach($lectures as $id => $lecture)
<tr>
    <td>{{ $lecture['name'] }}</td>
    <td>{{ $lecture['day'] }}</td>
    <td>{{ $lecture['start_time'] }} - {{ $lecture['end_time'] }}</td>
    <td>{{ $lecture['room'] }}</td>
    <td>
        <a href="{{ route('lectures.edit', $id) }}" class="btn btn-warning btn-sm me-1">
            <i class="bi bi-pencil-square"></i>
        </a>
        <form action="{{ route('lectures.destroy', $id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin dihapus?')">
                <i class="bi bi-trash"></i>
            </button>
        </form>
    </td>
</tr>
@endforeach
        </tbody>
    </table>
</div>
@endsection
