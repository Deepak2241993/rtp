@extends('layouts.master')

@section('style.css')
<style>
    /* CSS */
#sizeDropdown:invalid + #sizeError {
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



</style>
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

      padding: 10px;
    }
    
    .gst-info {
      font-size: 14px;
      color: #888; 
      margin-bottom: 3px; 
      font-style: italic;
      margin-left: 60px;
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
                                        <img src="{{ asset('uploads/product/' . $productImage->image) }}" alt="image_not_found">
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
                            {{-- <ul class="float-left mr-2">
                                <li class="active"><i class="las la-star"></i></li>
                                <li class="active"><i class="las la-star"></i></li>
                                <li class="active"><i class="las la-star"></i></li>
                                <li class="active"><i class="las la-star"></i></li>
                                <li><i class="las la-star"></i></li>
                            </ul> --}}
                            {{-- <div class="star-rating mt-2" title="70%">
                                <div class="back-stars">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>

                                    <div class="front-stars" style="width: {{ $avgRatingPer }}">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <span class="review-text">({{ ($product->product_ratings_count > 1) ? $product->product_ratings_count. ' Reviews' : $product->product_ratings_count.' Review' }})</span> --}}
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


                                <span class="item-price mb-30" id="productPrice">${{ $product->product_price }}</span>
                                <div class="row">
                                    <div class="form-group col-md-6 input-holder">
                                        <label for="quantity">Quantity:</label>
                                        <div class="">
                                            <form id="product-form-template--14606459338821__main" action="#">
                                                <input type="number" name="quantity" id="quantityInput"
                                                    class="quantity__input form-control" min="1" value="{{ $quantity }}">
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
                                                    $isCustomSize = true; // Flag to check if the selected size is custom
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

                                                    function formatSize($value) {
                                                        return (fmod($value, 1) == 0) ? number_format($value, 0) : number_format($value, 2);
                                                    }
                                                @endphp


                                                @foreach ($uniqueSizes as $size)
                                                    @php
                                                        $sizeValue = formatSize($size['width']) . 'mm x ' . formatSize($size['height']) . 'mm';
                                                        $isSelected = (isset($selectedSize) && $selectedSize == $sizeValue);
                                                        if ($isSelected) {
                                                            $isCustomSize = false; // Mark as non-custom if selected size matches
                                                        }
                                                    @endphp
                                                    <option value="{{ $sizeValue }}" {{ $isSelected ? 'selected' : '' }}>
                                                        {{ formatSize($size['width']) }}mm W x {{ formatSize($size['height']) }}mm H
                                                    </option>
                                                @endforeach

                                                <!-- Custom size option -->
                                                @if($product->product_allows_custom_size == 1)
                                                    <option value="Custom Size" {{ $isCustomSize ? 'selected' : '' }}>Custom Size</option>
                                                @endif
                                            </select>
                                            <p id="sizeError" style="color: red; display: none;">Please select a Size.</p>
                                        </div>

                                        <div id="customSizeFields" class="col-md-12" style="display: {{ $isCustomSize ? 'block' : 'none' }};">
                                            <div class="row">
                                                <div class="col-md-6 input-holder">
                                                    <label for="width">Width (mm):</label>
                                                    <input type="text" class="form-control" id="width" name="width"
                                                        value="{{ $isCustomSize && isset($customWidth) ? $customWidth : '' }}">
                                                    <p id="widthError" style="display: none; color: red;">Width must be at least 30mm.</p>
                                                </div>
                                                <div class="col-md-6 input-holder">
                                                    <label for="height">Height (mm):</label>
                                                    <input type="text" class="form-control" id="height" name="height"
                                                        value="{{ $isCustomSize && isset($customHeight) ? $customHeight : '' }}">
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
                                                @php
                                                    $selectedPrintSide = $selectedPrintSide ?? 'single'; // Default to 'single' if not set
                                                    $uniqueMediaTypes = collect($product->rigidMedia)
                                                        ->filter(fn($media) => in_array($media['media_type'], ['single', 'double']))
                                                        ->unique('media_type');
                                                @endphp
                                    
                                                @foreach ($uniqueMediaTypes as $media)
                                                    @if (!empty($media['media_type']))
                                                        <option value="{{ $media['media_type'] }}"
                                                            {{ $media['media_type'] === $selectedprintSides ? 'selected' : '' }}>
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
                                            <label for="colorsDropdown" class="mr-2 text-size">Base Color
                                                Options:</label>
                                            <select class="form-control" id="colorsDropdown" name="baseColor" required>
                                                <option value="">Select colors</option>
                                                @foreach ($colors as $color)
                                                    <option value="{{ $color }}" {{ $color == $color ? 'selected' : '' }}>{{ $color }}</option>
                                                @endforeach
                                            </select>
                                            <p id="colorsError" style="color: red; display: none;">Please select a Base
                                                Color.
                                            </p>
                                        </div>
                                    @endif

                                    @if (!empty($printSides))
                                        <div class="form-group col-md-6 input-holder">
                                            <label for="printSidesDropdown" class="mr-2 text-size">Print Sides
                                                Options:</label>
                                            <select class="form-control" id="printSidesDropdown" name="printSides" required >
                                                <option value="">Select Size</option>
                                                @foreach ($printSides as $printSide)
                                                    <option value="{{ $printSide }}">{{ $printSide }}</option>
                                                @endforeach
                                            </select>
                                            <p id="printSidesError" style="color: red; display: none;">Please select a Print
                                                Sides.</p>
                                        </div>
                                    @endif
                                    @if (!empty($finishings))
                                        <div class="form-group col-md-6 input-holder">
                                            <label for="finishingsDropdown">Finishings</label>
                                            <select class="form-control" id="finishingsDropdown" name="finishings" required>
                                                <option value="">Select Finishing</option>
                                                @foreach ($finishings as $finishing)
                                                    <option value="{{ $finishing }}"
                                                        @if (!empty($selectedfinishings) && $selectedfinishings == $finishing)
                                                            selected
                                                        @endif>
                                                        {{ $finishing }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <p id="finishingsError" style="color: red; display: none;">Please select a Finishings.</p>
                                        </div>
                                    @endif




                                    @if (!empty($thickness))
                                        <div class="form-group col-md-6 input-holder">
                                            <label for="thicknessDropdown" class="mr-2 text-size">Thickness Options:</label>
                                            <select class="form-control" id="thicknessDropdown" name="Thickness" required>
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
                                            <label for="wirestakesqtysDropdown" class="mr-2 text-size">Wire Stakes QTY
                                                Options:</label>
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
                                            <label for="framesizesDropdown" class="mr-2 text-size">Framesizes
                                                Options:</label>
                                            <select class="form-control" id="framesizesDropdown" name="framesizes" required>
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
                                            <label for="displaytypesDropdown" class="mr-2 text-size">Display Types
                                                Options:</label>
                                            <select class="form-control" id="displaytypesDropdown" name="displaytypes" required>
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
                                            <label for="installationsDropdown" class="mr-2 text-size">Installations
                                                Options:</label>
                                            <select class="form-control" id="installationsDropdown" name="installations" required>
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
                                            <label for="materialsDropdown" class="mr-2 text-size">Materials
                                                Options:</label>
                                            <select class="form-control" id="materialsDropdown" name="materialsColor" required>
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
                                            <label for="cornersDropdown" class="mr-2 text-size">Corners Options:</label>
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
                                            <label for="applicationsDropdown" class="mr-2 text-size">Applications
                                                Options:</label>
                                            <select class="form-control" id="applicationsDropdown" name="applications" required>
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
                                            <label for="paperthicknessDropdown" class="mr-2 text-size">Paper Thickness Options:</label>
                                            <select class="form-control" id="paperthicknessDropdown" name="paperthicknes" required>
                                                <option value="">Select Paper Thickness</option>
                                                @foreach ($paperthickness as $paperthicknesOption)
                                                    <option value="{{ $paperthicknesOption }}" {{ $paperthicknesOption == $selectedPaperThickness ? 'selected' : '' }}>
                                                        {{ $paperthicknesOption }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <p id="paperthicknessError" style="color: red; display: none;">Please select Paper Thickness.</p>
                                        </div>
                                    @endif

                                    @if (!empty($qtys))
                                        <div class="form-group col-md-6 input-holder">
                                            <label for="qtysDropdown" class="mr-2 text-size">QTYs
                                                Options:</label>
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
                                            <label for="pagesinbooksDropdown" class="mr-2 text-size">Pages in Book
                                                Options:</label>
                                            <select class="form-control" id="pagesinbooksDropdown" name="pagesinbook" required>
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
                                            <label for="copiesrequiredsDropdown" class="mr-2 text-size">Copies Requireds
                                                Options:</label>
                                            <select class="form-control" id="copiesrequiredsDropdown" name="copiesrequireds" required>
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
                                            <label for="pagesinnotepadsDropdown" class="mr-2 text-size">Pages Requireds
                                                Options:</label>
                                            <select class="form-control" id="pagesinnotepadsDropdown" name="pagesinnotepads" required>
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
                                <div class="row">
                                    <div class="form-group col-md-6 input-holder">
                                        <label for="pickup_option" class="text-size" style="margin-left: 20px;">Pickup Option:</label>
                                        <div style="display: flex; align-items: center; margin-left: 20px;">
                                            <input 
                                                type="checkbox" 
                                                id="pickup_option" 
                                                name="pickup_option" 
                                                value="Kings Park, NSW" 
                                                style="margin-right: 6px;" 
                                                {{ $cartItem->options->pickup_option === 'Kings Park, NSW' ? 'checked' : '' }}>
                                            <label for="pickup_option" style="font-family: Poppins; font-size: 15px; font-weight: 500; margin-top: 5px;">
                                                Pickup (Kings Park, NSW)
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="form-group mr-2">
                                        <label class="mr-2 text-size">How would you like to submit your design file?</label>
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- <div class="form-group mr-2">
                                        <label style="line-height: 1.5; margin-right: 25px;" for="fileInput"
                                            class="btn bg-royal-blue">Upload Finished Artwork<br>Print-Ready Files</label>
                                        <input type="file" id="fileInput" class="hidden"
                                            onchange="handleFileUpload()">
                                    </div> --}}
                                    <div class="form-group mr-2">
                                        <label style="line-height: 1.5; margin-right: 25px;" for="fileInput" class="btn bg-royal-blue">Upload Finished Artwork<br>Print-Ready Files</label>
                                        <input type="file" id="fileInput" class="hidden" onchange="handleFileUpload()">
                                        <p id="uploadMessage"></p> <!-- This is where the upload message will be displayed -->
                                        <p id="uploadedFileName" style="display: none;"></p> <!-- This is where the uploaded file name will be displayed -->
                                    </div>
                                    <div class="row">
                                        <div class="form-group mr-2">
                                            <a href="https://readytoprint.com.au/request-a-quote"
                                                style="line-height: 1.5;" class="btn bg-royal-blue">Let us design one for
                                                you <br>*Charges Apply</a>
                                        </div>
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
                        <!--<div class="quantity-form mb-30 clearfix">-->
                        <!--    <strong class="list-title">Quantity:</strong>-->
                        <!--    <div class="quantity-input">-->
                        <!--        <form id="product-form-template--14606459338821__main" action="#">-->
                        <!--            <input type="number" name="quantity" id="quantityInput" class="quantity__input" min="1" max="10" value="1">-->
                        <!--        </form>-->
                        <!--    </div>-->
                        <!--</div>-->


                        <div class="btns-group ul-li mb-30">
                            <ul class="clearfix">
                                <!--<li><a href="javascript:void(0);" id="buyNowButton" onclick="buyNowWithValidation()"-->
                                <!--        class="btn bg-royal-blue">Buy Now</a>-->
                                <!--</li>-->
                               
                                <li><a href="javascript:void(0);" onclick="updateCart('{{ $product->id }}' , '{{ $cartItem->rowId }}');" class="btn bg-royal-blue">Update Cart</a></li>
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

<!--                <div id="reviews-tab" class="tab-pane fade">-->
<!--                    <div class="row">-->
<!--                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">-->
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
<!--                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">-->
<!--                                        <div class="form-item form-group">-->
<!--                                            <input type="text" class="form-control" name="name" id="name" placeholder="Full Name*">-->
<!--                                            <p></p>-->
<!--                                        </div>-->
<!--                                    </div>-->

<!--                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">-->
<!--                                        <div class="form-item form-group">-->
<!--                                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">-->
<!--                                            <p></p>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <button type="submit" class="btn bg-royal-blue">Submit Now</button>-->
<!--                            </form>-->
<!--</div>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
            </div>
        </div>

        </div>
    </section>
    <!-- details-section - end
            ================================================== -->


    <!-- shop-section - start
            ================================================== -->
    <!--<section id="shop-section" class="shop-section sec-ptb-100 decoration-wrap clearfix">-->
    <!--    <div class="container">-->

    <!--        <div class="section-title text-center mb-70">-->
    <!--            <h2 class="title-text mb-3">Related Products</h2>-->
                <!--<p class="mb-0">Shopping Over $59 or first purchase you will get 100% free shipping</p>-->
    <!--        </div>-->

    <!--        <div id="column-4-carousel" class="column-4-carousel arrow-right-left owl-carousel owl-theme">-->
    <!--            @if (!empty($relatedProducts))-->
    <!--                @foreach ($relatedProducts as $relatedProduct)-->
    <!--                    @php-->
    <!--                        $productsImage = $relatedProduct->product_images->first();-->
    <!--                    @endphp-->
    <!--                    <div class="item">-->
    <!--                        <div class="product-grid text-center clearfix">-->
    <!--                            <div class="item-image">-->
    <!--                                <a href="{{ route('front.product', $relatedProduct->product_slug) }}"-->
    <!--                                    class="image-wrap">-->
    <!--                                    @if (!empty($productsImage->image))-->
    <!--                                        <img src="{{ asset('/uploads/product/' . $productsImage->image) }}"-->
    <!--                                            alt="img-thumbnail" class="card-img-top rounded" />-->
    <!--                                    @else-->
    <!--                                        <img src="{{ asset('admin-assets/img/default-150X150.png') }}" alt="Default"-->
    <!--                                            class="card-img-top rounded" />-->
    <!--                                    @endif-->
    <!--                                </a>-->
    <!--                                <div class="post-label ul-li-right clearfix">-->
    <!--                                    {{-- <ul class="clearfix">-->
    <!--                                <li class="bg-skyblue">-19%</li>-->
    <!--                                <li class="bg-skyblue">TOP</li>-->
    <!--                            </ul> --}}-->
    <!--                                </div>-->
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
                                    <!--        <li><a onclick="addToWishList({{ $product->id }})" href="javascript:void(0);" data-toggle="tooltip" data-placement="top"-->
                                    <!--                title="Add To Wishlist"><i class="lar la-heart"></i></a></li>-->
                                    <!--    </ul>-->
                                    <!--</div>-->
    <!--                            </div>-->
    <!--                            <div class="item-content">-->
    <!--                                <h3 class="item-title">-->
    <!--                                    <a href="#!">{{ $relatedProduct->product_name }}</a>-->
    <!--                                </h3>-->
    <!--                                <span class="item-price">${{ $relatedProduct->product_price }}</span>-->
    <!--                                <div class="rating-star ul-li-center clearfix">-->
    <!--                                    <ul class="clearfix">-->
    <!--                                        <li class="active"><i class="las la-star"></i></li>-->
    <!--                                        <li class="active"><i class="las la-star"></i></li>-->
    <!--                                        <li class="active"><i class="las la-star"></i></li>-->
    <!--                                        <li class="active"><i class="las la-star"></i></li>-->
    <!--                                        <li><i class="las la-star"></i></li>-->
    <!--                                    </ul>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                @endforeach-->
    <!--            @endif-->

    <!--        </div>-->

    <!--    </div>-->
    <!--</section>-->

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
                            <li><a href="#!" class="btn bg-royal-blue">Buy Now</a></li>
                            <li><a href="javascript:void(0);" onclick="addToCart({{ $product->id }});"
                                    class="btn bg-royal-blue">Add to Cart</a></li>
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
@endsection

@section('javascript.js')
<script>
    // Ensure quantity input field value is not negative or zero
    $('#quantityInput').on('change', function() {
        var quantity = $(this).val();
        if (quantity <= 0) {
            $(this).val(1);
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('#quantityInput').on('input', function() {
            var updatedValue = $(this).val();
            console.log(updatedValue); // You can use this value as per your requirement
        });
    });
</script>
    <script>
        function buyNowWithValidation() {
            // Check if Size, Base Color, and Printed Sides are selected
            var size = document.getElementById('sizeDropdown').value;
            var baseColor = document.getElementById('baseColorDropdown').value;
            var printedSides = document.getElementById('sideDropdown').value;
            var quantity = document.getElementById('quantityInput').value;
            var price = document.getElementById('productPrice').textContent.replace('$', '');
            var sizeErrorElement = document.getElementById('sizeError');
            var colorErrorElement = document.getElementById('colorError');
            var sideErrorElement = document.getElementById('sideError');

            // Reset all error messages
            sizeErrorElement.style.display = 'none';
            colorErrorElement.style.display = 'none';
            sideErrorElement.style.display = 'none';

            // Check each validation individually
            if (size === "") {
                sizeErrorElement.style.display = 'block';
                return; // Prevent further execution if validation fails
            }

            if (baseColor === "") {
                colorErrorElement.style.display = 'block';
                return; // Prevent further execution if validation fails
            }

            if (printedSides === "") {
                sideErrorElement.style.display = 'block';
                return; // Prevent further execution if validation fails
            }

            // If all validations pass, proceed to add to cart
            updateCart('{{ $product->id }}', baseColor, size, printedSides, quantity);
        }

        function buyNowWithValidation() {
            // Check if Size, Base Color, and Printed Sides are selected
            var size = document.getElementById('sizeDropdown').value;
            var baseColor = document.getElementById('baseColorDropdown').value;
            var printedSides = document.getElementById('sideDropdown').value;
            var quantity = document.getElementById('quantityInput').value;
            var sizeErrorElement = document.getElementById('sizeError');
            var colorErrorElement = document.getElementById('colorError');
            var sideErrorElement = document.getElementById('sideError');

            // Reset all error messages
            sizeErrorElement.style.display = 'none';
            colorErrorElement.style.display = 'none';
            sideErrorElement.style.display = 'none';

            // Check each validation individually
            if (size === "") {
                sizeErrorElement.style.display = 'block';
                return; // Prevent further execution if validation fails
            }

            if (baseColor === "") {
                colorErrorElement.style.display = 'block';
                return; // Prevent further execution if validation fails
            }

            if (printedSides === "") {
                sideErrorElement.style.display = 'block';
                return; // Prevent further execution if validation fails
            }

            // If all validations pass, proceed to add to cart
            buyNow('{{ $product->id }}', baseColor, size, printedSides, quantity);
        }
    </script>


    <script>
        function handleFileUpload() {
            var fileInput = document.getElementById('fileInput');
            var uploadedFile = fileInput.files[0]; // Get the uploaded file
            var uploadMessage = document.getElementById('uploadMessage');
            var uploadedFileName = document.getElementById('uploadedFileName');

            if (uploadedFile) {
                // File is uploaded
                uploadMessage.innerText = "File uploaded: ";
                uploadedFileName.innerText = uploadedFile.name;
                uploadedFileName.style.display = 'inline'; // Show the uploaded file name
            } else {
                // No file uploaded
                uploadMessage.innerText = "No file uploaded.";
                uploadedFileName.style.display = 'none'; // Hide the uploaded file name
            }
        }
    </script>

    <script type="text/javascript">
        $("#productRatingForm").submit(function(event) {
            event.preventDefault();

    $.ajax({
        url: '{{ route("front.saveRating",$product->id) }}',
        type: 'POST',
        data: $(this).serializeArray(),
        dataType: 'json',
        success: function(response) {
            var errors = response.errors;

            if (response.status == false) {
                if (errors.name) {
                    $("#name").addClass('is-invalid').siblings("p").addClass('invalid-feedback').html(errors.name);
                } else {
                    $("#name").removeClass('is-invalid').siblings("p").removeClass('invalid-feedback').html('');
                }
                if (errors.email) {
                    $("#email").addClass('is-invalid').siblings("p").addClass('invalid-feedback').html(errors.email);
                } else {
                    $("#email").removeClass('is-invalid').siblings("p").removeClass('invalid-feedback').html('');
                }
                if (errors.message) {
                    $("#comment").addClass('is-invalid').siblings("p").addClass('invalid-feedback').html(errors.message);
                } else {
                    $("#comment").removeClass('is-invalid').siblings("p").removeClass('invalid-feedback').html('');
                }
                if (errors.rating) {
                    $(".product-rating-error").html(errors.rating);
                } else {
                    $(".product-rating-error").html('');
                }
            } else {
                window.location.href="{{ route('front.product', $product->product_slug) }}";
            }
        }
    });
});

</script>

    
    <script>
        
        var initialPrice = "$100"; // Initial price (you can adjust this value as needed)

        
        $("#sizeDropdown, #colorsDropdown , #printSidesDropdown, #finishingsDropdown, #thicknessDropdown, #wirestakesqtysDropdown, #framesizesDropdown, #displaytypesDropdown, #installationsDropdown, #materialsDropdown, #cornersDropdown, #applicationsDropdown, #paperthicknessDropdown, #qtysDropdown, #pagesinbooksDropdown, #copiesrequiredsDropdown, #pagesinnotepadsDropdown, #quantityInput ").on('change', function() {
            // Get the selected size and print side
            const selectedSize = $("#sizeDropdown").val();
            const selectedColors = $("#colorsDropdown").val();
            const selectedPrintSides = $("#printSidesDropdown").val();
            const selectedFinishings = $("#finishingsDropdown").val();
            const selectedThickness = $("#thicknessDropdown").val();
            const selectedWirestakesqtys = $("#wirestakesqtysDropdown").val();
            const selectedFramesizes = $("#framesizesDropdown").val();
            const selectedDisplaytypes = $("#displaytypesDropdown").val();
            const selectedInstallations = $("#installationsDropdown").val();
            const selectedMaterials = $("#materialsDropdown").val();
            const selectedCorners = $("#cornersDropdown").val();
            const selectedApplications = $("#applicationsDropdown").val();
            const selectedPaperthickness = $("#paperthicknessDropdown").val();
            const selectedQtys = $("#qtysDropdown").val();
            const selectedPagesinbooks = $("#pagesinbooksDropdown").val();
            const selectedCopiesrequireds = $("#copiesrequiredsDropdown").val();
            const selectedPagesinnotepads = $("#pagesinnotepadsDropdown").val();
            const selectedQuantity = $("#quantityInput").val();
            const productId = "{{ $product->id }}";

            // Make AJAX request to fetch the updated price
            $.ajax({
                url: '{{ route('front.getPrice') }}',
                type: 'get',
                data: {
                    size: selectedSize,
                    colors: selectedColors,
                    print_sides: selectedPrintSides,
                    finishings: selectedFinishings,
                    thickness: selectedThickness,
                    wirestakesqtys: selectedWirestakesqtys,
                    framesizes: selectedFramesizes,
                    displaytypes: selectedDisplaytypes,
                    installations: selectedInstallations,
                    materials: selectedMaterials,
                    corners: selectedCorners,
                    applications: selectedApplications,
                    paperthickness: selectedPaperthickness,
                    qtys: selectedQtys,
                    pagesinbooks: selectedPagesinbooks,
                    copiesrequireds: selectedCopiesrequireds,
                    pagesinnotepads: selectedPagesinnotepads,
                    quantity: selectedQuantity,
                    product_id: productId
                },
                dataType: 'json',
                success: function(data) {
                    // Update the displayed price
                    if (data.price !== undefined) {
                        $("#productPrice").text('$' + data.price);
                    } else {
                        // If data.price is not available, display the initial price
                        $("#productPrice").text(initialPrice);
                    }
                },
                error: function(jqXHR, exception) {
                    console.log("Something Went Wrong");
                }
            });
        });
    </script>
    <script>
        function updateCart(productId, rowId, baseColor, size, printedSides, quantity) {
            // Send AJAX request to update cart
            $.ajax({
                url: '{{ route("front.updateCart") }}', // Backend route to handle cart update
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // Include CSRF token for security
                    product_id: productId,
                    row_id: rowId,
                    base_color: baseColor,
                    size: size,
                    printed_sides: printedSides,
                    quantity: quantity
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Show success message
                        toastr.success(response.message, 'Success');
                        // Optionally, update the UI (e.g., cart item count or price)
                        $("#cartTotal").text('$' + response.cartTotal);
                    } else {
                        // Show error message
                        toastr.error(response.message, 'Error');
                    }
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error("Update cart failed:", error);
                    toastr.error('An error occurred while updating the cart.', 'Error');
                }
            });
        }
    </script>
    
