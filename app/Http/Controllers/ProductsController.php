<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Category;
use App\Models\products_properties;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\products_types;
use App\Models\SubCategory;
use Symfony\Contracts\Service\Attribute\Required;

class ProductsController extends Controller
{
    public function index(){
        $Products=Product::all();
        $categories=Category::all();
        return view('Admin.product.index',compact('Products','categories'));
    }

    public function create(){
        $categories=Category::pluck('name','id');
         $subCategories=SubCategory::pluck('name','id');

        return view('Admin.product.create',compact(['categories','subCategories']));
    }

    public function store(Request $request)

    {


        $formInput=$request->except('image');

        $this->validate($request,[
            'pro_name'=>'required',
            'pro_code'=>'required',
            'pro_price'=>'required|integer',
            'pro_info'=>'required',
            'spl_price'=>'required|integer',
            'stock'=>'required',
            'image'=>'image|mimes:png,jpg,jpeg|max:10000|required',
            'category_id'=>'required',
            'subCategories_id'=>'required',
        ]);



        $image=$request->image;
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images',$imageName);
            $formInput['image']=$imageName;
        }

        $categories=Category::all();
        Product::create($formInput);
        // return redirect()->route('admin.index');
        return redirect()->back();

}

public function show($id)
    {
        $product = Product::findOrFail($id);
        // $blog = Blog::whereSlug($slug)->first();
        return view('product.show', compact('products'));
        // var_dump($product);
    }

    public function ProductEditForm($id) {


        $Products = Product::findOrFail($id);
        $categories = Category::all();

        $prots = products_properties::all();

        return view('Admin.product.editProducts', compact('Products', 'categories','prots'));
    }
//     public function filterPrice($start_price,$end_price){
//         // $min_price=$_GET['start_price'];
//         //  $max_price=$_GET['end_price'];
//         // $start_price=$request->start_price;
//         // $end_price=$request->end_price;
//         // if($request->start_price && $request->end_price){
//         //     // This will only execute if you received any price
//         //     // Make you you validated the min and max price properly
//         //     $query = $query->where('price','>=',$request->min_price);
//         //     $query = $query->where('price','<=',$request->max_price);
//         // }

// $result= DB::table('products')
//                 ->whereBetween('pro_price',[$start_price,$end_price])->get();


//         //   $result =  "select * products where price BETWEEN '$start'' AND '$end' ";
// // dd($result);
//          return view('front.home',compact('result'));

     // return view('front.home',compact('filters'));
// }



  public function editProducts(Request $request, $id) {


        // $pro_id = $reqeust->id;
         $Products = DB::table('products')->where('id', '=', $id)->get();

       // $category = Category::findOrFail($id); // now we are fetching all products

        // Product::findOrFail($id)->update($request->all());
        //$products=Product::all();


        $proId = $request->id;

        $pro_name = $request->pro_name;
        $category_id = $request->cat_id;
        $pro_code = $request->pro_code;
        $pro_price = $request->pro_price;
        $pro_info = $request->pro_info;
        $spl_price = $request->spl_price;

        if($request->new_arrival =='null'){
            $new_arrival ='1';
        }
        else{
            $new_arrival= $request->new_arrival;
        }


        DB::table('products')->where('id', $proId)->update([
            'pro_name' => $pro_name,
            'category_id' => $category_id,
            'pro_code' => $pro_code,
            'pro_price' => $pro_price,
            'pro_info' => $pro_info,
            'spl_price' => $spl_price,
            'new_arrival' => $new_arrival,


        ]);
       return view('admin.product.index', compact('Products'));




    }


    public function ImageEditForm($id) {

        $Products = Product::findOrFail($id);

        return view('admin.product.ImageEditForm', compact('Products'));
    }

public function editProImage(Request $request) {


        $proid = $request->id;


        $image=$request->image;
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images',$imageName);
            $formInput['image']=$imageName;
        }





        DB::table('products')->where('id', $proid)->update(['image' => $imageName]);


        return redirect()->back();

    }


    public function destroy($id)
    {

          Product::findOrFail($id)->delete();

        return redirect()->back();
    }

    public function addProperty($id) {


        $Products = Product::findOrFail($id);



        return view('admin.product.addProperty', compact('Products'));
    }



  public function sumbitProperty(Request $request){

    $properties = new products_properties;
    $properties->pro_id = $request->pro_id;
    $properties->size = $request->size;
    $properties->color = $request->color;
    $properties->p_price = $request->p_price;
    $properties->save();

    return redirect()->back();



  }
  public function search(Request $request)
    {
    $query = $request->get('query');

    $products = Product::where('pro_name', 'LIKE', "%$query%")->get();
    return view('front.search', compact('products'));
}


 public function editProperty(Request $request){
         $uptProts = DB::table('products_properties')
          ->where('pro_id', $request->pro_id)
          ->where('id', $request->id)
          ->update($request->except('_token'));
          if($uptProts){
          return back()->with('msg', 'updated');
        }else {
        return back()->with('msg', 'check value again');
      }
  }

  public function getProductPrice(Request $request){

if($request->ajax()){
    $data=$request->all();
    $getProductPrice=products_properties::where(
        'pro_id' ,$request->product_id,
        'size' ,$request->size);
        return$getProductPrice->p_price;

}
 }




  public function addSale(Request $request){

     $salePrice = $request->salePrice;
       $pro_id = $request->pro_id;
       DB::table('products')->where('id', $pro_id)->update(['spl_price' => $salePrice]);
       echo 'added successfully';


     }





}
