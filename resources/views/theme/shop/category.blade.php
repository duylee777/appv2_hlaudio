@extends('theme.layouts.page')
@section('title','Danh mục - '.$category->name)
@section('category-url', route('theme.shop'))
@section('category-name', 'Danh mục')
@section('page-name', $category->name)
@section('page-content')
<!--======================
Shop area Start
==========================-->
<div class="shop-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <aside class="sidebar-widget mt-50">
                    <div class="shop-sidebar-category">
                        <div class="sidebar-title">
                            <h4 class="title-shop">{{$category->name}}</h4>
                        </div>
                        <ul class="sidebar-category-expand">
                        @foreach(App\Models\Category::get() as $key => $childCate)
                            @if(!empty($childCate->parent) && ($childCate->is_visible) && $childCate->parent->slug == $category->slug)
                                <li class="menu-item-has-children {{$key==0?'active': ''}}">
                                    @if(count($childCate->children) != 0)
                                        <span class="menu-expand"><i class="fa fa-angle-down"></i></span>
                                    @endif
                                    <a href="{{route('theme.category', $childCate->slug)}}">{{$childCate->name}}</a>
                                    @if(count($childCate->children) != 0)
                                    <ul class="sub-menu">
                                        @foreach($childCate->children as $childCateLv1)
                                        <li class="menu-item-has-children">
                                            <!-- <span class="menu-expand"><i class="fa fa-angle-down"></i></span> -->
                                            <a href="{{route('theme.category', $childCateLv1->slug)}}">{{$childCateLv1->name}}</a>
                                            <!-- <ul class="sub-menu">
                                                <li><a href="shop.html">Shirt</a></li>
                                                <li><a href="shop-fullwidth.html">Pant</a></li>
                                                <li><a href="shop-fullwidth-list.html">Shoes</a></li>
                                            </ul> -->
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                            @endif
                        @endforeach
                        </ul>
                    </div>
                    <div class="widget_inner widget-background mt-50">
                        <div class="widget_list widget_filter">
                            <div class="sidebar-title">
                                <h4 class="title-shop">Lọc theo giá</h4>
                            </div>
                            <form action="#">
                                <div id="slider-range"></div>
                                <button type="submit">Lọc</button>
                                <input type="text" name="text" id="amount" />
                            </form>
                        </div>
                        <!-- <div class="widget_list widget_categories mt-20">
                            <div class="sidebar-title">
                                <h4 class="title-shop">Categories</h4>
                            </div>
                            <ul>
                                <li>
                                    <input type="checkbox">
                                    <a href="#">Categories1 (6)</a>
                                    <span class="checkmark"></span>
                                </li>
                                <li>
                                    <input type="checkbox">
                                    <a href="#">Categories2(10)</a>
                                    <span class="checkmark"></span>
                                </li>
                                <li>
                                    <input type="checkbox">
                                    <a href="#">Categories3 (4)</a>
                                    <span class="checkmark"></span>
                                </li>
                            </ul>
                        </div> -->
                        <form class="widget_list widget_categories mt-20">
                            @csrf
                            <div class="sidebar-title">
                                <h4 class="title-shop">Thương hiệu</h4>
                            </div>
                                <ul>
                                    @php 
                                        $brands = App\Models\Brand::get();
                                    @endphp
                                    @if(isset($brands))
                                        @foreach($brands as $brand)
                                        <li>
                                            <input class="brand-check" type="checkbox" name="brand" value="{{$brand->slug}}" {{ in_array($brand->slug, explode(',', $filterBrand)) ? 'checked' : '' }}>
                                            <a>{{$brand->name}}</a>
                                            <span class="checkmark"></span>
                                        </li>
                                        @endforeach
                                    @endif
                                </ul>
                        </form>
                        <!-- <div class="widget_list widget_categories mt-20">
                            <div class="sidebar-title">
                                <h4 class="title-shop">Select by Color</h4>
                            </div>
                            <ul>
                                <li>
                                    <input type="checkbox">
                                    <a href="#">Black (6)</a>
                                    <span class="checkmark"></span>
                                </li>
                                <li>
                                    <input type="checkbox">
                                    <a href="#"> Blue (8)</a>
                                    <span class="checkmark"></span>
                                </li>
                                <li>
                                    <input type="checkbox">
                                    <a href="#">Brown (10)</a>
                                    <span class="checkmark"></span>
                                </li>
                                <li>
                                    <input type="checkbox">
                                    <a href="#"> Green (6)</a>
                                    <span class="checkmark"></span>
                                </li>
                                <li>
                                    <input type="checkbox">
                                    <a href="#">Pink (4)</a>
                                    <span class="checkmark"></span>
                                </li>
                                <li>
                                    <input type="checkbox">
                                    <a href="#">White (2)</a>
                                    <span class="checkmark"></span>

                                </li>
                            </ul>
                        </div> -->
                    </div>
                    <!-- Shop Banner Start -->
                    <div class="single-banner text-center mt-50 mb-30">
                        <a href="/san-pham/dk-6000pro"><img src="/assets/theme/images/banner/shop-banner-5.png" alt="" class="img-fluid"></a>
                    </div>
                    <!-- Shop Banner End -->
                </aside>
            </div>
            <div class="col-lg-9 order-first order-lg-last">
                <!-- Shop Banner Start -->
                <div class="single-banner mt-50 mb-50">
                    <a href="/san-pham/dk-6000pro"><img src="/assets/theme/images/banner/shop-banner-6.png" alt="" class="img-fluid"></a>
                </div>
                <!-- Shop Banner End -->
                <!-- Shop Toolbar Start -->
                <div class="toolbar-shop mb-50">
                    <div class="shop_toolbar_btn">
                        <button data-role="grid_3" class="btn-grid-3 active"></button>
                        {{-- <button data-role="grid_list" class="btn-list"></button> --}}
                    </div>
                    <!-- <div class="page-amount">
                        <p>There are 10 Products</p>
                    </div> -->
                    <form class="">
                        @csrf
                        <select id="filter-soft" name="filter-soft" class="px-2 py-1">
                            <option value="all" {{isset($_GET['soft']) && ($_GET['soft']=='all')?'selected': ''}}>--Lọc--</option>
                            <option value="name_asc" {{isset($_GET['soft']) && ($_GET['soft']=='name_asc')?'selected': ''}}>Tên A->Z</option>
                            <option value="name_desc" {{isset($_GET['soft']) && ($_GET['soft']=='name_desc')?'selected': ''}}>Tên Z->A</option>
                            <option value="price_asc" {{isset($_GET['soft']) && ($_GET['soft']=='price_asc')?'selected': ''}}>Giá tăng dần</option>
                            <option value="price_desc" {{$soft=='price_desc'?'selected': ''}}>Giá giảm dần</option>
                        </select>
                    </form>
                    <!-- <div class="nice-select select-option">
                        <select id="filter" name="filter">
                            <option value="1">Tên A->Z</option>
                            <option value="2">Tên Z->A</option>
                            <option value="3">Giá giảm dần</option>
                            <option value="4">Giá tăng dần</option>
                        </select>
                    </div> -->
                </div>
                <!-- Shop Toolbar End -->
                <!-- Shop Wrapper Start -->
                <div class="row shop-wrapper grid_3">
                    @php
                        $countProd = count($products);
                    @endphp
                    @if($countProd != 0)
                        @foreach($products as $key => $product)
                        @php
                            $images = json_decode($product->image);
                        @endphp
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-20">
                            <!-- Single-Product-Start -->
                            <div data-brand="{{$product->brand_id}}" data-name="{{$product->name}}" class="item-product {{$key == 0 ? 'pt-0': ''}} {{$key == count((array)$products) - 1 ? 'pb-0 no-border-bottom': ''}}">
                                <div class="product-thumb">
                                    <a href="{{route('theme.product_detail', $product->slug)}}">
                                        <img src="{{asset('../storage/products/'.$product->code.'/image/'.$images[0])}}" alt="" class="img-fluid">
                                    </a>
                                    {{-- <div class="box-label">
                                        <div class="label-product-new">
                                            <span>New</span>
                                        </div>
                                    </div> --}}
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
                                        <span class="regular-price">{{$product->odd_price}}</span>
                                        <span class="old-price"><del>{{$product->cost_price}}</del></span>
                                    </div>
                                    <div class="cart">
                                        <div class="add-to-cart">
                                            @if(auth()->check())
                                            <a class="add_to_cart_btn" title="Thêm vào giỏ hàng" data-route="{{route('theme.add_to_cart', $product->id)}}">
                                                <i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i>
                                            </a>
                                            @else
                                            <a class="prod_alert_login" data-route="{{ route('theme.login_client') }}">
                                                <i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i>
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="grid-list-caption align-items-center">
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
                                        <span class="regular-price">$30.00</span>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed</p>
                                    <div class="text-available">
                                        <p><strong>Có sẵn:</strong><span> {{$product->inventory->quantity}} </span></p>
                                    </div>
                                    <div class="action-link">
                                        <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#modal_box" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                        <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                        <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                    </div>
                                    <div class="cart-list-button">
                                        <a href="shopping-cart.html" class="cart-btn">Add To Cart</a>
                                    </div>
                                </div> --}}
                            </div>
                            <!-- Single-Product-End -->
                        </div>
                        @endforeach
                        <!-- Shop Toolbar Start -->
                        {{ $products->links('vendor.pagination.client') }}

                        <!-- Shop Toolbar End -->
                    @endif
                </div>
                <!-- Shop Wrapper End -->
            </div>
        </div>
    </div>
