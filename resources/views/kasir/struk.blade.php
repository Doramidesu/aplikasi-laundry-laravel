<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: monospace;
            font-size: 12px;
        }
        .center {
            text-align: center;
        }
        hr {
            border: 1px dashed #000;
        }
    </style>
</head>
<body>

<div class="center">
    <h3>🧺 LAUNDRY BERSIH</h3>
    <small>Jl. Contoh No. 123</small>
</div>

<hr>

<p>
    <strong>Tanggal:</strong><br>
    {{ $trx->created_at->format('d/m/Y H:i') }}
</p>

<p>
    <strong>Pelanggan:</strong><br>
    {{ $trx->customer->name }}<br>
    {{ $trx->customer->phone ?? '-' }}
</p>

<hr>

<p>
    <strong>Layanan:</strong> {{ $trx->service->name }}<br>
    <strong>Berat:</strong> {{ $trx->weight }} kg<br>
    <strong>Harga/kg:</strong> Rp {{ number_format($trx->price_per_kg) }}
</p>

<hr>

<p>
    <strong>Total:</strong><br>
    <strong>Rp {{ number_format($trx->total_price) }}</strong>
</p>

<p>
    <strong>Status:</strong> {{ ucfirst($trx->status) }}
</p>

<hr>

<div class="center">
    <small>Terima kasih 🙏</small><br>
    <small>Simpan struk ini</small>
</div>

</body>
</html>
