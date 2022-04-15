<div class="container">
    <div class="row">

        <h2 class=" text-center pb-4"> Featured Products</h2>


            @if ($products->count() > 0 )
            @foreach($products as $product)
            <div class="col-md-4">
             <div class="card card1 ">
                 <div class="card-body">
                   <img src="{{url('images', $product->image)}}" class="card-img w-100  " alt="card image cap">

                   <p class="card-text">{{$product->pro_name}}</p>
                   <h2 id="price">
                    @if($product->spl_price==0)
                    ${{$product->pro_price}}
                    @else
                    <div class=" price">
                  <span style="text-decoration:line-through; color:rgb(224, 43, 119)">
                     ${{$product->pro_price}} </span>
                     <img src="{{asset('dist/img/Sale-Free.png')}}" style="width:70px; height:40px;"/>
                     ${{$product->spl_price}}
                    @endif
                </div>

                  </h2>



                   <div class="btn-group-vertical d-block">
                       <button type="button" class="btn d-block   ">
                           <a href="{{url('/product_details')}}/<?php echo $product->id; ?>"
                               class="get  ">View Product</a>
                       </button>

                       <button type="button" class="btn mt-1  d-block">
                           <a href="{{url('/cart/addItem')}}/<?php echo $product->id; ?>"
                               class="get ">Add To Cart
                               <i class="fa fa-shopping-cart"></i>
                           </a>
                       </button>


                      </div>





                 </div>
             </div>
         </div>

            @endforeach
            @else
            <h2>No Product Found.!</h2>
            @endif
            <div class="pagination  pt-5">
            {{ $products->links() }}
           </div>
         {{-- <div class="mt-5 " style=" height=25px; ">
            {{$products->links()}}
           </div> --}}

           </div>
</div>
