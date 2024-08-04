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
                            @php
                                $images = json_decode($product->image);
                            @endphp
                            <a  class="compare-add-product same-link" 
                                data-action="{{ $product->id }}" 
                                data-category ="{{$product->category_id}}"
                                data-image="{{ asset('../storage/products/' . $product->code . '/image/' . $images[0]) }}"
                                data-name ="{{ $product->name }}" 
                                title="Add to compare">
                                <i class="zmdi zmdi-refresh-alt"></i>
                            </a>
                            @if(auth()->check())
                                <button id="add_cart" class="btn-secondary" data-route="{{ route('theme.add_to_cart', $product->id)}}">Thêm vào giỏ hàng</button>
                            @else
                                <button id="" class="btn-secondary prod_detail_alert_login" data-route="{{ route('theme.login_client')}}">Thêm vào giỏ hàng</button>
                            @endif

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
                        <li><a href="#comments" role="tab" data-bs-toggle="tab" aria-selected="true">Bình luận</a></li>
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
                    <div role="tabpanel" id="comments" data-route={{route('theme.comment',$product->id)}} class="product_tab_content fade">
                        <div class="review_address_inner mt-20">
                            <!-- Start Single Review -->
                            @if (count($comment->where('comment_id',0))==0)
                            <div class="parent-product">
                                <p style="padding-bottom: 8px;">Chưa có bình luận nào.</p>
                            </div>
                            @else
                            @foreach ($comment->where('comment_id',0) as $cmt)
                            <div class="parent-product">
                                <div class="pro_review pro-first">
                                    <div class="review_thumb">
                                        <img src="/assets/theme/images/blog/comment/comment-3.webp" alt="review images">
                                    </div>
                                    <div class="review_details">
                                        <div class="review_info">
                                            @php
                                                $user = App\Models\User::find($cmt->user_id);
                                            @endphp
                                            <a class="last-title">{{$user->name}}</a>
                                            <div class="rating_send">
                                                @if (auth()->check())
                                                    @if (auth()->user()->id == $cmt->user_id)
                                                        <a class="edit-cmt"><i class="zmdi zmdi-edit"></i></a>
                                                    @else
                                                        <a class="reply-cmt"><i class="zmdi zmdi-mail-reply"></i></a>
                                                    @endif
                                                    @if (!auth()->user()->hasRole(config('global.default_roles.customer'))||auth()->user()->id == $cmt->user_id)
                                                        <a class="delete-cmt" data-route="{{route('theme.hideComment',$cmt->id)}}""><i class="zmdi zmdi-close"></i></a>
                                                    @endif
                                                @else
                                                    <a class="reply-cmt prod_detail_alert_login" data-route="{{ route('theme.login_client')}}"><i class="zmdi zmdi-mail-reply"></i></a>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="review_date">
                                            <span>{{date("d-m-Y", strtotime($cmt->created_at))}} lúc {{date("H:i", strtotime($cmt->created_at))}}</span>
                                            {{-- <span>27 Jun, 2016 at 2:30pm</span> --}}
                                        </div>
                                        <p class="cmt-content">{{$cmt->body}}</p>
                                        @if (auth()->check())
                                            <div class="cmt-show" hidden>
                                                <input type="text" class="cmt-input">
                                                <button class="button reply-cmt-btn comment-btn" data-route="{{route('theme.storeComment',[$product->id,$cmt->id,0])}}" >Bình luận</button>
                                                @if (auth()->user()->id == $cmt->user_id)
                                                    <button class="button edit-cmt-btn" data-route="{{route('theme.editComment',$cmt->id)}}" >Sửa</button>
                                                @endif
                                                <button class="button cancel-cmt-btn" >Hủy</button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @if (count($comment->where('comment_id',$cmt->id)->sortBy('created_at'))>3)
                                    <a class="more-cmt-reply btn-more-cmt cursor-p" style="display: block; color: blue; padding: 0px 0px 8px 80px;" >Xem thêm</a>
                                @endif
                                @foreach ($comment->where('comment_id',$cmt->id)->sortBy('created_at') as $item)
                                    <div class="pro_review pro-second">
                                        <div class="review_thumb">
                                            <img src="/assets/theme/images/blog/comment/comment-3.webp" alt="review images">
                                        </div>
                                        <div class="review_details">
                                            <div class="review_info">
                                                @php
                                                    $userRep = App\Models\User::find($item->user_id);
                                                @endphp
                                                <a class="last-title">{{$userRep->name}}</a>
                                                <div class="rating_send">
                                                    @if (auth()->check())
                                                            
                                                        @if (auth()->user()->id == $item->user_id)
                                                            <a class="edit-cmt"><i class="zmdi zmdi-edit"></i></a>
                                                        @else
                                                            <a class="reply-cmt"><i class="zmdi zmdi-mail-reply"></i></a>
                                                        @endif
                                                        @if (!auth()->user()->hasRole(config('global.default_roles.customer'))||auth()->user()->id == $item->user_id)
                                                            <a class="delete-cmt" data-route="{{route('theme.hideComment',$item->id)}}""><i class="zmdi zmdi-close"></i></a>
                                                        @endif
                                                    @else
                                                        <a class="reply-cmt prod_detail_alert_login" data-route="{{ route('theme.login_client')}}"><i class="zmdi zmdi-mail-reply"></i></a>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="review_date">
                                                <span>{{date("d-m-Y", strtotime($item->created_at))}} lúc {{date("H:i", strtotime($item->created_at))}}</span>
                                                {{-- <span>27 Jun, 2016 at 2:30pm</span> --}}
                                            </div>
                                            <p class="cmt-content">{{$item->body}}</p>
                                            @if (auth()->check())
                                                <div class="cmt-show" hidden>
                                                    <input type="text" class="cmt-input">
                                                        <button class="button reply-cmt-btn comment-btn" data-route="{{route('theme.storeComment',[$product->id,$cmt->id,0])}}" >Bình luận</button>
                                                    @if (auth()->user()->id == $item->user_id)
                                                        <button class="button edit-cmt-btn" data-route="{{route('theme.editComment',$item->id)}}" >Sửa</button>
                                                    @endif
                                                    <button class="button cancel-cmt-btn" >Hủy</button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach 
                            </div>
                            @endforeach    
                            @endif
                            
                            <!-- End Single Comment -->
                        </div>
                        <div id="show-more-cmt" >
                            <button class="btn btn-primary btn-more-cmt" >Xem thêm</button>
                        </div>
                        <div class="comments_form">
                            <form >
                                <div class="row">
                                    <div class="col-12">
                                        <label for="review_comment">Viết bình luận </label>
                                        <textarea name="comment" id="review_comment" spellcheck="false" data-gramm="false"></textarea>
                                    </div>
                                </div>
                                @if(auth()->check())
                                    <button class="button comment-btn" data-route="{{route('theme.storeComment',[$product->id,0,0])}}">Bình luận</button>  
                                @else
                                    <button class="button comment-button prod_detail_alert_login" data-route="{{ route('theme.login_client')}}">Bình luận</button>
                                @endif
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
                                        // var_dump($relatedProduct->slug); die;
                                    @endphp
                                    <a href="{{route('theme.product_detail', $relatedProduct->slug)}}">
                                        <img src="{{asset('../storage/products/'.$relatedProduct->code.'/image/'.$images[0])}}" alt="" class="img-fluid">
                                    </a>
                                    <div class="box-label">
                                        <div class="label-product-new">
                                            <span>New</span>
                                        </div>
                                    </div>
                                    <div class="action-link">
                                        <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#product-{{$relatedProduct->id}}" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>

                                        <a  class="compare-add-product same-link" 
                                            data-action="{{ $relatedProduct->id }}" 
                                            data-category ="{{$relatedProduct->category_id}}"
                                            data-image="{{ asset('../storage/products/' . $relatedProduct->code . '/image/' . $images[0]) }}"
                                            data-name ="{{ $relatedProduct->name }}" 
                                            title="Add to compare">
                                            <i class="zmdi zmdi-refresh-alt"></i>
                                        </a>

                                        @if (auth()->check())
                                            @php
                                                if (
                                                    App\Models\Wishlist::where([
                                                        'user_id' => Auth()->user()->id,
                                                        'product_id' => $relatedProduct->id,
                                                    ])->exists()
                                                ) {
                                                    $bg_temp = 'bg-danger';
                                                } else {
                                                    $bg_temp = '';
                                                }
                                            @endphp
                                            <a title="Thêm vào yêu thích"
                                                data-route="{{ route('addToWishlist', $relatedProduct->id) }}"
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
{{-- Compare start --}}
@include('theme.modals.compare-theme')
{{-- Compare end --}}
@foreach($relatedProducts as $prod)
<div class="modal fade" id="product-{{$prod->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
            </button>
            <div class="modal_body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="modal_tab">
                                <div class="tab-content product-details-large">
                                    @php
                                        $images = json_decode($prod->image);
                                    @endphp
                                    @foreach($images as $key => $image)
                                    <div class="tab-pane fade {{$key == 0 ? 'show active': ''}}" id="tab-{{$prod->id}}-{{$key}}" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="{{route('theme.product_detail', $prod->slug)}}">
                                                <img src="{{asset('../storage/products/'.$prod->code.'/image/'.$image)}}" alt="{{$prod->name}}" class="img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="modal_tab_button">
                                    <ul class="nav product_navactive" role="tablist">
                                        @foreach($images as $key => $image)
                                        <li>
                                            <a class="nav-link {{$key == 0 ? 'active': ''}}" data-bs-toggle="tab" href="#tab-{{$prod->id}}-{{$key}}" role="tab" aria-controls="tab-{{$prod->id}}-{{$key}}" aria-selected="false" style="width: 100px;">
                                                <img src="{{asset('../storage/products/'.$prod->code.'/image/'.$image)}}" alt="{{$prod->name}}" class="img-fluid">
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <!-- Product Summery Start -->
                            <div class="product-summery mt-50">
                                <div class="product-head">
                                    <h1 class="product-title">{{ $prod->name }}</h1>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price">{{ $prod->odd_price }}</span>
                                </div>
                                {{-- <div class="product-description">
                                    <?= json_decode($prod->description) ?>
                                </div> --}}
                                <div class="product-tax mb-20">
                                    <ul>
                                        <li><span><strong>Mã sản phẩm : </strong>{{ $prod->code }}</span></li>
                                        <li><span><strong>Thương hiệu : </strong>{{ $prod->brand->name }}</span></li>
                                        <li><span><strong>Xuất xứ : </strong>{{ $prod->origin }}</span></li>
                                        <li><span><strong>Tình trạng : </strong>{{$prod->inventory->quantity == 0 ? 'Liên hệ' : 'Còn hàng'}}</span></li>
                                    </ul>
                                </div>
                                <div class="product-buttons grid_list">
                                    <div class="action-link">
                                        <a  class="compare-add-product" 
                                            data-action="{{ $prod->id }}" 
                                            data-category ="{{$prod->category_id}}"
                                            data-image="{{ asset('../storage/products/' . $prod->code . '/image/' . $images[0]) }}"
                                            data-name ="{{ $prod->name }}" 
                                            title="Add to compare">
                                            <i class="zmdi zmdi-refresh-alt"></i>
                                        </a>

                                        @if(auth()->check())
                                            <a class="add_to_cart_btn" title="Thêm vào giỏ hàng" data-route="{{route('theme.add_to_cart', $prod->id)}}">
                                                <i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i>
                                            </a>
                                        @else
                                            <a class="prod_alert_login" data-route="{{ route('theme.login_client') }}">
                                                <i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i>
                                            </a>
                                        @endif

                                        @if (auth()->check())
                                            @php
                                                if (
                                                    App\Models\Wishlist::where([
                                                        'user_id' => Auth()->user()->id,
                                                        'product_id' => $prod->id,
                                                    ])->exists()
                                                ) {
                                                    $bg_temp = 'bg-danger';
                                                } else {
                                                    $bg_temp = '';
                                                }
                                            @endphp
                                            <a title="Thêm vào yêu thích"
                                                data-route="{{ route('addToWishlist', $prod->id) }}"
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
                                <div class="product-meta">
                                    <div class="desc-content">
                                        <div class="social_sharing d-flex">
                                            <h5>Chia sẻ lên:</h5>
                                            <ul>
                                                <li>
                                                    <a href="https://www.facebook.com/sharer.php?u={{route('theme.product_detail', $prod->slug)}}" rel="me" title="Facebook" target="_blank">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product Summery End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

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

        $(this).addToCompare('compare-add-product');

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

        // Comment start
        $.each($('.parent-product'), function(){
            let countShow = 3;
            if($('.parent-product').length > countShow){
                if ($('.parent-product').index(this) > countShow -1) {
                    $(this).addClass("collapse");
                }
            }
            else{
                $('#show-more-cmt').css("display","none");
            }
            let childLength = $(this).children('.pro-second').length;
            $.each($(this).children('.pro-second'), function(){
                let parentSecond = $(this).parent(".parent-product").children('.pro-second');
                if (parentSecond.index(this) < childLength - countShow) {
                    $(this).addClass("collapse");
                }
            })
        })

        $.each($('.btn-more-cmt'), function(){
            $(this).on("click", function(e){
                if ($(this).hasClass("close-cmt")) {
                    if ($(this).hasClass("more-cmt-reply")) {
                        let proSecond = $(this).siblings(".pro-second").length;
                        $.each(($(this).siblings(".pro-second")), function(){
                            if ($(this).index()< proSecond - 1) {
                                $(this).addClass("collapse");
                            }
                        });
                    }
                    else{
                        $.each($('.parent-product'), function(){
                            if ($('.parent-product').index(this)>2) {
                                $(this).addClass("collapse");
                            }
                        });
                    }
                    $(this).removeClass("close-cmt");
                    $(this).html("Xem thêm");
                }
                else{
                    let cmtShow = 3;
                    if ($(this).hasClass("more-cmt-reply")) {
                        let proSecondHidden = $(this).siblings(".pro-second.collapse");
                        proSecondHidden.removeClass("collapse");
                        $(this).addClass("close-cmt");
                        $(this).html("Thu gọn");
                    } else {
                        let countProFirst = $('.parent-product.collapse').length;
                        console.log(countProFirst);
                        if (countProFirst > cmtShow ) {
                            for (let i = 0; i < cmtShow; i++) {
                                $('.parent-product.collapse').eq(cmtShow - 1 -i).removeClass("collapse");
                            }
                        } else {
                            $('.parent-product.collapse').removeClass("collapse");
                            $(this).addClass("close-cmt");
                            $(this).html("Thu gọn");
                        }
                    }
                }
            });
        })

        $.each($('.comment-btn'), function() {
            $(this).on("click", function(e) {
                e.preventDefault();
                let comment = $('#review_comment').val();
                let user = '';
                if ($(this).hasClass("reply-cmt-btn")) {
                    user = '@' + $(this).text().replace('Trả lời ', '') + ' ';
                    comment = user + $(this).prev('.cmt-input').val();
                }
                if ($.trim(comment)==$.trim(user)) {
                    Swal.fire({
                        title: "Bình luận không được để trống!",
                        icon: "warning",
                        cancelButtonColor: "#d33",
                        cancelButtonText: "Quay lại",
                    })
                }
                else{
                    $.ajax({
                    type: 'POST',
                    url: $(this).data('route'),
                    data: {
                        comment: comment,
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
                }
            });
        }); 
        
        $.each($('.delete-cmt'), function() {
            $(this).on("click", function(e) {
                e.preventDefault();
                Swal.fire({
                title: "Bạn có chắc chắn muốn xóa bình luận này?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Xóa bình luận",
                cancelButtonText: "Quay lại",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'PATCH',
                            url: $(this).data('route'),
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
                    }
                });
            });
        });

        $.each($('.reply-cmt'), function(){
            $(this).on("click",function(e){
                e.preventDefault();
                let parentAll = $(this).parents('.review_details');
                $('.cmt-show').attr("hidden",true);
                $('.reply-cmt-btn').attr("hidden",false);
                $('.cmt-content').attr("hidden",false);
                $('.edit-cmt-btn').attr("hidden",false);
                // $('.cmt-input').val("");
                parentAll.find('.cmt-show').attr("hidden",false);
                parentAll.find('.edit-cmt-btn').attr("hidden",true);
                parentAll.find('.reply-cmt-btn').html("Trả lời " + parentAll.find('.last-title').text());
                parentAll.find('.cmt-input').focus();
            });
        });

        $.each($('.edit-cmt'), function(){
            $(this).on("click",function(e){
                e.preventDefault();
                let parentAll = $(this).parents('.review_details');
                $('.cmt-show').attr("hidden",true);
                $('.reply-cmt-btn').attr("hidden",false);
                $('.cmt-content').attr("hidden",false);
                $('.edit-cmt-btn').attr("hidden",false);
                $('.cmt-input').val("");
                parentAll.find('.cmt-show').attr("hidden",false);
                parentAll.find('.reply-cmt-btn').attr("hidden",true);
                parentAll.find('.cmt-content').attr("hidden",true);
                parentAll.find('.cmt-input').val(parentAll.find('.cmt-content').text()).focus();
            });
        });

        $.each($('.cancel-cmt-btn'), function(){
            $(this).on("click", function(e){
                e.preventDefault();
                let parentAll = $(this).parents('.review_details');
                parentAll.find('.cmt-show').attr("hidden",true);
                parentAll.find('.reply-cmt-btn').attr("hidden",false);
                parentAll.find('.edit-cmt-btn').attr("hidden",false);
                parentAll.find('.cmt-content').attr("hidden",false);
                parentAll.find('.cmt-input').val("");
            });
        });

        $.each($('.edit-cmt-btn'), function() {
            $(this).on("click", function(e) {
                e.preventDefault();
                let parentAll = $(this).parents('.review_details');
                let dataUpdate = parentAll.find('.cmt-input').val();
                if (dataUpdate.includes(parentAll.f)) {
                    
                }
                $.ajax({
                    type: 'PATCH',
                    url: $(this).data('route'),
                    data: {
                        body: dataUpdate,
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

        // Comment end

    });
</script>
@endsection