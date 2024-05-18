@extends('theme.layouts.index')
@section('title','Đăng ký')
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
                            <h1><a href="index.html">Home</a></h1>
                        </li>
                        <li>Register</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--=====================
Breadcrumb Aera End
=========================-->

<!--======================
Register area Start
==========================-->
<div class="register-area login-area mt-25">
    <div class="container">
        <div class="row">
            <div class="offset-lg-3 col-lg-6">
                <div class="checkout_info mb-20">
                    <form class="form-row" action="#">
                        <h5 class="last-title mb-10 text-center">Creat New Account</h5>
                        <div class="col-lg-12 text-left mb-20">
                            <p class="register-page"> Already have an account? <a href="login.html">Log in instead!</a></p>
                        </div>
                        <div class="form_group col-12">
                            <label class="form-label">First Name <span>*</span></label>
                            <input class="input-form" type="text">
                        </div>
                        <div class="form_group col-12">
                            <label class="form-label">Last Name <span>*</span></label>
                            <input class="input-form" type="text">
                        </div>
                        <div class="form_group col-12">
                            <label class="form-label">Email Address <span>*</span></label>
                            <input class="input-form" type="text">
                        </div>
                        <div class="form_group col-12">
                            <label class="form-label">Current Password <span>*</span></label>
                            <input class="input-form input-login" type="text">
                            <button class="show-btn">Show</button>
                        </div>
                        <div class="form_group col-12">
                            <label class="form-label">New Password <span>*</span></label>
                            <input class="input-form input-login" type="text">
                            <button class="show-btn">Show</button>
                        </div>
                        <div class="form_group col-12">
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
                </div>
            </div>
        </div>
    </div>
</div>
<!--======================
Register area End
==========================-->

@endsection