@extends('theme.layouts.index')
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
                            <h1><a href="{{route('theme.home')}}">Trang chủ</a></h1>
                        </li>
                        @if (app()->view->getSections()['category-url'] != '')
                        <li>
                            <h1><a href="@yield('category-url')">@yield('category-name')</a></h1>
                        </li>
                        @endif
                        <li>@yield('page-name')</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--=====================
Breadcrumb Aera End
=========================-->

@yield('page-content')
<script>
    $(document).ready(function(){
        $(".category-dropdown").hide();
    });   
</script>
@endsection