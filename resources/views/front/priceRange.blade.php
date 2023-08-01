<div class="container">
    <h1 class=" text-center text-warning"> Featured <span>products</span> </h1>

 {{-- <div class="row "> --}}




        <div class="slick-wrapper   ">


            <div id="slick2">


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






{{-- </div><!-- row --> --}}
  </div> <!-- container -->






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





{{--

  <script>
    $('.slick2').slick({


      rows: 3,
      loop: true,

      responsive: [{
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            dots: true,
            infinite: true




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

      ],





      dots: true,
      arrows: true,
    //   infinite: false,
      autoplay: true,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 2,
      loop: true

    });
  </script> --}}

