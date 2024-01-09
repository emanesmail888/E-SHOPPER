<?php

namespace App\Http\Controllers;
 use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Models\recommends;
use App\Models\Product;
use App\Models\ProductReview;
use Gloudemans\Shoppingcart\Facades\Cart;

use App\Models\Category;
use App\Models\products_properties;
use App\Models\SubCategory;
use App\Models\wishList;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
      */



     function index(Request $request)
     {


        $products=Product::paginate();
        $categories=Category::all();
        $subCategories=SubCategory::all();


        return view('front.home',compact(['categories','products','subCategories']));


     }

    public function showProducts($id)
    {


       $categories=Category::all();
        $category=Category::findOrFail($id);

        $products = DB::table('products')->where('category_id',$id)->paginate(9);

        return view('front.items',compact(['categories','category','products']));


}
//     public function products()
//     {


//        $categories=Category::all();

//         $products =Product::paginate(12);

//         return view('front.shop',compact(['categories','products']));


// }




    public function shop(Request $request)
    {
        if($request->ajax() ){


            $start= $request->get(  'start' );
            $end= $request->get( 'end' );


            $products = DB::table('products')->select('*')
           ->where('pro_price', '>=',  $start)
            ->where( 'pro_price' ,'<=',  $end)->orderBy('pro_price', 'ASC')->get();
            // return view('front.range', ['products' => $products])->render();


          return  view('front.priceRange',compact(['products']));

        }
         else{


            $products=Product::all();
            $categories=Category::all();
            $subCategories=SubCategory::all();
            return view('front.shop',compact(['categories','products','subCategories']));

        }
}
    public function filter(Request $request,$id)
    {
        if($request->ajax() ){
            $start= $request->start;
            $end=$request->end;
            $subCategory=SubCategory::findOrFail($id);
            $categories=Category::all();
           $cat_id=$subCategory->category_id;
           $products= DB::table('products')
           ->where('subCategories_id', $id)
           ->where('category_id',$cat_id )
            ->where('pro_price','>=',$start)
            ->where('pro_price','<=',$end)
            ->paginate(9);
            // dd($products);
             return view('front.filter',compact('products'));

        }
        else{
            $subCategory=SubCategory::findOrFail($id);
            $categories=Category::all();
            // $subCategories=SubCategory::all();
           $cat_id=$subCategory->category_id;
           $products= DB::table('products')
           ->where('subCategories_id', $id)
           ->where('category_id',$cat_id )->orderBy('spl_price', 'ASC')
          -> paginate(9);
        return view('front.products',compact(['categories','products']));
    }
}





   public function product_details($id)


   {
$products=Product::findOrFail($id);
// $items=Product::randomize(3)->get();;
// "select * from products order by rand() LIMIT 0,3"
$items=Product::all()->random(4);
    // $products = DB::table('products')->where('id',$id)->get();

          // return view('front.product_details', compact('products'));
       if(Auth::check()){
       $recommends = new recommends;
       $recommends ->uid = Auth::user()->id;
       $recommends ->pro_id = $id;
       $recommends ->save();
       }



        $Products = DB::table('products')->where('id',$id)->get();
        $reviews = DB::table('product_reviews')->where('product_id',$id)->paginate(10);
        $reviewsCount = DB::table('product_reviews')->where('product_id',$id)->count();
        $cartTotal = Cart::total();

       return view('front.product_details', compact('Products','items','reviews','reviewsCount','cartTotal'));




   }

   public function wishlist(Request $request) {

       $wishList = new wishlist;
       $wishList->user_id = Auth::user()->id;
       $wishList->pro_id = $request->pro_id;

       $wishList->save();
       return back();
    
   }

   public function View_wishList() {
    $Products = DB::table('wishlist')->where('user_id',Auth::user()->id)->leftJoin('products', 'wishlist.pro_id', '=', 'products.id')->get();


    //    $Products = DB::table('wishlist')->leftJoin('products', 'wishlist.pro_id', '=', 'products.id')->get();
       return view('front.wishList', compact('Products'));
   }

   public function removeWishList($id) {

       DB::table('wishlist')->where('pro_id', '=', $id)->delete();

       return back()->with('msg', 'Item Removed from Wishlist');
   }


   public function contact()
   {
       return view('front.contact');
   }

  public function selectSize(Request $request) {

       $proDum = $request->proDum;
       $size = $request->size;

       $s_price = DB::table('products_properties')->where('pro_id', $proDum)
       ->where('size', $size)
       ->get();


       foreach($s_price as $sPrice){
           echo "EGP P " .$sPrice->p_price;?>

            <input type="hidden" value="<?php echo $sPrice->p_price;?>" name="newPrice"/>
            <div style="background:<?php echo $sPrice->color;?>; width:40px; height:25px; margin-right:20px;"></div>
            <?php
       }
   }

   public function newArrival(){
    $products = DB::table('products')->where('new_arrival', 1)->paginate(6); // now we are fetching all products
    return view('front.newArrival', compact('products'));

}



}
