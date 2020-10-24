@extends('layouts.master')
{{-- @section('slide')
<div class="slider-with-banner">
    <div class="container">
        <div class="row">
            <!-- Begin Slider Area -->
            <div class="col-lg-8 col-md-8">
                <div class="slider-area">
                    <div class="slider-active owl-carousel">
                        <!-- Begin Single Slide Area -->
                        <div class="single-slide align-center-left  animation-style-01 bg-1">
                            <div class="slider-progress"></div>
                            <div class="slider-content">
                                <h5>Sale Offer <span>-20% Off</span> This Week</h5>
                                <h2>Chamcham Galaxy S9 | S9+</h2>
                                <h3>Starting at <span>$1209.00</span></h3>
                                <div class="default-btn slide-btn">
                                    <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Slide Area End Here -->
                        <!-- Begin Single Slide Area -->
                        <div class="single-slide align-center-left animation-style-02 bg-2">
                            <div class="slider-progress"></div>
                            <div class="slider-content">
                                <h5>Sale Offer <span>Black Friday</span> This Week</h5>
                                <h2>Work Desk Surface Studio 2018</h2>
                                <h3>Starting at <span>$824.00</span></h3>
                                <div class="default-btn slide-btn">
                                    <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Slide Area End Here -->
                        <!-- Begin Single Slide Area -->
                        <div class="single-slide align-center-left animation-style-01 bg-3">
                            <div class="slider-progress"></div>
                            <div class="slider-content">
                                <h5>Sale Offer <span>-10% Off</span> This Week</h5>
                                <h2>Phantom 4 Pro+ Obsidian</h2>
                                <h3>Starting at <span>$1849.00</span></h3>
                                <div class="default-btn slide-btn">
                                    <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Slide Area End Here -->
                    </div>
                </div>
            </div>
            <!-- Slider Area End Here -->
            <!-- Begin Li Banner Area -->
            <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                <div class="li-banner">
                    <a href="#">
                        <img src="{{ asset('frontend/images/banner/1_1.jpg')}}" alt="">
                    </a>
                </div>
                <div class="li-banner mt-15 mt-sm-30 mt-xs-30">
                    <a href="#">
                        <img src="{{ asset('frontend/images/banner/1_2.jpg')}}" alt="">
                    </a>
                </div>
            </div>
            <!-- Li Banner Area End Here -->
        </div>
    </div>
</div>
@endsection --}}
@section('content')
<div class="product-area pt-60 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                       <li><a class="active" data-toggle="tab" href="#li-new-product"><span>New Arrival</span></a></li>
                       <li><a data-toggle="tab" href="#li-bestseller-product"><span>Bestseller</span></a></li>
                       <li><a data-toggle="tab" href="#li-featured-product"><span>Featured Products</span></a></li>
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
            <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        @php
                        $hot_new = DB::table('products')->where('status', 1)->where('hot_new', 1)->take(5)->get();

                        @endphp
                        @foreach ($hot_new as $item)
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="{{ asset('/upload/product/'.$item->image_one)}}" alt="Li's Product Image">
                                    </a>
                                    @php
                                        $amount = $item->selling_price - $item->discount_price;
                                        $discount = $amount/$item->selling_price*100;
                                    @endphp
                                    @if($item->discount_price == NULL)
                                        <span class="sticker">New</span>
                                    @else
                                        <span class="sticker" style="background-color: red;"> {{ intval($discount) }}%</span>
                                    @endif
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="shop-left-sidebar.html">Graphic Corner</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    <h4><a class="product_name" href="{{route('product.details',$item->id)}}">{{$item->product_name}}</a></h4>
                                        <div class="price-box">
                                            @if ($item->discount_price ==null)
                                                <span class="new-price">{{number_format($item->selling_price)}} VND</span>
                                            @else
                                                <span class="new-price new-price-2">{{ number_format($item->discount_price) }} VND</span>
                                                <span class="old-price">{{ number_format($item->selling_price) }} VND</span>
                                                <span class="discount-percentage">{{ intval($discount) }}%</span>
                                            @endif
                                            {{-- <span class="new-price">$46.80</span>
                                            <span class="new-price new-price-2">$71.80</span>
                                            <span class="old-price">$77.22</span>
                                            <span class="discount-percentage">-7%</span> --}}
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="{{route('product.details',$item->id)}}">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="javascript:void(0)" title="quick view" class="quick-view-btn addcart" data-target="#myModal" data-id="{{ $item->id }}"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div id="li-bestseller-product" class="tab-pane" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        @php
                            $best_rated = DB::table('products')->where('status', 1)->where('best_rated', 1)->take(5)->get();
                        @endphp
                        @foreach ($best_rated as $item)
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="{{ asset('/upload/product/'.$item->image_one)}}" alt="Li's Product Image">
                                    </a>
                                    @php
                                        $amount = $item->selling_price - $item->discount_price;
                                        $discount = $amount/$item->selling_price*100;
                                    @endphp
                                    @if($item->discount_price == NULL)
                                        <span class="sticker">New</span>
                                    @else
                                        <span class="sticker" style="background-color: red;"> {{ intval($discount) }}%</span>
                                    @endif
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="shop-left-sidebar.html">Studio Design</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="{{route('product.details',$item->id)}}">{{$item->product_name}}</a></h4>
                                        <div class="price-box">
                                            @if ($item->discount_price ==null)
                                                <span class="new-price">{{number_format($item->selling_price)}} VND</span>
                                            @else
                                                <span class="new-price new-price-2">{{ number_format($item->discount_price) }} VND</span>
                                                <span class="old-price">{{ number_format($item->selling_price) }} VND</span>
                                                <span class="discount-percentage">{{ intval($discount) }}%</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="{{route('product.details',$item->id)}}">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="javascript:void(0)" title="quick view" class="quick-view-btn addcart" data-target="#myModal" data-id="{{ $item->id }}"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div id="li-featured-product" class="tab-pane" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        @php
                            $hot_deal = DB::table('products')->where('status', 1)->where('hot_deal', 1)->take(5)->get();
                        @endphp
                        @foreach ($hot_deal as $item)
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="{{ asset('/upload/product/'.$item->image_one)}}" alt="Li's Product Image">
                                    </a>
                                    @php
                                        $amount = $item->selling_price - $item->discount_price;
                                        $discount = $amount/$item->selling_price*100;
                                    @endphp
                                    @if($item->discount_price == NULL)
                                        <span class="sticker">New</span>
                                    @else
                                        <span class="sticker" style="background-color: red;"> {{ intval($discount) }}%</span>
                                    @endif
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="shop-left-sidebar.html">Graphic Corner</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="{{route('product.details',$item->id)}}">{{$item->product_name}}</a></h4>
                                        <div class="price-box">
                                            @if ($item->discount_price ==null)
                                                <span class="new-price">{{number_format($item->selling_price)}} VND</span>
                                            @else
                                                <span class="new-price new-price-2">{{ number_format($item->discount_price) }}</span>
                                                <span class="old-price">{{ number_format($item->selling_price) }} VND</span>
                                                <span class="discount-percentage">{{ intval($discount) }}%</span>
                                            @endif
                                            {{-- <span class="new-price">$46.80</span>
                                            <span class="new-price new-price-2">$71.80</span>
                                            <span class="old-price">$77.22</span>
                                            <span class="discount-percentage">-7%</span> --}}
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="{{route('product.details',$item->id)}}">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="javascript:void(0)" title="quick view" class="quick-view-btn addcart" data-target="#myModal" data-id="{{ $item->id }}"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End Here -->
<!-- Begin Li's Static Banner Area -->
{{-- <div class="li-static-banner">
    <div class="container">
        <div class="row">
            <!-- Begin Single Banner Area -->
            <div class="col-lg-4 col-md-4 text-center">
                <div class="single-banner">
                    <a href="#">
                        <img src="{{ asset('frontend/images/banner/1_3.jpg')}}" alt="Li's Static Banner">
                    </a>
                </div>
            </div>
            <!-- Single Banner Area End Here -->
            <!-- Begin Single Banner Area -->
            <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                <div class="single-banner">
                    <a href="#">
                        <img src="{{ asset('frontend/images/banner/1_4.jpg')}}" alt="Li's Static Banner">
                    </a>
                </div>
            </div>
            <!-- Single Banner Area End Here -->
            <!-- Begin Single Banner Area -->
            <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                <div class="single-banner">
                    <a href="#">
                        <img src="{{ asset('frontend/images/banner/1_5.jpg')}}" alt="Li's Static Banner">
                    </a>
                </div>
            </div>
            <!-- Single Banner Area End Here -->
        </div>
    </div>
</div> --}}
<!-- Li's Static Banner Area End Here -->
<!-- Begin Li's Laptop Product Area -->
<section class="product-area li-laptop-product pt-60 pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            @php
                $category = DB::table('categories')->where('id', '=', 2)->first();
                $product_men = DB::table('products')->where('category_id',$category->id)->where('status',1)->limit(10)->get();
            @endphp
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>{{ $category->category_name }}</span>
                    </h2>

                    <ul class="li-sub-category-list">
                        <li><a href="shop-left-sidebar.html">Electronics</a></li>
                        <li><a href="shop-left-sidebar.html">Electronics</a></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach ($product_men as $men)
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="{{ asset('/upload/product/'.$men->image_one)}}" alt="Li's Product Image">
                                    </a>
                                    @php
                                        $amount = $men->selling_price - $men->discount_price;
                                        $discount = $amount/$men->selling_price*100;
                                    @endphp
                                    @if($men->discount_price == NULL)
                                        <span class="sticker">New</span>
                                    @else
                                        <span class="sticker" style="background-color: red;"> {{ intval($discount) }}%</span>
                                    @endif
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="shop-left-sidebar.html">Studio Design</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="{{route('product.details',$men->id)}}">{{$men->product_name}}</a></h4>
                                        <div class="price-box">
                                            @if ($men->discount_price ==null)
                                                <span class="new-price">{{number_format($men->selling_price)}} VND</span>
                                            @else
                                                <span class="new-price new-price-2">{{ number_format($men->discount_price) }} VND</span>
                                                <span class="old-price">{{ number_format($men->selling_price) }} VND</span>
                                                <span class="discount-percentage">{{ intval($discount) }}%</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="{{route('product.details',$men->id)}}">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="javascript:void(0)" title="quick view" class="quick-view-btn addcart" data-target="#myModal" data-id="{{ $men->id }}"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Li's Section Area End Here -->
        </div>
    </div>
