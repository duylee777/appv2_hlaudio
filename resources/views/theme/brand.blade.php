@extends('theme.layouts.index')
@section('title','Thương hiệu')
@section('content')

<!--=====================
Breadcrumb Aera Start
=========================-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li>
                            <h1><a href="index.html">Home</a></h1>
                        </li>
                        <li>Brand</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--=====================
Breadcrumb Aera End
=========================-->

<!--======================
Shop area Start
==========================-->
<div class="shop-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <aside class="sidebar-widget mt-50">
                    <div class="shop-sidebar-category">
                        <div class="sidebar-title">
                            <h4 class="title-shop">Home</h4>
                        </div>
                        <ul class="sidebar-category-expand">
                            <li class="menu-item-has-children active"><span class="menu-expand"><i class="fa fa-angle-down"></i></span>
                                <a href="#">Computer - Laptop</a>
                                <ul class="sub-menu">
                                    <li class="menu-item-has-children"><span class="menu-expand"><i class="fa fa-angle-down"></i></span>
                                        <a href="#">Men</a>
                                        <ul class="sub-menu">
                                            <li><a href="shop.html">Shirt</a></li>
                                            <li><a href="shop-fullwidth.html">Pant</a></li>
                                            <li><a href="shop-fullwidth-list.html">Shoes</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><span class="menu-expand"><i class="fa fa-angle-down"></i></span>
                                        <a href="#">Women</a>
                                        <ul class="sub-menu">
                                            <li><a href="shop.html">Shirt</a></li>
                                            <li><a href="shop-fullwidth.html">Pant</a></li>
                                            <li><a href="shop-fullwidth-list.html">Shoes</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><span class="menu-expand"><i class="fa fa-angle-down"></i></span>
                                        <a href="#">Kids</a>
                                        <ul class="sub-menu">
                                            <li><a href="shop.html">Shirt</a></li>
                                            <li><a href="shop-fullwidth.html">Pant</a></li>
                                            <li><a href="shop-fullwidth-list.html">Shoes</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><span class="menu-expand"><i class="fa fa-angle-down"></i></span>
                                <a href="#">Electronics</a>
                                <ul class="sub-menu">
                                    <li class="menu-item-has-children"><span class="menu-expand"><i class="fa fa-angle-down"></i></span>
                                        <a href="#">Camera</a>
                                        <ul class="sub-menu">
                                            <li><a href="shop.html">Cords & Cables</a></li>
                                            <li><a href="shop-fullwidth.html">Wireless</a></li>
                                            <li><a href="shop-fullwidth-list.html">Accessories</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><span class="menu-expand"><i class="fa fa-angle-down"></i></span>
                                        <a href="#">Cell Phone</a>
                                        <ul class="sub-menu">
                                            <li><a href="shop.html">Cords & Cables</a></li>
                                            <li><a href="shop-fullwidth.html">Wireless</a></li>
                                            <li><a href="shop-fullwidth-list.html">Accessories</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><span class="menu-expand"><i class="fa fa-angle-down"></i></span>
                                        <a href="#">TV & Video</a>
                                        <ul class="sub-menu">
                                            <li><a href="shop.html">Cords & Cables</a></li>
                                            <li><a href="shop-fullwidth.html">Wireless</a></li>
                                            <li><a href="shop-fullwidth-list.html">Accessories</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><span class="menu-expand"><i class="fa fa-angle-down"></i></span>
                                <a href="#">Toys & Hobbies </a>
                                <ul class="sub-menu">
                                    <li><a href="about.html">Arts & Crafts</a></li>
                                    <li><a href="services.html">Baby Toys</a></li>
                                    <li><a href="faq.html">Electronics for Kids</a></li>
                                    <li><a href="login.html">Dolls</a></li>
                                    <li><a href="compare.html">Baby Annabell</a></li>
                                    <li><a href="privacy-policy.html">Bratz</a></li>
                                    <li><a href="coming-soon.html">Barbie</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="shop.html">Health & Beauty</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="shop.html">Computers & Accessories</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="shop.html">Holiday Supplies & Gifts</a>
                            </li>
                        </ul>
                    </div>
                    <div class="widget_inner widget-background mt-50">
                        <div class="widget_list widget_filter">
                            <div class="sidebar-title">
                                <h4 class="title-shop">Filter by Price</h4>
                            </div>
                            <form action="#">
                                <div id="slider-range"></div>
                                <button type="submit">Filter</button>
                                <input type="text" name="text" id="amount" />
                            </form>
                        </div>
                        <div class="widget_list widget_categories mt-20">
                            <div class="sidebar-title">
                                <h4 class="title-shop">Categories</h4>
                            </div>
                            <ul>
                                <li>
                                    <input type="checkbox">
                                    <a href="#">Categories1 (6)</a>
                                    <span class="checkmark"></span>
                                </li>
                                <li>
                                    <input type="checkbox">
                                    <a href="#">Categories2(10)</a>
                                    <span class="checkmark"></span>
                                </li>
                                <li>
                                    <input type="checkbox">
                                    <a href="#">Categories3 (4)</a>
                                    <span class="checkmark"></span>
                                </li>
                            </ul>
                        </div>
                        <div class="widget_list widget_categories mt-20">
                            <div class="sidebar-title">
                                <h4 class="title-shop">Manufacturer</h4>
                            </div>
                            <ul>
                                <li>
                                    <input type="checkbox">
                                    <a href="#">Brake Parts(6)</a>
                                    <span class="checkmark"></span>
                                </li>
                                <li>
                                    <input type="checkbox">
                                    <a href="#">Accessories (10)</a>
                                    <span class="checkmark"></span>
                                </li>
                                <li>
                                    <input type="checkbox">
                                    <a href="#">Engine Parts (4)</a>
                                    <span class="checkmark"></span>
                                </li>
                                <li>
                                    <input type="checkbox">
                                    <a href="#">hermes(10)</a>
                                    <span class="checkmark"></span>
                                </li>
                                <li>
                                    <input type="checkbox">
                                    <a href="#">louis vuitton(8)</a>
                                    <span class="checkmark"></span>
                                </li>
                            </ul>
                        </div>
                        <div class="widget_list widget_categories mt-20">
                            <div class="sidebar-title">
                                <h4 class="title-shop">Select by Color</h4>
                            </div>
                            <ul>
                                <li>
                                    <input type="checkbox">
                                    <a href="#">Black (6)</a>
                                    <span class="checkmark"></span>
                                </li>
                                <li>
                                    <input type="checkbox">
                                    <a href="#"> Blue (8)</a>
                                    <span class="checkmark"></span>
                                </li>
                                <li>
                                    <input type="checkbox">
                                    <a href="#">Brown (10)</a>
                                    <span class="checkmark"></span>
                                </li>
                                <li>
                                    <input type="checkbox">
                                    <a href="#"> Green (6)</a>
                                    <span class="checkmark"></span>
                                </li>
                                <li>
                                    <input type="checkbox">
                                    <a href="#">Pink (4)</a>
                                    <span class="checkmark"></span>
                                </li>
                                <li>
                                    <input type="checkbox">
                                    <a href="#">White (2)</a>
                                    <span class="checkmark"></span>

                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Shop Banner Start -->
                    <div class="single-banner text-center mt-50 mb-30">
                        <a href="#"><img src="assets/theme/images/banner/shop-banner-2.webp" alt="" class="img-fluid"></a>
                    </div>
                    <!-- Shop Banner End -->
                </aside>
            </div>
            <div class="col-lg-9 order-first order-lg-last">
                <!-- Shop Banner Start -->
                <div class="single-banner mt-50 mb-50">
                    <a href="#"><img src="assets/theme/images/banner/shop-banner-1.webp" alt="" class="img-fluid"></a>
                </div>
                <!-- Shop Banner End -->
                <!-- Shop Toolbar Start -->
                <div class="toolbar-shop mb-50">
                    <div class="shop_toolbar_btn">
                        <button data-role="grid_3" class="btn-grid-3 active"></button>
                        <button data-role="grid_list" class="btn-list"></button>
                    </div>
                    <div class="page-amount">
                        <p>There are 10 Products</p>
                    </div>
                    <div class="nice-select select-option">
                        <select name="select">
                            <option value="1">Short By Name</option>
                            <option value="2">Short By Number</option>
                            <option value="3">Short By Date</option>
                            <option value="4">Short By Type</option>
                            <option value="5">Short By Category</option>
                            <option value="6">Short By Image</option>
                            <option value="7">Short By Trend</option>
                            <option value="8">Short By Class</option>
                        </select>
                    </div>
                </div>
                <!-- Shop Toolbar End -->
                <!-- Shop Wrapper Start -->
                <div class="row shop-wrapper grid_3">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-20">
                        <!-- Single-Product-Start -->
                        <div class="item-product pt-0">
                            <div class="product-thumb">
                                <a href="product-details.html">
                                    <img src="assets/theme/images/product/product-12.webp" alt="" class="img-fluid">
                                </a>
                                <div class="box-label">
                                    <div class="label-product-new">
                                        <span>New</span>
                                    </div>
                                </div>
                                <div class="action-link">
                                    <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#modal_box" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                    <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                    <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="product-name">
                                    <a href="product-details.html">Natus erro at congue massa commodo sit dignissim</a>
                                </div>
                                <div class="rating">
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price">$320.00</span>
                                    <span class="old-price"><del>$350.50</del></span>
                                </div>
                                <div class="cart">
                                    <div class="add-to-cart">
                                        <a href="shopping-cart.html" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-list-caption align-items-center">
                                <div class="product-name">
                                    <a href="product-details.html">Natus erro at congue massa commodo sit dignissim</a>
                                </div>
                                <div class="rating">
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price">$30.00</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed</p>
                                <div class="text-available">
                                    <p><strong>Availabe:</strong><span> 99 In Stock</span></p>
                                </div>
                                <div class="action-link">
                                    <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#modal_box" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                    <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                    <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                </div>
                                <div class="cart-list-button">
                                    <a href="shopping-cart.html" class="cart-btn">Add To Cart</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single-Product-End -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-20">
                        <!-- Single-Product-Start -->
                        <div class="item-product">
                            <div class="product-thumb">
                                <a href="product-details.html">
                                    <img src="assets/theme/images/product/product-11.webp" alt="" class="img-fluid">
                                </a>
                                <div class="box-label">
                                    <div class="label-product-new">
                                        <span>New</span>
                                    </div>
                                </div>
                                <div class="action-link">
                                    <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#modal_box" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                    <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                    <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="product-name">
                                    <a href="product-details.html">Mirum est notare tellus eu nibh iaculis pretium</a>
                                </div>
                                <div class="rating">
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price">$320.00</span>
                                    <span class="old-price"><del>$350.50</del></span>
                                </div>
                                <div class="cart">
                                    <div class="add-to-cart">
                                        <a href="shopping-cart.html" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-list-caption align-items-center">
                                <div class="product-name">
                                    <a href="product-details.html">Mirum est notare tellus eu nibh iaculis pretium</a>
                                </div>
                                <div class="rating">
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price">$30.00</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed</p>
                                <div class="text-available">
                                    <p><strong>Availabe:</strong><span> 99 In Stock</span></p>
                                </div>
                                <div class="action-link">
                                    <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#modal_box" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                    <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                    <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                </div>
                                <div class="cart-list-button">
                                    <a href="shopping-cart.html" class="cart-btn">Add To Cart</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single-Product-End -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-20">
                        <!-- Single-Product-Start -->
                        <div class="item-product">
                            <div class="product-thumb">
                                <a href="product-details.html">
                                    <img src="assets/theme/images/product/product-10.webp" alt="" class="img-fluid">
                                </a>
                                <div class="action-link">
                                    <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#modal_box" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                    <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                    <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="product-name">
                                    <a href="product-details.html">Porro quisquam eget feugiat pretium sodales</a>
                                </div>
                                <div class="rating">
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price">$320.00</span>
                                    <span class="old-price"><del>$350.50</del></span>
                                </div>
                                <div class="cart">
                                    <div class="add-to-cart">
                                        <a href="shopping-cart.html" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-list-caption align-items-center">
                                <div class="product-name">
                                    <a href="product-details.html">Porro quisquam eget feugiat pretium sodales</a>
                                </div>
                                <div class="rating">
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price">$30.00</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed</p>
                                <div class="text-available">
                                    <p><strong>Availabe:</strong><span> 99 In Stock</span></p>
                                </div>
                                <div class="action-link">
                                    <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#modal_box" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                    <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                    <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                </div>
                                <div class="cart-list-button">
                                    <a href="shopping-cart.html" class="cart-btn">Add To Cart</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single-Product-End -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-20">
                        <!-- Single-Product-Start -->
                        <div class="item-product">
                            <div class="product-thumb">
                                <a href="product-details.html">
                                    <img src="assets/theme/images/product/product-9.webp" alt="" class="img-fluid">
                                </a>
                                <div class="box-label">
                                    <div class="label-product-new">
                                        <span>New</span>
                                    </div>
                                    <div class="label-product-discount">
                                        <span>-20%</span>
                                    </div>
                                </div>
                                <div class="action-link">
                                    <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#modal_box" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                    <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                    <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="product-name">
                                    <a href="product-details.html">Natus erro at congue massa commodo sit dignissim</a>
                                </div>
                                <div class="rating">
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price">$320.00</span>
                                    <span class="old-price"><del>$350.50</del></span>
                                </div>
                                <div class="cart">
                                    <div class="add-to-cart">
                                        <a href="shopping-cart.html" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-list-caption align-items-center">
                                <div class="product-name">
                                    <a href="product-details.html">Natus erro at congue massa commodo sit dignissim</a>
                                </div>
                                <div class="rating">
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price">$30.00</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed</p>
                                <div class="text-available">
                                    <p><strong>Availabe:</strong><span> 99 In Stock</span></p>
                                </div>
                                <div class="action-link">
                                    <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#modal_box" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                    <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                    <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                </div>
                                <div class="cart-list-button">
                                    <a href="shopping-cart.html" class="cart-btn">Add To Cart</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single-Product-End -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-20">
                        <!-- Single-Product-Start -->
                        <div class="item-product">
                            <div class="product-thumb">
                                <a href="product-details.html">
                                    <img src="assets/theme/images/product/product-8.webp" alt="" class="img-fluid">
                                </a>
                                <div class="box-label">
                                    <div class="label-product-new">
                                        <span>New</span>
                                    </div>
                                </div>
                                <div class="action-link">
                                    <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#modal_box" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                    <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                    <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="product-name">
                                    <a href="product-details.html">Mirum est notare tellus eu nibh iaculis pretium</a>
                                </div>
                                <div class="rating">
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price">$320.00</span>
                                    <span class="old-price"><del>$350.50</del></span>
                                </div>
                                <div class="cart">
                                    <div class="add-to-cart">
                                        <a href="shopping-cart.html" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-list-caption align-items-center">
                                <div class="product-name">
                                    <a href="product-details.html">Mirum est notare tellus eu nibh iaculis pretium</a>
                                </div>
                                <div class="rating">
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price">$30.00</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed</p>
                                <div class="text-available">
                                    <p><strong>Availabe:</strong><span> 99 In Stock</span></p>
                                </div>
                                <div class="action-link">
                                    <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#modal_box" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                    <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                    <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                </div>
                                <div class="cart-list-button">
                                    <a href="shopping-cart.html" class="cart-btn">Add To Cart</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single-Product-End -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-20">
                        <!-- Single-Product-Start -->
                        <div class="item-product">
                            <div class="product-thumb">
                                <a href="product-details.html">
                                    <img src="assets/theme/images/product/product-7.webp" alt="" class="img-fluid">
                                </a>
                                <div class="box-label">
                                    <div class="label-product-new">
                                        <span>New</span>
                                    </div>
                                </div>
                                <div class="action-link">
                                    <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#modal_box" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                    <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                    <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="product-name">
                                    <a href="product-details.html">Porro quisquam eget feugiat pretium sodales</a>
                                </div>
                                <div class="rating">
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price">$320.00</span>
                                    <span class="old-price"><del>$350.50</del></span>
                                </div>
                                <div class="cart">
                                    <div class="add-to-cart">
                                        <a href="shopping-cart.html" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-list-caption align-items-center">
                                <div class="product-name">
                                    <a href="product-details.html">Porro quisquam eget feugiat pretium sodales</a>
                                </div>
                                <div class="rating">
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price">$30.00</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed</p>
                                <div class="text-available">
                                    <p><strong>Availabe:</strong><span> 99 In Stock</span></p>
                                </div>
                                <div class="action-link">
                                    <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#modal_box" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                    <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                    <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                </div>
                                <div class="cart-list-button">
                                    <a href="shopping-cart.html" class="cart-btn">Add To Cart</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single-Product-End -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-20">
                        <!-- Single-Product-Start -->
                        <div class="item-product">
                            <div class="product-thumb">
                                <a href="product-details.html">
                                    <img src="assets/theme/images/product/product-6.webp" alt="" class="img-fluid">
                                </a>
                                <div class="box-label">
                                    <div class="label-product-new">
                                        <span>New</span>
                                    </div>
                                </div>
                                <div class="action-link">
                                    <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#modal_box" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                    <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                    <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="product-name">
                                    <a href="product-details.html">Natus erro at congue massa commodo sit dignissim</a>
                                </div>
                                <div class="rating">
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price">$320.00</span>
                                    <span class="old-price"><del>$350.50</del></span>
                                </div>
                                <div class="cart">
                                    <div class="add-to-cart">
                                        <a href="shopping-cart.html" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-list-caption align-items-center">
                                <div class="product-name">
                                    <a href="product-details.html">Natus erro at congue massa commodo sit dignissim</a>
                                </div>
                                <div class="rating">
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price">$30.00</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed</p>
                                <div class="text-available">
                                    <p><strong>Availabe:</strong><span> 99 In Stock</span></p>
                                </div>
                                <div class="action-link">
                                    <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#modal_box" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                    <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                    <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                </div>
                                <div class="cart-list-button">
                                    <a href="shopping-cart.html" class="cart-btn">Add To Cart</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single-Product-End -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-20">
                        <!-- Single-Product-Start -->
                        <div class="item-product">
                            <div class="product-thumb">
                                <a href="product-details.html">
                                    <img src="assets/theme/images/product/product-5.webp" alt="" class="img-fluid">
                                </a>
                                <div class="box-label">
                                    <div class="label-product-new">
                                        <span>New</span>
                                    </div>
                                </div>
                                <div class="action-link">
                                    <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#modal_box" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                    <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                    <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="product-name">
                                    <a href="product-details.html">Mirum est notare tellus eu nibh iaculis pretium</a>
                                </div>
                                <div class="rating">
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price">$320.00</span>
                                    <span class="old-price"><del>$350.50</del></span>
                                </div>
                                <div class="cart">
                                    <div class="add-to-cart">
                                        <a href="shopping-cart.html" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-list-caption align-items-center">
                                <div class="product-name">
                                    <a href="product-details.html">Mirum est notare tellus eu nibh iaculis pretium</a>
                                </div>
                                <div class="rating">
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price">$30.00</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed</p>
                                <div class="text-available">
                                    <p><strong>Availabe:</strong><span> 99 In Stock</span></p>
                                </div>
                                <div class="action-link">
                                    <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#modal_box" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                    <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                    <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                </div>
                                <div class="cart-list-button">
                                    <a href="shopping-cart.html" class="cart-btn">Add To Cart</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single-Product-End -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-20">
                        <!-- Single-Product-Start -->
                        <div class="item-product">
                            <div class="product-thumb">
                                <a href="product-details.html">
                                    <img src="assets/theme/images/product/product-4.webp" alt="" class="img-fluid">
                                </a>
                                <div class="box-label">
                                    <div class="label-product-new">
                                        <span>New</span>
                                    </div>
                                </div>
                                <div class="action-link">
                                    <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#modal_box" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                    <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                    <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="product-name">
                                    <a href="product-details.html">Porro quisquam eget feugiat pretium sodales</a>
                                </div>
                                <div class="rating">
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price">$320.00</span>
                                    <span class="old-price"><del>$350.50</del></span>
                                </div>
                                <div class="cart">
                                    <div class="add-to-cart">
                                        <a href="shopping-cart.html" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-list-caption align-items-center">
                                <div class="product-name">
                                    <a href="product-details.html">Porro quisquam eget feugiat pretium sodales</a>
                                </div>
                                <div class="rating">
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price">$30.00</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed</p>
                                <div class="text-available">
                                    <p><strong>Availabe:</strong><span> 99 In Stock</span></p>
                                </div>
                                <div class="action-link">
                                    <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#modal_box" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                    <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                    <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                </div>
                                <div class="cart-list-button">
                                    <a href="shopping-cart.html" class="cart-btn">Add To Cart</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single-Product-End -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-20">
                        <!-- Single-Product-Start -->
                        <div class="item-product">
                            <div class="product-thumb">
                                <a href="product-details.html">
                                    <img src="assets/theme/images/product/product-3.webp" alt="" class="img-fluid">
                                </a>
                                <div class="box-label">
                                    <div class="label-product-new">
                                        <span>New</span>
                                    </div>
                                </div>
                                <div class="action-link">
                                    <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#modal_box" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                    <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                    <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="product-name">
                                    <a href="product-details.html">Natus erro at congue massa commodo sit dignissim</a>
                                </div>
                                <div class="rating">
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price">$320.00</span>
                                    <span class="old-price"><del>$350.50</del></span>
                                </div>
                                <div class="cart">
                                    <div class="add-to-cart">
                                        <a href="shopping-cart.html" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-list-caption align-items-center">
                                <div class="product-name">
                                    <a href="product-details.html">Natus erro at congue massa commodo sit dignissim</a>
                                </div>
                                <div class="rating">
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price">$30.00</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed</p>
                                <div class="text-available">
                                    <p><strong>Availabe:</strong><span> 99 In Stock</span></p>
                                </div>
                                <div class="action-link">
                                    <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#modal_box" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                    <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                    <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                </div>
                                <div class="cart-list-button">
                                    <a href="shopping-cart.html" class="cart-btn">Add To Cart</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single-Product-End -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-20">
                        <!-- Single-Product-Start -->
                        <div class="item-product">
                            <div class="product-thumb">
                                <a href="product-details.html">
                                    <img src="assets/theme/images/product/product-2.webp" alt="" class="img-fluid">
                                </a>
                                <div class="box-label">
                                    <div class="label-product-new">
                                        <span>New</span>
                                    </div>
                                </div>
                                <div class="action-link">
                                    <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#modal_box" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                    <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                    <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="product-name">
                                    <a href="product-details.html">Mirum est notare tellus eu nibh iaculis pretium</a>
                                </div>
                                <div class="rating">
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price">$320.00</span>
                                    <span class="old-price"><del>$350.50</del></span>
                                </div>
                                <div class="cart">
                                    <div class="add-to-cart">
                                        <a href="shopping-cart.html" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-list-caption align-items-center">
                                <div class="product-name">
                                    <a href="product-details.html">Mirum est notare tellus eu nibh iaculis pretium</a>
                                </div>
                                <div class="rating">
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price">$30.00</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed</p>
                                <div class="text-available">
                                    <p><strong>Availabe:</strong><span> 99 In Stock</span></p>
                                </div>
                                <div class="action-link">
                                    <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#modal_box" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                    <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                    <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                </div>
                                <div class="cart-list-button">
                                    <a href="shopping-cart.html" class="cart-btn">Add To Cart</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single-Product-End -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-20">
                        <!-- Single-Product-Start -->
                        <div class="item-product pb-0 no-border-bottom">
                            <div class="product-thumb">
                                <a href="product-details.html">
                                    <img src="assets/theme/images/product/product-1.webp" alt="" class="img-fluid">
                                </a>
                                <div class="box-label">
                                    <div class="label-product-new">
                                        <span>New</span>
                                    </div>
                                </div>
                                <div class="action-link">
                                    <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#modal_box" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                    <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                    <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="product-name">
                                    <a href="product-details.html">Porro quisquam eget feugiat pretium sodales</a>
                                </div>
                                <div class="rating">
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price">$320.00</span>
                                    <span class="old-price"><del>$350.50</del></span>
                                </div>
                                <div class="cart">
                                    <div class="add-to-cart">
                                        <a href="shopping-cart.html" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-list-caption align-items-center">
                                <div class="product-name">
                                    <a href="product-details.html">Porro quisquam eget feugiat pretium sodales</a>
                                </div>
                                <div class="rating">
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                    <span class="yellow"><i class="fa fa-star"></i></span>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price">$30.00</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed</p>
                                <div class="text-available">
                                    <p><strong>Availabe:</strong><span> 99 In Stock</span></p>
                                </div>
                                <div class="action-link">
                                    <a class="quick-view same-link" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#modal_box" data-original-title="quick view"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                    <a class="compare-add same-link" href="compare.html" title="Add to compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                    <a class="wishlist-add same-link" href="wishlist.html" title="Add to wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-fw"></i></a>
                                </div>
                                <div class="cart-list-button">
                                    <a href="shopping-cart.html" class="cart-btn">Add To Cart</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single-Product-End -->
                    </div>
                </div>
                <!-- Shop Wrapper End -->
                <!-- Shop Toolbar Start -->
                <div class="toolbar-shop toolbar-bottom">
                    <div class="page-amount">
                        <p>Showing 1-10 of 30 results</p>
                    </div>
                    <div class="pagination">
                        <ul>
                            <li class="previous"><a href="#"><i class="fa fa-angle-left"></i> Previous</a></li>
                            <li class="current">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="next"><a href="#">Next <i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- Shop Toolbar End -->
            </div>
        </div>
    </div>
</div>
<!--======================
Shop area End
==========================-->

@endsection