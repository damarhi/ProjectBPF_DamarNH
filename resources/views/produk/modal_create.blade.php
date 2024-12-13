<form action="/produk" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="produkcreate" tabindex="-1" role="dialog" aria-labelledby="produkcreate" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="produkcreate"> TAMBAH PRODUK BARU</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group mt-1 mb-3">
                        <label for="jenis">Berat Gas (kg)</label>
                        <input type="input" class="form-control @error('jenis')is-invalid
                        @enderror" id="jenis" name="jenis" value="{{ old('jenis') }}" placeholder=" Masukkan Berat Gas">
                        <span class="text-danger">{{ $errors->first('jenis') }}</span>
                    </div>

                    <div class="form-group mt-1 mb-3">
                        <label for="harga_asli">Harga Asli</label>
                        <input type="number"
                            class="form-control @error('harga_asli')is-invalid @enderror" id="harga_asli"
                            name="harga_asli" value="{{ old('harga_asli') }}" placeholder="Masukkan Harga Asli">
                        <span class="text-danger">{{ $errors->first('harga_asli') }}</span>
                    </div>

                    <div class="form-group mt-1 mb-3">
                        <label for="harga_jual">Harga Jual</label>
                        <input type="number"
                            class="form-control @error('harga_jual')is-invalid @enderror" id="harga_jual"
                            name="harga_jual" value="{{ old('harga_jual') }}" placeholder="Masukkan Harga Jual">
                        <span class="text-danger">{{ $errors->first('harga_jual') }}</span>
                    </div>

                    <div class="form-group mt-1 mb-3">
                        <label for="stok_sekarang">Stok Produk</label>
                        <input type="number"
                            class="form-control @error('stok_sekarang')is-invalid @enderror" id="stok_sekarang"
                            name="stok_sekarang" value="{{ old('stok_sekarang') }}" placeholder="Masukkan Stok Produk">
                        <span class="text-danger">{{ $errors->first('stok_sekarang') }}</span>
                    </div>

                    <div class="form-group mt-1 mb-3">
                        <label for="foto">Foto Pasien (jpg, jpeg, png) </label>
                        <input type="file" class="form-control @error('foto')is-invalid
                        @enderror"id="foto" name="foto" value="{{ old('foto') }}" placeholder=" Masukkan foto">
                        <span class="text-danger">{{ $errors->first('foto') }}</span>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary" id="submit">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</form>
