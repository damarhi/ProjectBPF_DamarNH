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
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="/light/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="/light/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="/light/css/app-dark.css" id="darkTheme" disabled>
</head>

<body class="light ">
    <div class="wrapper vh-100">
        <div class="align-items-center h-100 d-flex w-50 mx-auto">
            <div class="mx-auto text-center">
                <h1 class="display-1 m-0 font-weight-bolder text-muted" style="font-size:80px;">404</h1>
                <h1 class="mb-1 text-muted font-weight-bold">OOPS!</h1>
                <h6 class="mb-3 text-muted">'You do not have permission to access this page.'</h6>
                <!-- Tautan dinamis sesuai role user -->
                @if (auth()->check() && auth()->user()->role == 'admin')
                    <a href="/dashboard" class="btn btn-lg btn-primary px-5">Back to Home</a>
                @else
                    <a href="/home" class="btn btn-lg btn-primary px-5">Back to Home</a>
                @endif
            </div>
        </div>
    </div>
    <script src="/light/js/jquery.min.js"></script>
    <script src="/light/js/popper.min.js"></script>
    <script src="/light/js/moment.min.js"></script>
    <script src="/light//bootstrap.min.js"></script>
    <script src="/light/js/simplebar.min.js"></script>
    <script src='/light/js/daterangepicker.js'></script>
    <script src='/light//jquery.stickOnScroll.js'></script>
    <script src="/light//tinycolor-min.js"></script>
    <script src="/light//config.js"></script>
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
