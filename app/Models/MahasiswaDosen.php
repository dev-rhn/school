<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaDosen extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa_dosen';

    protected $fillable = [
        'mahasiswa_id',
        'dosen_id',
        'matakuliah_id',
    ];

    public function dosen(){
        return $this->belongsTo(Dosen::class);
    }

    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class);
    }

    public function matakuliah(){
        return $this->belongsTo(Matakuliah::class);
    }
}
