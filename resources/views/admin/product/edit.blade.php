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
                        <span class="ml-1">Products</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Product</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Manage Products</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Products</h4>
                            <a href="{{route('product.index')}}" class="btn btn-primary btn-floating">All Products</a>
                        </div>
                        <div class="card-body">

                            <p class="text-success text-center" >{{session('message')}}</p>
                            <form class="form-horizontal" action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Category Name</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="category_id">
                                            <option value="">--Select Category--</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" @selected($category->id ==$product->category_id) >{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Sub Category Name</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="sub_category_id">
                                            <option value="">--Select Sub Category--</option>
                                            @foreach($subCategories as $subCategory)
                                                <option value="{{$subCategory->id}}" @selected($subCategory->id ==$product->sub_category_id) >{{$subCategory->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Brand</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="brand_id">
                                            <option value="">--Select Brand--</option>
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}" @selected($brand->id ==$product->brand_id) >{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Unit</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="unit_id">
                                            <option value="">--Select Unit--</option>
                                            @foreach($units as $unit)
                                                <option value="{{$unit->id}}" @selected($unit->id ==$product->unit_id)>{{$unit->code}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{$product->name}}" name="name" placeholder="Enter Your Product Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Code</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{$product->code}}" name="code" placeholder="Enter Your Product code">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Color</label>
                                    <div class="col-sm-10">
                                        <select class="multi-select" name="color[]" multiple="multiple">
                                            @foreach($colors as $color)
                                                <option value="{{$color->id}}" @foreach($product->productColors as $productColor) {{$color->id == $productColor->color_id ? 'selected' : ''}} @endforeach>{{$color->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Size</label>
                                    <div class="col-sm-10">
                                        <select class="multi-select" name="size[]" multiple="multiple">
                                            @foreach($sizes as $size)
                                                <option value="{{$size->id}}" @foreach($product->productSizes as $productSize) {{$size->id == $productSize->size_id ? 'selected' : ''}} @endforeach>{{$size->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Meta Title</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="meta_title" placeholder="Enter Your Meta Title">{{$product->meta_title}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Meta Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="meta_description" placeholder="Enter Your Meta Description">{{$product->meta_description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Product Price</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input class="form-control" type="number" value="{{$product->regular_price}}" name="regular_price" placeholder="Product Regular Price">
                                            <input class="form-control" type="number" value="{{$product->selling_price}}" name="selling_price" placeholder="Product Selling Price">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Stock Amount</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" value="{{$product->stock_amount}}" name="stock_amount" placeholder="Enter Your Stock Amount">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Short Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="short_description">{{$product->short_description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Long Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control summernote" name="long_description">{{$product->long_description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Product Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="images">
                                        <img src="{{asset($product->images)}}" alt="" height="180">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Others Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="others_images[]" multiple accept="image/*">
                                        @foreach($product->otherImages as $otherImage)
                                        <img src="{{asset($otherImage->image)}}" alt="" height="180">
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Update Product Info</button>
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
