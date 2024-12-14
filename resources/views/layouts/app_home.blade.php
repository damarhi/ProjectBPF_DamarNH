<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="/light/css/simplebar.css">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="/light/css/feather.css">
    <link rel="stylesheet" href="/light/css/select2.css">
    <link rel="stylesheet" href="/light/css/dropzone.css">
    <link rel="stylesheet" href="/light/css/uppy.min.css">
    <link rel="stylesheet" href="/light/css/jquery.steps.css">
    <link rel="stylesheet" href="/light/css/jquery.timepicker.css">
    <link rel="stylesheet" href="/light/css/quill.snow.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="/light/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="/light/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="/light/css/app-dark.css" id="darkTheme" disabled>
    <style>
        .navbar {
            display: flex;
            /* Aktifkan flexbox */
            justify-content: flex-start;
            /* Konten di kiri */
            align-items: center;
            /* Pusatkan vertikal */
            height: 60px;
            /* Sesuaikan tinggi navbar */
        }

        .navbar-brand img {
            max-height: 70px;
        }
    </style>
</head>

<body class="horizontal light  ">
    <div class="wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-white flex-row border-bottom shadow">
            <div class="container-fluid">
                <a class="navbar-brand" href="./index.html">
                    <img src="/light/assets/images/weblogo.png" alt="Logo" class="img-fluid"
                        style="max-height: 70px;">
                </a>
                <button class="navbar-toggler mt-2 mr-auto toggle-sidebar text-muted">
                    <i class="fe fe-menu navbar-toggler-icon"></i>
                </button>
                <div class="navbar-slide bg-white ml-lg-4" id="navbarSupportedContent">
                    <a href="#" class="btn toggle-sidebar d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
                        <i class="fe fe-x"><span class="sr-only"></span></i>
                    </a>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="widgets.html">
                                <span class="ml-lg-2">Home</span>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="widgets.html">
                                <span class="ml-lg-2">Booking</span>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="widgets.html">
                                <span class="ml-lg-2">About</span>

                            </a>
                        </li>
                </div>
                <form class="form-inline ml-md-auto d-none d-lg-flex searchform text-muted">
                    <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search"
                        placeholder="Type something..." aria-label="Search">
                </form>
                <ul class="navbar-nav d-flex flex-row">
                    <li class="nav-item">
                        <a class="nav-link text-muted my-2" href="./#" id="modeSwitcher" data-mode="light">
                            <i class="fe fe-sun fe-16"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-muted my-2" href="./#" data-toggle="modal"
                            data-target=".modal-shortcut">
                            <i class="fe fe-grid fe-16"></i>
                        </a>
                    </li>
                    <li class="nav-item nav-notif">
                        <a class="nav-link text-muted my-2" href="./#" data-toggle="modal"
                            data-target=".modal-notif">
                            <i class="fe fe-bell fe-16"></i>
                            <span class="dot dot-md bg-success"></span>
                        </a>
                    </li>
                    <li class="nav-item dropdown ml-lg-0">
                        <a class="nav-link dropdown-toggle text-muted" href="#" id="navbarDropdownMenuLink"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="avatar avatar-sm mt-2">
                                <img src="./assets/avatars/face-1.jpg" alt="..."
                                    class="avatar-img rounded-circle">
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="logout">LOGOUT</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <main role="main" class="main-content">
            <div class="container-fluid">
                {{-- @include('flash::message') --}}
                @yield('content')
            </div> <!-- .container-fluid -->
        </main>
    </div> <!-- .wrapper -->
    <script src="/light/js/jquery.min.js"></script>
    <script src="/light/js/popper.min.js"></script>
    <script src="/light/js/moment.min.js"></script>
    <script src="/light/js/bootstrap.min.js"></script>
    <script src="/light/js/simplebar.min.js"></script>
    <script src='/light/js/daterangepicker.js'></script>
    <script src='/light/js/jquery.stickOnScroll.js'></script>
    <script src="/light/js/tinycolor-min.js"></script>
    <script src="/light/js/config.js"></script>
    <script src="/light/js/d3.min.js"></script>
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
    <script>
        $('.select2').select2({
            theme: 'bootstrap4',
        });
        $('.select2-multi').select2({
            multiple: true,
            theme: 'bootstrap4',
        });
        $('.drgpicker').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            showDropdowns: true,
            locale: {
                format: 'MM/DD/YYYY'
            }
        });
        $('.time-input').timepicker({
            'scrollDefault': 'now',
            'zindex': '9999' /* fix modal open */
        });
        /** date range picker */
        if ($('.datetimes').length) {
            $('.datetimes').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale: {
                    format: 'M/DD hh:mm A'
                }
            });
        }
        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                    'month')]
            }
        }, cb);
        cb(start, end);
        $('.input-placeholder').mask("00/00/0000", {
            placeholder: "__/__/____"
        });
        $('.input-zip').mask('00000-000', {
            placeholder: "____-___"
        });
        $('.input-money').mask("#.##0,00", {
            reverse: true
        });
        $('.input-phoneus').mask('(000) 000-0000');
        $('.input-mixed').mask('AAA 000-S0S');
        $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
            translation: {
                'Z': {
                    pattern: /[0-9]/,
                    optional: true
                }
            },
            placeholder: "___.___.___.___"
        });
        // editor
        var editor = document.getElementById('editor');
        if (editor) {
            var toolbarOptions = [
                [{
                    'font': []
                }],
                [{
                    'header': [1, 2, 3, 4, 5, 6, false]
                }],
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [{
                        'header': 1
                    },
                    {
                        'header': 2
                    }
                ],
                [{
                        'list': 'ordered'
                    },
                    {
                        'list': 'bullet'
                    }
                ],
                [{
                        'script': 'sub'
                    },
                    {
                        'script': 'super'
                    }
                ],
                [{
                        'indent': '-1'
                    },
                    {
                        'indent': '+1'
                    }
                ], // outdent/indent
                [{
                    'direction': 'rtl'
                }], // text direction
                [{
                        'color': []
                    },
                    {
                        'background': []
                    }
                ], // dropdown with defaults from theme
                [{
                    'align': []
                }],
                ['clean'] // remove formatting button
            ];
            var quill = new Quill(editor, {
                modules: {
                    toolbar: toolbarOptions
                },
                theme: 'snow'
            });
        }
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <script>
        var uptarg = document.getElementById('drag-drop-area');
        if (uptarg) {
            var uppy = Uppy.Core().use(Uppy.Dashboard, {
                inline: true,
                target: uptarg,
                proudlyDisplayPoweredByUppy: false,
                theme: 'dark',
                width: 770,
                height: 210,
                plugins: ['Webcam']
            }).use(Uppy.Tus, {
                endpoint: 'https://master.tus.io/files/'
            });
            uppy.on('complete', (result) => {
                console.log('Upload complete! We’ve uploaded these files:', result.successful)
            });
        }
    </script>
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
</body>

</html>
