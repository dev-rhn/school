<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Nilai;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use App\Models\MahasiswaDosen;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class NilaiDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $dosenId = Auth::user()->dosen_id;

            $query = Nilai::with([
                'mahasiswa_nilai',
                'matakuliah_nilai',
                'dosen_nilai',
            ])->whereHas('dosen_nilai', function ($query) use ($dosenId) {
                    $query->where('dosen_id', $dosenId);
            })->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1" 
                                    type="button" id="action' .  $item->id . '"
                                        data-toggle="dropdown" 
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                        Aksi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="action' .  $item->id . '">
                                    <a class="dropdown-item" href="' . route('dosen-nilai.edit', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form action="' . route('dosen-nilai.destroy', $item->id) . '" method="POST">
                                        ' . method_field('delete') . csrf_field() . '
                                        <button type="submit" class="dropdown-item text-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.dosen.nilai.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosen = Dosen::with(['mahasiswa','dosen'])->where('id', Auth::user()->dosen_id)->first();
        $mahasiswa = $dosen->mahasiswa;
        
        return view('pages.dosen.nilai.create', compact(['mahasiswa']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $dosen = Dosen::with(['mahasiswa','dosen'])->where('id', Auth::user()->dosen_id)->first();
        $mahasiswa = Mahasiswa::where('id', $request->mahasiswa_id)->first();

        $nilai = [
            'kode_matkul' => Dosen::with(['mahasiswa','dosen'])->where('id', Auth::user()->dosen_id)->first()->kode_matkul,
            'mahasiswa_id' => $mahasiswa->id,
            'dosen_id' => Auth::user()->dosen_id,
            'nilai_uts' => $request->nilai_uts,
            'nilai_uas' => $request->nilai_uas,
            'nilai_tugas' => $request->nilai_tugas,
            'nilai_akhir' => ($request->nilai_uts + $request->nilai_uas + $request->nilai_tugas)/3,
        ];

        // Simpan nilai
        Nilai::create($nilai);

        // Buat notifikasi
        Alert::success('Data Berhasil ditambahkan!');

        // Redirect ke halaman nilai
        return redirect()->route('dosen-nilai.index');
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
        $mahasiswa = Mahasiswa::all();
        $matkul = Matakuliah::all();
        $dosen = Dosen::all();
        $item = Nilai::findOrFail($id);

        return view('pages.dosen.nilai.edit', compact([
            'item',
            'mahasiswa',
            'matkul',
            'dosen',
        ]));
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
