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
                        <!--<h1 class="post-type mb-15 text-lg">Premium</h1>-->
                        <h2 class="item-title mb-15">{{ $product->product_name }}</h2>
                        <div class="rating-star ul-li mb-30 clearfix">
                            {{-- <ul class="float-left col-md-6 input-holder">
                                <li class="active"><i class="las la-star"></i></li>
                                <li class="active"><i class="las la-star"></i></li>
                                <li class="active"><i class="las la-star"></i></li>
                                <li class="active"><i class="las la-star"></i></li>
                                <li><i class="las la-star"></i></li>
                            </ul> --}}
                           
                            <!--<span-->
                            <!--    class="review-text">({{ $product->product_ratings_count > 1 ? $product->product_ratings_count . ' Reviews' : $product->product_ratings_count . ' Review' }})</span>-->
                        </div>
                        {{-- <input type="text" readonly class="item-price mb-30" id="priceDisplay" > --}}
                        {{-- <span class="item-price mb-30" id="priceDisplay"></span> --}}
                        <!--<p class="mb-40">-->
                        <!--	Best Electronic Digital Thermometer adipiscing elit, sed do eiusmod teincididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse us ultrices gravidaes. Risus commodo viverra maecenas images accumsan lacus vel facilisis. -->
                        <!--</p> -->
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
                                
                                // Loop through all attributes and sort them into the correct arrays
                                foreach ($product->product_attribute as $attribute) {
                                    switch ($attribute->attribute_type) {
                                        // case 'size':
                                        //     $sizes[] = $attribute->attribute_value;
                                        //     break;
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
                                            $thickness[] = $attribute->attribute_value; // Corrected variable name
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
                                // foreach ($product->product_prices as $price) {
                                
                                //     print_r($price); die;
                                // }
                                ?>

                                <div class="price-container">
                                    <div class="price-row">
                                        <span class="item-price">
                                            <span class="as-low">As <br> low as </span> ${{ $product->product_price }}<span class="gst-info">* Excluding GST</span>
                                        </span>
                                        
                                    </div>
                                    <span class="item-price" id="priceDisplay" hidden>${{ $product->product_price }}</span>
                                </div>

                                <!--<span class="item-price mb-30" id="priceDisplay">${{ $product->product_price }}</span>-->
                                
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
                                                                    'width' =>  $fixedPrice->width,
                                                                    'height' => $fixedPrice->height,
                                                                ];
                                                                if (!in_array($size, $uniqueSizes)) {
                                                                    $uniqueSizes[] = $size;
                                                                }
                                                            }
                                                        }
                                                    }
                                                    // Format size without commas
                                                    function formatSize($value) {
                                                        return (fmod($value, 1) == 0) ? intval($value) : $value;
                                                    }
                                                @endphp
                                                @foreach ($uniqueSizes as $size)
                                                    <option value="{{ formatSize($size['width']) }} x {{ formatSize($size['height']) }}">
                                                        {{ formatSize($size['width']) }}mm W x {{ formatSize($size['height']) }}mm H
                                                    </option>
                                                @endforeach
                                                 <!-- Other size options -->
                                                    @if($product->product_allows_custom_size == 1)
                                                    <option value="Custom Size">Custom Size</option>
                                                @endif
                                            </select>
                                            <p id="sizeError" style="color: red; display: none;">Please select a Size.</p>
                                        </div>
                                        <div id="customSizeFields" class="col-md-12" style="display: none;">
                                            <div class="row">
                                                <div class="col-md-6 input-holder">
                                                    <label for="width">Width (mm):</label>
                                                    <input type="text" class="form-control" id="width" name="width">
                                                    <p id="widthError" style="display: none; color: red;">Width must be at least 30mm.</p>
                                                </div>
                                                <div class="col-md-6 input-holder">
                                                    <label for="height">Height (mm):</label>
                                                    <input type="text" class="form-control" id="height" name="height">
                                                    <p id="heightError" style="display: none; color: red;">Height must be at least 30mm.</p>
                                                </div>
                                            </div>
                                            <p id="customSizeError" style="color: red; display: none;">Both Width and Height are required and must be at least 30mm.</p>
                                        </div>
                                    @endif
                                    @if (!empty($product->rigidMedia) && collect($product->rigidMedia)->contains(function ($media) { 
                                        return in_array($media['media_type'], ['single', 'double']);
                                    }))
                                        <div class="form-group col-md-6 input-holder">
                                            <label for="printSidesDropdown">Print Sides</label>
                                            <select class="form-control" id="printSidesDropdown" name="printSides" required>
                                               
                                                @foreach (collect($product->rigidMedia)->unique('media_type') as $media)
                                                    @if (!empty($media['media_type']) && in_array($media['media_type'], ['single', 'double']))
                                                        <option value="{{ $media['media_type'] }}"
                                                            @if ($media['media_type'] === 'single') selected @endif>
                                                            {{ ucfirst($media['media_type']) }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <p id="media_typeError" style="color: red; display: none;">Please select a Print Side.</p>
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
                                            <label for="printSidesDropdown">Print Sides</label>
                                            <select class="form-control" id="printSidesDropdown" name="printSides"
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
                                                <option value="">Select Finishing</option>
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
                                        <label style="margin-left: 20px;" for="sizeDropdown">Pickup Option:</label>
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
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>How would you like to submit your design file?</label>
                            </div>
                        </div>
                        <div class="row">
                            {{-- <div class="form-group col-md-6 input-holder">
                                        <label style="line-height: 1.5; margin-right: 25px;" for="fileInput"
                                            class="btn bg-royal-blue">Upload Finished Artwork<br>Print-Ready Files</label>
                                        <input type="file" id="fileInput" class="hidden"
                                            onchange="handleFileUpload()">
                                    </div> 
                            <div class="form-group col-md-6">
                                        <label style="line-height: 1.5; margin-right: 25px;" for="fileInput" class="btn bg-royal-blue">
                                            Upload Finished Artwork<br>Print-Ready Files
                                        </label>
                                        <input type="file" id="fileInput" name="uploadedFiles[]" class="hidden" multiple onchange="handleFileUpload()">
                                        <input type="hidden" id="uploadTokenFile" name="uploadTokenFile" value="{{ $token }}">
                                        <p id="uploadMessage"></p> <!-- Display upload status message here -->
                                        <div id="uploadedFileNames"></div> <!-- Display uploaded file names here -->
                                        <input type="hidden" id="uploadedFileName" name="uploadedFileName">
                            </div> --}}
                            <div class="form-group col-md-6">
                                        <button id="checkAuthButton" class="btn bg-royal-blue">
                                            Upload Finished Artwork<br>Print-Ready Files
                                        </button>
                                        <input type="file" id="fileInput" name="uploadedFiles[]" class="hidden" multiple onchange="handleFileUpload()">
                                        <input type="hidden" id="uploadTokenFile" name="uploadTokenFile" value="{{ $token }}">
                                        <p id="uploadMessage"></p> <!-- Display upload status message here -->
                                        <div id="uploadedFileNames"></div> <!-- Display uploaded file names here -->
                                        <input type="hidden" id="uploadedFileName" name="uploadedFileName">
                                    </div>
                                    
                            <div class="form-group col-md-6 ">
                                <a href="{{ route('front.request-a-quote') }}" style="line-height: 1.5;"
                                    class="btn bg-royal-blue">Let us design one for
                                    you <br>*Charges Apply</a>
                            </div>

                        </div>
                        {{-- <div class="quantity-form mb-30 clearfix">
                                    <strong class="list-title">Quantity:</strong>
                                    <div class="quantity-input">
                                        <form action="#">
                                            <span class="input-number-decrement">-</span>
                                            <input class="input-number-1" type="text" value="1">
                                            <span class="input-number-increment">+</span>
                                        </form>
                                    </div>
                                </div> --}}
                        {{-- <div class="quantity-form mb-30 clearfix">
                            <strong class="list-title">Quantity:</strong>
                            <div class="quantity-input">
                                <form action="#">
                                    <span class="input-number-decrement">-</span>
                                    <input type="number" name="quantity" id="quantityInput" class="input-number-1" type="text" value="1">
                                    <span class="input-number-increment">+</span>
                                </form>
                            </div>
                        </div>

                        <input class="quantity__input" type="number" name="quantity" id="Quantity-template" min="1" value="1" form="product-form-template--14606459338821__main" tp-min-qty="0" tp-max-qty="0" tp-qty-increments="0"> --}}
                        {{-- <div class="quantity-form mb-30 clearfix">
                            <strong class="list-title">Quantity:</strong>
                            <div class="quantity-input">
                                <form id="product-form-template--14606459338821__main" action="#">
                                    <input type="number" name="quantity" id="quantityInput" class="quantity__input"
                                        min="1"  value="1">
                                </form>
                            </div>
                        </div> --}}


                        <div class="btns-group ul-li mb-30">
                            <ul class="clearfix">
                                <!--<li><a href="javascript:void(0);" id="buyNowButton" onclick="buyNowWithValidation()"-->
                                <!--        class="btn bg-royal-blue">Buy Now</a>-->
                                <!--</li>-->
                                <li><a href="javascript:void(0);" onclick="addToCart('{{ $product->id }}');"
                                        class="btn bg-royal-blue">Add to Cart</a></li>
                                {{-- <li>
                                    <a href="javascript:void(0);" onclick="addToCartWithValidation()"
                                        class="btn bg-royal-blue">Add to Cart</a>
                                </li> --}}
                                <!--<li><a href="#!" data-toggle="tooltip" data-placement="top"-->
                                <!--        title="Compare Product"><i class="las la-sync"></i></a></li>-->
                                <!--<li><a onclick="addToWishList({{ $product->id }})" href="javascript:void(0);"-->
                                <!--        data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i-->
                                <!--            class="lar la-heart"></i></a></li>-->
                            </ul>
                        </div>

                        <!-- <button type="submit" class="btn bg-royal-blue">Submit</button> -->
                        </form>
                    </div>
                </div>
            </div>


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

                    <div id="Key-tab" class="tab-pane fade">
                        <h3 class="title-text mb-30">Key Features</h3>
                        <div class="table-wrap">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td><strong>Category</strong></td>
                                        <td>Medical Equipment</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Color</strong></td>
                                        <td>Red, Gree, Blue, Black, White</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Quantity</strong></td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Type Of Packing</strong></td>
                                        <td>Paper Box</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Warranty</strong></td>
                                        <td>1.5 Year</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="information-tab" class="tab-pane fade">
                        <!-- <h3 class="title-text mb-30">FAQ's</h3> -->
                        <div class="table-wrap">
                            <div class="container mt-5">
                                <div class="accordion" id="myAccordion">

                                    @if ($product)
                                        <!-- Question 1 -->
                                        <div class="card">
                                            <?php
                                            $questions = explode('~', $product->product_question);
                                            $answers = explode('~', $product->product_answer);

                                            // Iterate through each question and answer pair
                                            foreach ($questions as $index => $question) {
                                            ?>
                                            <div class="card-header" id="heading-<?php echo $product->id; ?>">
                                                <h2 class="mb-0">
                                                    <button class="btn bg-royal-blue btn-link" type="button"
                                                        data-toggle="collapse" data-target="#collapse-<?php echo $product->id . '-' . $index; ?>"
                                                        aria-expanded="true" aria-controls="collapse-<?php echo $product->id . '-' . $index; ?>">
                                                        <?php echo $question; ?>
                                                        <span class="arrow">&#9660;</span>
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapse-<?php echo $product->id . '-' . $index; ?>" class="collapse"
                                                aria-labelledby="heading-<?php echo $product->id; ?>" data-parent="#myAccordion">
                                                <div class="card-body">
                                                    <?php echo $answers[$index]; ?>
                                                </div>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>

                                </div>
                                @endif



                                <!-- Add more Q&A items as needed -->

                            </div>
                        </div>
                    </div>
                </div>

                <div id="reviews-tab" class="tab-pane fade">
                    <div class="row">
                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                            <!--                            <form action="" name="productRatingForm" id="productRatingForm" method="POST">-->
                            <!--                                <h3 class="title-text mb-15">Write a Review</h3>-->
                            <!--                                <p class="mb-30">Your email address will not be published. Required fields are marked.</p>-->
                            <!--                                <div class="form-group mb-3">-->
                            <!--                                    <label for="rating">Rating</label>-->
                            <!--                                    <br>-->
                            <!--                                   <div class="rating" style="width: 9.5rem">-->
                            <!--    <input id="rating-1" type="radio" name="rating" value="1"><label for="rating-1"><i class="fas fa-3x fa-star"></i></label>-->
                            <!--    <input id="rating-2" type="radio" name="rating" value="2"><label for="rating-2"><i class="fas fa-3x fa-star"></i></label>-->
                            <!--    <input id="rating-3" type="radio" name="rating" value="3"><label for="rating-3"><i class="fas fa-3x fa-star"></i></label>-->
                            <!--    <input id="rating-4" type="radio" name="rating" value="4"><label for="rating-4"><i class="fas fa-3x fa-star"></i></label>-->
                            <!--    <input id="rating-5" type="radio" name="rating" value="5"><label for="rating-5"><i class="fas fa-3x fa-star"></i></label>-->
                            <!--</div>-->

                            <!--                                    <p class="product-rating-error"></p>-->
                            <!--                                </div>-->

                            <!--                                <div class="form-item form-group">-->
                            <!--                                    <textarea name="comment" class="form-control" id="comment" placeholder="Your Message"></textarea>-->
                            <!--                                    <p></p>-->
                            <!--                                </div>-->
                            <!--                                <div class="row">-->
                            <!--                                    <div class="col-lg-6 col-md-6 input-holder col-sm-12 col-xs-12">-->
                            <!--                                        <div class="form-item form-group">-->
                            <!--                                            <input type="text" class="form-control" name="name" id="name" placeholder="Full Name*">-->
                            <!--                                            <p></p>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->

                            <!--                                    <div class="col-lg-6 col-md-6 input-holder col-sm-12 col-xs-12">-->
                            <!--                                        <div class="form-item form-group">-->
                            <!--                                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">-->
                            <!--                                            <p></p>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                                <button type="submit" class="btn bg-royal-blue">Submit Now</button>-->
                            <!--                            </form>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        </div>
    </section>
    <!-- details-section - end
                        ================================================== -->


    <!-- shop-section - start
                        ================================================== -->
    <section id="shop-section" class="shop-section sec-ptb-100 decoration-wrap clearfix">
        <div class="container">

            <div class="section-title text-center mb-70">
                <h2 class="title-text mb-3">Related Products</h2>
                <!--<p class="mb-0">Shopping Over $59 or first purchase you will get 100% free shipping</p>-->
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
                                    <div class="post-label ul-li-right clearfix">
                                        {{-- <ul class="clearfix">
                                    <li class="bg-skyblue">-19%</li>
                                    <li class="bg-skyblue">TOP</li>
                                </ul> --}}
                                    </div>
                                    <!--<div class="btns-group ul-li-center clearfix">-->
                                    <!--    <ul class="clearfix">-->
                                    <!--        <li><a href="javascript:void(0);" onclick="addToCart({{ $product->id }});"-->
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
                                    <!--        title="Compare Product"><i class="las la-sync"></i></a></li> --}}-->
                                    <!--        <li><a onclick="addToWishList({{ $product->id }})"-->
                                    <!--                href="javascript:void(0);" data-toggle="tooltip" data-placement="top"-->
                                    <!--                title="Add To Wishlist"><i class="lar la-heart"></i></a></li>-->
                                    <!--    </ul>-->
                                    <!--</div>-->
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
                            <!--<li><a href="#!" class="btn bg-royal-blue">Buy Now</a></li>-->
                            <li><a href="javascript:void(0);" onclick="addToCart({{ $product->id }});"
                                    class="btn bg-royal-blue">Add to Cart</a></li>
                            <!--<li><a href="#!" data-toggle="tooltip" data-placement="top" title=""-->
                            <!--        data-original-title="Compare Product"><i class="las la-sync"></i></a></li>-->
                            <!--<li><a href="#!" data-toggle="tooltip" data-placement="top" title=""-->
                            <!--        data-original-title="Add To Wishlist"><i class="lar la-heart"></i></a></li>-->
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

