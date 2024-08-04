@extends('theme.layouts.page')
@section('title','Giới thiệu')
@section('category-url', '')
@section('category-name', '')
@section('page-name', 'Giới thiệu')
@section('page-content')

<!-- ================
About Area Start
=====================-->
<div class="about-area mt-45 mb-35">
    <div class="container">
        <div class="row">
            <div class="offset-lg-2 col-lg-8 text-center">
                <div class="about-head">
                    <h3 class="mb-20">Chào mừng đến với Âm thanh Hiền Lương</h3>
                    <p>Âm thanh ánh sáng, karaoke, gia đình, âm thanh sân khấu, hội trường, nhà hàng, khu du lịch. Chất lượng tốt nhất, bảo hành theo quy định nhà sản xuất. Mở cửa 7h30 đến 21h các ngày trong tuần.</p>
                </div>
            </div>
        </div>
        {{-- <div class="row align-items-center">
            <div class="col-lg-6 mt-40 text-center">
                <div class="about-img">
                    <img src="assets/theme/images/about/about-1.webp" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6 mt-20 text-center">
                <div class="about-content">
                    <h3 class="last-title mb-20">What Do We Do?</h3>
                    <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima.Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima.</p>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6 mt-40 order-lg-2 text-center">
                <div class="about-img">
                    <img src="assets/theme/images/about/about-2.webp" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6 mt-20 text-center order-lg-1">
                <div class="about-content">
                    <h3 class="last-title mb-20">Our Mission</h3>
                    <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima.Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima.</p>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6 mt-40 text-center">
                <div class="about-img">
                    <img src="assets/theme/images/about/about-3.webp" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6 mt-20 text-center">
                <div class="about-content">
                    <h3 class="last-title mb-20">History Of Us</h3>
                    <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima.Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima.</p>
                </div>
            </div>
        </div>
        <div class="row mt-45">
            <!-- Testimonial Area Start -->
            <div class="offset-lg-2 col-lg-8">
                <div class="block-title">
                    <h6>What Client Say</h6>
                </div>
                <div class="testimonial-carousel slick-custom pt-20 nav-top">
                    <div class="single_testimonial text-center">
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feuga</p>
                        <img src="assets/theme/images/testimonial/testimonial-1.webp" alt="" class="img-fluid">
                        <span class="name">Kathy Young</span>
                        <span class="job_title">CEO of SunPark</span>
                        <div class="rating">
                            <span class="yellow"><i class="fa fa-star"></i></span>
                            <span class="yellow"><i class="fa fa-star"></i></span>
                            <span class="yellow"><i class="fa fa-star"></i></span>
                            <span class="yellow"><i class="fa fa-star"></i></span>
                            <span class="yellow"><i class="fa fa-star"></i></span>
                        </div>
                    </div>
                    <div class="single_testimonial text-center">
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feuga</p>
                        <img src="assets/theme/images/testimonial/testimonial-2.webp" alt="" class="img-fluid">
                        <span class="name">Alex Aya</span>
                        <span class="job_title">Art Director</span>
                        <div class="rating">
                            <span class="yellow"><i class="fa fa-star"></i></span>
                            <span class="yellow"><i class="fa fa-star"></i></span>
                            <span class="yellow"><i class="fa fa-star"></i></span>
                            <span class="yellow"><i class="fa fa-star"></i></span>
                            <span class="yellow"><i class="fa fa-star"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Testimonial Area End -->
        </div> --}}
        <div class="row mt-40 pb-15">
            <div class="col-lg-12 text-center">
                <!-- Brand Logo Area Start -->
                <div class="brand-logo" style="background: #408ED4; padding: 1rem 0;">
                    @foreach($brands as $brand)
                    <div class="single-brand" style="{{$brand->slug == 'enerlong' ? 'padding-right: 2rem;' : '' }}">
                        <a href="{{route('theme.brand')}}" style="height: 60px;" class="d-flex justify-content-center overflow-hidden">
                            <img src="{{asset('../storage/brands/'.$brand->slug.'/'.$brand->image)}}" alt="" class="img-fluid">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ================
About Area Start
=====================-->



@endsection