@extends('layouts.dashboard-admin')

@section('content')
	<!-- MAIN -->
<main>
	<div class="head-title">
		<div class="left">
			<h1>Dashboard Admin - Mahasiswa</h1>
		</div>
	</div>

    <div class="row">
		<div class="col-md-12 mt-2">
			<div class="card">
				<div class="card-body mt-2">
					<a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">
						+ Tambah Mahasiwa Baru
					</a>
					<a href="{{ route('mahasiswa-cetak') }}" target="_blank" class="btn btn-warning mb-3 ml-2">
						<i class='bx bxs-printer' ></i>
						Cetak 
					</a>
					<div class="table-responsive mt-2">
						<table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
							<thead>
								<tr>
									<th>NIM</th>
									<th>Nama</th>
									<th>Jenis Kelamin</th>
									<th>Kelas</th>
									<th>Semester</th>
									<th>Angkatan</th>
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
                { data:'nim', name:'nim' },
                { data:'name_mhs', name:'name_mhs' },
                { data:'jk', name:'jk' },
                { data:'kelas', name:'kelas' },
                { data:'semester', name:'semester' },
                { data:'angkatan', name:'angkatan' },
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