<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;




class ProductReviewController extends Controller
{


    public function index()
    {


        // return view('backend.review.index')->with('reviews',$reviews);
    }




    public function store(Request $request)
    {
        $this->validate($request,[
            'rate'=>'required|numeric|min:1'
        ]);
        $product_info = Product::findOrFail($request->id);
        $id=Product::findOrFail($product_info->id);


        $data=$request->all();
        $data['product_id']=$product_info->id;
        $data['user_id']=$request->user()->id;

        ProductReview::create($data);
        $reviews=ProductReview::getAllReview()->first();


        return back();

    }

    public function destroy($id)
    {
        DB::table('product_reviews')->where([ ['id' ,'=',  $id ],['user_id' , '=' ,Auth::user()->id]])->delete();
        // ProductReview::findOrFail($id)->delete();

        return redirect()->back();
    }
}
