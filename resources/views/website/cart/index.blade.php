@extends('website.master')
@section('body')

    <main>

        <!-- breadcrumb area start -->
        <section class="breadcrumb__area include-bg pt-95 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__content p-relative z-index-1">
                            <h3 class="breadcrumb__title">Shopping Cart</h3>
                            <div class="breadcrumb__list">
                                <span><a href="#">Home</a></span>
                                <span>Shopping Cart</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end -->

        <!-- cart area start -->
        <section class="tp-cart-area pb-120">
            <div class="container">
                <div class="row">
                    <h4 class="text-center text-success">{{Session('message')}}</h4>
                    <div class="col-xl-9 col-lg-8">
                        <div class="tp-cart-list mb-25 mr-30">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th colspan="2" class="tp-cart-header-product">Product</th>
                                    <th class="tp-cart-header-name">Name</th>
                                    <th class="tp-cart-header-price">Color</th>
                                    <th class="tp-cart-header-price">Size</th>
                                    <th class="tp-cart-header-quantity">Quantity</th>
                                    <th class="tp-cart-header-price">Price</th>
                                    <th class="tp-cart-header-quantity">Total</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @php($sum=0)
                                @foreach($products as $product)
                                <tr>
                                    <!-- img -->
                                    <td class="tp-cart-img"><a href=""><img src="{{asset($product->options->image)}}" alt=""></a></td>
                                    <!-- title -->
                                    <td class="tp-cart-title"><a href="product-details.html">{{$product->name}}</a></td>
                                    <td class="tp-cart-title"><a href="product-details.html">{{$product->options->color}}</a></td>
                                    <td class="tp-cart-title"><a href="product-details.html">{{$product->options->size}}</a></td>
                                    <!-- price -->
                                    <td class="tp-cart-price"><span>{{$product->price}}</span></td>
                                    <!-- quantity -->
                                    <td class="col-lg-2 col-md-2 col-12">
                                        <form action="{{route('cart.update',$product->rowId)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                            <div class="input-group">
                                                <input class=" form-control" type="text" name="qty" value="{{$product->qty}}">
                                                <button type="submit" class="btn btn-primary" >Update</button>
                                            </div>
                                        </form>
                                    </td>
{{--                                    <td class="tp-cart-quantity">--}}
{{--                                        <div class="tp-product-quantity mt-10 mb-10">--}}
{{--                                       <span class="tp-cart-minus">--}}
{{--                                          <svg width="10" height="2" viewBox="0 0 10 2" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                             <path d="M1 1H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                          </svg>--}}
{{--                                       </span>--}}
{{--                                            <div class="input-group">--}}
{{--                                            <form action="{{route('cart.update',$product->rowId)}}" method="post">--}}
{{--                                                @csrf--}}
{{--                                                @method('PUT')--}}
{{--                                                <input class="tp-cart-input form-control" type="text" name="qty" value="{{$product->qty}}">--}}
{{--                                                <button type="submit" class="btn btn-primary" >Update</button>--}}
{{--                                            </form>--}}
{{--                                            </div>--}}
{{--                                            <span class="tp-cart-plus">--}}
{{--                                          <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                             <path d="M5 1V9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                             <path d="M1 5H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                          </svg>--}}
{{--                                       </span>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}

                                    <td class="tp-cart-price"><span>{{$product->price*$product->qty}}</span></td>
                                    <!-- action -->
                                    <td class="tp-cart-action">
                                        <form action="{{route('cart.destroy',$product->rowId)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        <button class="tp-cart-action-btn" type="submit">
                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z" fill="currentColor"/>
                                            </svg>
                                            <span>Remove</span>
                                        </button>
                                        </form>
                                    </td>
                                </tr>
                                @php($sum = $sum +($product->price*$product->qty))
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tp-cart-bottom">
                            <div class="row align-items-end">
                                <div class="col-xl-6 col-md-8">
                                    <div class="tp-cart-coupon">
                                        <form action="#">
                                            <div class="tp-cart-coupon-input-box">
                                                <label>Coupon Code:</label>
                                                <div class="tp-cart-coupon-input d-flex align-items-center">
                                                    <input type="text" placeholder="Enter Coupon Code">
                                                    <button type="submit">Apply</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-4">
                                    <div class="tp-cart-update text-md-end">

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="tp-cart-checkout-wrapper">
                            <div class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
                                <span class="tp-cart-checkout-top-title">Subtotal</span>
                                <span class="tp-cart-checkout-top-price">{{ round($sum) }}</span>
                            </div>
                            <div class="tp-cart-checkout-total d-flex align-items-center justify-content-between">
                                <span>Tax Amount 5%</span>
                                <span>{{$tax =round( ($sum*0.5))}}</span>
                            </div>
                            <div class="tp-cart-checkout-total d-flex align-items-center justify-content-between">
                                <span>Shipping</span>
                                <span>{{$shipping = 100}}</span>
                            </div>
                            <div class="tp-cart-checkout-total d-flex align-items-center justify-content-between">
                                <span>Total</span>
                                <span>{{ $total = $sum + $tax + $shipping }}</span>
                            </div>
                            <div class="tp-cart-checkout-proceed">
                                <a href="{{route('checkout')}}" class="tp-cart-checkout-btn w-100">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- cart area end -->

    </main>


@endsection
