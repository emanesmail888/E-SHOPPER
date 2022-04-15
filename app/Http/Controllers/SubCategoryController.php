<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//          $categories =  Category::find($category_id);
//  $subCategories= subCategory::where('category_id',$category_id)->subcategories;
        $categories=Category::pluck('name','id');
        // $cats=Category::all();
        $subCategories=SubCategory::all();
        return view('Admin.category.subCategory',compact(['subCategories','categories']));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categories=Category::pluck('name','id');

        // return view('Admin.category.subCategory',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $formInput=$request->all();

        $this->validate($request,[
            'name'=>'required',
            'category_id'=>'required',


        ]);




        $subCategory=new SubCategory();
        // $categories=Category::where($request['category_id'],'id');
    //   $subCategory->category_id=Category::where($request['category_id'],'id');

       $subCategory->name=$request['name'];
       $subCategory->category_id=$request['category_id'];
       $subCategory->save();
    // subCategory::create($request->all());


        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $categories =  Category::find($category_id);
// $subCategories= subCategory::where('category_id',$category_id)->subcategories;
// return view('index')->withCategory($category)->withSubcategories($subcategories);
        //  $products=Category::find($id)->products;
          $subCategories=subCategory::all();
        //   $categories=Category::all();
        //   $categories=Category::all();
        //   $categories=Category::all();
          $categories=Category::all();
         return view('Admin.category.subCategory',compact(['categories','subCategories']));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }
}
