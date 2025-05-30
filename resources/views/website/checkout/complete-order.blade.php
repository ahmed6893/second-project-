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
                                <span><a href="#">Checkout</a></span>
                                <span>Complete Order</span>
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
                    <div class="col-md-12">
                        <div class="card card-body">
                            <p>{{session('message')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- checkout area end -->


    </main>


@endsection
