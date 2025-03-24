<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.brand.index',['brands' =>Brand::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Brand::saveBrand($request);
        return redirect('/brand')->with('message','Brand Info saved Sucsessfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Brand::statusUpdate($id);
        return redirect('/brand')->with('message','Status Info Updated');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.brand.edit',['brand'=>Brand::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $id)
    {
        Brand::updateBrand($request,$id);
        return back('/brand')->with('message','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $id)
    {
        Brand::deleteBrand($id);
        return back('/brand')->with('message','Info Deleted');
    }
}
