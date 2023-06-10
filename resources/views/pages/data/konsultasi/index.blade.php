@extends('layouts.dashboard.app')

@section('title')
<title>Medicine - Data Konsultasi</title>
@endsection

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <button type="button" class="btn mb-1 btn-light-primary text-primary btn-lg px-4 fs-4 font-medium"
                    data-bs-toggle="modal" data-bs-target="#tambahkontak">
                    Tambah Kontak
                </button>
            </div>
            <h5 class="card-title fw-semibold mb-4">Data Konsultasi</h5>
            <p class="mb-0">
                <table class="table datatab">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Whatsapp</th>
                            <th><i class="ti ti-settings"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $contact)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $contact->nama }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td><a href="" class="btn btn-light-primary text-primary" data-bs-toggle="modal"
                                data-bs-target="#ModalEdit{{ $contact->id }}">
                                <i class="ti ti-pencil fs-5 text-center"></i>
                            </a>
                            <a href="" class="btn btn-light-danger text-danger" data-bs-toggle="modal"
                                data-bs-target="#ModalDelete{{ $contact->id }}">
                                <i class="ti ti-trash fs-5 text-center"></i>
                            </a></td>
                        </tr>
                        @include('pages.data.konsultasi.edit')
                        @include('pages.data.konsultasi.delete')
                        @endforeach
                    </tbody>
                </table>
            </p>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahkontak" tabindex="-1" role="dialog" aria-labelledby="tambahkontakmodalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <div class="modal-header bg-primary">
                <h6 class="modal-title text-white">Tambah Kontak</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="notes-box">
                    <div class="notes-content">
                        <form action="{{ route('admin.konsultasi.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">

                                <div class="col-md-6 mt-2">
                                    <div class="note-title">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Nama" />
                                    </div>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <div class="note-description">
                                        <label>Nomor Whatsapp</label>
                                        <input type="number" class="form-control" name="phone"
                                            placeholder="Nomor Whatsapp" />
                                    </div>
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

@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('.datatab').DataTable();
    });

</script>
@endsection
