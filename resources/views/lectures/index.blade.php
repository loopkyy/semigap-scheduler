@extends('layouts.app')

@section('title', 'Jadwal Kuliah')

@section('content')
<h1 class="mb-4">📖 Jadwal Kuliah</h1>
<a href="#" class="btn btn-success mb-3 shadow-sm">+ Tambah Jadwal Kuliah</a>

<div class="card shadow-sm p-3">
    <table class="table table-hover align-middle">
        <thead class="table-primary">
            <tr>
                <th>Mata Kuliah</th>
                <th>Hari</th>
                <th>Jam</th>
                <th>Ruangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lectures as $lecture)
            <tr>
                <td>{{ $lecture['name'] }}</td>
                <td>{{ $lecture['day'] }}</td>
                <td>{{ $lecture['start_time'] }} - {{ $lecture['end_time'] }}</td>
                <td>{{ $lecture['room'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
