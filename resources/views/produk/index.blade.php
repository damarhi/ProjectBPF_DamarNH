@extends('layouts.app_tiny',['title'=> 'Data Pasien'])
@section('content')
<div class="row">
    <div class="row mb-3 mt-3">
        <div class="col-md-12 text-right">
            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#produkcreate">Tambah Produk</a>
        </div>
    </div>

    <div class="col-md-12">
        <div class="d-flex flex-wrap justify-content-start">
            @foreach($produk as $item)
                <div class="card shadow mb-4 mr-4" style="width: 18rem;">
                    <div class="card-body text-center">
                        <div class="avatar avatar-lg mt-4">
                            @if ($item->foto)
                                <a href="{{ Storage::url($item->foto) }}" target="blank">
                                    <img src="{{ Storage::url($item->foto) }}" class="img-fluid rounded" style="width: 150px; height: 150px; object-fit: cover;" alt="">
                                </a>
                            @endif
                        </div>
                        <div class="card-text my-2">
                            <strong class="card-title my-0">{{ $item->jenis }}</strong>
                            <p class="small text-muted mb-0">Harga Asli: {{ $item->harga_asli }}</p>
                            <p class="small">Harga Jual: {{ $item->harga_jual }}</p>
                            <p class="small text-muted mb-0">Stok : {{ $item->stok_sekarang }}</p>
                            <p class="small text-muted mb-0">Terjual: {{ $item->stok_terjual }}</p>
                        </div>
                    </div> <!-- ./card-text -->
                    <div class="card-footer">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto">
                                <a href="#produkshow{{$item->id}}" class="btn btn-info btn-sm" data-toggle="modal" data-bs-toggle="modal">Detail</a>
                            </div>
                            <div class="col-auto">
                                <div class="file-action">
                                    <a href="#produkedit{{ $item->id }}" class="btn btn-info btn-sm" data-toggle="modal" data-bs-toggle="modal">Atur Stok</a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- /.card-footer -->
                </div>
            @endforeach
        </div>
    </div>
</div>
@include('produk.modal_create')
@include('produk.modal_edit')
@endsection
