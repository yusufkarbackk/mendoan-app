<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create()
    {
        return view('orders.create');
    }

    public function store(StoreOrderRequest $request)
    {
        //dd($request->all()); // debug output, remove in production
        $data = $request->validated();

        $data['total'] = $data['quantity'] * 14000;
        //dd($order->toArray()); // debug output, remove in production
        // pastikan model Order fillable

        $order = Order::create($data);
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
                    'number' => env('NOMOR_REKENING'),
                    'name'   => 'Dewi Trimaisari',
                ],
                [
                    'bank'   => 'Gopay',
                    'number' => env('NOMOR_GOPAY'),
                    'name'   => 'Yusuf Rafif Karback',
                ],
            ],
        ]);
    }
}
