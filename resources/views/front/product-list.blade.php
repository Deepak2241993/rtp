@extends('layouts.master')

@section('content')
    <!-- shop-section - start
               ================================================== -->
    <section class="shop-section sec-ptb-100 pb-0 decoration-wrap clearfix">
        <div class="container">
            <div class="row justify-content-lg-between justify-content-md-center justify-content-sm-center">

                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 order-last">
                    <div class="filter-wrap border-bottom clearfix">
                        <div class="row">
                            <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12">
                                <div class="layout-tab ul-li clearfix">
                                    <ul class="nav" role="tablist">
                                        <li>
                                            <a data-toggle="tab" href="#column-3-tab">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="000000">
                                                    <path id="_3_Grid" data-name="3 Grid" class="cls-1"
                                                        d="M675,571h3.812v3.812H675V571Zm0,6.094h3.812v3.812H675v-3.812Zm0,6.093h3.812V587H675v-3.813ZM681.094,571h3.812v3.812h-3.812V571Zm0,6.094h3.812v3.812h-3.812v-3.812Zm0,6.093h3.812V587h-3.812v-3.813ZM687.188,571H691v3.812h-3.812V571Zm0,6.094H691v3.812h-3.812v-3.812Zm0,6.093H691V587h-3.812v-3.813Z"
                                                        transform="translate(-675 -571)" />
                                                </svg>
                                            </a>
                                        </li>
                                        {{-- <li>
                                            <a data-toggle="tab" href="#column-2-tab">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="000000">
                                                    <path id="_2_Grid" data-name="2 Grid" class="cls-1"
                                                        d="M707,580h7v7h-7v-7Zm10,1h6v6h-6v-6Zm-10-10h7v7h-7v-7Zm9,9h7v7h-7v-7Zm1-9h6v6h-6v-6Zm-1,0h7v7h-7v-7Z"
                                                        transform="translate(-707 -571)" />
                                                </svg>
                                            </a>
                                        </li> --}}
                                        <li>
                                            <a class="active" data-toggle="tab" href="#list-layout-tab">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="000000">
                                                    <path id="_1_Grid" data-name="1 Grid" class="cls-1"
                                                        d="M738,571h4v4h-4v-4Zm0,6h4v4h-4v-4Zm0,6h4v4h-4v-4Zm6-12h10v4H744v-4Zm0,6h10v4H744v-4Zm0,6h10v4H744v-4Z"
                                                        transform="translate(-738 -571)" />
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            {{-- <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 text-center">

                                <p class="result-text">We found <span>{{ $productsCount }}</span> products are available for
                                    you</p>
                            </div> --}}

                            {{-- <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12">
                                <div class="dropdown select-option float-right">
                                    <button class="dropdown-toggle" type="button" id="filter-options"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="las la-bars"></i> Default Shorting
                                    </button>
                                    <div aria-labelledby="filter-options" class="dropdown-menu ul-li-block clearfix">
                                        <ul class="clearfix">
                                            <li><a href="#!">Option 1</a></li>
                                            <li><a href="#!">Option 2</a></li>
                                            <li><a href="#!">Option 3</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                    <div class="tab-content">
                        <div id="column-3-tab" class="tab-pane fade">
                            <div class="row mb-70 justify-content-center">

                                @if ($products->isNotEmpty())
                                    @foreach ($products as $product)
                                        @php
                                            $productsImage = $product->product_images->first();
                                        @endphp

                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="product-grid text-center clearfix">
                                                <div class="item-image">
                                                    <a href="{{ route('front.product', $product->product_slug) }}"
                                                        class="image-wrap">
                                                        @if (!empty($productsImage->image))
                                                            <img src="{{ asset('/uploads/product/' . $productsImage->image) }}"
                                                                alt="img-thumbnail" class="card-img-top rounded" />
                                                        @else
                                                            <img src="{{ asset('admin-assets/img/default-150X150.png') }}"
                                                                alt="Default" class="card-img-top rounded" />
                                                        @endif
                                                    </a>
                                                    <div class="post-label ul-li-right clearfix">
                                                        <ul class="clearfix">
                                                            {{-- <li class="bg-skyblue">-19%</li>
                                                    <li class="bg-skyblue">TOP</li> --}}
                                                        </ul>
                                                    </div>
                                                    <!--<div class="btns-group ul-li-center clearfix">-->
                                                    <!--    <ul class="clearfix">-->
                                                    <!--        <li><a href="{{ route('front.product', $product->product_slug) }}"-->
                                                    <!--                data-toggle="tooltip" data-placement="top"-->
                                                    <!--                title="Add To Cart"><i-->
                                                    <!--                    class="las la-shopping-basket"></i></a>-->
                                                    <!--        </li>-->
                                                    <!--        <li>-->
                                                    <!--            <a class="tooltipes" href="#!" data-placement="top"-->
                                                    <!--                title="Quick View" data-toggle="modal"-->
                                                    <!--                data-target="#quickview-modal">-->
                                                    <!--                <i class="las la-dot-circle"></i>-->
                                                    <!--            </a>-->
                                                    <!--        </li>-->
                                                    <!--        {{-- <li><a href="#!" data-toggle="tooltip" data-placement="top"-->
                                                    <!--        title="Compare Product"><i class="las la-sync"></i></a></li> --}}-->
                                                    <!--        <li><a onclick="addToWishList({{ $product->id }})" href="javascript:void(0);" data-toggle="tooltip" data-placement="top"-->
                                                    <!--                title="Add To Wishlist"><i class="lar la-heart"></i></a>-->
                                                    <!--        </li>-->
                                                    <!--    </ul>-->
                                                    <!--</div>-->
                                                </div>
                                                <div class="item-content">
                                                    <h3 class="item-title">
                                                        <a
                                                            href="{{ route('front.product', $product->product_slug) }}">{{ $product->product_name }}</a>
                                                    </h3>
                                                    {{-- <span class="item-price">${{ $product->product_price }}</span> --}}
                                                    <div class="rating-star ul-li-center clearfix">
                                                        <ul class="clearfix">
                                                            <li class="active"><i class="las la-star"></i></li>
                                                            <li class="active"><i class="las la-star"></i></li>
                                                            <li class="active"><i class="las la-star"></i></li>
                                                            <li class="active"><i class="las la-star"></i></li>
                                                            <li><i class="las la-star"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @else
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="alert alert-danger text-center">
                                                <strong>No Products Found!</strong>
                                            </div>
                                        </div>
                                @endif

                            </div>

                            <div class="pagination-nav ul-li-center clearfix">
                                {{ $products->links() }}
                                {{-- <ul class="clearfix">
                                    <li><a href="#!"><i class="las la-angle-left"></i></a></li>
                                    <li><a href="#!">1</a></li>
                                    <li><a href="#!">2</a></li>
                                    <li><a href="#!">...</a></li>
                                    <li><a href="#!">6</a></li>
                                    <li><a href="#!"><i class="las la-angle-right"></i></a></li>
                                </ul> --}}
                            </div>
                        </div>

                        <div id="column-2-tab" class="tab-pane fade">
                            <div class="row has-column-2 mb-70 justify-content-center">

                                @if ($products->isNotEmpty())
                                    @foreach ($products as $product)
                                        @php
                                            $productsImage = $product->product_images->first();
                                        @endphp
                                        <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                                            <div class="product-grid text-center clearfix">
                                                <div class="item-image">
                                                    <a href="{{ route('front.product', $product->product_slug) }}"
                                                        class="image-wrap">
                                                        @if (!empty($productsImage->image))
                                                            <img src="{{ asset('/uploads/product/' . $productsImage->image) }}"
                                                                alt="img-thumbnail" class="card-img-top rounded" />
                                                        @else
                                                            <img src="{{ asset('admin-assets/img/default-150X150.png') }}"
                                                                alt="Default" class="card-img-top rounded" />
                                                        @endif
                                                    </a>
                                                    <div class="post-label ul-li-right clearfix">
                                                        <ul class="clearfix">
                                                            {{-- <li class="bg-skyblue">-19%</li>
                                                        <li class="bg-skyblue">TOP</li> --}}
                                                        </ul>
                                                    </div>
                                                    <!--<div class="btns-group ul-li-center clearfix">-->
                                                    <!--    <ul class="clearfix">-->
                                                    <!--        <li><a href="{{ route('front.product', $product->product_slug) }}"-->
                                                    <!--                data-toggle="tooltip" data-placement="top"-->
                                                    <!--                title="Add To Cart"><i-->
                                                    <!--                    class="las la-shopping-basket"></i></a>-->
                                                    <!--        </li>-->
                                                    <!--        <li>-->
                                                    <!--            <a class="tooltipes" href="#!" data-placement="top"-->
                                                    <!--                title="Quick View" data-toggle="modal"-->
                                                    <!--                data-target="#quickview-modal">-->
                                                    <!--                <i class="las la-dot-circle"></i>-->
                                                    <!--            </a>-->
                                                    <!--        </li>-->
                                                    <!--        {{-- <li><a href="#!" data-toggle="tooltip" data-placement="top"-->
                                                    <!--            title="Compare Product"><i class="las la-sync"></i></a></li> --}}-->
                                                    <!--        <li><a onclick="addToWishList({{ $product->id }})" href="javascript:void(0);" data-toggle="tooltip"-->
                                                    <!--                data-placement="top" title="Add To Wishlist"><i-->
                                                    <!--                    class="lar la-heart"></i></a></li>-->
                                                    <!--    </ul>-->
                                                    <!--</div>-->
                                                </div>
                                                <div class="item-content">
                                                    <h3 class="item-title">
                                                        <a
                                                            href="{{ route('front.product', $product->product_slug) }}">{{ $product->product_name }}</a>
                                                    </h3>
                                                    {{-- <span class="item-price">${{ $product->product_price }}</span> --}}
                                                    <div class="rating-star ul-li-center clearfix">
                                                        <ul class="clearfix">
                                                            <li class="active"><i class="las la-star"></i></li>
                                                            <li class="active"><i class="las la-star"></i></li>
                                                            <li class="active"><i class="las la-star"></i></li>
                                                            <li class="active"><i class="las la-star"></i></li>
                                                            <li><i class="las la-star"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                     @else
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="alert alert-danger text-center">
                                                <strong>No Products Found!</strong>
                                            </div>
                                        </div>
                                @endif
                            </div>

                            <div class="pagination-nav ul-li-center clearfix">
                                {{ $products->links() }}
                                {{-- <ul class="clearfix">
                                    <li><a href="#!"><i class="las la-angle-left"></i></a></li>
                                    <li><a href="#!">1</a></li>
                                    <li><a href="#!">2</a></li>
                                    <li><a href="#!">...</a></li>
                                    <li><a href="#!">6</a></li>
                                    <li><a href="#!"><i class="las la-angle-right"></i></a></li>
                                </ul> --}}
                            </div>
                        </div>

                        <div id="list-layout-tab" class="tab-pane active">
                            <div class="mb-70 clearfix">
                                @if ($products->isNotEmpty())
                                    @foreach ($products as $product)
                                        @php
                                            $productsImage = $product->product_images->first();
                                        @endphp
                                        <div class="product-list clearfix">
                                            <div class="item-image">
                                                <a href="{{ route('front.product', $product->product_slug) }}"
                                                    class="image-wrap">
                                                    @if (!empty($productsImage->image))
                                                        <img src="{{ asset('/uploads/product/' . $productsImage->image) }}"
                                                            alt="img-thumbnail" class="card-img-top rounded" />
                                                    @else
                                                        <img src="{{ asset('admin-assets/img/default-150X150.png') }}"
                                                            alt="Default" class="card-img-top rounded" />
                                                    @endif

                                                </a>
                                                <div class="post-label ul-li-right clearfix">
                                                    <ul class="clearfix">
                                                        {{-- <li class="bg-skyblue">-30%</li>
                                                        <li class="bg-skyblue">TOP</li> --}}
                                                    </ul>
                                                </div>
                                                <!--<div class="btns-group ul-li-center clearfix">-->
                                                <!--    <ul class="clearfix">-->
                                                <!--        <li><a href="{{ route('front.product', $product->product_slug) }}"-->
                                                <!--                data-toggle="tooltip" data-placement="top"-->
                                                <!--                title="Add To Cart"><i-->
                                                <!--                    class="las la-shopping-basket"></i></a></li>-->
                                                <!--        <li>-->
                                                <!--            <a class="tooltipes" href="#!" data-placement="top"-->
                                                <!--                title="Quick View" data-toggle="modal"-->
                                                <!--                data-target="#quickview-modal">-->
                                                <!--                <i class="las la-dot-circle"></i>-->
                                                <!--            </a>-->
                                                <!--        </li>-->
                                                <!--        {{-- <li><a href="#!" data-toggle="tooltip" data-placement="top"-->
                                                <!--                title="Compare Product"><i class="las la-sync"></i></a>-->
                                                <!--        </li> --}}-->
                                                <!--        <li><a onclick="addToWishList({{ $product->id }})" href="javascript:void(0);" data-toggle="tooltip" data-placement="top"-->
                                                <!--                title="Add To Wishlist"><i class="lar la-heart"></i></a>-->
                                                <!--        </li>-->
                                                <!--    </ul>-->
                                                <!--</div>-->
                                            </div>
                                            <div class="rating-star ul-li clearfix">
                                                <ul class="clearfix">
                                                    <li class="active"><i class="las la-star"></i></li>
                                                    <li class="active"><i class="las la-star"></i></li>
                                                    <li class="active"><i class="las la-star"></i></li>
                                                    <li class="active"><i class="las la-star"></i></li>
                                                    <li><i class="las la-star"></i></li>
                                                </ul>
                                            </div>
                                            <div class="item-content">
                                                <!-- <span class="post-type">Medical Equipment</span> -->
                                                <h3 class="item-title">
                                                    <a
                                                        href="{{ route('front.product', $product->product_slug) }}">{{ $product->product_name }}</a>
                                                </h3>
                                                {{-- <span class="item-price mb-2">${{ $product->product_price }}</span> --}}
                                                <p class="mb-30">
                                                    {!! $product->product_description !!}
                                                </p>
                                                <a href="{{ route('front.product', $product->product_slug) }}"
                                                    class="btn bg-royal-blue">Add To Cart</a>
                                            </div>
                                        </div>
                                    @endforeach
                                    @else
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="alert alert-danger text-center">
                                                <strong>No Products Found!</strong>
                                            </div>
                                        </div>
                                @endif
                            </div>

                            <div class="pagination-nav ul-li-center clearfix">
                                {{ $products->links() }}
                                {{-- <ul class="clearfix">
                                    <li><a href="#!"><i class="las la-angle-left"></i></a></li>
                                    <li><a href="#!">1</a></li>
                                    <li><a href="#!">2</a></li>
                                    <li><a href="#!">...</a></li>
                                    <li><a href="#!">6</a></li>
                                    <li><a href="#!"><i class="las la-angle-right"></i></a></li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <aside id="sidebar-section" class="sidebar-section clearfix">
                        <div class="widget sidebar-search">
                            <form action="{{ url('searchproduct')}}" method="POST">
                                @csrf
                                <div class="form-item">
                                    <input type="search" class="form-control" required id="search_product" name="product_name"
                                        placeholder="Search your Products">
                                    <button type="submit"><i class="la la-search"></i></button>
                                </div>
                            </form>
                        </div>

                        <div class="widget products-category ul-li-block">
                            <h3 class="widget-title">Categories</h3>
                            <ul class="clearfix">
                                @if ($categories->isNotEmpty())
                                    @foreach ($categories as $category)
                                        <li class="{{ $categorySelected == $category->id ? 'show' : '' }}"><a
                                                href="{{ route('front.product-list', $category->cat_slug) }}">{{ $category->cat_name }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>

                        <!--<div class="widget price-range">-->
                        <!--    <h3 class="widget-title"><span>Price Range</span></h3>-->
                        <!--    <form action="#">-->
                        <!--        <div class="price-range-area">-->
                        <!--            <div id="slider-range" class="slider-range"></div>-->
                        <!--            <div class="price-text">-->
                        <!--                <span>Ranger:</span>-->
                        <!--                <input type="text" id="amount" readonly>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </form>-->
                        <!--</div>-->

                        <div class="widget hot-deals">
                            <h3 class="widget-title">Current Deals</h3>
                            <div id="sidebar-deals-carousel"
                                class="sidebar-deals-carousel arrow-right-left owl-carousel owl-theme">
                                @if ($currentProducts->isNotEmpty())
                                    @foreach ($currentProducts as $currentProduct)
                                        @php
                                            $productsImage = $currentProduct->product_images->first();
                                        @endphp
                                        <div class="item">
                                            <div class="product-fullimage text-center clearfix">
                                                 @if(isset($product)!= null)
                                                <a href="{{ route('front.product', $product->product_slug) }}"
                                                    class="image-wrap">
                                                    @if (!empty($productsImage->image))
                                                        <img src="{{ asset('/uploads/product/' . $productsImage->image) }}"
                                                            alt="img-thumbnail" />
                                                    @else
                                                        <img src="{{ asset('admin-assets/img/default-150X150.png') }}"
                                                            alt="Default" />
                                                    @endif
                                                </a>
                                                @endif

                                                {{-- <div class="post-label ul-li-right clearfix">
                                            <ul class="clearfix">
                                                <li class="bg-skyblue">-20%</li>
                                            </ul>
                                        </div> --}}
 @if(isset($product)!= null)
                                                <div class="item-content">
                                                    <h3 class="item-title">
                                                        <a
                                                            href="{{ route('front.product', $product->product_slug) }}">{{ $currentProduct->product_name }}</a>
                                                    </h3>
                                                    {{-- <span class="item-price">${{ $currentProduct->product_price }}</span> --}}
                                                </div>
                                                @endif

                                                
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        {{-- <div class="widget brand-products ul-li-block">
                            <h3 class="widget-title">Brands</h3>
                            <ul class="clearfix">
                                <li><a href="#!">Corflute Signs <span>(35)</span></a></li>
                                <li><a href="#!">Bollard Signs <span>(20)</span></a></li>
                                <li><a href="#!">Election Signs <span>(120)</span></a></li>
                                <li><a href="#!">Novelty Cheques <span>(41)</span></a></li>
                                <li><a href="#!">Life Size Cutouts <span>(15)</span></a></li>
                                <li><a href="#!">Event Selfie Frames <span>(22)</span></a></li>

                            </ul>
                        </div> --}}

                        {{-- <div class="widget tag-list ul-li">
                            <h3 class="widget-title">Popular Tags</h3>
                            <ul class="clearfix">
                                <li><a href="#!">Brochures</a></li>
                                <li><a href="#!">Envelopes</a></li>
                                <li><a href="#!">Labels</a></li>
                                <li><a href="#!">Posters</a></li>
                                <li><a href="#!">Flyers</a></li>

                            </ul>
                        </div> --}}
                    </aside>
                </div>

            </div>
        </div>
    </section>

    <!-- product quick view - start -->
    <div class="quickview-modal modal fade" id="quickview-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content clearfix">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="item-image">
                    <img src="{{ asset('front-assets/images/product/p3.png') }}" alt="image_not_found">
                </div>
                <div class="item-content">
                    <h2 class="item-title mb-15">Digital Infrared Thermometer</h2>
                    <div class="rating-star ul-li mb-30 clearfix">
                        <ul class="float-left mr-2">
                            <li class="active"><i class="las la-star"></i></li>
                            <li class="active"><i class="las la-star"></i></li>
                            <li class="active"><i class="las la-star"></i></li>
                            <li class="active"><i class="las la-star"></i></li>
                            <li><i class="las la-star"></i></li>
                        </ul>
                        <span class="review-text">(12 Reviews)</span>
                    </div>
                    <span class="item-price mb-15">$49.50</span>
                    <p class="mb-30">
                        Best Electronic Digital Thermometer adipiscing elit, sed do eiusmod teincididunt ut labore et dolore
                        magna aliqua. Quis ipsum suspendisse us ultrices gravidaes. Risus commodo viverra maecenas accumsan
                        lacus vel facilisis.
                    </p>
                    <div class="quantity-form mb-30 clearfix">
                        <strong class="list-title">Quantity:</strong>
                        <div class="quantity-input">
                            <form action="#">
                                <span class="input-number-decrement">–</span>
                                <input class="input-number-1" type="text" value="1">
                                <span class="input-number-increment">+</span>
                            </form>
                        </div>
                    </div>
                    <div class="btns-group ul-li mb-30">
                        <ul class="clearfix">
                            <li><a href="#!" class="btn bg-royal-blue">Buy Now</a></li>
                             @if(isset($product)!= null)
                            <li><a href="{{ route('front.product', $product->product_slug) }}"
                                    class="btn bg-royal-blue">Add to Cart</a></li>
                                    @endif
                            <li><a href="#!" data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Compare Product"><i class="las la-sync"></i></a></li>
                            <li><a href="#!" data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Add To Wishlist"><i class="lar la-heart"></i></a></li>
                        </ul>
                    </div>
                    <div class="info-list ul-li-block">
                        <ul class="clearfix">
                            <li><strong class="list-title">Category:</strong> <a href="#!">Medical Equipment</a>
                            </li>
                            <li class="social-icon ul-li">
                                <strong class="list-title">Share:</strong>
                                <ul class="clearfix">
                                    <li><a href="#!"><i class="lab la-facebook"></i></a></li>
                                    <li><a href="#!"><i class="lab la-twitter"></i></a></li>
                                    <li><a href="#!"><i class="lab la-instagram"></i></a></li>
                                    <li><a href="#!"><i class="lab la-pinterest-p"></i></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product quick view - end -->
    <!-- shop-section - end
               ================================================== -->


    <!-- instagram-section - start
               ================================================== -->
    <section id="instagram-section" class="instagram-section sec-ptb-50 clearfix">
        <!-- <div class="wrapper clearfix">

                 <div class="section-title text-center mb-15">
                  <h2 class="title-text mb-0">medicia on Instagram</h2>
                 </div>

                 <div class="row zoom-gallery justify-content-lg-between justify-content-md-center justify-content-sm-center">
                  <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 col-6">
                   <a class="popup-image instagram-shoot" href="assets/images/instagram/img_1.jpg">
                    <img src="assets/images/instagram/img_1.jpg" alt="image_not_found">
                    <span class="instagram-icon">
                     <i class="lab la-instagram"></i>
                    </span>
                   </a>
                  </div>

                  <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 col-6">
                   <a class="popup-image instagram-shoot" href="assets/images/instagram/img_2.jpg">
                    <img src="assets/images/instagram/img_2.jpg" alt="image_not_found">
                    <span class="instagram-icon">
                     <i class="lab la-instagram"></i>
                    </span>
                   </a>
                  </div>

                  <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 col-6">
                   <a class="popup-image instagram-shoot" href="assets/images/instagram/img_3.jpg">
                    <img src="assets/images/instagram/img_3.jpg" alt="image_not_found">
                    <span class="instagram-icon">
                     <i class="lab la-instagram"></i>
                    </span>
                   </a>
                  </div>

                  <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 col-6">
                   <a class="popup-image instagram-shoot" href="assets/images/instagram/img_4.jpg">
                    <img src="assets/images/instagram/img_4.jpg" alt="image_not_found">
                    <span class="instagram-icon">
                     <i class="lab la-instagram"></i>
                    </span>
                   </a>
                  </div>

                  <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 col-6">
                   <a class="popup-image instagram-shoot" href="assets/images/instagram/img_5.jpg">
                    <img src="assets/images/instagram/img_5.jpg" alt="image_not_found">
                    <span class="instagram-icon">
                     <i class="lab la-instagram"></i>
                    </span>
                   </a>
                  </div>

                  <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 col-6">
                   <a class="popup-image instagram-shoot" href="assets/images/instagram/img_6.jpg">
                    <img src="assets/images/instagram/img_6.jpg" alt="image_not_found">
                    <span class="instagram-icon">
                     <i class="lab la-instagram"></i>
                    </span>
                   </a>
                  </div>
                 </div>

                </div>
               </section> -->
        <!-- instagram-section - end
               ================================================== -->
    @endsection
