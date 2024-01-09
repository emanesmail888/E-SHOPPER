@extends('front.master')
@section('content')
 <style>
    table td { padding:10px
    }</style>



<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs  mt-2">
            <ol class="breadcrumb">
                <li><a href="{{url('/profile')}}" style="color:#d6435b; text-decoration:none;">Profile / </a></li>
                <li class="active pl-2 text-bold">thankyou</li>
               
            </ol>
        </div><!--/breadcrums-->

        <div class="row">
            @if (Session::has('success'))
            <div class="alert alert-success">
              <h3>{{Session::get('success')}}</h3>
           </div>
          @endif
          <h3><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>, Welcome</h3>


        </div>



    </div>
</section>


@endsection
