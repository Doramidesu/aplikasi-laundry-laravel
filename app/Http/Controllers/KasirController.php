<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Customer;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index()
    {
        return view('kasir.index', [
            'services' => Service::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required',
            'phone'      => 'nullable|string|max:20',
            'service_id' => 'required|exists:services,id',
            'weight'     => 'required|numeric|min:0.1',
        ]);

        // ✅ FIX UTAMA: handle phone nullable
        if ($request->filled('phone')) {
            $customer = Customer::firstOrCreate(
                ['phone' => $request->phone],
                ['name' => $request->name]
            );
        } else {
            $customer = Customer::create([
                'name'  => $request->name,
                'phone' => null,
            ]);
        }

        $service = Service::findOrFail($request->service_id);

        Transaction::create([
            'customer_id' => $customer->id,
            'service_id'  => $service->id,
            'weight'      => $request->weight,
            'price_per_kg'=> $service->price_per_kg,
            'total_price' => $service->price_per_kg * $request->weight,
            'status'      => 'pending',
        ]);

        return back()->with('success', 'Transaksi berhasil disimpan');
    }

    public function list()
    {
        $transactions = Transaction::with(['customer', 'service'])
            ->orderByDesc('created_at')
            ->get();

        return view('kasir.list', compact('transactions'));
    }

    public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:pending,proses,selesai,diambil',
    ]);

    $trx = Transaction::findOrFail($id);
    $trx->status = $request->status;
    $trx->save();

    return back()->with('success', 'Status berhasil diperbarui');
}

public function dashboard()
{
    $today = Carbon::today();

    $totalTransaksi = Transaction::whereDate('created_at', $today)->count();
    $totalPendapatan = Transaction::whereDate('created_at', $today)->sum('total_price');

    $pending = Transaction::where('status', 'pending')->count();
    $proses = Transaction::where('status', 'proses')->count();
    $selesai = Transaction::where('status', 'selesai')->count();

    return view('kasir.dashboard', compact(
        'totalTransaksi',
        'totalPendapatan',
        'pending',
        'proses',
        'selesai'
    ));
}

public function struk($id)
{
    $trx = Transaction::with(['customer', 'service'])->findOrFail($id);

    $pdf = Pdf::loadView('kasir.struk', compact('trx'))
              ->setPaper('A6', 'portrait');

    return $pdf->stream('struk-laundry.pdf');
}



}
