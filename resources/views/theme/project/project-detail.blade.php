@extends('theme.layouts.page')
@section('title','Dự án')
@section('category-url', route('theme.project'))
@section('category-name', 'Dự án')
@section('page-name', $project->title)
@section('page-content')

<!--======================
Blog Details area Start
==========================-->
<div class="blog-details-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Single Blog Start -->
                <div class="single-blog mt-50">
                    {{-- <div class="blog-image mb-30">
                        <a class="text-center" href="{{ route('theme.project_detail', $project->slug) }}">
                            <img class="w-50" src="{{asset('../storage/posts/'.$project->id.'/'.$project->cover_image)}}" alt="" class="img-fluid">
                        </a>
                    </div> --}}
                    <div class="blog-content">
                        <h5 class="last-title mb-20">{{ $project->title }}</h5>
                        <ul class="meta">
                            <li><i class="fa fa-calendar"></i>{{ $project->updated_at->format('Y/m/d') }}</li>
                            <li><i class="fa fa-user-circle"></i> Tác giả : Quản trị viên</li>
                        </ul>
                        <div class="desc">
                            <p>
                                {!! $project->description !!}
                            </p>
                        </div>
                        <div class="desc-content">
                            <div class="post_meta">
                                <span><strong>Thẻ/Nhãn:-</strong></span>
                                @foreach($tagByProjects as $tag)
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
                    <h4 class="last-title mb-20">Dự án liên quan</h4>
                    <div class="row">
                        @foreach($recentProjects as $post)
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <!-- Single Blog Start -->
                                <div class="single-blog">
                                    <div class="blog-image mb-20">
                                        <a href="{{ route('theme.project_detail', $post->slug)}}">
                                            <img src="{{asset('../storage/posts/'.$post->id.'/'.$post->cover_image)}}" alt="" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <h5 class="title"><a href="{{ route('theme.project_detail', $post->slug)}}">{{ $post->title}}</a></h5>
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
            </div>
        </div>
    </div>
</div>
<!--======================
Blog Details area End
==========================-->

@endsection