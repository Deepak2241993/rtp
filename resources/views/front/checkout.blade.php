@extends('layouts.master')

@section('content')
    <!-- main body - start ================================================== -->
    <main>

        <!-- checkout-section - start ================================================== -->
        <section id="checkout-section" class="checkout-section sec-ptb-100 clearfix">
            <div class="container">
                @auth
                    @if (Auth::user()->role == '')
                        <div
                            class="row mt--30 mb-70 justify-content-lg-between justify-content-md-center justify-content-sm-center">
                            <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
                                <div class="register-item d-flex align-items-center">
                                    <p>Returning Customer? <a href="{{ route('account.login') }}">Click here to login</a></p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
                                <div class="register-item d-flex align-items-center">
                                    <p>Have a Coupon code? <a href="#!">Click here to enter your code</a></p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endauth

                <form id="orderForm">
                    <div class="row justify-content-lg-between justify-content-md-center justify-content-sm-center">
                        <div class="col-lg-7 col-md-8 col-sm-10 col-xs-12">
                            <div class="billing-form">
                                <h3 class="title-text mb-40">Billing Details</h3>
                                <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-item">
                                            <h4 class="form-title">Name<span class="text-danger">*</span></h4>
                                            <input type="text" name="firstname" id="firstname" class="form-control"
                                                placeholder=" Name"
                                                value="{{ auth()->check() ? auth()->user()->name : (isset($customerAddress) ? $customerAddress->firstname : '') }}" required>
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-item">
                                            <h4 class="form-title">Company Name (Optional)</h4>
                                            <input type="text" name="companyname" id="companyname" class="form-control"
                                                placeholder="Company Name"
                                                value="{{ auth()->check() ? auth()->user()->companyname : (isset($customerAddress) ? $customerAddress->companyname : '') }}">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-item">
                                            <h4 class="form-title">Phone Number<span class="text-danger">*</span></h4>
                                            <input type="tel" name="phone" id="phone" class="form-control"
                                                placeholder="Phone Number"
                                                value="{{ auth()->check() ? auth()->user()->phone : (isset($customerAddress) ? $customerAddress->phone : '') }}" required>
                                            <p></p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-item">
                                            <h4 class="form-title">Email Address<span class="text-danger">*</span></h4>
                                            <input type="email" name="email" id="email" class="form-control"
                                                placeholder="Email"
                                                value="{{ auth()->check() ? auth()->user()->email : (isset($customerAddress) ? $customerAddress->email : '') }}" required>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-item">
                                    <h4 class="form-title">Address<span class="text-danger">*</span></h4>
                                    <input type="text" name="address" id="address" class="form-control"
                                        placeholder="e.g. House, Road, Street Name"
                                        value="{{ !empty($customerAddress) ? $customerAddress->address : '' }}"required>
                                    <p></p>
                                </div>
                                <div class="form-item">
                                    <h4 class="form-title">Alternate Address</h4>
                                    <input type="text" name="alternateaddress" id="alternateaddress" class="form-control"
                                        placeholder="e.g. Alternate Address"
                                        value="">
                                    <p></p>
                                </div>
                                <div class="form-item mb-0">
                                    <h4 class="form-title">Order Notes (Optional)</h4>
                                    <textarea name="note" placeholder="Note about your order e.g. special note for your delivery"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-8 col-sm-10 col-xs-12">
                            <div class="checkout-sidebar">
                                <h3 class="title-text mb-40">Your Order</h3>
                                <div class="cart-items-list ul-li-block mb-60 clearfix">
                                    <ul class="clearfix">
                                        {{-- @php
                                            dd(Cart::content());
                                        @endphp --}}
                                        @php
                                                $subtotal = 0;
                                        @endphp
                                        @foreach (Cart::content() as $item)
                                                @php
                                                $subtotal += $item->price;
                                            @endphp                         
                                            <li>
                                                <div class="item-image">
                                                    @if (!empty($item->product->product_images->first()->image))
                                                        <img src="{{ asset('/uploads/product/' . $item->product->product_images->first()->image) }}"
                                                            alt="img-thumbnail" class="card-img-top rounded" />
                                                    @else
                                                        <img src="{{ asset('admin-assets/img/default-150X150.png') }}"
                                                            alt="Default" class="card-img-top rounded" />
                                                    @endif
                                                </div>
                                                {{-- @php
                                                    dd($item->all());
                                                @endphp --}}
                                                <div class="item-content">
                                                    <h4 class="item-title">{{ $item->name }}</h4>
                                                    <input type="hidden" id="itemName" value="{{ $item->name }}">
                                                    <input type="hidden" id="printSide" value="{{ $item->printedSides }}">
                                                    <span class="item-price">Price: ${{ number_format($item->price,2) }}</span>
                                                    <span class="item-size" id="itemSize">Size: {{ $item->size }}</span>
                                                    <input type="hidden" id="itemSizeInput" value="{{ $item->size }}">
                                                    <input type="hidden" id="itemColor" value="{{ $item->color }}">
                                                    <input type="hidden" id="itemQty" value="{{ $item->qty }}">
                                                    <span class="item-color" id="itemColorSpan">Color: {{ $item->color }}</span>
                                                    <input type="hidden" id="itemprintSide" value="{{ $item->printedSides }}">
                                                    <input type="hidden" id="itemPickupOption" value="{{ $item->pickup_option }}">
                                                    <input type="hidden" id="itemFinishings" value="{{ $item->finishings }}">
                                                    <input type="hidden" id="itemThickness" value="{{ $item->thickness }}">
                                                    <input type="hidden" id="itemWireStakesQtys" value="{{ $item->wirestakesqtys }}">
                                                    <input type="hidden" id="itemFrameSizes" value="{{ $item->framesizes }}">
                                                    <input type="hidden" id="itemDisplayTypes" value="{{ $item->displaytypes }}">
                                                    <input type="hidden" id="itemInstallations" value="{{ $item->installations }}">
                                                    <input type="hidden" id="itemMaterials" value="{{ $item->materials }}">
                                                    <input type="hidden" id="itemCorners" value="{{ $item->corners }}">
                                                    <input type="hidden" id="itemApplications" value="{{ $item->applications }}">
                                                    <input type="hidden" id="itemPaperThickness" value="{{ $item->paperthickness }}">
                                                    <input type="hidden" id="itemCopiesRequireds" value="{{ $item->copiesrequireds }}">
                                                    <input type="hidden" id="itemPagesInNotepads" value="{{ $item->pagesinnotepads }}">
                                                    <input type="hidden" id="itemUploadedFileName" value="{{ $item->uploadedFileName }}">
                                                    <input type="hidden" id="itemUploadTokenFile" value="{{ $item->uploadTokenFile }}">
                                                </div>
                                                <button type="button" class="remove-btn"
                                                    onclick="deleteItem('{{ $item->rowId }}');"><i
                                                        class="las la-times"></i></button>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="total-cost-bar mb-60 clearfix">
                                    <h3 class="title-text mb-0">Total Cost</h3>
                                    <div class="cost-info ul-li-block clearfix">
                                        @php
                                            $gst = $subtotal * 0.1;
                                        @endphp

                                        <ul class="clearfix">
                                            <li><strong>Subtotal</strong> <span>${{ number_format($subtotal, 2) }}</span>
                                            </li>
                                            <li><strong>GST (10%)</strong> <span>${{ number_format($gst, 2) }}</span></li>
                                        </ul>

                                    </div>
                                    @php
                                            $totalCost = $subtotal + $gst;
                                    @endphp
                                    <div class="total-cost clearfix">
                                        <strong>Total</strong>
                                        <span>${{ round($totalCost) }}</span>
                                    </div>
                                </div>
                                <div class="payment-information ul-li-block mb-60 clearfix">

                                    <ul class="clearfix">
                                        <li>
                                            <div class="checkbox-btn">
                                                <input id="credit-card" type="radio" name="payment_method"
                                                    value="stripe" checked>
                                                <input type="hidden" name="price" value="{{ $totalCost }}">
                                                <!-- Example price -->
                                                <input type="hidden" name="product" value="{{ $item->name }}">
                                                <label for="credit-card">Credit Card (Stripe)</label>
                                            </div>
                                            @if (Session::has('success'))
                                                <div class="alert alert-success">
                                                    {{ Session::get('success') }}
                                                    @php
                                                        Session::forget('success');
                                                    @endphp
                                                </div>
                                            @endif


                                        </li>
                                        {{-- <li>
                                            <div class="checkbox-btn">
                                                <input id="bank-transfer" type="radio" name="payment_method" value="bank">
                                                <label for="bank-transfer">Bank Deposit</label>
                                            </div>
                                            <p class="mb-10">
                                                Account Name: Ready To Print
                                            </p>
                                            <p class="mb-10" style="margin-left: 28px;">BSB: 000000</p>
                                            <p class="mb-10" style="margin-left: 28px;">Account Number: 000000</p>
                                            <br>
                                            <p class="mb-0">
                                                Your personal data will be used to process your order, support your experience
                                                throughout this website, and for other purposes described in our
                                                <strong>privacy policy</strong>.
                                            </p>
                                        </li> --}}
                                    </ul>
                                    {{-- <a
                                        href="{{ route('stripe.checkout', ['price' => $totalCost, 'product' => $item->name]) }}">Make
                                        Payment</a> --}}
                                    {{-- <button type="submit">Submit Payment</button> --}}

                                </div>

                                <button type="submit" class="btn bg-royal-blue">Place Order</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- checkout-section - end ================================================== -->
    </main>
    <!-- main body - end ================================================== -->