{{-- inputquantity  --}}
<script>
    // Ensure quantity input field value is not negative or zero
    $('#quantityInput').on('change', function() {
        var quantity = $(this).val();
        if (quantity <= 0) {
            $(this).val(1);
        }
    });
</script>
{{-- inputquantity Value --}}

<script>
    var loginUrl = '{{ route("account.login") }}';
</script>
<script>
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
            console.log(updatedValue); // Use this value as needed
        });

        // Validate form and add to cart
        $('#buyNowButton').on('click', function() {
            var size = $('#sizeDropdown').val();
            var baseColor = $('#baseColorDropdown').val();
            var printedSides = $('#sideDropdown').val();
            var quantity = $('#quantityInput').val();

            var sizeErrorElement = $('#sizeError');
            var colorErrorElement = $('#colorError');
            var sideErrorElement = $('#sideError');

            sizeErrorElement.hide();
            colorErrorElement.hide();
            sideErrorElement.hide();

            if (!size) {
                sizeErrorElement.show();
                return;
            }

            if (!baseColor) {
                colorErrorElement.show();
                return;
            }

            if (!printedSides) {
                sideErrorElement.show();
                return;
            }

            addToCart('{{ $product->id }}', baseColor, size, printedSides, quantity);
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
                            $("#name").toggleClass('is-invalid', !!response.errors.name).siblings("p").toggleClass('invalid-feedback', !!response.errors.name).html(response.errors.name || '');
                            $("#email").toggleClass('is-invalid', !!response.errors.email).siblings("p").toggleClass('invalid-feedback', !!response.errors.email).html(response.errors.email || '');
                            $("#comment").toggleClass('is-invalid', !!response.errors.message).siblings("p").toggleClass('invalid-feedback', !!response.errors.message).html(response.errors.message || '');
                            $(".product-rating-error").html(response.errors.rating || '');
                        }
                    } else {
                        window.location.href = "{{ route('front.product', $product->product_slug) }}";
                    }
                }
            });
        });

        // Fetch range prices and calculate price
        let rangePrices = [];
        const initialPrice = "0"; // Initial price

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

            updatePrice();
        }

        function updatePrice() {
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
        },
        dataType: 'json',
        success: function(data) {
            if (data.price) {
                $("#priceDisplay")
                    .text('$' + data.price)
                    .removeClass('price-error')  // Remove error class if price is valid
                    .addClass('price-valid');  // Add valid class
            } else {
                $("#priceDisplay")
                    .text('The product is not in the price/quantity range.')
                    .removeClass('price-valid')  // Remove valid class if price is invalid
                    .addClass('price-error');  // Add error class
            }
        },
        error: function() {
            console.log("Something Went Wrong");
            $("#priceDisplay")
                .text('The product is not in the price/quantity range')
                .removeClass('price-valid')
                .addClass('price-error');  // Apply error class
    
            $(".gst-info").css("display", "none");
        }
    });

}


        // Event listeners for form fields
        $('#width, #height, #quantityInput').on('keyup change', validateAndCalculate);

        $("#sizeDropdown, #colorsDropdown, #printSidesDropdown, #finishingsDropdown, #thicknessDropdown, #wirestakesqtysDropdown, #framesizesDropdown, #displaytypesDropdown, #installationsDropdown, #materialsDropdown, #cornersDropdown, #applicationsDropdown, #paperthicknessDropdown, #qtysDropdown, #pagesinbooksDropdown, #copiesrequiredsDropdown, #pagesinnotepadsDropdown")
            .on('change', updatePrice);

        // Handle file upload
        // $('#fileInput').on('change', function() {
        //     var fileInput = document.getElementById('fileInput');
        //     var uploadMessage = document.getElementById('uploadMessage');
        //     var uploadedFileNamesDiv = document.getElementById('uploadedFileNames');
        //     var hiddenInput = document.getElementById('uploadedFileName');
        //     var files = fileInput.files;

        //     if (files.length > 0) {
        //         var formData = new FormData();
        //         Array.from(files).forEach(file => {
        //             formData.append('uploadedFiles[]', file);
        //         });

        //         $.ajax({
        //             url: '{{ route("upload.files") }}',
        //             type: 'POST',
        //             data: formData,
        //             processData: false,
        //             contentType: false,
        //             success: function(response) {
        //                 uploadMessage.innerHTML = 'Files uploaded successfully!';
        //                 uploadedFileNamesDiv.innerHTML = '';
        //                 var fileNames = [];
        //                 response.files.forEach(file => {
        //                     const para = document.createElement("p");
        //                     para.innerText = 'Uploaded File: ' + file.name;
        //                     uploadedFileNamesDiv.appendChild(para);
        //                     fileNames.push(file.name);
        //                 });
        //                 hiddenInput.value = fileNames.join(', ');
        //                 uploadedFileNamesDiv.style.display = 'block';
        //             },
        //             error: function(xhr) {
        //                 if (xhr.status === 401) {
        //                     window.location.href = loginUrl;
        //                 } else {
        //                     uploadMessage.innerHTML = 'Error in uploading files: ' + xhr.responseText;
        //                 }
        //             }
        //         });
        //     } else {
        //         uploadMessage.innerHTML = 'Please select files to upload.';
        //     }
        // });


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
</script>

