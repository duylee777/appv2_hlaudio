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
                    <li><a class="nav-link" data-bs-toggle="tab" href="#account-details">Cài đặt tài khoản</a></li>
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
                    {{-- <div id="dashboard" class="tab-pane fade">
                        <h3 class="last-title">Bảng điều khiển </h3>
                        <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a></p>
                    </div>  --}}
                    <!-- end of tab-pane -->
                    {{-- <div id="orders" class="tab-pane fade">
                        <h3 class="last-title">Đơn hàng</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Order</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>September 10, 2019</td>
                                        <td>Processing</td>
                                        <td>$25.00 for 1 item </td>
                                        <td><a class="btn btn-secondary" href="cart.html">view</a></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>October 4, 2019</td>
                                        <td>Processing</td>
                                        <td>$17.00 for 1 item </td>
                                        <td><a class="btn btn-secondary" href="cart.html">view</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>  --}}
                    <!-- end of tab-pane -->
                    {{-- <div id="downloads" class="tab-pane fade">
                        <h3 class="last-title">Downloads</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Downloads</th>
                                        <th>Expires</th>
                                        <th>Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Volga - Ecommerce Bootstrap Template</td>
                                        <td>August 10, 2019</td>
                                        <td>Never</td>
                                        <td><a class="btn btn-secondary" href="#">Download File</a></td>
                                    </tr>
                                    <tr>
                                        <td>Gatcomart - Ecommerce HTML Template</td>
                                        <td>September 11, 2019</td>
                                        <td>Never</td>
                                        <td><a class="btn btn-secondary" href="#">Download File</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>  --}}
                    <!-- end of tab-pane -->
                    {{-- <div id="address" class="tab-pane">
                        <p>The following addresses will be used on the checkout page by default.</p>
                        <h4 class="billing-address">Địa chỉ</h4>
                        <a class="btn btn-secondary my-4" href="#">edit</a>
                        <address>
                            House #00<br>Road #00<br>Block #ABCD <br>State <br> UK <br>100000
                    </address>
                            <p>ITFirm</p>
                            <p>United State</p>
                    </div>  --}}
                    <!-- end of tab-pane -->
                    <div id="account-details" class="tab-pane fade active show">
                        <h3 class="last-title">Cài đặt tài khoản</h3>
                        @include('theme.auth.partials.update-profile-information-form')
                        @include('theme.auth.partials.update-password-form')
                        @include('theme.auth.partials.delete-user-form')
                        {{-- <div class="checkout_info">
                            <form class="form-row" action="#">
                                <div class="col-lg-12 text-left mb-20">
                                    <p class="register-page"> Already have an account? <a href="login.html">Log in instead!</a></p>
                                </div>
                                <div class="form_group col-12 col-lg-6">
                                    <label class="form-label">First Name <span>*</span></label>
                                    <input class="input-form" type="text">
                                </div>
                                <div class="form_group col-12 col-lg-6">
                                    <label class="form-label">Last Name <span>*</span></label>
                                    <input class="input-form" type="text">
                                </div>
                                <div class="form_group col-12">
                                    <label class="form-label">Email Address <span>*</span></label>
                                    <input class="input-form" type="text">
                                </div>
                                <div class="form_group col-12 col-lg-6">
                                    <label class="form-label">New Password <span>*</span></label>
                                    <input class="input-form input-login" type="text">
                                    <button class="show-btn">Show</button>
                                </div>
                                <div class="form_group col-12 col-lg-6">
                                    <label class="form-label">Confirm Password <span>*</span></label>
                                    <input class="input-form input-login" type="text">
                                    <button class="show-btn">Show</button>
                                </div>
                                <div class="form_group col-12 position-relative">
                                    <label class="form-label">Birthdate (Optional)</label>
                                    <input class="input-form" type="text">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <div class="form-check">
                                            <div class="custom-checkbox">
                                                <input class="form-check-input" type="checkbox" id="agree-condition">
                                                <span class="checkmark"></span>
                                                <label class="form-check-label" for="agree-condition">Receive Offers From Our Partners</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <div class="form-check">
                                            <div class="custom-checkbox">
                                                <input class="form-check-input" type="checkbox" id="agree-condition-2">
                                                <span class="checkmark"></span>
                                                <label class="form-check-label" for="agree-condition-2">Sign Up For Our Newsletter <br> Subscribe To Our Newsletters Now And Stay Up-To-Date With New Collections, The Latest Lookbooks And Exclusive Offers..</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mt-20">
                                    <input type="submit" class="btn-secondary" value="Register">
                                </div>
                            </form>
                        </div> --}}
                    </div> <!-- end of tab-pane -->
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
    });
</script>
@endsection