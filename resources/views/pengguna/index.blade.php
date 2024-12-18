@extends('layouts.app_tiny',['title'=> 'Data Pelanggan'])
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h3>Data Pelanggan</h3>
                    <form class="d-flex" action="">
                        <div class="input-group" style="width: 400px;">
                            <input type="text" name="q" class="form-control" placeholder="Cari Nama atau NIK Pelanggan"
                                value="{{ request('q') }}">
                            <button type="submit" class="btn btn-primary btn-sm">CARI</button>
                        </div>
                    </form>
                </div>
           <table class="table table-striped">
            <div class="row mb-4 mt-4">
                <div class="col-md-6">
                    <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".modal-right">Pelanggan Baru</a>
                </div>
            </div>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Tanggal Buat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listPengguna as $item)
                @if ($item->role == 'user')
                 <tr>
                     <td> {{ $loop->iteration}}</td>
                     <td> {{ $item->name}}</td>
                     <td> {{ $item->nik}}</td>
                     <td> {{ $item->created_at }}</td>
                     <td class="text-left">
                        <a href="#penggunaedit{{ $item->id }}" class="btn btn-info btn-sm" data-toggle="modal" data-bs-toggle="modal">Edit</a>
                        <form action="/pengguna/{{ $item->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm ml-2" id="delete">Hapus</button>
                        </form>

                    </td>

                </tr>
                @endif
                @endforeach
            </tbody>
           </table>

           {!! $listPengguna->links() !!}
        </div>
    </div>
    @include('pengguna.modal_create')
    @include('pengguna.modal_edit')


@endsection
