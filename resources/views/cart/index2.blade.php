@extends('front.master')

@section('content')
<canvas class="my-4 w-100"  width="100" height="9"></canvas>


<script>
$(document).ready(function(){


<?php for($i=1;$i<20;$i++){?>

$('#upCart<?php echo $i;?>').on('change keyup', function(){




    var newqty = $('#upCart<?php echo $i;?>').val();
    var rowId = $('#rowId<?php echo $i;?>').val();
    var proId = $('#proId<?php echo $i;?>').val();


    if(newqty <=0){ alert('enter only valid quantity') }


     else {


        // start of ajax

       $.ajax({
        type: 'get',
        dataType: 'html',
        url: '<?php echo url('/cart/update');?>/'+proId,
        data: "qty=" + newqty + "& rowId=" + rowId + "& proId=" + proId,
        success: function (response) {
            console.log(response);
            $('#updateDiv').html(response);
        }
    });

       // End of Aajx
     }
    });
  <?php } ?>
});
</script>
<?php if ($cartItems->isEmpty()) { ?>

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div align="center">  <img src="{{asset('dist/img/empty-cart.png')}}"/></div>
        </div>
    </section> <!--/#cart_items-->
<?php } else { ?>
<br>
<br>
    <section id="cart_items">


        <div class="container">

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}"></a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>






                  <div id="updateDiv">

                        @if(session('status'))
                                    <div class="alert alert-success">
                                        {{session('status')}}
                                    </div>
                                    @endif
                                      @if(session('error'))

                                    <div class="alert alert-danger">
                                        {{session('error')}}
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




                        <!-- Start #updateDiv -->



                 </thead>

                    <?php $count =1;?>
                    @foreach($cartItems as $cartItem)
                    <tbody>
                        <tr>
                            <td class="cart_product">


                           <img src="{{url('images',$cartItem->attributes->image)}}" alt="" height="100" width="100">

                            </td>



                            <td class="cart_description">
                            <a href="{{url('/product_details')}}/{{$cartItem->id}}">

                                <br>

                                <h4><a href="{{url('/product_details')}}/{{$cartItem->id}}" style="color:blue">{{$cartItem->name}}</a></h4>
                                <p>Product ID: {{$cartItem->id}}</p>
                            </td>
                            <td class="cart_price">
                                <p>${{$cartItem->price}}</p>
                            </td>
                            {!! Form::open(['url' => ['cart/update',$cartItem->id], 'method'=>'put']) !!}

                            <td class="cart_quantity">
     <div class="cart_quantity_button">

       <input type="hidden" id="rowId<?php echo $count;?>" value="{{$cartItem->rowId}}"/>
         <input type="hidden" id="proId<?php echo $count;?>" value="{{$cartItem->id}}"/>

         <input type="number" size="10" class="ml-2" value="{{$cartItem->quantity}}" name="qty" id="upCart<?php echo $count;?>"
                autocomplete="off" style="text-align:center; max-width:60%; "  MIN="1" MAX="30">
         <br>

         <input type="submit"  class="btn btn-primary mt-1 " value="Update" >

                            </td>
                            {!! Form::close() !!}

                            <td class="cart_total">
                                <p class="cart_total_price">${{$cartItem->price*$cartItem->quantity}}</p>
                            </td>
                            <td class="cart_delete">

                               <button class="btn btn-danger">
                                <a class="cart_quantity_delete text-white" href="{{url('/cart/remove')}}/{{$cartItem->id}}">
                                <i class="fa fa-times text-white pr-1"></i>Delete </a>
                                  </button>
                            </td>
                        </tr>



                <?php $count++;?>



                    </tbody>
                    @endforeach
                </table>

               </div>
            <!-- End of Updatediv</div> --></div>


        </div>
    </section> <!--/#cart_items-->
    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="chose_area">
                  <?php /*      <ul class="user_option">
                            <li>
                                <label>Use Coupon Code</label>
                            </li>
                            <li>
                                <input type="text" id="couponCode">
                            </li>
                            <li>
                                <button id="couponBtn">Apply</button>
                            </li>
                        </ul>
                        */?>
                        <ul class="user_info">
                            <li class="single_field">
                                <label>Country:</label>
                                <select>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                            </li>
                            <li class="single_field">
                                <label>Region / State:</label>
                                <select>
                                    <option>Select</option>
                                    <option>Dhaka</option>
                                    <option>London</option>
                                    <option>Dillih</option>
                                    <option>Lahore</option>
                                    <option>Alaska</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                            </li>
                            <li class="single_field zip-field">
                                <label>Zip Code:</label>
                                <input type="text">
                            </li>
                        </ul>
                        <a class="btn btn-default update" href="">Get Quotes</a>
                        <a class="btn btn-default check_out" href="">Continue</a>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>${{Cart::getSubTotalWithoutConditions()}}
</span></li>
                            <li>Eco Tax <span>{{Cart::getCondition('VAT 5%')->getCalculatedValue(Cart::getSubTotalWithoutConditions())}}$, </span></li>
                            <li>Shipping Cost <span>{{Cart::getCondition('Express Shipping $10')->getValue()}}</span></li>
                            <li>Total <span>{{Cart::getTotal()}}</span></li>
                        </ul>


                         <a class="btn btn-default update" href="">Update</a>




                        <a class="btn btn-default check_out" href="{{url('/')}}/checkout">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
<?php } ?>
@endsection
