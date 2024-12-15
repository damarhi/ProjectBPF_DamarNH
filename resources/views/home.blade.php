@extends('layouts.app_home')
@section('content')

    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

        <!-- Header -->
        <header id="header">
            <div class="intro">
                <div class="container">
                    <div class="row">
                        <div class="intro-text">
                            <h1>SELAMAT DATANG DI</h1>
                            <hr>
                            <p>Pangkalan Gas Al - Fatah</p>
                            <a href="#portfolio" class="btn btn-default btn-lg page-scroll">Ayoo Booking...</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Navigation -->
        <div id="nav">
            <nav class="navbar navbar-custom">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-main-collapse"> <i class="fa fa-bars"></i> </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <!-- Navbar Header untuk Logo -->

                    <!-- Navbar Navigasi -->
                    <div class="collapse navbar-collapse navbar-main-collapse">
                        <ul class="nav navbar-nav">
                            <!-- Navigasi Utama -->
                            <li style="margin-right: 150px">
                                <img src="/light/assets/images/weblogo.png" alt="Logo"
                                    style="max-width: 100%;max-height: 65px; object-fit: contain;"> <!-- Logo Website -->
                            </li>
                            <li class="hidden"><a href="#page-top"></a></li>
                            <li><a class="page-scroll" href="#about">List Booking</a></li>
                            <li><a class="page-scroll" href="#portfolio">Produk</a></li>
                            <li><a class="page-scroll" href="#contact">Kontak</a></li>
                            @if (Auth::check())
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-expanded="false">
                                        <i class="fa fa-user-circle fa-lg"></i> <!-- Icon User -->
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li class="dropdown-header">
                                            {{ Auth::user()->name }} <!-- Nama User -->
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="logout">
                                                <i class="fa fa-sign-out"></i> Logout <!-- Icon Logout -->
                                            </a>
                                        </li>
                                    </ul>
                            @endif
                        </ul>
                    </div>

                </div>
            </nav>
        </div>

        <!-- About Section -->
        <div id="about">
            <div class="container">
                <div class="section-title text-center center">
                    <h2>List Bookingan Anda</h2>
                    <hr>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <div class="row mb-3 mt-3">
                                <div class="col-md-6">
                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#bookingcreate">Tambah Pembookingan</a>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <a href="/booking"
                                        class="btn btn-outline-primary btn-sm {{ !request()->has('status') ? 'active' : '' }} mx-1">Semua</a>
                                    <a href="/booking?status=Tunggu"
                                        class="btn btn-outline-primary btn-sm {{ request('status') == 'Tunggu' ? 'active' : '' }} mx-1">Tunggu</a>
                                    <a href="/booking?status=Disetujui"
                                        class="btn btn-outline-primary btn-sm {{ request('status') == 'Disetujui' ? 'active' : '' }} mx-1">Disetujui</a>
                                    <a href="/booking?status=Ditolak"
                                        class="btn btn-outline-primary btn-sm {{ request('status') == 'Ditolak' ? 'active' : '' }} mx-1">Ditolak</a>
                                    <a href="/booking?status=Selesai"
                                        class="btn btn-outline-primary btn-sm {{ request('status') == 'Selesai' ? 'active' : '' }} mx-1">Selesai</a>
                                </div>
                            </div>

                            <thead class="text-center">
                                <tr>
                                    <th style="width: 5%;">NO</th>
                                    <th style="width: 15%;">Pelanggan</th>
                                    <th style="width: 15%;">Jenis Produk</th>
                                    <th style="width: 10%;">Jumlah Produk</th>
                                    <th style="width: 15%;">Total Harga</th>
                                    <th style="width: 15%;">Tanggal Booking</th>
                                    <th style="width: 10%;">Status</th>
                                    <th style="width: 15%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($booking as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->pengguna->nama }}</td>
                                        <td>{{ $item->produk->jenis }}</td>
                                        <td class="text-center">{{ $item->jumlah_produk }}</td>
                                        <td>RP. {{ number_format($item->total_harga) }}-</td>
                                        <td>{{ $item->tanggal_booking }}</td>
                                        <td class="text-center">{{ $item->status }}</td>
                                        <td class="text-center">
                                            <a href="#bookingshow{{ $item->id }}" class="btn btn-info btn-sm mx-1">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <form action="/booking/{{ $item->id }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm mx-1">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <!-- portofolio Section -->
        <div id="portfolio">
            <div class="container">
                <div class="section-title text-center center">
                    <h2>Produk</h2>
                    <hr>
                </div>
                <div class="row">
                    <div class="portfolio-items">
                        @foreach ($listProduk as $item)
                            <div class="col-sm-6 col-md-0 col-lg-4 graphic">
                                <div class="portfolio-item">
                                    <div class="hover-bg" style="height:300px"> <a href="#bookingCreate" title="Project Title"
                                            data-toggle="modal" data-bs-toggle="modal">
                                            <div class="hover-text">
                                                <h4>{{ $item->jenis }}</h4>
                                                <p class="small">Harga Jual: {{ $item->harga_jual }}</p>
                                                <p class="small text-muted mb-0">Stok : {{ $item->stok_sekarang }}</p>
                                            </div>
                                            @if ($item->foto)
                                                <a href="{{ Storage::url($item->foto) }}" target="blank">
                                                    <img src="{{ Storage::url($item->foto) }}" class="img-responsive"
                                                        style="width: 350px; height: 350px; object-fit: cover;" alt="">
                                                </a>
                                            @endif

                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Section -->
        <div id="contact" class="text-center">
            <div class="container">
                <div class="section-title center">
                    <h2>Get In Touch</h2>
                    <hr>
                </div>
                <div class="col-md-8 col-md-offset-2">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" id="name" class="form-control" placeholder="Name"
                                        required="required">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" id="email" class="form-control" placeholder="Email"
                                        required="required">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div id="success"></div>
                        <button type="submit" class="btn btn-default btn-lg">Send Message</button>
                    </form>
                    <div class="social">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer">
            <div class="container text-center">
                <div class="fnav">
                    <p>Copyright &copy; Magnum. Designed by <a href="http://www.templatewire.com"
                            rel="nofollow">TemplateWire</a></p>
                </div>
            </div>
        </div>
    @endsection
