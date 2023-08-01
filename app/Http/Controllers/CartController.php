<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;


class CartController extends Controller
{
    //
    public function index() {
        $cartItems = Cart::content();
        return view('cart.index', compact('cartItems'));
    }

    public function addItem2(Request $request, $id) {
        // echo $id;

        $product = Product::find($id);

        if(isset($request->newPrice))

        {
           $price = $request->newPrice; // if size selected
        }

        else{
         $price = $product->pro_price; // default price
        }
        $quantity = $request->input('qty');
        Cart::add($id, $product->pro_name, $quantity, $price, ['img' => $product->image, 'stock' => $product->stock]);
         return back();
   }



     public function addItem(Request $request, $id) {
         // echo $id;

         $product = Product::find($id);

         if(isset($request->newPrice))

         {
            $price = $request->newPrice; // if size selected
         }

         else{
          $price = $product->pro_price; // default price
         }
         $quantity = $request->input('qty');

         Cart::add($id, $product->pro_name, 1, $price, ['img' => $product->image, 'stock' => $product->stock]);
          return back();
    }

    public function destroy($id){
        Cart::remove($id);
        // echo $id;
        return back();
    }

//    public function  update(Request $request, $id){

//       Cart::update($id, $request->qty);
//       return back();
//     }


public function update(Request $request,$rowId)

{
     $cart = Cart::get($rowId);

    if(isset($request->qty))

    {
        $cart->qty = $request->qty;
    }

   return back()->with('success', 'Item quantity updated in your cart');

}
// public function  update(Request $request, $id){

//  $qty = $request->qty;
//   $proId = $request->proId;

//   $rowId = $request->id; // for update

//   Cart::update($rowId, $qty);
//   // $cartItems = Cart::update($rowId, $qty);
//   $cartItems = Cart::content();
//   return view('cart.upCart', compact('cartItems'))->with('status', 'cart updated');
  // echo Cart::content(); // for display all new data of cart


  // $product = product::find($proId);
  // $stock = $product->stock;



  // if($qty<$stock) {
  //     $msg = 'Cart is updated';
  //    Cart::update($id, $request->qty);
  //    return back()->with('status', $msg);
  // } else{
  //    $msg = 'Please check your qty is more than product stock';
  //    return back()->with('error', $msg);

  // }

  }

