<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use App\Models\Order;
use App\Models\OrderDetail;
use PDF;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.order.index',['orders' => Order::all()]);
    }

    public function detail($id)
    {
        return view('admin.order.detail',['order' => Order::find($id)]);
    }
    private $order;
    public function update(Request $request,$id)
    {
        $this->order = Order::find($id);
        if ($request->order_status == 'pending' || $request->order_status == 'cancel')
        {
            $this->order->order_status      = $request->order_status;
            $this->order->delivery_status   = $request->order_status;
            $this->order->payment_status    = $request->order_status;
        }
        elseif ($request->order_status == 'processing')
        {
            $this->order->order_status =     $request->order_status;
            $this->order->delivery_status =  $request->order_status;
            $this->order->delivery_address = $request->delivery_address;
            $this->order->payment_status =   $request->order_status;
            $this->order->courier_id =       $request->courier_id;
        }

        elseif ($request->order_status == 'complete')
        {
            $this->order->order_status       = $request->order_status;
            $this->order->delivery_status    = $request->order_status;
            $this->order->delivery_date      = date('Y-m-d');
            $this->order->delivery_timestamp = strtotime(date('Y-m-d'));
            $this->order->payment_status     = $request->order_status;
            $this->order->payment_date       = date('Y-m-d');
            $this->order->payment_timestamp  = strtotime(date('Y-m-d'));
        }
        $this->order->save();
        return redirect('/order')->with('message','Order Status info updated Successfully.');
    }

    public function edit($id)
    {
        if (Order::find($id)->order_status == 'complete')
        {
            return back()->with('message','Sorry It Cannot Be Edited');
        }
        return view('admin.order.edit',['order' => Order::find($id),'couriers'=> Courier::all()]);
    }

    public function invoice($id)
    {
        return view('admin.order.invoice',['order' => Order::find($id)]);
    }

    public $pdf;
    public function downloadInvoice($id)
    {
        $pdf = PDF::loadView('admin.order.download-invoice',['order' => Order::find($id)]);
        return $pdf->stream();
    }

    public $orderDetails;
    public function destroy(Request $request,$id)
    {
        if (Order::find($id)->order_status == 'Cancel')
        {
            $this->orderDetails = OrderDetail::where('order_id',$id)->get();
            foreach ($this->orderDetails as $orderDetail)
            {
                $orderDetail->delete();
            }
            Order::find($id)->delete();
            return back()->with('message','Order Info Deleted Successfully');
        }
        else
            {
                return back()->with('message','Sorry .. It Cannot be Deleted');
            }
    }
}
