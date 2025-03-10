@extends('layouts.dashboard-admin')

@section('content')
	<!-- MAIN -->
<main>
	<div class="head-title">
		<div class="left">
			<h1>Dashboard Admin - Dosen</h1>
		</div>
	</div>

    <div class="row">
		<div class="col-md-12 mt-2">
			<div class="card">
				<div class="card-body mt-2">
					<a href="{{ route('dosen.create') }}" class="btn btn-primary mb-3">
						+ Tambah Dosen Baru
					</a>
					<a href="{{ route('dosen-cetak') }}" target="_blank" class="btn btn-warning mb-3 ml-2">
						<i class='bx bxs-printer' ></i>
						Cetak 
					</a>
					<div class="table-responsive mt-2">
						<table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
							<thead>
								<tr>
									<th>NIP</th>
									<th>Nama</th>
									<th>Jenis Kelamin</th>
									<th>Mata Kuliah</th>
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
                { data:'nip', name:'nip' },
                { data:'name_dosen', name:'name_dosen' },
                { data:'jk', name:'jk' },
                { data:'matakuliah_dosen.name_matkul', name:'matakuliah_dosen.name_matkul' },
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