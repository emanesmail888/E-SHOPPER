@extends('admin.master')
@section('content')



    {{-- <canvas class="my-4 w-100"  width="100" height="2"></canvas> --}}

<div class="row">

<div class="col-md-6">

<h1>Categories</h1>

<table class="table" style="">
            <thead>
                <tr>

                    <th>parent category</th>
                    <th>Category Name</th>
                    <th>Edit</th>
                    <th>Status</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>

            @foreach($categories as $category)

            <tr>
                <td><a href="{{route('category.show',$category->id)}}">

                     {{$category->name}}</a></td>
                   <td>  @foreach ($category->subCategories as $scategory )
           <li> <i class=" fa fa-caret-right">{{$scategory->name}} </i></li>

               @endforeach

                </td>



                     <td>@if($category->status=='0')
                                    Enable
                                    @else
                                    Disable


                                    @endif</td>
                    <td> Edit</td>



            {!! Form::open(['method'=>'DELETE', 'action'=> ['CategoriesController@destroy', $category->id]]) !!}


                <td>  {!! Form::submit('Delete Category', ['class'=>'btn btn-danger col-sm-12']) !!}</td>



                {!! Form::close() !!}

    </tr>
              @endforeach


            </tbody>
    </table>


</div><!-- col-md-6 -->


      <div class="col-md-4">

        <br>

           <div class="card card-body card1  text-white py-5">
       <h2>Create Category</h2>
       <p class="lead">Lorem Ipsum has been the industry's standard dummy text ever since the</p>
          {!! Form::open(['route' => 'category.store', 'method' => 'post']) !!}
            <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>
            {{-- <div class="form-group">
                {{ Form::label('category_id', 'Parent Category') }}
                {{ Form::select('category_id',$subCategories, null, ['class' => 'form-control', 'placeholder'=>'SelectCategory']) }}
                <span style="color:red">{{ $errors->first('category_id') }}</span>
           </div> --}}
            {{-- <td>Category Status</td> --}}
        {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
        <button type="submit" class="btn go btn-block ">Add Category</button>

          {!! Form::close() !!}

     </div>
    </div>


{{--
     @if(isset($products))

    <h3>Products</h3>

    <table class="table table-dark">
        <thead>
            <tr>

                <th>Product Name</th>
                <th>Product Code</th>
                <th>Product Price</th>
                <th>Category Id</th>
            </tr>
        </thead>
        <tbody>
@forelse($products as $product)
    <tr>

        <td style="width:50px;">{{$product->pro_name}} </td>
        <td style="width:50px;">{{$product->pro_code}} </td>
        <td style="width:50px;">{{$product->pro_price}} </td>
        <td style="width:50px;">{{$product->category_id}}</td>
    </tr>
        @empty
        <tr><td>no data</td></tr>
        @endforelse

        </tbody>
    </table>
    @endif --}}
@endsection
