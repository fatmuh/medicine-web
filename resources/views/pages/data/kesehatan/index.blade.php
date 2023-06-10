@extends('layouts.dashboard.app')

@section('title')
<title>Medicine</title>
@endsection

@section('content')

<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <div class="mb-3">
            <a href="{{ route('admin.kesehatan.kesehatan-create') }}" class="btn mb-1 btn-light-primary text-primary btn-lg px-4 fs-4 font-medium">Tambah Artikel</a>
        </div>
        <h5 class="card-title fw-semibold mb-4">Blog Kesehatan</h5>
        <p class="mb-0">
            <table class="table datatab">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Kategori</th>
                        <th>Thumbnail</th>
                        <th><i class="ti ti-settings"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $kesehatan)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $kesehatan->title }}</td>
                        <td>{{ $kesehatan->category }}</td>
                        <td>@if (old('thumbnail', $kesehatan->thumbnail))
                            <img src="{{ asset('storage/'. old('thumbnail', $kesehatan->thumbnail)) }}" width="150px" height="100px"
                                class="rounded">
                            @else
                            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                                width="70px" class="rounded-circle m-3">
                            @endif</td>
                        <td><a href="{{ route('medicine.kesehatan-detail', ['slug' => $kesehatan->slug]) }}" class="btn btn-light-success text-success">
                            <i class="ti ti-eye fs-5 text-center"></i>
                        </a>
                        <a href="{{ route('admin.kesehatan.kesehatan-edit', ['slug' => $kesehatan->slug]) }}" class="btn btn-light-primary text-primary">
                            <i class="ti ti-pencil fs-5 text-center"></i>
                        </a>
                        <a href="" class="btn btn-light-danger text-danger" data-bs-toggle="modal"
                        data-bs-target="#ModalDelete{{ $kesehatan->id }}">
                            <i class="ti ti-trash fs-5 text-center"></i>
                        </a></td>
                    </tr>
                    @include('pages.data.kesehatan.delete')
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
