@extends('theme.layouts.index')
@section('title','Tìm kiếm')
@section('content')

<!--=====================
Breadcrumb Aera Start
=========================-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li>
                            <h1><a href="{{route('theme.home')}}">Trang chủ</a></h1>
                        </li>
                        <li>Tìm kiếm</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--=====================
Breadcrumb Aera End
=========================-->

<!--======================
Shop Fullwidth area Start
==========================-->
<div class="shop-fullwidth-area mt-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if(count($products) == 0)
                    <span>Không tìm thấy sản phẩm nào có từ khóa: {{$key}}</span>
                @else
                <!-- Shop Toolbar Start -->
                <div class="toolbar-shop mb-50">
                    <div class="shop_toolbar_btn">
                        <button data-role="grid_4" class="btn-grid-4"></button>
                        <button data-role="grid_3" class="btn-grid-3"></button>
                        <button data-role="grid_list" class="btn-list active"></button>
                    </div>
                    <div class="page-amount">
                        <p>Tìm thấy {{count($products)}} sản phẩm với từ khóa "{{$key}}"</p>
                    </div>
                    <!-- <div class="nice-select select-option">
                        <select name="select">
                            <option value="1">Short By Name</option>
                            <option value="2">Short By Number</option>
                            <option value="3">Short By Date</option>
                            <option value="4">Short By Type</option>
                            <option value="5">Short By Category</option>
                            <option value="6">Short By Image</option>
                            <option value="7">Short By Trend</option>
                            <option value="8">Short By Class</option>
                        </select>
                    </div> -->
                </div>
                <!-- Shop Toolbar End -->
                <!-- Shop Wrapper Start -->
                <div class="row shop-wrapper grid_list">
                    
                    @foreach($products as $index => $product)
                    <div class="col-12 mb-20">
                        <!-- Single-Product-Start -->
                        <div class="item-product {{$index == 0 ? 'pt-0' : ''}} {{$index == count($products) ? 'pb-0 no-border-bottom' : ''}}">
                            <div class="product-thumb">
                                @php
                                    $images = json_decode($product->image);
                                @endphp
                                <a href="{{route('theme.product_detail', $product->slug)}}" style="width: 214px; height: 214px; overflow:hidden; padding: 1rem; border-radius: 8px;">
                                    <img src="{{asset('../storage/products/'.$product->code.'/image/'.$images[0])}}" alt="" class="img-fluid">
                                </a>
                                <div class="box-label">
                                    <div class="label-product-new">
                                        <span>New</span>
                                    </div>
                                </div>
                                <div class="action-link">
                                    <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#modal_box" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                    <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                    <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="product-name">
                                    <a href="{{route('theme.product_detail', $product->slug)}}">{{$product->name}}</a>
                                </div>
                                <div class="rating">
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price">{{$product->cost_price}} vnd</span>
                                    <span class="old-price"><del>{{$product->odd_price}} vnd</del></span>
                                </div>
                                <div class="cart">
                                    <div class="add-to-cart">
                                        <a href="#" title="Thêm vào giỏ hàng"><i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-list-caption align-items-center">
                                <div class="product-name">
                                    <a href="{{route('theme.product_detail', $product->slug)}}">{{$product->name}}</a>
                                </div>
                                <div class="rating">
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price">{{$product->cost_price}} vnd</span>
                                </div>
                                <p>{!! $product->description !!}</p>
                                <div class="text-available">
                                    <p><strong>Có sẵn:</strong><span>{{$product->inventory->quantity}}</span></p>
                                </div>
                                <div class="action-link">
                                    <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#modal_box" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                    <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                    <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                </div>
                                <div class="cart-list-button">
                                    <a href="#" class="cart-btn">Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single-Product-End -->
                    </div>
                    @endforeach
                </div>
                <!-- Shop Wrapper End -->
                <!-- Shop Toolbar Start -->
                <!-- <div class="toolbar-shop toolbar-bottom">
                    <div class="page-amount">
                        <p>Showing 1-10 of 30 results</p>
                    </div>
                    <div class="pagination">
                        <ul>
                            <li class="previous"><a href="#"><i class="fa fa-angle-left"></i> Previous</a></li>
                            <li class="current">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="next"><a href="#">Next <i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                </div> -->
                <!-- Shop Toolbar End -->
            @endif
            </div>
        </div>
    </div>
</div>
<!--======================
Shop Fullwidth area End
==========================-->
<!-- <script src="/assets/theme/js/vendor/jquery-3.6.0.min.js"></script> -->
<script>
    $(document).ready(function(){
        $(".category-dropdown").hide();
    });   
</script>
@endsection
