@extends('main')
@section('title', 'Layanan')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="d-flex mb-3 align-items-center">
                    <div>
                        <h3 class="card-title mb-0">Layanan</h3>
                    </div>
                    <div class="ms-auto flex-shrink-0">
                        <button class="btn bg-success-subtle text-success btn-sm" title="View Code" data-bs-toggle="modal"
                            data-bs-target="#tambahLayanan">
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
                                <th class="text-white">Nama Layanan</th>
                                <th class="text-white">Harga per KG</th>
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
                                <td>
                                    <div>
                                        <button type="button"
                                            class="btn waves-effect waves-light btn-rounded bg-info-subtle text-info"
                                            data-bs-toggle="modal" data-bs-target="#editLayanan">
                                            <i class="ti ti-pencil fs-5 d-flex"></i>
                                        </button>
                                        <button type="button"
                                            class="btn waves-effect waves-light btn-rounded bg-danger-subtle text-danger" onclick="KonfirmasiHapus()">
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
    @include('layanan.tambah')
    @include('layanan.edit')
@endsection
