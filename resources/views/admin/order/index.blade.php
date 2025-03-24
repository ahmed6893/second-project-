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
                                <table id="example" class="display table table-bordered" style="min-width: 845px">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Customer Info</th>
                                        <th>Order Date</th>
                                        <th>Order Total</th>
                                        <th>Order Status</th>
                                        <th>Payment Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$order->customer->name}}</td>
                                            <td>{{$order->order_date}}</td>
                                            <td>{{$order->order_total}}</td>
                                            <td>{{$order->order_status}}</td>
                                            <td>{{$order->payment_status}}</td>
                                            <td class="d-flex">
                                                <a href="{{route('order.detail',$order->id)}}" title="Order Detail" class="btn btn-info me-2">
                                                    <i class="fa fa-bookmark-o"></i>
                                                </a>
                                                <a href="{{route('order.edit',$order->id)}}" title="Order Edit" class="btn btn-primary me-2 {{$order->order_status == 'Complete' ? 'disabled' : ''}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{route('order.invoice',$order->id)}}" title="Order Invoice" class="btn btn-success me-2">
                                                    <i class="fa fa-book"></i>
                                                </a>
                                                <a href="{{route('order.download-invoice',$order->id)}}" target="_blank" title="Download Invoice" class="btn btn-secondary me-2">
                                                    <i class="fa fa-download"></i>
                                                </a>
                                                <form action="{{route('order.destroy',$order->id)}}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger {{$order->order_status == 'Cancel' ? '' : 'disabled'}}" onclick="return confirm('Are You Sure..');">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
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
