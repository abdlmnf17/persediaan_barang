<!DOCTYPE html>
<html>
<head>
    <title>Laporan Barang Masuk dan Keluar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1, h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h3 align="center">Laporan Barang Masuk dan Keluar <br/>PT. SEPATU BATA TBK</h3>

    <h5>Barang Masuk</h5>
    <table>
        <thead>
            <tr>
                <th>Nomor Transaksi</th>
                <th>Jenis Barang</th>
                <th>Jumlah Barang</th>
                <th>Tanggal Transaksi</th>
                <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
            </tr>
        </thead>
        <tbody>
            @forelse ($barangMasuk as $masuk)
                <tr>
                    <td>{{ $masuk->idbm }}</td>
                    <td>{{ $masuk->jnsbm }}</td>
                    <td>{{ $masuk->jmbm }}</td>
                    <td>{{ $masuk->tglbm }}</td>
                    <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
                </tr>
            @empty
                <tr>
                    <td colspan="4">Tidak ada data barang masuk pada periode ini.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <h5>Barang Keluar</h5>
    <table>
        <thead>
            <tr>
                <th>Nomor Transaksi</th>
                <th>Jenis Barang</th>
                <th>Jumlah Barang</th>
                <th>Tanggal Transaksi</th>
                <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
            </tr>
        </thead>
        <tbody>
            @forelse ($barangKeluar as $keluar)
                <tr>
                    <td>{{ $keluar->idbk }}</td>
                    <td>{{ $keluar->jnsbk }}</td>
                    <td>{{ $keluar->jmbk }}</td>
                    <td>{{ $keluar->tglbk }}</td>
                    <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
                </tr>
            @empty
                <tr>
                    <td colspan="4">Tidak ada data barang keluar pada periode ini.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
