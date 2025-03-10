	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-cog'></i>
			<span class="text">Website FERR</span>
		</a>
		<ul class="side-menu top">
			<li class="{{ (request()->is('dashboard/dosen*')) ? 'active' : '' }}">
				<a href="{{ route('dashboard-dosen') }}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			{{-- <li class="{{ (request()->is('dosen-matakuliah*')) ? 'active' : '' }}">
				<a href="{{ route('dosen-matakuliah.index') }}">
					<i class='bx bxs-book'></i>
					<span class="text">Mata Kuliah</span>
				</a>
			</li> --}}
			<li class="{{ (request()->is('dosen-mahasiswa*')) ? 'active' : '' }}">
				<a href="{{ route('dosen-mahasiswa.index') }}">
					<i class='bx bxs-group' ></i>
					<span class="text">Mahasiswa</span>
				</a>
			</li>
			<li class="{{ (request()->is('dosen-nilai*')) ? 'active' : '' }}">
				<a href="{{ route('dosen-nilai.index') }}">
					<i class='bx bxs-add-to-queue'></i>
					<span class="text">Input Nilai Mahasiswa</span>
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