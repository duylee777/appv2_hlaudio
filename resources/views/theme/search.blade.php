@extends('theme.layouts.page')
@section('title','Tìm kiếm')
@section('category-url', '')
@section('category-name', '')
@section('page-name', 'Tìm kiếm')
@section('page-content')

<!--======================
Shop Fullwidth area Start
==========================-->
<div class="shop-fullwidth-area mt-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if(count($listProduct) == 0)
                    <span>Không tìm thấy sản phẩm nào có từ khóa: {{$key}}</span>
                @else
                <!-- Shop Toolbar Start -->
                <div class="toolbar-shop mb-50">
                    <div class="shop_toolbar_btn">
                        <button data-role="grid_4" class="btn-grid-4 active"></button>
                    </div>
                    <div class="page-amount">
                        <p>Tìm thấy {{count($listProduct)}} sản phẩm với từ khóa "{{$key}}"</p>
                    </div>
                </div>
                <!-- Shop Toolbar End -->
                <!-- Shop Wrapper Start -->
                <div class="row shop-wrapper grid_4">
                    @foreach($listProduct as $index => $product)
                    <div class="mb-20 col-lg-3 col-md-4 col-sm-6">
                        <!-- Single-Product-Start -->
                        <div class="item-product {{$index == 0 ? 'pt-0' : ''}} {{$index == count($listProduct) ? 'pb-0 no-border-bottom' : ''}}">
                            <div class="product-thumb">
                                @php
                                    $images = json_decode($product->image);
                                @endphp
                                <a href="{{route('theme.product_detail', $product->slug)}}" style="width: 214px; height: 214px; overflow:hidden; padding: 1rem; border-radius: 8px;">
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
                                <div class="price-box">
                                    <span class="regular-price">{{$product->cost_price}} vnd</span>
                                    <span class="old-price"><del>{{$product->odd_price}} vnd</del></span>
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
                </div>
                <!-- Shop Wrapper End -->
            @endif
            </div>
        </div>
    </div>
</div>
<!--======================
Shop Fullwidth area End
==========================-->

{{-- Compare start --}}
@include('theme.modals.compare-theme')
{{-- Compare end --}}

@foreach($listProduct as $prod)
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
