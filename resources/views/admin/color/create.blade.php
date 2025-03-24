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
                        <span class="ml-1">Color</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Color</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Add New Color</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Color</h4>
                            <a href="{{route('color.index')}}" class="btn btn-primary btn-floating">All Colors</a>
                        </div>
                        <div class="card-body">
                            <p class="text-success text-center" >{{session('message')}}</p>
                            <form class="form-horizontal" action="{{route('color.store')}}" method="post" >
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Color Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" placeholder="Enter Color Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Color Code</label>
                                    <div class="col-sm-10">
                                        <input type="color" class="form-control" name="code" placeholder="Enter Color Code">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Color Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="description" placeholder="Enter Color Description"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Create New Color</button>
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

