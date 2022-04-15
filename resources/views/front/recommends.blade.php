

 <div class="container">
    <div class="row">
        <div class="col-sm-2">

        </div>
        <div class="col-sm-8">

          <div id="myCarousel" class="carousel slide bg-dark" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            </ol>
            <div class="carousel-inner bg-black">
                @foreach($items as $key => $slider)
                <div class="carousel-item w-100 {{$key == 0 ? 'active' : '' }}">
                    <img src="{{url('images', $slider->image)}}" class="d-block w-50 h-50 bg-opacity-75"  alt="...">

                    <div class="carousel-caption d-block text-white text-sm-right  ">
                    <h3>{{$slider->pro_name}}</h3>
                    <p>{{$slider->pro_info}}</p>
                </div>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button"  data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true">     </span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div><!-- col-sm-8 -->
    <div class="col-sm-2">

    </div>

    </div><!-- row -->
    </div><!-- container -->



{{-- <section>
          <div class="container">

         <div class="row ">


            <div class="swiper product-slider  ">

                <div class="swiper-wrapper   ">
                @forelse ($items as $slider)
                    <div class="swiper-slide  ">
                        <div class="card card1 mb-4 shadow-sm">
                            <div class="card-body ">
                              <img src="{{url('images', $slider->image)}}" class="card-img w-100 h-50   " alt="card image cap">
                              <p class="card-text">{{$slider->pro_name}}</p>





                              <div class="btn-group-vertical d-block">
                                <button type="button" class="btn btn-outline-secondary  btn-primary ">
                                    <a href="{{url('/product_details')}}/<?php echo $product->id; ?>"
                                        class="add-to-cart text-white ">View Product</a>
                                </button>

                                <button type="button" class="btn btn-outline-secondary mt-1 btn-primary ">
                                    <a href="{{url('/cart/addItem')}}/<?php echo $product->id; ?>"
                                        class="add-to-cart text-white">Add To Cart
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </button>


                               </div>

                            </div><!-- btn-group -->
                       </div><!-- card-body -->
                     </div><!-- card -->


                     </div><!-- swiper-slider -->

          @empty
               <h3>No products</h3>
             @endforelse


               </div><!-- swiper-wrapper-->


               {{-- <div class="swiper-pagination"></div> --}}

               {{-- <div class="swiper-button-prev "></div>

        <div class="swiper-button-next  text-success"></div> --}}
               <!-- If we need scrollbar -->
               {{-- <div class="swiper-scrollbar"></div> --}}
             {{-- </div><!-- swiper --> --}}
                 <!-- If we need navigation buttons -->



        {{-- </div><!-- row -->
          </div> <!-- container -->


        </section> --}}


          {{-- @section('scripts')
          <script>
              var swiper = new Swiper(".product-slider", {
              loop:true,
              spaceBetween: 20,
              autoplay: {
                  delay: 2000,
                  disableOnInteraction: false,
              },
              centeredSlides: true,
              breakpoints: {
                0: {
                  slidesPerView: 1,
                },
                800: {
                  slidesPerView: 2,
                },
                1020: {
                  slidesPerView: 3,
                },


              },
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

           </script>--}}



          {{-- @endsection --}}


