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
                        @foreach($recentPosts as $recentPost)
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <!-- Single Blog Start -->
                                <div class="single-blog">
                                    <div class="blog-image mb-20">
                                        <a href="{{ route('theme.blog_detail', $recentPost->slug)}}">
                                            <img src="{{asset('../storage/posts/'.$recentPost->id.'/'.$recentPost->cover_image)}}" alt="" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <h5 class="title"><a href="{{ route('theme.blog_detail', $recentPost->slug)}}">{{ $recentPost->title}}</a></h5>
                                        <ul class="meta">
                                            <li><i class="fa fa-calendar"></i>{{ $recentPost->updated_at->format('Y/m/d') }}</li>
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
                <div class="review_address_inner mt-20">
                    <!-- Start Single Review -->
                    <h3 style="font-size: 24px; margin-bottom: 24px;">Bình luận</h3>
                    @if (count($comment->where('comment_id',0)) == 0)
                        <div class="parent-product">
                            <p style="padding-bottom: 8px;">Chưa có bình luận nào.</p>
                        </div>
                    @else
                        @foreach ($comment->where('comment_id',0) as $cmt)
                        <div class="parent-product">
                            <div class="pro_review pro-first">
                                <div class="review_thumb">
                                    <img src="/assets/theme/images/blog/comment/comment-3.webp" alt="review images">
                                </div>
                                <div class="review_details">
                                    <div class="review_info">
                                        @php
                                            $user = App\Models\User::find($cmt->user_id);
                                        @endphp
                                        <a class="last-title">{{$user->name}}</a>
                                        <div class="rating_send">
                                            @if (auth()->check())
                                                @if (auth()->user()->id == $cmt->user_id)
                                                    <a class="edit-cmt"><i class="zmdi zmdi-edit"></i></a>
                                                @else
                                                    <a class="reply-cmt"><i class="zmdi zmdi-mail-reply"></i></a>
                                                @endif
                                                @if (!auth()->user()->hasRole(config('global.default_roles.customer'))||auth()->user()->id == $cmt->user_id)
                                                    <a class="delete-cmt" data-route="{{route('theme.hideComment',$cmt->id)}}""><i class="zmdi zmdi-close"></i></a>
                                                @endif
                                            @else
                                                <a class="reply-cmt prod_detail_alert_login" data-route="{{ route('theme.login_client')}}"><i class="zmdi zmdi-mail-reply"></i></a>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="review_date">
                                        <span>{{date("d-m-Y", strtotime($cmt->created_at))}} lúc {{date("H:i", strtotime($cmt->created_at))}}</span>
                                        {{-- <span>27 Jun, 2016 at 2:30pm</span> --}}
                                    </div>
                                    <p class="cmt-content">{{$cmt->body}}</p>
                                    @if (auth()->check())
                                        <div class="cmt-show" hidden>
                                            <input type="text" class="cmt-input">
                                            <button class="button reply-cmt-btn comment-btn" data-route="{{route('theme.storeComment',[$post->id,$cmt->id,1])}}" >Bình luận</button>
                                            @if (auth()->user()->id == $cmt->user_id)
                                                <button class="button edit-cmt-btn" data-route="{{route('theme.editComment',$cmt->id)}}" >Sửa</button>
                                            @endif
                                            <button class="button cancel-cmt-btn" >Hủy</button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @if (count($comment->where('comment_id',$cmt->id)->sortBy('created_at'))>3)
                                <a class="more-cmt-reply btn-more-cmt cursor-p" style="display: block; color: blue; padding: 0px 0px 8px 80px;" >Xem thêm</a>
                            @endif
                            @foreach ($comment->where('comment_id',$cmt->id)->sortBy('created_at') as $item)
                                <div class="pro_review pro-second">
                                    <div class="review_thumb">
                                        <img src="/assets/theme/images/blog/comment/comment-3.webp" alt="review images">
                                    </div>
                                    <div class="review_details">
                                        <div class="review_info">
                                            @php
                                                $userRep = App\Models\User::find($item->user_id);
                                            @endphp
                                            <a class="last-title">{{$userRep->name}}</a>
                                            <div class="rating_send">
                                                @if (auth()->check())
                                                        
                                                    @if (auth()->user()->id == $item->user_id)
                                                        <a class="edit-cmt"><i class="zmdi zmdi-edit"></i></a>
                                                    @else
                                                        <a class="reply-cmt"><i class="zmdi zmdi-mail-reply"></i></a>
                                                    @endif
                                                    @if (!auth()->user()->hasRole(config('global.default_roles.customer'))||auth()->user()->id == $item->user_id)
                                                        <a class="delete-cmt" data-route="{{route('theme.hideComment',$item->id)}}""><i class="zmdi zmdi-close"></i></a>
                                                    @endif
                                                @else
                                                    <a class="reply-cmt prod_detail_alert_login" data-route="{{ route('theme.login_client')}}"><i class="zmdi zmdi-mail-reply"></i></a>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="review_date">
                                            <span>{{date("d-m-Y", strtotime($item->created_at))}} lúc {{date("H:i", strtotime($item->created_at))}}</span>
                                            {{-- <span>27 Jun, 2016 at 2:30pm</span> --}}
                                        </div>
                                        <p class="cmt-content">{{$item->body}}</p>
                                        @if (auth()->check())
                                            <div class="cmt-show" hidden>
                                                <input type="text" class="cmt-input">
                                                    <button class="button reply-cmt-btn comment-btn" data-route="{{route('theme.storeComment',[$post->id,$cmt->id,1])}}" >Bình luận</button>
                                                @if (auth()->user()->id == $item->user_id)
                                                    <button class="button edit-cmt-btn" data-route="{{route('theme.editComment',$item->id)}}" >Sửa</button>
                                                @endif
                                                <button class="button cancel-cmt-btn" >Hủy</button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach 
                        </div>
                        @endforeach    
                    @endif
                    <!-- End Single Comment -->
                </div>
                <div id="show-more-cmt" >
                    <button class="btn btn-primary btn-more-cmt">Xem thêm</button>
                </div>
                <!-- Comment Box End -->
                <!-- Comments Form start -->
                <div class="comments_form">
                    <form >
                        <div class="row">
                            <div class="col-12">
                                <label for="review_comment">Viết bình luận </label>
                                <textarea name="comment" id="review_comment" spellcheck="false" data-gramm="false"></textarea>
                            </div>
                        </div>
                        @if(auth()->check())
                            <button class="button comment-btn" data-route="{{route('theme.storeComment',[$post->id,0,1])}}">Bình luận</button>  
                        @else
                            <button class="button comment-button prod_detail_alert_login" data-route="{{ route('theme.login_client')}}">Bình luận</button>
                        @endif
                    </form>
                </div>
                <!-- Comments Form End -->
            </div>
            <div class="col-lg-3 order-lg-2">
                <div class="widget-sidebar margin-blog">
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
                            <a href="/san-pham/next-nx-1"><img src="/assets/theme/images/banner/shop-banner-2.png" alt="" class="img-fluid"></a>
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
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.prod_detail_alert_login').on("click", function(e) {
            e.preventDefault();
            let url = $(this).data('route');
            let nameAC = 'thêm sản phẩm vào giỏ hàng';
            if ($(this).hasClass("comment-button")||$(this).hasClass("reply-cmt")) {
                nameAC = 'bình luận';
            }
            Swal.fire({
                title: "<strong>Xin lưu ý !</strong>",
                icon: "info",
                html: `
                    Bạn cần <strong>Đăng nhập</strong> để ` + nameAC + ` !
                `,
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: `
                    <a href="`+url+`">
                        <i class="fa fa-thumbs-up"></i> Đăng nhập!
                    </a>
                `,
                confirmButtonAriaLabel: "Đăng nhập",
                cancelButtonText: `
                    <i class="fa fa-thumbs-down"></i>
                `,
                cancelButtonAriaLabel: "Thumbs down"
            });
        });

        // Comment start
        $.each($('.parent-product'), function(){
            let countShow = 3;
            if($('.parent-product').length > countShow){
                if ($('.parent-product').index(this) > countShow -1) {
                    $(this).addClass("collapse");
                }
            }
            else{
                $('#show-more-cmt').css("display","none");
            }
            let childLength = $(this).children('.pro-second').length;
            $.each($(this).children('.pro-second'), function(){
                let parentSecond = $(this).parent(".parent-product").children('.pro-second');
                if (parentSecond.index(this) < childLength - countShow) {
                    $(this).addClass("collapse");
                }
            })
        })

        $.each($('.btn-more-cmt'), function(){
            $(this).on("click", function(e){
                if ($(this).hasClass("close-cmt")) {
                    if ($(this).hasClass("more-cmt-reply")) {
                        let proSecond = $(this).siblings(".pro-second").length;
                        $.each(($(this).siblings(".pro-second")), function(){
                            if ($(this).index()< proSecond - 1) {
                                $(this).addClass("collapse");
                            }
                        });
                    }
                    else{
                        $.each($('.parent-product'), function(){
                            if ($('.parent-product').index(this)>2) {
                                $(this).addClass("collapse");
                            }
                        });
                    }
                    $(this).removeClass("close-cmt");
                    $(this).html("Xem thêm");
                }
                else{
                    let cmtShow = 3;
                    if ($(this).hasClass("more-cmt-reply")) {
                        let proSecondHidden = $(this).siblings(".pro-second.collapse");
                        proSecondHidden.removeClass("collapse");
                        $(this).addClass("close-cmt");
                        $(this).html("Thu gọn");
                    } else {
                        let countProFirst = $('.parent-product.collapse').length;
                        console.log(countProFirst);
                        if (countProFirst > cmtShow ) {
                            for (let i = 0; i < cmtShow; i++) {
                                $('.parent-product.collapse').eq(cmtShow - 1 -i).removeClass("collapse");
                            }
                        } else {
                            $('.parent-product.collapse').removeClass("collapse");
                            $(this).addClass("close-cmt");
                            $(this).html("Thu gọn");
                        }
                    }
                }
            });
        })

        $.each($('.comment-btn'), function() {
            $(this).on("click", function(e) {
                e.preventDefault();
                let comment = $('#review_comment').val();
                let user = '';
                if ($(this).hasClass("reply-cmt-btn")) {
                    user = '@' + $(this).text().replace('Trả lời ', '') + ' ';
                    comment = user + $(this).prev('.cmt-input').val();
                }
                if ($.trim(comment)==$.trim(user)) {
                    Swal.fire({
                        title: "Bình luận không được để trống!",
                        icon: "warning",
                        cancelButtonColor: "#d33",
                        cancelButtonText: "Quay lại",
                    })
                }
                else{
                    $.ajax({
                    type: 'POST',
                    url: $(this).data('route'),
                    data: {
                        comment: comment,
                    },
                    success: function(results) {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: results,
                            showConfirmButton: false,
                            timer: 2000,
                        });
                        
                        setTimeout(function(){
                            location.reload();
                            },2000);
                    },
                    error: function(results) {
                        Swal.fire({
                            title: results.responseText,
                            icon: "error",
                        });
                    },
                });
                }
            });
        }); 
        
        $.each($('.delete-cmt'), function() {
            $(this).on("click", function(e) {
                e.preventDefault();
                Swal.fire({
                title: "Bạn có chắc chắn muốn xóa bình luận này?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Xóa bình luận",
                cancelButtonText: "Quay lại",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'PATCH',
                            url: $(this).data('route'),
                            success: function(results) {
                                Swal.fire({
                                    position: "center",
                                    icon: "success",
                                    title: results,
                                    showConfirmButton: false,
                                    timer: 2000,
                                });
                                
                                setTimeout(function(){
                                    location.reload();
                                },2000);
                            },
                            error: function(results) {
                                Swal.fire({
                                    title: results.responseText,
                                    icon: "error",
                                });
                            },
                        });
                    }
                });
            });
        });

        $.each($('.reply-cmt'), function(){
            $(this).on("click",function(e){
                e.preventDefault();
                let parentAll = $(this).parents('.review_details');
                $('.cmt-show').attr("hidden",true);
                $('.reply-cmt-btn').attr("hidden",false);
                $('.cmt-content').attr("hidden",false);
                $('.edit-cmt-btn').attr("hidden",false);
                // $('.cmt-input').val("");
                parentAll.find('.cmt-show').attr("hidden",false);
                parentAll.find('.edit-cmt-btn').attr("hidden",true);
                parentAll.find('.reply-cmt-btn').html("Trả lời " + parentAll.find('.last-title').text());
                parentAll.find('.cmt-input').focus();
            });
        });

        $.each($('.edit-cmt'), function(){
            $(this).on("click",function(e){
                e.preventDefault();
                let parentAll = $(this).parents('.review_details');
                $('.cmt-show').attr("hidden",true);
                $('.reply-cmt-btn').attr("hidden",false);
                $('.cmt-content').attr("hidden",false);
                $('.edit-cmt-btn').attr("hidden",false);
                $('.cmt-input').val("");
                parentAll.find('.cmt-show').attr("hidden",false);
                parentAll.find('.reply-cmt-btn').attr("hidden",true);
                parentAll.find('.cmt-content').attr("hidden",true);
                parentAll.find('.cmt-input').val(parentAll.find('.cmt-content').text()).focus();
            });
        });

        $.each($('.cancel-cmt-btn'), function(){
            $(this).on("click", function(e){
                e.preventDefault();
                let parentAll = $(this).parents('.review_details');
                parentAll.find('.cmt-show').attr("hidden",true);
                parentAll.find('.reply-cmt-btn').attr("hidden",false);
                parentAll.find('.edit-cmt-btn').attr("hidden",false);
                parentAll.find('.cmt-content').attr("hidden",false);
                parentAll.find('.cmt-input').val("");
            });
        });

        $.each($('.edit-cmt-btn'), function() {
            $(this).on("click", function(e) {
                e.preventDefault();
                let parentAll = $(this).parents('.review_details');
                let dataUpdate = parentAll.find('.cmt-input').val();
                if (dataUpdate.includes(parentAll.f)) {
                    
                }
                $.ajax({
                    type: 'PATCH',
                    url: $(this).data('route'),
                    data: {
                        body: dataUpdate,
                    },
                    success: function(results) {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: results,
                            showConfirmButton: false,
                            timer: 2000,
                        });
                        
                        setTimeout(function(){
                            location.reload();
                        },2000);
                    },
                    error: function(results) {
                        Swal.fire({
                            title: results.responseText,
                            icon: "error",
                        });
                    },
                });
            });
        });

        // Comment end
            
    });
    
</script>
@endsection