@extends('admin.layouts.index')
@section('title', 'Thêm cài đặt')
@section('content')

<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
            </a>
        </li>
        <li class="inline-flex items-center">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="{{ route('setting-web.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2">Cài đặt website</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Thêm cài đặt</span>
            </div>
        </li>
    </ol>
</nav>

@if($errors->any())
<ul>
    @foreach( $errors->all() as $error)
    <li>
        <span class="text-red-300">{{$error}}</span>
    </li>
    @endforeach
</ul>
@endif

<section class="bg-gray-50 py-4 sm:py-5 mt-5">
    <div class="px-4 mx-auto max-w-screen-2xl">
        <a href="{{ route('setting-web.index') }}" class="mb-4 inline-flex items-center gap-1 px-4 py-2 bg-white shadow rounded hover:bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="8" viewBox="0 0 256 512">
                <path d="M31.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z"/>
            </svg>
            <!-- Quay lại -->
        </a>
        <div class="flex items-center justify-between flex-1 mb-4">
            <h2 class="text-blue-600 text-2xl font-semibold">Thêm cài đặt</h2>

            <div class="flex items-center gap-2">
                <a href="{{route('setting-web.create')}}" class="block p-2 shadow-lg rounded-lg bg-white text-red-300 border border-red-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="20" width="20" fill="currentColor">
                        <path d="M142.9 142.9c62.2-62.2 162.7-62.5 225.3-1L327 183c-6.9 6.9-8.9 17.2-5.2 26.2s12.5 14.8 22.2 14.8H463.5c0 0 0 0 0 0H472c13.3 0 24-10.7 24-24V72c0-9.7-5.8-18.5-14.8-22.2s-19.3-1.7-26.2 5.2L413.4 96.6c-87.6-86.5-228.7-86.2-315.8 1C73.2 122 55.6 150.7 44.8 181.4c-5.9 16.7 2.9 34.9 19.5 40.8s34.9-2.9 40.8-19.5c7.7-21.8 20.2-42.3 37.8-59.8zM16 312v7.6 .7V440c0 9.7 5.8 18.5 14.8 22.2s19.3 1.7 26.2-5.2l41.6-41.6c87.6 86.5 228.7 86.2 315.8-1c24.4-24.4 42.1-53.1 52.9-83.7c5.9-16.7-2.9-34.9-19.5-40.8s-34.9 2.9-40.8 19.5c-7.7 21.8-20.2 42.3-37.8 59.8c-62.2 62.2-162.7 62.5-225.3 1L185 329c6.9-6.9 8.9-17.2 5.2-26.2s-12.5-14.8-22.2-14.8H48.4h-.7H40c-13.3 0-24 10.7-24 24z"/>
                    </svg>
                </a>
            </div>
        </div>
        <form id="new-product-form" action="{{ route('setting-web.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <section class="grid gap-4 grid-cols-1">
                <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Tên cài đặt</label>
                        <input type="text" id="name" name="name" class="w-[80%] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5" placeholder="Tên cài đặt ..." required="">
                    </div>
                    <div class="col-span-2">
                        <label for="type-code" class="block mb-2 text-sm font-medium text-gray-900">Mã cài đặt</label>
                        {{-- <input type="text" id="codename" name="type" class="w-[80%] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5" placeholder="Mã cài đặt ..." required=""> --}}
                        <select name="type" id="type-code" class="w-[50%] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5" required="">
                            <option selected value="sale_offer">Slide sản phẩm giảm giá</option>
                            <option value="best_seller">Sản phẩm bản chạy</option>
                        </select>
                    </div>
                </div>
            </section>

            <section id="sale-offer" class="grid gap-4 grid-cols-1">
                <h3 class="text-[24px] pt-2.5">Sale Offer</h3>
                <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                    <div class="product-parent col-span-2 flex flex-row">
                        <div class="w-[50%]">
                            <label for="search-name1" class="block mb-2 text-sm font-medium text-gray-900">Chọn sản phẩm</label>
                            <input type="text" id="search-name1" name="name1" class="search-name input-value bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Chọn sản phẩm ..." required="">
                            <input type="text" id="input-value1" name="nameValue1" class="input-value bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 hidden" placeholder="Chọn sản phẩm ..." required="">
                            <div class="products-div max-h-[300px] w-[80%] overflow-y-auto hidden">
                                <ul>
                                    @foreach ($productSales as $item)
                                        <li class="product-item">
                                            <div class="item-name p-2.5 hover:bg-[#1c64f2] cursor-pointer" data-code="{{$item->code}}" data-image="{{$item->image == "[]"? "https://images.pexels.com/photos/698275/pexels-photo-698275.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" : asset('../storage/products/'.$item->code.'/image/'.json_decode($item->image)[0])}}">
                                                {{$item->name}} - {{$item->code}} 
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>    
                            
                            <div class="col-span-2 pt-5">
                                <label for="product-des1" class="block mb-2 text-sm font-medium text-gray-900">Mô tả sản phẩm</label>
                                <textarea id="product-des1" name="productDes1" rows="3"  class="input-value bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Mô tả sản phẩm ..." required=""></textarea>
                            </div>

                            <div class="col-span-2 pt-5">
                                <label for="limit-time1" class="block mb-2 text-sm font-medium text-gray-900">Thời gian kết thúc khuyến mãi</label>
                                <input type="datetime-local" id="limit-time1" name="dateSale1" class="input-value bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-auto p-2.5" required="">
                            </div> 
                        </div>

                        <div class="w-[50%] pl-5">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Hình ảnh sản phẩm</label>
                            <div class="w-full">
                                <img class="w-[60%] mx-auto" src="https://images.pexels.com/photos/698275/pexels-photo-698275.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt=""> 
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                    <div class="product-parent col-span-2 flex flex-row">
                        <div class="w-[50%]">
                            <label for="search-name2" class="block mb-2 text-sm font-medium text-gray-900">Chọn sản phẩm</label>
                            <input type="text" id="search-name2" name="name2" class="search-name input-value bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Chọn sản phẩm ..." required="">
                            <input type="text" id="input-value2" name="nameValue2" class="input-value bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 hidden" placeholder="Chọn sản phẩm ..." required="">
                            <div class="products-div max-h-[300px] w-[80%] overflow-y-auto hidden">
                                <ul>
                                    @foreach ($productSales as $item)
                                        <li class="product-item">
                                            <div class="item-name p-2.5 hover:bg-[#1c64f2] cursor-pointer" data-code="{{$item->code}}" data-image="{{$item->image == "[]"? "https://images.pexels.com/photos/698275/pexels-photo-698275.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" : asset('../storage/products/'.$item->code.'/image/'.json_decode($item->image)[0])}}">
                                                {{$item->name}} - {{$item->code}} 
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>   
                            
                            <div class="col-span-2 pt-5">
                                <label for="product-des2" class="block mb-2 text-sm font-medium text-gray-900">Mô tả sản phẩm</label>
                                <textarea id="product-des2" name="productDes1" rows="3"  class="input-value bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Mô tả sản phẩm ..." required=""></textarea>
                            </div> 
                        
                            <div class="col-span-2 pt-5">
                                <label for="limit-time2" class="block mb-2 text-sm font-medium text-gray-900">Thời gian kết thúc khuyến mãi</label>
                                <input type="datetime-local" id="limit-time2" name="dateSale2" class="input-value bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-auto p-2.5" required="">
                            </div> 

                        </div>

                        <div class="w-[50%] pl-5">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Hình ảnh sản phẩm</label>
                            <div class="w-full">
                                <img class="w-[60%] mx-auto" src="https://images.pexels.com/photos/698275/pexels-photo-698275.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt=""> 
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="best-seller" class="grid gap-4 grid-cols-1 hidden">
                <h3 class="text-[24px] pt-2.5">Best seller</h3>
                <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                    <div class="product-parent col-span-2 flex flex-row">
                        <div class="w-[50%]">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Danh sách sản phẩm</label>
                            <input type="text" id="input-value3" name="nameValue3" class="input-value bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Danh sách sản phẩm ..." readonly>
                            <label for="search-name3" class="block mt-5  mb-2 text-sm font-medium text-gray-900">Chọn sản phẩm</label>
                            <input type="text" id="search-name3" name="name3" class="search-name bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Tìm sản phẩm ...">
                            
                            <div class="products-div max-h-[160px] w-full overflow-y-auto hidden">
                                <ul>
                                    @foreach ($products as $item)
                                        <li class="product-item">
                                            <div class="item-name item-bs p-2.5 hover:bg-[#1c64f2] cursor-pointer" data-code="{{$item->code}}" data-image="{{$item->image == "[]"? "https://images.pexels.com/photos/698275/pexels-photo-698275.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" : asset('../storage/products/'.$item->code.'/image/'.json_decode($item->image)[0])}}">
                                                {{$item->name}} - {{$item->code}} 
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>  
                        </div>

                        <div class="w-[50%] pl-5">
                            {{-- <label class="block mb-2 text-sm font-medium text-gray-900">Hình ảnh sản phẩm</label>
                            <div class="w-[30%]">
                                <img src="https://images.pexels.com/photos/698275/pexels-photo-698275.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt=""> 
                            </div> --}}
                            <div class="list-best-seller flex flex-row flex-wrap gap-2.5">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                <div class="col-span-2">
                    <label for="" class="block mb-2 font-semibold text-gray-900">Hình ảnh thu nhỏ</label>
                    <div class="p-4 flex flex-col lg:flex-row items-center gap-4 bg-white border border-gray-200 rounded-lg shadow">
                        <div class="w-24 h-24 overflow-hidden flex items-center justify-center rounded-md shadow">
                            <img id="thumbnails_image" class="w-full" src="https://images.pexels.com/photos/698275/pexels-photo-698275.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Extra large image">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="block text-sm font-medium text-gray-900" for="file_thumbnails">Tải tập tin lên</label>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" aria-describedby="file_thumbnails_help" name="thumb" id="file_thumbnails" type="file" onchange="document.getElementById('thumbnails_image').src = window.URL.createObjectURL(this.files[0]);">
                            <p class="text-sm text-gray-500" id="file_thumbnails_help">.svg, .png, .jpg/jpeg, .webp or .gif (900x900px).</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                <div class="sm:col-span-2">
                    <label for="images" class="block mb-2 font-semibold text-gray-900">Ảnh sản phẩm</label>
                    <ul id="list-product-image" class="flex flex-wrap gap-4"></ul>
                    <div class="flex flex-col gap-2 mt-4">
                        <label class="block text-sm font-medium text-gray-900" for="file_input">Tải tập tin lên</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" aria-describedby="file_input_help" name="" id="file_input" type="file" multiple>
                        <p class="text-sm text-gray-500" id="file_input_help">.svg, .png, .jpg/jpeg, .webp or .gif (900x900px).</p>
                    </div>
                </div>
            </div> --}}

            <div class="flex items-center flex-wrap gap-4">
                <button type="submit" class="text-white inline-flex items-center bg-green-500 hover:bg-green-700 border-2 border-green-500 hover:border-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="me-1 -ms-1 w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor">
                        <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
                    </svg>
                    Tạo mới
                </button>
                <a href="{{ route('setting-web.index') }}" type="button" class="btn_cancel text-black inline-flex items-center border-2 bg-white rounded-lg text-sm px-5 py-2.5 text-center">
                    Hủy bỏ
                </a>
            </div>
        </form>
    </div>
