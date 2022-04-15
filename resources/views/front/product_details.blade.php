    @extends('front.master')

    @section('content')

    <canvas class="my-4 w-100" width="100" height="1"></canvas>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" async defer></script>
    <script type="text/javascript">
        $(document).ready(function () {

            $('#size').change(function () {
                var size = $('#size').val();
                var proDum = $('#proDum').val();


                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '<?php echo url(' / selectSize ');?>',
                    data: "size=" + size + "& proDum=" + proDum,
                    success: function (response) {
                        console.log(response);
                        $('#price').html(response);
                    }
                });

            });
        });

    </script>





    <section id="">
 <div class="container">

<div class="row">
    <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    @foreach($Products as $product)

                    <div class="thumbnail">
                         <img src="{{ url('images',$product->image) }}" class="card-img">
                        <br>

                    </div>



            <!-- ALT IMAGE  -->
     <div id="myCarousel" class="carousel slide " data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>


                            <!-- Wrapper for slides -->
<div class="carousel-inner">
    <div class="d-flex justify-content-between align-items-center">
  <div class="item active">
    <a href="">
        <img src="{{ url('images',$product->image) }}"
    class="w-50" alt=""></a>
    </div>
    <div class="item">
        <a href=""><img src="{{ url('images',$product->image) }}" class="w-50" alt=""></a>
    </div>
    <div class="item">
        <a href="">
            <img src="{{ url('images',$product->image) }}" class="w-50" alt=""></a>
    </div>

</div>

     <!-- Controls -->
     <a class="carousel-control-prev " href="#myCarousel" role="button" data-slide="prev">
     <span><i class="fa fa-angle-left" aria-hidden="true"></i></span>
     <span class="sr-only">Previous</span>
     </a>
      <a class="carousel-control-next" href="#myCarousel" role="button"
        data-slide="next">
        <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
        <span class="sr-only">Next</span>
     </a>
                    </div>
                    </div>


             </div><!-- col-md-6 -->
                <div class="col-md-5 col-md-offset-1">

                    <div class="product-details">

                        <h2 class="product-title">
                            <h2><?php echo ucwords($product->pro_name);?></h2>
                            <h5>{{ $product->pro_info }}</h5>



                            <form action="{{ url('/cart/addItem') }}/<?php echo $product->id; ?>">
                                <span>
                                    <span id="price">
                                        @if($product->spl_price ==0)
                                        ${{ $product->pro_price }}
                                        <input type="hidden" product="{{ $product->pro_price }}" name="newPrice" />
                                        @else
                                        <b style="text-decoration:line-through; color:rgb(168, 55, 55)">
                                            ${{ $product->pro_price }} </b>
                                        <span> ${{ $product->spl_price }}
                                            <input type="hidden" product="{{ $product->spl_price }}"
                                                name="newPrice" /></span>
                                        @endif

                                    </span>
                                    <label>Quantity:</label>
                                    <input type="number" size="2" value="1" id="qty" autocomplete="off"
                                        style="text-align:center; max-width:50px;" MIN="1" MAX="30">
                                    <button class="btn btn-fefault cart" id="addToCart_default">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>

                                    <input type="hidden" value="<?php echo $product->id; ?>" id="proDum" />
                                </span>
                                <p><b>Availability:</b> <?php echo $product->stock; ?> In Stock</p>

                                <?php $sizes = DB::table('products_properties')->select('size')->groupBy('size')->where('pro_id',$product->id)->groupBy('size')->get();?>
                                @if(count($sizes)!=0)
                                <select name="size" id="size">
                                    <option value="">Select Size to see color</option>
                                    @foreach($sizes as $size)
                                    <option>{{ $size->size }}</option>
                                    @endforeach
                                </select>
                                @endif
                            </form>

                            <?php
    $wishData = DB::table('wishlist')->rightJoin('products','wishlist.pro_id', '=', 'products.id')
    ->where('wishlist.pro_id', '=', $product->id)->get();
    $count = App\Models\wishlist::where(['pro_id' => $product->id])->count();
    ?>

                            <?php if($count=="0"){?>

                            {!! Form::open(['route' => 'addToWishList', 'method' => 'post']) !!}
                            <input type="hidden" value="{{ $product->id }}" name="pro_id" />
                            <input type="submit" value="Add to Wishlist" class="btn " />



                            {!! Form::close() !!}
                            <?php } else {?>
                            <h3 style="color:green">Already Added to Wishlist <a
                                    href="{{ url('/WishList') }}">wishlist</a></h3>
                            <?php }?>
                            <p class="">



                    </div>
                </div>

                @endforeach
            </div>
        </div>
        </div>
        </div><!-- /.row -->


    </section>



    <!-- Recommends table -->


    <div class="recommended_items">
        <!--recommended_items-->
        <h2 class=" text-center">recommended items</h2>

        @include('front.recommends')

    </div>
    <!--/recommended_items-->

    </div>

    @endsection
