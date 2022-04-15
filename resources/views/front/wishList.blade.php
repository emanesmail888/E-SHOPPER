@extends('front.master')

@section('content')

<canvas class="my-4 w-100"  width="100" height="1"></canvas>


<section>
    <div class="container">
        <div class="row">
                    <h2 class=" text-center">
                        <?php if (isset($msg)) {
                            echo $msg;
                        } else { ?> WishList Item <?php } ?> </h2>

                    <?php if ($Products->isEmpty()) { ?>
                        sorry, products not found
                  <?php } else { ?>
                        @foreach($Products as $product)
                        <div class="col-md-6">
                                    <div class=" text-center">
                                        <a href="{{url('/product_details')}}">
                                           <img src="{{url('images',$product->image)}}" class="w-50 h-25" alt="" />
                                        </a>
                                    </div>
                                    </div>

                                    <div class="col-md-6">
                                        <h2>$<?php echo $product->pro_price; ?></h2>

                                        <p><a href="{{url('/product_details')}}"><?php echo $product->pro_name; ?></a></p>
                                        <a href="{{url('/cart/addItem')}}/<?php echo $product->id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Move to cart</a>

                            <a href="{{url('/')}}/removeWishList/{{$product->id}}" style="color:red" class="btn btn-default btn-block"><i class="fa fa-minus-square"></i>Remove from wishlist</a></li>
                                    </div>



                        @endforeach
<?php } ?>


                </div>
                <ul class="pagination">
                    {{-- {{ $Products}} --}}
                </ul>

    </div>
</div>
</section>



@endsection

