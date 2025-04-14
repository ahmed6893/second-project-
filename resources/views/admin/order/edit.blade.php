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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Order Edit</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Order Edit Info</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <p class="text-success text-center">{{session('message')}}</p>
                                <form class="form-horizontal" action="{{route('order.update',$order->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Order Total</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{$order->order_total}}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Customer Info</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{$order->customer->name.'('.$order->customer->phone.')'}}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Courier</label>
                                        <div class="col-sm-10">

                                            <select class="form-control" name="courier_id">
                                                <option value="">-- Select Courier --</option>
                                                @foreach($couriers as $courier)
                                                <option value="{{$courier->id}}" @selected($order->courier_id == $courier->id)>{{$courier->name}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Delivery Address</label>
                                        <div class="col-sm-10">
                                            <textarea  class="form-control" name="delivery_address">{{$order->delivery_address}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Order Status</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="order_status">
                                                <option value="">-- Select Order Status --</option>
                                                <option value="pending" @selected($order->order_status == 'Pending')>Pending</option>
                                                <option value="processing" @selected($order->order_status == 'Processing')>Processing</option>
                                                <option value="complete" @selected($order->order_status == 'Complete')>Complete</option>
                                                <option value="cancel" @selected($order->order_status == 'Cancel')>Cancel</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Update Order Info </button>
                                        </div>
                                    </div>
                                </form>
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
