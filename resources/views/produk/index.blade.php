@extends('layouts.app_tiny',['title'=> 'Data Pasien'])
@section('content')
<div class="row">
    <div class="row mb-3 mt-3">
        <div class="col-md-6">
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
                                <img src="{{ Storage::url($item->foto) }}" width="200px" height="200px"
                                    alt="">
                            </a>
                        @endif

                        </div>
                        <div class="card-text my-2">
                            <strong class="card-title my-0">{{ $item->jenis }}</strong>
                            <p class="small text-muted mb-0">Harga Asli: {{ $item->harga_asli }}</p>
                            <p class="small">Harga Jual: {{ $item->harga_jual }}</p>
                            <p class="small text-muted mb-0">Stok: {{ $item->stok_sekarang }}</p>
                        </div>
                    </div> <!-- ./card-text -->
                    <div class="card-footer">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto">
                                <small>
                                    <span class="dot dot-lg bg-success mr-1"></span> Online
                                </small>
                            </div>
                            <div class="col-auto">
                                <div class="file-action">
                                    <button type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted sr-only">Action</span>
                                    </button>
                                    <div class="dropdown-menu m-2">
                                        <a class="dropdown-item" href="#"><i class="fe fe-meh fe-12 mr-4"></i>Profile</a>
                                        <a class="dropdown-item" href="#"><i class="fe fe-message-circle fe-12 mr-4"></i>Chat</a>
                                        <a class="dropdown-item" href="#"><i class="fe fe-mail fe-12 mr-4"></i>Contact</a>
                                        <a class="dropdown-item" href="#"><i class="fe fe-delete fe-12 mr-4"></i>Delete</a>
                                    </div>
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
@endsection
