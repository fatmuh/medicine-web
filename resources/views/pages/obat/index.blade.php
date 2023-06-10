@extends('layouts.dashboard.app')

@section('title')
<title>Medicine</title>
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
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Paracetamol</td>
                    <td>1 Kaplet</td>
                    <td>10.000</td>
                    <td>Tersedia</td>
                    <td>10</td>
                  </tr>
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
