<!--===================
     footer area start 
    ===================-->
    <footer class="mt-30">
        <!-- Newslatter area start -->
        <div class="newsletter-group">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-12">
                        <div class="newsletter-inner d-flex align-items-center">
                            <i class="fa fa-envelope-open-o"></i>
                            <div class="newsletter-title">
                                <h1 class="sign-title">Đăng ký nhận bản tin của chúng tôi</h1>
                                <p>Nhận thông tin cập nhật qua email về cửa hàng mới nhất của chúng tôi và các ưu đãi đặc biệt.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="newsletter-box">
                            <form id="mc-form" class="mc-form">
                                <input id="emailSub" name="emailSub" class="email-box" placeholder="nhập địa chỉ email của bạn">
                                <button id="mc-submit" class="newsletter-btn consultations-btn" type="submit">Đăng ký</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newslatter area End -->
        <!-- Footer Top Start -->
        <div class="footer-top mt-50 mb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="footer-single-widget">
                            <div class="footer-logo mb-40">
                                <a href="{{ route('theme.home') }}">
                                    <img src="/assets/theme/images/logo/hienluongaudio.png" alt="Thương hiệu Âm thanh Hiền Lương" style="height: 3.5rem;">
                                </a>
                            </div>
                            <div class="widget-body">
                                <p>Âm thanh ánh sáng, karaoke, gia đình, âm thanh sân khấu, hội trường, nhà hàng, khu du lịch. Chất lượng tốt nhất, bảo hành theo quy định nhà sản xuất. Mở cửa 7h30 đến 21h các ngày trong tuần.</p>
                                <div class="widget-address mt-30 mb-20">
                                    <p><strong>Địa chỉ:</strong> Số 289 đường Nguyễn Thái Học, TP.Hà Giang</p>
                                    <p><strong>Số điện thoại:</strong> 0913012736</p>
                                    <p><strong>Email:</strong> hiendientuhg123@gmail.com</p>
                                </div>
                            </div>
                            <div class="footer_social">
                                <ul class="d-flex">
                                    <li><a class="facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a class="twitter" href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a class="youtube" href="#"><i class="zmdi zmdi-youtube"></i></a></li>
                                    <li><a class="google" href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                                    <li><a class="linkedin" href="#"><i class="zmdi zmdi-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-6">
                                <div class="widgets_container">
                                    <h6>Về chúng tôi</h6>
                                    <div class="footer_menu">
                                        <ul>
                                            <li><a href="{{ route('theme.about') }}">Giới thiệu</a></li>
                                            <li><a href="{{ route('theme.blog') }}">Bài viết</a></li>
                                            <li><a href="{{ route('theme.project') }}">Dự án</a></li>
                                            <li><a href="{{ route('theme.contact') }}">Liên hệ</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-6">
                                <div class="widgets_container">
                                    <h6>Tài khoản</h6>
                                    <div class="footer_menu">
                                        <ul>
                                            <li><a href="{{ route('theme.account') }}">Tài khoản của tôi</a></li>
                                            <li><a href="{{ route('theme.wishlist') }}">Danh sách yêu thích</a></li>
                                            {{-- <li><a href="#">Bản tin</a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-6">
                                <div class="widgets_container">
                                    <h6>Chính sách</h6>
                                    <div class="footer_menu">
                                        <ul>
                                            <li><a href="/chinh-sach-ban-hang">Chính sách bán hàng</a></li>
                                            <li><a href="/chinh-sach-giao-hang">Chính sách giao hàng</a></li>
                                            <li><a href="/chinh-sach-thanh-toan">Chính sách thanh toán</a></li>
                                            <li><a href="/chinh-sach-bao-hanh-va-doi-tra">Chính sách bảo hành và đổi trả</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="widget-box mt-30">
                                    <div class="widget-single-box">
                                        <p style="min-width: max-content;"><strong>Sản phẩm:</strong></p>
                                        <ul style="display: flex; flex-wrap:wrap;">
                                            @foreach(App\Models\Category::get() as $category)
                                                @if(!empty($category->parent) && $category->parent->slug == 'san-pham')
                                                    <li>
                                                        <a href="{{ route('theme.category', $category->slug) }}">{{$category->name}}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="widget-single-box">
                                        <p style="min-width: max-content;"><strong>Thương hiệu:</strong></p>
                                        <ul style="display: flex; flex-wrap:wrap;">
                                            @foreach(App\Models\Brand::get() as $brand)
                                                <li>
                                                    <a href="{{ route('theme.brand', $brand->slug) }}">{{$brand->name}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Top End -->
        <!-- Footer Bottom Start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-12 col-12">
                        <div class="footer-bottom-content">
                            <div class="footer-copyright">
                                <p>© 2024 Copyright <strong>HLAUDIO</strong> Made With <i class="fa fa-heart text-danger"></i> by <a href="#"> <strong>Duy Le</strong></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-12">
                        <div class="payment">
                            <a href="#">
                                <img src="/assets/theme/images/payment/footerend.webp" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->
    </footer>
    <!--===================
     footer area end 
    ===================-->


    <!-- Scroll To Top Start -->
    <a class="scroll-to-top" href="">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Scroll To Top End -->

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            $("#mc-form").on ("submit", function(e) {
                e.preventDefault();
    
                let email = $.trim($("#emailSub").val());
                let checkDone = $('.mailchimp-success.text-success').is(':empty');
                console.log(checkDone);
                if (email.includes('@') && email.includes('.') && !email.includes(' ')) {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('theme.consultations') }}",
                        data: {
                            "email": email, 
                        },
                        success: function() {
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "Đã đăng ký nhận bản tin !",
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function () {
                                $("#emailSub").val('');
                            });
                            
                        },
                        error: function() {
                            alert('Thông tin chưa được gửi đi !');
                        }
                    });
                } else{
                    alert('Định dạng mail chưa đúng!');
                }
            });
        });
    </script>

    