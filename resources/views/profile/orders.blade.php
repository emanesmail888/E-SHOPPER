@extends('front.master')
@section('content')
<style>
    table td { padding:10px
    }</style>


<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs mt-2">
            <ol class="breadcrumb">
                <li><a href="{{url('/profile')}}" style="color:#d6435b; text-decoration:none;">Profile / </a></li>
                <li class="active  pl-2 text-bold">My Order</li>
            </ol>
        </div><!--/breadcrums-->



        <div class="row">



          @include('profile.menu')




            <div class="col-md-8">
               <h3 ><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>,  Your Orders</h3>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Product name</th>
                            <th>Product Code</th>
                            <th>Order Total</th>
                            <th>Order Status</th>



                        </tr>
                    </thead>

                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{$order->created_at}}</td>
                            <td>{{ucwords($order->pro_name)}}</td>
                            <td>{{$order->pro_code}}</td>
                            <td>{{$order->total}}</td>
                            <td>{{$order->status}}</td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</section>



@endsection
