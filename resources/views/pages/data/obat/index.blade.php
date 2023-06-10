@extends('layouts.dashboard.app')

@section('title')
<title>Medicine</title>
@endsection

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <button type="button" class="btn mb-1 btn-light-primary text-primary btn-lg px-4 fs-4 font-medium"
                    data-bs-toggle="modal" data-bs-target="#tambahobat">
                    Tambah Obat
                </button>
            </div>
            <h5 class="card-title fw-semibold mb-4">Data Obat</h5>
            <p class="mb-0">
                <table class="table datatab">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Obat</th>
                            <th>Jenis Obat</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Jumlah</th>
                            <th><i class="ti ti-settings"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $obat)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $obat->nama }}</td>
                            <td>{{ $obat->jenis }}</td>
                            <td>{{ $obat->satuan }}</td>
                            <td>{{ "Rp".number_format($obat->harga,2,',','.') }}</td>
                            <td>{{ $obat->status }}</td>
                            <td>{{ $obat->stok }}</td>
                            <td><a href="" class="btn btn-light-primary text-primary" data-bs-toggle="modal"
                                    data-bs-target="#ModalEdit{{ $obat->id }}">
                                    <i class="ti ti-pencil fs-5 text-center"></i>
                                </a>
                                <a href="" class="btn btn-light-danger text-danger" data-bs-toggle="modal"
                                    data-bs-target="#ModalDelete{{ $obat->id }}">
                                    <i class="ti ti-trash fs-5 text-center"></i>
                                </a></td>
                        </tr>
                        @include('pages.data.obat.edit')
                        @include('pages.data.obat.delete')
                        @endforeach
                    </tbody>
                </table>
            </p>
        </div>
    </div>
</div>

<!-- Modal Add notes -->
<div class="modal fade" id="tambahobat" tabindex="-1" role="dialog" aria-labelledby="tambahobatmodalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <div class="modal-header bg-primary">
                <h6 class="modal-title text-white">Tambah Obat</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="notes-box">
                    <div class="notes-content">
                        <form action="{{ route('admin.obat.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">

                                <div class="col-md-6 mt-2">
                                    <div class="note-title">
                                        <label>Nama Obat</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Nama Obat" />
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <div class="note-description">
                                        <label>Jenis Obat</label>
                                        <input type="text" class="form-control" name="jenis" placeholder="Jenis Obat" />
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6 mt-2">
                                    <div class="note-title">
                                        <label>Satuan</label>
                                        <input type="text" class="form-control" name="satuan"
                                            placeholder="Satuan Obat" />
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <div class="note-description">
                                        <label>Harga</label>
                                        <input type="number" class="form-control" name="harga"
                                            placeholder="Harga Obat" />
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6 mt-2">
                                    <div class="note-title">
                                        <label>Status</label>
                                        <select class="form-select mr-sm-2" name="status" required>
                                            <option selected="">Choose...</option>
                                            <option value="Tersedia">Tersedia</option>
                                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <div class="note-description">
                                        <label>Stok</label>
                                        <input type="number" class="form-control" name="stok" placeholder="Stok Obat" />
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12 mt-2">
                                <div class="note-title">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" rows="3" name="deskripsi"
                                        placeholder="Deskripsi Obat"></textarea>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('.datatab').DataTable();
    });

</script>
@endsection