<script>
    const checkAuthUrl = '{{ route("check.auth") }}';
    document.getElementById('checkAuthButton').addEventListener('click', function() {
    fetch(checkAuthUrl)
        .then(response => response.json())
        .then(data => {
            if (data.authenticated) {
                // Show the file input and enable file selection
                document.getElementById('fileInput').classList.remove('hidden');
                document.getElementById('fileInput').click(); // Optional: Automatically open file dialog
            } else {
                document.getElementById('uploadMessage').innerText = 'Please log in to upload files.';
                // Optionally redirect to login page
                window.location.href = loginUrl;
            }
        })
        .catch(error => {
            console.error('Error checking authentication:', error);
            document.getElementById('uploadMessage').innerText = 'An error occurred. Please try again later.';
        });
});

function handleFileUpload() {
    const fileInput = document.getElementById('fileInput');
    const uploadedFileNames = document.getElementById('uploadedFileNames');
    const uploadMessage = document.getElementById('uploadMessage');
    const files = fileInput.files;

    // Clear previous messages and file names
    uploadedFileNames.innerHTML = '';
    uploadMessage.innerText = '';

    if (files.length === 0) {
        uploadMessage.innerText = 'Please select files to upload.';
        return;
    }

    const fileNames = Array.from(files).map(file => file.name);

    // Display selected file names
    uploadedFileNames.innerHTML = fileNames.join('<br>');
    uploadMessage.innerText = 'Files selected for upload.';

    // Optional: Implement file upload logic here
    const formData = new FormData();
    Array.from(files).forEach(file => {
        formData.append('uploadedFiles[]', file);
    });

    fetch('{{ route("upload.files") }}', {
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
