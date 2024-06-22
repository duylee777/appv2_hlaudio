@extends('theme.layouts.page')
@section('title','Yêu thích')
@section('category-url', '')
@section('category-name', '')
@section('page-name', 'Yêu thích')
@section('page-content')



<!--======================
wishlist area Start
==========================-->
<div class="wishlist-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-form">
                    <!-- Wishlist Title Start -->
                    <div class="wishlist-title">
                        <h5 class="last-title mt-50 mb-20">Wishlist</h5>
                    </div>
                    <!-- Wishlist Title End -->
                    <!-- Wishlist Table Area Start -->
                    
                    @if (count($wls)==0)
                        Danh sách yêu thích trống.
                    @else
                    <div class="table-desc wishlist-margin">
                        <div class="wishlist-page cart-page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th><input id="select-all" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"></th>
                                        <th class="product-image">HÌNH ẢNH</th>
                                        <th class="product-name">TÊN SẢN PHẨM</th>
                                        <th class="product-price">GIÁ</th>
                                        <th class="product-remove">XÓA</th>
                                        <th class="product-cart">THÊM VÀO GIỎ HÀNG</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wls as $key => $item)
                                        <tr>
                                            <td><input type="checkbox" value="{{{$item["product_id"]}}}" name="select-one" class="select-one w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"></td>

                                            @php
                                                $product = App\Models\Product::where('id', $item['product_id'])->first();
                                                $images = json_decode($product->image);
                                            @endphp
                                            <td class="product-image">
                                                <a href="{{route('theme.product_detail', $product->slug)}}">
                                                    <img src="{{asset('../storage/products/'.$product->code.'/image/'.$images[0])}}" alt="{{ $product->name }}" height="100" width="100">
                                                </a>
                                            </td>
                                            <td class="product-name"><a href="{{route('theme.product_detail', $item['slug'])}}">{{$item['name']}}</a></td>
                                            <td class="product-price">{{$item['odd_price']}}</td>
                                            <td class="product-remove">
                                                <a class ="remove_item_btn"  data-route="{{route('wishlist.destroy',$item['id'])}}"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                            <td class="product-remove"><a class="add_to_cart_btn "  data-route="{{route('theme.add_to_cart', $item['product_id'])}}"><i class=" zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i></a></td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                                <thead>
                                <tr>
                                    <th></th>
                                    <th class="product-image"></th>
                                    <th class="product-name"></th>
                                    <th class="product-price"></th>
                                    <th class="product-remove"><button class="remove-selected place-self-center btn-secondary bg-danger"  data-route="{{route('wishlist.destroy_selected')}}">Xóa mục đã chọn</button></th>
                                    <th class="product-cart"><button class="add-selected btn-secondary"  data-route="{{route('theme.add_selected')}}">Thêm mục đã chọn</button></th>
                                </tr>
                                </thead>
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
                    @endif
                    <!-- Wishlist Table Area End -->
                </div>
            </div>
        </div>
    </div>
</div>
<!--======================
wishlist area Start
==========================-->
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //checkbox

        let select_array = [];
        $("#select-all").click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
            $.each($('.select-one:checked'),function(index, value){
                if (!select_array.includes(value.value)) {
                    select_array.push(value.value);
                }
            })
            if(!$(this).is(':checked')){
                select_array.length = 0;
            }
            console.log(select_array);
        });

        $('.select-one').click(function(){
            let product_id = $(this).val();
            console.log(product_id);
            if ($('.select-one:checked').length == $('.select-one').length) {
                $('#select-all').prop('checked', true);

            } else {
                $('#select-all').prop('checked', false);
            }
            if($(this).is(':checked')){
                select_array.push(product_id);
            }
            else{
                select_array.splice($.inArray(product_id, select_array), 1);

            }
            console.log(select_array);
        });

        // remove selected checkbox
        $.each($('.remove-selected'), function() {
            $(this).on("click", function(e) {
                e.preventDefault();
                
                if (select_array.length!=0) {
                    Swal.fire({
                    title: "Bạn có chắc chắn muốn XÓA MỤC ĐÃ CHỌN khỏi yêu thích ?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Xóa sản phẩm",
                    cancelButtonText: "Quay lại",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: 'POST',
                                url: $(this).data('route'),
                                data: {
                                    product_ids : select_array,
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
                                    },1000);

                                },
                                error: function(results) {
                                    Swal.fire({
                                        title: results.responseText,
                                        icon: "error",
                                    });
                                },
                                
                            });
                            
                            //$('.cart-form').load(document.URL +  ' .wishlist-page');
                        }
                    });
                } else {
                    Swal.fire({
                            position: "center",
                            icon: "error",
                            title: "Không có sản phẩm nào được chọn",
                            showConfirmButton: false,
                            timer: 2000,
                        });
                }
            });
        });

        // add seleted to cart 
        $.each($('.add-selected'), function() {
            $(this).on("click", function(e) {
                e.preventDefault();
                if (select_array.length!=0) {
                    $.ajax({
                        type: 'POST',
                        url: $(this).data('route'),
                        data: {
                            product_ids : select_array,
                            quantity : 1,
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
                                    },1000);
                            
                        },
                        error: function(results) {
                            Swal.fire({
                                title: results.responseText,
                                icon: "error",
                            });                    
                        },
                    });
                } else {
                    Swal.fire({
                            position: "center",
                            icon: "error",
                            title: "Không có sản phẩm nào được chọn",
                            showConfirmButton: false,
                            timer: 2000,
                        });
                }
            });
        });

        // add to cart 
        $.each($('.add_to_cart_btn'), function() {
            $(this).on("click", function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: $(this).data('route'),
                    data: {
                        quantity: 1,
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

        //delete 1 wishlist
        $.each($('.remove_item_btn'), function() {
            $(this).on("click", function(e) {
                e.preventDefault();
                Swal.fire({
                title: "Bạn có chắc chắn muốn xóa sản phẩm khỏi yêu thích ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Xóa sản phẩm",
                cancelButtonText: "Quay lại",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
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
    });
</script>
@endsection