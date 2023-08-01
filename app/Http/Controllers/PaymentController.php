<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use PayPal\Api\Amount;
// use PayPal\Api\Details;
// use PayPal\Api\Item;
// /** All Paypal Details class **/
// use PayPal\Api\ItemList;
// use PayPal\Api\Payer;
// use PayPal\Api\Payment;
// use PayPal\Api\PaymentExecution;
// use PayPal\Api\RedirectUrls;
// use PayPal\Api\Transaction;
// use PayPal\Auth\OAuthTokenCredential;
// use PayPal\Rest\ApiContext;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class PaymentController extends Controller
{
    public function payment(Request $request)
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
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->price
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

    public function success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);

        //dd($response);

        if(isset($response['status']) && $response['status'] == 'COMPLETED') {
            return "Payment is successful!";
        } else {
            return redirect()->route('paypal_cancel');
        }
    }

    public function cancel()
    {
        return "Payment is cancelled!";
    }
}







//     private $apiContext;
//     private $secret;
//     private $clientId;

//     public function _construct(){
//         // if(config("paypal.settings.mode")=="live"){
//         //     $this->clientId=config('paypal.live.client_id');
//         //     $this->secret=config('paypal.live.secret');
//         // }
//         // else{
//         //     $this->clientId=config('paypal.sandbox.client_id');
//         //     $this->secret=config('paypal.sandbox.secret');
//         // }
//         // $this->secret='EP0_24J5ArI9R_2RNRoZIm51_59rXCaD5Ml38621ckSRyJgsOqDi9LTATKYv_YgZ1ae9-yeYhLGWDogr';
//         // $this->clientId='AVJzUSqrDTo7rS4smtkJdlDg4dT7fws77OwOM_FepNvJ7UY3zBcawfLOd01--_jrUST0KdkzD4PpDsbr';

//         $this->clientId=config('paypal.sandbox.client_id');
//         $this->secret=config('paypal.sandbox.secret');
//         $this->apiContext=new apiContext(new OAuthTokenCredential($this->clientId,$this->secret));
//         $this->apiContext=setConfig(config('paypal.settings'));
//     }
//     public function payWithpaypal(Request $request){
//         $price=$request->input('price');
//         $name=$request->input('name');
//         $id=$request->input('id');
//         $quantity=$request->input('quantity');

//         //set payer
//         $payer = new Payer();
//         $payer->setPaymentMethod("paypal");

//         //set items

//         $item = new Item();
//         $item->setName($name)
//         ->setCurrency('USD')
//         ->setQuantity($quantity)
//         ->setPrice($price);


//         //set ItemList

//         $itemList = new ItemList();
//         $itemList->setItems([$item]);

//         //Amount
//         $amount = new Amount();
//         $amount->setCurrency("USD")
//         ->setTotal($price)
//         ->setDetails($price);

//         //transactions
//         $transaction = new Transaction();
//         $transaction->setAmount($amount)
//           ->setItemList($itemList)
//           ->setDescription("Payment description");

//           //RedirectUrls
//         $redirectUrls = new RedirectUrls();
//          $redirectUrls->setReturnUrl('http://paypal.local/status')
//         ->setCancelUrl('http://paypal.local/canceled');

//         //payment
//         $payment = new Payment();
//         $payment->setIntent("sale")
//         ->setPayer($payer)
//         ->setRedirectUrls($redirectUrls)
//         ->setTransactions(array($transaction));
//         try {
//             $payment->create($this->apiContext);
//         } catch (\PayPal\Exception\PPConnectionException $ex) {
//             die($ex);
//         }
//         $PaymentLink = $payment->getApprovalLink();
//         return redirect($PaymentLink) ;

//     }

//     public function canceled(){
//         return 'payment canceled';
//     }

//  public function status(Request $request){
// if(empty($request->input('PayerID'))||empty($request->input('token')))
// {
// die('payment failed');
// }
// $paymentId = $request->get($paymentId);
// $payment = Payment::get($paymentId, $this->apiContext);

// $execution = new PaymentExecution();
// $execution->setPayerId($request->input('PayerId'));
// $result=$payment->execute($execution,$this->apiContext);

//     if ($result->getState() == 'approved') {

//         /* Save order in database */
//        die('Thank You');
//     }
//     echo 'Payment Faild Again';
//         die($result);
//     }

// }
