<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard | @yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/imgs/cife-logo.png') }}" rel="icon">
  <link href="{{ asset('assets/imgs/cife-logo.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/w3.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/bootstrap-icons/bootstrap-icons.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/datatables.min.css') }}">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  <style>
    /* .header-nav .profile .dropdown-item {
        background-color: #69043f;
        color:white;
    }
    .header-nav .profile .dropdown-item:hover {
        background-color: #ffa700;
    } */

    .sidebar-nav .nav-content a {
        color: #ffc107;
    }
    .sidebar-nav .nav-content a:hover, .sidebar-nav .nav-content a.active {
        color: #0dcaf0;
    }
  </style>
  @stack('style')
</head>

<body style="background-color: #0a1932 !important;">  {{-- #0a1932 --}}

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center" style="background:#ffa700 !important;">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ route('admin-dashboard') }}" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class=" d-lg-block">ICAR-CIFE</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    {{-- <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar --> --}}

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">


        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('assets/imgs/cife-logo.png') }}" alt="Profile" class="rounded-circle">
            <span class=" d-md-block dropdown-toggle ps-2 text-capitalize">{{ Auth::user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            {{-- <li>
              <hr class="dropdown-divider">
            </li> --}}
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('admin-logout') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar" style="background: #051d42;">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('admin-dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

        @if(Auth::user()->IT_CELL == 1)
        <li class="nav-heading">Admin Section</li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-people"></i><span>Users Management</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('user-show') }}">
                <i class="bi bi-arrow-right" style="font-size: 1.5rem;"></i><span>All Users</span>
                </a>
            </li>
            </ul>
        </li><!-- End User Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#divsion-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-journal-text"></i><span>Division</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="divsion-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                <a href="{{ route('div-show') }}">
                  <i class="bi bi-arrow-right" style="font-size: 1.5rem;"></i><span>All Division</span>
                </a>
              </li>

            </ul>
        </li><!-- End division Nav -->
        @endif

        @if(Auth::user()->id)
        <li class="nav-heading">User Setting</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#setting-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-person"></i><span>Setting</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="setting-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                <a href="{{ route('user-pwd') }}">
                  <i class="bi bi-arrow-right" style="font-size: 1.5rem;"></i><span>Reset Password</span>
                </a>
              </li>

            </ul>
        </li><!-- End division Nav -->
        @endif

        {{-- FINANCE --}}
        @if(Auth::user()->FINANCE == 1)
        <li class="nav-heading">FINANCE Section</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#demo-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>FINANCE Division</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="demo-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="forms-elements.html">
                    <i class="bi bi-circle"></i><span>Form Elements</span>
                    </a>
                </li>
            </ul>
        </li><!-- End FINANCE Nav -->
        @endif

        {{-- Aqua --}}
        @if(Auth::user()->AQUA == 1)
        <li class="nav-heading">AQUA Section</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#demo-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Aqua Division</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="demo-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="forms-elements.html">
                <i class="bi bi-circle"></i><span>Form Elements</span>
                </a>
            </li>

            </ul>
        </li><!-- End Aqua Nav -->
        @endif

        {{-- FRHPHM --}}
        @if(Auth::user()->FRHPHM == 1)
        <li class="nav-heading">FRHPHM Section</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#demo-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>FRHPHM Division</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="demo-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="forms-elements.html">
                <i class="bi bi-circle"></i><span>Form Elements</span>
                </a>
            </li>

            </ul>
        </li><!-- End FRHPHM Nav -->
        @endif

        {{-- AEHM --}}
        @if(Auth::user()->AEHM == 1)
        <li class="nav-heading">AEHM Section</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#demo-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>AEHM Division</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="demo-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="forms-elements.html">
                <i class="bi bi-circle"></i><span>Form Elements</span>
                </a>
            </li>

            </ul>
        </li><!-- End AEHM Nav -->
        @endif

        {{-- FNBP --}}
        @if(Auth::user()->FNBP == 1)
        <li class="nav-heading">FNBP Section</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#demo-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>FNBP Division</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="demo-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="forms-elements.html">
                    <i class="bi bi-circle"></i><span>Form Elements</span>
                    </a>
                </li>
            </ul>
        </li><!-- End FNBP Nav -->
        @endif

        {{-- FGB --}}
        @if(Auth::user()->FGB == 1)
        <li class="nav-heading">FGB Section</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#demo-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>FGB Division</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="demo-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="forms-elements.html">
                    <i class="bi bi-circle"></i><span>Form Elements</span>
                    </a>
                </li>
            </ul>
        </li><!-- End FGB Nav -->
        @endif

        {{-- FEES --}}
        @if(Auth::user()->FEES == 1)
        <li class="nav-heading">FEES Section</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#demo-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>FEES Division</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="demo-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="forms-elements.html">
                    <i class="bi bi-circle"></i><span>Form Elements</span>
                    </a>
                </li>
            </ul>
        </li><!-- End FEES Nav -->
        @endif

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1 class="text-white">@yield('heading')</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}" class="text-warning">Home</a></li>
          <li class="breadcrumb-item active">@yield('heading')</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    {{-- main-content --}}
    @yield('content')
    {{-- /-main-content --}}

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright text-warning">
      &copy; Copyright <strong><span>ICAR-CIFE</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      {{-- Designed by Umesh R. Sarode --}}
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/datatables.min.js') }}"></script>

  <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @stack('sctipt')

</body>

</html>
