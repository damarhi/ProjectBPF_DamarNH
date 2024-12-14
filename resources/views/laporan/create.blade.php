@extends('layouts.app_tiny')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">LAPORAN PENJUALAN</div>
                <div class="card-body">
                    <form action="/laporan" method="GET" target="_blank">
                        <div class="row mt-3">
                            <div class="form-group col-md-4">
                                <label for="tanggal_awal">Tanggal Awal</label>
                                <input type="date" name="tanggal_transaksi" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tanggal_akhir">Tanggal Akhir</label>
                                <input type="date" name="tanggal_transaksi" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="produk">Pilih produk</label>
                                <select name="produk_id" class="form-control">
                                    <option value="">-- Semua Data --</option>
                                    @foreach ($listProduk as $key => $val)
                                    <option value="{{ $key }}" @selected(old('produk_id')==$key)>
                                        {{ $val }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Cetak</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