</section>

<script>
    $(document).click(function(e) {
		var dropdownP = $(".products-div");
		var toggleXS = $('.search-name');
		if (!dropdownP.is(e.target) && dropdownP.has(e.target).length === 0 && !toggleXS.is(e.target) && toggleXS.has(e.target).length === 0)
		{
			dropdownP.addClass('hidden');
		}
	});

    function removeElement(array, elem) {
        var index = array.indexOf(elem);
        if (index > -1) {
            array.splice(index, 1);
        }
    }

    $('#type-code').on('change', function (e) {
        let optionSelected = $("option:selected", this);
        let valueSelected = this.value;
        if (valueSelected == "sale_offer") {
            $('#sale-offer').removeClass('hidden');
            $('#sale-offer').find("input").attr("required", true);
            $('#best-seller').addClass('hidden');            
            $('#best-seller').find("input").removeAttr("required");
        } 
        if (valueSelected == "best_seller") {
            $('#sale-offer').addClass('hidden');
            $('#sale-offer').find(".input-value").removeAttr("required");
            $('#best-seller').removeClass('hidden');
            $('#best-seller').find(".input-value").attr("required", true);
        }
        // console.log( $('#sale-offer').find("input"));
    });

    $.each($('.search-name'), function () {
        $(this).keyup(function (e) {
            e.preventDefault();
            let filter = $(this).val().toLowerCase();
            let row = ($(this).siblings(".products-div"));
            let rowChildren = row.find('.product-item');
            $.each(rowChildren, function () {
                let txtValueName =$.trim($(this).children().text());
                if (txtValueName.toLowerCase().indexOf(filter) > -1) {
                    $(this).removeClass('hidden');
                } else {
                    $(this).addClass('hidden');
                }
            })
        })

        $(this).focus(function (e) {
            let row = ($(this).siblings(".products-div"));
            row.removeClass('hidden');
        });
    })

    let arrBestSeller = [];
    let arrBestSellerInput = [];
    $.each($('.item-name'), function () {
        $(this).on('click', function (e) {
            e.preventDefault();
            if ($(this).hasClass('item-bs')) {
                let thisParent = $(this).parents(".product-parent");
                let thisSearchName = thisParent.find(".search-name");
                let thisInputValue = thisParent.find(".input-value");
                let thisListBestSeller = thisParent.find(".list-best-seller");
                if (!arrBestSeller.includes($.trim($(this).text())) && arrBestSeller.length <10) {
                    arrBestSeller.push($.trim($(this).text()));
                    arrBestSellerInput.push($.trim($(this).data("code")));
                }
                $(".item-best-seller").remove();
                $.each(arrBestSeller, function (index, value) {
                    thisListBestSeller.append('<div class="item-best-seller relative w-[40%] max-w-[calc(50%-15px)] grow text-center m-[5px] p-[5px] border border-[#d1d5db]"><p>'+ value + '</p><div class="delete-best-seller absolute bg-[#fff] -top-[0.8em] -right-[0.8em] w-[1.6em] rounded-full border border-[#d1d5db] rotate-45 cursor-pointer" data-code="'+ arrBestSellerInput[index] +'">+</div></div>');
                })
                
                $.each($(".delete-best-seller"), function () {
                    $(this).on("click", function () {
                        let thisParent = $(this).parent(".item-best-seller");
                        removeElement(arrBestSeller, thisParent.find("p").text());removeElement(arrBestSellerInput, $(this).data("code"));
                        thisParent.remove();
                        thisInputValue.val(arrBestSellerInput);
                    })
                })
                thisInputValue.val(arrBestSellerInput);
                // console.log(arrBestSellerInput.length);
            } else {
                let thisSearchName = $(this).parents(".products-div").siblings(".search-name");
                let thisInputValue = $(this).parents(".products-div").siblings(".input-value");
                let imgProduct = $(this).parents(".product-parent").find("img");
                let urlImage = $(this).data('image');
                thisInputValue.val($(this).data('code'));
                thisSearchName.val($.trim($(this).text()));
                $(this).parents('.products-div').addClass('hidden');
                imgProduct.attr('src', urlImage);    
            }
       });
    });

    $( function() {
        $( "#list-product-image" ).sortable();
        $( "#list-product-image" ).disableSelection();

        $( "#list-document" ).sortable();
        $( "#list-document" ).disableSelection();

        $( "#list-software" ).sortable();
        $( "#list-software" ).disableSelection();

        $( "#list-driver" ).sortable();
        $( "#list-driver" ).disableSelection();
        
    } );

    let fileUpload = document.querySelector("#file_input");
    let listProductImage = document.querySelector('#list-product-image');

    let fileDocumentUpload = document.querySelector('#document_file_input');
    let listDocument = document.querySelector('#list-document');

    let fileSoftwareUpload = document.querySelector('#software_file_input');
    let listSoftware = document.querySelector('#list-software');

    let fileDriverUpload = document.querySelector('#driver_file_input');
    let listDriver = document.querySelector('#list-driver');

    // function createElementForFile(fileUpload, listFile, requestName) {
    //     let files = fileUpload.target.files;

    //     for(let i = 0; i < files.length; i++) {
    //         let wrap = document.createElement('li');
    //         wrap.className = 'p-2 flex items-center justify-between italic text-sm text-gray-500 shadow rounded-lg';

    //         let fileName = document.createElement('span');
    //         fileName.innerText = files[i].name;
    //         wrap.appendChild(fileName);

    //         let deleteFileBtn = document.createElement('button');
    //         deleteFileBtn.type = 'button';
    //         deleteFileBtn.className = 'text-red-500';
    //         deleteFileBtn.innerHTML ='<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/></svg>';
    //         wrap.appendChild(deleteFileBtn);

    //         deleteFileBtn.addEventListener("click", function() {
    //             listFile.removeChild(wrap);
    //         });

    //         let input = document.createElement('input');
    //         input.type = 'file';
    //         input.className = 'list_'+requestName;
    //         input.name = requestName+'[]';
    //         input.hidden = true;
    //         wrap.appendChild(input);

    //         var fileInput = new DataTransfer();
    //         fileInput.items.add(files[i]);
    //         input.files = fileInput.files;

    //         listFile.appendChild(wrap);
    //     }
    // }

    // fileDocumentUpload.addEventListener("change", (e) => {
    //     e.preventDefault();
    //     let data = document.querySelectorAll('#list-document li');
    //     if(data.length > 0) {
    //         for(let i = 0; i < data.length; i++) {
    //             listDocument.removeChild(data[i]);
    //         }
    //     }

    //     createElementForFile(e, listDocument, 'document');
    // });

    // fileSoftwareUpload.addEventListener("change", (e) => {
    //     e.preventDefault();
    //     let data = document.querySelectorAll('#list-software li');
    //     if(data.length > 0) {
    //         for(let i = 0; i < data.length; i++) {
    //             listSoftware.removeChild(data[i]);
    //         }
    //     }

    //     createElementForFile(e, listSoftware, 'software');
    // });

    // fileDriverUpload.addEventListener("change", (e) => {
    //     e.preventDefault();
    //     let data = document.querySelectorAll('#list-driver li');
    //     if(data.length > 0) {
    //         for(let i = 0; i < data.length; i++) {
    //             listDriver.removeChild(data[i]);
    //         }
    //     }

    //     createElementForFile(e, listDriver, 'driver');
    // });

    // fileUpload.addEventListener("change", (e) => {
    //     e.preventDefault();
    //     let data = document.querySelectorAll('#list-product-image li');
    //     if(data.length > 0) {
    //         for(let i = 0; i < data.length; i++) {
    //             listProductImage.removeChild(data[i]);
    //         }
    //     }
        
    //     var files = e.target.files;
        
    //     for(let i = 0; i < files.length; i++) {
    //         let imageWrap = document.createElement('li');
    //         imageWrap.className = 'relative overflow-hidden bg-white px-4 pt-8 pb-4 rounded shadow';

    //         let image = document.createElement('img');
    //         image.className = 'block w-60 h-60 rounded-lg';
    //         image.src = window.URL.createObjectURL(files[i]);
    //         imageWrap.appendChild(image);

    //         let imageName = document.createElement('span');
    //         imageName.className = 'block py-1';
    //         imageName.innerText = files[i].name;
    //         imageWrap.appendChild(imageName);

    //         let input = document.createElement('input');
    //         input.className = 'list_image';
    //         input.type = 'file';
    //         input.name = 'image[]';
    //         input.hidden = true;
    //         imageWrap.appendChild(input);

    //         var fileInput = new DataTransfer();
    //         fileInput.items.add(files[i]);
    //         input.files = fileInput.files;

    //         let deleteBtn = document.createElement('button');
    //         deleteBtn.type = 'button';
    //         deleteBtn.id = 'delete_image_'+i;
    //         deleteBtn.className = 'text-red-500 absolute top-2 right-2';
    //         deleteBtn.innerHTML ='<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/></svg>';
    //         imageWrap.appendChild(deleteBtn);

    //         deleteBtn.addEventListener("click", function() {
    //             listProductImage.removeChild(imageWrap);
    //         });
            
    //         listProductImage.appendChild(imageWrap);
    //     }
    // });
</script>


@endsection