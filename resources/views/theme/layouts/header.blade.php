<!-- =================
Header Area Start 
=====================-->
<header class="header-area">
    <!-- Header Top Start -->
    <div class="header-top full-border">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="header-top-left">
                        <p><span>Dịch vụ khách hàng: </span> 0913 012 736</p>
                    </div>
                </div>
                <div class="col-lg-8 col-12">
                    <div class="box-right">
                        <ul>
                            <li class="settings">
                                <a  class="drop-toggle">
                                    <i class="fa fa-globe" aria-hidden="true"></i>
                                </a>
                                <ul class="box-dropdown drop-dropdown">
                                    <li class="gtranslate_wrapper"></li>
                                </ul>
                            </li>
                            <li class="settings">
                                <a class="drop-toggle">
                                    @if (auth()->user())
                                        {{auth()->user()->name}}
                                    @else
                                        Tài khoản
                                    @endif
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="box-dropdown drop-dropdown">
                                    @if(auth()->user())
                                        <li><a href="{{ route('theme.account') }}">Tài khoản của tôi</a></li>
                                        <li><a href="{{ route('theme.wishlist') }}">Yêu thích</a></li>
                                        <li><a href="{{ route('theme.show_cart')}}">Thanh toán</a></li>
                                        <li>
                                            <a id="logout_account">Đăng xuất</a>
                                            <form id="logout_account_form" action="{{ route('logout')}}" method="post" hidden>
                                                @csrf
                                            </form>
                                        </li>
                                    @else
                                    <li><a style="text-align: center" href="{{route('theme.login_client')}}">Đăng nhập</a></li>
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Top End -->
    <!-- Header Middle Start -->
    <div class="header-middle space-40">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-6">
                    <div class="logo">
                        <a href="{{ route('theme.home') }}"><img src="/assets/theme/images/logo/hienluongaudio.png" alt="" class="img-fluid"></a>
                    </div>
                </div>
                <div class="col-lg-9 col-6">
                    <div class="header-middle-inner">
                        <div class="search-container">
                            <form action="{{route('theme.search')}}" method="GET">
                                <div class="top-cat">
                                    <select class="select-option" name="select" id="category2">
                                        <option value="all">Tất cả danh mục</option>
                                        @foreach(App\Models\Category::get() as $category)
                                            @if(!empty($category->parent) && $category->parent->slug == 'san-pham')
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @if(count($category->children) != 0)
                                                    @foreach($category->children as $childCateLv1)
                                                        <option value="{{$childCateLv1->id}}">- - {{$childCateLv1->name}}</option>
                                                        @if(count($childCateLv1->children) != 0)
                                                            @foreach($childCateLv1->children as $childCateLv2)
                                                                <option value="{{$childCateLv2->id}}">- - - - {{$childCateLv2->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="search_box">
                                    <input class="header-search" placeholder="Nhập từ khóa tìm kiếm ..." type="text" name="keyword" required>
                                    <button class="header-search-button" type="submit">Tìm kiếm</button>
                                </div>
                            </form>
                        </div>
                        <div class="blockcart">
                            @if(auth()->check())
                                @php
                                    $cart = App\Models\Cart::where('user_id', auth()->user()->id)->first();
                                    $items = App\Models\CartItem::where('session_id', $cart->id)->get();
                                    
                                @endphp
                                @if(count($items) == 0)
                                    <a class="alert_cart_empty">
                                        <img src="/assets/theme/images/cart/cart.webp" alt="" class="img-fluid">
                                        <span class="count">0</span>
                                    </a>
                                @else
                                <a class="drop-toggle">
                                    <img src="/assets/theme/images/cart/cart.webp" alt="" class="img-fluid">
                                    {{-- <span class="my-cart">Giỏ hàng</span> --}}
                                    <span class="count">
                                        @php
                                            $count = 0;
                                            foreach($items as $item) {
                                                $count = $count + $item->quantity;
                                            }
                                        @endphp
                                        {{$count}}
                                    </span>
                                    {{-- <span class="total-item"> </span> --}}
                                </a>
                                @endif
                                <div class="cart-dropdown drop-dropdown">
                                    <ul class="overflow-auto" style="height: 360px;">
                                        @foreach($items as $item)
                                            @php
                                                $product = App\Models\Product::where('id', $item->product_id)->first();
                                                $images = json_decode($product->image);
                                            @endphp
                                        <li class="mini-cart-details">
                                            <div class="innr-crt-img">
                                                <img src="{{asset('../storage/products/'.$product->code.'/image/'.$images[0])}}" alt="{{ $product->name }}" width="70" height="70">
                                                <span>{{$item->quantity}}</span>
                                            </div>
                                            <div class="innr-crt-content">
                                                <span class="product-name">
                                                <a href="{{route('theme.product_detail', $product->slug)}}">{{ $product->name }}</a>
                                            </span>
                                                <span class="product-price">{{ Illuminate\Support\Number::currency($product->odd_price, in: 'VND', locale: 'vi') }}</span>
                                                {{-- <span class="product-size">Size:  S</span> --}}
                                            </div>
                                        </li>
                                        @endforeach
                                        <li>
                                            <span class="subtotal-text">Tổng tiền (VND)</span>
                                            <span class="subtotal-price">{{ Illuminate\Support\Number::currency($cart->total_price, in: 'VND', locale: 'vi') }}</span>
                                        </li>
                                    </ul>
                                    <div class="checkout-cart">
                                        <a href="{{ route('theme.show_cart')}}">Thanh toán</a>
                                    </div>
                                </div>
                            @else
                            <a class="alert_login" data-route="{{ route('theme.login_client') }}">
                                <img src="/assets/theme/images/cart/cart.webp" alt="" class="img-fluid">
                                <span class="count">0</span>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Middle End -->
    <!-- Header Bottom Start -->
    <div class="header-menu header-bottom-area sticky-header theme-bg sticker">
        <div class="offcanvas_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-10">
                    <!-- Category Menu Start -->
                    <div class="categoryes-menu-bar">
                        <div id="show_menu" class="categoryes-menu-btn category-toggle">
                            <div class="float-left w-100">
                                <a style="color: white;">Sản phẩm</a>
                            </div>
                            <div class="float-right">
                                <i class="fa fa-bars"></i>
                            </div>
                        </div>
                        <nav class="categorye-menus category-dropdown">
                            <ul class="categories-expand">
                                @foreach(App\Models\Category::get() as $category)
                                    @if(!empty($category->parent) && $category->parent->slug == 'san-pham')
                                        <li class="categories-hover-right">
                                            <a href="{{ route('theme.category', $category->slug) }}">
                                                {{ $category->name }} 
                                                
                                                @if(count($category->children) != 0)
                                                    <i class="fa fa-angle-right float-right"></i>
                                                @endif
                                            </a>

                                            @if(count($category->children) != 0)
                                                <ul class="cat-submenu category-mega">
                                                    @foreach($category->children as $childCate)
                                                        <li class="cat-mega-title">
                                                            <a href="{{ route('theme.category', $childCate->slug) }}">{{ $childCate->name }}</a>
                                                            @if(count($childCate->children) != 0)
                                                                <ul>
                                                                    @foreach($childCate->children as $childCateLv2)
                                                                    <li><a href="{{ route('theme.category', $childCateLv2->slug) }}">{{ $childCateLv2->name }}</a></li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                    <!-- Category Menu End -->
                </div>
                <div class="col-lg-9 col-6 d-none d-lg-flex">
                    <!-- Main Menu Start -->
                    <div class="header-menu add-sticky">
                        <div class="sticky-container">
                            <div class="logo">
                                <a href="{{ route('theme.home') }}">
                                    <img src="/assets/theme/images/logo/hienluongaudio.png" alt="" class="img-fluid" style="height: 3.5rem;">
                                </a>
                            </div>
                            <nav class="main-menu">
                                <ul>
                                    <li><a href="{{ route('theme.home') }}">Trang chủ</a></li>
                                    <li>
                                        <a href="#">Cửa hàng <i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown dropdown-width">
                                            @foreach(App\Models\Category::get() as $category)
                                                @if(!empty($category->parent) && $category->parent->slug == 'san-pham')
                                                    <li>
                                                        <a href="{{ route('theme.category', $category->slug) }}">
                                                            {{$category->name}}
                                                            @if(count($category->children) != 0)
                                                                <i class="fa fa-angle-right float-right"></i>
                                                            @endif
                                                        </a>
                                                        @if(count($category->children) != 0)
                                                            <ul class="sub-dropdown dropdown dropdown-width">
                                                                @foreach($category->children as $childCate)
                                                                    <li><a href="{{ route('theme.category', $childCate->slug) }}">{{$childCate->name}}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{ route('theme.blog') }}">Bài viết</a>   
                                    </li>
                                    <li>
                                        <a href="{{ route('theme.project') }}">Dự án</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('theme.about') }}">Giới thiệu</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('theme.contact') }}">Liên hệ</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Main Menu End -->
                </div>
                <div class="col-2 d-lg-none align-self-center">    
                    <!-- ========================
                    Offcanvas Menu Area Start 
                    ===========================-->
                    <div class="offcanvas_menu">
                        <div class="canvas_open">
                            <a type="button"><i class="zmdi zmdi-menu"></i></a>
                        </div>
                        <div class="offcanvas_menu_wrapper">
                            <div class="canvas_close">
                                <a type="button"><i class="zmdi zmdi-close"></i></a>
                            </div>
                            <div class="welcome_text text-center mb-10">
                                <p><span>Dịch vụ khách hàng: </span>  0913 012 736</p>
                            </div>
                            <div class="box-right text-center mb-20">
                                <ul>
                                    {{-- <li class="settings">
                                        <a href="compare.html">So sánh (2)</a>
                                    </li> --}}
                                    <li class="settings">
                                        <a  class="drop-toggle">
                                            <i class="fa fa-globe" aria-hidden="true"></i>
                                        </a>
                                        <ul class="box-dropdown drop-dropdown">
                                            <li class="gtranslate_wrapper"></li>
                                            
                                        </ul>
                                    </li>
                                    <li class="settings">
                                        <a class="drop-toggle">
                                            @if (auth()->user())
                                                {{auth()->user()->name}}
                                            @else
                                                Tài khoản
                                            @endif
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="box-dropdown drop-dropdown">
                                            @if(Auth::check() == true)
                                                <li><a href="{{ route('theme.account') }}">Tài khoản của tôi</a></li>
                                                <li><a href="{{ route('theme.wishlist') }}">Yêu thích</a></li>
                                                <li><a href="{{ route('theme.checkout') }}">Thanh toán</a></li>
                                                <li>
                                                    <a id="logout_account">Đăng xuất</a>
                                                    <form id="logout_account_form" action="{{ route('logout')}}" method="post" hidden>
                                                        @csrf
                                                    </form>
                                                </li>
                                            @else
                                                <li><a href="{{ route('theme.login_client') }}">Đăng nhập</a></li>
                                            @endif
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="offcanvas-search-container mb-40">
                                <form method="GET" action="{{route('theme.search')}}" name="keyword">
                                    <div class="search_box">
                                        <input placeholder="Nhập từ khóa tìm kiếm ..." type="text">
                                        <button type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                            <!-- Offcanvas Menu Start -->
                            <div class="offcanvas_menu_cover text-left">
                                <ul class="offcanvas_main_menu">
                                    <li class="menu-item-has-children active">
                                        <a href="{{ route('theme.home') }}">Trang chủ</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Cửa hàng</a>
                                        <ul class="sub-menu">
                                            @foreach(App\Models\Category::get() as $category)
                                                @if(!empty($category->parent) && $category->parent->slug == 'san-pham')
                                                    <li class="menu-item-has-children">
                                                        <a href="{{route('theme.category', $category->slug)}}">{{  $category->name }}</a>
                                                        @if(count($category->children) != 0)
                                                            <ul class="sub-menu">
                                                                @foreach($category->children as $childCateLv1)
                                                                    <li><a href="{{route('theme.category', $childCateLv1->slug)}}">{{ $childCateLv1->name }}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="{{ route('theme.blog') }}">Bài viết</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="{{ route('theme.project') }}">Dự án</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="{{ route('theme.about') }}">Giới thiệu</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="{{ route('theme.contact') }}">Liên hệ</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Offcanvas Menu End -->
                            <div class="offcanvas_footer">
                                <span>
                                    <a href="mailto:hiendientuhg123@gmail.com"><i class="fa fa-envelope-o"></i>hiendientuhg123@gmail.com</a>
                                </span>
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
                    </div>
                    <!-- ========================
                    Offcanvas Menu Area End 
                    ===========================-->
                </div>
            </div>
        </div>
    </div>
    <!-- Header Bottom End  -->
</header>
<!-- =================
Header Area  End 
=====================-->
<script>
window.gtranslateSettings = {
    "default_language":"vi",
    "native_language_names":true,
    "languages":["en","vi"],
    "wrapper_selector":".gtranslate_wrapper"
}
</script>
<script src="https://cdn.gtranslate.net/widgets/latest/ln.js" defer></script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#logout_account').on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: "Bạn có chắc chắn muốn đăng xuất khỏi tài khoản ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Đăng xuất",
                cancelButtonText: "Quay lại"
                }).then((result) => {
                if (result.isConfirmed) {
                    $('#logout_account_form').submit();
                }   
            });
        });

        $('.alert_login').on("click", function(e) {
            e.preventDefault();
            let url = $(this).data('route');
            Swal.fire({
                title: "<strong>Xin lưu ý !</strong>",
                icon: "info",
                html: `
                    Bạn cần <strong>Đăng nhập</strong> để tiếp tục !
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

        $('.alert_cart_empty').on("click", function(e) {
            e.preventDefault();
            Swal.fire({
                position: "center",
                icon: "warning",
                title: "Giỏ hàng của bạn đang rỗng !",
                showConfirmButton: false,
                timer: 1500,
            });
        });
    });
</script>