</section>
<!-- Li's Laptop Product Area End Here -->
<!-- Begin Li's TV & Audio Product Area -->
<section class="product-area li-laptop-product li-tv-audio-product pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            @php
                $category = DB::table('categories')->where('id', '=', 3)->first();
                $product = DB::table('products')->where('category_id',$category->id)->where('status',1)->limit(10)->get();
            @endphp
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>{{$category->category_name}}</span>
                    </h2>
                    <ul class="li-sub-category-list">
                        <li class="active"><a href="shop-left-sidebar.html">Chamcham</a></li>
                        <li><a href="shop-left-sidebar.html">Sanai</a></li>
                        <li><a href="shop-left-sidebar.html">Meito</a></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach ($product as $item)
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="{{ asset('/upload/product/'.$item->image_one)}}" alt="Li's Product Image">
                                    </a>
                                    @php
                                        $amount = $item->selling_price - $item->discount_price;
                                        $discount = $amount/$item->selling_price*100;
                                    @endphp
                                    @if($item->discount_price == NULL)
                                        <span class="sticker">New</span>
                                    @else
                                        <span class="sticker" style="background-color: red;"> {{ intval($discount) }}%</span>
                                    @endif
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="shop-left-sidebar.html">Graphic Corner</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="{{route('product.details',$item->id)}}">{{$item->product_name}}</a></h4>
                                        <div class="price-box">
                                            @if ($item->discount_price ==null)
                                                <span class="new-price">{{number_format($item->selling_price)}} VND</span>
                                            @else
                                                <span class="new-price new-price-2">{{ number_format($item->discount_price) }} VND</span>
                                                <span class="old-price">{{ number_format($item->selling_price )}} VND</span>
                                                <span class="discount-percentage">{{ intval($discount) }}%</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="{{route('product.details',$item->id)}}">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="javascript:void(0)" title="quick view" class="quick-view-btn addcart" data-target="#myModal" data-id="{{ $item->id }}"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <!-- Li's Section Area End Here -->
        </div>
    </div>
