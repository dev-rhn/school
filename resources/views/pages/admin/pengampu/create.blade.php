@extends('layouts.dashboard-admin')

@section('content')
	<!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Dashboard Admin - Tambah Pengampun Mata Kuliah</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('pengampu.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>NIM / Nama</label>
                                            <select class="form-control" name="mahasiswa_id" id="mahasiswa_id" required>
                                                <option selected hidden>NIM / Nama</option>
                                                @foreach ($mahasiswa as $mhs)
                                                    <option value="{{ $mhs->id }}">{{ $mhs->nim . ' - ' . $mhs->name_mhs }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Dosen Pengampu</label>
                                            <select class="form-control" name="dosen_id" id="dosen_id" required>
                                                <option selected hidden>Dosen Pengampu</option>
                                                @foreach ($dosen as $dsn)
                                                    <option value="{{ $dsn->id }}">{{ $dsn->nip . ' - ' . $dsn->name_dosen }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Matakuliah</label>
                                            <select class="form-control" name="matakuliah_id" id="matakuliah_id" required>
                                                <option selected hidden>Matakuliah</option>
                                                @foreach ($matkul as $m)
                                                    <option value="{{ $m->id }}">{{ $m->kode_matkul . ' - ' . $m->name_matkul }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button class="btn btn-success px-5">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- MAIN -->
@endsection