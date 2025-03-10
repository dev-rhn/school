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
		<div class="col-md-12 mt-2">
			<div class="card">
				<div class="card-body mt-2">
					<a href="{{ route('akun-pengguna.create') }}" class="btn btn-primary mb-3">
						+ Tambah Admin Baru
					</a>
					<div class="table-responsive mt-2">
						<table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
							<thead>
								<tr>
									<th>Email</th>
									<th>Roles</th>
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
                { data:'email', name:'email' },
                { data:'roles', name:'roles' },
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