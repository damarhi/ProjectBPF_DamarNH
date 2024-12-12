@extends('layouts.app_tiny', ['title' => 'Tambah Transaksi Baru'])
@section('content')
    <div class="card">
        <div class="card-header">TAMBAH TRANSAKSI BARU</div>
        <div class="card-body">
            <form action="/transaksi" method="POST">
                @csrf
                <div class="form-group mt-3">
                    <label for="tanggal_transaksi">Tanggal Transaksi</label>
                    <input type="date" name="tanggal_transaksi" class="form-control"
                        value="{{ old('tanggal_transaksi') ?? date('Y-m-d') }}">
                    <span class="text-danger">{{ $errors->first('tanggal_transaksi') }}</span>
                </div>
                <div class="form-group mt-3">
                    <label for="pengguna_id">Nama Pelanggan |
                        <a href="/pengguna/create" target="blank">pelanggan Baru</a>
                    </label>
                    <select name="pengguna_id" class="form-control select2" data-placeholder="Cari nama pelanggan">
                        <option value="">-- Pilih Pelanggan --</option>
                        @foreach ($listPengguna as $item)
                            <option value="{{ $item->id }}" @selected(old('pengguna_id') == $item->id)>
                                {{ $item->nik }} - {{ $item->nama }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('pengguna_id') }}</span>
                </div>
                <div>
                    Setelah menambahkan pelanggan baru, tekan f5
                </div>
                <div class="form-group mt-3 mb-3">
                    <label for="produk_id">Produk</label>
                    <select id="produk_id" name="produk_id" class="form-control">
                        <option value="">Pilih Produk</option>
                        @foreach($listProduk as $produk)
                            <option value="{{ $produk->id }}" data-harga="{{ $produk->harga_jual }}">
                                {{ $produk->jenis }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('produk_id') }}</span>
                </div>

                <div class="form-group mt-3 mb-3">
                    <label for="jumlah_produk">Jumlah Produk</label>
                    <input type="number" id="jumlah_produk" name="jumlah_produk" class="form-control" value="{{ old('jumlah_produk') }}">
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

                <div class="form-group mt-3 mb-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
