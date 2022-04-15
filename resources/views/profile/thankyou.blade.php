@extends('front.master')
@section('content')
 <style>
    table td { padding:10px
    }</style>

<canvas class="my-4 w-100"  width="100" height="15"></canvas>


<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li></li>
                <li class="active"></li>
<h3><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>, Welcome</h3>
            </ol>
        </div><!--/breadcrums-->

        <div class="row">

        </div>



    </div>
</section>


@endsection
