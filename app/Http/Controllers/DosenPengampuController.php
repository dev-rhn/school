<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use App\Models\MahasiswaDosen;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class DosenPengampuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (request()->ajax()) {
            $pengampu = MahasiswaDosen::with(['mahasiswa','dosen','matakuliah'])->get();

            return Datatables::of($pengampu)
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
                                    <a class="dropdown-item" href="' . route('pengampu.edit', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form action="' . route('pengampu.destroy', $item->id) . '" method="POST">
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

        return view('pages.admin.pengampu.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        $matkul = Matakuliah::all();
        $dosen = Dosen::all();

        return view('pages.admin.pengampu.create', compact([
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

        MahasiswaDosen::create($data);

        Alert::success('Data Berhasil ditambahkan!');

        return redirect()->route('pengampu.index');
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
        
        $item = MahasiswaDosen::findOrFail($id);

        return view('pages.admin.pengampu.edit', compact([
            'mahasiswa',
            'matkul',
            'dosen',
            'item',
        ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $item = MahasiswaDosen::findOrFail($id);

        $item->update($data);

        Alert::success('Data Berhasil diubah!');

        return redirect()->route('pengampu.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = MahasiswaDosen::findorFail($id);
        $item->delete();

        Alert::success('Data Berhasil dihapus!');

        return redirect()->route('pengampu.index');
    }
}
