@extends('layouts.dashboard-admin')

@section('content')
	<!-- MAIN -->
<main>
	<div class="head-title">
		<div class="left">
			<h1>Dashboard Admin - Laporan</h1>
		</div>
	</div>

    <div class="table-data">
		<div class="order">
			<div class="head">
				<h3>Recent Orders</h3>
				<i class='bx bx-search' ></i>
				<i class='bx bx-filter' ></i>
			</div>
			<table>
				<thead>
					<tr>
						<th>User</th>
						<th>Date Order</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<img src="images/user.jpg">
							<p>John Doe</p>
						</td>
						<td>01-10-2021</td>
						<td><span class="status completed">Completed</span></td>
					</tr>
					<tr>
						<td>
							<img src="images/user.jpg">
							<p>John Doe</p>
						</td>
						<td>01-10-2021</td>
						<td><span class="status pending">Pending</span></td>
					</tr>
					<tr>
						<td>
							<img src="images/user.jpg">
							<p>John Doe</p>
						</td>
						<td>01-10-2021</td>
						<td><span class="status process">Process</span></td>
					</tr>
					<tr>
						<td>
							<img src="images/user.jpg">
							<p>John Doe</p>
						</td>
						<td>01-10-2021</td>
						<td><span class="status pending">Pending</span></td>
					</tr>
					<tr>
						<td>
							<img src="images/user.jpg">
							<p>John Doe</p>
						</td>
						<td>01-10-2021</td>
						<td><span class="status completed">Completed</span></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</main>
<!-- MAIN -->
@endsection