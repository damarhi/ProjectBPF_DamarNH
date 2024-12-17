@foreach ($booking as $item)
    <div class="modal fade" id="detailbooking{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="detailbookingLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="detailbookingLabel">DETAIL PEMBOOKINGAN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ubah Status Pembookingan</h5>
                            <b>{{ strtoupper($item->User->name) }}</b>
                            <table class="table">
                                <tr>
                                    <td>Pelanggan</td>
                                    <td>: </td>
                                    <td>{{ $item->User->name }}</td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td>: </td>
                                    <td>{{ $item->User->nik }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis</td>
                                    <td>: </td>
                                    <td>{{ $item->produk->jenis }}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Produk</td>
                                    <td>: </td>
                                    <td>{{ $item->jumlah_produk }}</td>
                                </tr>
                                <tr>
                                    <td>Total Harga</td>
                                    <td>: </td>
                                    <td>RP. {{ number_format($item->total_harga) }}-</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Booking</td>
                                    <td>: </td>
                                    <td>{{ $item->tanggal_booking }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>: </td>
                                    <td>{{ $item->status }}</td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>: </td>
                                    <td>{{ $item->deskripsi }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
