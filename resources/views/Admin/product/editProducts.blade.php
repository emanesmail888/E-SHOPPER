@extends('admin.master')


@section('content')
    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
        <canvas class="my-4 w-100" width="100" height="2"></canvas>

        <h3>Products</h3>
        <div class="row">

            <div class="col-md-4">

                {!! Form::model($Products, [
                    'method' => 'post',
                    'action' => ['ProductsController@editProducts', $Products->id],
                    'files' => true,
                ]) !!}

                <Select class="form-control" name="cat_id">
                    @foreach ($categories as $cat)
                        Category: <option value="{{ $cat->id }}" <?php
                    if($Products->category_id==$cat->id) {?>
                            selected="selected"<?php }?>>{{ ucwords($cat->name) }}</option>
                    @endforeach
                </select>
                <br>



                <div class="form-group">
                    {!! Form::label('pro_name', 'Name:') !!}
                    {!! Form::text('pro_name', null, ['class' => 'form-control']) !!}
                </div>


                <div class="form-group">
                    {!! Form::label('pro_price', 'Pro Price:') !!}
                    {!! Form::text('pro_price', null, ['class' => 'form-control']) !!}
                </div>


                <div class="form-group">
                    {!! Form::label('pro_code', 'Pro Code:') !!}
                    {!! Form::text('pro_code', null, ['class' => 'form-control']) !!}
                </div>






                <img class="card-img-top img-fluid" src="{{ url('images', $Products->image) }}" style="width:50px"
                    alt="Card image cap">


                <div class="form-group">
                    {!! Form::label('spl_price', 'Spl Price:') !!}
                    {!! Form::text('spl_price', null, ['class' => 'form-control']) !!}
                </div>


                <div class="form-group">
                    {!! Form::label('pro_info', 'Pro Info:') !!}
                    {!! Form::text('pro_info', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    New Arrival: <p class="pull-right"><input type="checkbox" name="new_arrival" value="1"></p>
                </div>




                {{ Form::submit('Update', ['class' => 'btn btn-success btn-small']) }}
                {!! Form::close() !!}

            </div><!-- col-md-4 -->


            <div class="col-md-3">




                <!-- Update Attributes -->

                <div class="content-box-large">






                    <div class="content-box-large">

                        <table class="table table-responsive">
                            <tr>
                                <td>Size</td>
                                <td>Color</td>
                                <td>price</td>
                                <td>Update</td>
                            </tr>

                            @foreach ($prots as $prot)
                                {!! Form::open(['url' => 'admin/editProperty', 'method' => 'post']) !!}



                                <tr>
                                    <input type="hidden" name="pro_id" value="{{ $prot->pro_id }}" size="6" />
                                    <!-- products_properties pro_id -->
                                    <input type="hidden" name="id" value="{{ $prot->id }}" size="6" />
                                    <!--// products_properties id -->
                                    <td><input type="text" name="size" value="{{ $prot->size }}" size="6" />
                                    </td>
                                    <td><input type="text" name="color" value="{{ $prot->color }}" size="15" />
                                    </td>
                                    <td><input type="text" name="p_price" value="{{ $prot->p_price }}" size="6" />
                                    </td>
                                    <td colspan="3" align="right"><input type="submit" class="btn btn-success"
                                            value="Save" style="margin:-6px; color:#fff"></td>
                                </tr>
                                {!! Form::close() !!}
                            @endforeach

                        </table>
                        <div>




                            <!-- End Update Attributes -->
                            <div align="center">

                                <a href="{{ route('addProperty', $Products->id) }}" class="btn btn-sm btn-info"
                                    style="margin:5px">Add Property</a>
                                <br>
                            </div>


                            <h1>Change Image</h1>
                            <img class="card-img-top img-fluid" src="{{ url('images', $Products->image) }}"
                                style="width:200px" alt="Card image cap">

                            <p><a href="{{ route('ImageEditForm', $Products->id) }}" class="btn btn-info">Change Image</a>
                            </p>
                        </div>

                    </div><!-- col-md-3 -->



                </div><!-- row -->



    </main>
@endsection
