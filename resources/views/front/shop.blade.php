@extends('front.master')
@section('content')






 <main role="main">







    <section id="products mb-5 pb-5">
        <div class="container mb-5 pb-5  ">
         <div class="row">
           <div class="owl-carousel owl-theme  ">
            @forelse ($products as $product)
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
           @empty
         <h3>No Products</h3>
         @endforelse




        </div><!-- owl-carsoule -->

        </div><!-- row -->

        </div><!-- container -->
       </section>

    </main>




    <section class="mt-5 pt-5 mb-5">
       <div class="container mt-5 pt-5">
           <div class="row">

               <div class="col-sm-3">
                    <div class="left-sidebar">

                       <h2>Category</h2>
                       <div class="panel-group category-products" id="accordian">

                           @forelse ($categories as $category)

                           <div class="panel panel-default">
                               <div class="panel-heading">
                                   <h4 class="panel-title">
                                       <a data-toggle="collapse" data-parent="#accordian" href="#{{$category->name}}">

                                           {{$category->name}}
                                           <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                       </a>

                                   </h4>
                               </div>
                               <div id="{{$category->name}}" class="panel-collapse collapse">
                                   <div class="panel-body">
                                       <ul>
                                           @foreach ( $category->subCategories as $scategory )
                                        <li> <i class=" fa fa-caret-right">

                                        <a href="{{url('/products')}}/<?php echo $scategory->id;?>">{{$scategory->name}}</a>
                                        </i></li>
                                           @endforeach


                                       </ul>
                                   </div> <!-- panel-body -->
                               </div> <!-- panel-collapse -->

                           </div><!-- panel -->
                           @empty
                               <h3>No categories</h3>
                               @endforelse

                       </div><!-- panel-group -->



                           <div class="price-range mt-5">
                                      <h2>Price Range</h2>
                                       <div id="slider-range"></div>
                                       <br>
                                       <b class="pull-left">$
                                           <input size="2" type="text" id="amount_start" name="start_price"
                                                  value="100" style="border:0px; font-weight: bold; color:green" readonly="readonly" /></b>

                                       <b class="pull-right">$
                                           <input size="2" type="text" id="amount_end" name="end_price" value="6000"
                                                  style="border:0px; font-weight: bold; color:green" readonly="readonly"/></b>

                           </div><!-- price-range -->




                </div><!--left- sidebar -->

               </div><!--col-sm-3  -->



               <div class="col-sm-9">




                  <div class="" id="changedDiv">

                   @include('front.priceRange')


                  </div>
               </div>






        </div><!--row  -->
     </div><!--container  -->
   </section>








   @endsection



   @section('scripts')


    <script >






       $(function () {
               $("#slider-range").slider({
                   range: true,
                   responsive:true,
                   connect: true,

                   min: 100,
                   max: 6000,
                   values: [100, 6000],

                   slide: function (event, ui) {

                       $("#amount_start").val(ui.values[ 0 ]);
                       $("#amount_end").val(ui.values[ 1 ]);
                       var start = $('#amount_start').val();
                       var end = $('#amount_end').val();



                       $.ajax({
                           type: 'get',
                           dataType: 'html',
                           url:"shop",
                           data: "start=" + start + "& end=" + end,
                           success: function (response) {
                               console.log(response);

                                $('#changedDiv').html(response);




                           },//success
                       });


                          }


               });
               });
               </script>






































   <script>
   $(document).ready(function(){
     $('.owl-carousel').owlCarousel({
       loop:true,
       margin:10,
       nav:true,
       dot:true,
       rewind: true,
       autoplay:true,
       autoplayTimeout:4000,
       autoplayHoverPause:true,
       responsive:{
           0:{
               items:1
           },
           300:{
               items:2
           },
           800:{
               items:3
           },
           1000:{
               items:4
           }
       }
   });
   });


   </script>



   <script>
       $('#slick2').slick({


           rows: 3,
        autoplay: true,

   responsive: [{
       breakpoint: 1024,
         settings: {
           slidesToShow: 3,
           slidesToScroll: 3,
           infinite: true,
           dots: true
         }
       },
       {
         breakpoint: 600,
         settings: {
           slidesToShow: 2,
           slidesToScroll: 2
         }
       },
       {
         breakpoint: 480,
         settings: {
           slidesToShow: 1,
           slidesToScroll: 1
         }
       }
       // You can unslick at a given breakpoint now by adding:
       // settings: "unslick"
       // instead of a settings object
     ],





           dots: true,
           arrows: true,
           infinite: false,
           speed: 300,
           slidesToShow: 4,
           slidesToScroll: 4
   });
   </script>
     @endsection



