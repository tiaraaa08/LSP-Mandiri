<div id="editLayanan" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-md">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myModalLabel">
                    Edit Layanan
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="mb-3">
                        <label class="form-label">Nama Layanan
                        </label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Layanan" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga per KG
                        </label>
                        <input type="text" id="hargaRupiah" class="form-control" placeholder="Masukkan Harga per KG" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-danger-subtle text-danger  waves-effect" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>

    </script>
@endpush
