@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Selamat Datang {{ Auth::user()->name }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    Anda berada pada halaman Pengecekan Barang.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection