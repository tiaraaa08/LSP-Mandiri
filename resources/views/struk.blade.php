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
                font-size: 15px;
                /* INI KUNCINYA */
                font-family: Arial, sans-serif;
            }

            .receipt {
                width: 80mm;
                padding: 0;
                margin: 0;
            }

            table,
            tr,
            td,
            .text {
                font-size: 15px;
                /* WAJIB */
                padding: 2px 0;
                page-break-inside: avoid !important;
            }

            h4 {
                font-size: 14px;
                margin: 4px 0;
            }

            h5 {
                font-size: 12px;
                margin: 4px 0;
            }

            h6 {
                font-size: 10px;5                margin: 4px 0;
            }

            hr {
                margin: 4px 0;
            }
        }
    </style>
</head>

<body>
    <div class="receipt">
        <h4 class="text-center text">Tiara Laundry</h4>
        <hr>
        <h5 class="text-center text">Bukti Transaksi</h5>
        <hr>
        <table class="table table-borderless">
            <tr>
                <td class="">Nama Pelanggan</td>
                <td class="text-center">:</td>
                <td class="">{{ $transaksi->nama_pelanggan }}</td>
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
                <td class="">Berat</td>
                <td class="text-center">:</td>
                <td class="">{{ $transaksi->berat }} KG</td>
            </tr>
            <tr>
                <td>Harga / KG</td>
                <td class="text-center">:</td>
                <td>RP {{ number_format($transaksi->layanan->harga_per_kg, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Layanan</td>
                <td class="text-center">:</td>
                <td>{{ $transaksi->layanan->nama_layanan }}</td>
            </tr>
        </table>
        <hr class="my-2">
        <table class="table table-borderless">
            <tr class="fw-bold">
                <td class="">Total</td>
                <td class="text-center">:</td>
                <td class="">RP
                    {{ number_format($transaksi->berat * $transaksi->layanan->harga_per_kg, 0, ',', '.') }}</td>
            </tr>
        </table>
        <hr>
        <h6 class="text-center text"> LSP 2025 - Ayu Mutiara</h6>
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
