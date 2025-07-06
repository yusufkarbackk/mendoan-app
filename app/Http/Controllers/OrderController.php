<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor'         => 'required|string|max:20',
            'alamat'       => 'required|string|max:255',
            'quantity'      => 'required|integer|min:1',
            'notes'         => 'nullable|string|max:255',
            'payment_method'=> 'required|string|in:cash,transfer',
        ]);

        $order = Order::create([
            'nomor'         => $validated['nomor'],
            'alamat'        => $validated['alamat'],
            'quantity'      => $validated['quantity'],
            'catatan'       => $validated['notes'] ?? null,
            'payment_method'=> $validated['payment_method'],  // default payment method
            'total'         => $validated['quantity'] * 14000, // total will be calculated later
        ]);  
        //dd($order->toArray()); // debug output, remove in production
        // pastikan model Order fillable
        return redirect()->route('orders.success', ['order' => $order->id]);
    }

    public function pending(Order $order)
    {
        return view('orders.success', [
            'order'        => $order,
            // rekening bisa dari .env / config
            'bankAccounts' => [
                [
                    'bank'   => 'BCA',
                    'number' => '1234567890',
                    'name'   => 'PT Warung Kita',
                ],
                [
                    'bank'   => 'Mandiri',
                    'number' => '9876543210',
                    'name'   => 'PT Warung Kita',
                ],
            ],
        ]);
    }
}
