@extends('theme.layouts.page')
@section('title','Dự án')
@section('category-url', '')
@section('category-name', '')
@section('page-name', 'Dự án')
@section('page-content')

<!--======================
Blog Grid area Start
==========================-->
<div class="blog-fullwidth blog-list-view">
    <div class="container">
        <div class="row mt-20">
            <div class="col-lg-9 order-lg-1">
                @if(count($projects) == 0)
                    <div class="single-blog mt-30"></div>
                @else
                    @foreach($projects as $project)
                        <!-- Single Blog start -->
                        <div class="single-blog mt-30 align-items-start">
                            <div class="blog-image">
                                <a href="{{ route('theme.project_detail', $project->slug)}}">
                                    <img src="{{asset('../storage/posts/'.$project->id.'/'.$project->cover_image)}}" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="blog-content">
                                <ul class="meta">
                                    <li><i class="fa fa-calendar"></i>{{ $project->updated_at->format('Y/m/d') }}</li>
                                    <li><i class="fa fa-user-circle"></i> Tác giả : Quản trị viên </li>
                                    {{-- <li><i class="fa fa-folder-open"></i><a href="#"> Fashion</a></li> --}}
                                </ul>
                                <h5 class="title"><a href="{{ route('theme.project_detail', $project->slug) }}">{{ $project->title }}</a></h5>
                                <div class="desc">
                                    <p>
                                        {!! $project->description !!}
                                    </p>
                                </div>
                                <a href="{{ route('theme.project_detail', $project->slug) }}" class="link">Đọc thêm</a>
                            </div>
                        </div>
                        <!-- Single Blog End -->
                    @endforeach
                @endif
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Blog Toolbar Start -->
                    {{ $projects->links('vendor.pagination.client') }}
                    <!-- Blog Toolbar End -->
                </div>
            </div>
            <div class="col-lg-3 order-lg-2">
                <div class="widget-sidebar margin-blog">
                    <div class="widget-thumb mt-30">
                        <div class="sidebar-title">
                            <h4 class="title-shop">Bài đăng gần đây</h4>
                        </div>
                        <div class="thumb-wrapper">
                            @if(count($recentProjects) == 0)
                                <div class="single-blog-thumb d-flex"></div>
                            @else
                                @foreach($recentProjects as $recentPost)
                                    <!-- Single Blog Thumb Start -->
                                    <div class="single-blog-thumb d-flex">
                                        <div class="blog-thumb">
                                            <a href="{{ route('theme.project_detail', $recentPost->slug) }}">
                                                <img src="{{asset('../storage/posts/'.$recentPost->id.'/'.$recentPost->cover_image)}}" alt="{{ $recentPost->slug }}" width="100" height="66">
                                            </a>
                                        </div>
                                        <div class="blog-info">
                                            <h5 class="info-title"><a href="{{ route('theme.project_detail', $recentPost->slug) }}">{{ $recentPost->title }}</a></h5>
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
                                        <li><a href="{{ route('theme.project_by_tag', $tag->slug) }}">{{ $tag->name }}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--======================
Blog Grid area End
==========================-->

@endsection