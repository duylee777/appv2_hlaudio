@extends('theme.layouts.index')
@section('title','Thanh toán')
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
                        <li>Checkout</li>
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
Checkout area Start
==========================-->
<div class="checkout-area mt-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="user-actions">
                    <h5>
                        <i class="fa fa-file-o"></i>
                        Returning customer?
                        <a href="#" data-bs-toggle="collapse" data-bs-target="#checkout-login">Click here to login</a>
                    </h5>
                    <div id="checkout-login" class="collapse">
                        <div class="checkout_info">
                            <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing &amp; Shipping section.</p>
                            <form class="form-row" action="#">
                                <div class="form_group col-12 col-md-6">
                                    <label class="form-label">Username or email <span>*</span></label>
                                    <input class="input-form" type="text">
                                </div>
                                <div class="form_group col-12 col-md-6">
                                    <label class="form-label">Password <span>*</span></label>
                                    <input class="input-form" type="text">
                                </div>
                                <div class="form_group group_3 col-lg-1">
                                    <button class="login-register" type="submit">Login</button>
                                </div>
                                <div class="form_group group_3 col-lg-9">
                                    <label for="remember_box">
                                        <input id="remember_box" type="checkbox">
                                        <span> Remember me </span>
                                    </label>
                                </div>
                                <div class="col-lg-12 text-left">
                                    <a class="lost-password" href="#">Lost your password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="user-actions">
                    <h5>
                        <i class="fa fa-file-o"></i>
                        Returning customer?
                        <a href="#" data-bs-toggle="collapse" data-bs-target="#checkout_coupon">Click here to enter your code</a>
                    </h5>
                    <div id="checkout_coupon" class="collapse">
                        <div class="coupon-code">
                            <div class="coupon-inner">
                                <input placeholder="Coupon code" type="text">
                                <button type="submit">Apply coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <form class="form-row row">
                    <div class="col-lg-12">
                        <h5 class="form-head">Billing Details</h5>
                    </div>
                    <div class="form_group col-12 col-md-6 col-lg-6">
                        <label class="form-label">First Name <span>*</span></label>
                        <input class="input-form" type="text">
                    </div>
                    <div class="form_group col-12 col-md-6 col-lg-6">
                        <label class="form-label">Last Name <span>*</span></label>
                        <input class="input-form" type="text">
                    </div>
                    <div class="form_group col-12">
                        <label class="form-label">Company Name <span>*</span></label>
                        <input class="input-form" type="text">
                    </div>
                    <div class="form_group col-12">
                        <label class="form-label" for="state">Country <span>*</span></label>
                        <select class="niceselect-option nice-select select-option" name="country" id="state">
                            <option value="2">Bangladesh</option>
                            <option value="3">Algeria</option>
                            <option value="4">Afghanistan</option>
                            <option value="5">Ghana</option>
                            <option value="6">Albania</option>
                            <option value="7">Bahrain</option>
                            <option value="8">Colombia</option>
                            <option value="9">Dominican Republic</option>
                        </select>
                    </div>
                    <div class="form_group col-12">
                        <label class="form-label">Street Address <span>*</span></label>
                        <input placeholder="House number and street name" class="input-form" type="text">
                    </div>
                    <div class="form_group col-12">
                        <input placeholder="Apartment, suite, unit etc. (optional)" class="input-form" type="text">
                    </div>
                    <div class="form_group col-12">
                        <label class="form-label">Town / City <span>*</span></label>
                        <input class="input-form" type="text">
                    </div>
                    <div class="form_group col-12">
                        <label class="form-label">State / County <span>*</span></label>
                        <input class="input-form" type="text">
                    </div>
                    <div class="form_group col-12 col-md-6">
                        <label class="form-label">Phone <span>*</span></label>
                        <input class="input-form" type="text">
                    </div>
                    <div class="form_group col-12 col-md-6">
                        <label class="form-label">Email Address <span>*</span></label>
                        <input class="input-form" type="text">
                    </div>
                </form>
                <div class="form-row">
                    <div class="form-group col-12">
                        <div class="form-check">
                            <div class="custom-checkbox" data-bs-toggle="collapse" data-bs-target="#checkout-check" role="checkbox" aria-checked="false">
                                <input class="form-check-input" type="checkbox" id="create_account">
                                <span class="checkmark"></span>
                                <label class="form-check-label" for="create_account">Create an account?</label>
                            </div>
                        </div>
                        <div class="collapse" id="checkout-check">
                            <div class="checkout_info">
                                <p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                                <form class="form-row" action="#">
                                    <div class="form_group col-12">
                                        <label class="form-label">Account Password <span>*</span></label>
                                        <input class="input-form" type="text">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-md-12">
                        <div class="form-check">
                            <div class="custom-checkbox" data-bs-toggle="collapse" data-bs-target="#checkout-logs" role="checkbox" aria-checked="false">
                                <input class="form-check-input" type="checkbox" id="ship-address">
                                <span class="checkmark"></span>
                                <label class="form-check-label" for="ship-address">Ship to a different address?</label>
                            </div>
                        </div>
                        <div class="ship-box-info collapse" id="checkout-logs">
                            <form class="form-row">
                                <div class="form_group col-12 col-md-6">
                                    <label class="form-label">First Name <span>*</span></label>
                                    <input class="input-form" type="text">
                                </div>
                                <div class="form_group col-12 col-md-6">
                                    <label class="form-label">Last Name <span>*</span></label>
                                    <input class="input-form" type="text">
                                </div>
                                <div class="form_group col-12 col-md-6">
                                    <label class="form-label">Company Name <span>*</span></label>
                                    <input class="input-form" type="text">
                                </div>
                                <div class="form_group col-12 col-md-6">
                                    <label class="form-label">Email Address <span>*</span></label>
                                    <input class="input-form" type="text">
                                </div>
                                <div class="form_group col-12">
                                    <label class="form-label" for="country">Country <span>*</span></label>
                                    <select class="niceselect-option nice-select select-option" name="country" id="country">
                                        <option value="2">Bangladesh</option>
                                        <option value="3">Algeria</option>
                                        <option value="4">Afghanistan</option>
                                        <option value="5">Ghana</option>
                                        <option value="6">Albania</option>
                                        <option value="7">Bahrain</option>
                                        <option value="8">Colombia</option>
                                        <option value="9">Dominican Republic</option>
                                    </select>
                                </div>
                                <div class="form_group col-12">
                                    <label class="form-label">Street Address <span>*</span></label>
                                    <input class="input-form" type="text">
                                </div>
                                <div class="form_group col-12">
                                    <label class="form-label">Apartment/ suite, unit etc. (optional)</label>
                                    <input class="input-form" type="text">
                                </div>
                                <div class="form_group col-12">
                                    <label class="form-label">Town / City <span>*</span></label>
                                    <input class="input-form" type="text">
                                </div>
                                <div class="form_group col-12">
                                    <label class="form-label">Zip Code <span>*</span></label>
                                    <input class="input-form" type="text">
                                </div>
                                <div class="form_group col-12">
                                    <label class="form-label">Province <span>*</span></label>
                                    <input class="input-form" type="text">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="form-row mt-20 mb-15">
                    <div class="form_group mb-0 col-12">
                        <label class="form-label" for="order-note">Order Notes <span>*</span></label>
                        <textarea class="form-textarea" id="order-note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <form class="form-row">
                    <div class="col-lg-12">
                        <h5 class="form-head rs-padding">Your Order</h5>
                    </div>
                    <div class="col-lg-12">
                        <div class="order_table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> DSLR Cameras <strong> × 2</strong></td>



                                        <td> $165.00</td>
                                    </tr>
                                    <tr>
                                        <td> Lense Camera <strong> × 2</strong></td>
                                        <td> $50.00</td>
                                    </tr>
                                    <tr>
                                        <td> Digital Cameras <strong> × 2</strong></td>
                                        <td> $50.00</td>
                                    </tr>
                                    <tr>
                                        <td> Mirrorless Cameras <strong> × 1</strong></td>
                                        <td> $50.00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Cart Subtotal</th>
                                        <td>$215.00</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td><strong>$5.00</strong></td>
                                    </tr>
                                    <tr class="order_total">
                                        <th>Order Total</th>
                                        <td><strong>$220.00</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </form>
                <div class="form-row">
                    <div class="form-group col-12">
                        <div class="form-check">
                            <div class="custom-checkbox" data-bs-toggle="collapse" data-bs-target="#checkout-check-2" role="checkbox" aria-checked="false">
                                <input class="form-check-input" type="checkbox" id="create_account-2">
                                <span class="checkmark"></span>
                                <label class="form-check-label" for="create_account-2">Create an account</label>
                            </div>
                        </div>
                        <div class="collapse" id="checkout-check-2">
                            <div class="mt-10">
                                <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12">
                        <div class="form-check">
                            <div class="custom-checkbox" data-bs-toggle="collapse" data-bs-target="#bank-money" role="checkbox" aria-checked="false">
                                <input class="form-check-input" type="checkbox" id="bank_check">
                                <span class="checkmark"></span>
                                <label class="form-check-label" for="bank_check">Check Payments</label>
                            </div>
                        </div>
                        <div class="collapse" id="bank-money">
                            <div class="mt-10">
                                <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode. </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12">
                        <div class="form-check">
                            <div class="custom-checkbox" data-bs-toggle="collapse" data-bs-target="#cash-money" role="checkbox" aria-checked="false">
                                <input class="form-check-input" type="checkbox" id="bank_cash">
                                <span class="checkmark"></span>
                                <label class="form-check-label" for="bank_cash">Cash on Delivery</label>
                            </div>
                        </div>
                        <div class="collapse" id="cash-money">
                            <div class="mt-10">
                                <p>Pay with cash upon delivery. </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12">
                        <div class="form-check">
                            <div class="custom-checkbox" data-bs-toggle="collapse" data-bs-target="#bank-check" role="checkbox" aria-checked="false">
                                <input class="form-check-input" type="checkbox" id="bank_account">
                                <span class="checkmark"></span>
                                <label class="form-check-label" for="bank_account">PayPal Express Checkout</label>
                            </div>
                        </div>
                        <div class="collapse" id="bank-check">
                            <div class="mt-10">
                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account. </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12">
                        <div class="form-check">
                            <div class="custom-checkbox">
                                <input class="form-check-input" type="checkbox" id="agree-condition">
                                <span class="checkmark"></span>
                                <label class="form-check-label" for="agree-condition">I agree to the <a href="#">terms of service</a> and will adhere to them unconditionally.</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row justify-content-end mt-20 mb-20">
                    <input type="submit" class="btn-secondary" value="Continue to Payment">
                </div>
            </div>
        </div>
    </div>
</div>
<!--======================
Checkout area End
==========================-->

@endsection

