<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Mahasiswa - Cetak</title>
    </head>
    <style>
    h2 {
    text-align: center;
    padding: 20px 0;
    }

    .table-bordered {
    border: 1px solid #ddd !important;
    }

    .p {
    text-align: center;
    padding-top: 140px;
    font-size: 14px;
    }

    .tengah{
    text-align: center;
    }

    </style>
    <body>
        <h2>Data Mahasiswa</h2>
        <div class="container mt-2">
            <h6>Dosen Pengampu: {{ $dosen->name_dosen }}</h5>
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table class="table table-bordered table-hover mt-4">
                            <thead>
                                <tr>
                                    <th class="tengah">NIM</th>
                                    <th class="tengah" data-priority="1">Nama</th>
                                    <th class="tengah" data-priority="2">Jenis Kelamin</th>
                                    <th class="tengah" data-priority="3">Kelas</th>
                                    <th class="tengah" data-priority="4">Semester</th>
                                    <th class="tengah" data-priority="5">Angkatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mahasiswa as $m)
                                    <tr>
                                        <td class="tengah">{{ $m->nim }}</td>
                                        <td>{{ $m->name_mhs }}</td>
                                        <td class="tengah">{{ $m->jk }}</td>
                                        <td class="tengah">{{ $m->kelas }}</td>
                                        <td class="tengah">{{ $m->semester }}</td>
                                        <td class="tengah">{{ $m->angkatan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>