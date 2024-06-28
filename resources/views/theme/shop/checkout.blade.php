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
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="form-row row">
                    <div class="col-lg-12">
                        <h5 class="form-head">Thông tin người nhận hàng</h5>
                    </div>
                    <div class="form_group col-12">
                        <label class="form-label">Tên người nhận <span>*</span></label>
                        <input class="input-form" type="text" name="delivery_name">
                    </div>
                    <div class="form_group col-12 col-md-6">
                        <label class="form-label">Số điện thoại <span>*</span></label>
                        <input class="input-form" type="text" name="delivery_phone">
                    </div>
                    <div class="form_group col-12 col-md-6">
                        <label class="form-label">Email <span>*</span></label>
                        <input class="input-form" type="text"  name="delivery_email">
                    </div>
                    <div class="form_group col-12">
                        <label class="form-label">Địa chỉ <span>*</span></label>
                        <input class="input-form" type="text" name="delivery_address">
                    </div>
                </div>
                <div class="form-row mt-20 mb-15">
                    <div class="form_group mb-0 col-12">
                        <label class="form-label" for="order-note">Chú thích <span>*</span></label>
                        <textarea class="form-textarea" name="note" id="order-note" placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ: ghi chú đặc biệt để giao hàng."></textarea>
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
                                                <input name="product-id" value="{{ $product->id }}" hidden multiple></input>
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
                                               <input type="number" name="total_price" value="{{$total}}" hidden>
                                               {{ Illuminate\Support\Number::currency($total, in: 'VND', locale: 'vi') }}
                                            </strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12">
                        <div class="form-check">
                            <div class="custom-checkbox">
                                <input class="form-check-input" type="checkbox" id="agree-condition">
                                <span class="checkmark"></span>
                                <label class="form-check-label" for="agree-condition"> Tôi đồng ý với <a href="#">các điều khoản dịch vụ</a> và sẽ tuân thủ chúng vô điều kiện.</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row justify-content-end mt-20 mb-20">
                    <button id="order_btn" type="button" class="btn-secondary">Đặt hàng</button>
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

        $('#order_btn').on('click', function(e) {
            e.preventDefault();
            alert('hello !');
        });
        
    });
</script>
@endsection

