@extends('admin.layouts.index')
@section('title', 'Thương hiệu')
@section('content')

@if(Session::has('error'))
<div id="msgbox" class="mt-12 absolute top-4 right-4 w-[300px] border bg-red-500 px-4 py-2 rounded-lg shadow-soft-lg flex items-center justify-between" >
    <span class="text-white ">{{ Session::get('error') }}</span>
    <button type="" onclick="closeBox();"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg></button>
</div>
@endif
@if(Session::has('msg'))
<div id="msgbox" class="mt-12 absolute top-4 right-4 w-[300px] border bg-green-300 px-4 py-2 rounded-lg shadow-soft-lg flex items-center justify-between" >
    <span class="text-white ">{{ Session::get('msg') }}</span>
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
                <a href="{{ route('order.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2">Tag</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Cập nhật đơn hàng {{$order->order_code}}</span>
            </div>
        </li>
    </ol>
</nav>
@php
    if(Session::get('backLink') == "" && url()->current() != url()->previous()) {
        Session::put('backLink', url()->previous());
    }
    if(Session::get('backLink') != url()->current() && url()->current() != url()->previous()) {
        Session::put('backLink', url()->previous());
    }
@endphp
<section class="bg-gray-50 py-4 sm:py-5 mt-5">
    <div class="px-4 mx-auto max-w-screen-2xl">
        <a href="{{ Session::get('backLink') }}" class="mb-4 inline-flex items-center gap-1 px-4 py-2 bg-white shadow rounded hover:bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="8" viewBox="0 0 256 512">
                <path d="M31.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z"/>
            </svg>
            <!-- Quay lại -->
        </a>
    </div>
    <div class="flex items-center justify-between flex-1 px-4 mb-4">
        <h2 class="text-black text-2xl font-semibold">Cập nhật đơn hàng <span class="text-yellow-300">{{ $order->order_code }}</span></h2>
    </div>
    <form class="px-4" id="new-order-form" action="{{ route('order.update', $order->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <section class="grid gap-4 grid-cols-1 lg:grid-cols-2">
            <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                <div class="col-span-2">
                    <h4 class="block mb-2 text-xl font-medium text-gray-900">Thông tin người đặt hàng</h4>
                    <div class="flex flex-col">
                        <span>Họ tên: <strong>{{ $order->orderUser->name }}</strong></span>
                        <span>Số điện thoại: <strong>{{ $order->orderUser->phone }}</strong></span>
                        <span>Email: <strong>{{ $order->orderUser->email }}</strong></span>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                    <div class="col-span-2">
                        <h4 class="block mb-2 text-xl font-medium text-gray-900">Thông tin người nhận</h4>
                        <div class="flex flex-col">
                            <span>Họ tên: <strong>{{ $order->delivery_name }}</strong></span>
                            <span>Số điện thoại: <strong>{{ $order->delivery_phone }}</strong></span>
                            <span>Email: <strong>{{ $order->delivery_email }}</strong></span>
                            <span>Địa chỉ: <strong>{{ $order->delivery_address }}</strong></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="grid gap-4 grid-cols-1 lg:grid-cols-2">
            <div class="col-span-2">
                <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                    <div class="col-span-2">
                        <h4 class="block mb-2 text-xl font-medium text-gray-900">Thông tin đơn hàng</h4>
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="border border-blue-300 px-4 py-2">Sản phẩm</th>
                                    <th class="border border-blue-300 px-4 py-2">Số lượng</th>
                                    <th class="border border-blue-300 px-4 py-2">Giá tiền</th>
                                    <th class="border border-blue-300 px-4 py-2">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->cartItem()->get() as $item)
                                    <tr>
                                        <td class="border border-blue-300 px-4 py-2">{{ $item->product->name }}</td>
                                        <td class="border border-blue-300 px-4 py-2">{{ $item->quantity }}</td>
                                        <td class="border border-blue-300 px-4 py-2">
                                            {{ Illuminate\Support\Number::currency($item->product->odd_price, in: 'VND', locale: 'vi') }}
                                        </td>
                                        <td class="border border-blue-300 px-4 py-2">
                                            {{ Illuminate\Support\Number::currency($item->product->odd_price * $item->quantity, in: 'VND', locale: 'vi') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="border border-blue-300 px-4 py-2 text-center" colspan="3">Thuế(10%)</td>
                                    <td class="border border-blue-300 px-4 py-2">
                                        {{ Illuminate\Support\Number::currency($order->total_price * 0.1, in: 'VND', locale: 'vi') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border border-blue-300 px-4 py-2 text-center" colspan="3">Phí vận chuyển</td>
                                    <td class="border border-blue-300 px-4 py-2">
                                        {{ Illuminate\Support\Number::currency(50000, in: 'VND', locale: 'vi') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border border-blue-300 px-4 py-2 text-center font-bold" colspan="3">Tổng tiền</td>
                                    <td class="border border-blue-300 px-4 py-2 font-bold text-xl text-blue-600">
                                        {{ Illuminate\Support\Number::currency($order->total_price, in: 'VND', locale: 'vi') }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                    <div class="col-span-2">
                        <h4 class="block mb-2 text-xl font-medium text-gray-900">Trạng thái đơn hàng</h4>
                        @switch($order->status)
                            @case(config('global.order_status.pending'))
                                <span class="block w-max text-sm text-white bg-orange-500 px-6 py-2 rounded">{{ $order->status }}</span>
                                @break
                            @case(config('global.order_status.awaiting_shipment'))
                                <span class="block w-max text-sm text-white bg-yellow-300 px-6 py-2 rounded">{{ $order->status }}</span>
                                @break
                            @case(config('global.order_status.shipped'))
                                <span class="block w-max text-sm text-white bg-blue-500 px-6 py-2 rounded">{{ $order->status }}</span>
                                @break
                            @case(config('global.order_status.completed'))
                                <span class="block w-max text-sm text-white bg-green-500 px-6 py-2 rounded">{{ $order->status }}</span>
                                @break
                            @case(config('global.order_status.cancelled'))
                                <span class="block w-max text-sm text-white bg-gray-500 px-6 py-2 rounded">{{ $order->status }}</span>
                                @break
                            @case(config('global.order_status.refunded'))
                                <span class="block w-max text-sm text-white bg-gray-900 px-6 py-2 rounded">{{ $order->status }}</span>
                                @break
                            @case(config('global.order_status.disputed'))
                                <span class="block w-max text-sm text-white bg-red-600 px-6 py-2 rounded">{{ $order->status }}</span>
                                @break
                            @default
                        @endswitch
                    </div>
                </div>
            </div>
            <div class="">
                <div class="p-4 mb-4 grid gap-4 grid-cols-1 lg:grid-cols-2 bg-white shadow-md sm:rounded-lg">
                    <div class="col-span-2">
                        <h4 class="block mb-2 text-xl font-medium text-gray-900">Cập nhật tình trạng đơn hàng</h4>
                        <div class="">
                            <select class="border-blue-300 rounded text-blue-500 text-sm" name="status">
                                <option 
                                    value="{{ config('global.order_status.pending') }}" {{ $order->status == config('global.order_status.pending') ? 'selected' : ''}}>{{ config('global.order_status.pending') }}
                                </option>
                                <option value="{{ config('global.order_status.awaiting_shipment') }}" {{ $order->status == config('global.order_status.awaiting_shipment') ? 'selected' : ''}}>{{ config('global.order_status.awaiting_shipment') }}</option>
                                <option value="{{ config('global.order_status.shipped') }}" {{ $order->status == config('global.order_status.shipped') ? 'selected' : ''}}>{{ config('global.order_status.shipped') }}</option>
                                <option value="{{ config('global.order_status.completed') }}" {{ $order->status == config('global.order_status.completed') ? 'selected' : ''}}>{{ config('global.order_status.completed') }}</option>
                                <option value="{{ config('global.order_status.cancelled') }}" {{ $order->status == config('global.order_status.cancelled') ? 'selected' : ''}}>{{ config('global.order_status.cancelled') }}</option>
                                <option value="{{ config('global.order_status.refunded') }}" {{ $order->status == config('global.order_status.refunded') ? 'selected' : ''}}>{{ config('global.order_status.refunded') }}</option>
                                <option value="{{ config('global.order_status.disputed') }}" {{ $order->status == config('global.order_status.disputed') ? 'selected' : ''}}>{{ config('global.order_status.disputed') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="flex items-center flex-wrap gap-4">
            <button type="submit" class="text-white inline-flex items-center bg-amber-500 hover:bg-amber-700 border-2 border-amber-500 hover:border-yellow-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                <svg class="me-1 -ms-1 w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor">
                    <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
                </svg>
                Cập nhật
            </button>
            <a href="{{ route('order.index') }}" type="button" class="btn_cancel text-black inline-flex items-center border-2 bg-white rounded-lg text-sm px-5 py-2.5 text-center">
                Hủy bỏ
            </a>
        </div>
    </form>
</section>

@endsection