<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = ['nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'alamat', 'hobi', 'foto'];

    protected $casts = [
        'hobi' => 'array', 
    ];

    // Mutator untuk otomatis mengubah nama menjadi huruf besar
    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = strtoupper($value);
    }
}