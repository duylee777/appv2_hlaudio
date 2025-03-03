@extends('admin.layouts.index')
@section('title','Chỉnh sửa SEO trang '.json_decode($SEOData->name))
@section('content')

@if(Session::has('success'))
<div id="toast-success" class="top-16 right-0 flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow fixed" role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
        </svg>
        <span class="sr-only">Check icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">{{ __(Session::get('success')) }}!</div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
</div>
@endif
@if(Session::has('error'))
<div id="toast-danger" class="top-16 right-0 flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow fixed" role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
        </svg>
        <span class="sr-only">Error icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">{{ __(Session::get('error')) }}!</div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-danger" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
</div>
@endif
<nav class="flex mt-4 sm:mt-1" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{route('SEO.index')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-cyan-500">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                    <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z"/>
                </svg>
                SEO
            </a>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-cyan-500 md:ms-2">{{__('edit').' SEO '.json_decode($SEOData->name)}}</span>
            </div>
        </li>
    </ol>
</nav>
<div class="py-4">
    <section class="bg-white">
        <div class="bg-gray-50 py-4 sm:py-5 mt-5">
            <a href="{{ route('SEO.index') }}" class="mx-4 mb-4 inline-flex items-center gap-1 px-4 py-2 bg-white shadow rounded hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="8" viewBox="0 0 256 512">
                    <path d="M31.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z"/>
                </svg>
                Quay lại
            </a>
            <h2 class=" mx-4 mb-4 text-xl font-bold text-blue-600">Chỉnh sửa SEO {{json_decode($SEOData->name)}}</h2>
            <form method="POST" action="{{ route('SEO.update', $SEOData->id) }}" class="px-4" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @php
                    $metaDefault = config('app_seo_default.metaTags');
                    $metaDefault->og_image = json_encode(asset($metaDefault->og_image));
                    $metaDefault->og_image_secure_url = json_encode(asset($metaDefault->og_image_secure_url));
                    $metaDefault->twitter_image = json_encode(asset($metaDefault->twitter_image));
                @endphp
                <div class="flex flex-row flex-wrap gap-4">
                    <div class="w-[calc(50%-8px)] max-md:w-full hidden">
                        <label for="name" class="block mb-2 font-semibold text-gray-900">Trang (<span class="text-rose-600">*</span>)</label>
                        <input type="text" name="seo_name" id="name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="name..." required="" value="{{json_decode($SEOData->name)}}">
                    </div>
                    <div class="w-[calc(50%-8px)] max-md:w-full hidden">
                        <label for="type" class="block mb-2 font-semibold text-gray-900">Type (<span class="text-rose-600">*</span>)</label>
                        <input type="text" name="seo_type" id="type" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="type..." required="" value="{{$SEOData->type}}">
                    </div>
                    <div class="w-[calc(50%-8px)] max-md:w-full hidden">
                        <label for="type" class="block mb-2 font-semibold text-gray-900">Type_id</label>
                        <input type="text" name="seo_type_id" id="type_id" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="type_id..." value="{{$SEOData->type_id}}">
                    </div>
                    <div class="w-[calc(50%-8px)] max-md:w-full">
                        <label for="title" class="block mb-2 font-semibold text-gray-900">Thẻ title</label>
                        <textarea name="seo_title" id="title" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="{{(json_decode($SEOData->name) == "Trang chủ" ? "Hienluong Audio - " : "").json_decode($SEOData->name)}}" onfocusin="focusInPut(this)">{{json_decode($SEOData->title) ?? (json_decode($SEOData->name) == "Trang chủ" ? "Hienluong Audio - " : "").json_decode($SEOData->name)}}</textarea>
                    </div>
                    <div class="w-[calc(50%-8px)] max-md:w-full">
                        <label for="robots" class="block mb-2 font-semibold text-gray-900">Thẻ meta robots</label>
                        <textarea name="seo_robots" id="robots" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="{{json_decode($metaDefault->robots)}}" onfocusin="focusInPut(this)">{{json_decode($SEOData->robots)}}</textarea>
                    </div>
                    <div class="w-[calc(50%-8px)] max-md:w-full">
                        <label for="description" class="block mb-2 font-semibold text-gray-900">Thẻ meta description</label>
                        <textarea name="seo_description" id="description" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="{{json_decode($metaDefault->description)}}" onfocusin="focusInPut(this)">{{json_decode($SEOData->description)}}</textarea>
                    </div>
                    <div class="w-[calc(50%-8px)] max-md:w-full">
                        <label for="keywords" class="block mb-2 font-semibold text-gray-900">Thẻ meta keywords</label>
                        <textarea name="seo_keywords" id="keywords" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="{{json_decode($metaDefault->keywords)}}" onfocusin="focusInPut(this)">{{json_decode($SEOData->keywords)}}</textarea>
                    </div>
        
                    <div class="w-[calc(50%-8px)] max-md:w-full">
                        <label for="og_locale" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:locale</label>
                        <textarea name="seo_og_locale" id="og_locale" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="{{json_decode($metaDefault->og_locale)}}" onfocusin="focusInPut(this)">{{json_decode($SEOData->og_locale)}}</textarea>
                    </div>
                    <div class="w-[calc(50%-8px)] max-md:w-full">
                        <label for="og_site_name" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:site_name</label>
                        <textarea name="seo_og_site_name" id="og_site_name" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="{{json_decode($metaDefault->og_site_name)}}" onfocusin="focusInPut(this)">{{json_decode($SEOData->og_site_name)}}</textarea>
                    </div>
                    <div class="w-[calc(50%-8px)] max-md:w-full">
                        <label for="og_description" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:description</label>
                        <textarea name="seo_og_description" id="og_description" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="{{json_decode($metaDefault->og_description)}}" onfocusin="focusInPut(this)">{{json_decode($SEOData->og_description)}}</textarea>
                    </div>
                    <div class="w-[calc(50%-8px)] max-md:w-full">
                        <label for="og_title" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:title</label>
                        <textarea name="seo_og_title" id="og_title" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="{{(json_decode($SEOData->name) == "Trang chủ" ? "Hienluong Audio - " : "").json_decode($SEOData->name)}}" onfocusin="focusInPut(this)">{{json_decode($SEOData->og_title) ?? (json_decode($SEOData->name) == "Trang chủ" ? "Hienluong Audio - " : "").json_decode($SEOData->name)}}</textarea>
                    </div>
        
                    <div class="w-[calc(50%-8px)] max-md:w-full">
                        <label for="og_type" class="block mb-2 font-semibold text-gray-900">Thẻ og:type</label>
                        <textarea name="seo_og_type" id="og_type" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="object" onfocusin="focusInPut(this)">{{json_decode($SEOData->og_type)}}</textarea>
                    </div>
                    <div class="w-[calc(50%-8px)] max-md:w-full">
                        <label for="og_url" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:url</label>
                        <textarea name="seo_og_url" id="og_url" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Có thể để trống, mặc định là url của trang">{{json_decode($SEOData->og_url)}}</textarea>
                    </div>
                    <div class="w-[calc(50%-8px)] max-md:w-full">
                        <label for="article_publisher" class="block mb-2 font-semibold text-gray-900">Thẻ meta article:publisher</label>
                        <textarea name="seo_article_publisher" id="article_publisher" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="{{json_decode($metaDefault->article_publisher)}}" onfocusin="focusInPut(this)">{{json_decode($SEOData->article_publisher)}}</textarea>
                    </div>
                    <div class="w-[calc(50%-8px)] max-md:w-full">
                        <label for="og_image" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image</label>
                        <textarea name="seo_og_image" id="og_image" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="{{json_decode($metaDefault->og_image)}}" onfocusin="focusInPut(this)">{{json_decode($SEOData->og_image)}}</textarea>
                    </div>
                    <div class="w-[calc(50%-8px)] max-md:w-full">
                        <label for="og_image_secure_url" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image:secure_url</label>
                        <textarea name="seo_og_image_secure_url" id="og_image_secure_url" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="{{json_decode($metaDefault->og_image_secure_url)}}" onfocusin="focusInPut(this)">{{json_decode($SEOData->og_image_secure_url)}}</textarea>
                    </div>
                    
                    <div class="w-[calc(50%-8px)] max-md:w-full">
                        <label for="og_image_height" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image:height</label>
                        <textarea name="seo_og_image_height" id="og_image_height" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="{{json_decode($metaDefault->og_image_height)}}" onfocusin="focusInPut(this)">{{json_decode($SEOData->og_image_height)}}</textarea>
                    </div>
                    <div class="w-[calc(50%-8px)] max-md:w-full">
                        <label for="og_image_width" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image:width</label>
                        <textarea name="seo_og_image_width" id="og_image_width" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="{{json_decode($metaDefault->og_image_width)}}" onfocusin="focusInPut(this)">{{json_decode($SEOData->og_image_width)}}</textarea>
                    </div>
                    <div class="w-[calc(50%-8px)] max-md:w-full">
                        <label for="og_image_type" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image:type</label>
                        <textarea name="seo_og_image_type" id="og_image_type" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="{{json_decode($metaDefault->og_image_type)}}" onfocusin="focusInPut(this)">{{json_decode($SEOData->og_image_type)}}</textarea>
                    </div>
                    
                    <div class="w-[calc(50%-8px)] max-md:w-full">
                        <label for="og_image_alt" class="block mb-2 font-semibold text-gray-900">Thẻ og:image:alt</label>
                        <textarea name="seo_og_image_alt" id="og_image_alt" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="{{json_decode($metaDefault->og_image_alt)}}" onfocusin="focusInPut(this)">{{json_decode($SEOData->og_image_alt)}}</textarea>
                    </div>
                    <div class="w-[calc(50%-8px)] max-md:w-full">
                        <label for="twitter_site" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:site</label>
                        <textarea name="seo_twitter_site" id="twitter_site" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="{{json_decode($metaDefault->twitter_site)}}" onfocusin="focusInPut(this)">{{json_decode($SEOData->twitter_site)}}</textarea>
                    </div>
                    <div class="w-[calc(50%-8px)] max-md:w-full">
                        <label for="twitter_card" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:card</label>
                        <textarea name="seo_twitter_card" id="twitter_card" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="{{json_decode($metaDefault->twitter_card)}}" onfocusin="focusInPut(this)">{{json_decode($SEOData->twitter_card)}}</textarea>
                    </div>
                    
                    <div class="w-[calc(50%-8px)] max-md:w-full">
                        <label for="twitter_creator" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:creator</label>
                        <textarea name="seo_twitter_creator" id="twitter_creator" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="{{json_decode($metaDefault->twitter_creator)}}" onfocusin="focusInPut(this)">{{json_decode($SEOData->twitter_creator)}}</textarea>
                    </div>
                    <div class="w-[calc(50%-8px)] max-md:w-full">
                        <label for="twitter_title" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:title</label>
                        <textarea name="seo_twitter_title" id="twitter_title" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="{{(json_decode($SEOData->name) == "Trang chủ" ? "Hienluong Audio - " : "").json_decode($SEOData->name)}}" onfocusin="focusInPut(this)">{{json_decode($SEOData->twitter_title) ?? (json_decode($SEOData->name) == "Trang chủ" ? "Hienluong Audio - " : "").json_decode($SEOData->name)}}</textarea>
                    </div>
                    <div class="w-[calc(50%-8px)] max-md:w-full">
                        <label for="twitter_description" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:description</label>
                        <textarea name="seo_twitter_description" id="twitter_description" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="{{json_decode($metaDefault->twitter_description)}}" onfocusin="focusInPut(this)">{{json_decode($SEOData->twitter_description)}}</textarea>
                    </div>
                    <div class="w-[calc(50%-8px)] max-md:w-full">
                        <label for="twitter_image" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:image</label>
                        <textarea name="seo_twitter_image" id="twitter_image" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="{{json_decode($metaDefault->twitter_image)}}" onfocusin="focusInPut(this)">{{json_decode($SEOData->twitter_image)}}</textarea>
                    </div>
                    <div class="w-[calc(50%-8px)] max-md:w-full">
                        <label for="twitter_label1" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:label1</label>
                        <textarea name="seo_twitter_label1" id="twitter_label1" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Có thể để trống">{{json_decode($SEOData->twitter_label1)}}</textarea>
                    </div>
                    <div class="w-[calc(50%-8px)] max-md:w-full">
                        <label for="twitter_data1" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:data1</label>
                        <textarea name="seo_twitter_data1" id="twitter_data1" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Có thể để trống">{{json_decode($SEOData->twitter_data1)}}</textarea>
                    </div>
                </div>
                <div class="text-left">
                    <button type="submit" onclick="return confirm('Xác nhận chỉnh sửa?')" class="px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-800">
                        Chỉnh sửa
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>
<script type="text/javascript">
    function focusInPut(element) {
        if ($(element).val() == "") {
            console.log(true);
            $(element).val($(element).attr('placeholder'));
        }
        else{
            console.log(false);
        }
    }
</script>
@endsection