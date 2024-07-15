@extends('theme.layouts.index')
@section('title','Trang chủ')
@section('content')
<style>
    .left-menu {
        border-radius: 10px;
        border: 2px solid #176ab4;
    }
    .left-menu-link {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        overflow: hidden;
        line-height: 52px;
        word-wrap: break-word;
        background: #FFFFFF;
        color: #3d3d3d;
        font-size: 14px;
        font-weight: 400;
        margin: 0 26px;
        border-bottom: 1px solid #ebebeb;
        -webkit-transition: color 300ms linear;
        transition: color 300ms linear;
    }
    .left-menu-link:hover {
        color: #408ed4;
        padding-left: 3px;
        -webkit-transition: 0.3s;
        transition: 0.3s;
    }
    .left-menu-link i {
        line-height: 3.7;
    }
    .hook {
        position: relative;
    }
    .hook:hover .sub-left-menu {
        visibility: visible;
        -webkit-transition: 0.6s;
        transition: 0.6s;
        display: block;
        opacity: 1;
        top: 0px;
    }
    .sub-left-menu {
        width: 100%;
        left: 100%;
        top: 20px;
        line-height: 40px;
        visibility: hidden;
        -webkit-transition: 0.6s;
        transition: 0.6s;
        opacity: 0;
        position: absolute;
        background: #FFFFFF;
        z-index: 999;
        padding: 10px;
        transform-origin: top;
        border-top: 2px solid #408ed4;
        border-bottom: 2px solid #408ed4;
        border-right: 2px solid #408ed4;
        box-shadow: 0 0 8px 1px rgba(0, 0, 0, 0.1);
        border-radius: 0 10px 10px 0; 
    }
</style>
<!--=====================
slider area start
=========================-->
<div class="slider_section mb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="left-menu mt-30">
                    <ul class="dropdown dropdown-width">
                        @foreach(App\Models\Category::get() as $category)
                        @if(!empty($category->parent) && $category->parent->slug == 'san-pham')
                            <li class="hook">
                                <a class="left-menu-link" href="{{ route('theme.category', $category->slug) }}">
                                    <span>
                                        <img class="left-menu-img" src="" alt="{{$category->name}}" style="width: 40px; height: 40px;">
                                        {{$category->name}}
                                    </span>
                                    @if(count($category->children) != 0)
                                        <i class="fa fa-angle-right"></i>
                                    @endif
                                </a>
                                @if(count($category->children) != 0)
                                    <ul class="sub-left-menu">
                                        @foreach($category->children as $childCate)
                                            <li><a href="{{ route('theme.category', $childCate->slug) }}">{{$childCate->name}}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="slider_area slider-one mt-30">
                    @foreach($featuredProducts as $product)
                        @if(File::exists('storage/products/'.$product->code.'/thumbnails/'.$product->code.'.webp'))
                            <!-- Single Slider Start -->
                            <div class="single_slider">
                                <a href="{{ route('theme.product_detail',  $product->slug) }}">
                                    <img src="{{ asset('storage/products/'.$product->code.'/thumbnails/'.$product->code.'.webp') }}" alt="{{ $product->name }}" class="img-fluid">
                                </a>
                            </div>
                            <!-- Single Slider End -->
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!--======================
    slider area End
==========================-->

<!--======================
Shipping area Start
==========================-->
<div class="shipping-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 ms-auto">
                <div class="all-shipping">
                    <div class="single-shipping">
                        <div class="block-wrapper">
                            <div class="shipping-content">
                                <h5 class="ship-title">Giao hàng miễn phí</h5>
                                <p>Miễn phí vận chuyển mọi đơn hàng</p>
                            </div>
                        </div>
                    </div>
                    <div class="single-shipping">
                        <div class="block-wrapper2">
                            <div class="shipping-content">
                                <h5 class="ship-title">Hỗ trợ trực tuyến 24/7</h5>
                                <p>Trợ giúp bạn nhanh nhất</p>
                            </div>
                        </div>
                    </div>
                    <div class="single-shipping single-shipping-last">
                        <div class="block-wrapper3">
                            <div class="shipping-content">
                                <h5 class="ship-title">Hoàn tiền</h5>
                                <p>Chính sách hoàn tiền tốt cho người dùng</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--======================
Shipping area End
==========================-->

