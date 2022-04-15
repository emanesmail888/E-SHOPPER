@extends('admin.master')
@section('content')
 <div class="container-fluid">
    <div class="row">
      {{-- <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light pt-5  sidebar"> --}}


            <h1>Dashboard</h1>
             <div class="col-md-6">

            <h1>Add New Product</h1>

            <div class="panel-body">


            {!! Form::open(['route' => 'product.store', 'method' => 'post', 'files' => true]) !!}

              <div class="form-group">
                    {{ Form::label('Proname', 'Name') }}
                    {{ Form::text('pro_name', null, array('class' => 'form-control','required'=>'','minlength'=>'5')) }}

                       <span style="color:red">{{ $errors->first('pro_name') }}</span>
                </div>



                <div class="form-group">
                    {{ Form::label('Code', 'Code') }}
                    {{ Form::text('pro_code', null, array('class' => 'form-control')) }}

                       <span style="color:red">{{ $errors->first('pro_code') }}</span>
                </div>

                 <div class="form-group">
                    {{ Form::label('stock', 'stock') }}
                    {{ Form::text('stock', null, array('class' => 'form-control')) }}
                  </div>

                <div class="form-group">
                    {{ Form::label('price', 'Price') }}
                    {{ Form::text('pro_price', null, array('class' => 'form-control')) }}

                       <span style="color:red">{{ $errors->first('pro_price') }}</span>
                </div>

                <div class="form-group">
                    {{ Form::label('category_id', 'Categories') }}
                    {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder'=>'SelectCategory']) }}

                    <span style="color:red">{{ $errors->first('category_id') }}</span>
               </div>
                <div class="form-group">
                    {{ Form::label('subCategories_id', 'SubCategory') }}
                    {{ Form::select('subCategories_id', $subCategories, null, ['class' => 'form-control', 'placeholder'=>'SelectproductsType']) }}

                    <span style="color:red">{{ $errors->first('sub_categories_id') }}</span>
               </div>


                 <div class="form-group">
                    {{ Form::label('Description', 'Description') }}
                    {{ Form::text('pro_info', null, array('class' => 'form-control')) }}

                       <span style="color:red">{{ $errors->first('pro_info') }}</span>
                </div>

           <div class="form-group">
                {{ Form::label('image', 'Image') }}
                {{ Form::file('image',array('class' => 'form-control')) }}

                       <span style="color:red">{{ $errors->first('image') }}</span>

            </div>


                 <div class="form-group">
                    {{ Form::label('Sale Price', 'Sale Price') }}
                    {{ Form::text('spl_price', null, array('class' => 'form-control')) }}

                       <span style="color:red">{{ $errors->first('spl_price') }}</span>
                </div>

                {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

     {!! Form::close() !!}


    </div><!-- row -->

</div><!-- container-fluid -->

        </div>
 @endsection



