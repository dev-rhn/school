<?php

namespace Database\Seeders;

use App\Models\Matakuliah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $matkul = [
            [
                'kode_matkul' => '54001',
                'name_matkul' => 'Etika Profesi dan Teknologi Informasi',
                'sks' => 2,
            ],
            [
                'kode_matkul' => '54002',
                'name_matkul' => 'Pemrograman Berbasis Platform',
                'sks' => 3,
            ],
            [
                'kode_matkul' => '54003',
                'name_matkul' => 'Pemodelan dan Simulasi',
                'sks' => 4,
            ],
            [
                'kode_matkul' => '54004',
                'name_matkul' => 'Rekayasa Perangkat Lunak',
                'sks' => 3,
            ],
            [
                'kode_matkul' => '54005',
                'name_matkul' => 'Keamanan Siber',
                'sks' => 3,
            ],
            [
                'kode_matkul' => '54006',
                'name_matkul' => 'Rekayasa Prasyarat',
                'sks' => 4,
            ],
            [
                'kode_matkul' => '54007',
                'name_matkul' => 'Metodologi Penelitian',
                'sks' => 3,
            ],
        ];

        foreach($matkul as $key => $var){
            Matakuliah::create($var);
        }
    }
}
