@extends('layouts.dashboard-admin')

@section('content')
	<!-- MAIN -->
<main>
	<div class="head-title">
		<div class="left">
			<h1>Dashboard Admin - Akun Pengguna</h1>
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
                            <form action="{{ route('akun-pengguna.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                                @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" required value="{{ $item->email }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Password User</label>
                                        <input type="password" name="password" class="form-control">
                                        <small>Kosongkan jika tidak ingin mengganti password</small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Roles</label>
                                        <select name="roles" class="form-control" required>
                                            <option value="{{ $item->roles }}" selected>Tidak Diganti</option>
                                            <option value="admin">Admin</option>
                                            <option value="dosen">Dosen</option>
                                            <option value="mahasiswa">Mahasiswa</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-right">
                                    <button class="btn btn-success px-5">
                                        Save
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