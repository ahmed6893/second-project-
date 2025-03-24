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
                        <span class="ml-1">Product</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Product</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Product Details</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Products Detail Info</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display table table-bordered text-dark" style="min-width: 845px">
                                    <tr>
                                        <th>Product ID</th>
                                        <td>{{$product->id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Name</th>
                                        <td>{{$product->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Code</th>
                                        <td>{{$product->code}}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Category</th>
                                        <td>{{$product->category->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Sub Category</th>
                                        <td>{{$product->subcategory->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Brand</th>
                                        <td>{{$product->brand->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Unit</th>
                                        <td>{{$product->unit->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Color</th>
                                        <td>
                                            @foreach($product->productColors as $productColor)
                                                {{$productColor->color->name}}
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Product Size</th>
                                        <td>
                                            @foreach($product->productSizes as $productSize)
                                                {{$productSize->size->name}}
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Meta Title</th>
                                        <td>{{$product->meta_title}}</td>
                                    </tr>
                                    <tr>
                                        <th>Meta Description</th>
                                        <td>{{$product->meta_description}}</td>
                                    </tr>
                                    <tr>
                                        <th>Regular Price</th>
                                        <td>{{$product->regular_price}}</td>
                                    </tr>
                                    <tr>
                                        <th>Selling Price</th>
                                        <td>{{$product->selling_price}}</td>
                                    </tr>
                                    <tr>
                                        <th>Short Description</th>
                                        <td>{{$product->short_description}}</td>
                                    </tr>
                                    <tr>
                                        <th>Long Description</th>
                                        <td>{!! $product->long_description !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Stock Amount</th>
                                        <td>{{$product->stock_amount}}</td>
                                    </tr>
                                    <tr>
                                        <th>Total View</th>
                                        <td>{{$product->hit_count}}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Sales</th>
                                        <td>{{$product->sales_count}}</td>
                                    </tr>
                                    <tr>
                                        <th>Featured Status</th>
                                        <td>{{$product->featured_status == 0 ? 'No Featured' : 'Featured'}}</td>
                                    </tr>
                                    <tr>
                                        <th>Image</th>
                                        <td><img src="{{asset($product->images)}}" alt="" height="180"></td>
                                    </tr>
                                    <tr>
                                        <th>Other Image</th>
                                        <td>
                                            @foreach($product->otherImages as $otherImage)
                                            <img src="{{asset($otherImage->image)}}" alt="" height="180">
                                            @endforeach
                                        </td>
                                    </tr>
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
