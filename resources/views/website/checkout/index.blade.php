@extends('website.master')
@section('body')

    <main>

        <!-- breadcrumb area start -->
        <section class="breadcrumb__area include-bg pt-95 pb-50" data-bg-color="#EFF1F5">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__content p-relative z-index-1">
                            <h3 class="breadcrumb__title">Checkout</h3>
                            <div class="breadcrumb__list">
                                <span><a href="#">Home</a></span>
                                <span>Checkout</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end -->

        <!-- checkout area start -->
        <section class="tp-checkout-area pb-120" data-bg-color="#EFF1F5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-7">
                        <div class="tp-checkout-verify">
                            <div class="tp-checkout-verify-item">
                                <p class="tp-checkout-verify-reveal">Returning customer? <button type="button" class="tp-checkout-login-form-reveal-btn">Click here to login</button></p>

                                <div id="tpReturnCustomerLoginForm" class="tp-return-customer">
                                    <form action="#">

                                        <div class="tp-return-customer-input">
                                            <label>Email</label>
                                            <input type="text" placeholder="Your Email">
                                        </div>
                                        <div class="tp-return-customer-input">
                                            <label>Password</label>
                                            <input type="password" placeholder="Password">
                                        </div>

                                        <div class="tp-return-customer-suggetions d-sm-flex align-items-center justify-content-between mb-20">
                                            <div class="tp-return-customer-remeber">
                                                <input id="remeber" type="checkbox">
                                                <label for="remeber">Remember me</label>
                                            </div>
                                            <div class="tp-return-customer-forgot">
                                                <a href="forgot.html">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <button type="submit" class="tp-return-customer-btn tp-checkout-btn">Login</button>
                                    </form>
                                </div>
                            </div>
                            <div class="tp-checkout-verify-item">
                                <p class="tp-checkout-verify-reveal">Have a coupon? <button type="button" class="tp-checkout-coupon-form-reveal-btn">Click here to enter your code</button></p>

                                <div id="tpCheckoutCouponForm" class="tp-return-customer">
                                    <form action="#">
                                        <div class="tp-return-customer-input">
                                            <label>Coupon Code :</label>
                                            <input type="text" placeholder="Coupon">
                                        </div>
                                        <button type="submit" class="tp-return-customer-btn tp-checkout-btn">Apply</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="tp-checkout-bill-area">
                            <h3 class="tp-checkout-bill-title">Order Details</h3>

                            <div class="tp-checkout-bill-form">
                                <form action="{{route('new-order')}}" method="POST">
                                    @csrf
                                    <div class="tp-checkout-bill-inner">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="tp-checkout-input">
                                                    <label>Delivery address</label>
                                                    <textarea placeholder="House number and street name" name="delivery_address"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="text-dark">Payment Method</label>
                                                <div class="tp-checkout-option-wrapper">
                                                    <div class="tp-checkout-option">
                                                        <input id="create_free_account" type="radio" name="payment_method" value="cash">
                                                        <label for="create_free_account">Cash On Delivery</label>
                                                    </div>
                                                    <div class="tp-checkout-option">
                                                        <input id="ship_to_diff_address" type="radio" name="payment_method" value="online">
                                                        <label for="ship_to_diff_address">Online</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tp-checkout-btn-wrapper">
                                                <button class="tp-checkout-btn w-100" type="submit">Confirm Order</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <!-- checkout place order -->
                        <div class="tp-checkout-place white-bg">
                            <h3 class="tp-checkout-place-title">Your Order</h3>

                            <div class="tp-order-info-list">
                                <ul>

                                    <!-- header -->
                                    <li class="tp-order-info-list-header">
                                        <h4>Product</h4>
                                        <h4>Total</h4>
                                    </li>
                                    <!-- item list -->
                                    @php($sum = 0)
                                    @foreach(Cart::content() as $item)
                                    <li class="tp-order-info-list-desc">
                                        <p class="text-dark">
                                            Name:{{$item->name}} <br/>
                                            Quantity:{{$item->qty}} <br/>
                                            Price:{{$item->price}}
                                        </p>
                                        <span>Price:{{$item->price * $item->qty}}</span>
                                    </li>
                                    @php($sum = $sum + ($item->price * $item->qty))
                                    @endforeach

                                    <!-- subtotal -->
                                    <li class="tp-order-info-list-subtotal">
                                        <span>Subtotal</span>
                                        <span>TK .{{$sum}}</span>
                                    </li>

                                    <!-- shipping -->
                                    <li class="tp-order-info-list-shipping">
                                        <span>Shipping</span>
                                        <span>Tk.{{$shipping = 100}}</span>
                                    </li>
                                    <li class="tp-order-info-list-shipping">
                                        <span>Tax Amount(5%)</span>
                                        <span>{{$tax = round( ($sum * 0.5))}}</span>
                                    </li>

                                    <!-- total -->
                                    <li class="tp-order-info-list-total">
                                        <span>Total</span>
                                        <span>Tk.{{ $totalPayable = $sum + $shipping + $tax }}</span>
                                    </li>
                                    <?php
                                        Session::put('order_total', $totalPayable);
                                        Session::put('tax_total', $tax);
                                        Session::put('shipping_total', $shipping);
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- checkout area end -->


    </main>


@endsection
