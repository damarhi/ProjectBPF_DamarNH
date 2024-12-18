@foreach ($transaksi as $item)
    <div class="modal fade" id="transaksishow{{ $item->id }}" tabindex="-1" role="dialog"
        aria-labelledby="transaksishow" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="transaksishow{{ $item->id }}">DETAIL TRANSAKSI {{ strtoupper($item->User->name) }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tanggal {{ $item->tanggal_transaksi }}</h5>
                            <table style="width: 100%">
                                <tr>
                                    <td>Pelanggan </td>
                                    <td>: </td>
                                    <td>{{ $item->User->name }}</td>
                                </tr>
                                <tr>
                                    <td>NIK </td>
                                    <td>: </td>
                                    <td>{{ $item->User->nik }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis  </td>
                                    <td>: </td>
                                    <td>{{ $item->produk->jenis }}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Produk  </td>
                                    <td>: </td>
                                    <td>{{ $item->jumlah_produk }}</td>
                                </tr>
                                <tr>
                                    <td>Total Harga  </td>
                                    <td>: </td>
                                    <td> RP. {{ number_format($item->total_harga) }}- </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
