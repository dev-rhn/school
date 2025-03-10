<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Matakuliah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Dosen::with('matakuliah_dosen')->get();

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
                                    <a class="dropdown-item" href="' . route('dosen.edit', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form action="' . route('dosen.destroy', $item->id) . '" method="POST">
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

        return view('pages.admin.dosen.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $matkul = Matakuliah::all();

        return view('pages.admin.dosen.create', compact('matkul'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'nip' => 'required',
            'name_dosen' => 'required',
            'jk' => 'required',
            'kode_matkul' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        Dosen::create([
            'nip' => $request->nip,
            'name_dosen' => $request->name_dosen,
            'jk' => $request->jk,
            'kode_matkul' => $request->kode_matkul,
        ]);

        User::create([
            'dosen_id' => $request->id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles' => 'dosen',
        ]);

        Alert::success('Data Berhasil ditambahkan!');

        return redirect()->route('dosen.index');
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
        $matkul = Matakuliah::all();
        
        $item = Dosen::findOrFail($id);

        return view('pages.admin.dosen.edit', compact(['item', 'matkul']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $item = Dosen::findOrFail($id);

        $item->update($data);

        Alert::success('Data Berhasil diubah!');

        return redirect()->route('dosen.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dosen = Dosen::findOrFail($id);

        // Hapus data mahasiswa terlebih dahulu
        $dosen->delete();

        // Hapus data user
        $user = User::where('dosen_id', '=', $dosen->id)->firstOrFail();
        $user->delete();

        Alert::success('Data Berhasil dihapus!');

        return redirect()->route('dosen.index');
    }

    public function cetak(){
        $dosen = Dosen::with('matakuliah_dosen')->get();

	    return view('pages.admin.dosen.cetak', compact([
            'dosen',
        ]));

    }
}
