<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="/light/css/simplebar.css">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="/light/css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="/light/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="/light/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="/light/css/app-dark.css" id="darkTheme" disabled>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .logo-small {
            max-height: 170px;
            max-width: 100%;
            object-fit: contain;
        }
    </style>
</head>

<body class="vertical  light  ">
    <div class="wrapper">
        <nav class="topnav navbar navbar-light">
            <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
                <i class="fe fe-menu navbar-toggler-icon"></i>
            </button>
            <form class="form-inline mr-auto searchform text-muted">
                <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search"
                    placeholder="Type something..." aria-label="Search">
            </form>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
                        <i class="fe fe-sun fe-16"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="avatar avatar-sm mt-2">
                            <img src="/light/./assets/avatars/face-1.jpg" alt="..."
                                class="avatar-img rounded-circle">
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="nav-link pl-3" href="logout">LOGOUT</a>
                    </div>
                </li>
            </ul>
        </nav>
        <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
            <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3"
                data-toggle="toggle">
                <i class="fe fe-x"><span class="sr-only"></span></i>
            </a>
            <nav class="vertnav navbar navbar-light">
                <!-- nav bar -->
                <div class="w-100 mb-4 d-flex">
                    <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                        <img src="/light/assets/images/weblogo.png" alt="" class="logo-small">
                    </a>
                </div>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item dropdown">
                        <a href="#ui-elements" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle nav-link">
                            <i class="fe fe-box fe-16"></i>
                            <span class="ml-3 item-text">Booking</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="/booking"><span
                                        class="ml-1 item-text">Data</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#forms" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle nav-link">
                            <i class="fe fe-credit-card fe-16"></i>
                            <span class="ml-3 item-text sidebar-link {{ request()->is('\pengguna') ? 'active' : '' }}">Pengguna</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="forms">
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="/pengguna"><span
                                        class="ml-1 item-text">Data</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#tables" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle nav-link">
                            <i class="fe fe-grid fe-16"></i>
                            <span class="ml-3 item-text sidebar-link {{ request()->is('\transaksi') ? 'active' : '' }}" >Transaksi</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="tables">
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="\transaksi"><span
                                        class="ml-1 item-text">Data</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#charts" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle nav-link">
                            <i class="fe fe-pie-chart fe-16"></i>
                            <span class="ml-3 item-text {{ request()->is('\pengguna') ? 'active' : '' }}">Produk</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="charts">
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="\produk"><span
                                        class="ml-1 item-text">Data</span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#contact" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                          <i class="fe fe-book fe-16"></i>
                          <span class="ml-3 item-text">Laporan</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="contact">
                          <a class="nav-link pl-3" href="./contacts-list.html"><span class="ml-1">Penjualan</span></a>
                        </ul>
                      </li>

                </ul>

            </nav>
        </aside>
        <main role="main" class="main-content">
            <div class="container-fluid">
                {{-- @include('flash::message') --}}
                @yield('content')
            </div> <!-- .container-fluid -->
        </main> <!-- main -->
    </div> <!-- .wrapper -->
    <script src="/light/js/jquery.min.js"></script>
    <script src="/light/s/popper.min.js"></script>
    <script src="/light/js/moment.min.js"></script>
    <script src="/light/js/bootstrap.min.js"></script>
    <script src="/light/js/simplebar.min.js"></script>
    <script src='/light/js/daterangepicker.js'></script>
    <script src='/light/js/jquery.stickOnScroll.js'></script>
    <script src="/light/js/tinycolor-min.js"></script>
    <script src="/light/js/config.js"></script>
    <script src="/light/js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-56159088-1');
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('success'))
    <script>
                Swal.fire({
                    icon: "success",
                    title: "Your work has been saved",
                    showConfirmButton: true,
                    timer: 5000
                });
    </script>
    @endif

    @if(session('error'))
    <script>
                Swal.fire({
                    icon: "error",
                    title: "Your work has not been saved",
                    showConfirmButton: true,
                    timer: 5000
                });
    </script>
    @endif


    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#delete', function(e) {

                let form = $(this).closest("form");

                e.preventDefault();
                var link = $(this).attr('href');
                // import swal from 'sweetalert';
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                        form.submit();
                    }
                });
            })
        })
    </script>


</body>

</html>
