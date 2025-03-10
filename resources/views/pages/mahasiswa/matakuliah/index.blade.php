@extends('layouts.dashboard-mahasiswa')

@section('content')
		<!-- MAIN -->
	<main>
		<div class="head-title">
			<div class="left">
				<h1>Dashboard Mahasiswa</h1>
				<h5>Nama : {{ Auth::user()->name }}</h5>
				<h5>NIM : {{ $nim_mahasiswa }}</h5>
			</div>
		</div>

        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="card">
                    <div class="card-body mt-2"><a href="{{ route('mahasiswa-matakuliah-cetak') }}" target="_blank" class="btn btn-warning mb-3 ml-2">
						<i class='bx bxs-printer' ></i>
						Cetak 
					</a>
                        <div class="table-responsive mt-2">
                            <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                <thead>
                                    <tr>
                                        <th>Kode Mata Kuliah</th>
                                        <th>Nama Mata Kuliah</th>
                                        <th>Dosen</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
	    </div>
	</main>
	<!-- MAIN -->
@endsection

@push('addon-script')
    <script>
		$(document).ready(function() {
			var datatable = $('#crudTable').DataTable({
				processing: true,
				serverSide: true,
				ordering: true,
				ajax: {
					url: '{!! url()->current() !!}',
				},
				columns: [
					{ data:'matakuliah.kode_matkul', name:'matakuliah.kode_matkul' },
					{ data:'matakuliah.name_matkul', name:'matakuliah.name_matkul' },
					{ data:'dosen.name_dosen', name:'dosen.name_dosen' },
				]
			});
		});
	</script>
@endpush