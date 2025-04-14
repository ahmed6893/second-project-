<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Cart;
use Session;
use Mail;
use App\Http\Controllers\SslCommerzPaymentController;

class CheckoutController extends Controller
{
    public function index()
    {
        if( count(Cart::content()) == 0)
        {
            return redirect('/cart')->with('message','Your Shopping Cart Is Empty.After add product in cart then go to the checkout');
        }
        if(Session::get('customerId'))
        {
            return view('website.checkout.index');
        }
        Session::put('checkout','checkout');
        return redirect('/customer/login');

    }

    public $customer , $order , $orderDetail ,$sslCommerze;
    public function newOrder(Request $request)
    {
        if ($request->payment_method =='cash')
        {
            $this->order = new Order();
            $this->order->customer_id       = Session::get('customerId');
            $this->order->order_total       = Session::get('order_total');
            $this->order->tax_total         = Session::get('tax_total');
            $this->order->shipping_total    = Session::get('shipping_total');
            $this->order->order_date        = date('Y-m-d');
            $this->order->order_timestamp   = strtotime(date('Y-m-d'));
            $this->order->delivery_address  = $request->delivery_address;
            $this->order->payment_method    = $request->payment_method;
            $this->order->save();

            foreach (Cart::content() as $item)
            {
                $this->orderDetail = new OrderDetail();
                $this->orderDetail->order_id        = $this->order->id;
                $this->orderDetail->product_id      = $item->id;
                $this->orderDetail->product_name    = $item->name;
                $this->orderDetail->product_code    = $item->options->code;
                $this->orderDetail->product_price   = $item->price;
                $this->orderDetail->product_qty     = $item->qty;
                $this->orderDetail->product_color   = $item->options->color;
                $this->orderDetail->product_size    = $item->options->size;
                $this->orderDetail->save();

                Cart::remove($item->rowId);
            }
            $title = 'Thank You For Your Order';
            $body = 'Wellcome to our Website';

            Mail::to(Customer::find($this->order->customer_id)->email)->send(new OrderMail($title, $body));
            return redirect('/complete-order')->with('message','Your order save successfully .Please wait we will contact with you soon');
        }

        $customer           = Customer::find(Session::get('customerId'));
        $this->sslCommerze  = new SslCommerzPaymentController();
        $this->sslCommerze->index($request,$customer);
    }

    public function completeOrder()
    {
        return view('website.checkout.complete-order');
    }
}
