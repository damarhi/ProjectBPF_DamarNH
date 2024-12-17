<!-- Modal -->
@foreach ($listProduk as $item)
    <form action="/home" method="POST">
        @csrf
        <div class="modal fade" id="homebooking{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="homebooking" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="homebooking{{ $item->id }}">TAMBAH PEMBOOKINGAN</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mt-3">
                            <label for="tanggal_booking">Tanggal Booking</label>
                            <input type="date" name="tanggal_booking" class="form-control"
                                value="{{ old('tanggal_booking') ?? date('Y-m-d') }}">
                            <span class="text-danger">{{ $errors->first('tanggal_booking') }}</span>
                        </div>
                        <div class="form-group mt-3">
                            <label for="user_id">Nama Pelanggan</label>
                            <input type="text" id="user_name" class="form-control" value="{{ auth()->user()->name }}"
                                readonly>
                            <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
                        </div>
                        <input type="hidden" name="produk_id" id="produk_id" value="{{ $item->id ?? '' }}"
                            data-harga="{{ $item->harga_jual}}">
                        <input type="text" id="jenis" class="form-control" value="{{ $item->jenis ?? '' }}"
                            data-harga="{{ $item->harga_jual }}" readonly>

                        <div class="form-group mt-3 mb-3">
                            <label for="jumlah_produk">Jumlah Produk</label>
                            <input type="number" id="jumlah_produk" name="jumlah_produk" class="form-control"
                                value="{{ old('jumlah_produk') }}">
                            <span class="text-danger">{{ $errors->first('jumlah_produk') }}</span>
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Harga Satuan : Rp. {{ number_format($item->harga_jual) }}</label>

                        </div>

                        <div class="form-group mt-3 mb-3">
                            <label for="total_harga">Total Harga</label>
                            <input type="number" id="total_harga" name="total_harga" class="form-control" readonly>
                            <span class="text-danger">{{ $errors->first('total_harga') }}</span>
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Menangani semua modal dengan id dinamis
                                const modals = document.querySelectorAll('.modal');

                                modals.forEach((modal) => {
                                    const jumlahInput = modal.querySelector(
                                        'input[name="jumlah_produk"]'); // Input jumlah produk
                                    const totalHargaInput = modal.querySelector(
                                        'input[name="total_harga"]'); // Input total harga
                                    const produkIdInput = modal.querySelector(
                                        'input[name="produk_id"]'); // Hidden input produk ID
                                    const produkJenisInput = modal.querySelector(
                                        'input[id="jenis"]'); // Produk jenis untuk harga

                                    function calculateTotal() {
                                        const hargaJual = produkJenisInput.getAttribute(
                                            'data-harga'); // Mendapatkan harga jual dari atribut data
                                        const jumlahProduk = parseFloat(jumlahInput.value) ||
                                            0; // Nilai default 0 jika input kosong

                                        if (hargaJual) {
                                            totalHargaInput.value = jumlahProduk * parseFloat(
                                                hargaJual); // Menghitung total harga
                                        } else {
                                            totalHargaInput.value = ''; // Reset jika harga tidak ditemukan
                                        }
                                    }

                                    // Event listener untuk perubahan input jumlah dan produk
                                    jumlahInput.addEventListener('input', calculateTotal);
                                });
                            });
                        </script>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn mb-2 btn-secondary" data-bs-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary" id="submit">Booking</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endforeach