<!-- =================
Product Area Start 
=====================-->
<div class="product-area mt-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs theme-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="one-tab" data-bs-toggle="tab" href="#one" role="tab" aria-controls="one" aria-selected="true">Mới nhất</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="two-tab" data-bs-toggle="tab" href="#two" role="tab" aria-controls="two" aria-selected="false">Bán chạy nhất</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="three-tab" data-bs-toggle="tab" href="#three" role="tab" aria-controls="three" aria-selected="false">Sản phẩm nổi bật</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="one" role="tabpanel" aria-labelledby="one-tab">
                        <div class="product-thing slick-custom slick-custom-default">
                            @foreach($latestProducts as $latestProduct)
                                @php
                                    $images = json_decode($latestProduct->image);
                                @endphp
                                <!-- Single-Product-Start -->
                                <div class="item-product">
                                    <div class="product-thumb">
                                        <a href="{{route('theme.product_detail', $latestProduct->slug)}}">
                                            <img src="{{asset('../storage/products/'.$latestProduct->code.'/image/'.$images[0])}}" alt="{{ $latestProduct->name }}" class="img-fluid">
                                        </a>
                                        <div class="box-label">
                                            <div class="label-product-new">
                                                <span>Mới</span>
                                            </div>
                                        </div>
                                        <div class="action-link">
                                            <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#latest-product-{{$latestProduct->id}}" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>

                                            <a  class="compare-add-latest-product same-link" 
                                                data-action="{{ $latestProduct->id }}" 
                                                data-category ="{{$latestProduct->category_id}}"
                                                data-image="{{ asset('../storage/products/' . $latestProduct->code . '/image/' . $images[0]) }}"
                                                data-name ="{{ $latestProduct->name }}" 
                                                title="Add to compare">
                                                <i class="zmdi zmdi-refresh-alt"></i>
                                            </a>

                                            @if (auth()->check())
                                                @php
                                                    if (
                                                        App\Models\Wishlist::where([
                                                            'user_id' => Auth()->user()->id,
                                                            'product_id' => $latestProduct->id,
                                                        ])->exists()
                                                    ) {
                                                        $bg_temp = 'bg-danger';
                                                    } else {
                                                        $bg_temp = '';
                                                    }
                                                @endphp
                                                <a title="Thêm vào yêu thích"
                                                    data-route="{{ route('addToWishlist', $latestProduct->id) }}"
                                                    class="wishlist-add same-link {{ $bg_temp }} "
                                                    title="Add to wishlist"><i
                                                        class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                            @else
                                                <a class="prod_alert_login" data-action="yêu thích"
                                                    data-route="{{ route('theme.login_client') }}">
                                                    <i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i>
                                                </a>
                                            @endif
                                        </div>
                                        
                                    </div>
                                
                                    <div class="product-caption">
                                        <div class="product-name">
                                            <a href="{{route('theme.product_detail', $latestProduct->slug)}}">
                                                {{ $latestProduct->name }}
                                            </a>
                                        </div>
                                        <div class="rating">
                                            <span class="yellow"><i class="fa fa-star"></i></span>
                                            <span class="yellow"><i class="fa fa-star"></i></span>
                                            <span class="yellow"><i class="fa fa-star"></i></span>
                                            <span class="yellow"><i class="fa fa-star"></i></span>
                                            <span class="yellow"><i class="fa fa-star"></i></span>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price">
                                                @if($latestProduct->odd_price == 0)
                                                    Liên hệ
                                                @endif
                                            </span>
                                        </div>
                                        <div class="cart">
                                            <div class="add-to-cart">
                                                @if($latestProduct->inventory->quantity == 0)
                                                    Hết hàng
                                                @else
                                                    @if(auth()->check())
                                                        <a class="add_to_cart_btn cart-plus" title="Thêm vào giỏ hàng" data-route="{{route('theme.add_to_cart', $latestProduct->id)}}">
                                                            <i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i>
                                                        </a>
                                                    @else
                                                        <a class="prod_alert_login cart-plus" title="Thêm vào giỏ hàng" data-route="{{ route('theme.login_client') }}">
                                                            <i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i>
                                                        </a>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single-Product-End -->
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="two" role="tabpanel" aria-labelledby="two-tab">
                        <div class="product-thing slick-custom slick-custom-default">
                            @foreach($bestSellerProducts as $bestSellerProduct)
                            @php
                                $images = json_decode($bestSellerProduct->image);
                            @endphp
                            <!-- Single-Product-Start -->
                            <div class="item-product">
                                <div class="product-thumb">
                                    <a href="{{route('theme.product_detail', $bestSellerProduct->slug)}}">
                                        <img src="{{asset('../storage/products/'.$bestSellerProduct->code.'/image/'.$images[0])}}" alt="{{ $bestSellerProduct->name }}" class="img-fluid">
                                    </a>
                                    
                                    <div class="action-link">
                                        <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#bestseller-product-{{$bestSellerProduct->id}}" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>


                                        <a  class="compare-add-bestseller-product same-link" 
                                            data-action="{{ $bestSellerProduct->id }}" 
                                            data-category ="{{$bestSellerProduct->category_id}}"
                                            data-image="{{ asset('../storage/products/' . $bestSellerProduct->code . '/image/' . $images[0]) }}"
                                            data-name ="{{ $bestSellerProduct->name }}" 
                                            title="Add to compare">
                                            <i class="zmdi zmdi-refresh-alt"></i>
                                        </a>

                                        @if (auth()->check())
                                            @php
                                                if (
                                                    App\Models\Wishlist::where([
                                                        'user_id' => Auth()->user()->id,
                                                        'product_id' => $bestSellerProduct->id,
                                                    ])->exists()
                                                ) {
                                                    $bg_temp = 'bg-danger';
                                                } else {
                                                    $bg_temp = '';
                                                }
                                            @endphp
                                            <a title="Thêm vào yêu thích"
                                                data-route="{{ route('addToWishlist', $bestSellerProduct->id) }}"
                                                class="wishlist-add same-link {{ $bg_temp }} "
                                                title="Add to wishlist"><i
                                                    class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                        @else
                                            <a class="prod_alert_login" data-action="yêu thích"
                                                data-route="{{ route('theme.login_client') }}">
                                                <i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="product-caption">
                                    <div class="product-name">
                                        <a href="{{route('theme.product_detail', $bestSellerProduct->slug)}}">
                                            {{ $bestSellerProduct->name }}
                                        </a>
                                    </div>
                                    <div class="rating">
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price">
                                            @if($bestSellerProduct->odd_price == 0)
                                                Liên hệ
                                            @endif
                                        </span>
                                    </div>
                                    <div class="cart">
                                        <div class="add-to-cart">
                                            @if($bestSellerProduct->inventory->quantity == 0)
                                                Hết hàng
                                            @else
                                                @if(auth()->check())
                                                    <a class="add_to_cart_btn cart-plus" title="Thêm vào giỏ hàng" data-route="{{route('theme.add_to_cart', $bestSellerProduct->id)}}">
                                                        <i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i>
                                                    </a>
                                                @else
                                                    <a class="prod_alert_login cart-plus" title="Thêm vào giỏ hàng" data-route="{{ route('theme.login_client') }}">
                                                        <i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i>
                                                    </a>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single-Product-End -->
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="three" role="tabpanel" aria-labelledby="three-tab">
                        <div class="product-thing slick-custom slick-custom-default">
                            @foreach($featuredProducts as $featuredProduct)
                            @php
                                $images = json_decode($featuredProduct->image);
                            @endphp
                            <!-- Single-Product-Start -->
                            <div class="item-product">
                                <div class="product-thumb">
                                    <a href="{{route('theme.product_detail', $featuredProduct->slug)}}">
                                        <img src="{{asset('../storage/products/'.$featuredProduct->code.'/image/'.$images[0])}}" alt="{{ $featuredProduct->name }}" class="img-fluid">
                                    </a>
                                    {{-- <div class="label-product-discount">
                                        <span>-20%</span>
                                    </div> --}}
                                    <div class="action-link">
                                        <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#featured-product-{{$featuredProduct->id}}" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>

                                        <a  class="compare-add-featured-product same-link" 
                                            data-action="{{ $featuredProduct->id }}" 
                                            data-category ="{{$featuredProduct->category_id}}"
                                            data-image="{{ asset('../storage/products/' . $featuredProduct->code . '/image/' . $images[0]) }}"
                                            data-name ="{{ $featuredProduct->name }}" 
                                            title="Add to compare">
                                            <i class="zmdi zmdi-refresh-alt"></i>
                                        </a>

                                        @if (auth()->check())
                                            @php
                                                if (
                                                    App\Models\Wishlist::where([
                                                        'user_id' => Auth()->user()->id,
                                                        'product_id' => $featuredProduct->id,
                                                    ])->exists()
                                                ) {
                                                    $bg_temp = 'bg-danger';
                                                } else {
                                                    $bg_temp = '';
                                                }
                                            @endphp
                                            <a title="Thêm vào yêu thích"
                                                data-route="{{ route('addToWishlist', $featuredProduct->id) }}"
                                                class="wishlist-add same-link {{ $bg_temp }} "
                                                title="Add to wishlist"><i
                                                    class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                        @else
                                            <a class="prod_alert_login" data-action="yêu thích"
                                                data-route="{{ route('theme.login_client') }}">
                                                <i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="product-caption">
                                    <div class="product-name">
                                        <a href="{{route('theme.product_detail', $featuredProduct->slug)}}">
                                            {{ $featuredProduct->name }}
                                        </a>
                                    </div>
                                    <div class="rating">
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price">
                                            @if($featuredProduct->odd_price == 0)
                                                Liên hệ
                                            @endif
                                        </span>
                                    </div>
                                    <div class="cart">
                                        <div class="add-to-cart">
                                            @if($featuredProduct->inventory->quantity == 0)
                                                Hết hàng
                                            @else
                                                @if(auth()->check())
                                                    <a class="add_to_cart_btn cart-plus" title="Thêm vào giỏ hàng" data-route="{{route('theme.add_to_cart', $featuredProduct->id)}}">
                                                        <i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i>
                                                    </a>
                                                @else
                                                    <a class="prod_alert_login cart-plus" title="Thêm vào giỏ hàng" data-route="{{ route('theme.login_client') }}">
                                                        <i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i>
                                                    </a>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single-Product-End -->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ================
