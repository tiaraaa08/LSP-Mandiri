@extends('main')
@section('title', 'Beranda')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card border-bottom border-info">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="fw-medium text-info mb-0">Jumlah Layanan</h6>
                                <h4 class="fs-7">{{ $layanan->count() }}</h4>
                            </div>
                            <span class="text-info display-6">
                                <i class="ti ti-file-text"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-bottom border-primary">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="fw-medium text-primary mb-0">Transaksi</h6>
                                <h4 class="fs-7">{{ $transaksi->count() }}</h4>
                            </div>
                            <span class="text-primary display-6">
                                <i class="ti ti-clipboard"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-bottom border-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="fw-medium text-success mb-0">Sedang Diproses</h6>
                                <h4 class="fs-7">{{ $proses }}</h4>
                            </div>
                            <div class="ms-auto">
                                <span class="text-success display-6">
                                    <i class="ti ti-credit-card"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-bottom border-danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="fw-medium text-danger mb-0">Belum Dibayar</h6>
                                <h4 class="fs-7">{{ $belumBayar }}</h4>
                            </div>
                            <span class="text-danger display-6">
                                <i class="ti ti-users"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-flex mb-3 align-items-center">
                    <div>
                        <h3 class="card-title mb-0">Pesanan Terbaru</h3>
                    </div>
                </div>

                <div class="table-responsive rounded-4">
                    <table class="table mb-0" id="tableMain">
                        <thead class="table-dark">
                            <!-- start row -->
                            <tr>
                                <th class="text-white">No</th>
                                <th class="text-white">Tanggal Transaksi</th>
                                <th class="text-white">Nama Pelanggan</th>
                                <th class="text-white">Layanan</th>
                                <th class="text-white">Berat</th>
                                <th class="text-white">Pembayaran</th>
                            </tr>
                            <!-- end row -->
                        </thead>
                        <tbody>
                            @forelse ($transaksi as $t)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ date('d-m-Y', strtotime($t->waktu_transaksi)) }}</td>
                                    <td>{{ $t->nama_pelanggan }}</td>
                                    <td>{{ $t->layanan->nama_layanan }}</td>
                                    <td>{{ $t->berat }} KG</td>
                                    @if ($t->pembayaran === 'Belum Bayar')
                                        <td class="text-danger">{{ $t->pembayaran }}</td>
                                    @else
                                        <td class="text-danger">{{ $t->pembayaran }}</td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-danger text-center">Data Pesanan Belum Tersedia</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#tableMain').DataTable();
        });
    </script>
@endpush