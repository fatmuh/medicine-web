@extends('layouts.dashboard.app')

@section('title')
<title>Medicine - Konsultasi</title>
@endsection

@section('content')

<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Data Konsultasi</h5>
        <p class="mb-0">
            <table class="table datatab">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Whatsapp</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $contact)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $contact->nama }}</td>
                        <td><a href="https://api.whatsapp.com/send?phone=62{{ $contact->phone }}&text=Hallo%2C%20saya%20mau%20konsultasi%20perihal%20kesehatan%20dan%20pengobatan%2C%20apakah%20bisa%3F" class="btn btn-light-success text-success" target="_blank">
                            <i class="ti ti-brand-whatsapp fs-5 text-center"></i>
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
