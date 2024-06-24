@extends('theme.layouts.page')
@section('title','Liên hệ')
@section('category-url', '')
@section('category-name', '')
@section('page-name', 'Liên hệ')
@section('page-content')

<!-- contact page map -->
<div class="contact-page-map mt-50">
    <!-- Google Map Start -->
    <div class="container">
        <div class="google-map">
            <iframe class="contact-map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14708.976053827828!2d104.986105!3d22.83046!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x36cc797c3b721c9d%3A0x99d50426b715efc0!2zw4JNIFRIQU5IIEhJ4buATiBMxq_GoE5H!5e0!3m2!1svi!2sus!4v1719209056823!5m2!1svi!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <!-- Google Map End -->
</div>
<!-- contact page map -->

<!--=====================
Contact Aera Start
=========================-->
<div class="contact-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mt-40">
                <div class="contact-address">
                    <div class="address-title">
                        <h3 class="last-title mb-20">Liên hệ với chúng tôi</h3>
                    </div>
                    <div class="contact-message">
                        <p>Âm thanh ánh sáng, karaoke, gia đình, âm thanh sân khấu, hội trường, nhà hàng, khu du lịch. Chất lượng tốt nhất, bảo hành theo quy định nhà sản xuất. Mở cửa 7h30 đến 21h các ngày trong tuần.</p>
                        <ul>
                            <li><i class="fa fa-fax"></i> Địa chỉ : Số 289 đường Nguyễn Thái Học, TP.Hà Giang</li>
                            <li><i class="fa fa-phone"></i> <a href="tel:+84913012736">0913 012 736</a></li>
                            <li><i class="fa fa-envelope-o"></i> <a href="mailto:hiendientuhg123@gmail.com">hiendientuhg123@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 contact-margin mb-20">
                <div class="contact-information">
                    <form class="form-row" action="" id="contact-form" enctype="multipart/form-data">
                        <div class="information-title">
                            <h3 class="last-title mb-20">Hãy cho chúng tôi biết dự án của bạn</h3>
                        </div>
                        <div class="form_group col-12">
                            <label class="form-label">Tên <span>*</span></label>
                            <input class="input-form" type="text" placeholder="Tên của bạn" id="name" name="name">
                        </div>
                        <div class="form_group col-12">
                            <label class="form-label">Email<span>*</span></label>
                            <input class="input-form" type="email" placeholder="Email" id="email" name="email">
                        </div>
                        <div class="form_group col-12">
                            <label class="form-label">Số điện thoại <span>*</span></label>
                            <input class="input-form" type="text" placeholder="Số điện thoại" id="phone" name="phone">
                        </div>
                        <div class="form_group mb-0 col-12">
                            <label class="form-label" for="message">Tin nhắn của bạn <span>*</span></label>
                            <textarea class="form-textarea" id="message" name="message"></textarea>
                        </div>
                        <div class="form_group mt-20 mb-0 col-12">
                            <button type="button" class="btn-secondary contactpage-btn">Gửi tin nhắn</button>
                        </div>
                    </form>
                    <p class="form-message"></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--=====================
Contact Aera End
=========================-->
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".contactpage-btn").click(function(e) {
            e.preventDefault();

            var name = $("#name").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var message = $("#message").val();

            $.ajax({
                type: 'POST',
                url: "{{ route('theme.contact_post') }}",
                data: {
                    "name":name, 
                    "email": email, 
                    "phone": phone,
                    "message": message
                },
                success: function() {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Chúng tôi đã tiếp nhận thông tin của bạn !",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                        location.reload();
                    });
                    
                },
                error: function() {
                    alert('Thông tin chưa được gửi đi !');
                }
            })
        });
    });
</script>
@endsection