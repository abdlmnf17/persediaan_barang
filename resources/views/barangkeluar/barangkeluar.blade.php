@extends('layouts.layout')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Barang Keluar</h1>
</div>
<hr>
<div class="card-header py-3" align="right">
    <a href="{{route('barangkeluar.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                        <th widht="15%">Nama Costumer</th>
                        <th widht="15%">Jenis Barang</th>
                        <th width="15%">Tanggal</th>
                        <th width="35%">Memo</th>
                        <th width="15%">Jumlah</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangkeluar as $bk)
                    <tr>
                        <td>{{$bk->id}}</td>
                        <td>{{$bk->nmcsbk}}</td>
                        <td>{{$bk->jnsbk}}</td>
                        <td>{{$bk->tglbk}}</td>
                        <td>{{$bk->memobk}}</td>
                        <td>{{$bk->jmbk}}</td>
                        <td align="center">
                            <a class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm">
                                <i class="fas fa-check fa-sm text-white-50"></i> Transaksi Selesai
                            </a>
                            <a href="/barangkeluar/hapus/{{ $bk->id}}" onclick="return confirm('Yakin Ingin menghapus data?')" 
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