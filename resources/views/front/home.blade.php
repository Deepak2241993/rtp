@extends('layouts.master')

@section('content')

@php
    use App\Models\Category;
    use App\Models\HomeSlider;
    $categories = Category::orderBy('cat_name', 'ASC')->get();
    $homeslider = HomeSlider::orderBy('title', 'ASC')->get();
@endphp
    <!-- slider-section - start
            ================================================== -->
    <section id="slider-section" class="slider-section home-two-slider clearfix">
        <div id="main-carousel" class="main-carousel arrow-right-left owl-carousel owl-theme">

            @if(!empty($homeslider))

            @foreach ($homeslider as $item )
            <div class="item d-flex align-items-center bg-gray">
                <div class="container">
                    <div class="row align-items-center justify-content-lg-start justify-content-md-between">
                        <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 order-last">
                            <div class="slider-image meter-image">
                                <img src="{{ asset('uploads/homeslider/'.$item->image) }}" alt="image_not_found">
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                            <div class="slider-content">
                                {{-- <!-- <span class="off-price animate-item mb-15">25% Off</span> -->
                                <h3 class="item-title animate-item"> 2024 Branding Revolution: Get Ready to Elevate Your
                                    Business with Our Printing Starter Pack!
                                </h3>
                                <p class="animate-item">
                                    USE CODE #2024PACK and get 10%OFF
                                </p>
                                <div class="btns-group ul-li animate-item clearfix">
                                    <ul class="clearfix">
                                        <li><a href="{{ route('front.product-list') }}" class="btn bg-light-green">SHOP NOW</a></li>
                                        <li><a href="#!" class="btn bg-default-black">Get A Quote</a></li>
                                    </ul>
                                </div> --}}
                                {!! $item->description !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>



            @endforeach

            @endif



{{--
            <div class="item d-flex align-items-center bg-gray">
                <div class="container">
                    <div class="row align-items-center justify-content-lg-start justify-content-md-between">
                        <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 order-last">
                            <div class="slider-image meter-image">
                                <img src="{{ asset('front-assets/images/slider/slider2.png ') }}" alt="image_not_found">
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                            <div class="slider-content">
                                <!-- <span class="off-price animate-item mb-15">25% Off</span> -->
                                <h3 class="item-title animate-item">
                                    Unlocking Excellence with Ready to Print
                                </h3>
                                <div class="animate-item">
                                    <ul class="bullet-points">
                                        <li>We are Affordable</li>
                                        <li>Superior Quality Printing Solutions Tailored Just for You.</li>
                                        <li>Order Now and Experience the Best Value in customised printing</li>
                                    </ul>
                                </div>
                                <div class="btns-group ul-li animate-item clearfix">
                                    <ul class="clearfix">
                                        <li><a href="#!" class="btn bg-light-green">SHOP NOW</a></li>
                                        <li><a href="#!" class="btn bg-default-black">LEARN MORE</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item d-flex align-items-center bg-gray">
                <div class="container">
                    <div class="row align-items-center justify-content-lg-start justify-content-md-between">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 order-last">
                            <div class="slider-image mask-image">
                                <img src="{{ asset('front-assets/images/slider/slider3.png ') }}" alt="image_not_found">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="slider-content">
                                <!-- <span class="off-price animate-item mb-15">30% off</span> -->
                                <h3 class="item-title animate-item">
                                    Transform Your Vision into Reality with Our Premium Printing Solutions
                                </h3>
                                <p class="animate-item">
                                    Elevate Your Brand Today! Ready to Print- Click, Order and Collect!
                                </p>
                                <div class="btns-group ul-li animate-item clearfix">
                                    <ul class="clearfix">
                                        <li><a href="#!" class="btn bg-light-green">SHOP NOW</a></li>
                                        <li><a href="#!" class="btn bg-default-black">LEARN MORE</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

        </div>
    </section>
    <!-- slider-section - end
            ================================================== -->



    {{-- <section id="promotion-section" class="promotion-section sec-ptb-50 pb-0 clearfix">
        <div class="container">
            <div class="section-title text-center mb-50">
                <h2 class="title-text mb-3">Our Most Popular Product</h2>
                <!-- <p class="mb-0"></p> -->
            </div>
            <div class="container-fluid ppppp">
                <div class="row">

                    @if ($mostPopularProducts->isNotEmpty())
                        @foreach ($mostPopularProducts as $product)
                            @php
                                $productsImage = $product->product_images->first();
                            @endphp
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-2">
                                <div class="card custom-card">
                                    <div class="image-container">
                                        @if (!empty($productsImage->image))
                                            <img src="{{ asset('/uploads/product/' . $productsImage->image) }}"
                                                alt="img-thumbnail" class="card-img-top rounded" />
                                        @else
                                            <img src="{{ asset('admin-assets/img/default-150X150.png') }}" alt="Default"
                                                class="card-img-top rounded" />
                                        @endif
                                    </div>
                                    <div class="text-container">
                                        <div class="text-inside">
                                            <h6 class="card-title">{{ $product->product_name }}</h6>
                                            <div class="rating-star ul-li-center clearfix">
                                                <ul class="clearfix">
                                                    <li class="active"><i class="las la-star"></i></li>
                                                    <li class="active"><i class="las la-star"></i></li>
                                                    <li class="active"><i class="las la-star"></i></li>
                                                    <li class="active"><i class="las la-star"></i></li>
                                                    <li><i class="las la-star"></i></li>
                                                </ul>
                                            </div>
                                            <a href="#" class="btn bg-light-green">Buy Now</a>
                                            <!-- Add Add to Cart button -->
                                            <a href="#" class="btn bg-default-black">Add to Cart</a>

                    <!-- Third Card -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-2">
                        <div class="card custom-card">
                            <div class="image-container">
                                <img src="{{ asset('front-assets/images/solution/bow banner.jpg ') }}"
                                    class="card-img-top rounded" alt="Image">
                                <!-- <div class="plus-button">+</div> -->
                            </div>
                            <div class="text-container">
                                <div class="text-inside">
                                    <h6 class="card-title">Bow Banners</h6>
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
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
        <div class="btn-wrap text-center clearfix" style="margin-top: 20px;">
            <a href="#!" class="btn bg-royal-blue">View All Products</a>
        </div>
    </section> --}}

    <section id="promotion-section" class="promotion-section sec-ptb-50 pb-0 clearfix">
        <div class="container">
             @php
                    $content = staticcontent(7);
                @endphp
            <div class="section-title text-center mb-50">
                <h2 class="title-text mb-3">{{$content->title ?? ''}}</h2>
                <!-- <p class="mb-0"></p> -->
            </div>
            <div class="container-fluid ppppp">
                <div class="row">

                    @if ($mostPopularProducts->isNotEmpty())
                        @foreach ($mostPopularProducts as $product)
                            @php
                                $productsImage = $product->product_images->first();
                            @endphp
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-2">
                                <div class="card custom-card">
                                    <a href="{{ route('front.product', $product->product_slug) }}">
                                        <div class="image-container">

                                        @if (!empty($productsImage->image))
                                            <img src="{{ asset('/uploads/product/' . $productsImage->image) }}"
                                                alt="img-thumbnail" class="card-img-top rounded" />
                                        @else
                                            <img src="{{ asset('admin-assets/img/default-150X150.png') }}" alt="Default"
                                                class="card-img-top rounded" />
                                        @endif

                                    </div>
                                    </a>
                                    <div class="text-container">
                                        <div class="text-inside">
                                            <h6 class="card-title">{{ $product->product_name }}</h6>
                                            {{-- <div class="rating-star ul-li-center clearfix">
                                                <ul class="clearfix">
                                                    <li class="active"><i class="las la-star"></i></li>
                                                    <li class="active"><i class="las la-star"></i></li>
                                                    <li class="active"><i class="las la-star"></i></li>
                                                    <li class="active"><i class="las la-star"></i></li>
                                                    <li><i class="las la-star"></i></li>
                                                </ul>
                                            </div> --}}
                                            {{-- <a href="#" class="btn bg-light-green">Buy Now</a>
                                            <!-- Add Add to Cart button -->
                                            <a href="javascript:void(0);" onclick="addToCart({{ $product->id }});" class="btn bg-default-black">Add to Cart</a> --}}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
        <div class="btn-wrap text-center clearfix" style="margin-top: 20px;">
            <a href="{{ route('front.product-list') }}" class="btn bg-royal-blue">View All Products</a>
        </div>
    </section>




    <!-- brand-section - start
            ================================================== -->
    <div id="brand-section" class="brand-section clearfix ">

        <section id="promotion-section" class="promotion-section sec-ptb-100 pb-0 clearfix">
            <div class="container">
                @php
                    $content = staticcontent(6);
                @endphp
                <div class="section-title text-center mb-70">
                    <h2 class="title-text mb-3">{{ $content->title ?? ''}}</h2>
                    {{-- <p class="mb-0">{!! $item->description ?? '' !!}</p> --}}
                    </h2>
                </div>
                <div class="brand-carousel mt--40 owl-carousel owl-theme">
                    @if(!$categories->isEmpty())
                        @foreach ($categories as $item)
                            <div class="item">
                                <a class="brand-logo" href="{{ route('front.product-list',$item->cat_slug) }}">
                                    @if (!empty($item->cat_image))
                                    <img src="{{ asset('/uploads/category/' . $item->cat_image) }}"
                                        alt="img-thumbnail"  />
                                @else
                                    <img src="{{ asset('admin-assets/img/default-150X150.png') }}" alt="Default"
                                        />
                                @endif
                                </a>
                                <div class="swan-standard-tile-contents">
                                    <a href="{{ route('front.product-list',$item->cat_slug) }}" class="swan-link swan-link-skin-unstyled swan-link-covering">
                                        <div class="swan-standard-tile-name">
                                            <div class="swan-text-xm1 swan-font-weight-bold">{{ $item->cat_name }}</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

            </div>
        </section>
    </div>


    <!-- brand-section - end
            ================================================== -->


    <section class="shop-section sec-ptb-50 clearfix">
    </section>




    <!-- product quick view - start -->
    <div class="quickview-modal modal fade" id="quickview-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content clearfix">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="item-image">
                    <img src="{{ asset('front-assets/images/product/img_12.jpg ') }}" alt="image_not_found">
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
                            @if(isset($product->id))
                                <li>
                                    <a href="javascript:void(0);" onclick="addToCart({{ $product->id }});" class="btn bg-royal-blue">
                                        Add to Cart
                                    </a>
                                </li>
                                <li>
                                    <a href="#!" data-toggle="tooltip" data-placement="top" title="Compare Product">
                                        <i class="las la-sync"></i>
                                    </a>
                                </li>
                                <li>
                                    <a onclick="addToWishList({{ $product->id }})" href="javascript:void(0);" data-toggle="tooltip"
                                        data-placement="top" title="Add To Wishlist">
                                        <i class="lar la-heart"></i>
                                    </a>
                                </li>
                            @else
                                <li>
                                    <span class="text-muted">Product not available</span>
                                </li>
                            @endif
                        </ul>
                    </div>

                    <div class="info-list ul-li-block">
                        <ul class="clearfix">
                            <li><strong class="list-title">Category:</strong> <a href="#!">Medical Equipment</a></li>
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




    <!-- Start Current Deals-->

    <section class="shop-section sec-ptb-100 clearfix">
        <div class="container">
    @php
        $content = staticcontent(5);
    @endphp
            <div class="section-title text-center mb-70">
                <h2 class="title-text mb-3">{{ $content->title ?? ''}}</h2>
            </div>

            <div id="column-4-carousel" class="column-4-carousel arrow-right-left owl-carousel owl-theme">

                @if ($currentProducts->isNotEmpty())
                    @foreach ($currentProducts as $currentProduct)
                    @php
                    $productsImage = $currentProduct->product_images->first();
                @endphp
                        <div class="item">
                            <div class="product-grid text-center clearfix">
                                <div class="item-image">
                                    <a href="{{ route('front.product', $currentProduct->product_slug) }}"
                                        class="image-wrap">
                                        @if (!empty($productsImage->image))
                                            <img src="{{ asset('/uploads/product/' . $productsImage->image) }}"
                                                alt="img-thumbnail" />
                                        @else
                                            <img src="{{ asset('admin-assets/img/default-150X150.png') }}"
                                                alt="Default" />
                                        @endif
                                    </a>
                                    <div class="post-label ul-li-right clearfix">
                                        {{-- <ul class="clearfix">
                                            <li class="bg-skyblue"></li>
                                            <li class="bg-skyblue"></li>
                                        </ul> --}}
                                    </div>
                                    <!--<div class="btns-group ul-li-center clearfix">-->
                                    <!--    <ul class="clearfix">-->
                                    <!--        <li><a href="{{ route('front.product', $currentProduct->product_slug) }}"-->
                                    <!--                data-toggle="tooltip" data-placement="top" title="Add To Cart"><i-->
                                    <!--                    class="las la-shopping-basket"></i></a></li>-->
                                    <!--        <li>-->
                                    <!--            <a class="tooltipes" href="#!" data-placement="top"-->
                                    <!--                title="Quick View" data-toggle="modal"-->
                                    <!--                data-target="#quickview-modal">-->
                                    <!--                <i class="las la-dot-circle"></i>-->
                                    <!--            </a>-->
                                    <!--        </li>-->
                                    <!--        {{-- <li><a href="#!" data-toggle="tooltip" data-placement="top"-->
                                    <!--                title="Compare Product"><i class="las la-sync"></i></a></li> --}}-->
                                    <!--        <li><a onclick="addToWishList({{ $currentProduct->id }})"-->
                                    <!--                href="javascript:void(0);" data-toggle="tooltip" data-placement="top"-->
                                    <!--                title="Add To Wishlist"><i class="lar la-heart"></i></a></li>-->
                                    <!--    </ul>-->
                                    <!--</div>-->
                                </div>
                                <div class="item-content">
                                    <h3 class="item-title">
                                        <a href="{{ route('front.product', $currentProduct->product_slug) }}">{{ $currentProduct->product_name }}</a>
                                    </h3>
                                    {{-- <span class="item-price">{{ $currentProduct->product_price }}</span> --}}
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
                @endif
            </div>

        </div>
    </section>

    <!-- offer-section - start
            ================================================== -->
    @php
        $content = staticcontent(1);
    @endphp
    <section id="offer-section" class="offer-section sec-ptb-100 bg-gray clearfix">
        <div class="container">
            <div class="offer-item clearfix">
                <div
                    class="row align-items-center justify-content-lg-between justify-content-md-center justify-content-sm-center">

                    <div class="col-lg-7 col-md-9 col-sm-12 col-xs-12 order-last">
                        <div class="item-image-2">
                            <img src="{{ asset('front-assets/images/offer/img_2.png ') }}" alt="image_not_found">
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-9 col-sm-12 col-xs-12">
                        <div class="item-content">
                            
                                <h2 class="title-text mb-3">{{$content->title}}</h2>
                                {{-- <p class="mb-30">{{ $item->sub_heading}}</p> --}}
                                <div class="info-list ul-li-block mb-30 clearfix">
                                    {!! $content->description !!}
                                </div>
                                <a href="{{ route('front.product-list') }}" class="btn bg-royal-blue">SHOP NOW</a>
                                

                           
                            <!-- <h4 class="sub-title text-royal-blue mb-3">50% Discount</h4> -->

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- offer-section - end
            ================================================== -->


    <!--end current deals-->




    <!-- shop-section - end
            ================================================== -->





    <!-- promotion-section - start
            ================================================== -->
            @php
                    $content = staticcontent(2);
                @endphp
    <section id="promotion-section" class="promotion-section sec-ptb-100 pb-0 clearfix" style="margin-bottom: 40px;">
        <div class="container">
            <div class="masonry-grid">
                <div class="grid-sizer"></div>

                <div class="grid-item">
                    <div class="promotion-fullimage clearfix">
                        <a href="#!" class="item-image">
                            <img src="{{$content->image ?? ''}}" alt="image_not_found">
                        </a>
                        <div class="promotion-content position-top size-decrease">
                            <!-- <small class="d-block text-white mb-1">Medical Supplies</small> -->
                            <h3 class="item-title">
                                <span class="d-block">{{$content->title ?? ''}}</span>
                                <!-- <span class="d-block">Supplies</span> -->
                            </h3>
                            {!! $content->description ?? ''!!}
                        </div>
                    </div>
                </div>

                 @php
                    $content = staticcontent(3);
                @endphp
                <div class="grid-item w-66">
                    <div class="promotion-fullimage clearfix">
                        <a href="#!" class="item-image">
                            <img src="{{ asset('front-assets/images/promotion/img_6.png ') }}" alt="image_not_found">
                        </a>
                        <div class="promotion-content size-increase position-vertical-center">
                            <h3 class="item-title">
                                <strong class="text-royal-blue d-block mb-1"></strong> <span class="d-block">{!! $content->title ?? '' !!}</span>
                            </h3>
                           {!! $content->description ?? '' !!}
                            <a href="{{ route('front.product-list') }}" class="btn bg-royal-blue">shop now</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- promotion-section - end
            ================================================== -->


    <!-- testimonial-section - start
            ================================================== -->
    <section id="testimonial-section" class="testimonial-section sec-ptb-50 clearfix">
        <div class="container">
                @php
                    $content = staticcontent(4);
                @endphp
            <div class="section-title size-lg text-center mb-60">
                <h2 class="title-text mb-3">{!! $content->title ?? '' !!}</h2>
                <p class="mb-0">{!! $content->description ?? '' !!}</p>
            </div>

            <div class="testimonial-carousel owl-carousel owl-theme">
                <div class="item">
                    <div class="testimonial-item">
                        <div class="testimonial-content">
                            <span class="quote-icon">
                                <i class="las la-quote-left"></i>
                            </span>
                            <p>I had my car wrapped by these guys over a year ago. It still looks great, and all the colors
                                remain very bright. Wrapping my car was a real challenge due to its awkward design, but they
                                still did a great job.</p>
                        </div>
                        <div class="hero-info">
                            <!--<div class="thumbnail-image">-->
                            <!--	<img src="{{ asset('front-assets/images/meta/img_1.png ') }}" alt="image_not_found">-->
                            <!--</div>-->
                            <div class="hero-content-wrap">
                                <h4 class="hero-name">Jaron Blackie</h4>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <!--<span class="hero-title">Cancer Patient</span>-->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="testimonial-item">
                        <div class="testimonial-content">
                            <span class="quote-icon">
                                <i class="las la-quote-left"></i>
                            </span>
                            <p>
                                Quick service and very helpful in the designing price is competitive</p>
                        </div>
                        <div class="hero-info">
                            <!--<div class="thumbnail-image">-->
                            <!--	<img src="{{ asset('front-assets/images/meta/img_2.png ') }}" alt="image_not_found">-->
                            <!--</div>-->
                            <div class="hero-content-wrap">
                                <h4 class="hero-name">Paul D</h4>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <!--<span class="hero-title">Co Funder</span>-->
                            </div>
                        </div>
                    </div>
                </div>


                <div class="item">
                    <div class="testimonial-item">
                        <div class="testimonial-content">
                            <span class="quote-icon">
                                <i class="las la-quote-left"></i>
                            </span>
                            <p>Definitely 5-star quality work. Professional with great customer service. Offers quality work
                                at a reasonable price. We were very pleased with their service and would highly recommend
                                them to everyone! Thanks, guys, for our trailer artwork! </p>
                        </div>
                        <div class="hero-info">
                            <!--<div class="thumbnail-image">-->
                            <!--	<img src="{{ asset('front-assets/images/meta/img_1.png ') }}" alt="image_not_found">-->
                            <!--</div>-->
                            <div class="hero-content-wrap">
                                <h4 class="hero-name">Aristan Flame</h4>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <!--<span class="hero-title">Cancer Patient</span>-->
                            </div>
                        </div>
                    </div>
                </div>



                <div class="item">
                    <div class="testimonial-item">
                        <div class="testimonial-content">
                            <span class="quote-icon">
                                <i class="las la-quote-left"></i>
                            </span>
                            <p>
                                Very happy with good works from all staff and high-quality products. Extremely satisfied. I
                                strongly recommend. </p>
                        </div>
                        <div class="hero-info">
                            <!--<div class="thumbnail-image">-->
                            <!--	<img src="{{ asset('front-assets/images/meta/img_3.png ') }}" alt="image_not_found">-->
                            <!--</div>-->
                            <div class="hero-content-wrap">
                                <h4 class="hero-name">William Lee</h4>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <!--<span class="hero-title">Cardiology Patient</span>-->
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </section>
    <!-- testimonial-section - end


            <!-- newsletter-section - start
            ================================================== -->

    <!-- newsletter-section - end
            ================================================== -->


    <!-- blog-section - start
            ================================================== -->

    <!-- blog-section - end
            ================================================== -->


    <!-- brand-section - start
            ================================================== -->

    <!-- brand-section - end
            ================================================== -->


    <!-- instagram-section - start
            ================================================== -->

    <!-- instagram-section - end
            ================================================== -->
@endsection
