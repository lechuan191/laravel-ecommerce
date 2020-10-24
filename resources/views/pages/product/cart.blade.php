@extends('layouts.master')
<!-- Begin Li's Breadcrumb Area -->
@section('breadcrumb')
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ul>
        </div>
    </div>
</div>
@endsection
<!-- Li's Breadcrumb Area End Here -->
<!--Shopping Cart Area Strat-->
@section('content')
<div class="Shopping-cart-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                {{-- <form action="#"> --}}
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>

                                    <th class="li-product-thumbnail">images</th>
                                    <th class="cart-product-name">Product Name</th>
                                    <th class="li-product-size">Size</th>
                                    <th class="li-product-color">Color</th>
                                    <th class="li-product-price">Unit Price</th>
                                    <th class="li-product-quantity">Quantity</th>
                                    <th class="li-product-subtotal">Total</th>
                                    <th class="li-product-remove">remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $cart)
                                <tr>
                                    <td class="li-product-thumbnail"><a href="#"><img src="{{ asset('/upload/product/'.$cart->options->image) }}" alt="Li's Product Image" width="90px"></a></td>
                                    <td class="li-product-name"><a href="{{route('product.details',$cart->id)}}">{{$cart->name}}</a></td>
                                    <td class="li-product-size"><span class="amount">{{$cart->options->size}}</span></td>
                                    <td class="li-product-color"><span class="amount">{{$cart->options->color}}</span></td>
                                    <td class="li-product-price"><span class="amount">{{number_format($cart->price).'VND'}}</span></td>
                                    <td class="quantity">
                                        <form method="post" action="{{ route('update.cart') }}">
                                            @csrf
                                            <div>
                                                <input type="hidden" name="product_id" value="{{ $cart->rowId }}">
                                                <input value="{{ $cart->qty }}" type="number" name="qty" style="width:70px;height:40px;">
                                                <button type="submit" class="btn btn-success" style="padding:1px 5px;margin-top: 5px;">Update</button>
                                            </div>
                                        </form>
                                    </td>
                                    <td class="product-subtotal"><span class="amount">{{number_format($cart->price * $cart->qty).'VND'}}</span></td>
                                <td class="li-product-remove"><a href="{{route('remove.cart',$cart->rowId)}}" class="btn btn-danger"><i class="fa fa-times"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon">
                                    <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                    <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                </div>
                                <div class="coupon2">
                                    <input class="button" name="update_cart" value="Update cart" type="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul>
                                    <li>Subtotal <span>{{Cart::subtotal().' VND'}}</span></li>
                                    <li>Total <span>{{Cart::subtotal().' VND'}}</span></li>
                                </ul>
                                <a href="#">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
</div>
<!--Shopping Cart Area End-->
@endsection
