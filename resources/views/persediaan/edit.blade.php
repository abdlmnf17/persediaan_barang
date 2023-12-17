@extends('layouts.layout')
@section('content')
<form action="{{route('persediaan.update', [$persediaan->id])}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <fieldset>
        <legend>Input Data Akun</legend>
        <div class="form-group row">
            <div class="col-md-5">
                <div class="col-md-5">
                    <label for="kode">Kode Barang</label>
                    <input id="kode" type="text" name="kode" class="form-control">
                </div>
                <div class="col-md-5">
                    <label for="nama">Nama Barang</label>
                    <input id="nama" type="text" name="nama" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-5">
                    <label for="jenis">Jenis Barang</label>
                    <select id="jenis" name="jenis" class="form-control">
                        <option value="">--Pilih Klasifikasi--</option>
                        <option value="Sandal">Sandal</option>
                        <option value="Sepatu">Sepatu</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-5">
                    <label for="jumlah">Jumlah Barang</label>
                    <input id="jumlah" type="text" name="jumlah" class="form-control">
                </div>
            </div>
            <div class="col-md-10">
                <input type="submit" class="btn btn-success btn-send" value="Simpan">
                <input type="Button" class="btn btn-primary btn-send" value="Kembali" onclick="history.go(-1)">
            </div>
            <hr>
    </fieldset>
</form>
@endsection