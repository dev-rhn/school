<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class NilaiMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nim_mahasiswa = Mahasiswa::where('id', Auth::user()->mahasiswa_id)->value('nim');

        $mahasiswaId = auth()->user()->mahasiswa_id;

        if (request()->ajax()) {
            $query = Nilai::with(['dosen', 'matakuliah_nilai'])
                ->where('mahasiswa_id', $mahasiswaId)
                ->get();

            return Datatables::of($query)->make();
        }

        return view('pages.mahasiswa.nilai.index', compact(['nim_mahasiswa']));
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
}
