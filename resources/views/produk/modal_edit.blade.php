@foreach ($produk as $item)
    <div class="modal fade" id="produkedit{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="produkedit"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="produkedit{{ $item->id }}">TAMBAH PRODUK</h5>
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
                                    <label for="stok_sekarang">Stok Sekarang</label>
                                    <input type="number" class="form-control @error('stok_sekarang')is-invalid
                                    @enderror" id="stok_sekarang" name="stok_sekarang" value="{{ old('stok_sekarang') ?? $item->stok_sekarang }}" placeholder="Tambah Stok">
                                    <span class="text-danger">{{ $errors->first('stok_sekarang')  }}</span>
                                </div>
                                <div class="form-group mt-1 mb-3">
                                    <label for="stok_terjual">Stok Terjual</label>
                                    <input type="number" class="form-control @error('stok_terjual')is-invalid
                                    @enderror" id="stok_terjual" name="stok_terjual" value="{{ old('stok_terjual') ?? $item->stok_terjual }}" placeholder="Atur Stok Terjual">
                                    <span class="text-danger">{{ $errors->first('stok_terjual')  }}</span>
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