@endsection

@section('javascript.js')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        function deleteItem(rowId) {
            if (confirm("Are You Sure You Want To Remove?")) {
                $.ajax({
                    url: '{{ route('front.deleteItem.cart') }}',
                    type: 'post',
                    data: {
                        rowId: rowId
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == true) {
                            window.location.href = "{{ route('front.checkout') }}";
                        }

                    }
                });
            }
        }
       $(document).ready(function () {
    $("#orderForm").submit(function (event) {
        event.preventDefault();
        $('button[type="submit"]').prop('disabled', true).text("Processing...");

                var data = {
                    firstname: $('#firstname').val(),
                    lastname: $('#lastname').val(),
                    phone: $('#phone').val(),
                    email: $('#email').val(),
                    address: $('#address').val(),
                    note: $('textarea[name=note]').val(),
                    amount: '{{ Cart::subtotal() }}',
                    color: $('#itemColor').val(),
                    size: $('#itemSizeInput').val(),
                    qty: $('#itemQty').val(),
                    name: $('#itemName').val(),
                    pickup_option: $('#itemPickupOption').val(),
                    sides: $('#printSide').val(),
                    paymentmethod: $('input[name="payment_method"]:checked').val(),
                    price: $('input[name="price"]').val(),
                    product: $('input[name="product"]').val(),
                    finishings: $('#itemFinishings').val(),
                    thickness: $('#itemThickness').val(),
                    wirestakesqtys: $('#itemWireStakesQtys').val(),
                    framesizes: $('#itemFrameSizes').val(),
                    displaytypes: $('#itemDisplayTypes').val(),
                    installations: $('#itemInstallations').val(),
                    materials: $('#itemMaterials').val(),
                    corners: $('#itemCorners').val(),
                    applications: $('#itemApplications').val(),
                    paperthickness: $('#itemPaperThickness').val(),
                    copiesrequireds: $('#itemCopiesRequireds').val(),
                    pagesinnotepads: $('#itemPagesInNotepads').val(),
                    uploadedFileName: $('#itemUploadedFileName').val(),
                    uploadTokenFile: $('#itemUploadTokenFile').val()
                };


                if (data.paymentmethod === 'stripe') {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('stripe.createCheckoutSession') }}',
                        data: data,
                        success: function(response) {
                            if (response.sessionId) {
                                var stripe = Stripe(
                                    'pk_test_51P6NxUDgmzNjfEL6Ex6F2X1CbVwzGDUilDtlP82OY1TIv9xX2O8fRXkZVn8eGZKjGHClTHnmutiKl7t0Pl36Dplo006okFG2Ab'
                                    ); // Replace with your Stripe public key
                                stripe.redirectToCheckout({
                                    sessionId: response.sessionId
                                });
                            } else {
                                $('button[type="submit"]').prop('disabled', false);
                                alert(response.message);
                            }
                        },
                        error: function(error) {
                            $('button[type="submit"]').prop('disabled', false);
                            console.log(error);
                        }
                    });
                } else {
                    // Perform the regular AJAX request for other payment methods
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('front.processCheckout') }}',
                        data: data,
                        success: function(response) {
                            if (response.success) {
                                window.location.href = response.redirect_url;
                            } else {
                                $('button[type="submit"]').prop('disabled', false);
                                alert(response.message);
                            }
                        },
                        error: function(error) {
                            $('button[type="submit"]').prop('disabled', false);
                            console.log(error);
                        }
                    });
                }
            });
        });
    </script>
@endsection
