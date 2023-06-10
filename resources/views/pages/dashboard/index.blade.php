@extends('layouts.dashboard.app')

@section('title')
<title>Medicine</title>
@endsection

@section('content')

<div class="container-fluid note-has-grid">
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8 mt-3">Info Obat</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">Temukan Informasi Terpercaya tentang
                                Obat-obatan: Efek, Penggunaan, dan Keamanannya dalam Pengobatan pada Info Obat - Sumber
                                Pengetahuan Terkini untuk Kesehatan Anda.</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row">
        <li class="nav-item">
            <a href="javascript:void(0)" class="
                nav-link

                note-link
                d-flex
                align-items-center
                justify-content-center
                active
                px-3 px-md-3
                me-0 me-md-2 text-body-color
              " id="all-category">
                <i class="ti ti-list fill-white me-0 me-md-1"></i>
                <span class="d-none d-md-block font-weight-medium">Obat</span>
            </a>
        </li>
        <li class="nav-item ms-auto">
            <form action="{{ route('medicine.index') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Nama Obat" name="search"
                        value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary"><i
                            class="ti ti-search fill-white me-0 me-md-1"></i></button>
                </div>
            </form>
        </li>
    </ul>
    <div class="tab-content">
        <div id="note-full-container" class="note-has-grid row">

            @foreach ($data as $obat)
            <div class="col-md-4 single-note-item all-category">
                <div class="card card-body">
                    <span class="side-stick"></span>
                    <h6 class="note-title text-truncate w-75 mb-0">{{ $obat->nama }}</h6>
                    <p class="note-date fs-2">{{ $obat->jenis }}</p>
                    <div class="note-content">
                        <p class="note-inner-content">{{ $obat->deskripsi }}</p>
                    </div>
                </div>
            </div>
            @endforeach


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
