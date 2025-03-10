@extends('layouts.dashboard-admin')

@section('content')
	<!-- MAIN -->
<main>
	<div class="head-title">
		<div class="left">
			<h1>Dashboard Admin - Edit Mata Kuliah</h1>
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
                            <form action="{{ route('matakuliah.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Kode Mata Kuliah</label>
                                        <input type="text" name="kode_matkul" class="form-control" placeholder="Kode Mata Kuliah" required value="{{ $item->kode_matkul }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Mata Kuliah</label>
                                        <input type="text" name="name_matkul" class="form-control" placeholder="Nama Mata Kuliah" required value="{{ $item->name_matkul }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Jumlah SKS</label>
                                        <input type="text" name="sks" class="form-control" placeholder="Jumlah SKS" required value="{{ $item->sks }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col text-right">
                                    <button class="btn btn-success px-5">
                                        Save Now
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