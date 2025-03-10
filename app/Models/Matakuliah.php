<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

        protected $table = 'matakuliah';

        protected $fillable = [
        'kode_matkul',
        'name_matkul',
        'sks'
    ];
    
    public function mahasiswaDosen(){
        return $this->hasMany(MahasiswaDosen::class);
    }
}
