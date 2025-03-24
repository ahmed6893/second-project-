<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        return view('website.customer.profile', ['orders' => Order::where('customer_id', Session::get('customerId'))->get()]
            , ['customer' => Customer::find(Session::get('customerId'))]
        );
    }

    public $customer;
    public function update_password(Request $request)
    {
        if($request->new_password == $request->confirm_password)
        {
            $customer = Customer::getSingle(Auth::user()->id);

            if (Hash::check($request->old_password, $customer->password))
            {
                $customer->password =Hash::make($request->new_password);
                $customer->save();

                return redirect()->with('message','Password Successfully Updated');
            }
            else
            {
                return redirect()->with('error','Old Password is not Correct');
            }
        }
        else
        {
            return redirect()->with('error','New Password and Confirm Password does not match!');
        }
    }

    public function order()
    {
        return view('website.customer.order');
    }
    public function information()
    {
        return view('website.customer.information');
    }
    public function password()
    {
        return view('website.customer.password');
    }
}
