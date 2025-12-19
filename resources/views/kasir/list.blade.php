@extends('layouts.app')

@section('content')
<h4 class="fw-semibold mb-3">
    📋 Daftar Transaksi
</h4>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow-sm">
<div class="table-responsive">
<table class="table table-bordered align-middle mb-0">

<thead class="table-dark text-center">
<tr>
    <th>Tanggal</th>
    <th>Pelanggan</th>
    <th>No HP</th>
    <th>Layanan</th>
    <th>Berat</th>
    <th>Total</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>
@forelse($transactions as $trx)
<tr>
    <td>{{ $trx->created_at->format('d/m/Y H:i') }}</td>
    <td>{{ $trx->customer->name }}</td>
    <td>{{ $trx->customer->phone ?? '-' }}</td>
    <td>{{ $trx->service->name }}</td>
    <td class="text-center">{{ $trx->weight }}</td>
    <td>Rp {{ number_format($trx->total_price) }}</td>

    {{-- STATUS --}}
    <td class="text-center">
        <span class="badge bg-{{ 
            $trx->status == 'pending' ? 'secondary' :
            ($trx->status == 'proses' ? 'warning' :
            ($trx->status == 'selesai' ? 'success' : 'primary'))
        }}">
            {{ ucfirst($trx->status) }}
        </span>
    </td>

    {{-- AKSI --}}
    <td>
        <div class="d-flex gap-2">
            {{-- Update Status --}}
            <form method="POST"
                  action="/kasir/transaksi/{{ $trx->id }}/status"
                  class="d-flex gap-2">
                @csrf
                <select name="status" class="form-select form-select-sm">
                    <option value="pending"  {{ $trx->status=='pending'?'selected':'' }}>Pending</option>
                    <option value="proses"   {{ $trx->status=='proses'?'selected':'' }}>Proses</option>
                    <option value="selesai"  {{ $trx->status=='selesai'?'selected':'' }}>Selesai</option>
                    <option value="diambil"  {{ $trx->status=='diambil'?'selected':'' }}>Diambil</option>
                </select>
                <button class="btn btn-sm btn-primary">Update</button>
            </form>

            {{-- Cetak Struk PDF --}}
            <a href="/kasir/transaksi/{{ $trx->id }}/struk"
               target="_blank"
               class="btn btn-sm btn-outline-secondary">
               🧾 Struk
            </a>
        </div>
    </td>
</tr>
@empty
<tr>
    <td colspan="8" class="text-center text-muted">
        Belum ada transaksi
    </td>
</tr>
@endforelse
</tbody>

</table>
</div>
</div>
@endsection
