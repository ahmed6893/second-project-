@extends('admin.master')

@section('body')
    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, welcome back!</h4>
                        <span class="ml-1">Sub Category</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Order</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Manage Order</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Order Info</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <p class="text-success text-center">{{session('message')}}</p>
                                <table id="example" class="display table table-bordered text-dark" style="min-width: 845px">
                                    <tr>
                                        <th>Order Id</th>
                                        <td>{{$order->id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Order Date</th>
                                        <td>{{$order->order_date}}</td>
                                    </tr>
                                    <tr>
                                        <th>Order Status</th>
                                        <td>{{$order->order_status}}</td>
                                    </tr>
                                    <tr>
                                        <th>Order Total</th>
                                        <td>{{$order->order_total}}</td>
                                    </tr>
                                    <tr>
                                        <th>Customer Info</th>
                                        <td>
                                            Name:{{$order->customer->name}}<br/>
                                            Phone:{{$order->customer->phone}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tax Total</th>
                                        <td>{{$order->tax_total}}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping Total</th>
                                        <td>{{$order->shipping_total}}</td>
                                    </tr>
                                    <tr>
                                        <th>Delivery Address</th>
                                        <td>{{$order->delivery_address}}</td>
                                    </tr>
                                    <tr>
                                        <th>Delivery Status</th>
                                        <td>{{$order->delivery_status}}</td>
                                    </tr>
                                    <tr>
                                        <th>Delivery Date</th>
                                        <td>{{$order->delivery_date}}</td>
                                    </tr>
                                    <tr>
                                        <th>Payment Method</th>
                                        <td>{{$order->payment_method}}</td>
                                    </tr>
                                    <tr>
                                        <th>Payment Status</th>
                                        <td>{{$order->payment_status}}</td>
                                    </tr>
                                    <tr>
                                        <th>Payment Date</th>
                                        <td>{{$order->payment_date}}</td>
                                    </tr>
                                    <tr>
                                        <th>Currency</th>
                                        <td>{{$order->currency}}</td>
                                    </tr>
                                    <tr>
                                        <th>Transaction Id</th>
                                        <td>{{$order->transaction_id}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Order Info</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <p class="text-success text-center">{{session('message')}}</p>
                                <table id="example" class="display table table-bordered" style="min-width: 845px">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Product Name</th>
                                        <th>Product Code</th>
                                        <th>Unit Price</th>
                                        <th>Product Quantity</th>
                                        <th>Total Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->orderDetails as $orderDetail)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$orderDetail->product_name}}</td>
                                            <td>{{$orderDetail->product_code}}</td>
                                            <td>{{$orderDetail->product_color}}</td>
                                            <td>{{$orderDetail->product_size}}</td>
                                            <td>{{$orderDetail->product_price}}</td>
                                            <td>{{$orderDetail->product_qty}}</td>
                                            <td>{{$orderDetail->product_qty * $orderDetail->product_qty}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->

@endsection
