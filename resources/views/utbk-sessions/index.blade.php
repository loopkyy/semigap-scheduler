@extends('layouts.app')

@section('content')
    <h1 class="mb-4">📝 Jadwal Belajar UTBK</h1>
    <a href="#" class="btn btn-success mb-3">Tambah Sesi Belajar</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mapel</th>
                <th>Hari</th>
                <th>Jam</th>
                <th>Target</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Matematika</td>
                <td>Selasa</td>
                <td>13:00 - 15:00</td>
                <td>Latihan Soal 20 Nomor</td>
            </tr>
        </tbody>
    </table>
@endsection
