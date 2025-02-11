@extends('admin.layouts.index')
@section('title', 'Thương hiệu')
@section('content')

@if(Session::has('error'))
<div id="msgbox" class="mt-12 absolute top-4 right-4 w-[300px] border bg-red-300 px-4 py-2 rounded-lg shadow-soft-lg flex items-center justify-between" >
    <span class="text-white ">{{ Session::get('error') }}</span>
    <button type="" onclick="closeBox();"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg></button>
</div>
@endif

<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="{{ route('brand.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Thương hiệu</a>
            </div>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2">{{$brand->name}}</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Cập nhật thương hiệu</span>
            </div>
        </li>
    </ol>
</nav>

<section class="bg-gray-50 dark:bg-gray-900 py-4 sm:py-5 mt-5">
    <a href="{{ route('brand.index') }}" class="mx-4 mb-4 inline-flex items-center gap-1 px-4 py-2 bg-white shadow rounded hover:bg-gray-100">
        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="8" viewBox="0 0 256 512">
            <path d="M31.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z"/>
        </svg>
        Quay lại
    </a>
    <h2 class=" mx-4 mb-4 text-xl font-bold text-yellow-300">Cập nhật thương hiệu</h2>
    <form  method="POST" action="{{ route('brand.update', $brand->id) }}" class="px-4" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid gap-4 mb-4 grid-cols-2">
            <div class="">
                <label for="id" class="block mb-2 font-semibold text-gray-900">ID</label>
                <input type="text" name="id" id="id" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" value="{{ $brand->id }}" disabled>
            </div>
            <div class="">
                <label for="name" class="block mb-2 font-semibold text-gray-900">Thương hiệu</label>
                <input type="text" name="name" id="name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" value="{{ $brand->name }}">
            </div>
            
            <div class="col-span-2">
                <label for="" class="block mb-2 font-semibold text-gray-900">Hình ảnh thương hiệu</label>
                <div class="p-4 flex flex-col lg:flex-row items-center gap-4 bg-white border border-gray-200 rounded-lg shadow">
                    <div class="w-24 h-24 overflow-hidden flex items-center justify-center rounded-md shadow">
                        <img id="preview_brand_image" class="w-full" src="{{asset('../storage/brands/'.$brand->slug.'/'.$brand->image)}}" alt="Extra large image">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="block text-sm font-medium text-gray-900" for="file_brand_input">Tải tập tin lên</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" aria-describedby="file_input_help" name="image" id="file_brand_input" type="file" onchange="document.getElementById('preview_brand_image').src = window.URL.createObjectURL(this.files[0])">
                        <p class="text-sm text-gray-500" id="file_brand_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- drawer component -->
        <div id="drawer-right-example"
            class="fixed top-0 right-0 z-[9999] h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-[67%] max-md:w-full dark:bg-gray-800 duration-500 border border-gray-300"
            tabindex="-1" aria-labelledby="drawer-right-label">
            <h5 id="drawer-right-label"
                class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
                <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>Tối ưu SEO
            </h5>
            <button type="button" data-drawer-hide="drawer-right-example"
                aria-controls="drawer-right-example"
                class="bg-gray-200 text-gray-900 rounded-lg text-sm w-8 h-8 fixed top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div class="flex flex-row flex-wrap gap-4">
                <div class="w-[calc(50%-8px)] max-md:w-full">
                    <label for="seo_title" class="block mb-2 font-semibold text-gray-900">Thẻ title</label>
                    <textarea name="seo_title" id="seo_title" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Mặc định: <Tên trang>">{{is_null($SEOData) ? "" : json_decode($SEOData->title)}}</textarea>
                </div>
                <div class="w-[calc(50%-8px)] max-md:w-full">
                    <label for="robots" class="block mb-2 font-semibold text-gray-900">Thẻ meta robots</label>
                    <textarea name="seo_robots" id="robots" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Mặc định: index, follow">{{is_null($SEOData) ? "" : json_decode($SEOData->robots)}}</textarea>
                </div>
                <div class="w-[calc(50%-8px)] max-md:w-full">
                    <label for="seo_description" class="block mb-2 font-semibold text-gray-900">Thẻ meta description</label>
                    <textarea name="seo_description" id="seo_description" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: Aucus Audio là đơn vị nhập khẩu, phân phối các thiết bị âm thanh chính hãng, chuyên nghiệp. Các loại loa, microphone, Amplifier, dàn loa karaoke, phụ kiện âm thanh…">{{is_null($SEOData) ? "" : json_decode($SEOData->description)}}</textarea>
                </div>
                <div class="w-[calc(50%-8px)] max-md:w-full">
                    <label for="keywords" class="block mb-2 font-semibold text-gray-900">Thẻ meta keywords</label>
                    <textarea name="seo_keywords" id="keywords" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: AucusAudio, Line Array, Loa, Speaker, Công suất, Amplifier, Microphone, Vang, Mixer, Crossover, Quản lý nguồn điện, Phụ kiện âm thanh, Dàn loa Karaoke">{{is_null($SEOData) ? "" : json_decode($SEOData->keywords)}}</textarea>
                </div>

                <div class="w-[calc(50%-8px)] max-md:w-full">
                    <label for="og_locale" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:locale</label>
                    <textarea name="seo_og_locale" id="og_locale" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Mặc định: vi_VN">{{is_null($SEOData) ? "" : json_decode($SEOData->og_locale)}}</textarea>
                </div>
                <div class="w-[calc(50%-8px)] max-md:w-full">
                    <label for="og_site_name" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:site_name</label>
                    <textarea name="seo_og_site_name" id="og_site_name" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Mặc định: <url trang hiện tại>">{{is_null($SEOData) ? "" : json_decode($SEOData->og_site_name)}}</textarea>
                </div>
                <div class="w-[calc(50%-8px)] max-md:w-full">
                    <label for="og_description" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:description</label>
                    <textarea name="seo_og_description" id="og_description" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: Aucus Audio là đơn vị nhập khẩu, phân phối các thiết bị âm thanh chính hãng, chuyên nghiệp. Các loại loa, microphone, Amplifier, dàn loa karaoke, phụ kiện âm thanh…">{{is_null($SEOData) ? "" : json_decode($SEOData->og_description)}}</textarea>
                </div>
                <div class="w-[calc(50%-8px)] max-md:w-full">
                    <label for="og_title" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:title</label>
                    <textarea name="seo_og_title" id="og_title" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Mặc định: <Tên trang>">{{is_null($SEOData) ? "" : json_decode($SEOData->og_title)}}</textarea>
                </div>

                <div class="w-[calc(50%-8px)] max-md:w-full">
                    <label for="og_type" class="block mb-2 font-semibold text-gray-900">Thẻ og:type</label>
                    <textarea name="seo_og_type" id="og_type" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Mặc định: object">{{is_null($SEOData) ? "" : json_decode($SEOData->og_type)}}</textarea>
                </div>
                <div class="w-[calc(50%-8px)] max-md:w-full">
                    <label for="og_url" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:url</label>
                    <textarea name="seo_og_url" id="og_url" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Mặc định: <url trang hiện tại>">{{is_null($SEOData) ? "" : json_decode($SEOData->og_url)}}</textarea>
                </div>
                <div class="w-[calc(50%-8px)] max-md:w-full">
                    <label for="article_publisher" class="block mb-2 font-semibold text-gray-900">Thẻ meta article:publisher</label>
                    <textarea name="seo_article_publisher" id="article_publisher" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: <link facebook của Aucus Audio>">{{is_null($SEOData) ? "" : json_decode($SEOData->article_publisher)}}</textarea>
                </div>
                <div class="w-[calc(50%-8px)] max-md:w-full">
                    <label for="og_image" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image</label>
                    <textarea name="seo_og_image" id="og_image" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: <link ảnh của thương hiệu>">{{is_null($SEOData) ? "" : json_decode($SEOData->og_image)}}</textarea>
                </div>
                <div class="w-[calc(50%-8px)] max-md:w-full">
                    <label for="og_image_secure_url" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image:secure_url</label>
                    <textarea name="seo_og_image_secure_url" id="og_image_secure_url" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: <link ảnh của thương hiệu>">{{is_null($SEOData) ? "" : json_decode($SEOData->og_image_secure_url)}}</textarea>
                </div>
                
                <div class="w-[calc(50%-8px)] max-md:w-full">
                    <label for="og_image_height" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image:height</label>
                    <textarea name="seo_og_image_height" id="og_image_height" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Kích thước ảnh: height">{{is_null($SEOData) ? "" : json_decode($SEOData->og_image_height)}}</textarea>
                </div>
                <div class="w-[calc(50%-8px)] max-md:w-full">
                    <label for="og_image_width" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image:width</label>
                    <textarea name="seo_og_image_width" id="og_image_width" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Kích thước ảnh: width">{{is_null($SEOData) ? "" : json_decode($SEOData->og_image_width)}}</textarea>
                </div>
                <div class="w-[calc(50%-8px)] max-md:w-full">
                    <label for="og_image_type" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image:type</label>
                    <textarea name="seo_og_image_type" id="og_image_type" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Mặc định: image/png">{{is_null($SEOData) ? "" : json_decode($SEOData->og_image_type)}}</textarea>
                </div>
                
                <div class="w-[calc(50%-8px)] max-md:w-full">
                    <label for="og_image_alt" class="block mb-2 font-semibold text-gray-900">Thẻ og:image:alt</label>
                    <textarea name="seo_og_image_alt" id="og_image_alt" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: AucusAudio logo">{{is_null($SEOData) ? "" : json_decode($SEOData->og_image_alt)}}</textarea>
                </div>
                <div class="w-[calc(50%-8px)] max-md:w-full">
                    <label for="twitter_site" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:site</label>
                    <textarea name="seo_twitter_site" id="twitter_site" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: cskh@aucusaudio.vn">{{is_null($SEOData) ? "" : json_decode($SEOData->twitter_site)}}</textarea>
                </div>
                <div class="w-[calc(50%-8px)] max-md:w-full">
                    <label for="twitter_card" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:card</label>
                    <textarea name="seo_twitter_card" id="twitter_card" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Mặc định: summary_large_image">{{is_null($SEOData) ? "" : json_decode($SEOData->twitter_card)}}</textarea>
                </div>
                
                <div class="w-[calc(50%-8px)] max-md:w-full">
                    <label for="twitter_creator" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:creator</label>
                    <textarea name="seo_twitter_creator" id="twitter_creator" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: aucusaudio.vn">{{is_null($SEOData) ? "" : json_decode($SEOData->twitter_creator)}}</textarea>
                </div>
                <div class="w-[calc(50%-8px)] max-md:w-full">
                    <label for="twitter_title" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:title</label>
                    <textarea name="seo_twitter_title" id="twitter_title" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: AucusAudio">{{is_null($SEOData) ? "" : json_decode($SEOData->twitter_title)}}</textarea>
                </div>
                <div class="w-[calc(50%-8px)] max-md:w-full">
                    <label for="twitter_description" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:description</label>
                    <textarea name="seo_twitter_description" id="twitter_description" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: Aucus Audio là đơn vị nhập khẩu, phân phối các thiết bị âm thanh chính hãng, chuyên nghiệp. Các loại loa, microphone, Amplifier, dàn loa karaoke, phụ kiện âm thanh…">{{is_null($SEOData) ? "" : json_decode($SEOData->twitter_description)}}</textarea>
                </div>
                <div class="w-[calc(50%-8px)] max-md:w-full">
                    <label for="twitter_image" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:image</label>
                    <textarea name="seo_twitter_image" id="twitter_image" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: <link ảnh của thương hiệu>">{{is_null($SEOData) ? "" : json_decode($SEOData->twitter_image)}}</textarea>
                </div>
                <div class="w-[calc(50%-8px)] max-md:w-full">
                    <label for="twitter_label1" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:label1</label>
                    <textarea name="seo_twitter_label1" id="twitter_label1" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Có thể để trống...">{{is_null($SEOData) ? "" : json_decode($SEOData->twitter_label1)}}</textarea>
                </div>
                <div class="w-[calc(50%-8px)] max-md:w-full">
                    <label for="twitter_data1" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:data1</label>
                    <textarea name="seo_twitter_data1" id="twitter_data1" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Có thể để trống...">{{is_null($SEOData) ? "" : json_decode($SEOData->twitter_data1)}}</textarea>
                </div>
            </div>
        </div>
        
        <div class="text-right">
            <button type="submit" class="px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-white bg-yellow-300 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-yellow-600">
                Cập nhật thương hiệu
            </button>
            
            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none" type="button" data-drawer-target="drawer-right-example" data-drawer-show="drawer-right-example" data-drawer-placement="right"  aria-controls="drawer-right-example" data-drawer-backdrop="true">
                Tối ưu SEO
            </button>
            
        </div>
    </form>
</section>
@endsection