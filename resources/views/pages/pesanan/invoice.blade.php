@extends('layouts.dashboard.app')

@section('title')
<title>Medicine</title>
@endsection

@section('content')

<div class="container-fluid">
    <div class="card overflow-hidden invoice-application">

        <div class="d-flex">
            <div class="w-100 w-xs-100 chat-container">
                <div class="invoice-inner-part h-100">
                    <div class="invoiceing-box">
                        <div class="invoice-header d-flex align-items-center border-bottom p-3">
                            <h4 class="font-medium text-uppercase mb-0">Invoice #{{ $data->id }}</h4>
                            <div class="ms-auto">
                                <h4 class="invoice-number"></h4>
                            </div>
                        </div>
                        <div class="p-3" id="custom-invoice">
                            <div class="invoice-123" id="printableArea">
                                <div class="row pt-3">
                                    <div class="col-md-12">
                                        <div class="">
                                            <address>
                                                <h6>&nbsp;From,</h6>
                                                <h6 class="fw-bold">&nbsp;Medicine</h6>
                                                <p class="ms-1">
                                                    Jl. Akses UI, <br />Depok,
                                                    <br />Jawa Barat - 16434
                                                </p>
                                            </address>
                                        </div>
                                        <div class="text-end">
                                            <address>
                                                <h6>To,</h6>
                                                <h6 class="fw-bold invoice-customer">
                                                    {{ $data->user->first_name }} {{ $data->user->last_name }}
                                                </h6>
                                                <p class="ms-4">
                                                    {{ $data->user->address }}
                                                </p>
                                                <p class="mt-4 mb-1">
                                                    <span>Invoice Date :</span>
                                                    <i class="ti ti-calendar"></i>
                                                    {{ date('d M Y \J\a\m H:i', strtotime($data->created_at)) }}
                                                </p>
                                            </address>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive mt-5" style="clear: both">
                                            <table class="table table-hover">
                                                <thead>
                                                    <!-- start row -->
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th>Nama Obat</th>
                                                        <th class="text-end">Jumlah</th>
                                                        <th class="text-end">Harga Barang</th>
                                                        <th class="text-end">Total</th>
                                                        <th class="text-end">Waktu Pengambilan</th>
                                                    </tr>
                                                    <!-- end row -->
                                                </thead>
                                                <tbody>
                                                    <!-- start row -->
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <td>{{ $data->obat->nama }} ({{ $data->obat->jenis }})</td>
                                                        <td class="text-end">{{ $data->jumlah }}</td>
                                                        <td class="text-end">{{ "Rp".number_format($data->obat->harga,2,',','.') }}</td>
                                                        <td class="text-end">{{ "Rp".number_format($data->total_harga,2,',','.') }}</td>
                                                        <td>{{ date('d M Y \J\a\m H:i', strtotime($data->waktu_ambil)) }}</td>
                                                    </tr>
                                                    <!-- end row -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="pull-right mt-4 text-end">
                                            <h3><b>Total :</b> {{ "Rp".number_format($data->total_harga,2,',','.') }}</h3>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
