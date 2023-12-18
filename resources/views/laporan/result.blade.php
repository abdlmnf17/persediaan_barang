@extends('layouts.layout')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2 class="mb-0">Laporan Periode {{ $startDate->format('d-m-Y') }} s/d {{ $endDate->format('d-m-Y') }}</h2>
            </div>
            <div class="card-body">
                <h3>Barang Masuk:</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No Transaksi</th>
                                <th>Jumlah Barang</th>
                                <th>Jenis Barang</th>
                                <th>Tanggal Transaksi</th>
                                <th>Memo</th>
                                <!-- Tambahkan kolom lain sesuai kebutuhan -->
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($barangMasuk as $masuk)
                                <tr>
                                    <td>{{ $masuk->idbm }}</td>
                                    <td>{{ $masuk->jmbm }}</td>
                                    <td>{{ $masuk->jnsbm }}</td>
                                    <td>{{ $masuk->tglbm }}</td>
                                    <td>{{ $masuk->memobm }}</td>
                                    <!-- Tambahkan kolom lain sesuai kebutuhan -->
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Tidak ada data barang masuk pada periode ini.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <h3 class="mt-4">Barang Keluar:</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No Transaksi</th>
                                <th>Jumlah Barang</th>
                                <th>Jenis Barang</th>
                                <th>Tanggal Transaksi</th>
                                <th>Memo</th>
                                <!-- Tambahkan kolom lain sesuai kebutuhan -->
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($barangKeluar as $keluar)
                                <tr>
                                    <td>{{ $keluar->idbk }}</td>
                                    <td>{{ $keluar->jmbk }}</td>
                                    <td>{{ $keluar->jnsbk }}</td>
                                    <td>{{ $keluar->tglbk }}</td>
                                    <td>{{ $keluar->memobk }}</td>
                                    <!-- Tambahkan kolom lain sesuai kebutuhan -->
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Tidak ada data barang keluar pada periode ini.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    <a href="{{ route('laporan.print', ['startDate' => $startDate->format('Y-m-d'), 'endDate' => $endDate->format('Y-m-d')]) }}" class="btn btn-success">Cetak PDF</a>
                </div>
            </div>
        </div>
    </div>
@endsection
