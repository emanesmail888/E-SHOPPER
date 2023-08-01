@extends('front.master')
 @section('content')





 <main role="main">
<h1>New Arrival</h1>
      <div class="album text-muted">

      <div class="container">

        <div class="row">
         @forelse($products as $product)

          <div class="card" style="width:30rem height: 20rem">

             <img src="{{url('images',$product->image)}}" class="card-img">

          <div class="card-body">

              <p id="price">


              <h4 class="card-text iphone"><a href="{{url('/product_details')}}/{{$product->id}}" style="width:30rem height: 20rem">{{$product->pro_name}}</a></h4>


            @if($product->spl_price==0)


             <div class="d-flex justify-content-between align-items-center">
              <p class="card-text">${{$product->pro_price}}</p>
               <p class="card-text"></p>
              </div>

              @else

              <div class="d-flex justify-content-between align-items-center">
            <p class="" style="text-decoration:line-through; color:#333">${{$product->spl_price}}</p>

            <img src="{{URL::asset('dist/images/shop/sale.png')}}" alt="..."  style="width:60px">
             <p class="">${{$product->pro_price}}</p>


           </div>
            @endif

          </p>



            <button class="btn btn-primary btn-sm">
             <a href="{{url('/cart/addItem')}}/<?php echo $product->id; ?>" class="">Add ToCart<i class="fa fa-shopping-cart"></i></a>
            </button>



          </div>
          </div>
          @empty
            <h3>No products Arrive Recentely</h3>
            @endforelse
          </div>
         </div>

        </div>

      </div>

    </main>
    @endsection
