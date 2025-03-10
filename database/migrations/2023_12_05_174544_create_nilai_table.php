<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->integer('kode_matkul');
            $table->integer('mahasiswa_id');
            $table->integer('dosen_id');
            $table->integer('nilai_uts');
            $table->integer('nilai_uas');
            $table->integer('nilai_tugas');
            $table->integer('nilai_akhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
