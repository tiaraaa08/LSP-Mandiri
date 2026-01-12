<div id="editLayanan{{ $i->id }}" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-md">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myModalLabel">Edit Layanan '{{ $i->nama_layanan }}'</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr />
            <form class="form-horizontal" action="{{ route('layanan.update', $i->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Layanan </label>
                        <input required type="text" class="form-control" name="nama_layanan" placeholder="Masukkan Nama Layanan"
                            value="{{ $i->nama_layanan }}" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga per KG </label>
                        <input required type="text" name="harga_per_kg" class="form-control rupiah-edit" placeholder="Masukkan Harga per KG"
                            value="{{ $i->harga_per_kg }}" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-success-subtle text-success waves-effect">
                        Simpan
                    </button>
                    <button type="button" class="btn bg-danger-subtle text-danger waves-effect" data-bs-dismiss="modal">
                        Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('shown.bs.modal', function (e) {
            const inputs = e.target.querySelectorAll('.rupiah-edit');

            inputs.forEach(input => {
                // format saat modal dibuka
                let mentah = input.value.replace(/\D/g, '');

                if (mentah !== '') {
                    input.value = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0,
                        maximumFractionDigits: 0
                    }).format(Number(mentah));
                }

                // format ulang saat user ngetik
                input.addEventListener('input', function () {
                    let val = this.value.replace(/\D/g, '');
                    this.value = val
                        ? new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR',
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 0
                        }).format(Number(val))
                        : '';
                });
            });
        });
    </script>
@endpush