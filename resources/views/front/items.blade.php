@extends('front.master')
@section('content')


<main role="main">
    <canvas class="my-2 w-100"  width="100" height="3"></canvas>





<section class="mt-5 mb-5 pb-5">
    <div class="container ">
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
                                     <input type="hidden" id="rowId" value="{{$scategory->id}}"/>

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



     <div class="album  bg-light">
                    <div class="container">
                      <h1 class=" text-center ">Search<span>products</span> </h1>

                      <div class="row">
               @forelse ($products as $product)

               <div class="col-md-4 ">
                <div class="card card1 mb-4 shadow-sm">


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
               <div class="pagination  ">

                {{ $products->links() }}
               </div>

            </div><!-- row -->

        </div><!-- container -->


     </div>











            </div><!-- col-sm-9 -->






     </div><!--row  -->
  </div><!--container  -->
</section>
</main>


@endsection
@section('scripts')

<script >


    $(function () {
            $("#slider-range").slider({
                range: true,
                min: 100,
                max: 6000,
                values: [100, 6000],

                slide: function (event, ui) {

                    $("#amount_start").val(ui.values[ 0 ]);
                    $("#amount_end").val(ui.values[ 1 ]);
                    var start = $('#amount_start').val();
                    var end = $('#amount_end').val();
                    var id = $('#rowId').val();

                    $.ajax({
                        type: 'get',
                        dataType: 'html',
                        url: 'filter/'+id,
                        data: "start=" + start + "& end=" + end + "& id=" + id,
                        success: function (response) {
                            console.log(response);
                             $('#updateDiv').html(response);
                            //  $("#updateDiv").append(JSON.stringify(response));
                        }
                    });
                }
            });
            });
</script>

@endsection

