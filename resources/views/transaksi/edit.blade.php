<div id="editTransaksi{{ $trans->id }}" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-md">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myModalLabel">
                    Edit Transaksi {{ $trans->nama_pelanggan }}
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr>
            <form class="form-horizontal" action="{{ route('transaksi.update', $trans->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-4">
                            <label class="form-label">Tanggal
                            </label>
                            <input required type="date" value="{{ $trans->waktu_transaksi }}" name="waktu_transaksi"
                                class="form-control" placeholder="Masukkan Nama Layanan" />
                        </div>
                        <div class="col-8">
                            <label class="form-label">Nama Pelanggan
                            </label>
                            <input required type="text" value="{{ $trans->nama_pelanggan }}" name="nama_pelanggan"
                                class="form-control" placeholder="Masukkan Nama Pelanggan" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-8">
                            <label class="form-label">Layanan
                            </label>
                            <div class="form-group">
                                <select class="form-control" id="layanan-edit" name="id_layanan"
                                    id="exampleFormControlSelect1" required>
                                    @foreach ($layanan as $layan)
                                        <option value="{{ $layan->id }}" data-harga="{{ $layan->harga_per_kg }}"
                                            {{ $trans->id_layanan == $layan->id ? 'selected' : '' }}>
                                            {{ $layan->nama_layanan }} => RP
                                            {{ number_format($layan->harga_per_kg, 0, ',', '.') }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Berat
                            </label>
                            <div class="input-group">
                                <input required value="{{ $trans->berat }}" type="text" id="berat-edit"
                                    name="berat" class="form-control" placeholder="Masukkan Berat" />
                                <span class="input-group-text">KG</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-5">
                            <label class="form-label">Total
                            </label>
                            <input type="text" id="totalBayar-edit" readonly class="form-control"
                                placeholder="Masukkan Jumlah Bayar" />
                        </div>
                        <div class="col-7">
                            <label class="form-label">Jumlah Bayar
                            </label>
                            <input required type="text" class="hargaRupiah form-control"
                                placeholder="Masukkan Jumlah Bayar" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label class="form-label">Pembayaran
                            </label>
                            <div class="form-group">
                                <select class="form-control" name="pembayaran" id="exampleFormControlSelect1" required>
                                    <option value="Lunas" {{ $trans->pembayaran == 'Lunas' ? 'selected' : '' }}>Lunas
                                    </option>
                                    <option value="Belum Bayar"
                                        {{ $trans->pembayaran === 'Belum Bayar' ? 'selected' : '' }}>Belum Bayar
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Keterangan
                            </label>
                            <div class="form-group">
                                <select class="form-control" name="keterangan" id="exampleFormControlSelect1" required>
                                    <option selected value="Proses"
                                        {{ $trans->keterangan === 'Proses' ? 'selected' : '' }}>Proses</option>
                                    <option selected value="Selesai"
                                        {{ $trans->keterangan === 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <h5 class="d-flex">Kembalian : <div id="kembalian"></div>
                    </h5>
                    <button type="submit" class="btn bg-success-subtle text-success  waves-effect"
                        data-bs-dismiss="modal">
                        Simpan
                    </button>
                    <button type="button" class="btn bg-danger-subtle text-danger  waves-effect"
                        data-bs-dismiss="modal">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
    <script>
        document.addEventListener('shown.bs.modal', function(e) {

            const modal = e.target;
            if (!modal.id.startsWith('editTransaksi')) return;

            const layanan = modal.querySelector('select[name="id_layanan"]');
            const berat = modal.querySelector('#berat-edit');
            const total = modal.querySelector('#totalBayar-edit');
            const bayar = modal.querySelector('.hargaRupiah');
            const kembalianEl = modal.querySelector('#kembalian');

            function rupiah(n) {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }).format(n);
            }

            function hitungTotal() {
                const b = parseFloat(berat.value) || 0;
                const h = layanan.selectedOptions[0]?.dataset.harga || 0;
                const hasil = b * h;

                total.value = hasil ? rupiah(hasil) : '';
                hitungKembalian();
            }

            function hitungKembalian() {
                const t = total.value.replace(/\D/g, '') || 0;
                const b = bayar.value.replace(/\D/g, '') || 0;
                const k = b - t;
                kembalianEl.innerText = k >= 0 ? rupiah(k) : 'Rp 0';
            }

            berat.addEventListener('input', hitungTotal);
            layanan.addEventListener('change', hitungTotal);

            bayar.addEventListener('input', function() {
                let v = this.value.replace(/\D/g, '');
                this.value = v ? rupiah(v) : '';
                hitungKembalian();
            });

            hitungTotal();
        });
    </script>
@endpush
