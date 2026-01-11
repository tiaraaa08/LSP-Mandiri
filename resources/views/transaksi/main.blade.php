@extends('main')
@section('title', 'Transaksi')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="d-flex mb-3 align-items-center">
                    <div>
                        <h3 class="card-title mb-0">Transaksi</h3>
                    </div>
                    <div class="ms-auto flex-shrink-0">
                        <button class="btn bg-success-subtle text-success btn-sm" title="View Code" data-bs-toggle="modal"
                            data-bs-target="#tambahTransaksi">
                            <i class="ti ti-plus fs-5 d-flex">Tambah</i>
                        </button>
                    </div>
                </div>
                <div class="table-responsive border rounded-4">
                    <table class="table mb-0">
                        <thead class="table-dark">
                            <!-- start row -->
                            <tr>
                                <th class="text-white">No</th>
                                <th class="text-white">Tanggal</th>
                                <th class="text-white">Nama Pelanggan</th>
                                <th class="text-white">Layanan</th>
                                <th class="text-white">Berat</th>
                                <th class="text-white">Harga Satuan</th>
                                <th class="text-white">Jumlah Bayar</th>
                                <th class="text-white">Keterangan</th>
                                <th class="text-white">Pembayaran</th>
                                <th class="text-white">Aksi</th>
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
                                <td>1</td>
                                <td>Cuci Kering</td>
                                <td>RP 8.000
                                    <button class="btn bg-danger-subtle text-danger btn-sm" title="View Code"
                                        data-bs-toggle="modal" data-bs-target="#bayarTransaksi">
                                        <i class="ti ti-wallet fs-5 d-flex">Bayar</i>
                                    </button>
                                </td>
                                <td>
                                    <div>
                                        <button type="button"
                                            class="btn waves-effect waves-light btn-rounded bg-info-subtle text-info"
                                            data-bs-toggle="modal" data-bs-target="#editTransaksi">
                                            <i class="ti ti-pencil fs-5 d-flex"></i>
                                        </button>
                                        <button type="button"
                                            class="btn waves-effect waves-light btn-rounded bg-danger-subtle text-danger"
                                            onclick="KonfirmasiHapus()">
                                            <i class="ti ti-trash fs-5 d-flex"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('transaksi.tambah')
    @include('transaksi.edit')
    @include('transaksi.bayar')
@endsection
