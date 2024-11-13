@extends('admin.layouts.index')
@section('title', 'Cài đặt website')
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
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Cài đặt website</span>
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
@if(Session::has('msg'))
<div id="msgbox" class="mt-12 absolute top-4 right-4 w-[300px] border bg-green-300 px-4 py-2 rounded-lg shadow-soft-lg flex items-center justify-between" >
    <span class="text-white ">{{ Session::get('msg') }}</span>
    <button type="" onclick="closeBox();"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg></button>
</div>
<script>
    setTimeout(function() {
        $('#msgbox').fadeOut('fast');
    }, 3000);
    function closeBox() {
        var box = document.getElementById('msgbox');
        box.classList.remove('flex');
        box.classList.add('hidden');
    }
</script>
@endif
@if (auth()->user()->hasRole(config('global.default_roles.super_admin')))
<div class="w-fit float-right">
    <a href="{{ route('setting-web.create') }}" class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg p-2 text-center">
        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" aria-hidden="true" height="20" width="20">
            <path d="M64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V96c0-8.8-7.2-16-16-16H64zM0 96C0 60.7 28.7 32 64 32H384c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM200 344V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H248v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/>
        </svg>
    </a>    
</div>    
@endif


<section class="bg-gray-50 py-4 sm:py-5 mt-5">
    <div class="px-4 mx-auto max-w-screen-2xl">
        <form id="update-sale-offer" action="{{ route('setting-web.update', 'sale_offer') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <section id="sale-offer" class="grid gap-4 grid-cols-1">
                <h2 class="text-blue-600 text-2xl font-semibold">Tùy chỉnh Sale Offer</h2>
                @php
                    $listSaleOffer = json_decode($settingWebs->where('type', 'sale_offer')->first()->value);
                    $project1 = App\Models\Product::where('code', array_column($listSaleOffer, 'code')[0])->where('is_active', true)->first();
                    $project2 = App\Models\Product::where('code', array_column($listSaleOffer, 'code')[1])->where('is_active', true)->first();
                    // dd(array_column($listSaleOffer, 'code'));
                @endphp
                <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                    <div class="product-parent col-span-2 flex flex-row">
                        <div class="w-[60%]">
                            <label for="search-name1" class="block mb-2 text-sm font-medium text-gray-900">Sản phẩm 1</label>
                            <input type="text" id="search-name1" class="search-name input-value bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Chọn sản phẩm ..." required="" value="{{$project1->name}} - {{$project1->code}}">
                            <input type="text" id="input-value1" name="nameValue1" class="input-value bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 hidden" placeholder="Chọn sản phẩm ..." required="" required="" value="{{$project1->code}}">
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
                                <input type="text" id="product-des1" name="productDes1" class="input-value bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Mô tả sản phẩm ..." required="" value="{{$listSaleOffer[0]->description}}">
                            </div>

                            <div class="col-span-2 pt-5">
                                <label for="limit-time1" class="block mb-2 text-sm font-medium text-gray-900">Thời gian kết thúc khuyến mãi</label>
                                <input type="datetime-local" id="limit-time1" name="dateSale1" class="input-value bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-auto p-2.5" required="" value="{{$listSaleOffer[0]->timeSale}}">
                            </div> 
                        </div>

                        <div class="w-[40%] pl-5">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Hình ảnh sản phẩm</label>
                            <div class="w-[30%]">
                                <img src="{{$project1->image == "[]" ? "https://images.pexels.com/photos/698275/pexels-photo-698275.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" : asset('../storage/products/'.$project1->code.'/image/'.json_decode($project1->image)[0])}}" alt="product 1"> 
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                    <div class="product-parent col-span-2 flex flex-row">
                        <div class="w-[60%]">
                            <label for="search-name2" class="block mb-2 text-sm font-medium text-gray-900">Sản phẩm 2</label>
                            <input type="text" id="search-name2" class="search-name input-value bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Chọn sản phẩm ..." required="" value="{{$project2->name}} - {{$project2->code}}">
                            <input type="text" id="input-value2" name="nameValue2" class="input-value bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 hidden" placeholder="Chọn sản phẩm ..." required="" value="{{$project2->code}}">
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
                                <input type="text" id="product-des2" name="productDes2" class="input-value bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Mô tả sản phẩm ..." required="" value="{{$listSaleOffer[1]->description}}">
                            </div> 
                        
                            <div class="col-span-2 pt-5">
                                <label for="limit-time2" class="block mb-2 text-sm font-medium text-gray-900">Thời gian kết thúc khuyến mãi</label>
                                <input type="datetime-local" id="limit-time2" name="dateSale2" class="input-value bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-auto p-2.5" required="" value="{{$listSaleOffer[1]->timeSale}}">
                            </div> 

                        </div>

                        <div class="w-[40%] pl-5">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Hình ảnh sản phẩm</label>
                            <div class="w-[30%]">
                                <img src="{{$project2->image == "[]" ? "https://images.pexels.com/photos/698275/pexels-photo-698275.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" : asset('../storage/products/'.$project2->code.'/image/'.json_decode($project2->image)[0])}}" alt=""> 
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="flex items-center flex-wrap gap-4">
                <button type="submit" class="text-white inline-flex items-center bg-green-500 hover:bg-green-700 border-2 border-green-500 hover:border-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="me-1 -ms-1 w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor">
                        <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
                    </svg>
                    Cập nhật
                </button>
                
                <a href="{{ route('setting-web.index') }}" type="button" class="btn_cancel text-black inline-flex items-center border-2 bg-white rounded-lg text-sm px-5 py-2.5 text-center">
                    Hủy bỏ
                </a>
            </div>
        </form>
    </div>
    
    <div class="px-4 mx-auto max-w-screen-2xl mt-10">
        <form id="update-best-seller" action="{{ route('setting-web.update', 'best_seller') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <section id="best-seller" class="grid gap-4 grid-cols-1">
                <h2 class="text-blue-600 text-2xl font-semibold">Tùy chỉnh sản phẩm bán chạy - Best seller</h2>
                @php
                    $listBestSeller = json_decode($settingWebs->where('type', 'best_seller')->first()->value);
                    $projectBestSeller = App\Models\Product::whereIn('code', $listBestSeller)->where('is_active', true)->get();
                @endphp
                <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                    <div class="product-parent col-span-2 flex flex-row">
                        <div class="w-[50%]">
                            <div class="hidden">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Danh sách sản phẩm</label>
                                <input type="text" id="input-value3" name="nameValue3" class="input-value bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Danh sách sản phẩm ..." readonly>    
                            </div>
                            

                            <label for="search-name3" class="block mt-5  mb-2 text-sm font-medium text-gray-900">Chọn sản phẩm</label>
                            <input type="text" id="search-name3" name="name3" class="search-name bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Tìm sản phẩm ...">
                            
                            <div class="products-div max-h-[160px] w-[80%] overflow-y-auto hidden">
                                <ul>
                                    @foreach ($productSales as $item)
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
                            <div class="list-best-seller flex flex-row flex-wrap gap-2.5">
                                @foreach ($projectBestSeller as $item)
                                <div class="item-best-seller relative w-[40%] max-w-[calc(50%-15px)] grow text-center m-[5px] p-[5px] border border-[#d1d5db]">
                                    <p>{{$item->name}} - {{$item->code}} </p>
                                    <div class="delete-best-seller absolute bg-[#fff] -top-[0.8em] -right-[0.8em] w-[1.6em] rounded-full border border-[#d1d5db] rotate-45 cursor-pointer" data-code="{{$item->code}}">+</div>
                                </div>    
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center flex-wrap gap-4">
                        <button type="submit" class="text-white inline-flex items-center bg-green-500 hover:bg-green-700 border-2 border-green-500 hover:border-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            <svg class="me-1 -ms-1 w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor">
                                <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
                            </svg>
                            Cập nhật
                        </button>
                        
                        <a href="{{ route('setting-web.index') }}" type="button" class="btn_cancel text-black inline-flex items-center border-2 bg-white rounded-lg text-sm px-5 py-2.5 text-center">
                            Hủy bỏ
                        </a>
                    </div>
                </div>
            </section>
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
    $.each($('.item-best-seller p'), function () {
        arrBestSeller.push($.trim($(this).text()));
    })
    $.each($('.item-best-seller .delete-best-seller'), function () {
        arrBestSellerInput.push($.trim($(this).data('code')));
    })

    $('#input-value3').val(arrBestSellerInput);
    
    $.each($(".delete-best-seller"), function () {
        $(this).on("click", function () {
            let thisParent = $(this).parent(".item-best-seller");
            removeElement(arrBestSeller, thisParent.find("p").text());
            removeElement(arrBestSellerInput, $(this).data("code"));
            thisParent.remove();
            $('#input-value3').val(arrBestSellerInput);
        })
    })
    console.log(arrBestSeller);
    
    console.log(arrBestSellerInput);

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
</script>
@endsection