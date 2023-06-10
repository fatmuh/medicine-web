@extends('layouts.dashboard.app')

@section('title')
<title>Medicine</title>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100 position-relative overflow-hidden">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold">Change Profile</h5>
                    <p class="card-subtitle mb-4">To change your personal detail , edit and save from here</p>
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <div class="note-title">
                                    <label class="mb-2">First Name</label>
                                    <input type="text" class="form-control" name="first_name"
                                        value="{{ old('first_name', auth()->user()->first_name) }}" />
                                </div>
                            </div>

                            <div class="col-md-6 mt-3">
                                <div class="note-description">
                                    <label class="mb-2">Last Name</label>
                                    <input type="text" class="form-control" name="last_name"
                                        value="{{ old('last_name', auth()->user()->last_name) }}" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <div class="note-title">
                                    <label class="mb-2">Email</label>
                                    <input type="email" class="form-control" name="email"
                                        value="{{ old('email', auth()->user()->email) }}" />
                                </div>
                            </div>

                            <div class="col-md-6 mt-3">
                                <div class="note-description">
                                    <label class="mb-2">Gender</label>
                                    <select class="form-select mr-sm-2" name="gender" required>
                                        @if (empty(auth()->user()->gender))
                                        <option value="" selected>---Pilih Gender---</option>
                                        @endif
                                        <option value="Laki-laki"
                                            {{ (old('gender', auth()->user()->gender) == 'Laki-laki') ? ' selected' : '' }}>
                                            Laki-laki{{ (old('gender', auth()->user()->gender) == 'Laki-laki') ? ' (Current)' : '' }}
                                        </option>
                                        <option value="Perempuan"
                                            {{ (old('gender', auth()->user()->gender) == 'Perempuan') ? ' selected' : '' }}>
                                            Perempuan{{ (old('gender', auth()->user()->gender) == 'Perempuan') ? ' (Current)' : '' }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <div class="note-title">
                                    <label class="mb-2">Phone</label>
                                    <input type="number" class="form-control" name="phone"
                                        value="{{ old('phone', auth()->user()->phone) }}" />
                                </div>
                            </div>

                            <div class="col-md-6 mt-3">
                                <div class="note-description">
                                    <label class="mb-2">Address</label>
                                    <textarea class="form-control" name="address" rows="3" />{{ old('address', auth()->user()->address) }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
