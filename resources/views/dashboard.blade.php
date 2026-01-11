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
                                <h4 class="fs-7">120</h4>
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
                                <h6 class="fw-medium text-primary mb-0">Transaksi Baru</h6>
                                <h4 class="fs-7">150</h4>
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
                                <h4 class="fs-7">450</h4>
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
                                <h4 class="fs-7">100</h4>
                            </div>
                            <span class="text-danger display-6">
                                <i class="ti ti-users"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

          <div class="table-responsive border rounded-4">
                    <table class="table mb-0">
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
                            <!-- start row -->
                            <tr>
                                <td>1</td>
                                <td>Cuci Kering</td>
                                <td>RP 8.000</td>
                                <td>1</td>
                                <td>Cuci Kering</td>
                                <td>RP 8.000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
    </div>
@endsection
