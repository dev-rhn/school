<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';

        protected $fillable = [
        'nim',
        'name_mhs',
        'jk',
        'kelas',
        'semester',
        'angkatan',
        ];

    public function dosen()
    {
        return $this->belongsToMany(Dosen::class, 'dosen_mahasiswa');
    }
}
