@extends('admin.layouts.index')
 
@section('title', 'Tạo mới danh mục')

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
        <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="{{ route('category.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2">Danh mục</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Thêm danh mục</span>
            </div>
        </li>
    </ol>
</nav>

<section class="bg-gray-50 py-4 sm:py-5 mt-5">
    <a href="{{ route('category.index') }}" class="mx-4 mb-4 inline-flex items-center gap-1 px-4 py-2 bg-white shadow rounded hover:bg-gray-100">
        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="8" viewBox="0 0 256 512">
            <path d="M31.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z"/>
        </svg>
        Quay lại
    </a>
    <h2 class=" mx-4 mb-4 text-xl font-bold text-blue-600">Thêm danh mục mới</h2>
    <form class="discount-form p-4 md:p-5" action="{{ route('category.store') }}" method="POST" class="" enctype="multipart/form-data">
        @csrf
        <div class="grid gap-4 mb-4 grid-cols-2">
            <div class="col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Danh mục</label>
                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Nhập danh mục ..." required="" onfocusin="prevData(this)" onchange="titleDefault(this)">
            </div>
            <div class="col-span-2">
                <label class="block mb-2 text-sm font-semibold text-gray-900">Danh mục cha</label>
                <select id="parent_id" name="parent_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="0" class="font-medium">Danh mục gốc
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" class="font-medium">{{$category->name}}
                    @endforeach
                </select>
            </div>
            <div class="col-span-2">
                <div class="flex items-center">
                    <input id="visible"  name="visible" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="visible" class="ms-2 text-sm font-semibold text-gray-900">Hiển thị cho khách hàng</label>
                </div>
            </div>
            <div class="col-span-2">
                <label for="description" class="block mb-2 text-sm font-semibold text-gray-900">Mô tả danh mục</label>
                <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Viết mô tả danh mục tại đây..."></textarea>
            </div>
        </div>

        <div class="flex flex-row gap-5">
            <button type="submit" class="btn_create_item text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                Tạo danh mục mới
            </button>
            
            {{-- SEO  --}}
            @include('admin.SEO.seo_drawer', ['isCreateForm' => true, 'urlDefault' => url(route('theme.category', ''))])
        </div>
    </form>
</section>
@endsection