
    @foreach ($booking as $item)
        <div class="modal fade" id="bookingshow{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="bookingshow"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bookingshow{{ $item->id }}">DETAIL PEMBOOKINGAN</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"> Ubah Status Pembookingan</h5>
                                <b>{{ strtoupper($item->User->name) }}</b>
                                <table>
                                <tr>
                                    <td>Pelanggan  </td>
                                    <td>: </td>
                                    <td>{{ $item->User->name}}</td>
                                </tr>
                                <tr>
                                    <td>NIK  </td>
                                    <td>: </td>
                                    <td>{{ $item->User->nik}}</td>
                                </tr>
                                <tr>
                                    <td>Jenis : </td>
                                    <td>: </td>
                                    <td>{{ $item->produk->jenis}}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Produk : </td>
                                    <td>: </td>
                                    <td>{{ $item->jumlah_produk}}</td>
                                </tr>
                                <tr>
                                    <td>Total Harga : </td>
                                    <td>: </td>
                                    <td> RP. {{ number_format($item->total_harga)}}- </td>
                                </tr>
                                <tr>
                                    <td> Tanggal Booking </td>
                                    <td>: </td>
                                    <td> {{ $item->tanggal_booking}}</td>
                                </tr>
                             </table>

                                <form action="/booking/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="form-group mt-1 mb-3">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control js-example-basic-single">
                                            <option value="" disabled {{ $item->status == null ? 'selected' : '' }}>
                                                -----
                                                Pilih Stok ------</option>
                                            <option value="Disetujui" {{ $item->status == 'Disetujui' ? 'selected' : '' }}>
                                                Disetujui</option>
                                            <option value="Ditolak" {{ $item->status == 'Ditolak' ? 'selected' : '' }}>
                                                Ditolak
                                            </option>
                                            <option value="Selesai" {{ $item->status == 'Selesai' ? 'selected' : '' }}>
                                                Selesai
                                            </option>
                                            <option value="Tunggu" {{ $item->status == 'Tunggu' ? 'selected' : '' }}>Tunggu
                                            </option>
                                        </select>
                                        <span class="text-danger">{{ $errors->first('status') }}</span>
                                    </div>


                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>

                                        <textarea name="deskripsi" class="form-control" rows="3">{{ $item->deskripsi }}</textarea>

                                        <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
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
