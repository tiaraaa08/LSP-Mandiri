<div id="bayarTransaksi" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-md">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myModalLabel">
                    Keterangan Pembayaran
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr>
            <div class="modal-body">
                <form>
                    <div class="form-group mb-4">
                        <select class="form-select mr-sm-2" id="inlineFormCustomSelect">
                            <option selected>Pilih Keterangan Pembayaran</option>
                            <option value="Lunas">Lunas</option>
                            <option value="Belum Bayar">Belum Bayar</option>
                        </select>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn bg-success-subtle text-success  waves-effect" data-bs-dismiss="modal">
                    Simpan
                </button>
                <button type="button" class="btn bg-danger-subtle text-danger  waves-effect" data-bs-dismiss="modal">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script></script>
@endpush
