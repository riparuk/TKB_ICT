<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Siswa')</title>
</head>
<body>
    <header>
        <h1>Selamat Datang di Aplikasi Siswa</h1>
        <nav>
            <a href="{{ route('siswas.index') }}">Daftar Siswa</a> |
            <a href="{{ route('siswas.create') }}">Tambah Siswa</a>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>