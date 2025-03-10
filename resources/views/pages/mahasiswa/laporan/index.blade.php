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
                    <div class="card-body mt-2">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="mb-3">Data Nilai</h5>
                                <div class="chart-container">
                                    <canvas id="DataNilai"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body mt-2">
                        <div class="table-responsive mt-2">
                            <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                <thead>
                                    <tr>
                                        <th>Kode Mata Kuliah</th>
                                        <th>Nama Mata Kuliah</th>
                                        <th>Tugas</th>
                                        <th>UTS</th>
                                        <th>UAS</th>
                                        <th>Total</th>
                                        <th>Dosen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php 
                                        $total = 0 
                                    @endphp
                                    @foreach ($nilai as $n)
                                        <tr>
                                            <td>{{ $n->kode_matkul }}</td>
                                            <td>{{ $n->matakuliah_nilai->name_matkul }}</td>
                                            <td>{{ $n->nilai_tugas }}</td>
                                            <td>{{ $n->nilai_uts }}</td>
                                            <td>{{ $n->nilai_uas }}</td>
                                            <td>{{ $n->nilai_akhir }}</td>
                                            <td>{{ $n->dosen->name_dosen }}</td>
                                        </tr>
                                        @php
                                            $total += ($n->nilai_akhir / 100);
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body mt-2">
                        <h5>Total Indeks Prestasi</h5>
                        <h6 class="text-success">{{ ($total ?? 0) }}</h6>
                    </div>
                    <div class="card">
                        <a href="{{ route('mahasiswa-nilai-cetak') }}" target="_blank" class="btn btn-warning mb-3 ml-2">
                            <i class='bx bxs-printer' ></i>
                            Cetak 
                        </a>
                    </div>
            </div>
	    </div>
	</main>
	<!-- MAIN -->
@endsection

@section('js')
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	<script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>

	<script>
		var queryNilai = @json($queryNilai);
	</script>


	<script>
		(function($) {
			$(document).ready(function() {
				var labels = Object.keys(queryNilai);
				var data = Object.values(queryNilai);
				var ctx = document.getElementById("DataNilai").getContext("2d");
				BarChartKelas.ChartData(ctx, 'bar', labels, data);
			});

			var BarChartKelas = {
				ChartData: function(ctx, type, labels, data) {
					new Chart(ctx, {
						type: type,
						data: {
							labels: labels,
							datasets: [
								{
									label: "Nilai",
									data: data,
									backgroundColor: [
										'rgba(255, 99, 132, 0.2)',
										'rgba(255, 159, 64, 0.2)',
										'rgba(255, 205, 86, 0.2)',
										'rgba(75, 192, 192, 0.2)',
										'rgba(54, 162, 235, 0.2)',
										'rgba(153, 102, 255, 0.2)',
										'rgba(201, 203, 207, 0.2)'
										],
									borderColor: [
										'rgb(255, 99, 132)',
										'rgb(255, 159, 64)',
										'rgb(255, 205, 86)',
										'rgb(75, 192, 192)',
										'rgb(54, 162, 235)',
										'rgb(153, 102, 255)',
										'rgb(201, 203, 207)'
									],
									borderWidth: 1,
								},
							],
						},
						options: {
							responsive: true,
							maintainAspectRatio: true,
							yAxis: {
									scales: {
										beginAtZero: true,
									}
								},
							plugins: {
								labels: {
									render: 'value',
								},
							},
						},
					});
				},
			};
		})(jQuery);
	</script>
@endsection
