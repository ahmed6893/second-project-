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
                        <span class="ml-1">Add Unit</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Unit</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Add New Unit</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Unit</h4>
                            <a href="{{route('unit.index')}}" class="btn btn-primary btn-floating">All Units</a>
                        </div>
                        <div class="card-body">

                            <p class="text-success text-center" >{{session('message')}}</p>
                            <form class="form-horizontal" action="{{route('unit.store')}}" method="post" >
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Unit Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" placeholder="Enter Unit Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Unit Code</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="code" placeholder="Enter Unit Code">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Unit Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="description" placeholder="Enter Unit Description"> </textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Create New Unit</button>
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

