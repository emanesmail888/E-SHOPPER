<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
//use App\Http\Controllers\Hash;
use App\Models\Address;
use App\Models\Product;
use App\Models\Orders;
use App\Models\User;

class ProfileController extends Controller
{
    public function index(){
        return view('profile.index');
    }

    public function orders() {
        $user_id = Auth::user()->id;
        // $orders=Orders_products::all();
        $orders = DB::table('orders_product')->leftJoin(
            'products', 'products.id', '=', 'orders_product.product_id')->
            leftJoin('orders', 'orders.id', '=', 'orders_product.orders_id')->
            where('orders.user_id', '=', $user_id)->get();
        return view('profile.orders', compact('orders'));
    }

    public function Address() {
        $user_id = Auth::user()->id;
        $address_data = DB::table('address')->where('user_id', '=', $user_id)->get();
        return view('profile.address', compact('address_data'));
    }



        public function updateAddress(Request $request) {
            $this->validate($request, [
            'fullName' => 'required|min:5|max:35',
            'pinCode' => 'required|numeric',
            'city' => 'required|min:5|max:25',
            'state' => 'required|min:5|max:25',
            'country' => 'required']);

            $userId = Auth::user()->id;
            DB::table('address')->where('user_id', $userId)->update($request->except('_token'));

            return back()->with('msg','Your address has been updated');
        }


        public function Password() {
            return view('profile.updatePassword');
        }


        public function updatePassword(Request $request) {
            $oldPassword = $request->oldPassword;

            $newPassword = $request->newPassword;


            if(!Hash::check($oldPassword, Auth::user()->password)){
              return back()->with('msg','The specified password does not match the database password'); //when user enter wrong password as current password

            }else{
                $request->user()->fill(['password' => Hash::make($newPassword)])->save(); //updating password into user table
               return back()->with('msg','Password has been updated');
            }
           // echo 'here update query for password';
        }

        public function ImageProfileForm($id) {

            $user = User::findOrFail($id);

            return view('profile.ImageProfileForm', compact('user'));
        }

    public function editProfileImage(Request $request) {


            $user_id = $request->id;


            $image=$request->image;
            if($image){
                $imageName=$image->getClientOriginalName();
                $image->move('images',$imageName);
                $formInput['image']=$imageName;
            }

            DB::table('users')->where('id', $user_id)->update(['avatar' => $imageName]);


            return redirect()->back();

        }





}

