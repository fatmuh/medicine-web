@extends('layouts.dashboard.app')

@section('title')
<title>Medicine - Kesehatan</title>
@endsection

@section('content')

<div class="container-fluid">
    <div class="card rounded-2 overflow-hidden">
        <div class="position-relative">
            <a href="javascript:void(0)"><img src="{{ asset('storage/'. old('thumbnail', $data->thumbnail)) }}"
                    class="card-img-top rounded-0 object-fit-cover" alt="..." height="440"></a>
            <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/profile/user-1.jpg" alt=""
                class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40"
                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Esther Lindsey">
        </div>
        <div class="card-body p-4">
            <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">{{ $data->category }}</span>
            <h2 class="fs-9 fw-semibold my-4">{{ $data->title }}</h2>
            <div class="d-flex align-items-center gap-4">
                <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>{{ date('D, d M Y', strtotime($data->created_at)) }}
                </div>
            </div>
        </div>
        <div class="card-body border-top p-4">
            {!! $data->content !!}
        </div>
    </div>
</div>
</div>
</div>

@endsection
