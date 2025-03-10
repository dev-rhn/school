@extends('layouts.dashboard-admin')

@section('content')
	<!-- MAIN -->
<main>
	<div class="head-title">
		<div class="left">
			<h1>Dashboard Admin - Mata Kuliah</h1>
		</div>
	</div>

    <div class="row">
		<div class="col-md-12 mt-2">
			<div class="card">
				<div class="card-body mt-2">
					<a href="{{ route('matakuliah.create') }}" class="btn btn-primary mb-3">
						+ Tambah Mata Kuliah Baru
					</a>
					<a href="{{ route('matakuliah-cetak') }}" target="_blank" class="btn btn-warning mb-3 ml-2">
						<i class='bx bxs-printer' ></i>
						Cetak 
					</a>
					<div class="table-responsive mt-2">
						<table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
							<thead>
								<tr>
									<th>Kode</th>
									<th>Nama Mata Kuliah</th>
									<th>SKS</th>
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
                { data:'kode_matkul', name:'kode_matkul' },
                { data:'name_matkul', name:'name_matkul' },
                { data:'sks', name:'sks' },
                { 
                    data:'action', 
                    name:'action',
                    orderable: false,
                    searchable: false,
                    width: '15%'
                },
            ],
        });
    });
</script>
@endpush