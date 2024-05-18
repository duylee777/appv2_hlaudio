@extends('theme.layouts.index')
@section('title','Yêu thích')
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
                        <li>Wishlist</li>
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
wishlist area Start
==========================-->
<div class="wishlist-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="#" class="cart-form">
                    <!-- Wishlist Title Start -->
                    <div class="wishlist-title">
                        <h5 class="last-title mt-50 mb-20">Wishlist</h5>
                    </div>
                    <!-- Wishlist Title End -->
                    <!-- Wishlist Table Area Start -->
                    <div class="table-desc wishlist-margin">
                        <div class="wishlist-page cart-page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-image">Image</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-stock">Stock Status</th>
                                        <th class="product-remove">Delete</th>
                                        <th class="product-cart">Add to Cart</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="product-image"><a href="#"><img src="assets/theme/images/feature/feature-4.webp" alt=""></a></td>
                                        <td class="product-name"><a href="#">Natus erro at congue massa commodo sit dignissim</a></td>
                                        <td class="product-price">£65.00</td>
                                        <td class="product-stock">In Stock</td>
                                        <td class="product-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                        <td class="product-cart"><input type="submit" class="btn-secondary" value="Add to Cart"></td>
                                    </tr>
                                    <tr>
                                        <td class="product-image"><a href="#"><img src="assets/theme/images/feature/feature-3.webp" alt=""></a></td>
                                        <td class="product-name"><a href="#">Mirum est notare tellus eu nibh iaculis pretium</a></td>
                                        <td class="product-price">£90.00</td>
                                        <td class="product-stock">In Stock</td>
                                        <td class="product-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                        <td class="product-cart"><input type="submit" class="btn-secondary" value="Add to Cart"></td>
                                    </tr>
                                    <tr>
                                        <td class="product-image"><a href="#"><img src="assets/theme/images/feature/feature-2.webp" alt=""></a></td>
                                        <td class="product-name"><a href="#">Porro quisquam eget feugiat pretium sodales</a></td>
                                        <td class="product-price">£80.00</td>
                                        <td class="product-stock">In Stock</td>
                                        <td class="product-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                        <td class="product-cart"><input type="submit" class="btn-secondary" value="Add to Cart"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="wishlist-shear desc-content justify-content-center no-border-bottom mt-20 no-margin-bottom">
                            <div class="social_sharing">
                                <h5 class="text-center">share this post</h5>
                                <ul class="mt-0">
                                    <li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#" title="google+"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" title="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Wishlist Table Area End -->
                </form>
            </div>
        </div>
    </div>
</div>
<!--======================
wishlist area Start
==========================-->

@endsection