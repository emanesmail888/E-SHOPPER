<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;

class CategoriesController extends Controller
{
    public function index(){

        $products=Product::all();
        $categories=Category::all();
        return view('Admin.category.index',compact(['categories','products']));
    }

    public function create(){


    }

    public function store(Request $request)
    {
        // $subCategories=Category::pluck('name','id');

         Category::create($request->all());

        // $sCategory=new SubCategory();
        // $sCategory->name=$this->name;
        // $sCategory->name=$this->slug;
        // $sCategory->category_id=$this->category_id;
        // $sCategory->save();
        // return view('admin.category.index');

        // $formInput=$request->all();

        // $this->validate($request,[
        //     'name'=>'required',
        //     'slug'=>'required',

        // ]);
        // $categories = DB::table('categories')->get();

        // Category::create($formInput);
        // return redirect()->route('admin.index');
        //  return view('admin.category.index',compact('subCategories'));

        return redirect()->back();








        // $categories=Category::all();
        // return redirect()->route('admin.index');
        // return redirect()->back();

    }

    public function show($id)
    {

        // $products=Category::find($id)->products;
        $categories=Category::all();
        $subCategories=subCategory::pluck('name');
        return view('admin.category.index',compact(['categories'
        ,'subCategories']));
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {

         Category::findOrFail($id)->delete();

        return redirect()->back();
    }


}
