@extends('layouts.layout')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Barang Masuk</h1>
</div>
<hr>
<div class="card-header py-3" align="right">
    <a href="{{route('barangmasuk.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
    </a>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr align="center">
                        <th width="20%">No Transaksi</th>
                        <th widht="15%">Jenis Barang</th>
                        <th width="15%">Tanggal</th>
                        <th width="35%">Memo</th>
                        <th width="15%">Jumlah</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangmasuk as $bm)
                    <tr>
                        <td>{{$bm->idbm}}</td>
                        <td>{{$bm->jnsbm}}</td>
                        <td>{{$bm->tglbm}}</td>
                        <td>{{$bm->memobm}}</td>
                        <td>{{$bm->jmbm}}</td>
                        <td align="center">
                            <a href="/barangmasuk/detail/{{ $bm->id}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                <i class="fas fa-edit fa-sm text-white-50"></i> Detail
                            </a>
                            <a href="/barangmasuk/hapus/{{ $bm->id}}" onclick="return confirm('Yakin Ingin menghapus data?')"
                                class="dnone d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus
                            </a>
                        </td>
                    </tr>





                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
