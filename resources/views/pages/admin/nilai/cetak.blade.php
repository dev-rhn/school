<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Matakuliah - Cetak</title>
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
        <h2>Data Penilaian</h2>
        <div class="container mt-2">
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="tengah">NIM</th>
                                    <th class="tengah" data-priority="1">Nama Mahasiswa</th>
                                    <th class="tengah" data-priority="2">Matakuliah</th>
                                    <th class="tengah" data-priority="3">Dosen</th>
                                    <th class="tengah" data-priority="4">Nilai Tugas</th>
                                    <th class="tengah" data-priority="5">Nilai UTS</th>
                                    <th class="tengah" data-priority="6">Nilai UAS</th>
                                    <th class="tengah" data-priority="7">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nilai as $n)
                                    <tr>
                                        <td class="tengah">{{ $n->mahasiswa->nim }}</td>
                                        <td>{{ $n->mahasiswa->name_mhs }}</td>
                                        <td>{{ $n->matakuliah_nilai->name_matkul }}</td>
                                        <td>{{ $n->dosen->name_dosen }}</td>
                                        <td class="tengah">{{ $n->nilai_tugas }}</td>
                                        <td class="tengah">{{ $n->nilai_uts }}</td>
                                        <td class="tengah">{{ $n->nilai_uas }}</td>
                                        <td class="tengah">{{ $n->nilai_akhir }}</td>
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