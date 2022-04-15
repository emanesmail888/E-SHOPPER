@extends('front.master')

@section('content')

<canvas class="my-4 w-100"  width="100" height="5"></canvas>

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
<br>
<br>
<br>
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
                            <td></td>
                        </tr>




                        <!-- Start #updateDiv -->



                 </thead>

                    <?php $count =1;?>
                    @foreach($cartItems as $cartItem)
                    <tbody>
                        <tr>
                            <td class="cart_product">



                         <p><img src="{{url('images',$cartItem->options->img)}}" class="card-img-top w-25 h-25" ></p>



                            </td>



                            <td class="cart_description">
                            <a href="{{url('/product_details')}}/{{$cartItem->id}}">


                                <br>

                                <h4><a href="{{url('/product_details')}}/{{$cartItem->id}}" style="color:blue">{{$cartItem->name}}</a></h4>
                                <p>Product ID: {{$cartItem->id}}</p>
                                 <p>Only {{$cartItem->options->stock}} left</p>
                            </td>
                            <td class="cart_price">
                                <p>${{$cartItem->price}}</p>
                            </td>
                            {!! Form::open(['url' => ['cart/update',$cartItem->rowId], 'method'=>'put']) !!}

                            <td class="cart_quantity">



                  <input type="hidden" id="rowId<?php echo $count;?>" value="{{$cartItem->rowId}}"/>


              <input type="hidden" id="proId<?php echo $count;?>" value="{{$cartItem->id}}"/>



              <input type="number" size="2" value="{{$cartItem->qty}}" name="qty" id="upCart<?php echo $count;?>"
                                           autocomplete="off" style="text-align:center; max-width:50px; "  MIN="1" MAX="1000">
                                           <input type="submit" class="btn btn-primary" value="Update" styel="margin:5px">

                            </td>
                            {!! Form::close() !!}


                            <td class="cart_total">
                                <p class="cart_total_price">${{$cartItem->subtotal}}</p>
                            </td>
                            <td class="cart_delete">
                               <button class="btn btn-primary">
                                <a class="cart_quantity_delete" style="background-color:red"
                                   href="{{url('/cart/remove')}}/{{$cartItem->rowId}}"><i class="fa fa-times"></i></a>
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
    </section>
    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
            </div>
            <div class="row">


                <div class="col-sm-6 offset-3">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>${{$cartItem->subtotal}}</span></li>
                            <li>Eco Tax <span>${{Cart::tax()}}</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>${{$cartItem->total}}</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check_out" href="{{url('/')}}/checkout">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
@endsection
