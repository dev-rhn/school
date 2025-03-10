<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Matakuliah::query()->get();

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
                                    <a class="dropdown-item" href="' . route('matakuliah.edit', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form action="' . route('matakuliah.destroy', $item->id) . '" method="POST">
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

        return view('pages.admin.matakuliah.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.matakuliah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        Matakuliah::create($data);

        Alert::success('Data Berhasil ditambahkan!');

        return redirect()->route('matakuliah.index');
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
        $item = Matakuliah::findOrFail($id);

        return view('pages.admin.matakuliah.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $item = Matakuliah::findOrFail($id);

        $item->update($data);

        Alert::success('Data Berhasil diubah!');

        return redirect()->route('matakuliah.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Matakuliah::findorFail($id);
        $item->delete();

        Alert::success('Data Berhasil dihapus!');

        return redirect()->route('matakuliah.index');
    }

    public function cetak(){
        $matakuliah = Matakuliah::all();

	    return view('pages.admin.matakuliah.cetak', compact([
            'matakuliah',
        ]));
    }
}
