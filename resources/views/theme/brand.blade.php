@extends('theme.layouts.page')
@section('title','Thương hiệu - '.$brand->name)
@section('category-url', '')
@section('category-name', '')
@section('page-name', $brand->name)
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
                            <h4 class="title-shop">{{$brand->name}}</h4>
                        </div>
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
                        <form class="widget_list widget_categories mt-20">
                            @csrf
                            <div class="sidebar-title">
                                <h4 class="title-shop">Sản phẩm</h4>
                            </div>
                                <ul>
                                    @if(isset($categories))
                                        @foreach($categories as $category)
                                        <li>
                                            <input class="category-check" type="checkbox" name="category" value="{{$category->slug}}" {{ in_array($category->slug, explode(',', $filterCategories)) ? 'checked' : '' }}>
                                            <a>{{$category->name}}</a>
                                            <span class="checkmark"></span>
                                        </li>
                                        @endforeach
                                    @endif
                                </ul>
                        </form>
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
                    </div>
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
                                    <div class="action-link">
                                        <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#product-{{$product->id}}" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>

                                        <a  class="compare-add-product same-link" 
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
{{-- Compare start --}}
@include('theme.modals.compare-theme')
{{-- Compare end --}}

@include('theme.modals.prod')
<!--======================
Form filter Start
==========================-->
<form id="formFilter" method="GET" enctype="multipart/form-data">
    <input type="hidden" name="page" id="page" value="{{$page}}" />
    <input type="hidden" name="soft" id="soft" value="{{$soft}}" />
    <input type="hidden" name="filter_category" id="filter_category" value="{{$filterCategories}}" multiple/>
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

        $.each($('.category-check'), function() {
            var categories = "";
            $(this).on("change", function(e) {
                $('.category-check').each(function() {
                    if($(this).is(':checked')) {
                        categories += (categories == "") ? $(this).val() : "," + $(this).val();
                    }
                })

                if(categories == "") {categories = "all";}
                $('#filter_category').val(categories);

                $(this).submitFilter();
            });
        });

        let page = $(this).getPage();
        $('#page').val(page);

        let pageUrl = "?page=";
        let softUrl = "&soft=";
        let categoryUrl = "&filter_category=";
        $('.link-page').each(function(index, url) {
            url += softUrl + $('#soft').val() + categoryUrl + encodeURIComponent($('#filter_category').val()) ;
            $(this).attr("href", url);
        });

        if($('#link-next').attr('href') != null) {
            $('#link-next').attr('href', pageUrl + (page+1) +  softUrl + $('#soft').val() + categoryUrl + encodeURIComponent($('#filter_category').val()));
        }
        if($('#link-previous').attr('href') != null) {
            $('#link-previous').attr('href', pageUrl + (page-1) +  softUrl + $('#soft').val() + categoryUrl + encodeURIComponent($('#filter_category').val()));
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
    });

</script>
@endsection