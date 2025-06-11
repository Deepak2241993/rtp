@extends('layouts.master')

@section('style.css')
<style>
 .table-bordered-bottom {
    border-collapse: collapse !important;
    width: 100% !important;
}

.table-bordered-bottom td {
    border: none !important; /* Remove all borders */
}

.table-bordered-bottom tr:last-child td {
    border-bottom: 1px solid #dee2e6 !important; /* Add bottom border */
}
table.quote-results td {
    padding-top: .5em;
    padding-bottom: .5em;
    border-bottom: 1px dashed #b5b5b5;
    font-size: 16px;
    vertical-align: text-top;
    text-align: left;
}
</style>


@endsection
@section('content')
    <!-- cart-section - start -->
    <section id="cart-section" class="cart-section sec-ptb-100 clearfix">
        <div class="container">

            {{-- Display Success Message --}}
            {{-- @if (Session::has('success'))
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {!! Session::get('success') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif --}}

            {{-- Display Error Message --}}
            {{-- @if (Session::has('error'))
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif --}}

            @if (Cart::count() > 0)
            <div class="table-wrap">
               <table class="table text-center"> <!-- Added text-center class -->
    <thead>
        <tr>
            <th class="text-center">Product Name</th> <!-- Centered text -->
            <th class="text-center">Details</th> <!-- Centered text -->
        </tr>
    </thead>
    <tbody>
        @php
            $subtotal = 0;
        @endphp

        @foreach ($cartContent as $item)
            @php
          $attributePrice = App\Models\ProductAttribute::where('product_id', $item->id)->sum('attribute_price');
         $subtotal += $item->price * $item->qty; // <-- Add this line
            @endphp
{{-- {{dd($item->id);}} --}}
            <tr>
                <td>
                    <div class="product-info ul-li text-center"> <!-- Added text-center class -->
                        <ul class="clearfix">
                            <li>
                                <button type="button" class="remove-btn" onclick="deleteItem('{{ $item->rowId }}');">
                                    <i class="las la-times"></i>
                                </button>
                            </li>
                            <li>
                                <form action="{{ route('front.edit', ['rowId' => $item->rowId]) }}" method="GET">
                                    <button type="submit" class="edit-btn"><i class="las la-edit"></i></button>
                                </form>
                            </li>
                            <li>
                                <div class="product-image">
                                    @if (!empty($item->product->product_images->first()->image))
                                        <img src="{{ asset('/uploads/product/' . $item->product->product_images->first()->image) }}"
                                            alt="img-thumbnail" class="card-img-top rounded" />
                                    @else
                                        <img src="{{ asset('admin-assets/img/default-150X150.png') }}"
                                            alt="Default" class="card-img-top rounded" />
                                    @endif
                                    <h2 class="item-center mt-5" style="text-align: center;">{{ $item->name }}</h4>
                                </div>
                            </li>
                        </ul>
                    </div>
                </td>
                <td>
                    <table class="mx-auto table-bordered-bottom quote-results"> <!-- Added class for custom styling -->
{{-- {{dd($item);}} --}}
                        @if (!empty($item->color))
                            <tr>
                                <td colspan="2"><strong>Color:</strong></td>
                                <td>{{ $item->color }}</td>
                            </tr>
                        @endif

                         @if (!empty($item->size))
                            <?php 
                                // Split the size into width and height using 'x' as the separator
                                $sizeParts = explode('x', $item->size);
                                $width = trim($sizeParts[0]); // Extract and clean the width
                                $height = trim($sizeParts[1]); // Extract and clean the height
                            ?>
                            <tr>
                                <td colspan="2"><strong>Size:</strong></td>
                                <td>{{ $width }}mm W x {{ $height }}mm H</td>
                            </tr>
                        @endif

                        @if (!empty($item->printedSides))
                            <tr>
                                <td colspan="2"><strong>Printed Sides:</strong></td>
                                <td>{{ $item->printedSides }}</td>
                            </tr>
                        @endif
                        @if (!empty($item->printSides))
                            <tr>
                                <td colspan="2"><strong>Printed Sides:</strong></td>
                                <td>{{ $item->printSides }}</td>
                            </tr>
                        @endif

                        @if (!empty($item->pickup_option))
                            <tr>
                                <td colspan="2"><strong>Pickup Option:</strong></td>
                                <td>{{ $item->pickup_option }}</td>
                            </tr>
                        @endif

                        @if (!empty($item->finishings))
                            <tr>
                                <td colspan="2"><strong>Finishings:</strong></td>
                                <td>{{ $item->finishings }}</td>
                            </tr>
                        @endif

                        @if (!empty($item->thickness))
                            <tr>
                                <td colspan="2"><strong>Thickness:</strong></td>
                                <td>{{ $item->thickness }}</td>
                            </tr>
                        @endif

                        @if (!empty($item->wirestakesqtys))
                            <tr>
                                <td colspan="2"><strong>Wire Stakes Quantity:</strong></td>
                                <td>{{ $item->wirestakesqtys }}</td>
                            </tr>
                        @endif

                        @if (!empty($item->framesizes))
                            <tr>
                                <td colspan="2"><strong>Frame Sizes:</strong></td>
                                <td>{{ $item->framesizes }}</td>
                            </tr>
                        @endif

                        @if (!empty($item->displaytypes))
                            <tr>
                                <td colspan="2"><strong>Display Types:</strong></td>
                                <td>{{ $item->displaytypes }}</td>
                            </tr>
                        @endif

                        @if (!empty($item->installations))
                            <tr>
                                <td colspan="2"><strong>Installations:</strong></td>
                                <td>{{ $item->installations }}</td>
                            </tr>
                        @endif

                        @if (!empty($item->materials))
                            <tr>
                                <td colspan="2"><strong>Materials:</strong></td>
                                <td>{{ $item->materials }}</td>
                            </tr>
                        @endif

                        @if (!empty($item->corners))
                            <tr>
                                <td colspan="2"><strong>Corners:</strong></td>
                                <td>{{ $item->corners }}</td>
                            </tr>
                        @endif

                        @if (!empty($item->applications))
                            <tr>
                                <td colspan="2"><strong>Applications:</strong></td>
                                <td>{{ $item->applications }}</td>
                            </tr>
                        @endif

                        @if (!empty($item->paperthickness))
                            <tr>
                                <td colspan="2"><strong>Paper Thickness:</strong></td>
                                <td>{{ $item->paperthickness }}</td>
                            </tr>
                        @endif

                        @if (!empty($item->copiesrequireds))
                            <tr>
                                <td colspan="2"><strong>Copies Required:</strong></td>
                                <td>{{ $item->copiesrequireds }}</td>
                            </tr>
                        @endif

                        @if (!empty($item->pagesinnotepads))
                            <tr>
                                <td colspan="2"><strong>Pages in Notepads:</strong></td>
                                <td>{{ $item->pagesinnotepads }}</td>
                            </tr>
                        @endif

                        @if (!empty($item->uploadedFileName))
                            <tr>
                                <td colspan="2"><strong>Uploaded File Name:</strong></td>
                                <td>{{ $item->uploadedFileName }}</td>
                            </tr>
                        @endif

                        <!--<tr>-->
                        <!--    <td colspan="2"><strong>Basic Price</strong></td>-->
                        <!--    <td><span class="item-price">${{ $item->product->product_price }}</span></td>-->
                        <!--</tr>-->

                        <tr>
                            <td colspan="2"><strong>Quantity:</strong></td>
                            <td>
                            <span class="item-price">{{ $item->qty }}</span>
                                {{-- <div class="input-group quantity mx-auto" style="width: 100px;"> --}}
                                    {{-- <div class="input-group-btn">
                                        <button class="btn-dark btn btn-sm btn-minus p-2 pt-1 pb-1 sub" data-id="{{ $item->rowId }}">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div> --}}
                                    {{-- <input type="text" class="form-control form-control-sm border-0 text-center" value="{{ $item->qty }}"> --}}
                                    {{-- <div class="input-group-btn">
                                        <button class="btn-dark btn btn-sm btn-plus p-2 pt-1 pb-1 add" data-id="{{ $item->rowId }}">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div> --}}
                                {{-- </div> --}}
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2"><strong>Item Price:</strong></td>
                            <td><strong class="item-price">${{ number_format($item->price,2) }}</strong></td>
                        </tr>
                         <tr>
                             @php
                             $Item_price_without_tax= ($item->price) *  ($item->qty);
                                $gst_indivisual = $Item_price_without_tax  * 0.1;
                                $Subtotal_product_wise = $Item_price_without_tax + $gst_indivisual;
                            @endphp
                            <td colspan="2"><strong>GST:</strong></td>
                            <td><strong class="item-price">${{ number_format($gst_indivisual,2) }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>Total:</strong></td>
                           <td><strong class="item-price">${{ number_format($Subtotal_product_wise, 2) }}</strong></td>

                        </tr>
                    </table>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

            </div>

            <div class="cuponcode-form mb-70">
                <div class="row justify-content-lg-between justify-content-md-center justify-content-sm-center">
                    <div class="col-lg-4 col-md-7 col-sm-10 col-xs-12">
                        {{-- Coupon Code Form --}}
                        {{-- <form action="#">
                            <div class="form-item mb-0">
                                <input type="text" name="cupon" placeholder="coupon code">
                                <button type="submit" class="btn bg-royal-blue">Apply now</button>
                            </div>
                        </form> --}}
                    </div>

                    <div class="col-lg-7 col-md-7 col-sm-10 col-xs-12">
                        <div class="btns-group ul-li-right">
                            <ul class="clearfix">
                                <li><a href="{{ route('front.product-list') }}" class="btn bg-default-black">Continue Shopping</a></li>
                                {{-- <li><a href="#!" class="btn bg-royal-blue">Update Cart</a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-lg-end justify-content-md-center justify-content-sm-center">
    <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
    <div class="total-cost-bar mb-60 clearfix">
        <h3 class="title-text mb-0">Total Cost</h3>
        <div class="cost-info ul-li-block clearfix">
            @php
                $gst = $subtotal * 0.1;
                $total = $subtotal + $gst;
            @endphp

            <ul class="clearfix">
                <li><strong>Subtotal</strong> <span>${{ number_format($subtotal, 2) }}</span></li>
                <li><strong>GST (10%)</strong> <span>${{ number_format($gst, 2) }}</span></li>
                <li><strong>Total</strong> <span><strong>${{ number_format($total, 2) }}</strong></span></li>
            </ul>
        </div>

        <div class="btns-group ul-li-right mt-4">
            <ul class="clearfix">
                <li><a href="{{ route('front.checkout') }}" class="btn bg-royal-blue">Proceed to Checkout</a></li>
            </ul>
        </div>
    </div>
</div>

</div>


            @else
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Your Cart is Empty!</h4>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </section>
    <!-- cart-section - end -->
@endsection


@section('javascript.js')
    <script>
        $('.add').click(function() {
            var qtyElement = $(this).parent().prev(); // Qty Input
            var qtyValue = parseInt(qtyElement.val());
            if (qtyValue < 10) {
                qtyElement.val(qtyValue + 1);
                var rowId = $(this).data('id');
                var newQty = qtyElement.val();
                updateCart(rowId, newQty)
            }
        });

        $('.sub').click(function() {
            var qtyElement = $(this).parent().next();
            var qtyValue = parseInt(qtyElement.val());
            if (qtyValue > 1) {
                qtyElement.val(qtyValue - 1);
                var rowId = $(this).data('id');
                var newQty = qtyElement.val();
                updateCart(rowId, newQty)
            }
        });

        function updateCart(rowId, qty) {
            $.ajax({
                url: '{{ route("front.updateCart") }}',
                type: 'post',
                data: {
                    rowId: rowId,
                    qty: qty
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == true) {
                        window.location.href = '{{ route('front.cart') }}';
                    }

                }
            });
        }

        function deleteItem(rowId) {
            if (confirm("Are You Sure You Want Delete?")) {
                $.ajax({
                    url: '{{ route('front.deleteItem.cart') }}',
                    type: 'post',
                    data: {
                        rowId: rowId
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == true) {
                            window.location.href = '{{ route('front.cart') }}';
                        }

                    }
                });
            }
        }
    </script>
    {{-- <script>
        function editItem(rowId) {
            $.ajax({
                url: '{{ route('front.edit') }}',
                type: 'post',
                data: {
                    rowId: rowId
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == true) {
                        window.location.href = '{{ route('front.cart') }}';
                    }

                }
            });
}

    </script> --}}
@endsection
