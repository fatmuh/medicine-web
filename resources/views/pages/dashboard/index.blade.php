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
                <li class="breadcrumb-item" aria-current="page">Temukan Informasi Terpercaya tentang Obat-obatan: Efek, Penggunaan, dan Keamanannya dalam Pengobatan pada Info Obat - Sumber Pengetahuan Terkini untuk Kesehatan Anda.</li>
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
        <div class="input-group">
            <span class="input-group-text"><i class="ti ti-search fill-white me-0 me-md-1"></i></span>
            <input type="text" class="form-control" placeholder="Cari Nama Obat">
        </div>
      </li>
    </ul>
    <div class="tab-content">
      <div id="note-full-container" class="note-has-grid row">

        @foreach ($data as $obat)
        <div class="col-md-4 single-note-item all-category">
          <div class="card card-body">
            <span class="side-stick"></span>
            <h6 class="note-title text-truncate w-75 mb-0"> {{ $obat->nama }} </h6>
            <p class="note-date fs-2">{{ $obat->jenis }}</p>
            <div class="note-content">
              <p class="note-inner-content"> {{ $obat->deskripsi }} </p>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>

    <!-- Modal Add notes -->
    <div class="modal fade" id="addnotesmodal" tabindex="-1" role="dialog" aria-labelledby="addnotesmodalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content border-0">
            <div class="modal-header bg-primary">
              <h6 class="modal-title text-white">Add Notes</h6>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="notes-box">
                <div class="notes-content">
                  <form action="javascript:void(0);" id="addnotesmodalTitle">
                    <div class="row">
                      <div class="col-md-12 mb-3">
                        <div class="note-title">
                          <label>Note Title</label>
                          <input type="text" id="note-has-title" class="form-control" minlength="25" placeholder="Title" />
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="note-description">
                          <label>Note Description</label>
                          <textarea id="note-has-description" class="form-control" minlength="60" placeholder="Description" rows="3"></textarea>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-danger" data-bs-dismiss="modal">Discard</button>
              <button id="btn-n-add" class="btn btn-primary" disabled>Add</button>
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
    $(document).ready(function() {
        $('.datatab').DataTable();
    } );
</script>
@endsection
