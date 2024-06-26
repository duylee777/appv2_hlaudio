@extends('theme.layouts.page')
@section('title','Đăng nhập')
@section('category-url', '')
@section('category-name', '')
@section('page-name', 'Đăng nhập')
@section('page-content')

<style>
    .form_group .login-register {
        width: max-content;
    }
</style>
<!--======================
login area Start
==========================-->
<div class="login-area mt-25">
    <div class="container">
        <div class="row">
            <div class="offset-lg-3 col-lg-6">
                <div class="checkout_info mb-20">
                    <form class="form-row" action="{{ route('login') }}" method="POST">
                        @csrf
                        <h1 class="last-title mb-30 text-center">Đăng nhập vào tài khoản của bạn</h1>
                        <div class="form_group col-12">
                            <label class="form-label">Email <span>*</span></label>
                            <input class="input-form" type="text" name="email">
                        </div>
                        <div class="form_group col-12 position-relative">
                            <label class="form-label">Mật khẩu <span>*</span></label>
                            <input id="type_pass" class="input-form input-login" type="password" name="password">
                            <span class="show-btn" style="cursor: pointer;">Hiển thị</span>
                        </div>
                        <div class="form_group group_3 col-lg-3">
                            <button class="login-register" type="submit">Đăng nhập</button>
                        </div>
                        {{-- <div class="form_group group_3 col-lg-9">
                            <label for="remember_box">
                                <input id="remember_box" type="checkbox">
                                <span> Ghi nhớ tôi </span>
                            </label>
                        </div> --}}
                        <div class="col-lg-12 text-left">
                            <a class="lost-password" href="{{ route('password.request') }}">Bạn quên mật khẩu ?</a>
                        </div>
                        <div class="col-lg-12 text-left">
                            <p class="register-page"> Chưa có tài khoản? <a href="{{ route('theme.register_client')}}">Tạo mới tài khoản</a>.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--======================
login area End
==========================-->
<script>
    $(document).ready(function() {
        $('.show-btn').on('click', function(e) {
            e.preventDefault();
            
            if($('#type_pass').attr('type') == 'password') {
                $('#type_pass').attr('type', 'text');
            }
            else {
                $('#type_pass').attr('type', 'password');
            }
        });
    });
</script>
@endsection