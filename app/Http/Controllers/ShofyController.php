<?php

namespace App\Http\Controllers;

use App\Models\OtherImages;
use App\Models\Product;
use Illuminate\Http\Request;

class ShofyController extends Controller
{
    public function index()
    {
        return view('website.home.index',[
            'products'=>Product::where('status',1)->get()
        ]);
    }
    public function product($id)
    {
        return view('website.product.index',['products' => Product::where('category_id',$id)->latest()->get()]);
    }
    public function subCategoryProduct($id)
    {
        return view('website.product.index',['products' => Product::where('sub_category_id',$id)->latest()->get()]);
    }
    public function productDetails($id)
    {
        return view('website.product.details',[
            'product' =>Product::where('id',$id)->first(),
            'productImages' => OtherImages::where('product_id',$id)->get()
        ]);
    }
    public function cart()
    {
        return view('website.cart.index');
    }

}
