@extends('layouts.app_tiny',['title'=> 'Data Booking'])

@section('content')
    <div class="card">
        <div class="card-body">
           <h3>Data Pembookingan</h3>
           <table class="table table-striped">

            <div class="row mb-3 mt-3">
                <div class="col-md-6">
                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#bookingcreate">Tambah Pembookingan</a>
                </div>
                <a href="/booking" class="btn btn-primary{{ !request()->has('status') ? 'active' : '' }}"
                    style="margin-right: 12px">Semua</a>
                <a href="/booking?status=Tunggu" class="btn btn-primary{{ request('status') == 'Tunggu' ? 'active' : '' }}"
                    style="margin-right: 12px">Tunggu</a>
                <a href="/booking?status=Disetujui" class="btn btn-primary{{ request('status') == 'Disetujui' ? 'active' : '' }}"
                    style="margin-right: 12px">Disetujui</a>
                <a href="/booking?status=Ditolak" class="btn btn-primary{{ request('status') == 'Ditolak' ? 'active' : '' }}"
                    style="margin-right: 12px">Ditolak</a>
                <a href="/booking?status=Selesai" class="btn btn-primary{{ request('status') == 'Selesai' ? 'active' : '' }}"
                    style="margin-right: 12px">Selesai</a>
                <br>


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
                @foreach ($booking as $item)
                 <tr>
                     <td> {{ $loop->iteration}}</td>
                     <td> {{ $item->pengguna->nama}}</td>
                     <td> {{ $item->produk->jenis}}</td>
                     <td> {{ $item->jumlah_produk}}</td>
                     <td> RP. {{ number_format($item->total_harga)}}- </td>
                     <td> {{ $item->tanggal_booking}}</td>
                     <td> {{ $item->status}}</td>
                     <td class="text-center">
                        <a href="#bookingshow{{ $item->id }}" class="btn btn-info btn-sm" data-toggle="modal" data-bs-toggle="modal">Detail</a>
                        <form action="/booking/{{ $item->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm ml-2" id="delete">Hapus</button>
                        </form>

                    </td>

                </tr>
                @endforeach
            </tbody>
           </table>

           {!! $booking->links() !!}
        </div>
    </div>
    @include('booking.modal_create')
    @include('booking.modal_show')

@endsection
