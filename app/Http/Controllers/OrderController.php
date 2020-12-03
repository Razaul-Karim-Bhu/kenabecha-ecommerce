<?php

namespace App\Http\Controllers;

use App\Order;
use App\Customer;
use App\Shipping;
use Illuminate\Http\Request;
use App\OrderDetails;
use PDF;

class OrderController extends Controller
{
    public function order_manage()
    {
        $orders = Order::all();
        return view('backend.manage_order', compact('orders'));
    }
    public function order_details($id)
    {

        $order = Order::find($id);
        $customer = Customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);
        $order_details = OrderDetails::where('order_id', $id)->get();
        return view('backend.order_detail', compact('order', 'customer', 'shipping', 'order_details'));
    }

    public function order_invoice($id)
    {

        $order = Order::find($id);
        $customer = Customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);
        $order_details = OrderDetails::where('order_id', $id)->get();
        return view('backend.order_invoice', compact('order', 'customer', 'shipping', 'order_details'));
    }
    public function order_invoice_download($id)
    {
        $order = Order::find($id);
        $customer = Customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);
        $order_details = OrderDetails::where('order_id', $id)->get();
        $pdf = PDF::loadView('backend.order_invoice_download', compact('order', 'customer', 'shipping', 'order_details'));
        return $pdf->download($customer->first_name . ' ' . $customer->last_name . '.' . 'pdf');
    }
    public function order_delete($id)
    {
        return $id;
    }
}
