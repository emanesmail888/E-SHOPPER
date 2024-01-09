<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\User;
use App\orders as AppOrders;

//use App\Http\Controllers\ProfileController;


class Orders extends Model
{
    use HasFactory;



    protected $fillable = ['total', 'status'];


    public function orderFields() {
       return $this->belongsToMany(Product::class)->withPivot('qty', 'total');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public static function createOrder() {

        // for order inserting to database

           // echo 'order done';

            $user=Auth::user();
          $order =$user->orders()->create(['total' => Cart::total(), 'status' => 'pending']);

         $cartItems = Cart::content();

         foreach ($cartItems as $cartItem) {
            $order->orderFields()->attach($cartItem->id, ['qty' => $cartItem->qty, 'tax' => Cart::tax(), 'total' => $cartItem->qty * $cartItem->price]);
        }
     }

     public static function createPaypalOrder() {

        // for order inserting to database

           // echo 'order done';

         $user=Auth::user();
          $order =$user->orders()->create(['total' => Cart::total(), 'status' => 'approved']);

         $cartItems = Cart::content();

         foreach ($cartItems as $cartItem) {
            $order->orderFields()->attach($cartItem->id, ['qty' => $cartItem->qty, 'tax' => Cart::tax(), 'total' => $cartItem->qty * $cartItem->price]);
        }
     }



}