@endsection
@extends('layouts.master')

@section('style.css')
<style>
    /* CSS */
#sizeDropdown:invalid + #sizeError {
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



</style>
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

      padding: 10px;
    }
    
    .gst-info {
      font-size: 14px;
      color: #888; 
      margin-bottom: 3px; 
      font-style: italic;
      margin-left: 60px;
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
                                        <img src="{{ asset('uploads/product/' . $productImage->image) }}" alt="image_not_found">
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
                            {{-- <ul class="float-left mr-2">
                                <li class="active"><i class="las la-star"></i></li>
                                <li class="active"><i class="las la-star"></i></li>
                                <li class="active"><i class="las la-star"></i></li>
                                <li class="active"><i class="las la-star"></i></li>
                                <li><i class="las la-star"></i></li>
                            </ul> --}}
                            {{-- <div class="star-rating mt-2" title="70%">
                                <div class="back-stars">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>

                                    <div class="front-stars" style="width: {{ $avgRatingPer }}">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <span class="review-text">({{ ($product->product_ratings_count > 1) ? $product->product_ratings_count. ' Reviews' : $product->product_ratings_count.' Review' }})</span> --}}
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


                                <span class="item-price mb-30" id="productPrice">${{ $product->product_price }}</span>
                                <div class="row">
                                    <div class="form-group col-md-6 input-holder">
                                        <label for="quantity">Quantity:</label>
                                        <div class="">
                                            <form id="product-form-template--14606459338821__main" action="#">
                                                <input type="number" name="quantity" id="quantityInput"
                                                    class="quantity__input form-control" min="1" value="{{ $quantity }}">
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
                                                    $isCustomSize = true; // Flag to check if the selected size is custom
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

                                                    function formatSize($value) {
                                                        return (fmod($value, 1) == 0) ? number_format($value, 0) : number_format($value, 2);
                                                    }
                                                @endphp


                                                @foreach ($uniqueSizes as $size)
                                                    @php
                                                        $sizeValue = formatSize($size['width']) . 'mm x ' . formatSize($size['height']) . 'mm';
                                                        $isSelected = (isset($selectedSize) && $selectedSize == $sizeValue);
                                                        if ($isSelected) {
                                                            $isCustomSize = false; // Mark as non-custom if selected size matches
                                                        }
                                                    @endphp
                                                    <option value="{{ $sizeValue }}" {{ $isSelected ? 'selected' : '' }}>
                                                        {{ formatSize($size['width']) }}mm W x {{ formatSize($size['height']) }}mm H
                                                    </option>
                                                @endforeach

                                                <!-- Custom size option -->
                                                @if($product->product_allows_custom_size == 1)
                                                    <option value="Custom Size" {{ $isCustomSize ? 'selected' : '' }}>Custom Size</option>
                                                @endif
                                            </select>
                                            <p id="sizeError" style="color: red; display: none;">Please select a Size.</p>
                                        </div>

                                        <div id="customSizeFields" class="col-md-12" style="display: {{ $isCustomSize ? 'block' : 'none' }};">
                                            <div class="row">
                                                <div class="col-md-6 input-holder">
                                                    <label for="width">Width (mm):</label>
                                                    <input type="text" class="form-control" id="width" name="width"
                                                        value="{{ $isCustomSize && isset($customWidth) ? $customWidth : '' }}">
                                                    <p id="widthError" style="display: none; color: red;">Width must be at least 30mm.</p>
                                                </div>
                                                <div class="col-md-6 input-holder">
                                                    <label for="height">Height (mm):</label>
                                                    <input type="text" class="form-control" id="height" name="height"
                                                        value="{{ $isCustomSize && isset($customHeight) ? $customHeight : '' }}">
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
                                                @php
                                                    $selectedPrintSide = $selectedPrintSide ?? 'single'; // Default to 'single' if not set
                                                    $uniqueMediaTypes = collect($product->rigidMedia)
                                                        ->filter(fn($media) => in_array($media['media_type'], ['single', 'double']))
                                                        ->unique('media_type');
                                                @endphp
                                    
                                                @foreach ($uniqueMediaTypes as $media)
                                                    @if (!empty($media['media_type']))
                                                        <option value="{{ $media['media_type'] }}"
                                                            {{ $media['media_type'] === $selectedprintSides ? 'selected' : '' }}>
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
                                            <label for="colorsDropdown" class="mr-2 text-size">Base Color
                                                Options:</label>
                                            <select class="form-control" id="colorsDropdown" name="baseColor" required>
                                                <option value="">Select colors</option>
                                                @foreach ($colors as $color)
                                                    <option value="{{ $color }}" {{ $color == $color ? 'selected' : '' }}>{{ $color }}</option>
                                                @endforeach
                                            </select>
                                            <p id="colorsError" style="color: red; display: none;">Please select a Base
                                                Color.
                                            </p>
                                        </div>
                                    @endif

                                    @if (!empty($printSides))
                                        <div class="form-group col-md-6 input-holder">
                                            <label for="printSidesDropdown" class="mr-2 text-size">Print Sides
                                                Options:</label>
                                            <select class="form-control" id="printSidesDropdown" name="printSides" required >
                                                <option value="">Select Size</option>
                                                @foreach ($printSides as $printSide)
                                                    <option value="{{ $printSide }}">{{ $printSide }}</option>
                                                @endforeach
                                            </select>
                                            <p id="printSidesError" style="color: red; display: none;">Please select a Print
                                                Sides.</p>
                                        </div>
                                    @endif
                                    @if (!empty($finishings))
                                        <div class="form-group col-md-6 input-holder">
                                            <label for="finishingsDropdown">Finishings</label>
                                            <select class="form-control" id="finishingsDropdown" name="finishings" required>
                                                <option value="">Select Finishing</option>
                                                @foreach ($finishings as $finishing)
                                                    <option value="{{ $finishing }}"
                                                        @if (!empty($selectedfinishings) && $selectedfinishings == $finishing)
                                                            selected
                                                        @endif>
                                                        {{ $finishing }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <p id="finishingsError" style="color: red; display: none;">Please select a Finishings.</p>
                                        </div>
                                    @endif




                                    @if (!empty($thickness))
                                        <div class="form-group col-md-6 input-holder">
                                            <label for="thicknessDropdown" class="mr-2 text-size">Thickness Options:</label>
                                            <select class="form-control" id="thicknessDropdown" name="Thickness" required>
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
                                            <label for="wirestakesqtysDropdown" class="mr-2 text-size">Wire Stakes QTY
                                                Options:</label>
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
                                            <label for="framesizesDropdown" class="mr-2 text-size">Framesizes
                                                Options:</label>
                                            <select class="form-control" id="framesizesDropdown" name="framesizes" required>
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
                                            <label for="displaytypesDropdown" class="mr-2 text-size">Display Types
                                                Options:</label>
                                            <select class="form-control" id="displaytypesDropdown" name="displaytypes" required>
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
                                            <label for="installationsDropdown" class="mr-2 text-size">Installations
                                                Options:</label>
                                            <select class="form-control" id="installationsDropdown" name="installations" required>
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
                                            <label for="materialsDropdown" class="mr-2 text-size">Materials
                                                Options:</label>
                                            <select class="form-control" id="materialsDropdown" name="materialsColor" required>
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
                                            <label for="cornersDropdown" class="mr-2 text-size">Corners Options:</label>
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
                                            <label for="applicationsDropdown" class="mr-2 text-size">Applications
                                                Options:</label>
                                            <select class="form-control" id="applicationsDropdown" name="applications" required>
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
                                            <label for="paperthicknessDropdown" class="mr-2 text-size">Paper Thickness Options:</label>
                                            <select class="form-control" id="paperthicknessDropdown" name="paperthicknes" required>
                                                <option value="">Select Paper Thickness</option>
                                                @foreach ($paperthickness as $paperthicknesOption)
                                                    <option value="{{ $paperthicknesOption }}" {{ $paperthicknesOption == $selectedPaperThickness ? 'selected' : '' }}>
                                                        {{ $paperthicknesOption }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <p id="paperthicknessError" style="color: red; display: none;">Please select Paper Thickness.</p>
                                        </div>
                                    @endif

                                    @if (!empty($qtys))
                                        <div class="form-group col-md-6 input-holder">
                                            <label for="qtysDropdown" class="mr-2 text-size">QTYs
                                                Options:</label>
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
                                            <label for="pagesinbooksDropdown" class="mr-2 text-size">Pages in Book
                                                Options:</label>
                                            <select class="form-control" id="pagesinbooksDropdown" name="pagesinbook" required>
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
                                            <label for="copiesrequiredsDropdown" class="mr-2 text-size">Copies Requireds
                                                Options:</label>
                                            <select class="form-control" id="copiesrequiredsDropdown" name="copiesrequireds" required>
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
                                            <label for="pagesinnotepadsDropdown" class="mr-2 text-size">Pages Requireds
                                                Options:</label>
                                            <select class="form-control" id="pagesinnotepadsDropdown" name="pagesinnotepads" required>
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
                                <div class="row">
                                    <div class="form-group col-md-6 input-holder">
                                        <label for="pickup_option" class="text-size" style="margin-left: 20px;">Pickup Option:</label>
                                        <div style="display: flex; align-items: center; margin-left: 20px;">
                                            <input 
                                                type="checkbox" 
                                                id="pickup_option" 
                                                name="pickup_option" 
                                                value="Kings Park, NSW" 
                                                style="margin-right: 6px;" 
                                                {{ $cartItem->options->pickup_option === 'Kings Park, NSW' ? 'checked' : '' }}>
                                            <label for="pickup_option" style="font-family: Poppins; font-size: 15px; font-weight: 500; margin-top: 5px;">
                                                Pickup (Kings Park, NSW)
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="form-group mr-2">
                                        <label class="mr-2 text-size">How would you like to submit your design file?</label>
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- <div class="form-group mr-2">
                                        <label style="line-height: 1.5; margin-right: 25px;" for="fileInput"
                                            class="btn bg-royal-blue">Upload Finished Artwork<br>Print-Ready Files</label>
                                        <input type="file" id="fileInput" class="hidden"
                                            onchange="handleFileUpload()">
                                    </div> --}}
                                    <div class="form-group mr-2">
                                        <label style="line-height: 1.5; margin-right: 25px;" for="fileInput" class="btn bg-royal-blue">Upload Finished Artwork<br>Print-Ready Files</label>
                                        <input type="file" id="fileInput" class="hidden" onchange="handleFileUpload()">
                                        <p id="uploadMessage"></p> <!-- This is where the upload message will be displayed -->
                                        <p id="uploadedFileName" style="display: none;"></p> <!-- This is where the uploaded file name will be displayed -->
                                    </div>
                                    <div class="row">
                                        <div class="form-group mr-2">
                                            <a href="https://readytoprint.com.au/request-a-quote"
                                                style="line-height: 1.5;" class="btn bg-royal-blue">Let us design one for
                                                you <br>*Charges Apply</a>
                                        </div>
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
                        <!--<div class="quantity-form mb-30 clearfix">-->
                        <!--    <strong class="list-title">Quantity:</strong>-->
                        <!--    <div class="quantity-input">-->
                        <!--        <form id="product-form-template--14606459338821__main" action="#">-->
                        <!--            <input type="number" name="quantity" id="quantityInput" class="quantity__input" min="1" max="10" value="1">-->
                        <!--        </form>-->
                        <!--    </div>-->
                        <!--</div>-->


                        <div class="btns-group ul-li mb-30">
                            <ul class="clearfix">
                                <!--<li><a href="javascript:void(0);" id="buyNowButton" onclick="buyNowWithValidation()"-->
                                <!--        class="btn bg-royal-blue">Buy Now</a>-->
                                <!--</li>-->
                               
                                <li><a href="javascript:void(0);" onclick="updateCart('{{ $product->id }}' , '{{ $cartItem->rowId }}');" class="btn bg-royal-blue">Update Cart</a></li>
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

<!--                <div id="reviews-tab" class="tab-pane fade">-->
<!--                    <div class="row">-->
<!--                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">-->
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
<!--                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">-->
<!--                                        <div class="form-item form-group">-->
<!--                                            <input type="text" class="form-control" name="name" id="name" placeholder="Full Name*">-->
<!--                                            <p></p>-->
<!--                                        </div>-->
<!--                                    </div>-->

<!--                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">-->
<!--                                        <div class="form-item form-group">-->
<!--                                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">-->
<!--                                            <p></p>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <button type="submit" class="btn bg-royal-blue">Submit Now</button>-->
<!--                            </form>-->
<!--</div>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
            </div>
        </div>

        </div>
    </section>
    <!-- details-section - end
            ================================================== -->


    <!-- shop-section - start
            ================================================== -->
    <!--<section id="shop-section" class="shop-section sec-ptb-100 decoration-wrap clearfix">-->
    <!--    <div class="container">-->

    <!--        <div class="section-title text-center mb-70">-->
    <!--            <h2 class="title-text mb-3">Related Products</h2>-->
                <!--<p class="mb-0">Shopping Over $59 or first purchase you will get 100% free shipping</p>-->
    <!--        </div>-->

    <!--        <div id="column-4-carousel" class="column-4-carousel arrow-right-left owl-carousel owl-theme">-->
    <!--            @if (!empty($relatedProducts))-->
    <!--                @foreach ($relatedProducts as $relatedProduct)-->
    <!--                    @php-->
    <!--                        $productsImage = $relatedProduct->product_images->first();-->
    <!--                    @endphp-->
    <!--                    <div class="item">-->
    <!--                        <div class="product-grid text-center clearfix">-->
    <!--                            <div class="item-image">-->
    <!--                                <a href="{{ route('front.product', $relatedProduct->product_slug) }}"-->
    <!--                                    class="image-wrap">-->
    <!--                                    @if (!empty($productsImage->image))-->
    <!--                                        <img src="{{ asset('/uploads/product/' . $productsImage->image) }}"-->
    <!--                                            alt="img-thumbnail" class="card-img-top rounded" />-->
    <!--                                    @else-->
    <!--                                        <img src="{{ asset('admin-assets/img/default-150X150.png') }}" alt="Default"-->
    <!--                                            class="card-img-top rounded" />-->
    <!--                                    @endif-->
    <!--                                </a>-->
    <!--                                <div class="post-label ul-li-right clearfix">-->
    <!--                                    {{-- <ul class="clearfix">-->
    <!--                                <li class="bg-skyblue">-19%</li>-->
    <!--                                <li class="bg-skyblue">TOP</li>-->
    <!--                            </ul> --}}-->
    <!--                                </div>-->
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
                                    <!--        <li><a onclick="addToWishList({{ $product->id }})" href="javascript:void(0);" data-toggle="tooltip" data-placement="top"-->
                                    <!--                title="Add To Wishlist"><i class="lar la-heart"></i></a></li>-->
                                    <!--    </ul>-->
                                    <!--</div>-->
    <!--                            </div>-->
    <!--                            <div class="item-content">-->
    <!--                                <h3 class="item-title">-->
    <!--                                    <a href="#!">{{ $relatedProduct->product_name }}</a>-->
    <!--                                </h3>-->
    <!--                                <span class="item-price">${{ $relatedProduct->product_price }}</span>-->
    <!--                                <div class="rating-star ul-li-center clearfix">-->
    <!--                                    <ul class="clearfix">-->
    <!--                                        <li class="active"><i class="las la-star"></i></li>-->
    <!--                                        <li class="active"><i class="las la-star"></i></li>-->
    <!--                                        <li class="active"><i class="las la-star"></i></li>-->
    <!--                                        <li class="active"><i class="las la-star"></i></li>-->
    <!--                                        <li><i class="las la-star"></i></li>-->
    <!--                                    </ul>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                @endforeach-->
    <!--            @endif-->

    <!--        </div>-->

    <!--    </div>-->
    <!--</section>-->

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
                            <li><a href="#!" class="btn bg-royal-blue">Buy Now</a></li>
                            <li><a href="javascript:void(0);" onclick="addToCart({{ $product->id }});"
                                    class="btn bg-royal-blue">Add to Cart</a></li>
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
@endsection

@section('javascript.js')
<script>
    // Ensure quantity input field value is not negative or zero
    $('#quantityInput').on('change', function() {
        var quantity = $(this).val();
        if (quantity <= 0) {
            $(this).val(1);
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('#quantityInput').on('input', function() {
            var updatedValue = $(this).val();
            console.log(updatedValue); // You can use this value as per your requirement
        });
    });
</script>
    <script>
        function buyNowWithValidation() {
            // Check if Size, Base Color, and Printed Sides are selected
            var size = document.getElementById('sizeDropdown').value;
            var baseColor = document.getElementById('baseColorDropdown').value;
            var printedSides = document.getElementById('sideDropdown').value;
            var quantity = document.getElementById('quantityInput').value;
            var price = document.getElementById('productPrice').textContent.replace('$', '');
            var sizeErrorElement = document.getElementById('sizeError');
            var colorErrorElement = document.getElementById('colorError');
            var sideErrorElement = document.getElementById('sideError');

            // Reset all error messages
            sizeErrorElement.style.display = 'none';
            colorErrorElement.style.display = 'none';
            sideErrorElement.style.display = 'none';

            // Check each validation individually
            if (size === "") {
                sizeErrorElement.style.display = 'block';
                return; // Prevent further execution if validation fails
            }

            if (baseColor === "") {
                colorErrorElement.style.display = 'block';
                return; // Prevent further execution if validation fails
            }

            if (printedSides === "") {
                sideErrorElement.style.display = 'block';
                return; // Prevent further execution if validation fails
            }

            // If all validations pass, proceed to add to cart
            updateCart('{{ $product->id }}', baseColor, size, printedSides, quantity);
        }

        function buyNowWithValidation() {
            // Check if Size, Base Color, and Printed Sides are selected
            var size = document.getElementById('sizeDropdown').value;
            var baseColor = document.getElementById('baseColorDropdown').value;
            var printedSides = document.getElementById('sideDropdown').value;
            var quantity = document.getElementById('quantityInput').value;
            var sizeErrorElement = document.getElementById('sizeError');
            var colorErrorElement = document.getElementById('colorError');
            var sideErrorElement = document.getElementById('sideError');

            // Reset all error messages
            sizeErrorElement.style.display = 'none';
            colorErrorElement.style.display = 'none';
            sideErrorElement.style.display = 'none';

            // Check each validation individually
            if (size === "") {
                sizeErrorElement.style.display = 'block';
                return; // Prevent further execution if validation fails
            }

            if (baseColor === "") {
                colorErrorElement.style.display = 'block';
                return; // Prevent further execution if validation fails
            }

            if (printedSides === "") {
                sideErrorElement.style.display = 'block';
                return; // Prevent further execution if validation fails
            }

            // If all validations pass, proceed to add to cart
            buyNow('{{ $product->id }}', baseColor, size, printedSides, quantity);
        }
    </script>


    <script>
        function handleFileUpload() {
            var fileInput = document.getElementById('fileInput');
            var uploadedFile = fileInput.files[0]; // Get the uploaded file
            var uploadMessage = document.getElementById('uploadMessage');
            var uploadedFileName = document.getElementById('uploadedFileName');

            if (uploadedFile) {
                // File is uploaded
                uploadMessage.innerText = "File uploaded: ";
                uploadedFileName.innerText = uploadedFile.name;
                uploadedFileName.style.display = 'inline'; // Show the uploaded file name
            } else {
                // No file uploaded
                uploadMessage.innerText = "No file uploaded.";
                uploadedFileName.style.display = 'none'; // Hide the uploaded file name
            }
        }
    </script>

    <script type="text/javascript">
        $("#productRatingForm").submit(function(event) {
            event.preventDefault();

    $.ajax({
        url: '{{ route("front.saveRating",$product->id) }}',
        type: 'POST',
        data: $(this).serializeArray(),
        dataType: 'json',
        success: function(response) {
            var errors = response.errors;

            if (response.status == false) {
                if (errors.name) {
                    $("#name").addClass('is-invalid').siblings("p").addClass('invalid-feedback').html(errors.name);
                } else {
                    $("#name").removeClass('is-invalid').siblings("p").removeClass('invalid-feedback').html('');
                }
                if (errors.email) {
                    $("#email").addClass('is-invalid').siblings("p").addClass('invalid-feedback').html(errors.email);
                } else {
                    $("#email").removeClass('is-invalid').siblings("p").removeClass('invalid-feedback').html('');
                }
                if (errors.message) {
                    $("#comment").addClass('is-invalid').siblings("p").addClass('invalid-feedback').html(errors.message);
                } else {
                    $("#comment").removeClass('is-invalid').siblings("p").removeClass('invalid-feedback').html('');
                }
                if (errors.rating) {
                    $(".product-rating-error").html(errors.rating);
                } else {
                    $(".product-rating-error").html('');
                }
            } else {
                window.location.href="{{ route('front.product', $product->product_slug) }}";
            }
        }
    });
});

</script>

    
    <script>
        
        var initialPrice = "$100"; // Initial price (you can adjust this value as needed)

        
        $("#sizeDropdown, #colorsDropdown , #printSidesDropdown, #finishingsDropdown, #thicknessDropdown, #wirestakesqtysDropdown, #framesizesDropdown, #displaytypesDropdown, #installationsDropdown, #materialsDropdown, #cornersDropdown, #applicationsDropdown, #paperthicknessDropdown, #qtysDropdown, #pagesinbooksDropdown, #copiesrequiredsDropdown, #pagesinnotepadsDropdown, #quantityInput ").on('change', function() {
            // Get the selected size and print side
            const selectedSize = $("#sizeDropdown").val();
            const selectedColors = $("#colorsDropdown").val();
            const selectedPrintSides = $("#printSidesDropdown").val();
            const selectedFinishings = $("#finishingsDropdown").val();
            const selectedThickness = $("#thicknessDropdown").val();
            const selectedWirestakesqtys = $("#wirestakesqtysDropdown").val();
            const selectedFramesizes = $("#framesizesDropdown").val();
            const selectedDisplaytypes = $("#displaytypesDropdown").val();
            const selectedInstallations = $("#installationsDropdown").val();
            const selectedMaterials = $("#materialsDropdown").val();
            const selectedCorners = $("#cornersDropdown").val();
            const selectedApplications = $("#applicationsDropdown").val();
            const selectedPaperthickness = $("#paperthicknessDropdown").val();
            const selectedQtys = $("#qtysDropdown").val();
            const selectedPagesinbooks = $("#pagesinbooksDropdown").val();
            const selectedCopiesrequireds = $("#copiesrequiredsDropdown").val();
            const selectedPagesinnotepads = $("#pagesinnotepadsDropdown").val();
            const selectedQuantity = $("#quantityInput").val();
            const productId = "{{ $product->id }}";

            // Make AJAX request to fetch the updated price
            $.ajax({
                url: '{{ route('front.getPrice') }}',
                type: 'get',
                data: {
                    size: selectedSize,
                    colors: selectedColors,
                    print_sides: selectedPrintSides,
                    finishings: selectedFinishings,
                    thickness: selectedThickness,
                    wirestakesqtys: selectedWirestakesqtys,
                    framesizes: selectedFramesizes,
                    displaytypes: selectedDisplaytypes,
                    installations: selectedInstallations,
                    materials: selectedMaterials,
                    corners: selectedCorners,
                    applications: selectedApplications,
                    paperthickness: selectedPaperthickness,
                    qtys: selectedQtys,
                    pagesinbooks: selectedPagesinbooks,
                    copiesrequireds: selectedCopiesrequireds,
                    pagesinnotepads: selectedPagesinnotepads,
                    quantity: selectedQuantity,
                    product_id: productId
                },
                dataType: 'json',
                success: function(data) {
                    // Update the displayed price
                    if (data.price !== undefined) {
                        $("#productPrice").text('$' + data.price);
                    } else {
                        // If data.price is not available, display the initial price
                        $("#productPrice").text(initialPrice);
                    }
                },
                error: function(jqXHR, exception) {
                    console.log("Something Went Wrong");
                }
            });
        });
    </script>
    <script>
        function updateCart(productId, rowId, baseColor, size, printedSides, quantity) {
            // Send AJAX request to update cart
            $.ajax({
                url: '{{ route("front.updateCart") }}', // Backend route to handle cart update
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // Include CSRF token for security
                    product_id: productId,
                    row_id: rowId,
                    base_color: baseColor,
                    size: size,
                    printed_sides: printedSides,
                    quantity: quantity
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Show success message
                        toastr.success(response.message, 'Success');
                        // Optionally, update the UI (e.g., cart item count or price)
                        $("#cartTotal").text('$' + response.cartTotal);
                    } else {
                        // Show error message
                        toastr.error(response.message, 'Error');
                    }
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error("Update cart failed:", error);
                    toastr.error('An error occurred while updating the cart.', 'Error');
                }
            });
        }
    </script>
    
@endsection
