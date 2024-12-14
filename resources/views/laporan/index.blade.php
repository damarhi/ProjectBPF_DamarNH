@extends('layouts.app_tiny_laporan')
@section('content')
<h3>LAPORAN DATA PENJUALAN GAS</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th width="1%">NO</th>
            <th>NIK</th>
            <th>NAMA</th>
            <th>PRODUK</th>
            <th>JUMLAH</th>
            <th>TANGGAL TRANSAKSI</th>
            <th>TOTAL HARGA</th>
            <th>MODAL</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($models as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->pengguna->nik }}</td>
            <td>{{ $item->pengguna->nama }}</td>
            <td>{{ $item->produk->jenis }}</td>
            <td>{{ $item->jumlah_produk }}</td>
            <td>{{ $item->tanggal_transaksi }}</td>
            <td>RP. {{ number_format($item->total_harga) }}</td>
            <td>RP. {{ number_format($item->produk->harga_asli * $item->jumlah_produk) }}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="7">Total Pendapatan    :</td>
            <td>RP. {{ number_format($models->sum('total_harga')) }}</td>
        </tr>
        <tr>
            <td colspan="7">Total Modal         :</td>
            <td>RP. {{ number_format($models->sum(function ($item) {
                return $item->produk->harga_asli * $item->jumlah_produk;
            })) }}</td>
        </tr>
        <tr>
            <td colspan="7">Laba Bersih         :</td>
            <td>RP. {{ number_format($models->sum('total_harga') - $models->sum(function ($item) {
                return $item->produk->harga_asli * $item->jumlah_produk;
            })) }}</td>
        </tr>
    </tfoot>
</table>
@endsection
