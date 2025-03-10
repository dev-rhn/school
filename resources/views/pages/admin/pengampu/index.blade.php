@extends('layouts.dashboard-admin')

@section('content')
    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Dashboard Admin - Pengampu Mata Kuliah</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="card">
                    <div class="card-body mt-2">
                        <a href="{{ route('pengampu.create') }}" class="btn btn-primary mb-3">
                            + Tambah Pengampu Mata Kuliah
                        </a>
                        <div class="table-responsive mt-2">
                            <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                <thead>
                                    <tr>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Dosen</th>
                                        <th>Kode Mata Kuliah</th>
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
                { data:'mahasiswa.nim', name:'mahasiswa.nim' },
                { data:'mahasiswa.name_mhs', name:'mahasiswa.name_mhs' },
                { data:'dosen.name_dosen', name:'dosen.name_dosen' },
                { data:'matakuliah.name_matkul', name:'matakuliah.name_matkul' },
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