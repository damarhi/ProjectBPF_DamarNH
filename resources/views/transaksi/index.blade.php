@extends('layouts.app_tiny',['title'=> 'Data Transaksi Pelanggan'])
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h3>Data Transaksi Pelanggan</h3>
                    <form class="d-flex" action="">
                        <div class="input-group" style="width: 400px;">
                            <input type="text" name="q" class="form-control" placeholder="Cari Nama atau NIK Pelanggan"
                                value="{{ request('q') }}">
                            <button type="submit" class="btn btn-primary btn-sm">CARI</button>
                        </div>
                    </form>
                </div>
           <table class="table table-striped">

            <div class="row mb-3 mt-3">
                <div class="col-md-6">
                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#transaksicreate">Tambah Transaksi</a>
                </div>

            </div>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Jenis Produk</th>
                    <th>Jumlah Produk</th>
                    <th>Total Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $item)
                 <tr>
                     <td> {{ $loop->iteration}}</td>
                     <td> {{ $item->User->name}}</td>
                     <td> {{ $item->User->nik}}</td>
                     <td> {{ $item->produk->jenis}}</td>
                     <td> {{ $item->jumlah_produk}}</td>
                     <td> RP. {{ number_format($item->total_harga)}}- </td>
                     <td class="text-center">
                        <a href="#transaksishow{{$item->id}}" class="btn btn-info btn-sm" data-toggle="modal" data-bs-toggle="modal">Detail</a>
                        <form action="/transaksi/{{$item->id}}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm ml-2" id="delete">Hapus</button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
           </table>

           {!! $transaksi->links() !!}
        </div>
    </div>
    @include('transaksi.modal_create')
    @include('transaksi.modal_show')

@endsection
