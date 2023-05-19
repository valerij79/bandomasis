<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function viewOrders()
    {
        $orders = Order::all();
        return view('orders.view', compact('orders'));
    }

    public function confirmOrder($orderId)
    {
        $order = Order::find($orderId);
        // Patvirtinkite užsakymą arba atlikite kitus veiksmus
        return redirect()->back()->with('success', 'Užsakymas patvirtintas.');
    }
}
