<div class="modal fade" id="ModalAdd{{ $obat->id }}" tabindex="-1" role="dialog" aria-labelledby="tambahobatmodalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <div class="modal-header bg-primary">
                <h6 class="modal-title text-white">Pesan Obat</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="notes-box">
                    <div class="notes-content">
                        <form class="row g-3" action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">

                                <div class="col-md-6 mt-3">
                                    <div class="note-title">
                                        <label>Nama Obat</label>
                                        <input type="text" class="form-control" value="{{ old('name', $obat->nama) }}" readonly/>
                                        <input type="hidden" class="form-control" name="obat_id" value="{{ old('id', $obat->id) }}"/>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="note-description">
                                        <label>Jenis Obat</label>
                                        <input type="text" class="form-control" value="{{ old('jenis', $obat->jenis) }}" readonly/>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6 mt-2">
                                    <div class="note-title">
                                        <label>Satuan</label>
                                        <input type="text" class="form-control"
                                            value="{{ old('satuan', $obat->satuan) }}" readonly/>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <div class="note-description">
                                        <label>Harga</label>
                                        <input type="number" class="form-control"
                                            value="{{ old('harga', $obat->harga) }}" readonly/>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6 mt-2">
                                    <div class="note-title">
                                        <label>Jumlah</label>
                                        <input type="number" class="form-control" name="jumlah"
                                            value="{{ old('jumlah') }}" placeholder="Masukan Jumlah"/>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <div class="note-description">
                                        <label>Waktu Ambil</label>
                                        <input type="datetime-local" class="form-control" name="waktu_ambil"
                                            value="{{ old('waktu_ambil') }}"/>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-12 mt-4 text-center">
                                    <div class="note-title">
                                        <img src="https://www.unisba.ac.id/wp-content/uploads/2022/11/logo-bsi-1.png" alt="" width="80px" class="mb-2"><br>71528132823 a.n. R. Zidan Sholaha
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6 mt-2">
                                    <div class="note-title">
                                        <label>Tipe Pembayaran</label>
                                        <select class="form-select mr-sm-2" name="type_of_payment" required>
                                            <option>---Silahkan Pilih---</option>
                                            <option value="COD">COD</option>
                                            <option value="Transfer">Transfer</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <div class="note-description">
                                        <label>Bukti Pembayaran</label>
                                        <input type="file" class="form-control" name="proof_of_payment"/>
                                    </div>
                                </div>

                            </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Pesan</button>
            </div>
            </form>
        </div>
    </div>
</div>
