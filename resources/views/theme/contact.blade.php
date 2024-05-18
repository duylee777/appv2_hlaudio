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
            <iframe class="contact-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.9772263135424!2d-122.4022085487543!3d37.76713217966151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80857def0232b13f%3A0x9026f3d4985937e9!2sCalifornia%20College%20of%20the%20Arts%20(CCA)!5e0!3m2!1sen!2sbd!4v1586673392151!5m2!1sen!2sbd" aria-hidden="false" tabindex="0"></iframe>
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
                        <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas human. qui sequitur mutationem consuetudium lectorum. Mirum est notare quam</p>
                        <ul>
                            <li><i class="fa fa-fax"></i> Address : No 40 Baria Sreet 133/2 NewYork City</li>
                            <li><i class="fa fa-phone"></i> <a href="#">Info@example.com</a></li>
                            <li><i class="fa fa-envelope-o"></i><a href="#">(800) 123 456 789</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 contact-margin mb-20">
                <div class="contact-information">
                    <form class="form-row" action="assets/php/circleshop-mail.php" id="contact-form" method="post">
                        <div class="information-title">
                            <h3 class="last-title mb-20">Hãy cho chúng tôi biết dự án của bạn</h3>
                        </div>
                        <div class="form_group col-12">
                            <label class="form-label">Tên <span>*</span></label>
                            <input class="input-form" type="text" placeholder="Tên của bạn" name="name">
                        </div>
                        <div class="form_group col-12">
                            <label class="form-label">Email<span>*</span></label>
                            <input class="input-form" type="email" placeholder="Email" name="email">
                        </div>
                        <div class="form_group col-12">
                            <label class="form-label">Số điện thoại <span>*</span></label>
                            <input class="input-form" type="text" placeholder="Số điện thoại" name="phone">
                        </div>
                        <div class="form_group mb-0 col-12">
                            <label class="form-label" for="order-note">Tin nhắn của bạn <span>*</span></label>
                            <textarea class="form-textarea" id="order-note" name="message"></textarea>
                        </div>
                        <div class="form_group mt-20 mb-0 col-12">
                            <button type="submit" class="btn-secondary">Gửi tin nhắn</button>
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

@endsection