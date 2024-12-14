
<div class="modal fade modal-right modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">PELANGGAN BARU</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">TAMBAH PELANGGAN</h5>
                        <form action="/pengguna" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-1 mb-3">
                                <label for="nama">Nama Pelanggan</label>
                                <input type="text" class="form-control @error('nama')is-invalid @enderror"
                                    id="nama" name="nama" value="{{ old('nama') }}"
                                    placeholder="Masukkan Nama">
                                <span class="text-danger">{{ $errors->first('nama') }}</span>
                            </div>
                            <div class="form-group mt-1 mb-3">
                                <label for="nik">NIK</label>
                                <input type="text" class="form-control @error('nik')is-invalid @enderror"
                                    id="nik" name="nik" value="{{ old('nik') }}"
                                    placeholder="Masukkan NIK Pelanggan">
                                <span class="text-danger">{{ $errors->first('nik') }}</span>
                            </div>
                            <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">keluar</button>
                            <button type="submit" class="btn mb-2 btn-primary" id="submit">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
