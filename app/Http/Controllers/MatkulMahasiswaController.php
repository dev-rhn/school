<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use App\Models\MahasiswaDosen;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class MatkulMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nim_mahasiswa = Mahasiswa::where('id', Auth::user()->mahasiswa_id)->value('nim');

        $mahasiswaId = auth()->user()->mahasiswa_id;

        if (request()->ajax()) {
            $query = MahasiswaDosen::with('mahasiswa', 'dosen', 'matakuliah')
                ->where('mahasiswa_id', $mahasiswaId)
                ->get();

            return Datatables::of($query)->make();
        }
        
        return view('pages.mahasiswa.matakuliah.index', compact([
            'nim_mahasiswa',
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

        $matakuliah = MahasiswaDosen::with('mahasiswa', 'dosen', 'matakuliah')
                ->where('mahasiswa_id', $mahasiswaId)
                ->get();

	    return view('pages.mahasiswa.matakuliah.cetak', compact([
            'matakuliah',
        ]));
    }
}
