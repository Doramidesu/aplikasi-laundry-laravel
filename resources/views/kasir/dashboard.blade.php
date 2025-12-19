@extends('layouts.app')

@section('content')
<h2 class="mb-4">Dashboard Laundry</h2>

<div class="row g-3">
    <div class="col-md-4">
        <div class="card shadow-sm text-bg-primary">
            <div class="card-body">
                <small>Total Transaksi Hari Ini</small>
                <h3>{{ $totalTransaksi }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm text-bg-success">
            <div class="card-body">
                <small>Pendapatan Hari Ini</small>
                <h3>Rp {{ number_format($totalPendapatan) }}</h3>
            </div>
        </div>
    </div>
</div>
@endsection
