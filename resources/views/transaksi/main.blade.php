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
                <div class="table-responsive rounded-4">
                    <table class="table mb-0" id="tabelTransaksi">
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
                             @forelse ($transaksi as $trans)
                             <tr>
                                 <td>{{ $loop->iteration }}</td>
                                 <td>{{ $trans->waktu_transaksi }}</td>
                                 <td>{{ $trans->nama_pelanggan }}</td>
                                 <td>{{ $trans->layanan->nama_layanan }}</td>
                                 <td>{{ $trans->berat }}KG</td>
                                 <td>RP {{ number_format($trans->layanan->harga_per_kg, 0, ',', '.') }}</td>
                                 <td>RP {{ number_format($trans->layanan->harga_per_kg * $trans->berat, 0, ',', '.') }}</td>
                                 <!-- <td>{{ $trans->harga_per_kg }}</td> -->
                                 <td>{{ $trans->keterangan }}</td>
                                 <td>{{ $trans->pembayaran }}
                                    @if ( $trans->pembayaran == 'Belum Bayar' )
                                    <form action="{{ route('transaksi.bayar', $trans->id) }}" method="POST" class="KonfirmasiBayar">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn waves-effect waves-light btn-rounded bg-danger-subtle text-danger">
                                             <i class="ti ti-credit-card fs-5 d-flex">Bayar</i>
                                        </button>
                                    </form>
                                    @endif
                                 </td>
                                 <td>
                                     <div class="d-flex gap-2">
                                         <button type="button"
                                             class="btn waves-effect waves-light btn-rounded bg-info-subtle text-info"
                                             data-bs-toggle="modal" data-bs-target="#editTransaksi{{ $trans->id }}">
                                             <i class="ti ti-pencil fs-5 d-flex"></i>
                                         </button>
                                         <form action="{{ route('transaksi.destroy', $trans->id) }}" method="POST" class="KonfirmasiHapus">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn waves-effect waves-light btn-rounded bg-danger-subtle text-danger">
                                                <i class="ti ti-trash fs-5 d-flex"></i>
                                            </button>
                                         </form>
                                         @if ($trans->pembayaran == 'Lunas')
                                        <a type="button" href="{{ route('struk', $trans->id) }}"
                                            class="btn waves-effect waves-light btn-rounded bg-success-subtle text-success">
                                            <i class="ti ti-receipt fs-5 d-flex"></i>
                                        </a>
                                         @endif
                                     </div>
                                 </td>
                             </tr>
                            @include('transaksi.edit')
                             @empty
                             <tr>
                                <td colspan="10" class="text-center text-danger"> Data Transaksi Tidak Tersedia</td>
                             </tr>
                             @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('transaksi.tambah')
    @include('transaksi.bayar')
@endsection

@push('scripts')
  <script>
        document.addEventListener('DOMContentLoaded', function() {

        //untuk bayar
            const forms = document.querySelectorAll('.KonfirmasiBayar');
            forms.forEach( form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                         title: 'Ubah Status Menjadi Lunas?',
                        text: "Pastikan Pembayaran Sudah Diselesaikan",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, sudah!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                })
            })

            //untuk hapus
            const hapus = document.querySelectorAll('.KonfirmasiHapus');
            hapus.forEach( form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                         title: 'Apakah Anda Yakin?',
                        text: "Data Yang Sudah Terhapus Tidak Dapat Dikembalikan",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, sudah!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                })
            })
        });
    </script>

    <script>
        //datatable
        $(document).ready(function() {
            $('#tabelTransaksi').DataTable();
        });
    </script>

    <!-- sweet alert success -->
     @if (session('success'))
     <script>
        Swal.fire({
            icon: 'success',
            text: '{{ session('success') }}',
            confirmButtonText: 'OK'
        });
     </script>
     @endif
@endpush