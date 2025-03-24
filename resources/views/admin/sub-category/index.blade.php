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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Sub Category</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Manage Sub Category</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Sub Category Info</h4>
                            <a href="{{route('sub-category.create')}}" class="btn btn-primary btn-floating">Add Sub Category </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <p class="text-success text-center">{{session('massage')}}</p>
                                <table id="example" class="display table table-bordered" style="min-width: 845px">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sub_categories as $sub_category)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$sub_category->category_id}}</td>
                                            <td>{{$sub_category->name}}</td>
                                            <td>{{$sub_category->description}}</td>
                                            <td><img src="{{asset($sub_category->image)}}" alt="" height="50"></td>
                                            <td class="d-flex">
                                                <a href="{{route('sub-category.edit',$sub_category->id)}}" class="btn btn-primary ">Edit</a>
                                                <form action="{{route('sub-category.destroy',$sub_category->id)}}" method="post">
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
