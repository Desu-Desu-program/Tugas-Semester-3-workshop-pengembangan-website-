<?php

namespace App\Http\Controllers;

use App\Events\OrderPlaced;
use App\Models\Order;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer')->latest()->get();
        $products = Product::orderBy('name')->get();

        return view('orders.index', compact('orders', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        $quantity = (int) $request->quantity;

        $order = Order::create([
            'user_id' => auth()->id(),
            'total_amount' => $product->price * $quantity,
        ]);

        $order->items()->create([
            'product_id' => $product->id,
            'quantity' => $quantity,
            'price' => $product->price,
            'subtotal' => $product->price * $quantity,
        ]);

        event(new OrderPlaced($order, auth()->user()));

        return redirect()->route('orders.index')->with('success', 'Order berhasil dibuat');
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