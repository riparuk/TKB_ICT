<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Siswa</title>
</head>
<body>
    <h2 style="text-align: center;">Data Siswa Terdaftar</h2>
    <hr>
    <p style="text-align: center; font-size: 14px; color: gray;">Berikut adalah informasi siswa yang telah terdaftar dalam sistem.</p>
    <hr>
    <p><strong>NIK:</strong> {{ $siswa->nik }}</p>
    <p><strong>Nama:</strong> {{ $siswa->nama }}</p>
    <p><strong>Tempat Lahir:</strong> {{ $siswa->tempat_lahir }}</p>
    <p><strong>Tanggal Lahir:</strong> {{ $siswa->tanggal_lahir }}</p>

        <!-- Menampilkan Foto Jika Ada -->
        @if ($siswa->foto)
        <p><strong>Foto:</strong></p>
        <img src="{{ public_path('storage/' . $siswa->foto) }}" alt="Foto Siswa" width="150">
        @else
        <p><strong>Foto:</strong> Tidak tersedia</p>
        @endif
</body>
</html>