
@foreach ($listPengguna as $item)
<div class="modal fade" id="penggunaedit{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="penggunaedit"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="penggunaedit{{ $item->id }}">DETAIL PELANGGAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form action="/pengguna/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-group mt-1 mb-3">
                                <label for="name">Nama</label>
                                <input type="input" class="form-control @error('name')is-invalid
                                @enderror"
                                    id="name" name="name" value="{{ old('name') ?? $item->name}}" placeholder=" Masukkan Nama">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                            <div class="form-group mt-1 mb-3">
                                <label for="nik">NIK</label>
                                <input type="input" class="form-control @error('nik')is-invalid
                                @enderror"
                                    id="nik" name="nik" value="{{ old('nik') ?? $item->nik}}" placeholder=" Masukkan NIK">
                                <span class="text-danger">{{ $errors->first('nik') }}</span>
                            </div>
                            <div class="form-group mt-1 mb-3">
                                <label for="email">Email</label>
                                <input type="input" class="form-control @error('email')is-invalid
                                @enderror"
                                    id="email" name="email" value="{{ old('email') ?? $item->email}}" placeholder=" Masukkan Email">
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="form-group mt-1 mb-3">
                                <label for="password">Password</label>
                                <input type="input" class="form-control @error('password')is-invalid
                                @enderror"
                                    id="password" name="password" value="{{ old('password') ?? $item->password}}" placeholder=" Masukkan password">
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            </div>

                            <button type="submit" class="btn btn-primary" id="submit">Update</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
