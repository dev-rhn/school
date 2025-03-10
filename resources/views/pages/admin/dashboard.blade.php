@extends('layouts.dashboard-admin')

@section('content')
	<!-- MAIN -->
<main>
	<div class="head-title">
		<div class="left">
			<h1>Dashboard Admin - {{ Auth::user()->name }}</h1>
		</div>
	</div>

	<ul class="box-info">
		<li>
			<i class='bx bxs-book'></i>
			<span class="text">
				<h3>Mata Kuliah</h3>
				<h4>{{ $jumlah_matkul }}</h4>
			</span>
		</li>
		<li>
			<i class='bx bxs-group' ></i>
			<span class="text">
				<h3>Total Pengguna</h3>
				<h4>{{ $jumlah_pengguna }}</h4>
			</span>
		</li>
	</ul>
	<ul class="box-info">
		<li>
			<i class='bx bxs-group' ></i>
			<span class="text">
				<h3>Admin</h3>
				<h4>{{ $jumlah_admin }}</h4>
			</span>
		</li>
		<li>
			<i class='bx bxs-group' ></i>
			<span class="text">
				<h3>Dosen</h3>
				<h4>{{ $jumlah_dosen }}</h4>
			</span>
		</li>
		<li>
			<i class='bx bxs-group' ></i>
			<span class="text">
				<h3>Mahasiswa</h3>
				<h4>{{ $jumlah_mahasiswa }}</h4>
			</span>
		</li>
	</ul>

	<div class="table-data">
		<div class="order">
			<div class="head">
				<h3>Data Mahasiswa</h3>
			</div>
			<div class="row">
				<div class="col-7">
					<h5>Data Angkatan</h5>
					<div class="chart-container">
						<canvas id="DataAngkatan"></canvas>
					</div>
				</div>
				<div class="col-5">
					<h5>Data Mahasiswa</h5>
					<div class="chart-container">
						<canvas id="DataMahasiswa"></canvas>
					</div>
				</div>
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
		var queryMahasiswa = @json($queryMahasiswa);
		var queryAngkatan = @json($queryAngkatan);
	</script>

	<script>
		(function($) {
			$(document).ready(function() {
				var labels = Object.keys(queryMahasiswa);
				var data = Object.values(queryMahasiswa);
				//console.log(labels);
				var ctx = document.getElementById("DataMahasiswa").getContext("2d");
				BarChartMahasiswa.ChartDataAkt(ctx, 'pie', labels, data);
			});

			var BarChartMahasiswa = {
				ChartDataAkt: function(ctx, type, labels, data) {
					new Chart(ctx, {
						type: type,
						data: {
							labels: labels,
							datasets: [
								{
									label: "Data Angkatan",
									data: data,
									backgroundColor: [
										'rgba(255, 99, 132, 0.4)',
										'rgba(255, 159, 64, 0.4)',
										'rgba(255, 205, 86, 0.4)',
										'rgba(75, 192, 192, 0.4)',
										'rgba(54, 162, 235, 0.4)',
										'rgba(153, 102, 255, 0.4)',
										'rgba(201, 203, 207, 0.4)'
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
									hoverOffset: 4
								},
							],
						},
						options: {
							responsive: true,
							maintainAspectRatio: true,
							scales: {
								y: {
									beginAtZero: true
								}
							},
							plugins: {
								labels: {
									render: 'persen',
								},
							},
						},
					});
				},
			};
		})(jQuery);
	</script>

	<script>
		(function($) {
			$(document).ready(function() {
				var labels = Object.keys(queryAngkatan);
				var data = Object.values(queryAngkatan);
				//console.log(labels);
				var ctx = document.getElementById("DataAngkatan").getContext("2d");
				BarChartMahasiswa.ChartData(ctx, 'bar', labels, data);
			});

			var BarChartMahasiswa = {
				ChartData: function(ctx, type, labels, data) {
					new Chart(ctx, {
						type: type,
						data: {
							labels: labels,
							datasets: [
								{
									label: "Data Mahasiswa",
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