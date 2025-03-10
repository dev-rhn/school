	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-cog'></i>
			<span class="text">Website FERR</span>
		</a>
		<ul class="side-menu top">
			<li class="{{ (request()->is('dashboard/mahasiswa*')) ? 'active' : '' }}">
				<a href="{{ route('dashboard-mahasiswa') }}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="{{ (request()->is('mahasiswa-matakuliah*')) ? 'active' : '' }}">
				<a href="{{ route('mahasiswa-matakuliah.index') }}">
					<i class='bx bxs-book'></i>
					<span class="text">Mata Kuliah</span>
				</a>
			</li>
			<li class="{{ (request()->is('mahasiswa-nilai*')) ? 'active' : '' }}">
				<a href="{{ route('mahasiswa-nilai.index') }}">
					<i class='bx bxs-add-to-queue'></i>
					<span class="text">Penilaian</span>
				</a>
			</li>
			<li class="{{ (request()->is('laporan-ipk*')) ? 'active' : '' }}">
				<a href="{{ route('laporan-ipk.index') }}">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Laporan IPK</span>
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