@extends('theme.layouts.page')
@section('title','Thanh toán')
@section('category-url', '')
@section('category-name', '')
@section('page-name', 'Thanh toán')
@section('page-content')

<!--======================
Checkout area Start
==========================-->
<div class="checkout-area mt-50">
    <div class="container">
        <!--
        <div class="row">
            <div class="col-12">
                <div class="user-actions">
                    <h5>
                        <i class="fa fa-file-o"></i>
                        Returning customer?
                        <a href="#" data-bs-toggle="collapse" data-bs-target="#checkout-login">Click here to login</a>
                    </h5>
                    <div id="checkout-login" class="collapse">
                        <div class="checkout_info">
                            <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing &amp; Shipping section.</p>
                            <form class="form-row" action="#">
                                <div class="form_group col-12 col-md-6">
                                    <label class="form-label">Username or email <span>*</span></label>
                                    <input class="input-form" type="text">
                                </div>
                                <div class="form_group col-12 col-md-6">
                                    <label class="form-label">Password <span>*</span></label>
                                    <input class="input-form" type="text">
                                </div>
                                <div class="form_group group_3 col-lg-1">
                                    <button class="login-register" type="submit">Login</button>
                                </div>
                                <div class="form_group group_3 col-lg-9">
                                    <label for="remember_box">
                                        <input id="remember_box" type="checkbox">
                                        <span> Remember me </span>
                                    </label>
                                </div>
                                <div class="col-lg-12 text-left">
                                    <a class="lost-password" href="#">Lost your password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="user-actions">
                    <h5>
                        <i class="fa fa-file-o"></i>
                        Returning customer?
                        <a href="#" data-bs-toggle="collapse" data-bs-target="#checkout_coupon">Click here to enter your code</a>
                    </h5>
                    <div id="checkout_coupon" class="collapse">
                        <div class="coupon-code">
                            <div class="coupon-inner">
                                <input placeholder="Coupon code" type="text">
                                <button type="submit">Apply coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        -->
        <form class="row">
            <div class="col-lg-6 col-md-6">
                <div class="form-row row">
                    <div class="col-lg-12">
                        <h5 class="form-head">Thông tin người nhận hàng</h5>
                    </div>
                    <div class="form_group col-12">
                        <label class="form-label">Tên người nhận <span>*</span></label>
                        <input class="input-form" type="text" name="delivery_name" id="delivery_name" placeholder="vd: Nguyễn Văn An">
                        <span class="err err-name" style="color: red; font-size: 0.875rem;">Tên người nhận không được để trống !</span>
                    </div>
                    <div class="form_group col-12 col-md-6">
                        <label class="form-label">Số điện thoại <span>*</span></label>
                        <input class="input-form" type="text" name="delivery_phone" id="delivery_phone" placeholder="vd: 0999888777">
                        <span class="err err-phone" style="color: red; font-size: 0.875rem;">Số điện thoại không được để trống, tối đa 10 chữ số, không bao gồm chữ và kí tự đặc biệt</span>
                    </div>
                    <div class="form_group col-12 col-md-6">
                        <label class="form-label">Email <span>*</span></label>
                        <input class="input-form" type="text" name="delivery_email" id="delivery_email" placeholder="vd: khachhang@gmail.com">
                        <span class="err err-email" style="color: red; font-size: 0.875rem;">Email không được để trống và phải đúng định dạng (phải có @)</span>
                    </div>
                    <div class="form_group col-12">
                        <label class="form-label">Địa chỉ <span>*</span></label>
                        <input class="input-form" type="text" name="delivery_address" id="delivery_address" placeholder="vd: Số nhà X, đường Y, phường Z, Hà Nội">
                        <span class="err err-address" style="color: red; font-size: 0.875rem;">Địa chỉ nhận hàng không được để trống !</span>
                    </div>
                </div>
                <div class="form-row mt-20 mb-15">
                    <div class="form_group mb-0 col-12">
                        <label class="form-label" for="order-note">Chú thích</label>
                        <textarea class="form-textarea" name="note" id="order_note" placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ: ghi chú đặc biệt để giao hàng."></textarea>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-row">
                    <div class="col-lg-12">
                        <h5 class="form-head rs-padding">Đơn hàng của bạn</h5>
                    </div>
                    <div class="col-lg-12">
                        <div class="order_table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Tổng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(auth()->check())
                                        @php
                                            $cart = App\Models\Cart::where('user_id', auth()->user()->id)->first();
                                            $items = App\Models\CartItem::where('session_id', $cart->id)->get();
                                        @endphp
                                        @foreach($items as $item)
                                            @php
                                                $product = App\Models\Product::where('id', $item->product_id)->first();
                                                $images = json_decode($product->image);
                                            @endphp
                                            <tr>
                                                <span class="product-info" data-id="{{ $product->id }}" data-quantity="{{ $item->quantity }}" hidden></span>
                                                <td>{{ $product->name }}</td>
                                                <td>{{$item->quantity}}</td>  
                                                <td>
                                                    @php
                                                        $count = (double)($item->quantity) * $product->odd_price;
                                                    @endphp
                                                    {{ Illuminate\Support\Number::currency($count, in: 'VND', locale: 'vi') }}
                                                </td>
                                            </tr>   
                                        @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Tổng sản phẩm</th>
                                        <td></td>
                                        <td>{{ Illuminate\Support\Number::currency($cart->total_price, in: 'VND', locale: 'vi') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phí vận chuyển</th>
                                        <td></td>
                                        <td>{{ Illuminate\Support\Number::currency(50000, in: 'VND', locale: 'vi') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Thuế(10%)</th>
                                        <td></td>
                                        <td>
                                            @php
                                                $tax = $cart->total_price * 0.1;
                                            @endphp
                                            {{ Illuminate\Support\Number::currency($tax, in: 'VND', locale: 'vi') }}
                                        </td>
                                    </tr>
                                    <tr class="order_total">
                                        <th colspan="2">Tổng hóa đơn</th>
                                        <td>
                                            @php
                                                $total = $cart->total_price + $tax + 50000;
                                            @endphp
                                            <strong>
                                               <input type="number" id="total_price" name="total_price" value="{{$total}}" hidden>
                                               {{ Illuminate\Support\Number::currency($total, in: 'VND', locale: 'vi') }}
                                            </strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- <div class="form-row">
                    <div class="form-group col-12">
                        <div class="form-check">
                            <div class="custom-checkbox">
                                <input class="form-check-input" type="checkbox" id="agree-condition">
                                <span class="checkmark"></span>
                                <label class="form-check-label" for="agree-condition"> Tôi đồng ý với <a href="#">các điều khoản dịch vụ</a> và sẽ tuân thủ chúng vô điều kiện.</label>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="form-row justify-content-end mt-20 mb-20">
                    <button id="order_btn" type="button" class="btn-secondary" data-route="{{ route('theme.checkout_post') }}">Đặt hàng</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--======================
Checkout area End
==========================-->
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.fn.extend(
        {
            hideAllErr: function()
            {
                $('.err').each(function() {
                    $(this).hide();
                });
            },

            hideErr: function (classErr) 
            {
                $(this).on('click', function() {
                    $(classErr).hide();
                });
            },

            showErr: function()
            {
                $(this).show();
            },

            hideBorder: function (elementId) 
            {
                $(this).on('click',':not('+elementId+')', function() {
                    if(!$(elementId).val()) {
                        $(elementId).css('border', '1px solid #e4e3e3');
                    }
                })
            },

            showBorder: function()
            {
                $(this).css('border', '3px solid #408ed4');
            }
        });

        //order form
        $(this).hideAllErr();

        $('#delivery_name').hideErr('.err-name');
        $('#delivery_phone').hideErr('.err-phone');
        $('#delivery_email').hideErr('.err-email');
        $('#delivery_address').hideErr('.err-delivery_address');

        $(this).hideBorder('#delivery_name');
        $(this).hideBorder('#delivery_phone');
        $(this).hideBorder('#delivery_email');
        $(this).hideBorder('#delivery_address');
        $(this).hideBorder('#order_note');

        let items = [];
        $('.product-info').each(function() {
            items.push({product_id: $(this).data('id'), quantity: $(this).data('quantity')})
        });
        console.log(items);

        $('#order_btn').on('click', function(e) {
            e.preventDefault();

            let delivery_name;
            let delivery_phone;
            let delivery_email;
            let delivery_address;
            let order_note;

            if(!$('#delivery_name').val()) {
                $('.err-name').showErr();
            }
            else {
                $('#delivery_name').showBorder();
                delivery_name = $('#delivery_name').val();
            }

            if(!$('#delivery_phone').val() || /^[0-9- ]*$/.test($('#delivery_phone').val()) == false || $('#delivery_phone').val().length != 10 ) {
                $('.err-phone').showErr();
            }
            else {
                $('#delivery_phone').showBorder();
                delivery_phone = $('#delivery_phone').val();
            }

            if(!$('#delivery_email').val() || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test($('#delivery_email').val()) == false) {
                $('.err-email').showErr();
            }
            else {
                $('#delivery_email').showBorder();
                delivery_email = $('#delivery_email').val();
            }

            if(!$('#delivery_address').val()) {
                $('.err-address').showErr();
            }
            else {
                $('#delivery_address').showBorder();
                delivery_address = $('#delivery_address').val();
            }

            if($('#order_note').val()) {
                $('#order_note').showBorder();
                order_note = $('#order_note').val()
            }
            
            $.ajax({
                type: 'POST',
                url: $(this).data('route'),
                data: {
                    delivery_name: delivery_name,
                    delivery_phone: delivery_phone,
                    delivery_email: delivery_email,
                    delivery_address: delivery_address,
                    order_note: order_note,
                    total_price: $('#total_price').val(),
                    items: items
                },
                success: function(results) {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: results,
                        text: "Bạn sẽ được đưa về trang chủ",
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    
                    // setTimeout(function(){
                    //     location.reload();
                    // },2000);
                },
                error: function(results) {
                    Swal.fire({
                        title: results.responseText,
                        icon: "error",
                    });
                },
            },2000).then(function(){
                window.location.href = '/'
            });

        });
        
    });
</script>
@endsection

