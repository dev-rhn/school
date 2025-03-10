<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Nilai;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Nilai::with([
                'mahasiswa_nilai',
                'matakuliah_nilai',
                'dosen_nilai',
            ])->get();
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
                                    <a class="dropdown-item" href="' . route('nilai.edit', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form action="' . route('nilai.destroy', $item->id) . '" method="POST">
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
        return view('pages.admin.nilai.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        $matkul = Matakuliah::all();
        $dosen = Dosen::all();

        return view('pages.admin.nilai.create', compact([
            'mahasiswa',
            'matkul',
            'dosen',
        ]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['nilai_akhir'] = ($request->nilai_uts + $request->nilai_uas + $request->nilai_tugas)/3;

        Nilai::create($data);

        Alert::success('Data Berhasil ditambahkan!');

        return redirect()->route('nilai.index');
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

        return view('pages.admin.nilai.edit', compact([
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
        $data = $request->all();

        $item = Nilai::findOrFail($id);

        $item->update($data);

        Alert::success('Data Berhasil diubah!');

        return redirect()->route('nilai.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Nilai::findorFail($id);
        $item->delete();

        Alert::success('Data Berhasil dihapus!');

        return redirect()->route('nilai.index');
    }

    public function cetak(){
        $nilai = Nilai::with('mahasiswa','dosen','matakuliah_nilai')->get();

	    return view('pages.admin.nilai.cetak', compact([
            'nilai',
        ]));
    }
}
