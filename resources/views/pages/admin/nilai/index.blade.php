@extends('layouts.dashboard-admin')

@section('content')
	<!-- MAIN -->
<main>
	<div class="head-title">
		<div class="left">
			<h1>Dashboard Admin - Input Nilai</h1>
		</div>
	</div>

    <div class="row">
		<div class="col-md-12 mt-2">
			<div class="card">
				<div class="card-body mt-2">
					<a href="{{ route('nilai.create') }}" class="btn btn-primary mb-3">
						+ Input Nilai
					</a>
					<a href="{{ route('nilai-cetak') }}" target="_blank" class="btn btn-warning mb-3 ml-2">
						<i class='bx bxs-printer' ></i>
						Cetak 
					</a>
					<div class="table-responsive mt-2">
						<table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
							<thead>
								<tr>
									<th>NIM</th>
									<th>Mata Kuliah</th>
									<th>Dosen</th>
									<th>Nilai Tugas</th>
									<th>Nilai UTS</th>
									<th>Nilai UAS</th>
									<th>Total</th>
									<th>Aksi</th>
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
                { data:'mahasiswa_nilai.nim', name:'mahasiswa_nilai.nim' },
                { data:'matakuliah_nilai.name_matkul', name:'matakuliah_nilai.name_matkul' },
                { data:'dosen_nilai.name_dosen', name:'dosen_nilai.name_dosen' },
                { data:'nilai_tugas', name:'nilai_tugas' },
                { data:'nilai_uts', name:'nilai_uts' },
                { data:'nilai_uas', name:'nilai_uas' },
                { data:'nilai_akhir', name:'nilai_akhir' },
                { 
                    data:'action', 
                    name:'action',
                    orderable: false,
                    searchable: false,
                    width: '15%'
                },
            ]
        });
    });
</script>
@endpush