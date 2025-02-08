@extends('admin.layouts.index')
@section('title', __("SEO page"))
@section('content')
    <nav class="flex mt-5 sm:mt-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-3 h-3 me-2.5 fill-cyan-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                    </svg>
                    <span class="text-sm font-medium text-cyan-500">SEO</span>
                </div>
            </li>
        </ol>
    </nav>
    <div class="p-4 mx-auto max-w-screen-2xl">
        <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg">
            <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                <div class="flex items-center flex-1 space-x-4">
                    <h2 class="text-black text-2xl font-semibold">SEO page</h2>
                </div>
                @if (auth()->user()->hasRole(config('global.default_roles.super_admin')))
                    <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3 hidden">
                        <a href="{{ route('SEO.create') }}" type="button" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Thêm SEO
                        </a>
                    </div>
                @endif
            </div>
            <!-- --------- -->
            <div class="overflow-x-auto p-4">
                <div class="flex flex-row flex-wrap gap-4 m-4">
                    <a href="{{route('SEO.edit', App\Models\SEO::where('type', 'home')->first()->id)}}" type="button" class="w-fit px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                        Trang chủ
                    </a>   
                    <a href="{{route('SEO.edit', App\Models\SEO::where('type', 'about')->first()->id)}}" type="button" class="w-fit px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                        Giới thiệu
                    </a>  
                    <a href="{{route('SEO.edit', App\Models\SEO::where('type', 'project')->first()->id)}}" type="button" class="w-fit px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                        Dự án
                    </a>   
                    <a href="{{route('SEO.edit', App\Models\SEO::where('type', 'article')->first()->id)}}" type="button" class="w-fit px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                        Bài viết
                    </a>   
                    <a href="{{route('SEO.edit', App\Models\SEO::where('type', 'agency')->first()->id)}}" type="button" class="w-fit px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 hidden">
                        Đại lý
                    </a>   
                    <a href="{{route('SEO.edit', App\Models\SEO::where('type', 'support')->first()->id)}}" type="button" class="w-fit px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 hidden">
                        Hỗ trợ
                    </a>  
                    <a href="{{route('SEO.edit', App\Models\SEO::where('type', 'download')->first()->id)}}" type="button" class="w-fit px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 hidden">
                        Tải về
                    </a>   
                    <a href="{{route('SEO.edit', App\Models\SEO::where('type', 'contact')->first()->id)}}" type="button" class="w-fit px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                        Liên hệ
                    </a>  
                    <a href="{{route('SEO.edit', App\Models\SEO::where('type', 'feature_product')->first()->id)}}" type="button" class="w-fit px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 hidden">
                        Sản phẩm
                    </a>  
                </div>
                
            </div>
        </div>
    </div>
@endsection