@extends('theme.layouts.page')
@section('title', 'So sánh')
@section('category-url', '')
@section('category-name', '')
@section('page-name', 'So sánh')
@section('page-content')

    <!--======================
                    Compare area Start
                    ==========================-->
    <div class="compare-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="#" class="compare-form">
                        <!-- Compare Title Start -->
                        <div class="cart-title">
                            <h5 class="last-title mt-45 mb-20">So sánh</h5>
                        </div>
                        <!-- Compare Title End -->
                        <!-- Compare Table Area Start -->
                        @if (is_null($compare_list))
                            Không có sản phẩm nào để so sánh.
                        @else
                            <div class="compare-table">
                                <div class="table ">
                                    <table style="width:100%">
                                        <tbody>
                                            <tr>
                                                <td class="first-column">Hinh ảnh</td>
                                                @foreach ($compare_list as $product)
                                                    @php
                                                        $images = json_decode($product->image);
                                                    @endphp
                                                    <td class="product-image">
                                                        <a href="{{ route('theme.product_detail', $product->slug) }}">
                                                            <img style="max-width: 300px;" src="{{ asset('../storage/products/' . $product->code . '/image/' . $images[0]) }}"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td class="first-column">Sản phẩm</td>
                                                @foreach ($compare_list as $product)
                                                    <td class="product-name">{{ $product->name }}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td class="first-column">Giá</td>
                                                @foreach ($compare_list as $product)
                                                    <td class="product-price">{{ $product->odd_price }}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td class="first-column" style="vertical-align: text-top;">Thông số kỹ thuật</td>
                                                @foreach ($compare_list as $product)
                                                    <td class="product-specifications" style=" vertical-align: text-top; padding: 0;">
                                                        <table id="table-compare" class="table table-striped" >
                                                            <tbody>
                                                                @foreach(explode(";", json_decode($product->specifications)) as $spec)
                                                                    <?php $convertData = explode(":", $spec); ?>
                                                                    <tr>
                                                                        @if( !isset($convertData[1]))
                                                                            <td>(Chưa có thông số kỹ thuật)</td>
                                                                        @else
                                                                            <td style="font-weight: 600">{{ $convertData[0] }}</td>
                                                                            <td>{{ $convertData[1] }}</td>
                                                                        @endif
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td class="first-column">Thêm vào giỏ hàng</td>
                                                @foreach ($compare_list as $product)
                                                    <td class="product-specifications">
                                                        @if (auth()->check())
                                                            <a class="add_to_cart_btn" title="Thêm vào giỏ hàng"
                                                                data-route="{{ route('theme.add_to_cart', $product->id) }}">
                                                                <i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw" style="font-size: 20px"></i>
                                                            </a>
                                                        @else
                                                            <a class="prod_alert_login" data-action = "giỏ hàng"
                                                                data-route="{{ route('theme.login_client') }}">
                                                                <i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw" style="font-size: 20px;"></i>
                                                            </a>
                                                        @endif
                                                    </td>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        @endif

                        <!-- Compare Table Area End -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--======================
                    Compare area End
                    ==========================-->
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // add to cart 
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

            // alert login
            $.each($('.prod_alert_login'), function() {
                $(this).on("click", function(e) {
                    e.preventDefault();
                    let url = $(this).data('route');
                    let name_action = $(this).data('action');
                    Swal.fire({
                        title: "<strong>Xin lưu ý !</strong>",
                        icon: "info",
                        html: `
                        Bạn cần <strong>Đăng nhập</strong> để thêm sản phẩm vào ` + name_action + ` !
                    `,
                        showCloseButton: true,
                        showCancelButton: true,
                        focusConfirm: false,
                        confirmButtonText: `
                        <a href="` + url + `">
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
        })
    </script>
@endsection
