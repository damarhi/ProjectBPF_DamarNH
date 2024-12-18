@foreach ($produk as $item)
    <div class="modal fade" id="hargaedit{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="hargaedit"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hargaedit{{ $item->id }}">TAMBAH PRODUK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">TAMBAH STOK</h5>
                            <b>{{ strtoupper($item->jenis) }}</b>
                            <form action="/produk/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="form-group mt-1 mb-3">
                                    <label for="stok_sekarang">Harga Asli</label>
                                    <input type="number" class="form-control @error('harga_asli')is-invalid
                                    @enderror" id="harga_asli" name="harga_asli" value="{{ old('harga_asli') ?? $item->harga_asli }}" placeholder="Ubah Harga Asli">
                                    <span class="text-danger">{{ $errors->first('harga_asli')  }}</span>
                                </div>
                                <div class="form-group mt-1 mb-3">
                                    <label for="harga_jual">Harga Jual</label>
                                    <input type="number" class="form-control @error('harga_jual')is-invalid
                                    @enderror" id="harga_jual" name="harga_jual" value="{{ old('harga_jual') ?? $item->harga_jual }}" placeholder="Ubah Harga Jual">
                                    <span class="text-danger">{{ $errors->first('harga_jual')  }}</span>
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
