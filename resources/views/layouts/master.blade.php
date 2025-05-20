<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ready To Print</title>
    <link rel="shortcut icon" href="{{ asset('front-assets/images/logo/favourite_icon_1.png') }}">

    <!-- css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/line-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">



    <script src="https://example-chatbot-service.com/chatbot-sdk.js" defer></script>



    <!-- custom - css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/style-3.css') }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        $(document).ready(function() {
            $('a').attr('rel', 'nofollow');
        });
    </script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    @yield('style.css')



</head>


<body class="home-v2">


    <!-- backtotop - start -->
    <div id="thetop"></div>
    <div id="backtotop">
        <a href="#" id="scroll">
            <i class="las la-arrow-up"></i>
        </a>
    </div>
    <!-- backtotop - end -->

    <!-- preloader - start -->
     {{-- <div id="preloader"></div>  --}}
     {{-- <iframe src="https://giphy.com/embed/WiIuC6fAOoXD2" width="480" height="480" style="" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
<p><a href="https://giphy.com/gifs/awesome-circle-loading-WiIuC6fAOoXD2">via GIPHY</a></p> --}}

    <!-- preloader - end -->


    <!-- header-section - start
  ================================================== -->
    <header id="header-section" class="header-section clearfix">
        <div class="header-top bg-white d-flex align-items-center clearfix">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-6">
                        <div class="info-list ul-li clearfix">
                            <ul class="clearfix">

                                <li>
                                    <a href="#!"><img src="{{ asset('front-assets/images/solution/2911366.png') }}"
                                            alt="Kangaroo Image"
                                            style="width: 20px; height: 20px; margin-right: 5px; margin-bottom: 5px;">
                                        Proudly Australian Owned</a>
                                </li>


                                <li><a href="mailto:info@readytoprint.com.au"><i class="las la-envelope-open-text mr-1"></i>info@readytoprint.com.au</a></li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="info-list ul-li-right clearfix">
                            <ul class="clearfix">
                                <li><a href="tel:0296213111"><span class="mr-1">Contact Us:</span> (02) 96213111</a></li>
                                <!-- <li>
          <div class="dropdown select-option">
           <button class="dropdown-toggle" type="button" id="language-select" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            English
           </button>
           <div aria-labelledby="language-select" class="dropdown-menu ul-li-block clearfix">
            <ul class="clearfix">
             <li><a href="#!">Franch</a></li>
             <li><a href="#!">Bangla</a></li>
             <li><a href="#!">Spanish</a></li>
            </ul>
           </div>
          </div>
         </li> -->
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="header-middle bg-gray d-flex align-items-center clearfix">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-3 col-md-12">
                        <div class="brand-logo clearfix">
                            <a href="{{ route('front.home')}}" class="brand-link">
                                <img src="{{ asset('front-assets/images/logo/logo_1.png') }}" alt="logo_not_found">
                            </a>

                            <div class="btns-group ul-li-right clearfix">
                                <ul class="clearfix">
                                    <li>
                                        <button type="button" class="mobile-menu-btn">
                                            <i class="las la-bars"></i>
                                        </button>
                                    </li>
                                    <li>
                                        <button class="mobile-btn-cart">
                                            <i class="las la-shopping-bag"></i>
                                            <small class="cart-counter bg-royal-blue">{{Cart::content()->count()}}</small>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 col-md-12">
                        <div class="btns-group ul-li-right clearfix">
                            <ul class="clearfix">
                                <li>
                                    <form action="{{ url('searchproduct')}}" method="POST">
                                        @csrf
                                        <div class="form-item">
                                            <input type="search" class="form-control" required id="search_product" name="product_name"
                                                placeholder="Search your Products">
                                            <button type="submit"><i class="la la-search"></i></button>
                                        </div>
                                    </form>
                                </li>
                                <li class="dropdown">
                                    <button type="button" class="btn-user" id="user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="lar la-user"></i>
                                    </button>
                                    <div aria-labelledby="user-dropdown" class="user-dropdown dropdown-menu ul-li-block clearfix">
                                        
                                          
                                            @auth
                                                <div class="profile-info clearfix">
                                                    <a href="{{route('account.profile') }}" class="user-thumbnail">
                                                        <img src="{{ asset('front-assets/images/meta/img_2.png') }}" alt="thumbnail_not_found">
                                                    </a>
                                                    <div class="user-content">
                                                        <h4 class="user-name">
                                                            <a href="{{route('account.profile') }}">{{ Auth::user()->name }}</a>
                                                        </h4>
                                                        <!--<span class="user-title">-->
                                                        <!--    @if(Auth::user()->role == 1)-->
                                                        <!--        {{ Auth::user()->role }}-->
                                                        <!--    @endif-->
                                                        <!--</span>-->
                                                    </div>
                                                </div>
                                            @else
                                                <!--<div class="profile-info clearfix">-->
                                                <!--    <a href="#!" class="user-thumbnail">-->
                                                <!--        <img src="{{ asset('front-assets/images/meta/img_2.png') }}" alt="thumbnail_not_found">-->
                                                <!--    </a>-->
                                                <!--    <div class="user-content">-->
                                                <!--        <h4 class="user-name">-->
                                                <!--            <a href="{{ route('account.login') }}">First Login</a>-->
                                                <!--        </h4>-->
                                                <!--    </div>-->
                                                <!--</div>-->
                                            @endauth

                                    
                                        <ul class="clearfix">
                                            @guest
                                                <li><a href="{{ route('account.login') }}"><i class="las la-sign-in-alt"></i> Login</a></li>
                                                <li><a href="{{ route('account.register') }}"><i class="las la-user-plus"></i> Register</a></li>
                                            @else
                                                <li><a href="{{route('account.profile') }}"><i class="las la-user-circle"></i> Profile</a></li>
                                                <!--<li><a href="#!"><i class="las la-user-cog"></i> Settings</a></li>-->
                                                <li><a href="{{ route('account.logout')}}"><i class="las la-sign-out-alt"></i> Logout</a></li>
                                            @endguest
                                        </ul>
                                    </div>
                                </li>

                                <li class="dropdown">
                                    <button class="btn-cart" id="cart-dropdown" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <a href="{{ route('front.cart')}}">
                                        <i class="las la-shopping-bag"></i>
                                        <small class="cart-counter bg-royal-blue">{{Cart::content()->count()}}</small>
                                        </a>
                                    </button>
                                    <div class="cart-dropdown dropdown-menu" aria-labelledby="cart-dropdown">
                                        <h3 class="title-text">Cart Items:-{{ Cart::count() }}</h3>

                                        <div class="cart-items-list ul-li-block clearfix">
                                            <ul class="clearfix">
                                                @foreach (Cart::content() as $item)
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
                                                    <div class="item-content">
                                                        <h4 class="item-title">{{ $item->name}}</h4>
                                                        <span class="item-qty">Qty:-{{ $item->qty }}</span>
                                                        <span class="item-price">price:-${{ $item->price*$item->qty }}</span>
                                                    </div>
                                                    <button type="button" class="remove-btn"
                                            onclick="deleteItem('{{ $item->rowId }}');"><i
                                                class="las la-times"></i></button>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        <div class="btns-group ul-li clearfix">
                                            <ul class="clearfix">
                                                <li><a href="{{ route('front.cart')}}" class="btn bg-default-black">View Cart</a>
                                                </li>
                                                <li><a href="{{ route('front.checkout')}}" class="btn bg-royal-blue">Checkout</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="header-bottom d-flex align-items-center clearfix bg-color fixed-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 men">
                        <nav class="main-menu ul-li-center clearfix">
                            <ul class="clearfix">
                                @php
                                    $categories = getCategories();
                                @endphp
                                @if ($categories->isNotEmpty())
                                    @foreach ($categories as $category)
                                        <li class="menu-item-has-child">
                                            <a
                                                href="{{ route('front.product-list', [$category->cat_slug]) }}">{{ $category->cat_name }}</a>
                                            @if ($category->sub_categories->isNotEmpty())
                                                <ul class="submenu">
                                                    @foreach ($category->sub_categories as $subcategory)
                                                        @if ($subcategory->category_id == $category->id && !empty($subcategory->cat_sub_name))
                                                            <li class="menu-item-has-child">
                                                                <a href="{{ route('front.product-list', [$category->cat_slug,$subcategory->cat_sub_slug]) }}">{{ $subcategory->cat_sub_name }}</a>
                                                                @if ($subcategory->product->isNotEmpty())
                                                                    <ul class="submenu">
                                                                        @foreach ($subcategory->product as $product)
                                                                            @if (!empty($product->product_name))
                                                                                <li>
                                                                                    <a
                                                                                        href="{{ route('front.product', $product->product_slug) }}">{{ $product->product_name }}</a>
                                                                                </li>
                                                                            @endif
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                    @foreach ($category->product as $product)
                                                        @if (!empty($product->product_name))
                                                            <li>
                                                                @if ($product->subcategory_id == null)
                                                                    <a
                                                                        href="{{ route('front.product', $product->product_slug) }}">{{ $product->product_name }}</a>
                                                                @endif
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                                @elseif (!empty($category->product) && $category->product->isNotEmpty())
                                                <ul class="submenu">
                                                    @foreach ($category->product as $product)
                                                        @if (!empty($product->product_name))
                                                            <li>
                                                                <a href="{{ route('front.product', $product->product_slug) }}">{{ $product->product_name }}</a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            @endif

                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </nav>
                    </div>
                    <div class="">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- sidebar mobile menu - start -->
    <div class="sidebar-menu-wrapper">
        <div id="sidebar-menu" class="sidebar-menu">

            <span class="close-btn">
                <i class="las la-times"></i>
            </span>

            <div class="brand-logo text-center clearfix">
                <a href="/" class="brand-link">
                    <img src="{{ asset('front-assets/images/logo/logo_1.png') }}" alt="logo_not_found">
                </a>
            </div>

            <div class="search-wrap">
                <form action="{{ url('searchproduct') }}" method="POST">
                    @csrf
                    <div class="form-item mb-0">
                        <input type="search" name="search" name="product_name" id="search_product"
                            placeholder="Search your Products">
                        <button type="submit"><i class="la la-search"></i></button>
                    </div>
                </form>
            </div>

            <div id="mobile-accordion" class="mobile-accordion">
                <div class="card">
                    <div class="card-header" id="heading-one">
                        <button data-toggle="collapse" data-target="#collapse-one" aria-expanded="false"
                            aria-controls="collapse-one">
                            <i class="las la-shopping-bag"></i>
                            Cart Item
                            <small>{{ Cart::content()->count() }}</small>
                        </button>
                    </div>
                    <div id="collapse-one" class="collapse" aria-labelledby="heading-one"
                        data-parent="#mobile-accordion">
                        <div class="card-body">
                            <div class="cart-items-list ul-li-block clearfix">
                                <ul class="clearfix">
                                    @foreach (Cart::content() as $item)
                                        <li>
                                            <div class="item-image">
                                                @if (!empty($item->options->productImage->image))
                                                    <img src="{{ asset('/uploads/product/' . $item->options->productImage->image) }}"
                                                        alt="img-thumbnail" class="card-img-top rounded" />
                                                @else
                                                    <img src="{{ asset('admin-assets/img/default-150X150.png') }}"
                                                        alt="Default" class="card-img-top rounded" />
                                                @endif
                                            </div>
                                            <div class="item-content">
                                                <h4 class="item-title">{{ $item->name }}</h4>
                                                <span class="item-qty">Qty:-{{ $item->qty }}</span>
                                                <span class="item-price">price:-${{ $item->price * $item->qty }}</span>
                                            </div>
                                            <button type="button" class="remove-btn"
                                                onclick="deleteItem('{{ $item->rowId }}');"><i
                                                    class="las la-times"></i></button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="btns-group ul-li clearfix">
                                <ul class="clearfix">
                                    <li><a href="{{ route('front.cart') }}" class="btn bg-default-black">View
                                            Cart</a></li>
                                    <li><a href="{{ route('front.checkout') }}"
                                            class="btn bg-royal-blue">Checkout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="menu_list ul-li-block clearfix">
                <h3 class="widget-title">Menu List</h3>

                <ul class="clearfix">
                    @php
                        $categories = getCategories();
                    @endphp
                    @if ($categories->isNotEmpty())
                        @foreach ($categories as $category)
                            <li class="dropdown">
                                <a href="{{ route('front.product-list', [$category->cat_slug]) }}"
                                    class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">{{ $category->cat_name }}</a>
                                @if ($category->sub_categories->isNotEmpty())
                                    <ul class="dropdown-menu">
                                        @foreach ($category->sub_categories as $subcategory)
                                            @if ($subcategory->category_id == $category->id && !empty($subcategory->cat_sub_name))
                                                <li class="dropdown">
                                                    <a href="{{ route('front.product-list', [$category->cat_slug,$subcategory->cat_sub_slug]) }}"
                                                        class="dropdown-toggle" data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false">{{ $subcategory->cat_sub_name }}</a>
                                                    @if ($subcategory->product->isNotEmpty())
                                                        <ul class="dropdown-menu">
                                                            @foreach ($subcategory->product as $product)
                                                                @if (!empty($product->product_name))
                                                                    <li><a
                                                                            href="{{ route('front.product', $product->product_slug) }}">{{ $product->product_name }}</a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endif
                                        @endforeach
                                        @foreach ($category->product as $product)
                                            @if (!empty($product->product_name))
                                                <li>
                                                    @if ($product->subcategory_id == null)
                                                        <a
                                                            href="{{ route('front.product', $product->product_slug) }}">{{ $product->product_name }}</a>
                                                    @endif
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    @elseif (!empty($category->product) && $category->product->isNotEmpty())
                                    <ul class="dropdown-menu">
                                        @foreach ($category->product as $product)
                                            @if (!empty($product->product_name))
                                                <li>
                                                    <a href="{{ route('front.product', $product->product_slug) }}">{{ $product->product_name }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    @endif
                </ul>

            </div>

            <div class="user-dropdown ul-li-block clearfix">
                <h3 class="widget-title">User Settings</h3>
                <ul class="clearfix">
                    @guest
                        <li><a href="{{ route('account.login') }}"><i class="las la-sign-in-alt"></i> Login</a></li>
                        <li><a href="{{ route('account.register') }}"><i class="las la-user-plus"></i> Register</a></li>
                    @else
                        <li><a href="{{ route('account.profile') }}"><i class="las la-user-circle"></i> Profile</a></li>
                        <li><a href="#!"><i class="las la-user-cog"></i> Settings</a></li>
                        <li><a href="{{ route('account.logout') }}"><i class="las la-sign-out-alt"></i> Logout</a></li>
                    @endguest
                </ul>
            </div>

        </div>
        <div class="overlay"></div>
    </div>
    <!-- sidebar mobile menu - end -->
    <!-- header-section - end
  ================================================== -->



    <!-- main body - start
  ================================================== -->
    <main>
        @yield('content')

		<div class="side-ribbon">
			<a href="tel:+(02) 96213111" title="Call" class="call"><i class="las la-phone"></i></a>
			<a href="https://wa.me/1234567890" target="_blank" class="whatsapp" title="WhatsApp"><i
					class="lab la-whatsapp"></i></a>
			<a href="https://www.instagram.com/your_instagram_username" target="_blank" class="instagram"
				title="Instagram"><i class="lab la-instagram"></i></a>
			<a href="https://www.facebook.com/your_facebook_page" target="_blank" class="facebook" title="Facebook"><i
					class="lab la-facebook"></i></a>
			<a href="https://www.linkedin.com/in/your_linkedin_profile" target="_blank" class="linkedin" title="LinkedIn"><i
					class="lab la-linkedin"></i></a>
		</div>


		<div class="chatbot-toggler">
			<!--<span class="material-symbols-rounded">Chat with us </span>-->
			<!--<span class="material-symbols-outlined">Close</span>-->
			<!--<img src="{{ asset('front-assets/images/live-chat.png') }}" alt="live chat"> -->

		</div>
		
    </main>
    <!-- main body - end
  ================================================== -->


    <!-- footer-section - start
  ================================================== -->
   <footer id="footer-section" class="footer-section sec-ptb-100 pb-0 bg-gray clearfix" style="background: linear-gradient(to right, #533A8A, #7E3A95) !important; color: #FFF;">
			<div class="container">

				<div class="widget-area mb-60 clearfix">
					<div class="row justify-content-lg-between justify-content-md-center justify-content-md-center">

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="about-content">
								<div class="brand-logo mb-4 clearfix">
									<a href="{{ route('front.home')}}" class="brand-link">
										<img src="{{ asset('front-assets/images/logo/logo_1.png') }}" alt="logo_not_found">
									</a>
								</div>
								<p class="mb-30">
									<span style="font-weight: bold">Ready To Print </span>is an Australian-owned printing company specialising in customised, print-ready solutions, offering quick and convenient services for all your printing and signage requirements. Utilising state-of-the-art technology, we aim to be your one-stop shop for all your printing needs.
								</p>
								<!-- <div class="social-icon-circle ul-li clearfix">-->
								<!--	<ul class="clearfix">-->
								<!--		<li><a href="#!"><i class="lab la-facebook-f"></i></a></li>-->
								<!--		<li><a href="#!"><i class="lab la-twitter"></i></a></li>-->
								<!--		<li><a href="#!"><i class="lab la-instagram"></i></a></li>-->
								<!--		<li><a href="#!"><i class="lab la-pinterest-p"></i></a></li>-->
								<!--	</ul>-->
								<!--</div> -->
							</div>
						</div>

						<div class="col-lg-2 col-md-4 col-sm-12 col-xs-12">
							<div class="useful-links ul-li-block clearfix">
								<h3 class="widget-title">Products</h3>
                                <ul class="clearfix">
                                @if (getCategories()->isNotEmpty())
                                    @foreach (getCategories() as $item)
                                        <li><a href="{{ route('front.product-list',[$item->cat_slug])}}">{{ $item->cat_name }}</a></li>
                                    @endforeach
                                @endif
								</ul>
							</div>
						</div>
                        <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12">
							<div class="useful-links ul-li-block clearfix">
								<h3 class="widget-title">Quick Link</h3>
								<ul class="clearfix">
									<li><a href="https://thetemz.in/readytoprint/public/privacy-policy">Privacy Policy</a></li>
									<!--<li><a href="#!">Refund Policy</a></li>-->
									<!--<li><a href="#!">Shipping &amp; Returns</a></li>-->
									<!--<li><a href="#!">Tearms &amp; Condition</a></li>-->
									<!--<li><a href="#!">Help Center</a></li>-->
								</ul>
							</div>
						</div> 

						<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
							<div class="btns-group ul-li-block mb-2">
								<h3 class="widget-title">Information</h3>
								<ul class="clearfix">
									<li style="color: #ffffff;">
                                      <a href="mailto:info@readytoprint.com.au" style="color: #ffffff;">
                                        <i class="las la-envelope-open-text mr-1"></i>info@readytoprint.com.au
                                      </a>
                                    </li>

								
									<li style="color: #ffffff;">
                                      <i class="las la-phone ml-1"></i>
                                      Contact Us: <a href="tel:+61296213111" style="color: #ffffff;">(02) 9621 3111</a>
                                    </li>


									<!-- <li>
										<a href="#!" class="store-btn bg-default-black">
											<span class="icon-wrap">
												<i class="lab la-apple"></i>
											</span>
											<span class="content-wrap">
												<small>available on</small>
												<strong>Apple Store</strong>
											</span>
										</a>
									</li>
									<li>
										<a href="#!" class="store-btn bg-default-black">
											<span class="icon-wrap">
												<i class="lab la-google-play"></i>
											</span>
											<span class="content-wrap">
												<small>available on</small>
												<strong>Google Play</strong>
											</span>
										</a>
									</li> -->
								</ul>
							</div>
							<br>
							<div class="payment-cards ul-li mb-30 clearfix">
								<h3 class="widget-title">Payments</h3>
								<!--<p class="mb-3">Secure Payments</p>-->
								<ul class="mb-3 clearfix">
									<li><a href="#!"><img src="{{ asset('front-assets/images/payment_card/visa.png') }}" alt="_not_found" width="50px;"></a></li>
									<li><a href="#!"><img src="{{ asset('front-assets/images/payment_card/mastercard.png') }}" alt="_not_found" width="50px;"></a></li>
									<li><a href="#!"><img src="{{ asset('front-assets/images/payment_card/AX.png') }}" alt="_not_found" width="50px;"></a></li>
								</ul>
								<p class="mb-0">We accept purchase orders from schools, government, and non-government organizations. Leave your details on the 'Request a Quote' page, and our staff will assist you.</a></p>
							</div>

						</div>

					</div>
				</div>

				<div class="footer-bottom text-center border-top clearfix">
					<p class="mb-0">&#169; Copyright 2024 <a href="#!">Zash Media</a>. All Rights Reserved.</p>
				</div>

			</div>
		</footer>
    <!-- footer-section - end
  ================================================== -->

    <!--Wishlist Modal -->
    <div class="modal fade" id="wishlistModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Success</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('front-assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('front-assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/owl.carousel2.thumbs.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/countdown.js') }}"></script>
    <script src="{{ asset('front-assets/js/custom-js.js') }}"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <!-- Bootstrap JS bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


    <!-- google map - jquery include -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDk2HrmqE4sWSei0XdKGbOMOHN3Mm2Bf-M&ver=2.1.6"></script>
    <script src="{{ asset('front-assets/js/gmaps.min.js') }}"></script>

    <!-- mobile menu - jquery include -->
    <script src="{{ asset('front-assets/js/mCustomScrollbar.js') }}"></script>

    <!-- custom - jquery include -->
    <script src="{{ asset('front-assets/js/custom.js') }}"></script>
    {{-- <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function addToCart(id, colors, size, printSides, finishings, thickness, wirestakesqtys, framesizes, displaytypes,
            materials, applications, paperthickness, pagesinbooks, copiesrequireds, pagesinnotepads, qty, price) {
            $('#addToCartButton').prop('disabled', true);
            var pickupOption = $('#pickup_option').prop('checked') ? $('#pickup_option').val() : '';
            var price = $('#productPrice').text().replace('$', '').trim();
            var qty = parseInt(document.getElementById('quantityInput').value);
            // Check if quantity is valid
            if (!qty || isNaN(qty) || parseInt(qty) <= 0) {
                alert('Please supply a valid quantity.');
                $('#addToCartButton').prop('disabled', false);
                return; // Stop the function execution if quantity is not valid
            }
            $.ajax({
                url: '{{ route('front.addToCart') }}',
                type: 'post',
                data: {
                    id: id,
                    color: colors,
                    size: size,
                    printSides: printSides,
                    finishings: finishings,
                    thickness: thickness,
                    wirestakesqtys: wirestakesqtys,
                    framesizes: framesizes,
                    displaytypes: displaytypes,
                    materials: materials,
                    applications: applications,
                    paperthickness: paperthickness,
                    pagesinbooks: pagesinbooks,
                    copiesrequireds: copiesrequireds,
                    pagesinnotepads: pagesinnotepads,
                    qty: qty,
                    pickup_option: pickupOption,
                    price: price
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status = true) {
                        window.location.href = "{{ route('front.cart') }}";

                    } else {
                        alert(response.message);
                    }

                }
            });
        }
    </script> --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function addToCart(id) {
            // Check if the element exists before trying to access its text content
            $('#addToCartButton').prop('disabled', true);
            var pickupOption = $('#pickup_option').prop('checked') ? $('#pickup_option').val() : '';
            var price = $('#priceDisplay').text().replace('$', '').trim();
            var qty = parseInt(document.getElementById('quantityInput').value);
            var uploadedFileName = $('#uploadedFileName').val();
            var uploadTokenFile = $('#uploadTokenFile').val();

            var sizeDropdown = $('#sizeDropdown');
            var size = '';
            var colorsDropdown = $('#colorsDropdown');
            var colors = '';
            var printSidesDropdown = $('#printSidesDropdown');
            var printSides = '';
            var finishingsDropdown = $('#finishingsDropdown');
            var finishings = '';
            var thicknessDropdown = $('#thicknessDropdown');
            var thickness = '';
            var wirestakesqtysDropdown = $('#wirestakesqtysDropdown');
            var wirestakesqtys = '';
            var framesizesDropdown = $('#framesizesDropdown');
            var framesizes = '';
            var displaytypesDropdown = $('#displaytypesDropdown');
            var displaytypes = '';
            var installationsDropdown = $('#installationsDropdown');
            var installations = '';
            var materialsDropdown = $('#materialsDropdown');
            var materials = '';
            var cornersDropdown = $('#cornersDropdown');
            var corners = '';
            var applicationsDropdown = $('#applicationsDropdown');
            var applications = '';
            var paperthicknessDropdown = $('#paperthicknessDropdown');
            var paperthickness = '';
            var qtysDropdown = $('#qtysDropdown');
            var qtys = '';
            var pagesinbooksDropdown = $('#pagesinbooksDropdown');
            var pagesinbooks = '';
            var copiesrequiredsDropdown = $('#copiesrequiredsDropdown');
            var copiesrequireds = '';
            var pagesinnotepadsDropdown = $('#pagesinnotepadsDropdown');
            var pagesinnotepads = '';


            // Check if size dropdown exists
           if (sizeDropdown.length > 0) {
                var size = sizeDropdown.val(); // Get the selected size from the dropdown

                // Check if size is not selected
                if (!size) {
                    $('#sizeError').css('display', 'block'); // Display error message
                    return; // Stop the function execution if size is not selected
                } else {
                    $('#sizeError').css('display', 'none'); // Hide error message if size is selected
                }

                if (size === 'Custom Size') {
                    var width = parseFloat($('#width').val());
                    var height = parseFloat($('#height').val());

                    if (isNaN(width) || width < 30) {
                        $('#widthError').show();
                    } else {
                        $('#widthError').hide();
                    }

                    if (isNaN(height) || height < 30) {
                        $('#heightError').show();
                    } else {
                        $('#heightError').hide();
                    }

                    // Check if both width and height are valid before proceeding
                    if (isNaN(width) || width < 30 || isNaN(height) || height < 30) {
                        return; // Stop the function execution if width or height are invalid
                    } else {
                        size = width + 'mm x ' + height + 'mm'; // Set the size to the custom value
                    }
                }
            }

            // Check if size dropdown exists
            if (colorsDropdown.length > 0) {
                var color = colorsDropdown.val(); // Get the selected size from the dropdown

                // Check if size is not selected
                if (!color) {
                    $('#colorsError').css('display', 'block'); // Display error message
                    return; // Stop the function execution if size is not selected
                } else {
                    $('#colorsError').css('display', 'none'); // Hide error message if size is selected
                }
            }
            // Check if printSides dropdown exists
            if (printSidesDropdown.length > 0) {
                var printSides = printSidesDropdown.val(); // Get the selected size from the dropdown

                // Check if size is not selected
                if (!printSides) {
                    $('#printSidesError').css('display', 'block'); // Display error message
                    return; // Stop the function execution if size is not selected
                } else {
                    $('#printSidesError').css('display', 'none'); // Hide error message if size is selected
                }
            }
            // Check if finishings dropdown exists
            if (finishingsDropdown.length > 0) {
                var finishings = finishingsDropdown.val(); // Get the selected size from the dropdown

                // Check if size is not selected
                if (!finishings) {
                    $('#finishingsError').css('display', 'block'); // Display error message
                    return; // Stop the function execution if size is not selected
                } else {
                    $('#finishingsError').css('display', 'none'); // Hide error message if size is selected
                }
            }
            // Check if thickness dropdown exists
            if (thicknessDropdown.length > 0) {
                var thickness = thicknessDropdown.val(); // Get the selected size from the dropdown

                // Check if size is not selected
                if (!thickness) {
                    $('#thicknessError').css('display', 'block'); // Display error message
                    return; // Stop the function execution if size is not selected
                } else {
                    $('#thicknessError').css('display', 'none'); // Hide error message if size is selected
                }
            }
            // Check if wirestakesqtys dropdown exists
            if (wirestakesqtysDropdown.length > 0) {
                var wirestakesqtys = wirestakesqtysDropdown.val(); // Get the selected size from the dropdown

                // Check if size is not selected
                if (!wirestakesqtys) {
                    $('#wirestakesqtysError').css('display', 'block'); // Display error message
                    return; // Stop the function execution if size is not selected
                } else {
                    $('#wirestakesqtysError').css('display', 'none'); // Hide error message if size is selected
                }
            }
            // Check if framesizes dropdown exists
            if (framesizesDropdown.length > 0) {
                var framesizes = framesizesDropdown.val(); // Get the selected size from the dropdown

                // Check if framesizes is not selected
                if (!framesizes) {
                    $('#framesizesError').css('display', 'block'); // Display error message
                    return; // Stop the function execution if size is not selected
                } else {
                    $('#framesizesError').css('display', 'none'); // Hide error message if size is selected
                }
            }
            // Check if displaytypes dropdown exists
            if (displaytypesDropdown.length > 0) {
                var displaytypes = displaytypesDropdown.val(); // Get the selected displaytypes from the dropdown

                // Check if displaytypes is not selected
                if (!displaytypes) {
                    $('#displaytypesError').css('display', 'block'); // Display error message
                    return; // Stop the function execution if displaytypes is not selected
                } else {
                    $('#displaytypesError').css('display', 'none'); // Hide error message if displaytypes is selected
                }
            }
            // Check if installations dropdown exists
            if (installationsDropdown.length > 0) {
                var installations = installationsDropdown.val(); // Get the selected installations from the dropdown

                // Check if installations is not selected
                if (!installations) {
                    $('#installationsError').css('display', 'block'); // Display error message
                    return; // Stop the function execution if installations is not selected
                } else {
                    $('#installationsError').css('display', 'none'); // Hide error message if installations is selected
                }
            }
            // Check if materials dropdown exists
            if (materialsDropdown.length > 0) {
                var materials = materialsDropdown.val(); // Get the selected materials from the dropdown

                // Check if materials is not selected
                if (!materials) {
                    $('#materialsError').css('display', 'block'); // Display error message
                    return; // Stop the function execution if materials is not selected
                } else {
                    $('#materialsError').css('display', 'none'); // Hide error message if materials is selected
                }
            }
            // Check if corners dropdown exists
            if (cornersDropdown.length > 0) {
                var corners = cornersDropdown.val(); // Get the selected corners from the dropdown

                // Check if corners is not selected
                if (!corners) {
                    $('#cornersError').css('display', 'block'); // Display error message
                    return; // Stop the function execution if corners is not selected
                } else {
                    $('#cornersError').css('display', 'none'); // Hide error message if corners is selected
                }
            }
            // Check if applications dropdown exists
            if (applicationsDropdown.length > 0) {
                var applications = applicationsDropdown.val(); // Get the selected applications from the dropdown

                // Check if applications is not selected
                if (!applications) {
                    $('#applicationsError').css('display', 'block'); // Display error message
                    return; // Stop the function execution if applications is not selected
                } else {
                    $('#applicationsError').css('display', 'none'); // Hide error message if applications is selected
                }
            }
            // Check if paperthickness dropdown exists
            if (paperthicknessDropdown.length > 0) {
                var paperthickness = paperthicknessDropdown.val(); // Get the selected paperthickness from the dropdown

                // Check if paperthickness is not selected
                if (!paperthickness) {
                    $('#paperthicknessError').css('display', 'block'); // Display error message
                    return; // Stop the function execution if paperthickness is not selected
                } else {
                    $('#paperthicknessError').css('display', 'none'); // Hide error message if paperthickness is selected
                }
            }
            // Check if qtys dropdown exists
            if (qtysDropdown.length > 0) {
                var qtys = qtysDropdown.val(); // Get the selected size from the dropdown

                // Check if size is not selected
                if (!qtys) {
                    $('#qtysError').css('display', 'block'); // Display error message
                    return; // Stop the function execution if size is not selected
                } else {
                    $('#qtysError').css('display', 'none'); // Hide error message if size is selected
                }
            }
            // Check if pagesinbooks dropdown exists
            if (pagesinbooksDropdown.length > 0) {
                var pagesinbooks = pagesinbooksDropdown.val(); // Get the selected pagesinbooks from the dropdown

                // Check if pagesinbooks is not selected
                if (!pagesinbooks) {
                    $('#pagesinbooksError').css('display', 'block'); // Display error message
                    return; // Stop the function execution if pagesinbooks is not selected
                } else {
                    $('#pagesinbooksError').css('display', 'none'); // Hide error message if pagesinbooks is selected
                }
            }
            // Check if copiesrequireds dropdown exists
            if (copiesrequiredsDropdown.length > 0) {
                var copiesrequireds = copiesrequiredsDropdown.val(); // Get the selected copiesrequireds from the dropdown

                // Check if copiesrequireds is not selected
                if (!copiesrequireds) {
                    $('#copiesrequiredsError').css('display', 'block'); // Display error message
                    return; // Stop the function execution if copiesrequireds is not selected
                } else {
                    $('#copiesrequiredsError').css('display', 'none'); // Hide error message if copiesrequireds is selected
                }
            }
            // Check if pagesinnotepads dropdown exists
            if (pagesinnotepadsDropdown.length > 0) {
                var pagesinnotepads = pagesinnotepadsDropdown.val(); // Get the selected pagesinnotepads from the dropdown

                // Check if size is not selected
                if (!pagesinnotepads) {
                    $('#pagesinnotepadsError').css('display', 'block'); // Display error message
                    return; // Stop the function execution if pagesinnotepads is not selected
                } else {
                    $('#pagesinnotepadsError').css('display', 'none'); // Hide error message if pagesinnotepads is selected
                }
            }

            $.ajax({
                url: '{{ route('front.addToCart') }}',
                type: 'post',
                data: {
                    id: id,
                    color: colors,
                    size: size,
                    printSides: printSides,
                    finishings: finishings,
                    thickness: thickness,
                    wirestakesqtys: wirestakesqtys,
                    framesizes: framesizes,
                    displaytypes: displaytypes,
                    installations: installations,
                    materials: materials,
                    corners: corners,
                    applications: applications,
                    paperthickness: paperthickness,
                    pagesinbooks: pagesinbooks,
                    copiesrequireds: copiesrequireds,
                    pagesinnotepads: pagesinnotepads,
                    qty: qty,
                    pickup_option: pickupOption,
                    price: price,
                    uploadedFileName: uploadedFileName,
                    uploadTokenFile: uploadTokenFile
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status = true) {
                        window.location.href = "{{ route('front.cart') }}";
                    } else {
                        alert(response.message);
                    }
                }
            });
        }
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function buyNow(id, color, size, printedSides, qty, price) {
            $('#buyNowButton').prop('disabled', true);
            var pickupOption = $('#pickup_option').prop('checked') ? $('#pickup_option').val() : '';
            $.ajax({
                url: '{{ route('front.buyNow') }}',
                type: 'post',
                data: {
                    id: id,
                    color: color,
                    size: size,
                    printedSides: printedSides,
                    qty: qty,
                    pickup_option: pickupOption,
                    price: price
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status = true) {
                        window.location.href = "{{ route('front.checkout') }}";

                    } else {
                        alert(response.message);
                    }

                }
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            var availableTags = [];

            $.ajax({
                method: "GET",
                url: "/product-search",
                success: function(response) {
                    availableTags = response; // Assign response to availableTags
                    startAutoComplete(availableTags);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });

            function startAutoComplete(availableTags) {
                $("#search_product").autocomplete({
                    source: availableTags
                });
            }
        });
    </script>
    <script>
        // Function to add to wishlist
        function addToWishList(id) {
            $.ajax({
                url: '{{ route('front.addToWishlist') }}', // Ensure that this URL is correctly set up in your routes
                type: 'post',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === true) {
                        $("#wishlistModal .modal-body").html(response.message);
                        $("#wishlistModal").modal('show');
                        // alert('Added to wishlist successfully!');
                    } else {
                        // Redirect to login if the response status is not true
                        window.location.href = "{{ route('account.login') }}";
                    }
                },
                error: function(xhr, status, error) {
                    // Optional: handle errors
                    console.error("Error occurred: " + error);
                }
            });
        }
    </script>


    @yield('javascript.js')

</body>

</html>
