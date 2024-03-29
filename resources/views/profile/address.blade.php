@extends('front.master')

@section('content')


<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs mt-2">
            <ol class="breadcrumb">
                <li><a href="{{url('/profile')}}" style="color:#d6435b; text-decoration:none;">Profile /</a></li>
                <li class="active">My Address</li>
            </ol>
        </div><!--/breadcrums-->
        @if(session('msg'))
        <div class="alert alert-info">{{session('msg')}}</div>

        @endif



        <div class="row">

            @include('profile.menu')
            <div class="col-md-8">



                <h3><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>, Your Address</h3>


                <div class="container" >

                {!! Form::open(['url' => 'updateAddress',  'method' => 'post']) !!}


                 @foreach($address_data as $value)


                    <div class="form-group row">

                        <div class="form-group col-md-6">
                            <label for="example-text-input" >Full Name</label>
                            <input class="form-control" type="text"  name="fullName" value="{{$value->fullName}}">
                            <span style="color:red">{{ $errors->first('fullName') }}</span>
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="form-group col-md-6">
                            <label for="example-text-input" >City</label>
                            <input class="form-control" type="text"  name="city" value="{{$value->city}}">
                            <span style="color:red">{{ $errors->first('city') }}</span>
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="form-group col-md-6">
                            <label for="example-text-input" >State</label>
                            <input class="form-control" type="text"  name="state" value="{{$value->state}}">
                            <span style="color:red">{{ $errors->first('state') }}</span>
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="form-group col-md-6">
                            <label for="example-text-input" >Pincode</label>
                            <input class="form-control" type="password"  name="pinCode" value="{{$value->pinCode}}">
                            <span style="color:red">{{ $errors->first('pinCode') }}</span>
                        </div>
                    </div>


                    <div class="form-group row">

                        <div class="form-group col-md-6">
                            <label for="example-text-input" >Country</label>
                            <input class="form-control" type="text"  name="country" value="{{$value->country}}">
                            <span style="color:red">{{ $errors->first('country') }}</span>
                        </div>
                    </div>
                    <div class="form-group col-md-6" align="right">
                   <input class="btn btn-primary" type="submit"  value="Update Address">
                    </div>
                 @endforeach
                {!! Form::close() !!}
                </div>

            </div>
        </div>


    </div>
</section>






@endsection
