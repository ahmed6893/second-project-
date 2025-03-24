@extends('admin.master')

@section('body')
    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Courier</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Courier</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Courier</h4>
                            <a href="{{route('courier.index')}}" class="btn btn-primary btn-floating">All Couriers</a>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" action="{{route('courier.update',$courier->id)}}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Courier Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{$courier->name}}" name="name" placeholder="Enter Your Brand Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Courier Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="image">
                                        <img src="{{asset($courier->image)}}" alt="" height="100">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Update Courier info</button>
                                    </div>
                                </div>
                            </form>
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
