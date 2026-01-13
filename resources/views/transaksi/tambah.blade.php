<div id="tambahTransaksi" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-md">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myModalLabel">
                    Tambah Transaksi
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr>
            <form class="form-horizontal" action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-4">
                            <label class="form-label">Tanggal
                            </label>
                            <input required type="date" name="waktu_transaksi" class="form-control" placeholder="Masukkan Nama Layanan" />
                        </div>
                        <div class="col-8">
                            <label class="form-label">Nama Pelanggan
                            </label>
                            <input required type="text" name="nama_pelanggan" class="form-control" placeholder="Masukkan Nama Pelanggan" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-8">
                            <label class="form-label">Layanan
                            </label>
                            <div class="form-group">
                                <select id="layanan" required class="form-control" name="id_layanan" id="exampleFormControlSelect1">
                                    <option> Pilih Layanan</option>
                                    @foreach ($layanan as $layan)
                                    <option value="{{ $layan->id }}" data-harga="{{ $layan->harga_per_kg }}" >{{ $layan->nama_layanan }} => RP {{ number_format($layan->harga_per_kg, 0, ',', '.') }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Berat
                            </label>
                            <div class="input-group">
                                <input required type="text" id="berat" name="berat" class="form-control" placeholder="Masukkan Berat" />
                                <span class="input-group-text">KG</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-5">
                            <label class="form-label">Total
                            </label>
                              <input type="text" id="TotalBayar" readonly class="form-control" placeholder="Masukkan Jumlah Bayar" />
                        </div>
                        <div class="col-7">
                            <label class="form-label">Jumlah Bayar
                            </label>
                            <input required type="text" id="hargaRupiah" class="form-control" placeholder="Masukkan Jumlah Bayar" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label class="form-label">Pembayaran
                            </label>
                            <div class="form-group">
                                <select required class="form-control" name="pembayaran" id="exampleFormControlSelect1">
                                    <option value="Lunas">Lunas</option>
                                    <option value="Belum Bayar">Belum Bayar</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                           <label class="form-label">Keterangan
                        </label>
                        <div class="form-group">
                            <select required class="form-control" name="keterangan" id="exampleFormControlSelect1">
                                <option selected value="Proses">Proses</option>
                            </select>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <h5 class="d-flex flex-start">Kembalian : <div id="kembalian"></div> </h5>
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

@push('scripts')
    <script>
       document.addEventListener('DOMContentLoaded', function () {
        //format rupiah
            const rupiahInput = document.getElementById('hargaRupiah');

            rupiahInput.addEventListener('input', function () {
                let value = this.value.replace(/\D/g, '');

                this.value = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                }).format(value);
            });

            //auto fill Total + format rupiah
            const berat = document.getElementById('berat');
            const layanan = document.getElementById('layanan');
            const total = document.getElementById('TotalBayar');

             function rupiahFormat(angka){
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    maximumFractionDigits: 0,
                    minimumFractionDigits:0
                }).format(angka)
            }

            function hitung() {
                const b = berat.value || 0;
                const h = layanan.selectedOptions[0].dataset.harga;
                const hasil = b * h;

                total.value = hasil ? rupiahFormat(hasil) : '';
            }
            
            function kembalian() {
                const totbayar = total.value.replace(/\D/g, '') || 0;
                const jumbayar = rupiahInput.value.replace(/\D/g, '') || 0;
                const kembalian = jumbayar - totbayar;

                document.getElementById('kembalian').innerText = rupiahFormat(kembalian);
            }

            rupiahInput.addEventListener('input', kembalian);
            berat.addEventListener('input', hitung);
            layanan.addEventListener('change', hitung);
        });
    </script>
@endpush