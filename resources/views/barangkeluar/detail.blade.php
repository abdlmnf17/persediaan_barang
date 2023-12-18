@extends('layouts.layout')

@section('content')
    <form action="" method="POST">
        @csrf
        <fieldset>
            <div class="form-group row">
                <div class="col-md-5">
                    Nomor Transaksi
                    <input type="text" class="form-control" value="{{ $barangkeluar->idbk }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-5">
                    Nama Costumer
                    <input type="text" class="form-control" value="{{ $barangkeluar->nmcsbk }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-5">
                    Jenis Barang
                    <input type="text" class="form-control" value="{{ $barangkeluar->jnsbk }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-5">
                    Tanggal transaksi
                    <input type="date" value="{{ $barangkeluar->tglbk }}" class="form-control" disabled>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-10">
                    Memo
                    <textarea type="text" class="form-control" disabled>{{ $barangkeluar->memobk }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-10">
                    Total Barang Terjual
                    <input type="text" class="form-control" value="{{ $barangkeluar->jmbk }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-10">
                    <input type="button" class="btn btn-primary btn-send" value="Kembali" onclick="history.go(-1)">
                </div>
            </div>
            <hr>
        </fieldset>
    </form>
@endsection