</div>

<!--======================
Shop area End
==========================-->

<!--======================
Form filter Start
==========================-->
<form id="formFilter" method="GET" enctype="multipart/form-data">
    <input type="hidden" name="page" id="page" value="{{$page}}" />
    <input type="hidden" name="soft" id="soft" value="{{$soft}}" />
    <input type="hidden" name="filter_brand" id="filter_brand" value="{{$filterBrand}}" multiple/>
</form>
<!--======================
Form filter End
==========================-->

<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        jQuery.fn.extend({
            getPage: function() {
                let curentPage = <?php echo isset($_GET['page'])?$_GET['page']:1; ?>;
                return curentPage;
            },

            submitFilter: function() {
                $('#page').val(1);
                $('#formFilter').submit();
            },
        });
        
        $('#filter-soft').on("change", function(e) {
            let filter = $(this).val();
            $('#soft').val(filter);
            
            $(this).submitFilter();
        });

        $.each($('.brand-check'), function() {
            var brands = "";
            $(this).on("change", function(e) {
                $('.brand-check').each(function() {
                    if($(this).is(':checked')) {
                        brands += (brands == "") ? $(this).val() : "," + $(this).val();
                    }
                })

                if(brands == "") {brands = "all";}
                $('#filter_brand').val(brands);

                $(this).submitFilter();
            });
        });

        let page = $(this).getPage();
        $('#page').val(page);

        let pageUrl = "?page=";
        let softUrl = "&soft=";
        let brandUrl = "&filter_brand=";
        $('.link-page').each(function(index, url) {
            url += softUrl + $('#soft').val() + brandUrl + encodeURIComponent($('#filter_brand').val()) ;
            $(this).attr("href", url);
        });

        if($('#link-next').attr('href') != null) {
            $('#link-next').attr('href', pageUrl + (page+1) +  softUrl + $('#soft').val() + brandUrl + encodeURIComponent($('#filter_brand').val()));
        }
        if($('#link-previous').attr('href') != null) {
            $('#link-previous').attr('href', pageUrl + (page-1) +  softUrl + $('#soft').val() + brandUrl + encodeURIComponent($('#filter_brand').val()));
        } 

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