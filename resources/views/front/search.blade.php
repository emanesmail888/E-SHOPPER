@extends('front.master')
@section('content')


<main role="main">

<section id="products">

    <div class="album py-5 bg-light">
      <div class="container">
        <h1 class=" text-center ">Search<span>products</span> </h1>

        <div class="row">
@forelse ($products as $product)

<div class="col-md-3 ">
    <div class="card card1 ">
        <div class="card-body">
          <img src="{{url('images', $product->image)}}" class="card-img w-100  " alt="card image cap">

          <p class="card-text">{{$product->pro_name}}</p>
          <h2 id="price">
              @if($product->spl_price==0)
              ${{$product->pro_price}}
              @else
              <div class=" price">
            <span style="text-decoration:line-through; color:rgb(158, 32, 60)">
               ${{$product->pro_price}} </span>
               <img src="{{asset('dist/img/Sale-Free.png')}}" style="width:70px; height:40px;"/>
               ${{$product->spl_price}}
              @endif
          </div>

            </h2>

          <div class="btn-group-vertical d-block">
              <button type="button" class="btn   ">
                  <a href="{{url('/product_details')}}/<?php echo $product->id; ?>"
                      class="get  ">View Product</a>
              </button>

              <button type="button" class="btn mt-1  ">
                  <a href="{{url('/cart/addItem')}}/<?php echo $product->id; ?>"
                      class="get ">Add To Cart
                      <i class="fa fa-shopping-cart"></i>
                  </a>
              </button>


             </div>



        </div><!-- card-body -->
      </div><!-- card -->
</div><!-- col-md-3 -->
@empty
<h3>No Products Yet</h3>
@endforelse
</div><!-- row -->

</div><!-- container -->
</div>
</section>
</main>


@endsection






