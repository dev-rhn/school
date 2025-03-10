<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class MahasiswaDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $dosen = Dosen::with(['mahasiswa','dosen'])->where('id', Auth::user()->dosen_id)->first();

        // $mahasiswa = $dosen->mahasiswa;

        if (request()->ajax()) {
            $dosen = Dosen::with(['mahasiswa','dosen'])->where('id', Auth::user()->dosen_id)->first();
            $mahasiswa = $dosen->mahasiswa;
            return Datatables::of($mahasiswa)
                ->make();
        }

        return view('pages.dosen.mahasiswa.index');
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
        
        $dosen = Dosen::with(['mahasiswa','dosen'])->where('id', Auth::user()->dosen_id)->first();
        $mahasiswa = $dosen->mahasiswa;

	    return view('pages.dosen.mahasiswa.cetak', compact([
            'mahasiswa',
            'dosen',
        ]));
    }
}
