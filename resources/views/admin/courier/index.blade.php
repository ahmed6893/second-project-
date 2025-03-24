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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Manage Courier</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Couriers</h4>
                            <a href="{{route('courier.create')}}" class="btn btn-primary btn-floating">Add a Courier</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <p class="text-success text-center">{{session('message')}}</p>
                                <table id="example" class="display table table-bordered" style="min-width: 845px">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Courier</th>
                                        <th>LOGO</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($couriers as $courier)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$courier->name}}</td>
                                            <td><img src="{{asset($courier->image)}}" alt="" height="50"></td>
                                            <td class="d-flex">
                                                <a href="{{route('courier.edit',$courier->id)}}" class="btn btn-primary me-2 ">Edit</a>
                                                <form action="{{route('courier.destroy',$courier->id)}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure..');">Delete</button>
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
