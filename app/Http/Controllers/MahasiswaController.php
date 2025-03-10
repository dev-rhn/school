<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\PDF;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Mahasiswa::query();

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
                                    <a class="dropdown-item" href="' . route('mahasiswa.edit', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form action="' . route('mahasiswa.destroy', $item->id) . '" method="POST">
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

        return view('pages.admin.mahasiswa.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nim' => 'required|unique:mahasiswa',
            'name_mhs' => 'required',
            'jk' => 'required',
            'kelas' => 'required',
            'semester' => 'required',
            'angkatan' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        Mahasiswa::create([
            'nim' => $request->nim,
            'name_mhs' => $request->name_mhs,
            'jk' => $request->jk,
            'kelas' => $request->kelas,
            'semester' => $request->semester,
            'angkatan' => $request->angkatan,
        ]);

        User::create([
            'mahasiswa_id' => $request->nim,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles' => 'mahasiswa',
        ]);

        Alert::success('Data Berhasil ditambahkan!');

        return redirect()->route('mahasiswa.index');
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
        $item = Mahasiswa::findOrFail($id);

        return view('pages.admin.mahasiswa.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $item = Mahasiswa::findOrFail($id);

        $item->update($data);

        Alert::success('Data Berhasil diubah!');

        return redirect()->route('mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        // Hapus data mahasiswa terlebih dahulu
        $mahasiswa->delete();

        // Hapus data user
        $user = User::where('mahasiswa_id', '=', $mahasiswa->id)->firstOrFail();
        $user->delete();

        Alert::success('Data Berhasil dihapus!');

        return redirect()->route('mahasiswa.index');
    }

    public function cetak(){
        $mahasiswa = Mahasiswa::all();
	    return view('pages.admin.mahasiswa.cetak', compact('mahasiswa'));

    }
}
