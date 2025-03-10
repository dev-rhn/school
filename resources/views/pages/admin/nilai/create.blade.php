@extends('layouts.dashboard-admin')

@section('content')
        <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Dashboard Admin - Input Nilai Mahasiswa</h1>
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
                                <form action="{{ route('nilai.store') }}" method="POST" enctype="multipart/form-data">
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
                                            <label>Matakuliah</label>
                                            <select class="form-control" name="kode_matkul" id="kode_matkul" required>
                                                <option hidden>Matakuliah</option>
                                                @foreach ($matkul as $m)
                                                    <option value="{{ $m->kode_matkul }}">{{ $m->kode_matkul . ' - ' . $m->name_matkul }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Dosen</label>
                                            <select class="form-control" name="dosen_id" id="dosen_id" required>
                                                <option hidden>Dosen</option>
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
                                            <label>Nilai Tugas</label>
                                            <input type="text" name="nilai_tugas" class="form-control" required placeholder="Nilai Tugas">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nilai UTS</label>
                                            <input type="text" name="nilai_uts" class="form-control" required placeholder="Nilai UTS">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nilai UAS</label>
                                            <input type="text" name="nilai_uas" class="form-control" required placeholder="Nilai UAS">
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