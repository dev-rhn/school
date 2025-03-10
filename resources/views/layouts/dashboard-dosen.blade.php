<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Website FERR</title>

    @stack('prepend-style')
    <!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link href="/style/main.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.css" rel="stylesheet">
    <style>
    html {
    overflow-x: hidden;
    }

    body.dark {
        --light: #0c0c1e;
        --grey: #060714;
        --dark: #fbfbfb;
    }

    body {
        background: var(--grey);
        overflow-x: hidden;
    }
    </style>
    @stack('addon-style')
  </head>

  <body>
    @include('includes.sidebar-dosen')

    <section id="content">
        @include('includes.navbar')
        
        @yield('content')
    
        @yield('js')
    </section>

    @include('sweetalert::alert')

    @stack('prepend-script')
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.js"></script>
    <script src="/js/dashboard.js"></script>
    @stack('addon-script')
  </body>
</html>
