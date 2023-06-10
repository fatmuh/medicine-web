<div class="modal fade" id="ModalEdit{{ $obat->id }}" tabindex="-1" role="dialog" aria-labelledby="tambahobatmodalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <div class="modal-header bg-primary">
                <h6 class="modal-title text-white">Ubah Data Obat</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="notes-box">
                    <div class="notes-content">
                        <form class="row g-3" action="{{ route('admin.obat.update', ['id' => $obat->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">

                                <div class="col-md-6 mt-3">
                                    <div class="note-title">
                                        <label>Nama Obat</label>
                                        <input type="text" class="form-control" name="nama" value="{{ old('name', $obat->nama) }}" />
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="note-description">
                                        <label>Jenis Obat</label>
                                        <input type="text" class="form-control" name="jenis" value="{{ old('jenis', $obat->jenis) }}" />
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6 mt-2">
                                    <div class="note-title">
                                        <label>Satuan</label>
                                        <input type="text" class="form-control" name="satuan"
                                            value="{{ old('satuan', $obat->satuan) }}" />
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <div class="note-description">
                                        <label>Harga</label>
                                        <input type="number" class="form-control" name="harga"
                                            value="{{ old('harga', $obat->harga) }}" />
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6 mt-2">
                                    <div class="note-title">
                                        <label>Status</label>
                                        <select class="form-select mr-sm-2" name="status" required>
                                            <option value="{{ old('status', $obat->status) }}">{{ $obat->status }} (Current)</option>
                                            <option value="Tersedia">Tersedia</option>
                                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <div class="note-description">
                                        <label>Stok</label>
                                        <input type="number" class="form-control" name="stok" value="{{ old('stok', $obat->stok) }}" />
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12 mt-2">
                                <div class="note-title">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" rows="3" name="deskripsi">{{ old('deskripsi', $obat->deskripsi) }}</textarea>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
            </form>
        </div>
    </div>
</div>
