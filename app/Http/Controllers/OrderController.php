<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer')->latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function invoice(Order $order)
    {
        $order = Order::with('items.product', 'customer')->findOrFail($order->id);

        $invoice = $order;
        foreach ($invoice->items as $item) {
            if (!isset($item->total)) {
                $item->total = $item->subtotal ?? ($item->price * $item->quantity);
            }
        }
        $invoice->total = $invoice->total_amount ?? 0;

        $pdf = Pdf::loadView('invoices.invoice', ['invoice' => $invoice]);

        return $pdf->download('invoice_' . $invoice->id . '.pdf');
    }
}