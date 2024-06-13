@extends('theme.layouts.page')
@section('title','Đăng ký tài khoản')
@section('category-url', '')
@section('category-name', '')
@section('page-name', 'Đăng ký tài khoản')
@section('page-content')

<!--======================
Register area Start
==========================-->
<div class="register-area login-area mt-25">
    <div class="container">
        <div class="row">
            <div class="offset-lg-3 col-lg-6">
                <div class="checkout_info mb-20">
                    <form class="form-row" action="#">
                        <h5 class="last-title mb-10 text-center">Tạo mới tài khoản</h5>
                        <div class="col-lg-12 text-left mb-20">
                            <p class="register-page"> Bạn đã có tài khoản? <a href="{{route('theme.login_client')}}">Đăng nhập ngay !</a></p>
                        </div>
                        <div class="form_group col-12">
                            <label class="form-label">Họ và tên <span>*</span></label>
                            <input class="input-form" type="text" name="name">
                        </div>
                        <div class="form_group col-12">
                            <label class="form-label">Email <span>*</span></label>
                            <input class="input-form" type="email" name="email">
                        </div>
                        <div class="form_group col-12">
                            <label class="form-label">Mật khẩu <span>*</span></label>
                            <input id="type_pass" class="input-form input-login" type="password" name="password">
                            <span id="show_pass" class="show-btn" style="cursor: pointer;">Hiển thị</span>
                        </div>
                        <div class="form_group col-12">
                            <label class="form-label">Nhập lại mật khẩu <span>*</span></label>
                            <input id="type_confirm" class="input-form input-login" type="password" name="confirm-password">
                            <span id="show_confirm" class="show-btn" style="cursor: pointer;">Hiển thị</span>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <div class="form-check">
                                    <div class="custom-checkbox">
                                        <input class="form-check-input" type="checkbox" id="agree-condition">
                                        <span class="checkmark"></span>
                                        <label class="form-check-label" for="agree-condition">Nhận ưu đãi từ đối tác của chúng tôi</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <div class="form-check">
                                    <div class="custom-checkbox">
                                        <input class="form-check-input" type="checkbox" id="agree-condition-2">
                                        <span class="checkmark"></span>
                                        <label class="form-check-label" for="agree-condition-2"> 
                                            Đăng ký nhận bản tin của chúng tôi <br> 
                                            Đăng ký nhận bản tin của chúng tôi ngay bây giờ và luôn cập nhật các bộ sưu tập mới, Lookbook mới nhất và các ưu đãi độc quyền..
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mt-20">
                            <button type="submit" class="btn-secondary">Đăng ký tài khoản</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--======================
Register area End
==========================-->
<script>
    $(document).ready(function() {

        $('#show_pass').on('click', function(e) {
            e.preventDefault();
            
            if($('#type_pass').attr('type') == 'password') {
                $('#type_pass').attr('type', 'text');
            }
            else {
                $('#type_pass').attr('type', 'password');
            }
        });

        $('#show_confirm').on('click', function(e) {
            e.preventDefault();
            
            if($('#type_confirm').attr('type') == 'password') {
                $('#type_confirm').attr('type', 'text');
            }
            else {
                $('#type_confirm').attr('type', 'password');
            }
        });
    });
</script>
@endsection