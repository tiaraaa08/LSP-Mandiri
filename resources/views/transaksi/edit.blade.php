<div id="editTransaksi" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-md">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myModalLabel">
                    Edit Transaksi
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="row mb-3">
                        <div class="col-4">
                            <label class="form-label">Tanggal
                            </label>
                            <input type="date" class="form-control" placeholder="Masukkan Nama Layanan" />
                        </div>
                        <div class="col-8">
                            <label class="form-label">Nama Pelanggan
                            </label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama Layanan" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-8">
                            <label class="form-label">Layanan
                            </label>
                            <div class="form-group">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Berat
                            </label>
                            <div class="input-group">

                                <input type="text" class="form-control" placeholder="Masukkan Berat" />
                                <span class="input-group-text">KG</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-7">
                            <label class="form-label">Jumlah Bayar
                            </label>
                            <input type="text" readonly class="form-control" placeholder="Masukkan Nama Layanan" />
                        </div>
                        <div class="col-5">
                            <label class="form-label">Pembayaran
                            </label>
                           <div class="form-group">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option value="Lunas">Lunas</option>
                                    <option value="Belum Bayar">Belum Bayar</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan
                        </label>
                         <div class="form-group">
                                <select class="form-control" id="exampleFormControlSelect1" disabled>
                                    <option selected value="Proses">Proses</option>
                                </select>
                            </div>
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
