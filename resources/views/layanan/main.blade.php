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
                             @foreach ($layanan as $i)
                             <tr>
                                 <td>{{ $loop->iteration }}</td>
                                 <td>{{ $i->nama_layanan }}</td>
                                 <td>RP {{ number_format($i->harga_per_kg, 0, ',', '.') }}</td>
                                 <td>
                                     <div class="d-flex justify-content-start gap-2">
                                         <button type="button"
                                             class="btn waves-effect waves-light btn-rounded bg-info-subtle text-info"
                                             data-bs-toggle="modal" data-bs-target="#editLayanan{{ $i->id }}">
                                             <i class="ti ti-pencil fs-5 d-flex"></i>
                                         </button>
                                         <form action="{{ route('layanan.destroy', $i->id) }}" method="POST" class="KonfirmasiHapus">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn waves-effect waves-light btn-rounded bg-danger-subtle text-danger">
                                                <i class="ti ti-trash fs-5 d-flex"></i>
                                            </button>
                                         </form>
                                     </div>
                                 </td>
                             </tr>
                            @include('layanan.edit')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('layanan.tambah')
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.KonfirmasiHapus');
            forms.forEach( form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Data transaksi akan dihapus secara permanen!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!',
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
@endpush
