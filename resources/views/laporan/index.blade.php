@extends('layouts.layout')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Laporan Per Periode</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('laporan.generate') }}" method="post">
                    @csrf
                    <div class="form-row align-items-center">
                        <div class="col-md-5 mb-3">
                            <label for="start_date" class="sr-only">Start Date:</label>
                            <input type="date" id="start_date" name="periode[start_date]" class="form-control" required>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="end_date" class="sr-only">End Date:</label>
                            <input type="date" id="end_date" name="periode[end_date]" class="form-control" required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <button type="submit" class="btn btn-primary">Buat Laporan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
