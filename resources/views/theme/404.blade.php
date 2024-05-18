@extends('theme.layouts.page')
@section('title','404')
@section('category-url', '')
@section('category-name', '')
@section('page-name', '404')
@section('page-content')
<!-- ================
404 Area Start
=====================-->
<div class="error_page_start">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>LỖI! KHÔNG TÌM THẤY TRANG</h2>
                <p>Xin lỗi nhưng trang bạn đang tìm kiếm không tồn tại, đã bị xóa, đã thay đổi tên hoặc tạm thời không có.</p>
                <div class="hom_btn">
                    <a href="{{route('theme.home')}}" class="btn-secondary">Quay về trang chủ</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ================
404 Area End
=====================-->
@endsection