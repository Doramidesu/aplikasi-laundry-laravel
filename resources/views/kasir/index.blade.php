@extends('layouts.app')

@section('content')
<h4 class="fw-semibold mb-3">
    ➕ Transaksi Baru
</h4>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow-sm">
    <div class="card-body">

        <form method="POST" action="/kasir">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Pelanggan</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">No HP</label>
                <input type="text" name="phone" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Layanan</label>
                <select name="service_id" class="form-select" id="service">
                    @foreach($services as $service)
                        <option value="{{ $service->id }}"
                            data-price="{{ $service->price_per_kg }}">
                            {{ $service->name }} - Rp {{ number_format($service->price_per_kg) }}/kg
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Berat (kg)</label>
                <input type="number" step="0.1" name="weight" class="form-control" id="weight">
            </div>

            <div class="mb-3">
                <label class="form-label">Total Harga</label>
                <input type="text" id="total" class="form-control" readonly>
            </div>

            <button class="btn btn-primary">
                💾 Simpan Transaksi
            </button>

        </form>
    </div>
</div>

<script>
    const service = document.getElementById('service');
    const weight  = document.getElementById('weight');
    const total   = document.getElementById('total');

    function hitungTotal(){
        const price = service.options[service.selectedIndex].dataset.price;
        const w = weight.value;

        if(price && w){
            total.value = 'Rp ' + (price * w).toLocaleString('id-ID');
        } else {
            total.value = '';
        }
    }

    service.addEventListener('change', hitungTotal);
    weight.addEventListener('input', hitungTotal);
</script>
@endsection
