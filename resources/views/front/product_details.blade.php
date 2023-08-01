    @extends('front.master')

    @section('content')
        <canvas class="my-4 w-100" width="100" height="1"></canvas>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" async defer></script> --}}
        <script type="text/javascript">
            $(document).ready(function() {

                $('#size').change(function() {
                    var size = $('#size').val();
                    var proDum = $('#proDum').val();


                    $.ajax({
                        type: 'get',
                        dataType: 'html',
                        url: '<?php echo url(' / selectSize '); ?>',
                        data: "size=" + size + "& proDum=" + proDum,
                        success: function(response) {
                            console.log(response);
                            $('#price').html(response);
                        }
                    });

                });
            });
            // $(document).ready(function () {

            //     $('#getPrice').change(function () {
            //         var size = $(this).val();
            //         alert(size);
            //         var proDum = $('#proDum').val();


            //         $.ajax({
            //             type: 'post',
            //             dataType: 'html',
            //             url: '/get_product_price',
            //             data: "size=" + size + "& proDum=" + proDum,
            //             success: function (response) {
            //                 console.log(response);
            //                 $('#price').html(response);
            //             }
            //         });

            //     });
            // });
        </script>


        {{-- <script type="text/javascript">
    $(document).ready(function () {

        $('#getPrice').change(function () {
            var size = $('#size').val();
            var proDum = $('#proDum').val();


            $.ajax({
                type: 'get',
                dataType: 'html',
                url: '<?php echo url(' / selectSize '); ?>',
                data: "size=" + size + "& proDum=" + proDum,
                success: function (response) {
                    console.log(response);
                    $('#price').html(response);
                }
            });

        });
    }); --}}




        <section id="">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                @foreach ($Products as $product)
                                    <div class="thumbnail">
                                        <img src="{{ url('images', $product->image) }}" class="card-img">
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
                                                        <img src="{{ url('images', $product->image) }}" class="w-50"
                                                            alt=""></a>
                                                </div>
                                                <div class="item">
                                                    <a href=""><img src="{{ url('images', $product->image) }}"
                                                            class="w-50" alt=""></a>
                                                </div>
                                                <div class="item">
                                                    <a href="">
                                                        <img src="{{ url('images', $product->image) }}" class="w-50"
                                                            alt=""></a>
                                                </div>

                                            </div>

                                            <!-- Controls -->
                                            <a class="carousel-control-prev " href="#myCarousel" role="button"
                                                data-slide="prev">
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
                                        <h2><?php echo ucwords($product->pro_name); ?></h2>
                                        <h5>{{ $product->pro_info }}</h5>



                                        <form action="{{ url('/cart/addItem2') }}/<?php echo $product->id; ?>">
                                            <span>
                                                <span id="price">
                                                    @if ($product->spl_price == 0)
                                                        ${{ $product->pro_price }}
                                                        <input type="hidden" product="{{ $product->pro_price }}"
                                                            name="newPrice" />
                                                    @else
                                                        <b style="text-decoration:line-through; color:rgb(168, 55, 55)">
                                                            ${{ $product->pro_price }} </b>
                                                        <span> ${{ $product->spl_price }}
                                                            <input type="hidden" product="{{ $product->spl_price }}"
                                                                name="newPrice" /></span>
                                                    @endif

                                                </span>
                                                <label>Quantity:</label>
                                                <input type="number" size="2" value="1" name="qty"
                                                    autocomplete="off" style="text-align:center; max-width:65px; "
                                                    MIN="1" MAX="1000">
                                                {{--
                                    <input type="number" size="2" value="1" id="qty" autocomplete="off"
                                        style="text-align:center; max-width:50px;" MIN="1" MAX="30"> --}}
                                                <button class="btn btn-fefault cart" id="addToCart_default">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    Add to cart
                                                </button>

                                                <input type="hidden" value="<?php echo $product->id; ?>" id="proDum" />
                                            </span>
                                            <p><b>Availability:</b> <?php echo $product->stock; ?> In Stock</p>

                                            <?php $sizes = DB::table('products_properties')
                                                ->select('size')
                                                ->groupBy('size')
                                                ->where('pro_id', $product->id)
                                                ->groupBy('size')
                                                ->get(); ?>

                                            @if (count($sizes) != 0)
                                                <select name="size" id="size">
                                                    <option value="">Select Size to see color</option>
                                                    @foreach ($sizes as $size)
                                                        <option>{{ $size->size }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </form>

                                        <?php
                                        $wishData = DB::table('wishlist')
                                            ->rightJoin('products', 'wishlist.pro_id', '=', 'products.id')
                                            ->where('wishlist.pro_id', '=', $product->id)
                                            ->get();
                                        $count = App\Models\wishlist::where(['pro_id' => $product->id])->count();
                                        ?>

                                        <?php if($count=="0"){?>

                                        {!! Form::open(['route' => 'addToWishList', 'method' => 'post']) !!}
                                        <input type="hidden" value="{{ $product->id }}" name="pro_id" />
                                        <input type="submit" value="Add to Wishlist" class="btn " />



                                        {!! Form::close() !!}
                                        <?php } else {?>
                                        <h3 style="color:green">Already Added to Wishlist <a
                                                href="{{ url('/wishlist') }}">wishlist</a></h3>
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





        <!-- Review -->

        <div class="category-tab shop-details-tab mt-5 pt-5"><!--category-tab-->
            <div class="col-sm-12 mt-5 ">
                <ul class="nav nav-tabs">
                    <li><a href="#details" data-toggle="tab">Details</a></li>
                    <li><a href="#tag" data-toggle="tab">Tag</a></li>
                    <li class="active"><a href="#reviews" data-toggle="tab">Reviews {{$reviewsCount}}</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade" id="details" >
                    <div class="col-sm-8">

                            <div class="single-products">
                                <div class="productinfo text-center">
                                        <h2><?php echo ucwords($product->pro_name); ?></h2>
                                        <h5>{{ $product->pro_info }}</h5>
                                        <b style="text-decoration:line-through; color:rgb(168, 55, 55)">${{ $product->pro_price }} </b>

                                            <span>{{$product->spl_price }}</span>

                                    <p><b>Availability:</b> <?php echo $product->stock; ?> In Stock</p>

                                </div>
                            </div>
                        </div>

                </div>




                <div class="tab-pane fade show active in " id="reviews" >
                    <div class="col-sm-12">
                        @foreach ($reviews as $data)
                        <ul>

                        @if ($data->user_id)
                        <img src="../uploads/avatars/{{ App\Models\User::find($data->user_id)->avatar }}"
                            class=" rounded-circle mr-5  " style="width: 70px; height:70px;" alt="">
                    @else
                        <img src="{{ asset('backend/img/avatar.png') }}" alt="Profile.jpg">
                    @endif


                            <li><a href=""><i class="fa fa-user"></i>{{ App\Models\User::find($data->user_id)->name }}</a></li>
                            <li><a href=""> <i class="fa fa-calendar"></i>{{$data->created_at}}<i class="fa fa-clock"></i></a></li>

                        </ul>
                        <p>{{ $data->review }}</p>
                        <!-- Single Rating -->

                                <div class="ratings">

                                    <ul class="rating">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($data->rate >= $i)
                                                <li><i class="fa fa-star text-danger"></i></li>
                                            @else
                                                <li><i class="fa fa-star text-dark"></i></li>
                                            @endif
                                        @endfor
                                        <span>{{ $data->rate }}</span>

                                    </ul>
                                </div>


                    @endforeach

                    <p><b>Write Your Review</b></p>

                        @auth
                        <form class="form" method="post" action="{{ route('review.store', $product->id) }}">
                            @csrf
                            <div class="container">

                            <div class="row d-flex">

                                <div class="col-md-6 ">
                                    <h4>Your Rating <span class="text-danger">*</span></h4>
                                    <p>Your email address will not be published. Required fields are marked</p>




                                    <div class="con">
                                        <i class="fa fa-star fa-2x" aria-hidden="true" id="st1"></i>
                                        <i class="fa fa-star fa-2x" aria-hidden="true" id="st2"></i>
                                        <i class="fa fa-star fa-2x" aria-hidden="true" id="st3"></i>
                                        <i class="fa fa-star fa-2x" aria-hidden="true" id="st4"></i>
                                        <i class="fa fa-star fa-2x" aria-hidden="true" id="st5"></i>
                                        <input type="text" id="rating" name="rate" style="width:15px; border:none;">
                                    </div>{{-- con --}}

                                </div>{{-- col-md-6 --}}

                                <div class="col-md-6 ">

                                    <label>Write a review</label>
                                    <textarea name="review" rows="4" class="w-100" placeholder="Your Review"></textarea>

                                </div>

                                <button type="submit" class="btn btn-secondary  mx-auto ">Make Review</button>
                            </div> <!--row -->
                        </div>

                        </form>
                    @else
                        <p class="text-center p-5">
                            You need to <a href="{{ route('login') }}" style="color:rgb(54, 54, 204)">Login</a> OR <a
                                style="color:blue" href="{{ route('register') }}">Register</a>

                        </p>
                        <!--/ End Form -->
                    @endauth




                    </div>
                </div>

            </div>
        </div><!--/category-tab-->


            <div class="avg-ratting">
                {{-- @php
                                $rate=0;
                                foreach($product->rate as $key=>$rate){
                                    $rate +=$rate
                                }
                            @endphp --}}
                {{-- <h4>{{ceil($product->getReview->avg('rate'))}} <span>(Overall)</span></h4> --}}
                {{-- <span>Based on {{$product->getReview->count()}} Comments</span> --}}
            </div>











        <!-- Recommends table -->

        <div class="recommended_items">
            <!--recommended_items-->
            <h2 class=" text-center">recommended items</h2>

            @include('front.recommends')

        </div>
        <!--/recommended_items-->

        </div>


    @endsection
    @section('scripts')
        <script>
            var k = 0;
            $(document).ready(function() {
                $(".category-tab .tab-content  .tab-pane #st1").click(function() {
                    $(".fa-star").css("color", "black");
                    $(".category-tab .tab-content  .tab-pane #st1").css("color", "red");
                    k = 1;
                    $('.category-tab .tab-content  .tab-pane #rating').val(k);



                });
                $(".category-tab .tab-content  .tab-pane #st2").click(function() {
                    $(".fa-star").css("color", "black");
                    $("#st1, #st2").css("color", "red");
                    k = 2;
                    $('.category-tab .tab-content  .tab-pane #rating').val(k);


                });
                $(" .category-tab .tab-content  .tab-pane #st3").click(function() {
                    $(".fa-star").css("color", "black")
                    $("#st1, #st2, #st3").css("color", "red");
                    k = 3;
                    $('.category-tab .tab-content  .tab-pane #rating').val(k);


                });
                $(".category-tab .tab-content  .tab-pane #st4").click(function() {
                    $(".fa-star").css("color", "black");
                    $("#st1, #st2, #st3, #st4").css("color", "red");
                    k = 4;
                    $('.category-tab .tab-content  .tab-pane #rating').val(k);


                });
                $(".category-tab .tab-content  .tab-pane #st5").click(function() {
                    $(".fa-star").css("color", "black");
                    $("#st1, #st2, #st3, #st4, #st5").css("color", "red");
                    k = 5;
                    $('.category-tab .tab-content  .tab-pane #rating').val(k);


                });

            });
        </script>
    @endsection
