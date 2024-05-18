@extends('theme.layouts.page')
@section('title','Giỏ hàng')
@section('category-url', '')
@section('category-name', '')
@section('page-name', 'Giỏ hàng')
@section('page-content')

<!--======================
Shopping Cart area Start
==========================-->
<div class="cart-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="#" class="cart-form">
                    <!-- Cart Title Start -->
                    <div class="cart-title">
                        <h5 class="last-title mt-50 mb-20">Giỏ hàng</h5>
                    </div>
                    <!-- Cart Title End -->
                    <!-- Cart Table Area Start -->
                    <div class="table-desc">
                        <div class="cart-page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-image">Hình ảnh</th>
                                        <th class="product-name">Sản phẩm</th>
                                        <th class="product-price">Giá tiền</th>
                                        <th class="product-quantity">Số lượng</th>
                                        <th class="product-total">Tổng tiền</th>
                                        <th class="product-remove">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(auth()->check())
                                        @php
                                            $cart = App\Models\Cart::where('user_id', auth()->user()->id)->first();
                                            $items = App\Models\CartItem::where('session_id', $cart->id)->get();
                                        @endphp
                                        @foreach($items as $item)
                                        <tr>
                                            @php
                                                $product = App\Models\Product::where('id', $item->product_id)->first();
                                                $images = json_decode($product->image);
                                            @endphp
                                            <td class="product-image">
                                                <a href="{{route('theme.product_detail', $product->slug)}}">
                                                    <img src="{{asset('../storage/products/'.$product->code.'/image/'.$images[0])}}" alt="{{ $product->name }}" height="100" width="100">
                                                </a>
                                            </td>
                                            <td class="product-name">
                                                <a href="{{route('theme.product_detail', $product->slug)}}">{{ $product->name }}</a>
                                            </td>
                                            <td class="product-price">
                                                {{ $product->odd_price }}
                                            </td>
                                            <td class="product-quantity">
                                                <div class="input-group">
                                                    <input id="prod_{{$product->id}}" min="1" max="100" value="{{$item->quantity}}" type="number" class="item_quantity form-control">
                                                    <div class="input-group-append">
                                                        <button data-id="{{$product->id}}" class="btn btn-success update_quantity_btn" type="button" data-route="{{ route('theme.update_cart_item', $product->id)}}">
                                                            <i class="fa fa-pencil"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="product-total">
                                                @php
                                                    $count = (double)($item->quantity) * $product->odd_price;
                                                @endphp
                                                {{ $count }}
                                            </td>
                                            <td class="product-remove">
                                                <a class="remove_item_btn" data-route="{{ route('theme.remove_item', $product->id) }}">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @if(count($items) == 0)
                                            <tr>
                                                <td>
                                                    <span id="check_cart" value={{count($items)}}>(Không có sản phẩm trong giỏ hàng)</span>
                                                </td>
                                            </tr>
                                        @endif
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="p-2 text-end">
                            <button type="button" class="inline-block btn btn-danger clear_cart_btn" data-route="{{ route('theme.clear_cart')}}">
                                Xóa giỏ hàng
                            </button>
                        </div>
                    </div>
                    <!-- Cart Table Area End -->
                    <!-- Coupon Area Start -->
                    <div class="coupon-area">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="coupon-code left">
                                    <h3>Phiếu mua hàng</h3>
                                    <div class="coupon-inner">
                                        <p>Nhập mã phiếu giảm giá của bạn nếu bạn có.</p>
                                        <input placeholder="Coupon code" type="text">
                                        <button type="submit">Áp dụng</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="coupon-code right">
                                    <h3>Tổng số giỏ hàng</h3>
                                    <div class="coupon-inner">
                                        <div class="cart-subtotal">
                                            <p>Subtotal</p>
                                            <p class="cart-amount">£215.00</p>
                                        </div>
                                        <div class="cart-subtotal ">
                                            <p>Shipping</p>
                                            <p class="cart-amount"><span>Flat Rate:</span> £255.00</p>
                                        </div>
                                        <a href="#">Tính toán vận chuyển</a>

                                        <div class="cart-subtotal">
                                            <p>Total</p>
                                            <p class="cart-amount">£215.00</p>
                                        </div>
                                        <div class="checkout-btn">
                                            <a href="#">Proceed to Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Coupon Area End -->
                </form>
            </div>
        </div>
    </div>
</div>
<!--======================
Shopping Cart area End
==========================-->
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if($('#check_cart').val() == 0) {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Giỏ hàng của bạn rỗng !",
                html: `
                    <span>Bạn sẽ được chuyển về trang chủ !</span>
                `,
                showConfirmButton: false,
                timer: 2000,
            });

            setTimeout(function(){
                window.location.href = "/";
            },2500);
        }
        

        $.each($('.remove_item_btn'), function() {
            $(this).on("click", function(e) {
                e.preventDefault();

                Swal.fire({
                title: "Bạn có chắc chắn muốn xóa sản phẩm khỏi giỏ hàng ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Xóa sản phẩm",
                cancelButtonText: "Quay lại",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
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

        $.each($('.clear_cart_btn'), function() {
            $(this).on("click", function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: $(this).data('route'),
                    success: function(results) {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Đã xóa",
                            html: `
                                <span>Bạn sẽ được chuyển về trang chủ !</span>
                            `,
                            showConfirmButton: false,
                            timer: 2000,
                        });

                        setTimeout(function(){
                            window.location.href = "/";
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

        $.each($('.update_quantity_btn'), function() {
            $(this).on("click", function(e) {
                e.preventDefault();

                let quantity = $('#prod_'+$(this).data('id')).val();
                $.ajax({
                    type: 'POST',
                    url: $(this).data('route'),
                    data: {
                        quantity: quantity,
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