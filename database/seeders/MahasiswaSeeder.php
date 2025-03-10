<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\MahasiswaDosen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed data for mahasiswa
        Mahasiswa::insert([
            [
                'nim' => '112101',
                'name_mhs' => 'Muhammad Raihan Akbar',
                'jk' => 'Laki-laki',
                'kelas' => 'C',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 1,
            ],
            [
                'nim' => '112102',
                'name_mhs' => 'Rio Tegar Syahputra',
                'jk' => 'Laki-laki',
                'kelas' => 'C',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 1,
            ],
            [
                'nim' => '112103',
                'name_mhs' => 'Evan Dick Briantoro',
                'jk' => 'Laki-laki',
                'kelas' => 'C',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 1,
            ],
            [
                'nim' => '112104',
                'name_mhs' => 'Muhammad Fikri Fahreza',
                'jk' => 'Laki-laki',
                'kelas' => 'C',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 1,
            ],
            [
                'nim' => '112105',
                'name_mhs' => 'Gibral Anugrah',
                'jk' => 'Laki-laki',
                'kelas' => 'A',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 1,
            ],
            [
                'nim' => '112106',
                'name_mhs' => 'Muhammad Restu Februarista',
                'jk' => 'Laki-laki',
                'kelas' => 'A',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 1,
            ],
            [
                'nim' => '112107',
                'name_mhs' => 'Sabrina Erisa Putri',
                'jk' => 'Perempuan',
                'kelas' => 'D',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 1,
            ],
            [
                'nim' => '112108',
                'name_mhs' => 'Safira Anggia Marwan',
                'jk' => 'Perempuan',
                'kelas' => 'D',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 1,
            ],
            [
                'nim' => '112109',
                'name_mhs' => 'Ananta Dwiyana Sandra',
                'jk' => 'Perempuan',
                'kelas' => 'D',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 1,
            ],
            [
                'nim' => '112110',
                'name_mhs' => 'Aelissa Maharani',
                'jk' => 'Perempuan',
                'kelas' => 'D',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 1,
            ],
            [
                'nim' => '112111',
                'name_mhs' => 'Dimas Ravi Syaputra',
                'jk' => 'Laki-laki',
                'kelas' => 'A',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 2,
            ],
            [
                'nim' => '112112',
                'name_mhs' => 'Davin Syaban Perdana',
                'jk' => 'Laki-laki',
                'kelas' => 'B',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 2,
            ],
            [
                'nim' => '112113',
                'name_mhs' => 'Haekal Setiawan',
                'jk' => 'Laki-laki',
                'kelas' => 'B',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 2,
            ],
            [
                'nim' => '112114',
                'name_mhs' => 'Muhammad Alfiawan S',
                'jk' => 'Laki-laki',
                'kelas' => 'B',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 2,
            ],
            [
                'nim' => '112115',
                'name_mhs' => 'Jahval Romiz S',
                'jk' => 'Laki-laki',
                'kelas' => 'A',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 2,
            ],
            [
                'nim' => '112116',
                'name_mhs' => 'Adil Ramadhan',
                'jk' => 'Laki-laki',
                'kelas' => 'A',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 2,
            ],
            [
                'nim' => '112117',
                'name_mhs' => 'Intan Livanty L',
                'jk' => 'Perempuan',
                'kelas' => 'B',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 2,
            ],
            [
                'nim' => '112118',
                'name_mhs' => 'Indah Fara',
                'jk' => 'Perempuan',
                'kelas' => 'B',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 2,
            ],
            [
                'nim' => '112119',
                'name_mhs' => 'Naura Nayana',
                'jk' => 'Perempuan',
                'kelas' => 'C',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 2,
            ],
            [
                'nim' => '112120',
                'name_mhs' => 'Sasmaya Rosa',
                'jk' => 'Perempuan',
                'kelas' => 'D',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 2,
            ],
            [
                'nim' => '112121',
                'name_mhs' => 'Faisal Ahmad Gifari',
                'jk' => 'Laki-laki',
                'kelas' => 'B',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 3,
            ],
            [
                'nim' => '112122',
                'name_mhs' => 'Fattahillah',
                'jk' => 'Laki-laki',
                'kelas' => 'B',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 3,
            ],
            [
                'nim' => '112123',
                'name_mhs' => 'Aliansyah Putra Ayyuhan',
                'jk' => 'Laki-laki',
                'kelas' => 'c',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 3,
            ],
            [
                'nim' => '112124',
                'name_mhs' => 'Nanda Leo Ardana',
                'jk' => 'Laki-laki',
                'kelas' => 'D',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 3,
            ],
            [
                'nim' => '112125',
                'name_mhs' => 'M. Rehza Pahlevi',
                'jk' => 'Laki-laki',
                'kelas' => 'B',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 3,
            ],
            [
                'nim' => '112126',
                'name_mhs' => 'Muhammad Nazaruddin Nur',
                'jk' => 'Laki-laki',
                'kelas' => 'C',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 3,
            ],
            [
                'nim' => '112127',
                'name_mhs' => 'Putri Syakila',
                'jk' => 'Perempuan',
                'kelas' => 'A',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 3,
            ],
            [
                'nim' => '112128',
                'name_mhs' => 'Mutiara',
                'jk' => 'Perempuan',
                'kelas' => 'D',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 3,
            ],
            [
                'nim' => '112129',
                'name_mhs' => 'Andhini',
                'jk' => 'Perempuan',
                'kelas' => 'C',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 3,
            ],
            [
                'nim' => '112130',
                'name_mhs' => 'Nisrina Nuraini',
                'jk' => 'Perempuan',
                'kelas' => 'C',
                'semester' => 5,
                'angkatan' => 2021,
                // 'dosen_id' => 3,
            ],
        ]);

        // $faker = Faker::create();

        // $data = [];
        // for ($i = 0; $i <= 200; $i++) {
        //     $data[] = [
        //         'nim' => '1121' . $i,
        //         'name_mhs' => 'Mahasiswa ke-' . $i,
        //         'jk' => $faker->randomElement(['Laki-laki', 'Perempuan']),
        //         'kelas' => $faker->randomElement(['A', 'B', 'C', 'D']),
        //         'semester' => $faker->numberBetween(1, 8),
        //         'angkatan' => $faker->randomElement(['2020', '2021', '2022', '2023']),
        //         'dosen_id' => $faker->randomElement(['1','2','3','4']),
        //     ];
        // }

        // foreach ($data as $item) {
        //     Mahasiswa::insert($item);
        // }

        // Seed data for users
        foreach (Mahasiswa::all() as $mahasiswa) {
            User::create([
                'mahasiswa_id' => $mahasiswa->id,
                'name' => $mahasiswa->name_mhs,
                'email' => $mahasiswa->nim . '@example.com',
                'password' => Hash::make('123'),
                'roles' => 'mahasiswa',
            ]);
        }
        
    }
}
