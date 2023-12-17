@extends('layouts.layout')
@section('content')
<form action="{{route('barangkeluar.store')}}" method="POST">
    @csrf
    <fieldset>
        <div class="form-group row">
            <div class="col-md-5">
                Nomor Transaksi<input id="notran" type="text" name="notrans" class="form-control" value="{{$nomor}}" required>
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
            <div class="col-md-10">
                Nama Costumer<textarea id="nmcsbk" type="text" name="nmcsbk" class="form-control" required></textarea>
            </div>
        <div class="form-group row">
            <div class="col-md-5">
                Tanggal transaksi<input id="tgltr" type="date" name="tgltr" value="" class="form-control" required>
            </div>
        <div class="form-group row">
            <div class="col-md-10">
                Memo<textarea id="memo" type="text" name="memo" class="form-control" required></textarea>
            </div>
        <div class="form-group row">
            <div class="col-md-4">
                Jumlah Pengeluaran
                @for($i=1;$i<=3;$i++) <input id="txt{{$i}}" type="text" name="txt{{$i}}" class="form-control" value="0"
                    onkeyup="sum();">
                    @endfor
                    <input id="idkk" type="hidden" name="idkk" class="form-control" value="{{$nomorawal}}" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-10">Total Barang Keluar
                <input id="total" type="text" name="total" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-10">
                <input type="submit" class="btn btn-success btn-send" value="Simpan">
                <input type="Button" class="btn btn-primary btn-send" value="Kembali" onclick="history.go(-1)">
            </div>
        </div>
        <hr>
    </fieldset>
</form>
<script>
function sum() {
    var text1 = document.getElementById('txt1').value;
    var text2 = document.getElementById('txt2').value;
    var text3 = document.getElementById('txt3').value;
    var result = parseFloat(text1) + parseFloat(text2) + parseFloat(text3);
    if (!isNaN(result)) {
        document.getElementById('total').value = result;
    }
}
</script>
@endsection