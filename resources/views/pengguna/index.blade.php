@extends('layouts.app_tiny',['title'=> 'Data Pasien'])
@section('content')
    <div class="card">
        <div class="card-body">
           <h3>Data Pasien</h3>
           <table class="table table-striped">
            <div class="row mb-4 mt-4">
                <div class="col-md-6">
                    <a href="/pasien/create" class="btn btn-primary btn-sm">Tambah Pasien</a>
                </div>
            </div>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>nik</th>
                    <th>email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengguna as $item)
                 <tr>
                     <td> {{ $loop->iteration}}</td>
                     <td> {{ $item->nama}}</td>
                     <td> {{ $item->nik}}</td>
                     <td> {{ $item->email }}</td>
                     <td class="text-left">
                        <a href="/pasien/{{ $item->id }}/edit" class="btn btn-warning btn-sm ml-2">Edit</a>
                        <form action="/pasien/{{ $item->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm ml-2"
                                onclick="return confirm('yakin ingin menghapus data?')">Hapus</button>
                        </form>

                    </td>

                </tr>
                @endforeach
            </tbody>
           </table>

           {!! $pengguna->links() !!}
        </div>
    </div>
@endsection
