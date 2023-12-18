@extends('layouts.layout')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Persediaan Barang</h1>
</div>
<hr>
<div class="card-header py-3" align="right">
    <a href="{{route('persediaan.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
    </a>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr align="center">
                        <th width="20%">Kode Barang</th>
                        <th width="35%">Nama Barang</th>
                        <th width="15%">Jenis Barang</th>
                        <th width="15%">Jumlah Barang</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($persediaan as $pr)
                    <tr>
                        <td>{{$pr->idpr}}</td>
                        <td>{{$pr->nmpr}}</td>
                        <td>{{$pr->jnspr}}</td>
                        <td>{{$pr->jmlpr}}</td>
                        <td align="center">
                            <a href="/persediaan/edit/{{ $pr->id}}"
                                class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm">
                                <i class="fas fa-check fa-sm text-white-50"></i> Edit
                            </a>
                            <a href="/persediaan/hapus/{{ $pr->id }}" onclick="return confirm('Yakin Ingin menghapus data?')"
                                class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
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
