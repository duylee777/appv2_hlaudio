@extends('theme.layouts.index')
@section('title','So sánh')
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
                        <li>Compare</li>
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
Compare area Start
==========================-->
<div class="compare-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="#" class="compare-form">
                    <!-- Compare Title Start -->
                    <div class="cart-title">
                        <h5 class="last-title mt-45 mb-20">Compare</h5>
                    </div>
                    <!-- Compare Title End -->
                    <!-- Compare Table Area Start -->
                    <div class="compare-table">
                        <div class="table table-responsive">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="first-column">Product Image</td>
                                        <td class="product-image-title">
                                            <a href="#" class="image"><img src="assets/theme/images/feature/feature-4.webp" alt="Compare Product"></a>
                                        </td>
                                        <td class="product-image-title">
                                            <a href="#" class="image"><img src="assets/theme/images/feature/feature-6.webp" alt="Compare Product"></a>
                                        </td>
                                        <td class="product-image-title">
                                            <a href="#" class="image"><img src="assets/theme/images/feature/feature-1.webp" alt="Compare Product"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="first-column">Product Name</td>
                                        <td class="product-image-title">
                                            <a href="#" class="category">Headphone</a>
                                        </td>
                                        <td class="product-image-title">
                                            <a href="#" class="category">Speaker</a>
                                        </td>
                                        <td class="product-image-title">
                                            <a href="#" class="category">Microphone</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="first-column">Description</td>
                                        <td class="pro-desc">
                                            <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend ..</p>
                                        </td>
                                        <td class="pro-desc">
                                            <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend ..</p>
                                        </td>
                                        <td class="pro-desc">
                                            <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend ..</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="first-column">Price</td>
                                        <td class="pro-price">$295</td>
                                        <td class="pro-price">$275</td>
                                        <td class="pro-price">$395</td>
                                    </tr>
                                    <tr>
                                        <td class="first-column">Color</td>
                                        <td class="pro-color">Black</td>
                                        <td class="pro-color">Black</td>
                                        <td class="pro-color">Black</td>
                                    </tr>
                                    <tr>
                                        <td class="first-column">Stock</td>
                                        <td class="pro-stock">In Stock</td>
                                        <td class="pro-stock">In Stock</td>
                                        <td class="pro-stock">In Stock</td>
                                    </tr>
                                    <tr>
                                        <td class="first-column">Rating</td>
                                        <td class="pro-ratting">
                                            <div class="rating">
                                                <span class="yellow"><i class="fa fa-star"></i></span>
                                                <span class="yellow"><i class="fa fa-star"></i></span>
                                                <span class="yellow"><i class="fa fa-star"></i></span>
                                                <span class="yellow"><i class="fa fa-star"></i></span>
                                                <span class="yellow"><i class="fa fa-star"></i></span>
                                            </div>
                                        </td>
                                        <td class="pro-ratting">
                                            <div class="rating">
                                                <span class="yellow"><i class="fa fa-star"></i></span>
                                                <span class="yellow"><i class="fa fa-star"></i></span>
                                                <span class="yellow"><i class="fa fa-star"></i></span>
                                                <span class="yellow"><i class="fa fa-star"></i></span>
                                                <span class="yellow"><i class="fa fa-star"></i></span>
                                            </div>
                                        </td>
                                        <td class="pro-ratting">
                                            <div class="rating">
                                                <span class="yellow"><i class="fa fa-star"></i></span>
                                                <span class="yellow"><i class="fa fa-star"></i></span>
                                                <span class="yellow"><i class="fa fa-star"></i></span>
                                                <span class="yellow"><i class="fa fa-star"></i></span>
                                                <span class="yellow"><i class="fa fa-star"></i></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="first-column">Add to cart</td>
                                        <td class="pro-addtocart"><a href="#" class="btn-secondary" tabindex="0"><span>ADD TO CART</span></a></td>
                                        <td class="pro-addtocart"><a href="#" class="btn-secondary" tabindex="0"><span>ADD TO CART</span></a></td>
                                        <td class="pro-addtocart"><a href="#" class="btn-secondary" tabindex="0"><span>ADD TO CART</span></a></td>
                                    </tr>
                                    <tr>
                                        <td class="first-column">Delete</td>
                                        <td class="pro-remove"><button><i class="fa fa-trash-o"></i></button></td>
                                        <td class="pro-remove"><button><i class="fa fa-trash-o"></i></button></td>
                                        <td class="pro-remove"><button><i class="fa fa-trash-o"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Compare Table Area End -->
                </form>
            </div>
        </div>
    </div>
</div>
<!--======================
Compare area End
==========================-->

@endsection