@extends('layouts.app_tiny',['title'=> 'Data Transaksi Pelanggan'])
@section('content')
    <div class="card">
        <div class="card-body">
           <h3>Data Transaksi Pelanggan</h3>
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
                    <th>Tanggal Transaksi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $item)
                 <tr>
                     <td> {{ $loop->iteration}}</td>
                     <td> {{ $item->pengguna->nama}}</td>
                     <td> {{ $item->pengguna->nik}}</td>
                     <td> {{ $item->produk->jenis}}</td>
                     <td> {{ $item->jumlah_produk}}</td>
                     <td> RP. {{ number_format($item->total_harga)}}- </td>
                     <td> {{ $item->tanggal_transaksi}}</td>
                     <td class="text-center">
                        <a href="/transaksi/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
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
@endsection
