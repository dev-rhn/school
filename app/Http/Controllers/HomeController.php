<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use App\Models\MahasiswaDosen;
use App\Models\Nilai;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         if(Auth::user()->roles == 'admin'){
            return redirect('/dashboard/admin');
        }elseif (Auth::user()->roles == 'dosen'){
            return redirect('/dashboard/dosen');
        }elseif (Auth::user()->roles == 'mahasiswa'){
            return redirect('/dashboard/mahasiswa');
        }
        
        //return view('dashboard');
    }

    public function admin()
    {
        $jumlah_admin = number_format(User::where('roles', 'admin')->count());
        $jumlah_dosen = number_format(Dosen::count());
        $jumlah_mahasiswa = number_format(Mahasiswa::count());
        
        $jumlah_matkul = number_format(Matakuliah::count());
        $jumlah_pengguna = number_format(User::count());

        $dataMahasiswa = Mahasiswa::select('jk', DB::raw('COUNT(*) as jumlah_mahasiswa'))
                            ->groupBy('jk')
                            ->get();

        $queryMahasiswa = $dataMahasiswa->mapWithKeys(function ($item){
                return [$item->jk => $item->jumlah_mahasiswa];
            });

        $dataAngkatan = Mahasiswa::select('angkatan', DB::raw('COUNT(*) as jumlah_mahasiswa'))
                            ->groupBy('angkatan')
                            ->get();

        $queryAngkatan = $dataAngkatan->mapWithKeys(function ($item){
                return [$item->angkatan => $item->jumlah_mahasiswa];
            });


        return view('pages.admin.dashboard',compact([
            'jumlah_admin',
            'jumlah_dosen',
            'jumlah_mahasiswa',
            'jumlah_matkul',
            'jumlah_pengguna',
            'queryMahasiswa',
            'queryAngkatan',
        ]));
    }

    public function dosen()
    {
        $jumlah_mahasiswa = MahasiswaDosen::where('dosen_id', Auth::user()->dosen_id)->count();
        $matkul = Dosen::with('matakuliah_dosen')->where('id', Auth::user()->dosen_id)->first();

        $kode_matkul = $matkul->matakuliah_dosen->where('id', Auth::user()->dosen_id)->first()->name_matkul;

        $dosenId = Auth::user()->dosen_id;
        $dataKelas = MahasiswaDosen::select('mahasiswa.kelas', DB::raw('COUNT(*) AS jumlah_mahasiswa'))
            ->join('mahasiswa', 'mahasiswa_dosen.mahasiswa_id', '=', 'mahasiswa.id')
            ->join('dosen', 'mahasiswa_dosen.dosen_id', '=', 'dosen.id')
            ->where('dosen.id', $dosenId)
            ->groupBy('mahasiswa.kelas')
            ->get();

        $dataJk = MahasiswaDosen::select('mahasiswa.jk', DB::raw('COUNT(*) AS jumlah_mahasiswa'))
            ->join('mahasiswa', 'mahasiswa_dosen.mahasiswa_id', '=', 'mahasiswa.id')
            ->join('dosen', 'mahasiswa_dosen.dosen_id', '=', 'dosen.id')
            ->where('dosen.id', $dosenId)
            ->groupBy('mahasiswa.jk')
            ->get();
        
        $queryKelas = $dataKelas->mapWithKeys(function ($item){
                return [$item->kelas => $item->jumlah_mahasiswa];
            });

        $queryJk = $dataJk->mapWithKeys(function ($item){
                return [$item->jk => $item->jumlah_mahasiswa];
            });
            
        return view('pages.dosen.dashboard', compact([
        'jumlah_mahasiswa',
        'kode_matkul',
        'queryKelas',
        'queryJk'
        ]));
    }

    public function mahasiswa()
    {
        $nim_mahasiswa = Mahasiswa::where('id', Auth::user()->mahasiswa_id)->value('nim');

        $result = MahasiswaDosen::select(DB::raw('COUNT(dosen_id) as jumlah_dosen'))
            ->where('mahasiswa_id', Auth::user()->mahasiswa_id)
            ->first();
            
        $matkul = $result->jumlah_dosen;
        $dosen = $result->jumlah_dosen;

        return view('pages.mahasiswa.dashboard', compact([
            'nim_mahasiswa',
            'matkul',
            'dosen',
        ]));
    }
}
