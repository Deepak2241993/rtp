@extends('layouts.master')

@section('style.css')
    <style>
        /* CSS */
        #sizeDropdown:invalid+#sizeError {
            display: block;
        }

        .rating {
            display: inline-block;
        }

        .rating input[type="radio"] {
            display: none;
        }

        .rating label {
            float: right;
            cursor: pointer;
        }

        .input-holder {
            height: 90px;
        }

        .price-container {
            padding: 15px;
        }

        .gst-info {
            font-size: 16px;
            color: #888;
            margin-bottom: 3px;
            font-style: italic;
            margin-left: 12px;
        }

        .item-price {
            font-size: 40px !important;
            color: #FF5722;
            font-weight: bold;
        }

        .gst-info::before {
            content: '* ';
            color: red;
        }

        .price-valid {
            font-size: 16px;
            color: green;
        }

        .price-error {
            font-size: 16px !important;
            color: red !important;
        }

        span.as-low {
            font-size: 14px;
            font-weight: 600;
            line-height: 1;
            display: inline-block;
            margin: 0;
            padding: 0;
        }

        /* New styles for price calculation section */
        .price-calculation-section {
            display: none;
            background: #f8f9fa;
            border: 2px solid #007bff;
            border-radius: 10px;
            padding: 30px;
            margin: 20px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .price-breakdown {
            margin: 15px 0;
        }

        .price-breakdown h4 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }

        .price-item {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #ddd;
            font-size: 16px;
        }

        .price-item:last-child {
            border-bottom: 2px solid #007bff;
            font-weight: bold;
            font-size: 20px;
            color: #FF5722;
            margin-top: 10px;
            padding-top: 15px;
        }

        .price-item span:first-child {
            font-weight: 500;
        }

        .price-item span:last-child {
            font-weight: bold;
            color: #333;
        }

        .price-item:last-child span:last-child {
            color: #FF5722;
        }

        /* Product details section that will be hidden */
        .product-details-section {
            display: block;
        }

        .product-details-section.hidden {
            display: none;
        }

        /* File upload section that will be hidden */
        .file-upload-section {
            display: block;
        }

        .file-upload-section.hidden {
            display: none;
        }

        /* Button styling to match */
        .calculate-price-btn {
            background: #007bff;
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .calculate-price-btn:hover {
            background: #0056b3;
            color: white;
            text-decoration: none;
        }

        .add-to-cart-section {
            display: none;
            text-align: center;
            margin-top: 20px;
        }

        /* Make recalculate button same as add to cart button */
        .recalculate-btn {
            background: #007bff;
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
            margin-left: 15px;
        }

        .recalculate-btn:hover {
            background: #0056b3;
            color: white;
            text-decoration: none;
        }

        /* Ensure both buttons are aligned properly */
        .add-to-cart-section .btn,
        .add-to-cart-section .recalculate-btn {
            display: inline-block;
            vertical-align: middle;
            margin: 0 5px;
        }

        /* Enhanced FAQ Styling */
        .faq-container {
            max-width: 100%;
            margin: 0 auto;
        }

        .faq-accordion {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .faq-card {
            border: none;
            border-bottom: 1px solid #e9ecef;
            margin-bottom: 0;
        }

        .faq-card:last-child {
            border-bottom: none;
        }

        .faq-card-header {
            /* background: linear-gradient(135deg, #007bff 0%, #0056b3 100%); */
            background: #543B8C;
            border: none;
            padding: 0;
            position: relative;
            transition: all 0.3s ease;
        }

        .faq-card-header:hover {
            background: #543B8C;
            /* background: linear-gradient(135deg, #0056b3 0%, #004085 100%); */
        }

        .faq-question-btn {
            background: transparent;
            border: none;
            color: white;
            font-size: 16px;
            font-weight: 600;
            padding: 20px 25px;
            text-align: left;
            width: 100%;
            position: relative;
            transition: all 0.3s ease;
            text-decoration: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .faq-question-btn:hover,
        .faq-question-btn:focus {
            color: white;
            text-decoration: none;
            outline: none;
        }

        .faq-arrow {
            font-size: 18px;
            transition: transform 0.3s ease;
            margin-left: 15px;
        }

        .faq-question-btn[aria-expanded="true"] .faq-arrow {
            transform: rotate(180deg);
        }

        .faq-collapse {
            border-top: 3px solid #543B8C;
            /* border-top: 3px solid #007bff; */
        }

        .faq-card-body {
            background: #f8f9fa;
            padding: 25px;
            font-size: 15px;
            line-height: 1.6;
            color: #495057;
            border-left: 4px solid #543B8C;
            /* border-left: 4px solid #007bff; */
            margin: 0;
        }

        .faq-card-body p {
            margin-bottom: 15px;
        }

        .faq-card-body p:last-child {
            margin-bottom: 0;
        }

        /* FAQ Icon */
        .faq-icon {
            display: inline-block;
            width: 24px;
            height: 24px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            text-align: center;
            line-height: 24px;
            margin-right: 10px;
            font-size: 14px;
        }

        /* FAQ Section Title */
        .faq-section-title {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            font-size: 28px;
            font-weight: bold;
            position: relative;
        }

        .faq-section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            border-radius: 2px;
        }

        /* Clean FAQ content styling */
        .faq-question-text {
            line-height: 1.4;
        }

        .faq-answer-content {
            line-height: 1.6;
        }

        .faq-answer-content p {
            margin-bottom: 10px;
        }

        .faq-answer-content p:empty {
            display: none;
        }

        /* Responsive FAQ */
        @media (max-width: 768px) {
            .faq-question-btn {
                font-size: 14px;
                padding: 15px 20px;
            }
            
            .faq-card-body {
                padding: 20px;
                font-size: 14px;
            }
            
            .faq-section-title {
                font-size: 24px;
            }
        }
    </style>
@endsection

@section('content')
    <section class="details-section sec-ptb-100 pb-0 clearfix">
        <div class="container">
            @include('front.account.common.message')
            <div class="row mb-100 justify-content-lg-between justify-content-md-between justify-content-sm-center">
                <div class="col-lg-5 col-md-5 col-sm-8 col-xs-12">
                    <div class="details-image">
                        <div class="details-image-carousel owl-carousel owl-theme" data-slider-id="thumbnail-carousel">
                            @if ($product->product_images)
                                @foreach ($product->product_images as $key => $productImage)
                                    <div class="item {{ $key == 0 ? 'active' : '' }}">
                                        <img src="{{ asset('uploads/product/' . $productImage->image) }}"
                                            alt="image_not_found">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="owl-thumbs clearfix" data-slider-id="thumbnail-carousel">
                            @if ($product->product_images)
                                @foreach ($product->product_images as $key => $productImage)
                                    <button class="item {{ $key == 0 ? 'active' : '' }}">
                                        <span>
                                            <img src="{{ asset('uploads/product/' . $productImage->image) }}"
                                                alt="image_not_found">
                                        </span>
                                    </button>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">
                    <div class="details-content pl-20">
                        <h2 class="item-title mb-15">{{ $product->product_name }}</h2>
                        <div class="rating-star ul-li mb-30 clearfix">
                        </div>

                        <div class="container mt-5">
                            <form>
                                @csrf
                                <?php
                                // Initialize arrays to hold specific attribute types
                                $sizes = []; // 1
                                $colors = []; // 2
                                $printSides = []; // 3
                                $finishings = []; // 4
                                $thickness = []; // 5
                                $wirestakesqtys = []; // 6
                                $framesizes = []; // 7
                                $displaytypes = []; // 8
                                $installations = []; // 9
                                $materials = []; // 10
                                $corners = []; // 11
                                $applications = []; // 12
                                $paperthickness = []; // 13
                                $qtys = []; // 14
                                $pagesinbooks = []; // 15
                                $copiesrequireds = []; // 16
                                $pagesinnotepads = []; // 17
                                $cuttings = []; // 18
                                
                                // Loop through all attributes and sort them into the correct arrays
                                foreach ($product->product_attribute as $attribute) {
                                    switch ($attribute->attribute_type) {
                                        case 'color':
                                            $colors[] = $attribute->attribute_value;
                                            break;
                                        case 'print_side':
                                            $printSides[] = $attribute->attribute_value;
                                            break;
                                        case 'finishing':
                                            $finishings[] = $attribute->attribute_value;
                                            break;
                                        case 'thickness':
                                            $thickness[] = $attribute->attribute_value;
                                            break;
                                        case 'wirestakesqty':
                                            $wirestakesqtys[] = $attribute->attribute_value;
                                            break;
                                        case 'framesize':
                                            $framesizes[] = $attribute->attribute_value;
                                            break;
                                        case 'displaytype':
                                            $displaytypes[] = $attribute->attribute_value;
                                            break;
                                        case 'installation':
                                            $installations[] = $attribute->attribute_value;
                                            break;
                                        case 'material':
                                            $materials[] = $attribute->attribute_value;
                                            break;
                                        case 'corners':
                                            $corners[] = $attribute->attribute_value;
                                            break;
                                        case 'application':
                                            $applications[] = $attribute->attribute_value;
                                            break;
                                        case 'paperthickness':
                                            $paperthickness[] = $attribute->attribute_value;
                                            break;
                                        case 'qty':
                                            $qtys[] = $attribute->attribute_value;
                                            break;
                                        case 'pagesinbook':
                                            $pagesinbooks[] = $attribute->attribute_value;
                                            break;
                                        case 'copiesrequired':
                                            $copiesrequireds[] = $attribute->attribute_value;
                                            break;
                                        case 'pagesinnotepad':
                                            $pagesinnotepads[] = $attribute->attribute_value;
                                            break;
                                        // add more cases as needed for different attribute types
                                    }
                                }
                                ?>

                                <!-- Product Details Section (will be hidden after calculation) -->
                                <div class="product-details-section" id="productDetailsSection">
                                    <div class="price-container">
                                        <div class="price-row">
                                            <span class="item-price">
                                                <span class="as-low">As <br> low as </span> ${{ $product->product_price }}<span
                                                    class="gst-info">* Excluding GST</span>
                                            </span>
                                        </div>
                                        <span class="item-price" id="priceDisplay" hidden>${{ $product->product_price }}</span>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="form-group col-md-6 input-holder">
                                            <label for="quantity">Quantity:</label>
                                            <div class="">
                                                <form id="product-form-template--14606459338821__main" action="#">
                                                    <input type="number" name="quantity" id="quantityInput"
                                                        class="quantity__input form-control" min="1" value="1">
                                                </form>
                                            </div>
                                        </div>

                                        @if (!empty($product->product_prices))
                                            <div class="form-group col-md-6 input-holder">
                                                <label for="sizeDropdown">Size Options:</label>
                                                <select class="form-control" id="sizeDropdown" name="size" required>
                                                    <option value="">Select Size</option>
                                                    @php
                                                        $uniqueSizes = [];
                                                        if (!empty($product->product_prices)) {
                                                            foreach ($product->product_prices as $price) {
                                                                if ($price->product_id == $product->id) {
                                                                    $size = [
                                                                        'width' => $price->product_width,
                                                                        'height' => $price->product_height,
                                                                    ];
                                                                    if (!in_array($size, $uniqueSizes)) {
                                                                        $uniqueSizes[] = $size;
                                                                    }
                                                                }
                                                            }
                                                        }

                                                    // Gather unique sizes from fixed_price_options
                                                    if (!empty($product->fixed_price_options)) {
                                                        foreach ($product->fixed_price_options as $fixedPrice) {
                                                            if ($fixedPrice->product_id == $product->id) {
                                                                $size = [
                                                                    'width' => $fixedPrice->width,
                                                                    'height' => $fixedPrice->height,
                                                                ];
                                                                if (!in_array($size, $uniqueSizes)) {
                                                                    $uniqueSizes[] = $size;
                                                                }
                                                            }
                                                        }
                                                    }
                                                    // Format size without commas
                                                    function formatSize($value)
                                                    {
                                                        return fmod($value, 1) == 0 ? intval($value) : $value;
                                                    }
                                                @endphp
                                                @foreach ($uniqueSizes as $size)
                                                    <option
                                                        value="{{ formatSize($size['width']) }} x {{ formatSize($size['height']) }}">
                                                        {{ formatSize($size['width']) }}mm W x
                                                        {{ formatSize($size['height']) }}mm H
                                                    </option>
                                                @endforeach
                                                <!-- Other size options -->
                                                @if ($product->product_allows_custom_size == 1)
                                                    <option value="Custom Size">Custom Size</option>
                                                @endif
                                            </select>
                                            <p id="sizeError" style="color: red; display: none;">Please select a Size.</p>
                                        </div>
                                        <div id="customSizeFields" class="col-md-12" style="display: none;">
                                            <div class="row">
                                                <div class="col-md-6 input-holder">
                                                    <label for="width">Width (mm):</label>
                                                    <input type="text" class="form-control" id="width"
                                                        name="width">
                                                    <p id="widthError" style="display: none; color: red;">Width must be at
                                                        least 30mm.</p>
                                                </div>
                                                <div class="col-md-6 input-holder">
                                                    <label for="height">Height (mm):</label>
                                                    <input type="text" class="form-control" id="height"
                                                        name="height">
                                                    <p id="heightError" style="display: none; color: red;">Height must be at
                                                        least 30mm.</p>
                                                </div>
                                            </div>
                                            <p id="customSizeError" style="color: red; display: none;">Both Width and Height
                                                are required and must be at least 30mm.</p>
                                        </div>
                                    @endif
                                    @if (!empty($product->cutting))
                                        <div class="form-group col-md-6 input-holder">
                                            <label for="sizeDropdown">Cutting Options:</label>
                                            @php
                                                $cuttingOptions = explode('|', $product->cutting);
                                            @endphp
                                            <select class="form-control" id="sizeDropdown" name="size" required>
                                                @foreach ($cuttingOptions as $cuttingOption)
                                                    <option value="{{ $cuttingOption }}">{{ $cuttingOption }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif

                                    @if (
                                        !empty($product->rigidMedia) &&
                                            collect($product->rigidMedia)->contains(function ($media) {
                                                return in_array($media['media_type'], ['single side', 'double side']);
                                            }))
                                        <div class="form-group col-md-6 input-holder">
                                            <label for="printSidesDropdown">Print Sides</label>
                                            <select class="form-control" id="printSidesDropdown" name="printSides" required>

                                                @foreach (collect($product->rigidMedia)->unique('media_type') as $media)
                                                    @if (!empty($media['media_type']) && in_array($media['media_type'], ['single side', 'double side']))
                                                        <option value="{{ $media['media_type'] }}"
                                                            @if ($media['media_type'] === 'single side') selected @endif>
                                                            {{ ucfirst($media['media_type']) }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <p id="media_typeError" style="color: red; display: none;">Please select a Print
                                                Side.</p>
                                        </div>
                                    @endif





                                    @if (!empty($colors))
                                        <div class="form-group col-md-6 input-holder">
                                            <label for="colorsDropdown">Base Color</label>
                                            <select class="form-control" id="colorsDropdown" name="baseColor" required>
                                                <option value="">Select colors</option>
                                                @foreach ($colors as $color)
                                                    <option value="{{ $color }}">{{ $color }}</option>
                                                @endforeach
                                            </select>
                                            <p id="colorsError" style="color: red; display: none;">Please select a Base
                                                Color.
                                            </p>
                                        </div>
                                    @endif

                                        @if (!empty($printSides))
                                            <div class="form-group col-md-6 input-holder">
                                                <label for="printSidesDropdown2">Print Sides</label>
                                                <select class="form-control" id="printSidesDropdown2" name="printSides2"
                                                    required>
                                                    <option value="">Select Size</option>
                                                    @foreach ($printSides as $printSide)
                                                        <option value="{{ $printSide }}">{{ $printSide }}</option>
                                                    @endforeach
                                                </select>
                                                <p id="printSidesError" style="color: red; display: none;">Please select a
                                                    Print
                                                    Sides.</p>
                                            </div>
                                        @endif

                                        @if (!empty($finishings))
                                            <div class="form-group col-md-6 input-holder">
                                                <label for="finishingsDropdown">Finishings</label>
                                                <select class="form-control" id="finishingsDropdown" name="finishings"
                                                    required>
                                                    @foreach ($finishings as $finishing)
                                                        <option value="{{ $finishing }}">{{ $finishing }}</option>
                                                    @endforeach
                                                </select>
                                                <p id="finishingsError" style="color: red; display: none;">Please select a
                                                    Finishings.
                                                </p>
                                            </div>
                                        @endif

                                        @if (!empty($thickness))
                                            <div class="form-group col-md-6 input-holder">
                                                <label for="thicknessDropdown">Thickness</label>
                                                <select class="form-control" id="thicknessDropdown" name="Thickness"
                                                    required>
                                                    <option value="">Select Thickness</option>
                                                    @foreach ($thickness as $thicknes)
                                                        <option value="{{ $thicknes }}">{{ $thicknes }}</option>
                                                    @endforeach
                                                </select>
                                                <p id="thicknessError" style="color: red; display: none;">Please select a
                                                    Thicknes.</p>
                                            </div>
                                        @endif

                                        @if (!empty($wirestakesqtys))
                                            <div class="form-group col-md-6 input-holder">
                                                <label for="wirestakesqtysDropdown">Wire Stakes QTY</label>
                                                <select class="form-control" id="wirestakesqtysDropdown"
                                                    name="wirestakesqtys" required>
                                                    <option value="">Select Wire Stakes</option>
                                                    @foreach ($wirestakesqtys as $wirestakesqty)
                                                        <option value="{{ $wirestakesqty }}">{{ $wirestakesqty }}</option>
                                                    @endforeach
                                                </select>
                                                <p id="wirestakesqtysError" style="color: red; display: none;">Please select
                                                    Wire Stakes
                                                </p>
                                            </div>
                                        @endif

                                        @if (!empty($framesizes))
                                            <div class="form-group col-md-6 input-holder">
                                                <label for="framesizesDropdown">Framesizes</label>
                                                <select class="form-control" id="framesizesDropdown" name="framesizes"
                                                    required>
                                                    <option value="">Select Frame Sizes</option>
                                                    @foreach ($framesizes as $framesize)
                                                        <option value="{{ $framesize }}">{{ $framesize }}</option>
                                                    @endforeach
                                                </select>
                                                <p id="framesizesError" style="color: red; display: none;">Please select a
                                                    Frame Sizes.</p>
                                            </div>
                                        @endif

                                        @if (!empty($displaytypes))
                                            <div class="form-group col-md-6 input-holder">
                                                <label for="displaytypesDropdown">Display Types</label>
                                                <select class="form-control" id="displaytypesDropdown" name="displaytypes"
                                                    required>
                                                    <option value="">Select Display Types</option>
                                                    @foreach ($displaytypes as $displaytype)
                                                        <option value="{{ $displaytype }}">{{ $displaytype }}</option>
                                                    @endforeach
                                                </select>
                                                <p id="displaytypesError" style="color: red; display: none;">Please select
                                                    Display Types.
                                                </p>
                                            </div>
                                        @endif

                                        @if (!empty($installations))
                                            <div class="form-group col-md-6 input-holder">
                                                <label for="installationsDropdown">Installations</label>
                                                <select class="form-control" id="installationsDropdown" name="installations"
                                                    required>
                                                    <option value="">Select Installation</option>
                                                    @foreach ($installations as $installation)
                                                        <option value="{{ $installation }}">{{ $installation }}</option>
                                                    @endforeach
                                                </select>
                                                <p id="installationsError" style="color: red; display: none;">Please select a
                                                    Installations.</p>
                                            </div>
                                        @endif

                                        @if (!empty($materials))
                                            <div class="form-group col-md-6 input-holder">
                                                <label for="materialsDropdown">Materials</label>
                                                <select class="form-control" id="materialsDropdown" name="materialsColor"
                                                    required>
                                                    <option value="">Select Materials</option>
                                                    @foreach ($materials as $material)
                                                        <option value="{{ $material }}">{{ $material }}</option>
                                                    @endforeach
                                                </select>
                                                <p id="materialsError" style="color: red; display: none;">Please select
                                                    Materials.
                                                </p>
                                            </div>
                                        @endif

                                        @if (!empty($corners))
                                            <div class="form-group col-md-6 input-holder">
                                                <label for="cornersDropdown">Corners</label>
                                                <select class="form-control" id="cornersDropdown" name="corners" required>
                                                    <option value="">Select Corners</option>
                                                    @foreach ($corners as $corner)
                                                        <option value="{{ $corner }}">{{ $corner }}</option>
                                                    @endforeach
                                                </select>
                                                <p id="cornersError" style="color: red; display: none;">Please select Corners.
                                                </p>
                                            </div>
                                        @endif

                                        @if (!empty($applications))
                                            <div class="form-group col-md-6 input-holder">
                                                <label for="applicationsDropdown">Applications</label>
                                                <select class="form-control" id="applicationsDropdown" name="applications"
                                                    required>
                                                    <option value="">Select Applications</option>
                                                    @foreach ($applications as $application)
                                                        <option value="{{ $application }}">{{ $application }}</option>
                                                    @endforeach
                                                </select>
                                                <p id="applicationsError" style="color: red; display: none;">Please select
                                                    Applications.
                                                </p>
                                            </div>
                                        @endif

                                        @if (!empty($paperthickness))
                                            <div class="form-group col-md-6 input-holder">
                                                <label for="paperthicknessDropdown">Paper Thicknes</label>
                                                <select class="form-control" id="paperthicknessDropdown" name="paperthicknes"
                                                    required>
                                                    <option value="">Select Paper Thickness</option>
                                                    @foreach ($paperthickness as $paperthicknes)
                                                        <option value="{{ $paperthicknes }}">{{ $paperthicknes }}</option>
                                                    @endforeach
                                                </select>
                                                <p id="paperthicknessError" style="color: red; display: none;">Please select
                                                    Paper Thickness.</p>
                                            </div>
                                        @endif

                                        @if (!empty($qtys))
                                            <div class="form-group col-md-6 input-holder">
                                                <label for="qtysDropdown">QTYs</label>
                                                <select class="form-control" id="qtysDropdown" name="qtys" required>
                                                    <option value="">Select QTYs</option>
                                                    @foreach ($qtys as $qtys)
                                                        <option value="{{ $qtys }}">{{ $qtys }}</option>
                                                    @endforeach
                                                </select>
                                                <p id="qtysError" style="color: red; display: none;">Please select QTYs.
                                                </p>
                                            </div>
                                        @endif

                                        @if (!empty($pagesinbooks))
                                            <div class="form-group col-md-6 input-holder">
                                                <label for="pagesinbooksDropdown">Pages in Book</label>
                                                <select class="form-control" id="pagesinbooksDropdown" name="pagesinbook"
                                                    required>
                                                    <option value="">Select Paper In Books</option>
                                                    @foreach ($pagesinbooks as $pagesinbook)
                                                        <option value="{{ $pagesinbook }}">{{ $pagesinbook }}</option>
                                                    @endforeach
                                                </select>
                                                <p id="pagesinbooksError" style="color: red; display: none;">Please select
                                                    Pages In Book.</p>
                                            </div>
                                        @endif

                                        @if (!empty($copiesrequireds))
                                            <div class="form-group col-md-6 input-holder">
                                                <label for="copiesrequiredsDropdown">Copies Requireds</label>
                                                <select class="form-control" id="copiesrequiredsDropdown"
                                                    name="copiesrequireds" required>
                                                    <option value="">Select Copies Requireds</option>
                                                    @foreach ($copiesrequireds as $copiesrequired)
                                                        <option value="{{ $copiesrequired }}">{{ $copiesrequired }}</option>
                                                    @endforeach
                                                </select>
                                                <p id="copiesrequiredsError" style="color: red; display: none;">Please select
                                                    Copies Requireds.
                                                </p>
                                            </div>
                                        @endif

                                    @if (!empty($pagesinnotepads))
                                        <div class="form-group col-md-6 input-holder">
                                            <label for="pagesinnotepadsDropdown">Pages</label>
                                            <select class="form-control" id="pagesinnotepadsDropdown"
                                                name="pagesinnotepads" required>
                                                <option value="">Select Pages Requireds</option>
                                                @foreach ($pagesinnotepads as $pagesinnotepad)
                                                    <option value="{{ $pagesinnotepad }}">{{ $pagesinnotepad }}</option>
                                                @endforeach
                                            </select>
                                            <p id="pagesinnotepadsError" style="color: red; display: none;">Please select
                                                Pages Requireds.
                                            </p>
                                        </div>
                                    @endif
                                </div>
                                {{-- <div class="row">

                                </div> --}}


                                {{-- @foreach ($product->product_attribute as $attribute)
                                    <div>
                                        <strong>Type:</strong> {{ $attribute->attribute_type }} <br>
                                        <strong>Value:</strong> {{ $attribute->attribute_value }} <br>
                                        <strong>Price:</strong> {{ $attribute->attribute_price }}
                                    </div>
                                @endforeach --}}


                                {{-- @php

                                    die();
                                @endphp --}}


                                    <div class="row">
                                        <div class="form-group col-md-12 input-holder">
                                            <div style="display: flex; align-items: center;">
                                                <input style="margin-left: 20px;" type="checkbox" id="pickup_option"
                                                    name="pickup_option" value="Kings Park, NSW">
                                                <label for="pickup_option"
                                                    style="margin-left: 6px; margin-top: 5px; font-family: poppins; font-size: 15px; font-weight: 500;">Pickup
                                                    (Kings Park, NSW)</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- File Upload Section (will be hidden after calculation) -->
                                <div class="file-upload-section" id="fileUploadSection">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>How would you like to submit your design file?</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <button id="checkAuthButton" class="btn bg-royal-blue">
                                                Upload Finished Artwork<br>Print-Ready Files
                                            </button>
                                            <input type="file" id="fileInput" name="uploadedFiles[]" class="hidden" multiple
                                                onchange="handleFileUpload()">
                                            <input type="hidden" id="uploadTokenFile" name="uploadTokenFile"
                                                value="{{ $token }}">
                                            <p id="uploadMessage"></p>
                                            <div id="uploadedFileNames"></div>
                                            <input type="hidden" id="uploadedFileName" name="uploadedFileName">
                                        </div>

                                        <div class="form-group col-md-6 ">
                                            <a href="{{ route('front.design-for-you') }}" style="line-height: 1.5;"
                                                class="btn bg-royal-blue">Let us design one for
                                                you <br>*Charges Apply</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Price Calculation Section (hidden initially) -->
                                <div class="price-calculation-section" id="priceCalculationSection">
                                    <div class="price-breakdown">
                                        <h4>Your Price Calculation</h4>
                                        <div id="priceBreakdownContent">
                                            <!-- Price breakdown will be populated here -->
                                        </div>
                                    </div>
                                    
                                    <!-- Add to Cart and Recalculate buttons -->
                                    <div class="add-to-cart-section" id="addToCartSection">
                                        <a href="javascript:void(0);" onclick="addToCart('{{ $product->id }}');"
                                            class="btn bg-royal-blue">Add to Cart</a>
                                        <a href="javascript:void(0);" onclick="recalculatePrice()" class="btn bg-royal-blue">
                                            Recalculate
                                        </a>
                                    </div>
                                </div>

                                <!-- Calculate Price Button (shown initially) -->
                                <div class="btns-group ul-li mb-30" id="calculatePriceSection">
                                    <ul class="clearfix">
                                        <li>
                                            <a href="javascript:void(0);" onclick="calculatePrice()" class="btn bg-royal-blue">
                                                Calculate My Price
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rest of your existing content (tabs, related products, etc.) -->
            <div class="information-area">
                <div class="tabs-nav ul-li mb-40">
                    <ul class="nav" role="tablist">
                        <li>
                            <a class="active" data-toggle="tab" href="#description-tab">Description</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#key-feature-tab">Key Features</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#information-tab">FAQ's</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#reviews-tab">Templates and Design Guidelines</a>
                        </li>
                    </ul>
                </div>

                <div class="tab-content">
                    <div id="description-tab" class="tab-pane active">
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                {!! $product->product_description !!}
                            </div>
                        </div>
                    </div>
                    <div id="key-feature-tab" class="tab-pane ">
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                {!! $product->product_key_feature !!}
                            </div>
                        </div>
                    </div>

                    <div id="information-tab" class="tab-pane fade">
                        <div class="faq-container">
                            <h3 class="faq-section-title">Frequently Asked Questions</h3>
                            <div class="faq-accordion" id="faqAccordion">
                                @if ($product && $product->product_question && $product->product_answer)
                                    @php
                                        $questions = explode('~', $product->product_question);
                                        $answers = explode('~', $product->product_answer);
                                        
                                        // Function to clean HTML content
                                        function cleanFaqContent($content) {
                                            // Remove HTML entities
                                            $content = html_entity_decode($content);
                                            // Remove empty paragraph tags and break tags
                                            $content = preg_replace('/<p[^>]*>(\s|&nbsp;)*<\/p>/', '', $content);
                                            $content = preg_replace('/<br[^>]*>/', '', $content);
                                            // Clean up extra whitespace
                                            $content = trim($content);
                                            return $content;
                                        }
                                    @endphp
                                    
                                    @foreach ($questions as $index => $question)
                                        @if (!empty(trim($question)))
                                            @php
                                                $cleanQuestion = cleanFaqContent($question);
                                                $cleanAnswer = isset($answers[$index]) ? cleanFaqContent($answers[$index]) : 'Answer not available.';
                                            @endphp
                                            <div class="faq-card">
                                                <div class="faq-card-header" id="faqHeading{{ $index }}">
                                                    <button class="faq-question-btn" type="button"
                                                        data-toggle="collapse" data-target="#faqCollapse{{ $index }}"
                                                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" 
                                                        aria-controls="faqCollapse{{ $index }}">
                                                        <span class="faq-question-text">
                                                            <!-- <span class="faq-icon">Q</span> -->
                                                            {!! $cleanQuestion !!}
                                                        </span>
                                                        <span class="faq-arrow">▼</span>
                                                    </button>
                                                </div>
                                                <div id="faqCollapse{{ $index }}" 
                                                     class="collapse faq-collapse {{ $index === 0 ? 'show' : '' }}"
                                                     aria-labelledby="faqHeading{{ $index }}" 
                                                     data-parent="#faqAccordion">
                                                    <div class="faq-card-body">
                                                        <div class="faq-answer-content">
                                                            {!! $cleanAnswer !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    <div class="faq-card">
                                        <div class="faq-card-body">
                                            <p>No FAQs available for this product.</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div id="reviews-tab" class="tab-pane fade">
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                @if($product->guidlines)
                                <iframe src="{{ $product->guidlines }}" width="100%" height="600px"
                                    style="border: none;"></iframe>
                                    @else
                                    <p>No templates available for this product.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr>

    <!-- Related Products Section -->
    <section id="shop-section" class="shop-section sec-ptb-100 decoration-wrap clearfix">
        <div class="container">
            <div class="section-title text-center mb-70">
                <h2 class="title-text mb-3">Related Products</h2>
            </div>

            <div id="column-4-carousel" class="column-4-carousel arrow-right-left owl-carousel owl-theme">
                @if (!empty($relatedProducts))
                    @foreach ($relatedProducts as $relatedProduct)
                        @php
                            $productsImage = $relatedProduct->product_images->first();
                        @endphp
                        <div class="item">
                            <div class="product-grid text-center clearfix">
                                <div class="item-image">
                                    <a href="{{ route('front.product', $relatedProduct->product_slug) }}"
                                        class="image-wrap">
                                        @if (!empty($productsImage->image))
                                            <img src="{{ asset('/uploads/product/' . $productsImage->image) }}"
                                                alt="img-thumbnail" class="card-img-top rounded" />
                                        @else
                                            <img src="{{ asset('admin-assets/img/default-150X150.png') }}" alt="Default"
                                                class="card-img-top rounded" />
                                        @endif
                                    </a>
                                </div>
                                <div class="item-content">
                                    <h3 class="item-title">
                                        <a href="#!">{{ $relatedProduct->product_name }}</a>
                                    </h3>
                                    <span class="item-price">${{ $relatedProduct->product_price }}</span>
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

    <!-- Quick View Modal -->
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
                    <h2 class="item-title mb-15">Pull Up Banner</h2>
                    <div class="rating-star ul-li mb-30 clearfix">
                        <ul class="float-left col-md-6 input-holder">
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
                        Best Electronic Digital Thermometer adipiscing elit, sed do eiusmod teincididunt ut labore
                        et dolore magna aliqua. Quis ipsum suspendisse us ultrices gravidaes. Risus commodo viverra
                        maecenas accumsan lacus vel facilisis.
                    </p>
                    <div class="quantity-form mb-30 clearfix">
                        <strong class="list-title">Quantity:</strong>
                        <div class="quantity-input">
                            <form action="#">
                                <span class="input-number-decrement">-</span>
                                <input class="input-number-1" type="text" value="1">
                                <span class="input-number-increment">+</span>
                            </form>
                        </div>
                    </div>
                    <div class="btns-group ul-li mb-30">
                        <ul class="clearfix">
                            <li><a href="javascript:void(0);" onclick="addToCart({{ $product->id }});"
                                    class="btn bg-royal-blue">Add to Cart</a></li>
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
@endsection

@section('javascript.js')
    <script>
        var loginUrl = '{{ route('account.login') }}';
        
        // Ensure quantity input field value is not negative or zero
        $('#quantityInput').on('change', function() {
            var quantity = $(this).val();
            if (quantity <= 0) {
                $(this).val(1);
            }
        });

        $(document).ready(function() {
            // Ensure quantity input field value is not negative or zero
            $('#quantityInput').on('change', function() {
                var quantity = $(this).val();
                if (quantity <= 0) {
                    $(this).val(1);
                }
            });

            // Log updated quantity value
            $('#quantityInput').on('input', function() {
                var updatedValue = $(this).val();
                console.log(updatedValue);
            });

            // Handle product rating form submission
            $("#productRatingForm").submit(function(event) {
                event.preventDefault();

                $.ajax({
                    url: '{{ route('front.saveRating', $product->id) }}',
                    type: 'POST',
                    data: $(this).serializeArray(),
                    dataType: 'json',
                    success: function(response) {
                        if (!response.status) {
                            if (response.errors) {
                                $("#name").toggleClass('is-invalid', !!response.errors.name)
                                    .siblings("p").toggleClass('invalid-feedback', !!response
                                        .errors.name).html(response.errors.name || '');
                                $("#email").toggleClass('is-invalid', !!response.errors.email)
                                    .siblings("p").toggleClass('invalid-feedback', !!response
                                        .errors.email).html(response.errors.email || '');
                                $("#comment").toggleClass('is-invalid', !!response.errors
                                    .message).siblings("p").toggleClass('invalid-feedback',
                                    !!response.errors.message).html(response.errors
                                    .message || '');
                                $(".product-rating-error").html(response.errors.rating || '');
                            }
                        } else {
                            window.location.href =
                                "{{ route('front.product', $product->product_slug) }}";
                        }
                    }
                });
            });

            // Fetch range prices and calculate price
            let rangePrices = [];

            $.getJSON('/range-prices', function(data) {
                rangePrices = data;
            });

            function validateAndCalculate() {
                const width = $('#width').val().trim();
                const height = $('#height').val().trim();
                const quantity = $('#quantityInput').val().trim();

                if (isNaN(width) || isNaN(height) || isNaN(quantity)) {
                    $('#error').text('All fields are required and must be numeric.').show();
                    $('#price').text('');
                    return;
                }

                if (parseFloat(width) < 30 || parseFloat(height) < 30) {
                    $('#error').text('Width and Height must be at least 30mm.').show();
                    $('#price').text('');
                } else {
                    $('#error').hide();

                    const result = (parseFloat(width) * parseFloat(height) / 1000000) * parseFloat(quantity);
                    let price = 0;

                    for (let rangePrice of rangePrices) {
                        if (result >= rangePrice.start_range && result <= rangePrice.end_range) {
                            price = rangePrice.price;
                            break;
                        }
                    }

                    if (price === 0 && rangePrices.length > 0) {
                        price = Math.max(...rangePrices.map(p => p.price));
                    }

                    $('#price').text(`The price for the given dimensions is: $${price}`);
                    $('#priceDisplay').text(`$${price}`);
                }
            }

            // Event listeners for form fields
            $('#width, #height, #quantityInput').on('keyup change', validateAndCalculate);

            // Show/hide custom size fields based on dropdown value
            $('#sizeDropdown').on('change', function() {
                var customSizeFields = $('#customSizeFields');
                if ($(this).val() === 'Custom Size') {
                    customSizeFields.show();
                } else {
                    customSizeFields.hide();
                    $('#error').hide();
                }
            });

            // Validate custom size fields on form submit
            $('form').on('submit', function(event) {
                if ($('#sizeDropdown').val() === 'Custom Size') {
                    const width = parseInt($('#width').val(), 10);
                    const height = parseInt($('#height').val(), 10);
                    if (isNaN(width) || isNaN(height) || width < 30 || height < 30) {
                        $('#error').show();
                        event.preventDefault();
                    } else {
                        $('#error').hide();
                    }
                }
            });
        });

        // New function to calculate price and show breakdown
        function calculatePrice() {
            const selectedDropdowns = {
                size: $("#sizeDropdown").val(),
                colors: $("#colorsDropdown").val(),
                print_sides: $("#printSidesDropdown").val(),
                finishings: $("#finishingsDropdown").val(),
                thickness: $("#thicknessDropdown").val(),
                wirestakesqtys: $("#wirestakesqtysDropdown").val(),
                framesizes: $("#framesizesDropdown").val(),
                displaytypes: $("#displaytypesDropdown").val(),
                installations: $("#installationsDropdown").val(),
                materials: $("#materialsDropdown").val(),
                corners: $("#cornersDropdown").val(),
                applications: $("#applicationsDropdown").val(),
                paperthickness: $("#paperthicknessDropdown").val(),
                qtys: $("#qtysDropdown").val(),
                pagesinbooks: $("#pagesinbooksDropdown").val(),
                copiesrequireds: $("#copiesrequiredsDropdown").val(),
                pagesinnotepads: $("#pagesinnotepadsDropdown").val()
            };

            // Validate required fields
            let hasErrors = false;
            let errorMessage = '';

            // Check if size is selected
            if (!selectedDropdowns.size) {
                $('#sizeError').show();
                hasErrors = true;
                errorMessage += 'Please select a size. ';
            } else {
                $('#sizeError').hide();
            }

            // Add more validation as needed for other required fields

            if (hasErrors) {
                alert(errorMessage);
                return;
            }

            $.ajax({
                url: '{{ route('front.getPrice') }}',
                type: 'GET',
                data: {
                    height: $('#height').val().trim(),
                    width: $('#width').val().trim(),
                    quantity: $('#quantityInput').val().trim(),
                    ...selectedDropdowns,
                    product_id: "{{ $product->id }}",
                    price_option: "{{ $product->price_option }}",
                    calculate_breakdown: true // Add this to get detailed breakdown
                },
                dataType: 'json',
                success: function(data) {
                    if (data.price) {
                        // Show price breakdown
                        displayPriceBreakdown(data);
                        
                        // Hide product details and file upload sections
                        $('#productDetailsSection').hide();
                        $('#fileUploadSection').hide();
                        $('#calculatePriceSection').hide();
                        
                        // Show price calculation section and add to cart
                        $('#priceCalculationSection').show();
                        $('#addToCartSection').show();
                        
                        // Update main price display
                        $("#priceDisplay")
                            .text('$' + data.price)
                            .removeClass('price-error')
                            .addClass('price-valid')
                            .show();
                    } else {
                        alert('Unable to calculate price. Please check your selections.');
                    }
                },
                error: function() {
                    console.log("Something Went Wrong");
                    alert('Error calculating price. Please try again.');
                }
            });
        }

        function displayPriceBreakdown(data) {
    let breakdownHtml = '';
    
    // Selected Options Summary
    breakdownHtml += `<div style="background: #e9ecef; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
        <h5 style="margin-bottom: 15px; color: #495057;">Selected Options:</h5>`;

    // Quantity
    breakdownHtml += `<div class="price-item">
        <span>Quantity:</span>
        <span>${$('#quantityInput').val()}</span>
    </div>`;

    // Size
    if ($('#sizeDropdown').val()) {
        breakdownHtml += `<div class="price-item">
            <span>Size:</span>
            <span>${$('#sizeDropdown').val()}</span>
        </div>`;
    }

    // Custom dimensions if applicable
    if ($('#sizeDropdown').val() === 'Custom Size') {
        breakdownHtml += `<div class="price-item">
            <span>Custom Width:</span>
            <span>${$('#width').val()}mm</span>
        </div>`;
        breakdownHtml += `<div class="price-item">
            <span>Custom Height:</span>
            <span>${$('#height').val()}mm</span>
        </div>`;
    }

    // Additional options
    if ($('#colorsDropdown').val()) {
        breakdownHtml += `<div class="price-item">
            <span>Color:</span>
            <span>${$('#colorsDropdown').val()}</span>
        </div>`;
    }

    if ($('#finishingsDropdown').val()) {
        breakdownHtml += `<div class="price-item">
            <span>Finishing:</span>
            <span>${$('#finishingsDropdown').val()}</span>
        </div>`;
    }

    if ($('#printSidesDropdown').val()) {
        breakdownHtml += `<div class="price-item">
            <span>Print Sides:</span>
            <span>${$('#printSidesDropdown').val()}</span>
        </div>`;
    }

    if ($('#thicknessDropdown').val()) {
        breakdownHtml += `<div class="price-item">
            <span>Thickness:</span>
            <span>${$('#thicknessDropdown').val()}</span>
        </div>`;
    }

    if ($('#materialsDropdown').val()) {
        breakdownHtml += `<div class="price-item">
            <span>Material:</span>
            <span>${$('#materialsDropdown').val()}</span>
        </div>`;
    }

    // Pickup option
    if ($('#pickup_option').is(':checked')) {
        breakdownHtml += `<div class="price-item">
            <span>Pickup Option:</span>
            <span>Kings Park, NSW</span>
        </div>`;
    }

    breakdownHtml += `</div>`;

    // === Price Breakdown ===
    breakdownHtml += `<div style="background: #fff; padding: 15px; border: 1px solid #dee2e6; border-radius: 5px;">
        <h5 style="margin-bottom: 15px; color: #495057;">Price Breakdown:</h5>`;

    const basePrice = parseFloat(data.price);
    const roundedBasePrice = (Math.round(basePrice * 100) / 100).toFixed(2);

    const gstAmount = (Math.round(basePrice * 0.1 * 100) / 100).toFixed(2);

    const totalWithGst = (Math.round((basePrice + parseFloat(gstAmount)) * 100) / 100).toFixed(2);

    breakdownHtml += `<div class="price-item">
        <span>Subtotal (Excl. GST):</span>
        <span>$${roundedBasePrice}</span>
    </div>`;

    breakdownHtml += `<div class="price-item">
        <span>GST (10%):</span>
        <span>$${gstAmount}</span>
    </div>`;

    breakdownHtml += `<div class="price-item">
        <span><strong>Total (Inc. GST):</strong></span>
        <span><strong>$${totalWithGst}</strong></span>
    </div>`;

    breakdownHtml += `</div>`;

    $('#priceBreakdownContent').html(breakdownHtml);
}


        // Function to recalculate (show form again)
        function recalculatePrice() {
            // Hide price calculation section
            $('#priceCalculationSection').hide();
            $('#addToCartSection').hide();
            
            // Show product details and file upload sections again
            $('#productDetailsSection').show();
            $('#fileUploadSection').show();
            $('#calculatePriceSection').show();
        }

        // File upload functionality
        const checkAuthUrl = '{{ route('check.auth') }}';
        document.getElementById('checkAuthButton').addEventListener('click', function() {
            fetch(checkAuthUrl)
                .then(response => response.json())
                .then(data => {
                    if (data.authenticated) {
                        document.getElementById('fileInput').classList.remove('hidden');
                        document.getElementById('fileInput').click();
                    } else {
                        document.getElementById('uploadMessage').innerText = 'Please log in to upload files.';
                        window.location.href = loginUrl;
                    }
                })
                .catch(error => {
                    console.error('Error checking authentication:', error);
                    document.getElementById('uploadMessage').innerText =
                        'An error occurred. Please try again later.';
                });
        });

        function handleFileUpload() {
            const fileInput = document.getElementById('fileInput');
            const uploadedFileNames = document.getElementById('uploadedFileNames');
            const uploadMessage = document.getElementById('uploadMessage');
            const files = fileInput.files;

            uploadedFileNames.innerHTML = '';
            uploadMessage.innerText = '';

            if (files.length === 0) {
                uploadMessage.innerText = 'Please select files to upload.';
                return;
            }

            const fileNames = Array.from(files).map(file => file.name);
            uploadedFileNames.innerHTML = fileNames.join('<br>');
            uploadMessage.innerText = 'Files selected for upload.';

            const formData = new FormData();
            Array.from(files).forEach(file => {
                formData.append('uploadedFiles[]', file);
            });

            fetch('{{ route('upload.files') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.files) {
                        uploadMessage.innerText = 'Files uploaded successfully!';
                        document.getElementById('uploadedFileName').value = fileNames.join(', ');
                    } else {
                        uploadMessage.innerText = 'Error in uploading files.';
                    }
                })
                .catch(() => {
                    uploadMessage.innerText = 'Error in uploading files.';
                });
        }
    </script>
@endsection