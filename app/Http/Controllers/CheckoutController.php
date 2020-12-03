<?php

namespace App\Http\Controllers;

use App\Order;
use App\Customer;
use App\Shipping;
use App\OrderDetails;
use App\Mail\SentCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Cart;

class CheckoutController extends Controller
{
    public function checkout_form()
    {
        return view('frontend.checkout');
    }
    public function customer_sign_up(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email_address' => 'required|unique:customers,email_address',
            'phone_number' => 'required',
            'password' => 'required',
            'address' => 'required',
        ]);

        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email_address = $request->email_address;
        $customer->phone_number = $request->phone_number;
        $customer->password = bcrypt($request->password);
        $customer->address = $request->address;
        $customer->save();


        Session::put(['customer_id' => $customer->id]);
        Session::put(['customer_full_name' => $customer->first_name . '' . $customer->last_name]);
        Mail::to($customer->email_address)->send(new SentCustomer($customer));
        return redirect()->route('shipping');
    }
    public function shipping()
    {
        $customer = Customer::find(Session::get('customer_id'));
        return view('frontend.shipping', compact('customer'));
    }

    public function shipping_info_save(Request $request)
    {
        $shipping = new Shipping();
        $shipping->full_name = $request->full_name;
        $shipping->email_address = $request->email_address;
        $shipping->phone_number = $request->phone_number;
        $shipping->address = $request->address;
        $shipping->save();

        Session::put(['shipping_id' => $shipping->id]);
        return redirect()->route('payment');
    }

    public function payment()
    {
        return view('frontend.payment');
    }

    public function order_save(Request $request)
    {
        // return $request->payment_type;
        if ($request->payment_type == 'Cash') {

            $order = new Order();
            $order->customer_id = Session::get('customer_id');
            $order->shipping_id = Session::get('shipping_id');
            $order->total_price = Session::get('getSubTotal');
            $order->payment_type = $request->payment_type;
            $order->save();

            // return $order->id;

            $cartContents = Cart::getContent();
            foreach ($cartContents as $cartContent) {
                $order_detail = new OrderDetails();
                $order_detail->order_id = $order->id;
                $order_detail->product_id = $cartContent->id;
                $order_detail->product_name = $cartContent->name;
                $order_detail->product_image = $cartContent->attributes->product_image;
                $order_detail->product_price = $cartContent->price;
                $order_detail->product_quantity = $cartContent->quantity;
                $order_detail->save();
            }
            Cart::clear();
            return redirect('/');
        }
    }


    public function logout_customer()
    {
        session()->forget('customer_id', 'customer_full_name', 'shipping_id');
        return redirect('/');
    }

    public function customer_login(Request $request)
    {

        $customer =  Customer::where('email_address', $request->email_address)->first();
        if ($customer) {
            if (password_verify($request->password, $customer->password)) {
                Session::put(['customer_id' => $customer->id]);
                Session::put(['customer_full_name' => $customer->first_name . '' . $customer->last_name]);
                return redirect()->route('shipping');
            } else {
                return redirect()->route('customer_sign_up')->with('wrong_info', 'Password Invalid');
            }
        } else {
            return redirect()->route('customer_sign_up')->with('wrong_info', 'Email Doesnot Exist');
        }
    }
}
