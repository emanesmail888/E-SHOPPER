@extends('front.master')

@section('content')
 <canvas class="my-4 w-100"  width="100" height="3"></canvas>


<?php if ($cartItems->isEmpty()) { ?>
<br>
<br>
<br>
    <section id="cart_items">
        <div class="container">
            <div class=" d-block  text-center">  <img src="{{asset('dist/img/empty-cart.png')}}"/></div>
        </div>
    </section>

<?php } else { ?>
<br>
<br>
    <section id="cart_items">
        <div class="container">
          <h1 class="text-warning text-center">Shopping Cart</h1>

                  <div id="updateDiv">


             @if (Session::has('success'))
              <div class="alert alert-success">
                <h3>{{Session::get('success')}}</h3>
             </div>
                  @endif



            <div class="table-responsive cart_info">

                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Image</td>
                            <td class="description">Product</td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td class="delete">Delete</td>
                        </tr>





                 </thead>


                    @foreach($cartItems as $cartItem)
                    <tbody>
                        <tr>
                            <td class="cart">

                         <img src="{{url('images',$cartItem->options->img)}}" style="height: 50px; width:50px;" >

                            </td>
                            <td class="cart_description">
                            <a href="{{url('/product_details')}}/{{$cartItem->id}}">
                                <h4><a href="{{url('/product_details')}}/{{$cartItem->id}}" style="color:blue">{{$cartItem->name}}</a></h4>
                                <p> ID: {{$cartItem->id}}</p>


                            </td>
                            <td class="cart_price">
                                <p>${{$cartItem->price}}</p>
                            </td>
                          {!! Form::open(['url' => ['cart/update',$cartItem->rowId], 'method'=>'put']) !!}

                            <td class="cart_quantity">

              <input type="number" size="2" value="{{$cartItem->qty}}" name="qty"
              autocomplete="off" style="text-align:center; max-width:65px; "  MIN="1" MAX="1000">

              <input type="submit" class="btn btn-success " value="Update" styel="margin:7px">

                         {!! Form::close() !!}
                            </td>



                            <td class="cart_total">
                                <p class="cart_total_price">${{$cartItem->subtotal}}</p>
                            </td>
                            <td class="cart_delete">
                               <button class="btn btn-danger">
                                <a class="cart_quantity_delete text-white "
                                   href="{{url('/cart/remove')}}/{{$cartItem->rowId}}">Delete</a>
                                   </button>
                            </td>
                        </tr>






                    </tbody>
                    @endforeach
                </table>

               </div>
            <!-- End of Updatediv</div> --></div>


        </div>
    </section>

    <section >
        <div class="container">

                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>

            <div class="row">
            <h1 class="text-center text-warning">Order Now</h1>

                <div class="col-sm-6">


               <form action="#" method="">
                  <div class="row">


                    <div class="form-group col-md-6">
                      <label for="firstname" class="form-label">Display Name</label>

                      <input id="firstname" type="text" name="fullname" placeholder="Display Name"  value="" class="form-control">



                    </div>

                     <div class="form-group col-md-6">
                      <label for="email" class="form-label">Email</label>

                      <input id="email" type="text" name="email" placeholder="Email" value="" class="form-control">
                    </div>




                    <div class="form-group col-md-6">
                      <label for="password" class="form-label">password</label>
                      <input id="password" type="text" name="pincode" placeholder="Password" value="" class="form-control">


                    </div>




                        <div class="form-group col-md-6">
                      <label for="city" class="form-label">City Name</label>

                      <input id="city" type="text" name="city" placeholder="City Name" value="" class="form-control">


                    </div>


                    <hr>

                            <select name="country" class="form-control" >
                                <option value="" selected="selected">Select country</option>
                                <option value="United States">United States</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="UK">UK</option>
                                <option value="India">India</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Ucrane">Ucrane</option>
                                <option value="Canada">Canada</option>
                                <option value="Dubai">Dubai</option>
                            </select>



                       <span>
                       <input type="radio" name="pay" value="COD" checked="checked"> COD
                          </span>

                        <span>
                        <input type="radio" name="pay" value="paypal"> PayPal
                        </span>


                      <input type="submit" value="Continue"  class="btn btn-success ">







                  </div>
                </form>

                </div>

                <div class="col-sm-6 d-block  text-center ">
                        <ul class="cartDetail mt-5">

                            <h5 class="">Cart Sub Total :<span class="text-success">${{Cart::subtotal()}}</span></h5>
                            <h5 class="">Shipping Cost : <span class="text-success">Free</span></h5>
                            <h5 class="">Tax : <span class="text-success"> ${{Cart::tax()}}</span></h5>
                            <h5 class="">Total :<span class="text-success">${{Cart::total()}}</span></h5>

                    </ul>
                    <a class="btn btn-success" href="{{url('/')}}/checkout">Check Out</a>


                </div><!-- col-sm-6 -->



            </div><!-- row -->
        </div><!-- container -->
    </section>
<?php } ?>
@endsection
