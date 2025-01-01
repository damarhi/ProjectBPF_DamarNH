<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/light/assets/images/weblogo.png">
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

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
                            <i class="bi bi-person-circle" style="font-size: 1.5rem;"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <div class="message-body">
                            <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-user fs-6"></i>
                                <p class="mb-0 fs-3">{{ auth()->user()->name }}</p>

                            </a>

                            <a href="logout" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                        </div>
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
                    <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="/dashboard">
                        <img src="/light/assets/images/weblogo.png" alt="" class="logo-small">
                    </a>
                </div>

                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item w-100">
                        <a class="nav-link" href="/dashboard">
                            <i class="fe fe-home fe-16"></i>
                            <span class="ml-3 item-text">Dashboard</span>
                        </a>
                    </li>
                    <p class="text-muted nav-heading mt-4 mb-1">
                        <span>MENU</span>
                    </p>
                    <li class="nav-item dropdown">
                        <a href="#ui-elements" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle nav-link">
                            <i class="fe fe-box fe-16"></i>
                            <span class="ml-3 item-text">Booking</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="/booking"><span class="ml-1 item-text">Data</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#forms" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle nav-link">
                            <i class="fe fe-credit-card fe-16"></i>
                            <span
                                class="ml-3 item-text sidebar-link {{ request()->is('\pengguna') ? 'active' : '' }}">Pengguna</span>
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
                            <span
                                class="ml-3 item-text sidebar-link {{ request()->is('\transaksi') ? 'active' : '' }}">Transaksi</span>
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
                                <a class="nav-link pl-3" href="\produk"><span class="ml-1 item-text">Data</span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#contact" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle nav-link">
                            <i class="fe fe-book fe-16"></i>
                            <span class="ml-3 item-text">Laporan</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="contact">
                            <a class="nav-link pl-3" href="/laporan/create"><span class="ml-1">Penjualan</span></a>
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

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="/light/s/popper.min.js"></script>
    <script src="/light/js/moment.min.js"></script>
    <script src="/light/js/bootstrap.min.js"></script>
    <script src="/light/js/simplebar.min.js"></script>
    <script src='/light/js/daterangepicker.js'></script>
    <script src='/light/js/jquery.stickOnScroll.js'></script>
    <script src="/light/js/tinycolor-min.js"></script>
    <script src="/light/js/config.js"></script>
    <script src="/light/js/topojson.min.js"></script>
    <script src="/light/js/datamaps.all.min.js"></script>
    <script src="/light/js/datamaps-zoomto.js"></script>
    <script src="/light/js/datamaps.custom.js"></script>
    <script src="/light/js/Chart.min.js"></script>
    <script>
      /* defind global options */
      Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
      Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="/light/js/gauge.min.js"></script>
    <script src="/light/js/jquery.sparkline.min.js"></script>
    <script src="/light/js/apexcharts.min.js"></script>
    <script src="/light/js/apexcharts.custom.js"></script>
    <script src='/light/js/jquery.mask.min.js'></script>
    <script src='/light/js/select2.min.js'></script>
    <script src='/light/js/jquery.steps.min.js'></script>
    <script src='/light/js/jquery.validate.min.js'></script>
    <script src='/light/js/jquery.timepicker.js'></script>
    <script src='/light/js/dropzone.min.js'></script>
    <script src='/light/js/uppy.min.js'></script>
    <script src='/light/js/quill.min.js'></script>
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
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: function() {
                    $(this).data('placeholder');
                },
                allowClear: true,
                width: 'resolve'
            });
        });
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000,
                backdrop: false,
            });
        });
    </script>

    @endif

    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 2000,
                backdrop: false,
            });
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
                    title: "Apakah Yakin?",
                    text: "Data Akan Di Hapus Selamanya",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus"
                }).then((result) => {
                    if (result.isConfirmed) {

                        form.submit();
                    }
                });
            })
        })
    </script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.select2').select2({
                placeholder:function(){
                    $(this).data('placeholder');
                },
                allowClear: true,
                width:'resolve',
            });
        });
    </script>
</body>

</html>
