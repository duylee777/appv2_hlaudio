@extends('admin.layouts.index')
@section('title', 'Chỉnh sửa danh mục')
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
                <a href="{{ route('category.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Danh mục</a>
            </div>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2">{{$category->name}}</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Cập nhật danh mục</span>
            </div>
        </li>
    </ol>
</nav>

<section class="bg-gray-50 dark:bg-gray-900 py-4 sm:py-5 mt-5">
    <a href="{{ route('category.index') }}" class="mx-4 mb-4 inline-flex items-center gap-1 px-4 py-2 bg-white shadow rounded hover:bg-gray-100">
        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="8" viewBox="0 0 256 512">
            <path d="M31.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z"/>
        </svg>
        Quay lại
    </a>
    <h2 class=" mx-4 mb-4 text-xl font-bold text-yellow-300">Cập nhật danh mục</h2>
    <form class="update-category-{{$category->id}} p-4" action="{{ route('category.update', $category->id) }}" method="POST" class="p-4 md:p-5">
        @csrf
        @method('PUT')
        <div class="grid gap-4 mb-4 grid-cols-2">
        <div class="col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Danh mục</label>
                <input type="text" name="name" id="name-{{$category->id}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Nhập danh mục ..." value="{{ $category->name }}">
            </div>
            <div class="col-span-2">
                <label class="block mb-2 text-sm font-semibold text-gray-900">Danh mục cha</label>
                <select id="parent_id-{{$category->id}}" name="parent_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @if($category->parent_id == '0')
                        <option value="0" class="font-medium" selected>Danh mục gốc
                    @else
                        <option value="0" class="">Danh mục gốc
                    @endif
                    @foreach($categories as $cate)
                        @if($cate->id == $category->parent_id)
                            <option value="{{$cate->id}}" class="font-medium" selected>{{$cate->name}}
                        @else
                            <option value="{{$cate->id}}" class="">{{$cate->name}}
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-span-2">
                <div class="flex items-center">
                    @if($category->is_visible)
                        <input id="visible-{{$category->id}}"  name="visible" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500" checked>
                    @else
                        <input id="visible-{{$category->id}}"  name="visible" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    @endif
                    <label for="visible" class="ms-2 text-sm font-semibold text-gray-900">Hiển thị cho khách hàng</label>
                </div>
            </div>
            <div class="col-span-2">
                <label for="description" class="block mb-2 text-sm font-semibold text-gray-900">Mô tả danh mục</label>
                <textarea id="description-{{$category->id}}" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Viết mô tả danh mục tại đây...">{!! $category->description !!}</textarea>
            </div>
        </div>
        <div class="flex flex-row gap-5">
            <button type="submit" data-id="{{ $category->id }}" class="btn_update_item text-white inline-flex items-center bg-yellow-500 hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
                </svg>
                Cập nhật
            </button>
            
            {{-- SEO  --}}
            @include('admin.SEO.seo_drawer', ['isCreateForm' => false,'titleDefault' => $category->name, 'urlBase' => url(route('theme.category', '')), 'urlDefault' => url(route('theme.category', $category->slug))])

        </div>
    </form>
</section>
@endsection