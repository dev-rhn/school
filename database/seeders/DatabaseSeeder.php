<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Dosen;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(MatkulSeeder::class);
        $this->call(MahasiswaSeeder::class);
        $this->call(MahasiswaDosenSeeder::class);
        $this->call(DosenSeeder::class);
    }
}
