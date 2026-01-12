<div id="tambahLayanan" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-md">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myModalLabel">
                    Tambah Layanan
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr>
            <form class="form-horizontal" action="{{ route('layanan.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Layanan
                        </label>
                        <input required type="text" name="nama_layanan" class="form-control" placeholder="Masukkan Nama Layanan" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga per KG
                        </label>
                        <input required type="text" name="harga_per_kg" id="hargaRupiah" class="form-control" placeholder="Masukkan Harga per KG" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-success-subtle text-success  waves-effect"
                        data-bs-dismiss="modal">
                        Simpan
                    </button>
                    <button type="button" class="btn bg-danger-subtle text-danger  waves-effect"
                        data-bs-dismiss="modal">
                        Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const rupiahInput = document.getElementById('hargaRupiah');

            rupiahInput.addEventListener('input', function () {
                let value = this.value.replace(/\D/g, '');

                // kalo kosong, kosongin input & stop
                if (value === '') {
                    this.value = '';
                    return;
                }

                // convert ke number dulu
                value = Number(value);

                this.value = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                }).format(value);
            });
        });
    </script>
@endpush