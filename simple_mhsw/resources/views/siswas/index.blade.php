@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Siswa</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table border="1">
        <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Hobi</th>
            <th>Foto</th>
            <th>PDF</th>
            <th>Aksi</th>
        </tr>
        @foreach ($siswas as $siswa)
        <tr>
            <td>{{ $siswa->nik }}</td>
            <td>{{ $siswa->nama }}</td>
            <td>{{ $siswa->jenis_kelamin }}</td>
            <td>{{ $siswa->agama }}</td>
            <td>{{ $siswa->hobi }}</td>
            <td>
                @if($siswa->foto)
                    <a href="{{ asset('storage/' . $siswa->foto) }}" target="_blank">Lihat Foto</a>
                @else
                    Tidak Ada Foto
                @endif
            </td>
            <td><a href="{{ route('siswas.pdf', $siswa->id) }}" class="btn btn-primary">Download PDF</a></td>
            <td>
                <a href="{{ route('siswas.edit', $siswa->id) }}">Edit</a>
                <form action="{{ route('siswas.destroy', $siswa->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection