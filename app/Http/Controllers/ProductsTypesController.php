<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\products_types;
use App\Models\SubCategory;
use Illuminate\Http\Request;


class ProductsTypesController extends Controller
{

    public function index(){

        $products=Product::all();
        $subCategories=SubCategory::all();
        return view('Admin.products_types',compact(['subCategories','products']));
    }

    public function store(Request $request)
    {

        products_types::create($request->all());
        return back();
    }

    public function show($id)
    {

        // $products=products_types::find($id)->products;
        $products_types=products_types::all();
        return view('Admin.products_types',compact(['products_types',]));
    }
    public function destroy($id)
    {

        products_types::findOrFail($id)->delete();

        return redirect()->back();
    }



}
