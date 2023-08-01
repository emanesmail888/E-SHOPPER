@extends('front.master')

@section('content')



<canvas class="my-1 w-100"  width="100" height="1"></canvas>


    <div class="container">
     <div class="row">

          @include('profile.menu')


     <div class="col-md-8">
       <ol class="breadcrumb">
                <li></li>
                <img src="../uploads/avatars/{{ Auth::user()->avatar }}"  class=" rounded-circle mr-5  " style="width: 70px; height:70px;"  alt="">

                <p><a href="{{route('ImageProfileForm',Auth::user()->id )}}"
                 class="btn btn-info">Change Image</a>
                  </p>

                  <table border="0" align="center">
                  <tr>
                  <td>  <a href="{{url('/')}}/orders" class="btn btn-success">My Orders</a></td>
                  <td>  <a href="{{url('/address')}}" class="btn btn-success">My Address</a></td>
                  <td>  <a href="{{url('/password')}}" class="btn btn-success">Change Password</a></td>
                  </tr>
                  </table>


                <h3><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>, Welcome</h3>
            </ol>
     </div>



</div>
</div>

@endsection

