@extends('theme.layouts.page')
@section('title','Bài viết chi tiết')
@section('category-url', route('theme.blog'))
@section('category-name', 'Bài viết')
@section('page-name', $post->title)
@section('page-content')

<!--======================
Blog Details area Start
==========================-->
<div class="blog-details-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-lg-1">
                <!-- Single Blog Start -->
                <div class="single-blog mt-50">
                    <div class="blog-image mb-30">
                        <a class="text-center" href="{{ route('theme.blog_detail', $post->slug) }}">
                            <img class="w-50" src="{{asset('../storage/posts/'.$post->id.'/'.$post->cover_image)}}" alt="" class="img-fluid">
                        </a>
                    </div>
                    <div class="blog-content">
                        <h5 class="last-title mb-20">{{ $post->title }}</h5>
                        <ul class="meta">
                            <li><i class="fa fa-calendar"></i>{{ $post->updated_at->format('Y/m/d') }}</li>
                            <li><i class="fa fa-user-circle"></i> Tác giả : Quản trị viên</li>
                        </ul>
                        <div class="desc">
                            <p>
                                {!! $post->detail !!}
                            </p>
                        </div>
                        <div class="desc-content">
                            <div class="post_meta">
                                <span><strong>Thẻ/Nhãn:-</strong></span>
                                @foreach($tagByPosts as $tag)
                                    <span><a href="{{ route('theme.blog_by_tag', $tag->slug)}}">{{ $tag->name }}, </a></span>
                                @endforeach
                            </div>
                            {{-- <div class="social_sharing d-flex">
                                <h5>share this post:</h5>
                                <ul>
                                    <li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#" title="google+"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" title="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <!-- Single Blog End -->
                <!-- Related post Start -->
                <div class="related-post mb-30">
                    <h4 class="last-title mb-20">Bài viết liên quan</h4>
                    <div class="row">
                        @foreach($recentPosts as $post)
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <!-- Single Blog Start -->
                                <div class="single-blog">
                                    <div class="blog-image mb-20">
                                        <a href="{{ route('theme.blog_detail', $post->slug)}}">
                                            <img src="{{asset('../storage/posts/'.$post->id.'/'.$post->cover_image)}}" alt="" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <h5 class="title"><a href="{{ route('theme.blog_detail', $post->slug)}}">{{ $post->title}}</a></h5>
                                        <ul class="meta">
                                            <li><i class="fa fa-calendar"></i>{{ $post->updated_at->format('Y/m/d') }}</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Single Blog End -->
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Releted Post End -->
                <!-- Comment Box Start -->
                <div class="comments_box">
                    <h3>3 Comments </h3>
                    <div class="comment_list">
                        <div class="comment_thumb">
                            <img src="assets/theme/images/blog/comment/comment-3.webp" alt="">
                        </div>
                        <div class="comment_content">
                            <div class="comment_meta">
                                <h5><a href="#">Admin</a></h5>
                                <span>October 16, 2018 at 1:38 am</span>
                            </div>
                            <p>But I must explain to you how all this mistaken idea of denouncing pleasure</p>
                            <div class="comment_reply">
                                <a href="#">Reply</a>
                            </div>
                        </div>

                    </div>
                    <div class="comment_list list_two">
                        <div class="comment_thumb">
                            <img src="assets/theme/images/blog/comment/comment-3.webp" alt="">
                        </div>
                        <div class="comment_content">
                            <div class="comment_meta">
                                <h5><a href="#">Demo</a></h5>
                                <span>October 16, 2018 at 1:38 am</span>
                            </div>
                            <p>Quisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur</p>
                            <div class="comment_reply">
                                <a href="#">Reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="comment_list">
                        <div class="comment_thumb">
                            <img src="assets/theme/images/blog/comment/comment-3.webp" alt="">
                        </div>
                        <div class="comment_content">
                            <div class="comment_meta">
                                <h5><a href="#">Admin</a></h5>
                                <span>October 16, 2018 at 1:38 am</span>
                            </div>
                            <p>Quisque orci nibh, porta vitae sagittis sit amet, vehicula vel mauris. Aenean at</p>
                            <div class="comment_reply">
                                <a href="#">Reply</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Comment Box End -->
                <!-- Comments Form start -->
                <div class="comments_form mb-20">
                    <h3>Để lại một câu trả lời </h3>
                    <p>Địa chỉ email của bạn sẽ không được công bố. Các trường bắt buộc được đánh dấu *</p>
                    <form action="#">
                        <div class="row">
                            <div class="col-12">
                                <label for="review_comment">Bình luận </label>
                                <textarea name="comment" id="review_comment" spellcheck="false" data-gramm="false"></textarea>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label for="author">Tên</label>
                                <input id="author" type="text">

                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label for="email">Email </label>
                                <input id="email" type="text">
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label for="website">Website </label>
                                <input id="website" type="text">
                            </div>
                        </div>
                        <button class="button" type="submit">Đăng bình luận</button>
                    </form>
                </div>
                <!-- Comments Form End -->
            </div>
            <div class="col-lg-3 order-lg-2">
                <div class="widget-sidebar margin-blog">
                    {{-- <div class="widget-search">
                        <div class="sidebar-title">
                            <h4 class="title-shop">Search</h4>
                        </div>
                        <div class="category-search">
                            <input class="search-hear" placeholder="Search......" type="text">
                            <a class="srch-btn" href="#"><i class="zmdi zmdi-search"></i></a>
                        </div>
                    </div> --}}
                    <div class="widget-thumb mt-30">
                        <div class="sidebar-title">
                            <h4 class="title-shop">Bài đăng gần đây</h4>
                        </div>
                        <div class="thumb-wrapper">
                            @if(count($recentPosts) == 0)
                                <div class="single-blog-thumb d-flex"></div>
                            @else
                                @foreach($recentPosts as $recentPost)
                                    <!-- Single Blog Thumb Start -->
                                    <div class="single-blog-thumb d-flex">
                                        <div class="blog-thumb">
                                            <a href="{{ route('theme.blog_detail', $recentPost->slug) }}">
                                                <img src="{{asset('../storage/posts/'.$recentPost->id.'/'.$recentPost->cover_image)}}" alt="{{ $recentPost->slug }}" width="100" height="66">
                                            </a>
                                        </div>
                                        <div class="blog-info">
                                            <h5 class="info-title"><a href="{{ route('theme.blog_detail', $recentPost->slug) }}">{{ $recentPost->title }}</a></h5>
                                            <span>{{ $recentPost->updated_at->format('Y/m/d') }}</span>
                                        </div>
                                    </div>
                                    <!-- Single Blog Thumb End -->
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="widget-tag mt-30">
                        <div class="sidebar-title">
                            <h4 class="title-shop">Thẻ/Nhãn</h4>
                        </div>
                        <div class="tag-widget">
                            @if(count($tags) != 0)
                                <ul>
                                    @foreach($tags as $tag)
                                        <li><a href="{{ route('theme.blog_by_tag', $tag->slug) }}">{{ $tag->name }}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                    <div class="banner-area">
                        <div class="single-banner mt-30 mb-20 text-center">
                            <a href="#"><img src="assets/theme/images/banner/shop-banner-2.webp" alt="" class="img-fluid"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--======================
Blog Details area End
==========================-->

@endsection