Product Area End
=====================-->

<!-- ================
Sale Offer Area Start
=====================-->
@php
    $images = json_decode($featuredProducts[0]->image); 
@endphp
<div class="sales-offer-area mb-45 mt-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12">
                <div class="product-offer-slider slick-custom-default">
                    <div class="flash-single-item">
                        <div class="product-item">
                            <span class="offer-bar">
                                <img src="assets/theme/images/product/sale-offer.webp" alt="" style="width: 70%;">
                            </span>
                            <div class="product-thumb">
                                <a href="{{route('theme.product_detail', $featuredProducts[0]->slug)}}">
                                    <img src="{{asset('../storage/products/'.$featuredProducts[0]->code.'/image/'.$images[0])}}" alt="{{$featuredProducts[0]->name}}" class="img-fluid">
                                </a>
                                <div class="box-label">
                                    <div class="label-product-discount">
                                        <span>-20%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="product-name mb-20">
                                    <a href="{{route('theme.product_detail', $featuredProducts[0]->slug)}}">
                                        <h6>{{$featuredProducts[0]->name}}</h6>
                                    </a>
                                </div>
                                <div class="rating">
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="default-star"><i class="fa fa-star"></i></span>
                                </div>
                                <div class="price-box mt-15 mb-15">
                                    <span class="regular-price">{{$featuredProducts[0]->cost_price}}</span>
                                    <span class="old-price"><del>{{$featuredProducts[0]->odd_price}}</del></span>
                                </div>
                                <div class="product-pre-content mb-30">
                                    <p>The Philips CSS 6002K Amplifier is considered one of the upcoming masterpieces that the Philips brand will launch in the audio market. With the perfect 3-in-1 integration between the features of the pusher, digital reverberation, and microphone, it provides outstanding sound processing capabilities and flexible connectivity for users with extremely interesting experiences.</p>
                                </div>
                                <div class="countdown">
                                    <div class="box-countdown">
                                        <div class="title-countdown">
                                            <h6 class="mb-20">Hãy nhanh tay! Ưu đãi kết thúc sau:</h6>
                                        </div>
                                        <div data-countdown="2024/7/1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flash-single-item">
                        <div class="product-item">
                            <span class="offer-bar"><img src="assets/theme/images/product/sale-offer.webp" alt=""></span>
                            <div class="product-thumb">
                                <a href="product-details.html">
                                    <img src="assets/theme/images/product/offer/product-12.webp" alt="" class="img-fluid">
                                </a>
                                <div class="box-label">
                                    <div class="label-product-discount">
                                        <span>-20%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="product-name mb-20">
                                    <a href="product-details.html">
                                        <h6>Mirum est notare tellus eu nibh iaculis pretium</h6>
                                    </a>
                                </div>
                                <div class="rating">
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="default-star"><i class="fa fa-star"></i></span>
                                </div>
                                <div class="price-box mt-15 mb-15">
                                    <span class="regular-price">$130.00</span>
                                    <span class="old-price"><del>$135.50</del></span>
                                </div>
                                <div class="product-pre-content mb-30">
                                    <p>The S-Series Full HD TCL Roku TV puts all your entertainment favorites in one place, allowing seamless access to...</p>
                                </div>
                                <div class="countdown">
                                    <div class="box-countdown">
                                        <div class="title-countdown">
                                            <h6 class="mb-20">Hurry Up! Offer ends in:</h6>
                                        </div>
                                        <div data-countdown="2023/12/24">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-12 text-center">
                <div class="single-banner mt-40">
                    <a href="/san-pham/dla-series">
                        <img src="assets/theme/images/banner/shop-banner-1.png" alt="DLA Series" class="img-fluid">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ================
