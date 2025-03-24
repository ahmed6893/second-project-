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
                        <span class="ml-1">Datatable</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Brands</h4>
                            <a href="{{route('brand.create')}}" class="btn btn-primary btn-floating">Add Brand</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <p class="text-success text-center">{{session('message')}}</p>
                                <table id="example" class="display table table-bordered" style="min-width: 845px">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Brand</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($brands as $brand)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$brand->name}}</td>
                                            <td><img src="{{asset($brand->image)}}" alt="" height="50"></td>
                                            <td>{{ $brand->status == 1 ? 'Active' : 'Inactive' }}</td>
                                            <td class="d-flex">
                                                <a href="{{route('brand.edit',$brand->id)}}" class="btn btn-primary me-2 ">Edit</a>

                                                @if($brand->status == 1)
                                                    <a href="{{route('brand.show',$brand->id)}}" class="btn btn-warning me-2">Inactive</a>
                                                @else
                                                    <a href="{{route('brand.show',$brand->id)}}" class="btn btn-success me-2">Active</a>
                                                @endif

                                                <form action="{{route('brand.destroy',$brand->id)}}" method="post">
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
