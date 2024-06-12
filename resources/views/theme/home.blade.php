@extends('theme.layouts.index')
@section('title','Trang chủ')
@section('content')

<!--=====================
slider area start
=========================-->
<div class="slider_section mb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-9">
                <div class="slider_area slider-one mt-30">
                    <!-- Single Slider Start -->
                    <div class="single_slider">
                        <img src="assets/theme/images/slider/slider-1.webp" alt="" class="img-fluid">
                        <div class="slider_content color_one">
                            <h5>The Hottest <br> Trend</h5>
                                <h2>Laptop <br> Tablets Outlet</h2>
                                    <div class="pt-des">
                                        <p><span>25%</span>Starting at <span>$340.00</span></p>
                                    </div>
                                    <a href="shop.html">Shop Now</a>
                        </div>
                    </div>
                    <!-- Single Slider End -->
                    <!-- Single Slider Start -->
                    <div class="single_slider">
                        <img src="assets/theme/images/slider/slider-2.webp" alt="" class="img-fluid">
                        <div class="slider_content color_two">
                            <h5>The Hottest <br> Trend</h5>
                                <h2>Cellphone <br> Smartphone Not 2</h2>
                                    <div class="pt-des">
                                        <p><span>35%</span>Starting at <span>$120.00</span></p>
                                    </div>
                                    <a href="shop.html">Shop Now</a>
                        </div>
                    </div>
                    <!-- Single Slider End -->
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
                                            <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                            <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
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
                                                @if(auth()->check())
                                                    <a class="add_to_cart_btn cart-plus" title="Thêm vào giỏ hàng" data-route="{{route('theme.add_to_cart', $latestProduct->id)}}">
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
                                        <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                        <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
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
                                            @if(auth()->check())
                                                <a class="add_to_cart_btn cart-plus" title="Thêm vào giỏ hàng" data-route="{{route('theme.add_to_cart', $bestSellerProduct->id)}}">
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
                                        <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                        <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
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
                                            @if(auth()->check())
                                                <a class="add_to_cart_btn cart-plus" title="Thêm vào giỏ hàng" data-route="{{route('theme.add_to_cart', $featuredProduct->id)}}">
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
<div class="sales-offer-area mb-45 mt-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12">
                <div class="product-offer-slider slick-custom-default">
                    <div class="flash-single-item">
                        <div class="product-item">
                            <span class="offer-bar"><img src="assets/theme/images/product/sale-offer.webp" alt=""></span>
                            <div class="product-thumb">
                                <a href="product-details.html">
                                    <img src="assets/theme/images/product/offer/product-9.webp" alt="" class="img-fluid">
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
                                        <h6>Natus erro at congue massa commodo sit dignissim</h6>
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
                                    <span class="regular-price">$30.00</span>
                                    <span class="old-price"><del>$35.50</del></span>
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
                    <a href="#"><img src="assets/theme/images/banner/banner-1.webp" alt="" class="img-fluid"></a>
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
                                        <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                        <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
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
                    <a href="#"><img src="assets/theme/images/banner/banner-2.webp" alt="" class="img-fluid"></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12 text-center">
                <div class="single-banner mt-40">
                    <a href="#"><img src="assets/theme/images/banner/banner-3.webp" alt="" class="img-fluid"></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12 text-center">
                <div class="single-banner mt-40">
                    <a href="#"><img src="assets/theme/images/banner/banner-4.webp" alt="" class="img-fluid"></a>
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
                        <a href="#">
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
            <!-- Testimonial Area Start -->
            <!-- <div class="col-lg-6 col-12">
                <div class="block-title">
                    <h6>Đánh giá của khách hàng</h6>
                </div>
                <div class="testimonial-carousel slick-custom slick-custom-default nav-top">
                    <div class="single_testimonial text-center">
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feuga</p>
                        <img src="assets/theme/images/testimonial/testimonial-1.webp" alt="" class="img-fluid">
                        <span class="name">Kathy Young</span>
                        <span class="job_title">CEO of SunPark</span>
                        <div class="rating">
                            <span class="yellow"><i class="fa fa-star"></i></span>
                            <span class="yellow"><i class="fa fa-star"></i></span>
                            <span class="yellow"><i class="fa fa-star"></i></span>
                            <span class="yellow"><i class="fa fa-star"></i></span>
                            <span class="yellow"><i class="fa fa-star"></i></span>
                        </div>
                    </div>
                    <div class="single_testimonial text-center">
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feuga</p>
                        <img src="assets/theme/images/testimonial/testimonial-2.webp" alt="" class="img-fluid">
                        <span class="name">Alex Aya</span>
                        <span class="job_title">Art Director</span>
                        <div class="rating">
                            <span class="yellow"><i class="fa fa-star"></i></span>
                            <span class="yellow"><i class="fa fa-star"></i></span>
                            <span class="yellow"><i class="fa fa-star"></i></span>
                            <span class="yellow"><i class="fa fa-star"></i></span>
                            <span class="yellow"><i class="fa fa-star"></i></span>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Testimonial Area End -->
            
        </div>
    </div>
</div>
<!-- ================
Latest Post Area End
=====================-->

<!-- ================
Latest Testimonial Area Start
=====================-->
<div class="latest-post-area mt-50">
    <div class="container">
        <div class="row">
            <!-- Testimonial Area Start -->
            <div class="col-lg-3 col-12"></div>
            <div class="col-lg-6 col-12">
                <div class="block-title">
                    <h6>Đánh giá của khách hàng</h6>
                </div>
                <div class="testimonial-carousel slick-custom slick-custom-default nav-top">
                    <div class="single_testimonial text-center">
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feuga</p>
                        <img src="assets/theme/images/testimonial/testimonial-1.webp" alt="" class="img-fluid">
                        <span class="name">Kathy Young</span>
                        <span class="job_title">CEO of SunPark</span>
                        <div class="rating">
                            <span class="yellow"><i class="fa fa-star"></i></span>
                            <span class="yellow"><i class="fa fa-star"></i></span>
                            <span class="yellow"><i class="fa fa-star"></i></span>
                            <span class="yellow"><i class="fa fa-star"></i></span>
                            <span class="yellow"><i class="fa fa-star"></i></span>
                        </div>
                    </div>
                    <div class="single_testimonial text-center">
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feuga</p>
                        <img src="assets/theme/images/testimonial/testimonial-2.webp" alt="" class="img-fluid">
                        <span class="name">Alex Aya</span>
                        <span class="job_title">Art Director</span>
                        <div class="rating">
                            <span class="yellow"><i class="fa fa-star"></i></span>
                            <span class="yellow"><i class="fa fa-star"></i></span>
                            <span class="yellow"><i class="fa fa-star"></i></span>
                            <span class="yellow"><i class="fa fa-star"></i></span>
                            <span class="yellow"><i class="fa fa-star"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Testimonial Area End -->
            <div class="col-lg-3 col-12"></div>
        </div>
    </div>
</div>
<!-- ================
Latest Testimonial Area End
=====================-->
@include('theme.modals.prod-of-cate')
@include('theme.modals.latest-product')
@include('theme.modals.bestseller-product')
@include('theme.modals.featured-product')

<script>
    $(document).ready(function () {

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
        $.each($('.quick-view'), function(index) {
            $(this).on("click", function(e) {
                console.log('1')
            })
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
    });

</script>
@endsection