<div class="modal fade" id="ModalEdit{{ $order->id }}" tabindex="-1" role="dialog"
    aria-labelledby="tambahobatmodalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <div class="modal-header bg-primary">
                <h6 class="modal-title text-white">Ubah Status Pesanan</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="notes-box">
                    <div class="notes-content">
                        <form class="row g-3" action="{{ route('admin.pesanan.update', ['id' => $order->id]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-12 mt-2">
                                    <div class="note-title">
                                        <label>Status</label>
                                        <select class="form-select mr-sm-2" name="status" required>
                                            <option value="{{ old('status', $order->status) }}">{{ $order->status }}
                                                (Current)</option>
                                            @foreach (['Pending', 'Processing', 'Completed', 'Cancelled'] as $status)
                                                @if ($status != $order->status)
                                                    <option value="{{ $status }}">{{ $status }}</option>
                                                @endif
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
            </form>
        </div>
    </div>
</div>
