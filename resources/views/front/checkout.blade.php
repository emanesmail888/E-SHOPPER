@extends('front.master')
@section('content')
    <section class="hero hero-page gray-bg padding-small">
        <div class="container">
            <div class="row d-flex">
                <div class="col-lg-9 order-2 order-lg-1">
                    <h1>Checkout</h1>
                    <p class="lead text-muted">You currently have {{ Cart::count() }} item(s) in your basket</p>
                </div>
                <ul
                    class="breadcrumb d-flex justify-content-start justify-content-lg-center col-lg-3 text-right order-1 order-lg-2">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Checout Forms-->
    <section id="cart_items">
        <div class="container">
            <h1 class="text-warning text-center">Shopping Cart</h1>

            <div id="updateDiv">


                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <h3>{{ Session::get('success') }}</h3>
                    </div>
                @endif



                <div class="table-responsive cart_info">

                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Image</td>
                                <td class="description">Product</td>
                                <td class="price">Price</td>
                                <td class="quantity">Quantity</td>
                                <td class="total">Total</td>
                                <td class="delete">Delete</td>
                            </tr>





                        </thead>


                        @foreach ($cartItems as $cartItem)
                            <tbody>
                                <tr>
                                    <td class="cart">

                                        <img src="{{ url('images', $cartItem->options->img) }}"
                                            style="height: 50px; width:50px;">

                                    </td>
                                    <td class="cart_description">
                                        <a href="{{ url('/product_details') }}/{{ $cartItem->id }}">
                                            <h4><a href="{{ url('/product_details') }}/{{ $cartItem->id }}"
                                                    style="color:green">{{ $cartItem->name }}</a></h4>
                                            <p> ID: {{ $cartItem->id }}</p>


                                    </td>
                                    <td class="cart_price">
                                        <p>${{ $cartItem->price }}</p>
                                    </td>
                                    {!! Form::open(['url' => ['cart/update', $cartItem->rowId], 'method' => 'put']) !!}

                                    <td class="cart_quantity">

                                        <input type="number" size="2" value="{{ $cartItem->qty }}" name="qty"
                                            autocomplete="off" style="text-align:center; max-width:65px; " MIN="1"
                                            MAX="1000">

                                        <button class="btn btn-success btn-sm" styel="margin:7px">Update</button>

                                        {!! Form::close() !!}
                                    </td>



                                    <td class="cart_total">
                                        <p class="cart_total_price">{{ $cartItem->subtotal }}</p>
                                    </td>
                                    <td class="cart_delete">
                                        <button class="btn btn-danger">
                                            <a class="cart_quantity_delete text-white "
                                                href="{{ url('/cart/remove') }}/{{ $cartItem->rowId }}">Delete</a>
                                        </button>
                                    </td>
                                </tr>






                            </tbody>
                        @endforeach
                    </table>

                </div>
                <!-- End of Updatediv</div> -->
            </div>


        </div>
    </section>


    <?php // form start here
    ?>
    <section class="checkout">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a href="#address" class="nav-link active">Address</a></li>
                        <li class="nav-item"><a href="#" class="nav-link disabled">Delivery Method </a></li>
                        <li class="nav-item"><a href="#" class="nav-link disabled">Payment Method </a></li>
                        <li class="nav-item"><a href="#" class="nav-link disabled">Order Review</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="address" class="active tab-block">




                            <form action="{{ url('/') }}/formvalidate" method="post">
                                {{-- @csrf --}}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                    <h1>Shopper Information</h1>

                                    <div class="form-group col-md-6">
                                        <label for="fullName" class="form-label">Display Name</label>


                                        <input id="fullName" type="text" name="fullName" placeholder="Display Name"
                                            value="{{ old('fullName') }}" class="form-control">
                                        <br>
                                        <span style="color:red">{{ $errors->first('fullName') }}</span>


                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="state" class="form-label">State Name</label>

                                        <input id="state" type="text" name="state" placeholder="State Name"
                                            value="{{ old('state') }}" class="form-control">
                                        <br>
                                        <span style="color:red">{{ $errors->first('state') }}</span>
                                    </div>




                                    <div class="form-group col-md-6">
                                        <label for="pinCode" class="form-label">Pincode</label>

                                        <input id="pinCode" type="text" name="pinCode" placeholder="pinCode"
                                            value="{{ old('pinCode') }}" class="form-control">
                                        <br>
                                        <span style="color:red">{{ $errors->first('pinCode') }}</span>

                                    </div>




                                    <div class="form-group col-md-6">
                                        <label for="city" class="form-label">City Name</label>

                                        <input id="city" type="text" name="city" placeholder="City Name"
                                            value="{{ old('city') }}" class="form-control">
                                        <br>
                                        <span style="color:red">{{ $errors->first('city') }}</span>

                                    </div>


                                    <hr>

                                    <select name="country" class="form-control">
                                        <option value="{{ old('country') }}" selected="selected">Select country</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="United States">United States</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="UK">UK</option>
                                        <option value="India">India</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Ucrane">Ucrane</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Dubai">Dubai</option>
                                    </select>
                                    <span style="color:red">{{ $errors->first('country') }}</span>

                                    {{-- <div class="payment-options">
            <span>
                <input type="radio" name="pay" value="COD" checked="checked" id="cash"> COD

            </span>
            <span>
                <input type="radio" name="pay" value="paypal" id="paypal"> PayPal
                @include('front.paypal')
            </span>

            <span>
            <input type="submit" value="COD" class="btn btn-primary" id="cashbtn">
            </span>
        </div> --}}



                                    <span>
                                        <input type="radio" name="payment_type" value="COD" checked="checked"> COD
                                    </span>

                                    <span>
                                        <input type="radio" name="payment_type" value="paypal"> PayPal
                                    </span>



                                    <button class="btn btn-md d-block mx-auto" style=" background-color:rgb(158, 32, 60); color:#ffff;">Continue</button>







                                </div>
                            </form>



                            <div class="CTAs d-flex justify-content-between flex-column flex-lg-row mb-5 pb-3">
                                <a href="{{ url('/cart') }}"class="btn btn-template-outlined wide prev"> <i class="fa fa-angle-left"></i>Back to
                                    basket</a><a href="{{ url('/') }}/checkout" class="btn btn-template wide next">Choose delivery
                                    method<i class="fa fa-angle-right"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="block-body order-summary">
                        <h4 class="text-uppercase text-warning">Order Summary</h4>
                        <p>Shipping and additional costs are calculated based on values you have entered</p>
                        <ul class="order-menu list-unstyled">
                            <li class="d-flex justify-content-between"><span>Order Subtotal
                                </span><strong>EGP P {{ Cart::subtotal() }}</strong></li>
                            <li class="d-flex justify-content-between"><span>Shipping and
                                    handling</span><strong>EGP P 10.00</strong></li>
                            <li class="d-flex justify-content-between">
                                <span>Tax</span><strong>EGP P {{ Cart::tax() }}</strong></li>
                            <li class="d-flex justify-content-between"><span>Total</span><strong
                                    class="text-primary price-total">EGP P {{ Cart::total() }}</strong></li>
                        </ul>
                        <div id="paypal" style="display: none" >
                            @include('front.paypal')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php // form start here
    ?>
@endsection

@section('scripts')
    <script>
        $(function() {
            $('input[name="payment_type"]').on('click', function() {
                if ($(this).val() == 'paypal') {
                    $('#paypal').show();
                } else {
                    $('#paypal').hide();
                }
            });
        });
    </script>
@endsection
