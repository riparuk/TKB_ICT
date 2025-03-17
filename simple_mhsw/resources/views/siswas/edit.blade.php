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
<div class="container p-4" style="max-width: 600px; background: #f8f9fa; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
    <h2 class="text-center mb-4">Edit Siswa</h2>

    <form action="{{ route('siswas.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label>NIK:</label>
            <input type="text" name="nik" value="{{ $siswa->nik }}" required 
                maxlength="16" pattern="\d{16}" 
                title="NIK harus terdiri dari 16 digit angka">
            @error('nik')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div>
            <label>Nama:</label>
            <input type="text" name="nama" value="{{ $siswa->nama }}" required style="text-transform: uppercase;">
            @error('nama')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div>
            <label>Tempat Lahir:</label>
            <input type="text" name="tempat_lahir" value="{{ $siswa->tempat_lahir }}" required>
            @error('tempat_lahir')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div>
            <label>Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" value="{{ $siswa->tanggal_lahir }}" required>
            @error('tanggal_lahir')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div>
            <label>Jenis Kelamin:</label><br>
            <input type="radio" name="jenis_kelamin" value="Laki-laki" {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }}> Laki-laki
            <input type="radio" name="jenis_kelamin" value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}> Perempuan
            @error('jenis_kelamin')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div>
            <label>Agama:</label>
            <select name="agama" required>
                <option value="Islam" {{ $siswa->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                <option value="Kristen" {{ $siswa->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                <option value="Katolik" {{ $siswa->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                <option value="Hindu" {{ $siswa->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                <option value="Buddha" {{ $siswa->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                <option value="Konghucu" {{ $siswa->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
            </select>
            @error('agama')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div>
            <label>Alamat:</label>
            <textarea name="alamat" required rows="3" cols="30">{{ $siswa->alamat }}</textarea>
            @error('alamat')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div>
            <label>Hobi:</label><br>
            <input type="checkbox" name="hobi[]" value="Membaca" {{ in_array('Membaca', json_decode($siswa->hobi, true) ?? []) ? 'checked' : '' }}> Membaca
            <input type="checkbox" name="hobi[]" value="Olahraga" {{ in_array('Olahraga', json_decode($siswa->hobi, true) ?? []) ? 'checked' : '' }}> Olahraga
            <input type="checkbox" name="hobi[]" value="Musik" {{ in_array('Musik', json_decode($siswa->hobi, true) ?? []) ? 'checked' : '' }}> Musik
            <input type="checkbox" name="hobi[]" value="Gaming" {{ in_array('Gaming', json_decode($siswa->hobi, true) ?? []) ? 'checked' : '' }}> Gaming
            @error('hobi')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div>
            <label>Upload Foto:</label>
            <input type="file" name="foto">
            @if($siswa->foto)
                <br><a href="{{ asset('storage/' . $siswa->foto) }}" target="_blank">Lihat Foto Lama</a>
            @endif
            @error('foto')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">Update</button>
    </form>
</div>
@endsection