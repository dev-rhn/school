	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-cog'></i>
			<span class="text">Website FERR</span>
		</a>
		<ul class="side-menu top">
			<li class="{{ (request()->is('dashboard/admin*')) ? 'active' : '' }}">
				<a href="{{ route('dashboard-admin') }}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="{{ (request()->is('mahasiswa*')) ? 'active' : '' }}">
				<a href="{{ route('mahasiswa.index') }}">
					<i class='bx bxs-group' ></i>
					<span class="text">Mahasiswa</span>
				</a>
			</li>
			<li class="{{ (request()->is('dosen*')) ? 'active' : '' }}">
				<a href="{{ route('dosen.index') }}">
					<i class='bx bxs-group' ></i>
					<span class="text">Dosen</span>
				</a>
			</li>
			<li class="{{ (request()->is('matakuliah*')) ? 'active' : '' }}">
				<a href="{{ route('matakuliah.index') }}">
					<i class='bx bxs-book'></i>
					<span class="text">Mata Kuliah</span>
				</a>
			</li>
			<li class="{{ (request()->is('pengampu*')) ? 'active' : '' }}">
				<a href="{{ route('pengampu.index') }}">
					<i class='bx bxs-book'></i>
					<span class="text">Pengampu Mata Kuliah</span>
				</a>
			</li>
			<li class="{{ (request()->is('nilai*')) ? 'active' : '' }}">
				<a href="{{ route('nilai.index') }}">
					<i class='bx bxs-add-to-queue'></i>
					<span class="text">Input Nilai</span>
				</a>
			</li>
			{{-- <li class="{{ (request()->is('dashboard/laporan*')) ? 'active' : '' }}">
				<a href="{{ route('laporan') }}">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Laporan</span>
				</a>
			</li> --}}
			<li class="{{ (request()->is('akun-pengguna*')) ? 'active' : '' }}">
				<a href="{{ route('akun-pengguna.index') }}">
					<i class='bx bxs-group' ></i>
					<span class="text">Akun Pengguna</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#" >
					
				</a>
                <a href="{{ route('logout') }}" class="logout" onclick="event.preventDefault(); 
                document.getElementById('logout-form').submit();">
                <i class='bx bxs-log-out-circle' ></i>
                <span class="text">Logout</span>
                </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->