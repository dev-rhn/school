<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\MahasiswaDosen;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MahasiswaDosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed data for users
        foreach (Mahasiswa::all() as $mahasiswa) {
            // Generate random dosen ids
            $dosen_ids = [];
            for ($i = 1; $i < 7; $i++) {
                $dosen_id = rand(1, 7);

                // Cek apakah dosen sudah pernah digunakan
                if (!in_array($dosen_id, $dosen_ids)) {
                $dosen_ids[] = $dosen_id;
                }
            }

            

            // Buat relasi mahasiswa dengan dosen
            foreach ($dosen_ids as $dosen_id) {
                MahasiswaDosen::create([
                'mahasiswa_id' => $mahasiswa->id,
                'dosen_id' => $dosen_id,
                'matakuliah_id' => $dosen_id,
                ]);
            }
        }
        
    }
}
