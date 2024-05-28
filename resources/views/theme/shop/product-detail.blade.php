@extends('theme.layouts.page')
@section('title','Chi tiết sản phẩm')
@section('category-url', route('theme.category', $category->slug))
@section('category-name', $category->name)
@section('page-name', $product->name)
@section('page-content')
<!-- ========================
Product Details Area Start 
===========================-->
<div class="product-area product-details-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-12 mt-50">
                <!-- Product Zoom Image start -->
                <div class="product-slider-container arrow-center text-center">
                    @foreach(json_decode($product->image) as $image)
                    <div class="product-item">
                        <a href="{{asset('../storage/products/'.$product->code.'/image/'.$image)}}"><img src="{{asset('../storage/products/'.$product->code.'/image/'.$image)}}" class="img-fluid" alt="{{$image}}" /></a>
                    </div>
                    @endforeach
                </div>
                <!-- Product Zoom Image End -->
                <!-- Product Thumb Zoom Image Start -->
                <div class="product-details-thumbnail arrow-center text-center">
                    @foreach(json_decode($product->image) as $image)
                    <div class="product-item-thumb">
                        <img src="{{asset('../storage/products/'.$product->code.'/image/'.$image)}}" class="img-fluid" alt="{{$image}}" />
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-7 col-12 mt-45">
                <!-- Product Summery Start -->
                <div class="product-summery position-relative">
                    <div class="product-head">
                        <h1 class="product-title">{{$product->name}}</h1>
                        <!-- <div class="product-arrows text-right">
                            <a href="#"><i class="fa fa-long-arrow-left"></i></a>
                            <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                        </div> -->
                    </div>
                    
                    <div class="rating-meta d-flex">
                        <div class="rating">
                            <span class="yellow"><i class="fa fa-star"></i></span>
                            <span class="yellow"><i class="fa fa-star"></i></span>
                            <span class="yellow"><i class="fa fa-star"></i></span>
                            <span class="yellow"><i class="fa fa-star"></i></span>
                            <span class="yellow"><i class="fa fa-star"></i></span>
                        </div>
                        <ul class="meta d-flex">
                            <li>
                                <a href="#"><i class="fa fa-commenting-o"></i>Read reviews(3)</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-edit"></i>Write a review</a>
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex gap-4">
                        <span class="d-block">Mã sản phẩm: <strong>{{$product->code}}</strong></span>
                        <span class="d-block">Thương hiệu: <strong>{{$product->brand->name}}</strong></span>
                    </div>
                    <div class="d-flex gap-4 mb-4">
                        <span class="d-block">Xuất xứ: <strong>{{$product->origin}}</strong></span>
                        <span class="d-block">Đơn vị tính: <strong>{{$product->unit->name}}</strong></span>
                    </div>
                    <div class="price-box">
                        <span class="regular-price">{{$product->cost_price}} vnd</span>
                    </div>
                    
                    <!-- <div class="product-description"></div> -->
                    <div class="product-packeges">
                        <table>
                            <tbody>
                                <!-- <tr>
                                    <td class="label"><span>Size</span></td>
                                    <td class="value">
                                        <div class="product-sizes">
                                            <a href="#">Large</a>
                                            <a href="#">Medium</a>
                                            <a href="#">Small</a>
                                        </div>
                                    </td>
                                </tr> -->
                                <!-- <tr>
                                    <td class="label"><span>Color</span></td>
                                    <td class="value">
                                        <div class="product-colors">
                                            <a href="#" data-bg-color="#000000" style="background-color: rgb(0, 0, 0);"></a>
                                            <a href="#" data-bg-color="#ffffff" style="background-color: rgb(255, 255, 255);"></a>
                                        </div>
                                    </td>
                                </tr> -->
                                <tr>
                                    <td class="label"><span>Số lượng</span></td>
                                    <td class="value">
                                        <div class="product-quantity">
                                            <span class="qty-btn minus"><i class="fa fa-angle-down"></i></span>
                                            <input type="number" class="input-qty" name="quantity" value="1">
                                            <span class="qty-btn plus"><i class="fa fa-angle-up"></i></span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="product-buttons grid_list">
                        <div class="action-link">
                            <a class="compare-add same-link" href="compare.html" title="So sánh"><i class="zmdi zmdi-refresh-alt"></i></a>
                            @if(auth()->check())
                                <button id="add_cart" class="btn-secondary" data-route="{{ route('theme.add_to_cart', $product->id)}}">Thêm vào giỏ hàng</button>
                            @else
                                <button id="" class="btn-secondary prod_detail_alert_login" data-route="{{ route('theme.login_client')}}">Thêm vào giỏ hàng</button>
                            @endif
                            <a class="wishlist-add same-link" href="wishlist.html" title="Yêu thích"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                        </div>
                    </div>
                    <div class="product-meta">
                        <div class="desc-content">
                            <div class="social_sharing d-flex">
                                <h5>chia sẻ lên:</h5>
                                <ul>
                                    <li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                    <!-- <li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#" title="google+"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" title="linkedin"><i class="fa fa-linkedin"></i></a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Summery End -->
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-lg-3 col-sm-3 col-md-2">
                <!-- Product Description Tab Start -->
                <div class="product-desc-tab">
                    <ul class="nav flex-column" role="tablist">
                        <li><a class="active" href="#description" role="tab" data-bs-toggle="tab" aria-selected="false">Mô tả</a></li>
                        <li><a href="#sheet" role="tab" data-bs-toggle="tab" aria-selected="false">Thông số kỹ thuật</a></li>
                        <li><a href="#reviews" role="tab" data-bs-toggle="tab" aria-selected="true">Đánh giá</a></li>
                    </ul>
                </div>
                <!-- Product Description Tab End -->
            </div>
            <div class="col-lg-9 col-sm-9 col-md-10">
                <div class="product-desc-tab-content">
                    <!-- Start Single Content -->
                    <div role="tabpanel" id="description" class="product_tab_content fade active show">
                        <div class="product_description_wrap">
                            <div class="product_desc">
                                <h2 class="last-title mb-20">Mô tả sản phẩm</h2>
                                {!! json_decode($product->description) !!}
                            </div>
                        </div>
                    </div>
                    <!-- End Single Content -->
                    <!-- Start Single Content -->
                    <div role="tabpanel" id="sheet" class="product_tab_content fade">
                        <div class="pro__feature">
                            <h2 class="last-title mb-20">Thông số kỹ thuật</h2>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Thông số</th>
                                        <th scope="col">Giá trị</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($specs as $spec)
                                        <?php $convertData = explode(":", $spec); ?>
                                        <tr>
                                            @if( !isset($convertData[1]))
                                                <td>(Chưa có thông số kỹ thuật)</td>
                                            @else
                                                <td>{{ $convertData[0] }}</td>
                                                <td>{{ $convertData[1] }}</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- End Single Content -->
                    <!-- Start Single Content -->
                    <div role="tabpanel" id="reviews" class="product_tab_content fade">
                        <div class="review_address_inner mt-20">
                            <!-- Start Single Review -->
                            <div class="pro_review">
                                <div class="review_thumb">
                                    <img src="/assets/theme/images/blog/comment/comment-3.webp" alt="review images">
                                </div>
                                <div class="review_details">
                                    <div class="review_info">
                                        <a class="last-title" href="#">Gerald Barnes</a>
                                        <div class="rating">
                                            <span class="yellow"><i class="fa fa-star"></i></span>
                                            <span class="yellow"><i class="fa fa-star"></i></span>
                                            <span class="yellow"><i class="fa fa-star"></i></span>
                                            <span class="yellow"><i class="fa fa-star"></i></span>
                                            <span class="yellow"><i class="fa fa-star"></i></span>
                                        </div>
                                        <div class="rating_send">
                                            <a href="#"><i class="zmdi zmdi-mail-reply"></i></a>
                                            <a href="#"><i class="zmdi zmdi-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="review_date">
                                        <span>27 Jun, 2016 at 2:30pm</span>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at estei to bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                </div>
                            </div>
                            <!-- End Single Review -->
                            <!-- Start Single Review -->
                            <div class="pro_review pro-second">
                                <div class="review_thumb">
                                    <img src="/assets/theme/images/blog/comment/comment-3.webp" alt="review images">
                                </div>
                                <div class="review_details">
                                    <div class="review_info">
                                        <a class="last-title" href="#">Gerald Barnes</a>
                                        <div class="rating">
                                            <span class="yellow"><i class="fa fa-star"></i></span>
                                            <span class="yellow"><i class="fa fa-star"></i></span>
                                            <span class="yellow"><i class="fa fa-star"></i></span>
                                            <span class="yellow"><i class="fa fa-star"></i></span>
                                            <span class="yellow"><i class="fa fa-star"></i></span>
                                        </div>
                                        <div class="rating_send">
                                            <a href="#"><i class="zmdi zmdi-mail-reply"></i></a>
                                            <a href="#"><i class="zmdi zmdi-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="review_date">
                                        <span>27 Jun, 2016 at 2:30pm</span>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at estei to bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                </div>
                            </div>
                            <!-- End Single Review -->
                        </div>
                        <div class="comments_form">
                            <h3>Leave a Reply </h3>
                            <p>Your email address will not be published. Required fields are marked *</p>
                            <form action="#">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="review_comment">Comment </label>
                                        <textarea name="comment" id="review_comment" spellcheck="false" data-gramm="false"></textarea>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <label for="author">Name</label>
                                        <input id="author" type="text">

                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <label for="email">Email </label>
                                        <input id="email" type="text">
                                    </div>
                                </div>
                                <button class="button" type="submit">Post Comment</button>
                            </form>
                        </div>
                    </div>
                    <!-- End Single Content -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="product-details-home2 mt-45 mb-15">
                    <div class="block-title">
                        <h6>Sản phẩm tương tự</h6>
                    </div>
                    <div class="product-carousel-home2 slick-custom slick-custom-default nav-top">
                        @foreach($relatedProducts as $relatedProduct)
                        <div class="product-row">
                            <!-- Single-Product-Start -->
                            <div class="item-product">
                                <div class="product-thumb">
                                    @php
                                        $images = json_decode($relatedProduct->image);
                                    @endphp
                                    <a href="{{route('theme.product_detail', $relatedProduct->category->slug)}}">
                                        <img src="{{asset('../storage/products/'.$relatedProduct->code.'/image/'.$images[0])}}" alt="" class="img-fluid">
                                    </a>
                                    <div class="box-label">
                                        <div class="label-product-new">
                                            <span>New</span>
                                        </div>
                                    </div>
                                    <div class="action-link">
                                        <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#modal_box" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                        <a class="compare-add same-link" href="#" title="So sánh"><i class="zmdi zmdi-refresh-alt"></i></a>
                                        <a class="wishlist-add same-link" href="wishlist.html" title="Yêu thích"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                    </div>
                                </div>
                                <div class="product-caption">
                                    <div class="product-name">
                                        <a href="{{route('theme.product_detail', $relatedProduct->category->slug)}}">{{$relatedProduct->name}}</a>
                                    </div>
                                    <div class="rating">
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                        <span class="yellow"><i class="fa fa-star"></i></span>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price">{{$relatedProduct->cost_price}} vnd</span>
                                    </div>
                                    <div class="cart">
                                        <div class="add-to-cart">
                                            @if(auth()->check())
                                            <a class="cart-plus add_to_cart_btn" title="Thêm vào giỏ hàng" data-route="{{route('theme.add_to_cart', $relatedProduct->id)}}">
                                                <i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i>
                                            </a>
                                            @else
                                            <a class="cart-plus prod_detail_alert_login" title="Thêm vào giỏ hàng" data-route="{{route('theme.login_client') }}">
                                                <i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i>
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single-Product-End -->
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ========================
Product Details Area End 
===========================-->
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#add_cart').on("click", function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: $(this).data('route'),
                data:{
                    quantity: $('.input-qty').val(),
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

        $('.prod_detail_alert_login').on("click", function(e) {
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

    });
</script>
@endsection