Sale Offer Area End
=====================-->

<!-- =================
Category Product Area Start 
=====================-->
<div class="product-category-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs category-tabs">
                    @foreach($productCategories as $key => $category)
                        <li class="nav-item">
                            <a class="nav-link {{$key == 0 ? 'active': ''}}" id="{{$category->slug}}-tab" data-bs-toggle="tab" href="#cate-{{$category->slug}}">
                                {{-- <span><img src="assets/theme/images/category/thumb-1.webp" alt="" class="img-fluid"></span> --}}
                                <img src="" alt="{{$category->name}}" class="img-fluid category_img" width="60" height="60">
                                <span>{{$category->name}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach($productCategories as $key => $category)
                    <div class="product-thing-tab slick-custom-default tab-pane fade {{$key == 0 ? 'show active' : ''}}" id="cate-{{$category->slug}}">
                        @php
                            if($category->slug == 'loa-speaker') {
                                $childs = [];
                                foreach(App\Models\Category::where('is_visible', true)->where('parent_id', $category->id)->get() as $cate) {
                                    array_push($childs, $cate->id);
                                }

                                $productOfCategories = App\Models\Product::where('is_active', true)->whereIn('category_id', $childs)->get()->take(5);
                            }
                            else {
                                $productOfCategories = App\Models\Product::where('is_active', true)->where('category_id', $category->id)->get()->take(5);
                            }
                        @endphp
                        @foreach($productOfCategories as $product)
                            @php
                                $images = json_decode($product->image);
                            @endphp
                            <!-- Single-Product-Start -->
                            <div class="item-product">
                                <div class="product-thumb">
                                    <a href="{{route('theme.product_detail', $product->slug)}}">
                                        <img src="{{asset('../storage/products/'.$product->code.'/image/'.$images[0])}}" alt="{{ $product->name }}" class="img-fluid">
                                    </a>
                                    {{-- <div class="label-product-discount">
                                        <span>-20%</span>
                                    </div> --}}
                                    <div class="action-link">
                                        <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#product-of-cate-{{$product->id}}" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>

                                        <a  class="compare-add-product-of-category same-link" 
                                            data-action="{{ $product->id }}" 
                                            data-category ="{{$product->category_id}}"
                                            data-image="{{ asset('../storage/products/' . $product->code . '/image/' . $images[0]) }}"
                                            data-name ="{{ $product->name }}" 
                                            title="Add to compare">
                                            <i class="zmdi zmdi-refresh-alt"></i>
                                        </a>

                                        @if (auth()->check())
                                            @php
                                                if (
                                                    App\Models\Wishlist::where([
                                                        'user_id' => Auth()->user()->id,
                                                        'product_id' => $product->id,
                                                    ])->exists()
                                                ) {
                                                    $bg_temp = 'bg-danger';
                                                } else {
                                                    $bg_temp = '';
                                                }
                                            @endphp
                                            <a title="Thêm vào yêu thích"
                                                data-route="{{ route('addToWishlist', $product->id) }}"
                                                class="wishlist-add same-link {{ $bg_temp }} "
                                                title="Add to wishlist"><i
                                                    class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                        @else
                                            <a class="prod_alert_login" data-action="yêu thích"
                                                data-route="{{ route('theme.login_client') }}">
                                                <i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="product-caption">
                                    <div class="product-name">
                                        <a href="{{route('theme.product_detail', $product->slug)}}">
                                            {{ $product->name }}
                                        </a>
                                    </div>
                                    <div class="rating">
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price">
                                            @if($product->odd_price == 0)
                                                Liên hệ
                                            @endif
                                        </span>
                                    </div>
                                    <div class="cart">
                                        <div class="add-to-cart">
                                            @if(auth()->check())
                                                <a class="add_to_cart_btn cart-plus" title="Thêm vào giỏ hàng" data-route="{{route('theme.add_to_cart', $product->id)}}">
                                                    <i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i>
                                                </a>
                                            @else
                                                <a class="prod_alert_login cart-plus" title="Thêm vào giỏ hàng" data-route="{{ route('theme.login_client') }}">
                                                    <i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single-Product-End -->
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ================
Category Product Area End
=====================-->

<!-- ================
Banner Area Start
=====================-->
<div class="banner-area mt-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12 text-center">
                <div class="single-banner mt-40">
                    <a href="/san-pham/next-nx-1"><img src="assets/theme/images/banner/shop-banner-2.png" alt="next-nx-1" class="img-fluid"></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12 text-center">
                <div class="single-banner mt-40">
                    <a href="/san-pham/nsub-18"><img src="assets/theme/images/banner/shop-banner-3.png" alt="nsub-18" class="img-fluid"></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12 text-center">
                <div class="single-banner mt-40">
                    <a href="/san-pham/ct-one"><img src="assets/theme/images/banner/shop-banner-4.png" alt="ct-one" class="img-fluid"></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ================
Banner Area End
=====================-->

<!-- ================
Feature Area Start
=====================-->
<div class="feature-category-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mt-50">
                <div class="block-title">
                    <h6>Sản phẩm mới</h6>
                </div>
                <div class="feature-carousel slick-custom slick-custom-default nav-top">
                    @php
                        $itemPerPage = 3;
                        $pages = count($latestProducts) / $itemPerPage;
                        $arr = [];
                        for($i = 0; $i < $pages; $i++) {
                            $arr[$i] = [];
                            $count = 0;
                            foreach($latestProducts as $key => $item) {
                                $arr[$i][] = $item;
                                $count++;
                                if($count == $itemPerPage) {
                                    $i++;
                                    $count = 0;
                                }
                            }
                        }
                    @endphp
                    @foreach($arr as $page => $items)
                        <div class="product-list-content">
                            @foreach($items as $key => $product)
                            @php
                                $images = json_decode($product->image);
                            @endphp
                            <div class="single-product-list {{$key == count($items)-1 ? '' : 'mb-20'}}">
                                <div class="product-list-image">
                                    <a href="{{route('theme.product_detail', $product->slug)}}">
                                        <img src="{{asset('../storage/products/'.$product->code.'/image/'.$images[0])}}" alt="{{ $product->name }}" class="img-fluid block-one">
                                        @if(!empty($images[1]))
                                            <img src="{{asset('../storage/products/'.$product->code.'/image/'.$images[1])}}" alt="{{ $product->name }}" class="img-fluid block-two">
                                        @else
                                            <img src="{{asset('../storage/products/'.$product->code.'/image/'.$images[0])}}" alt="{{ $product->name }}" class="img-fluid block-two">
                                        @endif
                                    </a>
                                </div>
                                <div class="product-caption">
                                    <div class="product-name">
                                        <a href="{{route('theme.product_detail', $product->slug)}}">{{ $product->name }}</a>
                                    </div>
                                    <div class="rating">
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price">{{ $product->odd_price }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-50">
                <div class="block-title">
                    <h6>Sản phẩm nổi bật</h6>
                </div>
                <div class="feature-carousel slick-custom slick-custom-default nav-top">
                    @php
                        $itemPerPage = 3;
                        $pages = count($featuredProducts) / $itemPerPage;
                        $arr = [];
                        for($i = 0; $i < $pages; $i++) {
                            $arr[$i] = [];
                            $count = 0;
                            foreach($featuredProducts as $key => $item) {
                                $arr[$i][] = $item;
                                $count++;
                                if($count == $itemPerPage) {
                                    $i++;
                                    $count = 0;
                                }
                            }
                        }
                    @endphp
                    @foreach($arr as $page => $items)
                        <div class="product-list-content">
                            @foreach($items as $key => $product)
                            @php
                                $images = json_decode($product->image);
                            @endphp
                            <div class="single-product-list {{$key == count($items)-1 ? '' : 'mb-20'}}">
                                <div class="product-list-image">
                                    <a href="{{route('theme.product_detail', $product->slug)}}">
                                        <img src="{{asset('../storage/products/'.$product->code.'/image/'.$images[0])}}" alt="{{ $product->name }}" class="img-fluid block-one">
                                        @if(!empty($images[1]))
                                            <img src="{{asset('../storage/products/'.$product->code.'/image/'.$images[1])}}" alt="{{ $product->name }}" class="img-fluid block-two">
                                        @else
                                            <img src="{{asset('../storage/products/'.$product->code.'/image/'.$images[0])}}" alt="{{ $product->name }}" class="img-fluid block-two">
                                        @endif
                                    </a>
                                </div>
                                <div class="product-caption">
                                    <div class="product-name">
                                        <a href="{{route('theme.product_detail', $product->slug)}}">{{ $product->name }}</a>
                                    </div>
                                    <div class="rating">
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price">{{ $product->odd_price }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-50">
                <div class="block-title">
                    <h6>Sản phẩm bán chạy</h6>
                </div>
                <div class="feature-carousel slick-custom slick-custom-default nav-top">
                    @php
                        $itemPerPage = 3;
                        $pages = count($bestSellerProducts) / $itemPerPage;
                        $arr = [];
                        for($i = 0; $i < $pages; $i++) {
                            $arr[$i] = [];
                            $count = 0;
                            foreach($bestSellerProducts as $key => $item) {
                                $arr[$i][] = $item;
                                $count++;
                                if($count == $itemPerPage) {
                                    $i++;
                                    $count = 0;
                                }
                            }
                        }
                    @endphp
                    @foreach($arr as $page => $items)
                        <div class="product-list-content">
                            @foreach($items as $key => $product)
                            @php
                                $images = json_decode($product->image);
                            @endphp
                            <div class="single-product-list {{$key == count($items)-1 ? '' : 'mb-20'}}">
                                <div class="product-list-image">
                                    <a href="{{route('theme.product_detail', $product->slug)}}">
                                        <img src="{{asset('../storage/products/'.$product->code.'/image/'.$images[0])}}" alt="{{ $product->name }}" class="img-fluid block-one">
                                        @if(!empty($images[1]))
                                            <img src="{{asset('../storage/products/'.$product->code.'/image/'.$images[1])}}" alt="{{ $product->name }}" class="img-fluid block-two">
                                        @else
                                            <img src="{{asset('../storage/products/'.$product->code.'/image/'.$images[0])}}" alt="{{ $product->name }}" class="img-fluid block-two">
                                        @endif
                                    </a>
                                </div>
                                <div class="product-caption">
                                    <div class="product-name">
                                        <a href="{{route('theme.product_detail', $product->slug)}}">{{ $product->name }}</a>
                                    </div>
                                    <div class="rating">
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price">{{ $product->odd_price }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ================
Feature Area End
=====================-->

<!-- ================
Brand Logo Area Start
=====================-->
<div class="brand-area mt-35">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="brand-logo" style="background: #408ED4; padding: 1rem 0;">
                    @foreach($brands as $brand)
                    <div class="single-brand" style="{{$brand->slug == 'enerlong' ? 'padding-right: 2rem;' : '' }}">
                        <a href="{{ route('theme.brand', $brand->slug) }}">
                            <img src="{{asset('../storage/brands/'.$brand->slug.'/'.$brand->image)}}" alt="{{$brand->name}}" class="img-fluid">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ================
Brand Logo Area End
=====================-->

<!-- ================
Latest Post Area Start
=====================-->
<div class="latest-post-area mt-50">
    <div class="container">
        <div class="row">
            <!-- Blog Post Area Start -->
            <div class="col-lg-6 col-12">
                <div class="block-title">
                    <h6>Bài viết</h6>
                </div>
                <div class="blog-post-carousel slick-custom slick-custom-default nav-top">
                    @php
                        $itemPerPage = 2;
                        $pages = count($news) / $itemPerPage;
                        $arr = [];
                        for($i = 0; $i < $pages; $i++) {
                            $arr[$i] = [];
                            $count = 0;
                            foreach($news as $key => $item) {
                                $arr[$i][] = $item;
                                $count++;
                                if($count == $itemPerPage) {
                                    $i++;
                                    $count = 0;
                                }
                            }
                        }
                    @endphp
                    @foreach($arr as $page => $items)
                        <div class="blog-post-container">
                            @foreach($items as $key => $post)
                            @php
                                $link = asset('storage/posts/'.$post->id.'/'.$post->cover_image);
                            @endphp
                            <div class="single_blog {{$key == count($items)-1 ? '' : 'mb-35'}}">
                                <div class="blog_thumb single-banner">
                                    <a href="{{ route('theme.blog_detail', $post->slug) }}"><img src="{{ $link }}" alt="{{ $post->title }}" class="img-fluid"></a>
                                </div>
                                <div class="blog_content">
                                    <h6><a class="post-title" href="{{ route('theme.blog_detail', $post->slug) }}">{{ $post->title }}</a></h6>
                                    <div class="date_post mt-10 mb-10">
                                        <span>{{ $post->created_at->format('Y/m/d') }}</span>
                                    </div>
                                    <p class="post-description">{!! $post->description !!}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Blog Post Area End -->
            <!-- Project Post Area Start -->
            <div class="col-lg-6 col-12">
                <div class="block-title">
                    <h6>Dự án</h6>
                </div>
                <div class="blog-post-carousel slick-custom slick-custom-default nav-top">
                    @php
                        $itemPerPage = 2;
                        $pages = count($projects) / $itemPerPage;
                        $arr = [];
                        for($i = 0; $i < $pages; $i++) {
                            $arr[$i] = [];
                            $count = 0;
                            foreach($projects as $key => $item) {
                                $arr[$i][] = $item;
                                $count++;
                                if($count == $itemPerPage) {
                                    $i++;
                                    $count = 0;
                                }
                            }
                        }
                    @endphp
                    @foreach($arr as $page => $items)
                        <div class="blog-post-container">
                            @foreach($items as $key => $post)
                            @php
                                $link = asset('storage/posts/'.$post->id.'/'.$post->cover_image);
                            @endphp
                            <div class="single_blog {{$key == count($items)-1 ? '' : 'mb-35'}}">
                                <div class="blog_thumb single-banner">
                                    <a href="{{ route('theme.project_detail', $post->slug) }}"><img src="{{ $link }}" alt="{{ $post->title }}" class="img-fluid"></a>
                                </div>
                                <div class="blog_content">
                                    <h6><a class="post-title" href="{{ route('theme.project_detail', $post->slug) }}">{{ $post->title }}</a></h6>
                                    <div class="date_post mt-10 mb-10">
                                        <span>{{ $post->created_at->format('Y/m/d') }}</span>
                                    </div>
                                    <p class="post-description">{!! $post->description !!}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Project Post Area End -->
            
        </div>
    </div>
</div>
<!-- ================
Latest Post Area End
=====================-->

{{-- Compare start --}}
<div class="stickcompare stickcompare_new cp-desktop spaceInDown" >
    <a class="clearall"><i class="zmdi zmdi-close"></i>Thu gọn</a>
    <ul class="listcompare" data-catename="Đồng hồ thời trang">
        @for ($i = 0; $i < 3; $i++)
            <li class="compare_item">
                <a>
                    <img class = "i-item" src="/assets/theme/images/icon/empty.png" alt="">
                    <h3 class="h-item">Thêm sản phẩm</h3>
                </a>
                <span class="remove-ic-compare" data-i = {{$i}} style="display: none;"><i class="fa fa-times" aria-hidden="true"></i></span>
            </li>
        @endfor
    </ul>
    <div class="closecompare doss">
        <a href="" data-route="{{ route('storeSession') }}" class="start-compare">So sánh
            ngay</a>
        <a class="txtremoveall">Xóa tất cả sản phẩm</a>
    </div>
</div>
{{-- popup count  --}}
<div class="popup-button">
    <a id="ss-now" style="display: none;">
        <span>So sánh <label class="count-ss"></label></span>
    </a>
</div>
{{-- Compare end --}}

@include('theme.modals.prod-of-cate')
@include('theme.modals.latest-product')
@include('theme.modals.bestseller-product')
@include('theme.modals.featured-product')

<script>
    $(document).ready(function () {
        $(".category-dropdown").hide();
        $('#show_menu').off("click");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let categoryImages = [
            'assets/theme/images/icon/icon-line-array.png',
            'assets/theme/images/icon/icon-loa-speaker.png',
            'assets/theme/images/icon/icon-cong-suat-amplifier.png',
            'assets/theme/images/icon/icon-microphone.png',
            'assets/theme/images/icon/icon-vang-mixer.png',
            'assets/theme/images/icon/icon-quan-ly-nguon-dien.png',
            'assets/theme/images/icon/icon-phu-kien-am-thanh.png',
            'assets/theme/images/icon/icon-dan-loa-karaoke.png',
        ];
        $.each($('.category_img'), function(index) {
            $(this).attr('src', categoryImages[index]);
        })
        $.each($('.left-menu-img'), function(index) {
            $(this).attr('src', categoryImages[index]);
        })

        

        $.each($('.add_to_cart_btn'), function() {
            $(this).on("click", function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: $(this).data('route'),
                    data: {
                        quantity: 1,
                    },
                    success: function(results) {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: results,
                            showConfirmButton: false,
                            timer: 2000,
                        });
                        
                        setTimeout(function(){
                            location.reload();
                        },2000);
                    },
                    error: function(results) {
                        Swal.fire({
                            title: results.responseText,
                            icon: "error",
                        });
                    },
                });

            });
        });

        // add To Wishlist
        $.each($('.wishlist-add'), function() {
            $(this).on("click", function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: $(this).data('route'),
                    data: {

                    },
                    success: function(results) {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: results,
                            showConfirmButton: false,
                            timer: 2000,
                        });

                    },

                    error: function(results) {
                        Swal.fire({
                            title: results.responseText,
                            icon: "error",
                        });
                    },

                });


                if ($(this).hasClass("bg-danger")) {
                    $(this).removeClass("bg-danger");
                } else {
                    $(this).addClass("bg-danger");
                }
            });
        });

        $.each($('.prod_alert_login'), function() {
            $(this).on("click", function(e) {
                e.preventDefault();
                let url = $(this).data('route');
                Swal.fire({
                    title: "<strong>Xin lưu ý !</strong>",
                    icon: "info",
                    html: `
                        Bạn cần <strong>Đăng nhập</strong> để thêm sản phẩm vào giỏ hàng !
                    `,
                    showCloseButton: true,
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonText: `
                        <a href="`+url+`">
                            <i class="fa fa-thumbs-up"></i> Đăng nhập!
                        </a>
                    `,
                    confirmButtonAriaLabel: "Đăng nhập",
                    cancelButtonText: `
                        <i class="fa fa-thumbs-down"></i>
                    `,
                    cancelButtonAriaLabel: "Thumbs down"
                });
            });
        });

        jQuery.fn.extend({
            addToCompare: function(className) {
                $.each($('.'+ className), function() {
                    $(this).on("click", function(e) {
                        e.preventDefault();
                        let id = $(this).data('action');
                        let image = $(this).data('image');
                        let name = $(this).data('name');
                        let category_id = $(this).data('category');
                        let product = {
                            id: id,
                            image: image,
                            name: name,
                            category_id: category_id
                        }
                        let array_compare = JSON.parse(localStorage.getItem("compare"));
                        $('#ss-now').css("display", "none");
                        if (array_compare == null) {
                            array_compare = [];
                        }
                        else{
                            if (array_compare[0]['category_id']!== category_id) {
                                localStorage.clear();
                                console.log("clear");
                                $(".i-item").attr("src", '/assets/theme/images/icon/empty.png');
                                $('.h-item').html("Thêm sản phẩm");
                                $(".remove-ic-compare").css("display", "none");
                                $('.stickcompare').css("display","none");
                                array_compare = [];
                            }
                        }
                        if ($('.stickcompare').css("display")==="none") {
                            $('.stickcompare').css("display","block");
                        }
                        if (array_compare.length >= 3) {
                            Swal.fire({
                                position: "center",
                                icon: "error",
                                title: "Chỉ cho phép so sánh tối đa 3 sản phẩm",
                                showConfirmButton: false,
                                timer: 2000,
                            });
                        } 
                        else {
                            if ((array_compare.find(c => c.id === id))!== undefined) {
                                Swal.fire({
                                    position: "center",
                                    icon: "error",
                                    title: "Đã tồn tại trong so sánh",
                                    showConfirmButton: false,
                                    timer: 2000,
                                });
                            } 
                            else {
                                array_compare.push(product);
                                localStorage.setItem("compare", JSON.stringify(array_compare));
                                $('.i-item').eq(array_compare.indexOf(product)).attr("src", product.image);
                                $('.h-item').eq(array_compare.indexOf(product)).html(product.name);
                                $('.remove-ic-compare').eq(array_compare.indexOf(product)).css("display", "block");
                                $('.count-ss').html("(" + array_compare.length + ")");
                                Swal.fire({
                                    position: "center",
                                    icon: "success",
                                    title: "Thêm thành công",
                                    showConfirmButton: false,
                                    timer: 2000,
                                });
                            }
                        }

                    });
                });
            },

        });

        $(this).addToCompare('compare-add-latest-product');
        $(this).addToCompare('compare-add-bestseller-product');
        $(this).addToCompare('compare-add-featured-product');
        $(this).addToCompare('compare-add-product-of-category');

        // list compare 
        $('.stickcompare').each(function() {
            let array_compare = JSON.parse(localStorage.getItem("compare"));
            if (array_compare == null) {
                $('.i-item').attr("src", '/assets/theme/images/icon/empty.png');
                $('.h-item').html("Thêm sản phẩm");
                $('.remove-ic-compare').css("display", "none");
            } 
            else {
                $.each(array_compare, function(index, product) {
                    $('.i-item').eq(index).attr("src", product.image);
                    $('.h-item').eq(index).html(product.name);
                    $('.remove-ic-compare').eq(index).css("display", "block");
                    $('.count-ss').html("(" + array_compare.length + ")");
                });
            }
        });

        

        //clearall
        $('.clearall').each(function () {
            $(this).on("click", function(e){
                e.preventDefault();
                let array_compare = JSON.parse(localStorage.getItem("compare"));
                $('.stickcompare').css("display", "none");
                $('#ss-now').css("display", "block");
                $('.count-ss').html("(" + array_compare.length + ")");
            })
        });

        $('#ss-now').each(function () {
            let array_compare = JSON.parse(localStorage.getItem("compare"));
            if(array_compare !== null){
                $(this).css("display", "block");
            }
            else{
                $(this).css("display", "none");
            }
            $(this).on("click", function(e){
                e.preventDefault();
                $('.stickcompare').css("display", "block");
                $(this).css("display", "none");
            })
        });

        // xóa 1 sản phẩm só sánh
        $.each($('.remove-ic-compare'),function(){
            $(this).on("click", function(e){
                e.preventDefault();
                let i = $(this).data('i');
                let array_compare = JSON.parse(localStorage.getItem("compare"));
                let length_arr = array_compare.length - 1;
                array_compare.splice(i, 1);
                $('.i-item').eq(length_arr).attr("src", '/assets/theme/images/icon/empty.png');
                $('.h-item').eq(length_arr).html("Thêm sản phẩm");
                $('.remove-ic-compare').eq(length_arr).css("display", "none");
                $('.count-ss').html("(" + array_compare.length + ")");
                if (array_compare.length === 0) {
                    array_compare = null;
                    $(".stickcompare").css("display", "none");
                } 
                else {
                    $.each(array_compare, function(index, product) {
                        $('.i-item').eq(index).attr("src", product.image);
                        $('.h-item').eq(index).html(product.name);
                        $('.remove-ic-compare').eq(index).css("display", "block");
                    });
                }
                localStorage.setItem("compare", JSON.stringify(array_compare));
            })
        })

        //xoa tất cả so sanh
        $.each($('.txtremoveall'), function() {
            $(this).on("click", function(e) {
                e.preventDefault();
                localStorage.clear();
                console.log("clear");
                $(".i-item").attr("src", '/assets/theme/images/icon/empty.png');
                $('.h-item').html("Thêm sản phẩm");
                $(".remove-ic-compare").css("display", "none");
                $('.stickcompare').css("display","none");
                $('.count-ss').html("(" + array_compare.length + ")");
            });
        });

        // start compare 
        $.each($('.start-compare'), function() {
            $(this).on("click", function(e) {
                e.preventDefault();
                let array_compare = JSON.parse(localStorage.getItem("compare"));
                // let array_compare = localStorage.getItem("compare");

                if (array_compare == null) {
                    array_compare = [];
                }
                console.log(array_compare['id']);
                if (array_compare.length < 2) {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Cần ít nhất 2 sản phẩm để so sánh.",
                        showConfirmButton: false,
                        timer: 3000,
                    });
                } else {
                    $.ajax({
                        type: 'GET',
                        url: $(this).data('route'),
                        data: {
                            products: array_compare,
                        },
                        success: function(results) {
                            window.location.href = "/so-sanh";
                        },
                        error: function(results) {
                            Swal.fire({
                                title: results.responseText,
                                icon: "error",
                            });
                        },
                    });

                    // console.log($('#compare-all').val());
                }

            })
        });


        // end compare 

    });

</script>
@endsection