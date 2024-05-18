@extends('theme.layouts.page')
@section('title','Bài viết')
@section('category-url', '')
@section('category-name', '')
@section('page-name', 'Bài viết')
@section('page-content')
<!--======================
Blog area Start
==========================-->
<div class="blog-list-view blog-list-sidebar-view">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-lg-1">
                <div class="row mt-20">
                    @if(count($posts) == 0)
                    <div class="col-12">
                        <div class="single-blog mt-30">
                            <span>(Chưa có bài viết)</span>
                        </div>
                    </div>
                    @else
                        @foreach($posts as $post)
                        <div class="col-12">
                            <!-- Single Blog Start -->
                            <div class="single-blog mt-30">
                                <div class="blog-image">
                                    <a href="{{ route('theme.blog_detail', $post->slug) }}">
                                        <img src="{{asset('../storage/posts/'.$post->id.'/'.$post->cover_image)}}" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <ul class="meta">
                                        <li><i class="fa fa-calendar"></i>{{ $post->updated_at->format('Y/m/d') }}</li>
                                        <li><i class="fa fa-user-circle"></i> Tác giả : Quản trị viên </li>
                                        {{-- <li><i class="fa fa-folder-open"></i><a href="#"> Fashion</a></li> --}}
                                    </ul>
                                    <h5 class="title"><a href="{{ route('theme.blog_detail', $post->slug) }}">{{ $post->title }}</a></h5>
                                    <div class="desc">
                                        <p>
                                            {!! $post->description !!}
                                        </p>
                                    </div>
                                    <a href="{{ route('theme.blog_detail', $post->slug) }}" class="link">Đọc thêm</a>
                                </div>
                            </div>
                            <!-- Single Blog End -->
                        </div>
                        @endforeach
                    @endif
                </div>
                <!-- Blog Toolbar Start -->
                <div class="toolbar-shop toolbar-bottom">
                    {{ $posts->links('vendor.pagination.client') }}
                </div>
                <!-- Blog Toolbar End -->
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
                    {{-- <div class="widget_list widget_categories mt-30">
                        <div class="sidebar-title">
                            <h4 class="title-shop">Categories</h4>
                        </div>
                        <ul>
                            <li>
                                <input type="checkbox">
                                <a href="#">Audio</a>
                                <span class="checkmark"></span>
                            </li>
                            <li>
                                <input type="checkbox">
                                <a href="#">Video</a>
                                <span class="checkmark"></span>
                            </li>
                            <li>
                                <input type="checkbox">
                                <a href="#">Gallery</a>
                                <span class="checkmark"></span>
                            </li>
                            <li>
                                <input type="checkbox">
                                <a href="#">Images</a>
                                <span class="checkmark"></span>
                            </li>
                            <li>
                                <input type="checkbox">
                                <a href="#">Categoryes</a>
                                <span class="checkmark"></span>
                            </li>

                        </ul>
                    </div> --}}
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
Blog area End
==========================-->

@endsection