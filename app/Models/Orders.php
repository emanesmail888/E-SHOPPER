<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\User;
//use App\Http\Controllers\ProfileController;


class Orders extends Model
{
    use HasFactory;
    protected $fillable=['total','status'];

    public static function createOrder(){
        //echo 'order done';
       $user=Auth::user();
       $order=$user->orders()->create(['total'=>Cart::getTotal(),'status'=>'pending']);
       $cartItems=Cart::getContent();
       // or add multiple conditions from different condition instances
$condition1 = new \Darryldecode\Cart\CartCondition(array(
    'name' => 'VAT 5%',
    'type' => 'tax',
    'target' => 'subtotal', // this condition will be applied to cart's subtotal when getSubTotal() is called.
    'value' => '5%',
    'order' => 2
));
$condition2 = new \Darryldecode\Cart\CartCondition(array(
    'name' => 'Express Shipping $10',
    'type' => 'shipping',
    'target' => 'subtotal', // this condition will be applied to cart's subtotal when getSubTotal() is called.
    'value' => '+10',
    'order' => 2
));
Cart::condition($condition1);
Cart::condition($condition2);
        foreach($cartItems as $cartItem){
            $order->orderFields()->attach($cartItem->id,['qty'=>$cartItem->quantity,'tax'=>Cart::getConditions(),
            'total'=>$cartItem->quantity * $cartItem->price],);
        }

    }


    public function orderFields(){
        return $this->belongsToMany(Product::class)->withPivot('qty','total');
    }

}
