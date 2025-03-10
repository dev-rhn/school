<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;


class AkunPenggunaController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (request()->ajax()) {
            $query = User::query();

            // Filter data pengguna dengan role admin atau dosen
            // $query->whereIn('users.roles', ['admin']);

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
                                    <a class="dropdown-item" href="' . route('akun-pengguna.edit', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form action="' . route('akun-pengguna.destroy', $item->id) . '" method="POST">
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

        return view('pages.admin.akun-pengguna.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.akun-pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['password'] = bcrypt($request->password);
        $data['roles'] = 'admin';

        User::create($data);

        return redirect()->route('akun-pengguna.index');
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
        $item = User::findOrFail($id);

        return view('pages.admin.akun-pengguna.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $item = User::findOrFail($id);

        if($request->password){

            $data['password'] = bcrypt($request->password);
        }else{

            unset($data['password']);
        }

        $item->update($data);

        return redirect()->route('akun-pengguna.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        // Cek apakah user adalah mahasiswa
        if ($user->roles == 'mahasiswa') {
            $mahasiswa = Mahasiswa::where('id', '=', $user->mahasiswa_id)->firstOrFail();
            $mahasiswa->delete();
            $user->delete();
        }

        // Cek apakah user adalah dosen
        if ($user->roles == 'dosen') {
            $dosen = Dosen::where('id', '=', $user->dosen_id)->firstOrFail();
            $dosen->delete();
            $user->delete();
        }

        // Cek apakah user adalah admin
        if ($user->roles == 'admin') {
            $user->delete();
        }       

        // Tampilkan pesan sukses
        Alert::success('Data Berhasil dihapus!');

        // Kembali ke halaman index
        return redirect()->route('akun-pengguna.index');
    }
}
