<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - BizLand Bootstrap Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="/BizLand/assets/img/favicon.png" rel="icon">
    <link href="/BizLand/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/BizLand/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/BizLand/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/BizLand/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/BizLand/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/BizLand/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="/BizLand/assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: BizLand
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/1.39.1/tabler-icons.min.css"
        integrity="sha512-xZTjoABnx4C6WYAnStv6Jdb3PpVR2V3C9RQhdlgq5ySx7J">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}




</head>

<body class="index-page">

    <header id="header" class="header sticky-top">

        <div class="topbar d-flex align-items-center">

        </div><!-- End Top Bar -->

        <div class="branding d-flex align-items-cente">

            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center">
                    <!-- Uncomment the line below if you also wish to use an image logo -->
                    <img src="/light/assets/images/weblogo.png" alt=""
                        style="max-height: 80px; max-width: 100%;  object-fit: contain;">
                    <h6 class="sitename">Pangkalan Gas Al - Fatah</h6>
                </a>

                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="#hero" class="active">Home</a></li>
                        <li><a href="#about">Booking</a></li>
                        <li><a href="#services">Produk</a></li>
                        <li><a href="#contact">Kontak</a></li>
                        <!-- Dropdown Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted pr-0" href="#"
                                id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-person-circle fs-3"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                <li class="dropdown-item d-flex align-items-center gap-2">
                                    <i class="ti ti-user fs-6"></i>
                                    <span class="mb-0 fs-3">{{ auth()->user()->name }}</span>
                                </li>
                                <li>
                                    <a href="logout" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    </li>
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>

            </div>

        </div>

    </header>
    <main role="main" class="main-content">
        <div class="container-fluid">
            {{-- @include('flash::message') --}}
            @yield('content')
        </div> <!-- .container-fluid -->
    </main> <!-- main -->


    <!-- Vendor JS Files -->
    <script src="/BizLand/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/BizLand/assets/vendor/php-email-form/validate.js"></script>
    <script src="/BizLand/assets/vendor/aos/aos.js"></script>
    <script src="/BizLand/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/BizLand/assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="/BizLand/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/BizLand/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/BizLand/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="/BizLand/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

    <!-- Main JS File -->
    <script src="/BizLand/assets/js/main.js"></script>

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
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {

                        form.submit();
                    }
                });
            })
        })
    </script>





</body>

</html>