</section>
<!-- Li's TV & Audio Product Area End Here -->
<!-- Begin Li's Static Home Area -->
{{-- <div class="li-static-home">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Begin Li's Static Home Image Area -->
                <div class="li-static-home-image"></div>
                <!-- Li's Static Home Image Area End Here -->
                <!-- Begin Li's Static Home Content Area -->
                <div class="li-static-home-content">
                    <p>Sale Offer<span>-20% Off</span>This Week</p>
                    <h2>Featured Product</h2>
                    <h2>Meito Accessories 2018</h2>
                    <p class="schedule">
                        Starting at
                        <span> $1209.00</span>
                    </p>
                    <div class="default-btn">
                        <a href="shop-left-sidebar.html" class="links">Shopping Now</a>
                    </div>
                </div>
                <!-- Li's Static Home Content Area End Here -->
            </div>
        </div>
    </div>
</div> --}}
<div class="modal fade modal-wrapper" id="myModal" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-inner-area row">
                    <div class="col-lg-5 col-md-6 col-sm-6">
                       <!-- Product Details Left -->
                        <div class="product-details-left">
                            <div class="product-details-images slider-navigation-1">
                                <div class="lg-image">
                                    <img src="{{ asset('frontend/images/product/large-size/1.jpg')}}" alt="product image" class="product_image1">
                                </div>
                                <div class="lg-image">
                                    <img src="{{ asset('frontend/images/product/large-size/2.jpg')}}" alt="product image" class="product_image2">
                                </div>
                                <div class="lg-image">
                                    <img src="{{ asset('frontend/images/product/large-size/3.jpg')}}" alt="product image" class="product_image3">
                                </div>
                            </div>
                            <div class="product-details-thumbs slider-thumbs-1">
                                <div class="sm-image"><img src="{{ asset('frontend/images/product/small-size/1.jpg')}}" alt="product image thumb" class="product_image1"></div>
                                <div class="sm-image"><img src="{{ asset('frontend/images/product/small-size/2.jpg')}}" alt="product image thumb" class="product_image2"></div>
                                <div class="sm-image"><img src="{{ asset('frontend/images/product/small-size/3.jpg')}}" alt="product image thumb" class="product_image3"></div>

                            </div>
                        </div>
                        <!--// Product Details Left -->
                    </div>

                    <div class="col-lg-7 col-md-6 col-sm-6">
                        <div class="product-details-view-content pt-60">
                            <div class="product-info">
                                <span>Product Name: </span>
                                <h2 id="product_name">Today is a good day Framed poster</h2>

                                <span> Product code: </span>
                                <span class="product-details-ref" id="product_code">Reference: demo_15</span>
                                <div class="rating-box pt-20">
                                    <ul class="rating rating-with-review-item">
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                        <li class="review-item"><a href="#">Read Review</a></li>
                                        <li class="review-item"><a href="#">Write Review</a></li>
                                    </ul>
                                </div>
                                <div class="price-box pt-20">
                                    <span>Product Price:</span>
                                    <span class="new-price new-price-2" id="selling_price">$57.98</span>
                                    <span class="old-price" id="discount_price" style="text-decoration: line-through;"> style="text-decoration: line-through;">2200 VND</span>
                                </div>
                                <div class="product-desc">
                                    <p>
                                        {{-- <span>100% cotton double printed dress. Black and white striped top and orange high waisted skater skirt bottom. Lorem ipsum dolor sit amet, consectetur adipisicing elit. quibusdam corporis, earum facilis et nostrum dolorum accusamus similique eveniet quia pariatur.
                                        </span> --}}
                                        <p>Details: </p>
                                    </p>
                                    {{-- <div class="product_details"></div> --}}
                                    <div id="geek"></div>
                                </div>
                                <form action="{{route('add.cart')}}" method="post"class="cart-quantity">
                                    @csrf
                                    <input type="hidden" name="product_id" id="product_id">
                                    {{-- <h1 id=product_id>id</h1> --}}
                                    <div class="product-variants" style="display:flex;">
                                        <div class="produt-variants-size">
                                            <label>Size</label>
                                            {{-- <select class="nice-select" name="size">
                                                <option value="1" title="S" selected="selected">40x60cm</option>
                                                <option value="2" title="M">60x90cm</option>
                                                <option value="3" title="L">80x120cm</option>
                                            </select> --}}
                                            <select name="size" class="form-control" id="size">

                                            </select>
                                        </div>
                                        <div class="produt-variants-size">
                                            <label>Color:</label>
                                            {{-- <select class="nice-select" name="color">
                                                <option value="1" title="S" selected="selected">40x60cm</option>
                                                <option value="2" title="M">60x90cm</option>
                                                <option value="3" title="L">80x120cm</option>
                                            </select> --}}
                                            <select name="color" class="form-control" id="color">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="single-add-to-cart">
                                            <div class="quantity">
                                                <label>Quantity</label>
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" value="1" type="number" name="quantity">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </div>
                                            <button class="add-to-cart" type="submit">Add to cart</button>
                                    </div>
                                </form>
                                <div class="product-additional-info pt-25">
                                    <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Add to wishlist</a>
                                    <div class="product-social-sharing pt-25">
                                        <ul>
                                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>
                                            <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')

