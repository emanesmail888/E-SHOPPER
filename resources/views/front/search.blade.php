@extends('front.master')
@section('content')


<main role="main">
    <canvas class="my-4 w-100"  width="100" height="3"></canvas>

<section id="dishes">

    <div class="album py-5 bg-light">
      <div class="container">
        <h1 class=" text-center ">Search<span>products</span> </h1>

        <div class="row">
@forelse ($products as $product)

<div class="col-md-4 ">
  <div class="card mb-4 shadow-sm">


   <div class="card-body">
      <img src="{{url('images', $product->image)}}" class="card-img-top " alt="card image cap">

      <p class="card-text">{{$product->pro_name}}</p>

      <div class="btn-group-vertical d-block">
          <button type="button" class="btn   get ">
              <a href="{{url('/product_details')}}/<?php echo $product->id; ?>"
                  class=" text-white ">View product</a>
          </button>

          <button type="button" class="btn  mt-1 get  ">
              <a href="#"
                  class=" text-white">Add To Cart
                  <i class="fa fa-shopping-cart"></i>
              </a>
          </button>

         </div>

    </div><!-- card-body -->
  </div><!-- card -->
</div><!-- col-md-4 -->
@empty
<h3>No Products Yet</h3>
@endforelse
</div><!-- row -->

</div><!-- container -->
</div>
</section>
</main>


@endsection






