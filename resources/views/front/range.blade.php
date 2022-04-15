<div class="container">
    <h1 class=" text-center text-warning"> Featured <span>products</span> </h1>

 <div class="row ">




        <div class="slick-wrapper   ">


            <div id="slick1">


            @forelse ($products as $product)



            <div class="slide-item  ">



                <div class="card card1 mb-4 shadow-sm">
                    <div class="card-body">
                        <img src="{{url('images', $product->image)}}" class="card-img w-100  " alt="card image cap">

                        <p class="card-text">{{$product->pro_name}}</p>


                        <h2 id="price">
                            @if($product->spl_price==0)
                            ${{$product->pro_price}}
                            @else
                            <div class=" price">
                          <span style="text-decoration:line-through; color:rgb(201, 34, 75)">
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


                           </div><!-- btn-group -->



                        </div><!-- card-body -->

              </div><!-- card -->

             </div><!-- swiper-slider -->


             @empty
             <h2>No Product Found.!</h2>
             @endforelse








            </div>


        </div><!-- swiper-wrapper-->






</div><!-- row -->
  </div> <!-- container -->






<script>
    $('#slick1').slick({


		rows: 2,
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














    {{-- <div class="container mb-5 pb-5  ">
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

    </div><!-- container --> --}}
{{-- <script>
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
       autoplay:true,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })
</script> --}}






{{-- <script>
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


</script> --}}













{{--





















       <div class="container">
        <h1 class=" text-center text-warning"> Featured <span>products</span> </h1>

     <div class="row ">


        <div class="swiper  product-slider  ">


            <div class="swiper-wrapper   ">



                @forelse ($products as $product)



                <div class="swiper-slide   ">



                    <div class="card card1 mb-4 shadow-sm">
                        <div class="card-body">
                            <img src="{{url('images', $product->image)}}" class="card-img w-100  " alt="card image cap">

                            <p class="card-text">{{$product->pro_name}}</p>


                            <h2 id="price">
                                @if($product->spl_price==0)
                                ${{$product->pro_price}}
                                @else
                                <div class=" price">
                              <span style="text-decoration:line-through; color:rgb(201, 34, 75)">
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


                               </div><!-- btn-group -->



                            </div><!-- card-body -->

                  </div><!-- card -->

                 </div><!-- swiper-slider -->


                 @empty
                 <h2>No Product Found.!</h2>
                 @endforelse











            </div><!-- swiper-wrapper-->


           <div class="swiper-button-prev  "></div>
           <div class="swiper-button-next  "></div>
             <div class="swiper-pagination"></div>

           <!-- If we need scrollbar -->
           {{-- <div class="swiper-scrollbar"></div> --}}
         {{-- </div><!-- swiper -->

             <!-- If we need navigation buttons -->



    </div><!-- row -->
      </div> <!-- container --> --}}












{{-- <script>
 var mySwiper = new Swiper('.product-slider', {
    loop:true,
    slidesPerView: 3,
    slidesPerColumn: 3,
    slidesPerGroup :3,
    spaceBetween: 30,
        grid: {
          rows: 2,
        },
    autoplay: {
        delay: 5200,
        disableOnInteraction: false,
    },
    pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

    on: {
      init: function () {},
      orientationchange: function(){},
      beforeResize: function(){
        let vw = window.innerWidth;
        if(vw > 1000){
          mySwiper.params.slidesPerView = 3
            mySwiper.params.slidesPerColumn = 3
            mySwiper.params.slidesPerGroup = 3;
        } else {
          mySwiper.params.slidesPerView = 4
            mySwiper.params.slidesPerColumn = 2
            mySwiper.params.slidesPerGroup =4;
        }
        mySwiper.init();
      },
    },
});
</script> --}}
{{-- <script>
    var swiper = new Swiper(".product-slider", {
    loop:true,
    slidesPerView: 4,
  slidesPerColumnFill: "row",


 //  slidesPerColumn: 2,
 //  slidesPerGroup: 6,




    spaceBetween: 20,
    autoplay: {
        delay: 5200,
        disableOnInteraction: false,
    },
    centeredSlides: false,
    // breakpoints: {
    //   0: {
    //     slidesPerView: 1,
    //   },
    //   800: {
    //     slidesPerView: 2,
    //   },
    //   1020: {
    //     slidesPerView: 3,
    //   },


    // },
    pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
 //   scrollbar: {
 //     el: '.swiper-scrollbar',
 //   },
 });

</script> --}}
  {{-- <script>


var elm = document.querySelector(".product-slider");

var swiper = new Swiper(elm, {
  loop: true, // <- causes issues combined with multi row setup!!
  slidesPerView: 3,
  slidesPerColumn: 2,
  spaceBetween: 30,
  pagination: {
    el: ".swiper-pagination",
    clickable: true
  }
});

window.addEventListener("load", () => {});



</script> --}}
