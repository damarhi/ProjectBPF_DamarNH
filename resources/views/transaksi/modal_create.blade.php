<form action="/transaksi" method="POST">
    @csrf
    <div class="modal fade" id="transaksicreate" tabindex="-1" role="dialog" aria-labelledby="transaksicreate"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" style=" transform: translateX(-20px);" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="transaksicreate">TAMBAH TRANSAKSI BARU</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mt-3">
                        <label for="tanggal_transaksi">Tanggal Transaksi</label>
                        <input type="date" name="tanggal_transaksi" class="form-control"
                            value="{{ old('tanggal_transaksi') ?? date('Y-m-d') }}">
                        <span class="text-danger">{{ $errors->first('tanggal_transaksi') }}</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="user_id">Nama Pelanggan |
                            <a href="" data-toggle="modal" data-target=".modal-right">Pelanggan Baru</a>
                        </label>
                        <select name="user_id" class="form-control select2" data-placeholder="Cari nama pelanggan">
                            <option value="">-- Pilih Pelanggan --</option>
                            @foreach ($listPengguna as $item)
                                @if ($item->role == 'user')
                                    <option value="{{ $item->id }}" @selected(old('user_id') == $item->id)>
                                        {{ $item->nik }} - {{ $item->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('user_id') }}</span>
                    </div>
                    <div>
                        Setelah menambahkan pelanggan baru, tekan f5
                    </div>
                    <div class="form-group mt-3 mb-3">
                        <label for="produk_id">Produk</label>
                        <select id="produk_id" name="produk_id" class="form-control">
                            <option value="">Pilih Produk</option>
                            @foreach ($listProduk as $produk)
                                <option value="{{ $produk->id }}" data-harga="{{ $produk->harga_jual }}">
                                    {{ $produk->jenis }}
                                </option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('produk_id') }}</span>
                    </div>
                    <div class="form-group mt-3 mb-3">
                        <label for="jumlah_produk">Jumlah Produk</label>
                        <input type="number" id="jumlah_produk" name="jumlah_produk" class="form-control"
                            value="{{ old('jumlah_produk') }}">
                        <span class="text-danger">{{ $errors->first('jumlah_produk') }}</span>
                    </div>
                    <div class="form-group mt-3 mb-3">
                        <label for="total_harga">Total Harga</label>
                        <input type="number" id="total_harga" name="total_harga" class="form-control" readonly>
                        <span class="text-danger">{{ $errors->first('total_harga') }}</span>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const produkSelect = document.getElementById('produk_id');
                            const jumlahInput = document.getElementById('jumlah_produk');
                            const totalHargaInput = document.getElementById('total_harga');

                            function calculateTotal() {
                                const selectedOption = produkSelect.options[produkSelect.selectedIndex];
                                const hargaJual = selectedOption.getAttribute('data-harga');
                                const jumlahProduk = parseFloat(jumlahInput.value) || 0;

                                if (hargaJual) {
                                    totalHargaInput.value = jumlahProduk * parseFloat(hargaJual);
                                } else {
                                    totalHargaInput.value = '';
                                }
                            }

                            produkSelect.addEventListener('change', calculateTotal);
                            jumlahInput.addEventListener('input', calculateTotal);
                        });
                    </script>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary" id="submit">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</form>
@include('transaksi.modal_createpengguna')
