@extends('layouts.app_home',['title' => 'Home'])
@section('content')
    <main class="main">

        <!-- Hero Section -->
        <section style="background-image: url(/light/assets/images/bg.png); background-size: 60%; " id="hero" class="hero section light-background">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
                        <h1>Selamat Datang di <span>Pangkalan Gas Al - Fatah</span></h1>
                        <p></p>
                        <div class="d-flex">
                            <a href="#about" class="btn-get-started">Lihat Bookingan Anda</a>

                        </div>
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- Featured Services Section -->
        <!-- About Section -->
        <section id="about" class="about section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Booking</h2>
                <p><span>List Booking</span> <span class="description-title">{{ auth()->user()->name }}</span></p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row gy-3">
                    <table class="table table-striped">

                        <div class="row mb-3 mt-3">
                            <div class="col-md-6">
                                <a href="#services" class="btn btn-primary btn-sm">Tambah Pembookingan</a>
                            </div>

                            <!-- Tombol di sebelah kanan -->
                            <div class="col-md-6 d-flex justify-content-end align-items-center">
                                <a href="/home"
                                    class="btn btn-primary {{ !request()->has('status') ? 'active' : '' }} me-2">
                                    Semua
                                </a>
                                <a href="/home?status=Tunggu"
                                    class="btn btn-primary {{ request('status') == 'Tunggu' ? 'active' : '' }} me-2">
                                    Tunggu
                                </a>
                                <a href="/home?status=Disetujui"
                                    class="btn btn-primary {{ request('status') == 'Disetujui' ? 'active' : '' }} me-2">
                                    Disetujui
                                </a>
                                <a href="/home?status=Ditolak"
                                    class="btn btn-primary {{ request('status') == 'Ditolak' ? 'active' : '' }} me-2">
                                    Ditolak
                                </a>
                                <a href="/home?status=Selesai"
                                    class="btn btn-primary {{ request('status') == 'Selesai' ? 'active' : '' }}">
                                    Selesai
                                </a>
                            </div>
                        </div>

                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Pelanggan</th>
                                <th>Jenis Produk</th>
                                <th>Jumlah Produk</th>
                                <th>Total Harga</th>
                                <th>Tanggal Booking</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 0; // Variabel penghitung
                            @endphp
                            @foreach ($booking as $item)
                                @if ($item->user_id == auth()->user()->id)
                                    @php
                                        $counter++; // Increment counter untuk data yang ditampilkan
                                    @endphp
                                    <tr>
                                        <td>{{ $counter }}</td>
                                        <td>{{ $item->User->name }}</td>
                                        <td>{{ $item->produk->jenis }}</td>
                                        <td>{{ $item->jumlah_produk }}</td>
                                        <td>RP. {{ number_format($item->total_harga) }}</td>
                                        <td>{{ $item->tanggal_booking }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td class="text-center">
                                            <a href="#detailbooking{{ $item->id }}" class="btn btn-info btn-sm"
                                                data-toggle="modal" data-bs-toggle="modal">Detail</a>
                                            <form action="{{ url('/home/' . $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm ml-2" id="delete">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>

                    </table>
                    {!! $booking->links() !!}

                </div>
            </div>

        </section><!-- /About Section -->
        <!-- Services Section -->
        <section id="services" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Produk</h2>
                <p><span>Gas</span> <span class="description-title">Tersedia</span></p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">
                    @foreach ($listProduk as $item)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-item position-relative">
                                <span class="advanced">{{ $item->jenis }}</span>
                                <h3>
                                    @if ($item->foto)
                                        <a href="{{ Storage::url($item->foto) }}" target="blank">
                                            <img src="{{ Storage::url($item->foto) }}" class="img-fluid rounded"
                                                style="width: 150px; height: 150px; object-fit: cover;" alt="">
                                        </a>
                                    @endif
                                </h3>
                                <h4><sup>RP. {{ number_format($item->harga_jual) }}</span></h4>
                                <h4><sup>stok : {{ $item->stok_sekarang }}</span></h4>

                                <div class="file-action">
                                    <a href="#homebooking{{ $item->id }}" class="btn btn-info btn-sm"
                                        data-toggle="modal" data-bs-toggle="modal">Booking</a>
                                </div>
                            </div>
                        </div><!-- End Service Item -->
                    @endforeach


                </div>

            </div>

        </section><!-- /Services Section -->
        <!-- Contact Section -->

    </main>
    <footer id="contact" class="contact">

        <div class="footer-newsletter">
            <div class="container">
                <div class="container section-title" data-aos="fade-up">
                    <h2>Kontak</h2>
                    <p><span>Alamat</span> <span class="description-title">Kami</span></p>
                </div><!-- End Section Title -->

                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="row gy-4">

                        <div class="col-lg-5">

                            <div class="info-wrap">
                                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                                    <i class="bi bi-geo-alt flex-shrink-0"></i>
                                    <div>
                                        <h3>Alamat</h3>
                                        <p>Makmur, Kabupaten Pelalawan, Riau</p>
                                    </div>
                                </div><!-- End Info Item -->

                                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                                    <i class="bi bi-telephone flex-shrink-0"></i>
                                    <div>
                                        <h3>WhatsApp</h3>
                                        <p>08123456789</p>
                                    </div>
                                </div><!-- End Info Item -->

                                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                                    <i class="bi bi-envelope flex-shrink-0"></i>
                                    <div>
                                        <h3>Email</h3>
                                        <p>damar@gmail.com</p>
                                    </div>
                                </div><!-- End Info Item -->
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d997.4271855139668!2d101.83890126947061!3d0.42464334104164175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMMKwMjUnMjguNyJOIDEwMcKwNTAnMjIuNCJF!5e0!3m2!1sid!2sid!4v1734364120794!5m2!1sid!2sid"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div><!-- End Contact Form -->

                    </div>

                </div>

            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    @include('homeBooking')
    @include('detailBooking')
@endsection
