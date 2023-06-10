@extends('layouts.dashboard.app')

@section('title')
<title>Medicine - Pesan Obat</title>
@endsection

@section('content')

<div class="container-fluid">
    <div class="card">
      <div class="card-body">
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
                        <td><a href="" class="btn btn-light-success text-success" data-bs-toggle="modal" data-bs-target="#ModalAdd{{ $obat->id }}">
                            <i class="ti ti-shopping-cart fs-5 text-center"></i>
                        </a></td>
                    </tr>
                    @include('pages.obat.add')
                    @endforeach
                </tbody>
            </table>
        </p>
      </div>
    </div>
  </div>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('.datatab').DataTable();
    } );
</script>
@endsection
