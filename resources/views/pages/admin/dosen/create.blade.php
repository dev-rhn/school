@extends('layouts.dashboard-admin')

@section('content')
	<!-- MAIN -->
<main>
	<div class="head-title">
		<div class="left">
			<h1>Dashboard Admin - Tambah Dosen Baru</h1>
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
                            <form action="{{ route('dosen.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>NIP</label>
                                        <input type="text" name="nip" class="form-control" placeholder="NIP" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="name_dosen" class="form-control" placeholder="Nama" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control" name="jk" id="jk" required>
                                            <option selected>Choose...</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Matakuliah</label>
                                        <select class="form-control" name="kode_matkul" id="code_matkul" required>
                                            <option selected>Choose...</option>
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
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" required>
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