<script type="text/javascript">
$(document).ready(function(){
    $('.addcart').on('click', function(){
        var id = $(this).data('id');
       // console.log(id);
        $('#myModal').modal('show');
        productview(id);
    });
});
    function productview(id) {
        $.ajax({
            url: "{{ url('/cart/product/view/') }}/" + id,
            type: "GET",
            dataType: "json",
            success: function (data) {
                //console.log(data);
                $('#product_code').text(data.product.product_code);
                $('#product_name').text(data.product.product_name);
                $('.product_image1').attr('src', 'upload/product/'+data.product.image_one);
                $('.product_image2').attr('src', 'upload/product/'+data.product.image_two);
                $('.product_image3').attr('src', 'upload/product/'+data.product.image_three);
                $('#product_id').val(data.product.id);
                let discount_price = data.product.discount_price;
                let selling_price = data.product.selling_price;

                if(discount_price==null){
                    $('#discount_price').text('');
                    $('#selling_price').text(new Intl.NumberFormat().format(selling_price) + ' '+'VND');
                    // + 'VND');
                }
                else{
                    $('#discount_price').text(new Intl.NumberFormat().format(selling_price) + ' '+'VND');
                    $('#selling_price').text(new Intl.NumberFormat().format(discount_price) + ' '+'VND');
                }


                var details = data.product.product_details;
                //console.log(details);
                var $geek = $("#geek"),
                // str = "A <b>computer science portal</b> for <b>geeks</b>",
                str = details,
                html = $.parseHTML(str);
                $geek.append(html);


                $('select[name="color"]').empty();
                $.each(data.color, function (key, value) {
                    $('select[name="color"]').append('<option value="' + value + '">' + value + '</option>');
                });

                $('#size').empty();
                $.each(data.size, function (key, value) {
                    $('#size').append('<option value="' + value + '">' + value + '</option>');
                });

            }
        });
    }
</script>

@endsection

