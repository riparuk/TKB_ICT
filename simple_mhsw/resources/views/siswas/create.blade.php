@extends('layouts.app')

@section('content')
<div class="alert alert-info">
    <strong>Petunjuk Pengisian:</strong>
    <ul>
        <li><strong>NIK</strong> harus terdiri dari 16 digit angka.</li>
        <li><strong>Nama</strong> harus ditulis dalam huruf kapital.</li>
        <li><strong>Tanggal Lahir</strong> harus dalam format yang benar (YYYY-MM-DD).</li>
        <li><strong>Jenis Kelamin</strong> harus dipilih antara Laki-laki atau Perempuan.</li>
        <li><strong>Agama</strong> harus dipilih sesuai daftar yang tersedia.</li>
        <li><strong>Hobi</strong> bisa dipilih lebih dari satu.</li>
        <li><strong>Foto</strong> harus dalam format JPG, PNG, atau JPEG, maksimal ukuran 2MB.</li>
    </ul>
</div>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <h2>Tambah Siswa</h2>
    
    <form action="{{ route('siswas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label>NIK:</label>
            <input type="text" name="nik" required 
                maxlength="16" pattern="\d{16}" 
                title="NIK harus terdiri dari 16 digit angka">
            @error('nik')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div>
            <label>Nama:</label>
            <input type="text" name="nama" required style="text-transform: uppercase;">
            @error('nama')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div>
            <label>Tempat Lahir:</label>
            <input type="text" name="tempat_lahir" required>
            @error('tempat_lahir')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div>
            <label>Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" required>
            @error('tanggal_lahir')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div>
            <label>Jenis Kelamin:</label><br>
            <input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
            <input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan
            @error('jenis_kelamin')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div>
            <label>Agama:</label>
            <select name="agama" required>
                <option value="">Pilih Agama</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
            </select>
            @error('agama')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div>
            <label>Alamat:</label>
            <textarea name="alamat" required rows="3" cols="30"></textarea>
            @error('alamat')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div>
            <label>Hobi:</label><br>
            <input type="checkbox" name="hobi[]" value="Membaca"> Membaca
            <input type="checkbox" name="hobi[]" value="Olahraga"> Olahraga
            <input type="checkbox" name="hobi[]" value="Musik"> Musik
            <input type="checkbox" name="hobi[]" value="Gaming"> Gaming
            @error('hobi')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div>
            <label>Upload Foto:</label>
            <input type="file" name="foto">
            @error('foto')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <button type="submit">Simpan</button>
    </form>
</div>
@endsection