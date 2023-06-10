@extends('layouts.dashboard.app')

@section('title')
<title>Medicine</title>
@endsection

@section('content')

<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Pesanan Saya</h5>
        <p class="mb-0">
            <table class="table datatab">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Obat</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Waktu Pengambilan</th>
                        <th>Status</th>
                        <th><i class="ti ti-settings"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $order)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $order->obat->nama }}</td>
                        <td>{{ $order->jumlah }}</td>
                        <td>{{ "Rp".number_format($order->total_harga,2,',','.') }}</td>
                        <td>{{ date('d M Y \J\a\m H:i', strtotime($order->waktu_ambil)) }}</td>
                        <td>
                            @if ($order->status == 'Pending')
                                <span class="mb-1 badge bg-warning">Pending</span>
                            @elseif ($order->status == 'Processing')
                                <span class="mb-1 badge bg-primary">Processing</span>
                            @elseif ($order->status == 'Completed')
                                <span class="mb-1 badge bg-success">Completed</span>
                            @elseif ($order->status == 'Cancelled')
                                <span class="mb-1 badge bg-danger">Cancelled</span>
                            @endif
                        </td>
                        <td><a href="{{ route('medicine.invoice', ['id' => $order->id]) }}" class="btn btn-light-success text-success">
                            <i class="ti ti-receipt fs-5 text-center"></i>
                        </a></td>
                    </tr>
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
