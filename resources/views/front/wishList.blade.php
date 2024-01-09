@extends('front.master')

@section('content')
    <canvas class=" w-100" width="100" height="2"></canvas>


    <section class="mb-5 pb-5">
        <div class="container">
            <div class="row">
                <h2 class=" text-center">
                    <?php if (isset($msg)) {
                            echo $msg;
                        } else { ?> WishList Item <?php } ?> </h2>

                <?php if ($Products->isEmpty()) { ?>
                sorry, Products not found
                <?php } else { ?>
                @foreach ($Products as $product)
                    <div class="card card1 col-md-3 ">
                        <div class="card-body">
                            <img src="{{ url('images', $product->image) }}" class="card-img w-100  " alt="card image cap">

                            <p class="card-text">{{ $product->pro_name }}</p>
                            <h2 id="price">
                                @if ($product->spl_price == 0)
                                    ${{ $product->pro_price }}
                                @else
                                    <div class=" price p-3">
                                        <span style="text-decoration:line-through; color:rgb(158, 32, 60)">
                                            ${{ $product->pro_price }} </span>
                                        <img src="{{ asset('dist/img/Sale-Free.png') }}" style="width:70px; height:40px;" />
                                        ${{ $product->spl_price }}
                                    </div>

                                @endif

                                <a href="{{ url('/') }}/removeWishList/{{ $product->id }} ?>">
                                    <i class="fa fa-trash fa-2x " style=" background-color:#ffff;color:brown;   "></i>
                                </a>

                            </h2>

                        <div class="btn-group-vertical d-block">
                            <button type="button" class="btn">
                                <a href="{{ url('/product_details') }}/<?php echo $product->id; ?>" class="get  ">
                                    <i class="fas fa-eye "></i>View Product
                                </a>
                            </button>

                            <button type="button" class="btn mt-1  ">
                                <a href="{{ url('/cart/addItem') }}/<?php echo $product->id; ?>" class="get ">
                                    <i class="fa fa-shopping-cart"></i>Add To Cart
                                </a>
                            </button>

                            {{-- <button type="button" class="btn mt-1  "> --}}

                            {{-- </button> --}}


                        </div>



                    </div><!-- card-body -->
            </div><!-- card -->
            @endforeach
            <?php } ?>


        </div>
        <ul class="pagination">
        </ul>

        </div>
        </div>
    </section>
@endsection
