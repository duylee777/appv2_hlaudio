<!-- modal area start-->
@foreach($bestSellerProducts as $bestSellerProduct)
<div class="modal fade" id="bestseller-product-{{$bestSellerProduct->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                        $images = json_decode($bestSellerProduct->image);
                                    @endphp
                                    @foreach($images as $key => $image)
                                    <div class="tab-pane fade {{$key == 0 ? 'show active': ''}}" id="tab-{{$bestSellerProduct->id}}-{{$key}}" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="{{route('theme.product_detail', $bestSellerProduct->slug)}}">
                                                <img src="{{asset('../storage/products/'.$bestSellerProduct->code.'/image/'.$image)}}" alt="{{$bestSellerProduct->name}}" class="img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="modal_tab_button">
                                    <ul class="nav product_navactive" role="tablist">
                                        @foreach($images as $key => $image)
                                        <li>
                                            <a class="nav-link {{$key == 0 ? 'active': ''}}" data-bs-toggle="tab" href="#tab-{{$bestSellerProduct->id}}-{{$key}}" role="tab" aria-controls="tab-{{$bestSellerProduct->id}}-{{$key}}" aria-selected="false" style="width: 100px;">
                                                <img src="{{asset('../storage/products/'.$bestSellerProduct->code.'/image/'.$image)}}" alt="{{$bestSellerProduct->name}}" class="img-fluid">
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
                                    <h1 class="product-title">{{ $bestSellerProduct->name }}</h1>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price">{{ $bestSellerProduct->odd_price }}</span>
                                </div>
                                {{-- <div class="product-description">
                                    <?= json_decode($bestSellerProduct->description) ?>
                                </div> --}}
                                <div class="product-tax mb-20">
                                    <ul>
                                        <li><span><strong>Mã sản phẩm : </strong>{{ $bestSellerProduct->code }}</span></li>
                                        <li><span><strong>Thương hiệu : </strong>{{ $bestSellerProduct->brand->name }}</span></li>
                                        <li><span><strong>Xuất xứ : </strong>{{ $bestSellerProduct->origin }}</span></li>
                                        <li><span><strong>Tình trạng : </strong>{{$bestSellerProduct->inventory->quantity == 0 ? 'Liên hệ' : 'Còn hàng'}}</span></li>
                                    </ul>
                                </div>
                                <div class="product-buttons grid_list">
                                    <div class="action-link">
                                        <a href="#" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                        @if(auth()->check())
                                            <a class="add_to_cart_btn" title="Thêm vào giỏ hàng" data-route="{{route('theme.add_to_cart', $product->id)}}">
                                                <i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i>
                                            </a>
                                        @else
                                            <a class="prod_alert_login" data-route="{{ route('theme.login_client') }}">
                                                <i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i>
                                            </a>
                                        @endif
                                        <a href="#" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                    </div>
                                </div>
                                <div class="product-meta">
                                    <div class="desc-content">
                                        <div class="social_sharing d-flex">
                                            <h5>Chia sẻ lên:</h5>
                                            <ul>
                                                <li>
                                                    <a href="https://www.facebook.com/sharer.php?u={{route('theme.product_detail', $bestSellerProduct->slug)}}" rel="me" title="Facebook" target="_blank">
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
<!-- modal area end-->