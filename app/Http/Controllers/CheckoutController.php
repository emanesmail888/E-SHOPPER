<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Address;
use App\Models\orders;
use App\Models\Product;
use App\Models\User;
use Srmklive\PayPal\Services\PayPal as PayPalClient;



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
  $this->validate($request,[
    'fullName' => 'required',
     'pinCode' => 'required|numeric',
     'city' => 'required',
     'state' => 'required',
     'country' => 'required',
     'payment_type' => 'required',
 ]);
     //dd($request->all());


    $userId = Auth::user()->id;
    $user = Address::where('user_id', '=',$userId)->get();
//for example:
if (!empty($user))
     $address = new Address;
     $address->fullName = $request->fullName;
     $address->state = $request->state;
     $address->city = $request->city;
     $address->country = $request->country;
     $address->user_id = $userId;
     $address->pinCode = $request->pinCode;
     $address->payment_type = $request->payment_type;

     $address->save();



     if( $address->payment_type=="COD"){
        Orders::createOrder();
        Cart::destroy();
       return redirect('profile.thankyou');


     }



     if( $address->payment_type=="paypal")
     {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal_success'),
                "cancel_url" => route('paypal_cancel')
            ],
            //  "order" => $order->id,

            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => Cart::total()
                    ]
                ]
            ]
        ]);

        //dd($response);

        if(isset($response['id']) && $response['id']!=null) {
            foreach($response['links'] as $link) {
                if($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('paypal_cancel');
        }
}
}


public function success(Request $request)
{
    $provider = new PayPalClient;
    $provider->setApiCredentials(config('paypal'));
    $paypalToken = $provider->getAccessToken();
    $response = $provider->capturePaymentOrder($request->token);

    //dd($response);

    if(isset($response['status']) && $response['status'] == 'COMPLETED') {

        $userId = Auth::user()->id;
        $order= Orders::createPaypalOrder();
        Cart::destroy();

        return redirect('profile.thankyou')->with('success', 'Payment is successful Order Reserved! ');

    } else {
        return redirect()->route('paypal_cancel');
    }
}

public function cancel()
{
    return "Payment is cancelled!";
}
}




