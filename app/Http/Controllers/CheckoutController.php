<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Address;
use App\Models\orders;
use App\Models\Product;


class CheckoutController extends Controller
{
    public function index() {
        if(Auth::check()){
          $cartItems = Cart::content();

        // $condition1 = new \Darryldecode\Cart\CartCondition(array(
        //     'name' => 'VAT 5%',
        //     'type' => 'tax',
        //     'target' => 'subtotal', // this condition will be applied to cart's subtotal when getSubTotal() is called.
        //     'value' => '5%',
        //     'order' => 1
        // ));
        // $condition2 = new \Darryldecode\Cart\CartCondition(array(
        //     'name' => 'Express Shipping $10',
        //     'type' => 'shipping',
        //     'target' => 'total', // this condition will be applied to cart's subtotal when getSubTotal() is called.
        //     'value' => '+10',
        //     'order' => 2
        // ));
        // Cart::condition($condition1);
        // Cart::condition($condition2);
           return view('front.checkout', compact('cartItems'));

      }

    else {
        return redirect('login');
    }


}

public function formValidate(Request $request) {
    // $this-validate($request, ['fullName' => 'required|min:5|max:35,'],
    //         ['fullName.required'=>'enter full name']);
 $this->validate($request, [
     'fullName' => 'required|min:5|max:35',
     'pinCode' => 'required|numeric',
     'city' => 'required|min:5|max:25',
     'state' => 'required|min:5|max:35',
     'country' => 'required']);
     //dd('done');
     //dd($request->all());


    $userId = Auth::user()->id;
     $address = new Address;
     $address->fullName = $request->fullName;
     $address->state = $request->state;
     $address->city = $request->city;
    $address->country = $request->country;
     $address->user_id = $userId;
     $address->pinCode = $request->pinCode;

     $address->payment_type = $request->pay;

     $address->save();
     // dd('done');
     Orders::createOrder();

    //   Cart::remove($userId);
    return redirect('profile.thankyou');
}



}
