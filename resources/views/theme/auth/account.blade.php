@extends('theme.layouts.page')
@section('title','Tài khoản của tôi')
@section('category-url', '')
@section('category-name', '')
@section('page-name', 'Tài khoản của tôi')
@section('page-content')
@vite(['resources/css/app.css', 'resources/js/app.js'])
<!--======================
My Account area Start
==========================-->
<div class="my-account-area mt-50">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-2">
                <ul class="nav flex-column dashboard-list mb-20 role=" tablist">
                    {{-- <li><a class="nav-link" data-bs-toggle="tab" href="#dashboard">Bảng điều khiển</a></li>
                    <li> <a class="nav-link active show" data-bs-toggle="tab" href="#orders">Đơn đặt hàng</a></li>
                    <li><a class="nav-link" data-bs-toggle="tab" href="#downloads">Tải về</a></li>
                    <li><a class="nav-link" data-bs-toggle="tab" href="#address">Địa chỉ</a></li> --}}
                    <li><a class="nav-link active show" data-bs-toggle="tab" href="#account-details">Cài đặt tài khoản</a></li>
                    <li><a class="nav-link" data-bs-toggle="tab" href="#order">Đơn hàng</a></li>
                    <li>
                        <button id="logout_account" class="w-100 px-3 py-1 bg-red-500 text-white">Đăng xuất</button>
                        <form id="logout_account_form" action="{{ route('logout')}}" method="post" hidden>
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-10">
                <!-- Tab panes -->
                <div class="tab-content dashboard-content mb-20">
                    <div id="account-details" class="tab-pane fade active show">
                        <h3 class="last-title">Cài đặt tài khoản</h3>
                        @include('theme.auth.partials.update-profile-information-form')
                        @include('theme.auth.partials.update-password-form')
                        @include('theme.auth.partials.delete-user-form')
                    </div>
                    <!-- end of tab-pane -->
                    <div id="order" class="tab-pane fade show">
                        <h3 class="last-title">Đơn hàng</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Thành tiền</th>
                                        <th>Trạng thái đơn hàng</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php 
                                        $orders = App\Models\Order::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
                                    @endphp
                                    @foreach($orders as $order)
                                        <tr>
                                            <td><strong>{{ $order->order_code }}</strong></td>
                                            <td>
                                                {{ Illuminate\Support\Number::currency($order->total_price, in: 'VND', locale: 'vi') }}
                                            </td>
                                            <td>
                                                @switch($order->status)
                                                    @case(config('global.order_status.pending'))
                                                        <span class="block w-max text-xs text-white bg-orange-500 px-2 py-1 rounded">{{ $order->status }}</span>
                                                        @break
                                                    @case(config('global.order_status.awaiting_shipment'))
                                                        <span class="block w-max text-xs text-white bg-yellow-300 px-2 py-1 rounded">{{ $order->status }}</span>
                                                        @break
                                                    @case(config('global.order_status.shipped'))
                                                        <span class="block w-max text-xs text-white bg-blue-500 px-2 py-1 rounded">{{ $order->status }}</span>
                                                        @break
                                                    @case(config('global.order_status.completed'))
                                                        <span class="block w-max text-xs text-white bg-green-500 px-2 py-1 rounded">{{ $order->status }}</span>
                                                        @break
                                                    @case(config('global.order_status.cancelled'))
                                                        <span class="block w-max text-xs text-white bg-gray-500 px-2 py-1 rounded">{{ $order->status }}</span>
                                                        @break
                                                    @case(config('global.order_status.refunded'))
                                                        <span class="block w-max text-xs text-white bg-gray-900 px-2 py-1 rounded">{{ $order->status }}</span>
                                                        @break
                                                    @case(config('global.order_status.disputed'))
                                                        <span class="block w-max text-xs text-white bg-red-600 px-2 py-1 rounded">{{ $order->status }}</span>
                                                        @break
                                                    @default
                                                @endswitch
                                            </td>
                                            <td>
                                                <div class="" style="display: flex; align-items:center; gap: 0.5rem;">
                                                    @include('theme.auth.partials.show-order')
                                                    @if($order->status == config('global.order_status.pending'))
                                                        <form id="form-del-order-{{$order->id}}" action="" method="">
                                                            <button class="del-order-btn" type="button" data-route="{{route('theme.del_order', $order->id)}}" data-status="{{ config('global.order_status.cancelled') }}">
                                                                <span class="text-sm bg-red-500 text-white px-6 py-2">Hủy đơn hàng</span>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--======================
My Account area End
==========================-->
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#logout_account').on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: "Bạn có chắc chắn muốn đăng xuất khỏi tài khoản ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Đăng xuất",
                cancelButtonText: "Quay lại"
                }).then((result) => {
                if (result.isConfirmed) {
                    $('#logout_account_form').submit();
                }   
            });
        });

        $('.del-order-btn').each(function(){
            $(this).on('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Bạn có chắc chắn muốn hủy đơn hàng ?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Hủy đơn hàng",
                    cancelButtonText: "Quay lại"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        // $('#form-del-order-'+$(this).data('id')).submit();
                        $.ajax({
                            type: 'POST',
                            url: $(this).data('route'),
                            data: {
                                status: $(this).data('status'),
                            },
                            success: function(results) {
                                Swal.fire({
                                    position: "center",
                                    icon: "success",
                                    title: results,
                                    showConfirmButton: false,
                                    timer: 2000,
                                });
                                setTimeout(function(){
                                    location.reload();
                                },2000);
                            },
                            error: function(results) {
                                Swal.fire({
                                    title: results.responseText,
                                    icon: "error",
                                });
                            },
                        });
                    }   
                });
            });
        });
    });
</script>
@endsection