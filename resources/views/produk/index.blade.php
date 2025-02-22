@extends('layouts.app_tiny', ['title' => 'Data Produk'])

@section('content')
    <div class="row">
        <div class="row mb-3 mt-3">
            <div class="col-md-12 text-right">
                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#produkcreate">Tambah
                    Produk</a>
            </div>
        </div>

        <div class="col-md-12">
            <div class="d-flex flex-wrap justify-content-start">
                @foreach ($produk as $item)
                    <div class="card shadow mb-4 mr-4" style="width: 18rem;">
                        <form action="/produk/{{ $item->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="button" class="close" id="delete" aria-label="Close"
                                style="position: absolute; top: 2; right: 3; z-index: 10;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </form>
                        <div class="card-body text-center">
                            <div class="avatar avatar-lg mt-4">
                                @if ($item->foto)
                                    <a href="{{ Storage::url($item->foto) }}" target="blank">
                                        <img src="{{ Storage::url($item->foto) }}" class="img-fluid rounded"
                                            style="width: 150px; height: 150px; object-fit: cover;" alt="">
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
                                <div class="col-6 text-start">
                                    <a href="#produkedit{{ $item->id }}" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-bs-toggle="modal" style="float: left">Atur Stok</a>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="#hargaedit{{ $item->id }}" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-bs-toggle="modal" style="float: right">Ubah Harga</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('produk.modal_create')
    @include('produk.modal_edit')
    @include('produk.modal_harga')
@endsection
