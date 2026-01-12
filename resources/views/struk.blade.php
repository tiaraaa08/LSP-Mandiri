<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

        <style>
           @media print {
                body {
                    margin: 0;
                    width: 80mm;
                }

                .receipt {
                    width: 80mm;
                    padding: 0;
                    margin: 0;
                }

                table, tr, td {
                    page-break-inside: avoid !important;
                }

                hr {
                    margin: 4px 0;
                }
            }
        </style>
</head>

<body>
    <div class="receipt">
        <h1 class="text-center">Tiara Laundry</h1>
        <hr>
        <h3 class="text-center">Bukti Transaksi</h3>
        <hr>
        <table class="table table-borderless">
            <tr>
                <td class="w-50">Nama Pelanggan</td>
                <td class="text-center w-5">:</td>
                <td class="w-45">{{$transaksi->nama_pelanggan}}</td>
            </tr>
            <tr>
                <td>Waktu Transaksi</td>
                <td class="text-center">:</td>
                <td>{{ date('d-m-Y', strtotime($transaksi->waktu_transaksi)) }}</td>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td class="text-center">:</td>
                <td>08976563223</td>
            </tr>
        </table>

        <hr class="my-2">

        <table class="table table-borderless">
            <tr>
                <td class="w-50">Berat</td>
                <td class="text-center">:</td>
                <td class="w-45">{{ $transaksi->berat }} KG</td>
            </tr>
            <tr>
                <td>Harga / KG</td>
                <td class="text-center">:</td>
                <td>RP {{ number_format($transaksi->layanan->harga_per_kg, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Layanan</td>
                <td class="text-center">:</td>
                <td>{{$transaksi->layanan->nama_layanan}}</td>
            </tr>
        </table>
        <hr class="my-2">
        <table class="table table-borderless">
            <tr class="fw-bold">
                <td class="w-50">Total</td>
                <td class="text-center">:</td>
                <td class="w-45">RP {{ number_format($transaksi->berat * $transaksi->layanan->harga_per_kg, 0, ',', '.') }}</td>
            </tr>
        </table>

        <hr>
        <h3> LSP 2025 - Ayu Mutiara</h3>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <script>
        window.onload = function() {
            window.print();
            window.onafterprint = () => {
                window.location.href = "{{ route('transaksi.index') }}";
            };
        };
    </script>
</body>

</html>
