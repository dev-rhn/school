<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LaporanIPKMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nim_mahasiswa = Mahasiswa::where('id', Auth::user()->mahasiswa_id)->value('nim');

        $mahasiswaId = auth()->user()->mahasiswa_id;

        $nilai = Nilai::with(['dosen', 'matakuliah_nilai'])
                ->where('mahasiswa_id', $mahasiswaId)
                ->get();

        $DataNilai = DB::table('nilai')
            ->join('matakuliah', 'nilai.kode_matkul', '=', 'matakuliah.kode_matkul')
            ->where('nilai.mahasiswa_id', $mahasiswaId)
            ->select('nilai.nilai_akhir', 'matakuliah.name_matkul')
            ->get();
        
        

        $queryNilai = $DataNilai->mapWithKeys(function ($item){
                return [$item->name_matkul => $item->nilai_akhir];
            });

        return view('pages.mahasiswa.laporan.index', compact([
            'nim_mahasiswa', 
            'nilai',
            'queryNilai',
        ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function cetak(){
        $mahasiswaId = auth()->user()->mahasiswa_id;

        $nilai = Nilai::with(['dosen', 'matakuliah_nilai'])
                ->where('mahasiswa_id', $mahasiswaId)
                ->get();

	    return view('pages.mahasiswa.laporan.cetak', compact([
            'nilai',
        ]));
    }
}
