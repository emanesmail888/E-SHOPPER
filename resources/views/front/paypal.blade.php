{{-- <input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="upload" value="1">
<input type="hidden" name="business" value="maxwell@hotmail.com"> --}}


<div style="margin-bottom:10px;">
    <form action="{{ route('paypal') }}" method="post">
    @csrf


    @php

    $cart=Cart::total();
    // $total= RemoveSpecialChar($cart);
    $total= preg_replace("/[^0-9\.]/", '', $cart);
    // var_dump($total);

    @endphp



    <input type="hidden" name="price" value="{{$total}}">





    {{-- <button type="submit">Pay With PayPal</button> --}}
    <input name="submit" id="paypalbtn" type="image"
 src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/blue-rect-paypalcheckout-34px.png"
  value="PayPal" > 
    </form>
</div>


