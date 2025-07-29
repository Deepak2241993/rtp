@extends('layouts.app')

@section('customcss')
    <style>
        .btn.btnchange {
            background-color: #543B8C !important;
            color: #fff;
        }

        .btn.btnchange.active {
            background-color: #ED5D2B !important;
            /* Change the background color when active */
            color: #fff;
            /* Change the text color when active */
        }

        .btn.btnchange {
            margin-right: 10px;
            /* Adjust the margin-right value to set the desired gap between buttons */
        }

        .row .price-fields {
            align-items: baseline;
            margin-top: 15px;
        }

        /* #rigidMediaContainer {
                display: none;
            } */
        #singleSideContainer,
        #doubleSideContainer {
            min-height: 200px;
        }
    </style>
@endsection

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Product</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <form action="" method="POST" id="productform" name="productform" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="product_name">Product Name</label>
                                            <input type="text" name="product_name" id="product_name" class="form-control"
                                                placeholder="Product Name" value="{{ $product->product_name }}">
                                            <p class="error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="product_slug">Product Slug</label>
                                            <input type="text" readonly name="product_slug" id="product_slug"
                                                class="form-control" placeholder="Product Slug"
                                                value="{{ $product->product_slug }}">
                                            <p class="error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="product_short_description">Short Description</label>
                                            <textarea name="product_short_description" id="product_short_description" cols="30" rows="10"
                                                class="summernote" placeholder="Short Description">{{ $product->product_short_description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="product_description">Description</label>
                                            <textarea name="product_description" id="product_description" cols="30" rows="10" class="summernote"
                                                placeholder="Description">{{ $product->product_description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="product_key_feature">Key Feature</label>
                                            <textarea name="product_key_feature" id="product_key_feature" cols="30" rows="10" class="summernote"
                                                placeholder="Description">{{ $product->product_key_feature }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Media</h2>
                                <div id="image" class="dropzone dz-clickable">
                                    <div class="dz-message needsclick">
                                        <br>Drop files here or click to upload.<br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="product-image">
                            @if ($productImages->isNotEmpty())
                                @foreach ($productImages as $image)
                                    <div class="col-md-3" id="image-row-{{ $image->id }}">
                                        <div class="card">
                                            <input type="hidden" name="image_array[]" value="{{ $image->id }}">
                                            <img src="{{ asset('uploads/product/' . $image->image) }}" class="card-img-top"
                                                alt="">
                                            <div class="card-body">
                                                <a href="javascript:void(0)" onclick="deleteImage({{ $image->id }})"
                                                    class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Pricing</h2>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="product_price">Basics Price</label>
                                            <input type="text" name="product_price" id="product_price"
                                                class="form-control" placeholder="Price"
                                                value="{{ $product->product_price }}">
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="product_discounted_price">Discount Price</label>
                                            <input type="text" name="product_discounted_price"
                                                id="product_discounted_price" class="form-control"
                                                placeholder="Discount Price"
                                                value="{{ $product->product_discounted_price }}">
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="compare_price">Compare at Price</label>
                                        <input type="text" name="compare_price" id="compare_price" class="form-control" placeholder="Compare Price">
                                        <p class="text-muted mt-3">
                                            To show a reduced price, move the product’s original price into Compare at price. Enter a lower value into Price.
                                        </p>
                                    </div>
                                </div>                                             --}}
                                </div>
                            </div>
                        </div>
                        {{-- <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Inventory</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="product_sku">SKU (Stock Keeping Unit)</label>
                                            <input type="text" name="product_sku" id="product_sku"
                                                class="form-control" placeholder="Product SKU"
                                                value="{{ $product->product_sku }}">
                                        </div>
                                    </div>
                                   <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="barcode">Barcode</label>
                                        <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode">
                                    </div>
                                </div>    
                                    <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="track_qty" name="track_qty" checked>
                                            <label for="track_qty" class="custom-control-label">Track Quantity</label>
                                        </div>
                                    </div> 
                                        <div class="mb-3">
                                            <input type="number" min="0" name="product_quantity"
                                                id="product_quantity" class="form-control" placeholder="Qty"
                                                value="{{ $product->product_quantity }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Product Information</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="product_meta_title">Meta Title</label>
                                            <input type="text" name="product_meta_title" id="product_meta_title"
                                                class="form-control" placeholder="Product Title"
                                                value="{{ $product->product_meta_title }}">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="product_meta_desp">meta Description</label>
                                            <input type="text" name="product_meta_desp" id="product_meta_desp"
                                                class="form-control" placeholder="Product Description"
                                                value="{{ $product->product_meta_desp }}">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="product_meta_keyword">Meta Keyword</label>
                                            <input type="text" name="product_meta_keyword" id="product_meta_keyword"
                                                class="form-control" placeholder="Meta Keyword"
                                                value="{{ $product->product_meta_keyword }}">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="product_tag">Product Tag</label>
                                            <input type="text" name="product_tag" id="product_tag"
                                                class="form-control" placeholder="Product Tag"
                                                value="{{ $product->product_tag }}">
                                            <p></p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card md-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Choose The Options</h2>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <div class="btn-group" role="group" aria-label="Toggle Product Options">
                                                <button type="button" id="toggleProductPriceBtn"
                                                    class="btn btn-info btnchange active">Product Price</button>
                                                <button type="button" id="toggleProductSizeBtn"
                                                    class="btn btn-info btnchange">Product Size</button>
                                                <button type="button" id="toggleProductColorBtn"
                                                    class="btn btn-info btnchange">Product Color</button>
                                                <button type="button" id="toggleProductPrintSideBtn"
                                                    class="btn btn-info btnchange">Product Print Side</button>
                                                <button type="button" id="toggleFinishingBtn"
                                                    class="btn btn-info btnchange">Product Finishing</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <div class="btn-group" role="group" aria-label="Toggle Product Options">
                                                <button type="button" id="toggleThicknessBtn"
                                                    class="btn btn-info btnchange">Product Thickness</button>
                                                <button type="button" id="toggleWireStakesQtyBtn"
                                                    class="btn btn-info btnchange">Wire Stakes Qty</button>
                                                <button type="button" id="toggleFrameSizeBtn"
                                                    class="btn btn-info btnchange">Frame Size</button>
                                                <button type="button" id="toggleDisplayTypeBtn"
                                                    class="btn btn-info btnchange">Display Type</button>
                                                <button type="button" id="toggleInstallationBtn"
                                                    class="btn btn-info btnchange">Installation Required</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <div class="btn-group" role="group" aria-label="Toggle Product Options">
                                                <button type="button" id="toggleMaterialBtn"
                                                    class="btn btn-info btnchange">Material</button>
                                                <button type="button" id="toggleCornersBtn"
                                                    class="btn btn-info btnchange">Corners</button>
                                                <button type="button" id="toggleApplicationBtn"
                                                    class="btn btn-info btnchange">Application</button>
                                                <button type="button" id="togglePaperThicknessBtn"
                                                    class="btn btn-info btnchange">Paper Thickness</button>
                                                <button type="button" id="toggleQtyBtn"
                                                    class="btn btn-info btnchange">QTY</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <div class="btn-group" role="group" aria-label="Toggle Product Options">
                                                <button type="button" id="togglePagesinBookBtn"
                                                    class="btn btn-info btnchange">Pages in Book</button>
                                                <button type="button" id="toggleCopiesRequiredBtn"
                                                    class="btn btn-info btnchange">Copies Required</button>
                                                <button type="button" id="togglePagesinNotepadBtn"
                                                    class="btn btn-info btnchange">Pages in Notepad</button>
                                                <button type="button" id="toggleCuttingBtn"
                                                    class="btn btn-info btnchange">Cutting</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- productPriceCard Section --}}
                        <div class="card mb-3" id="productPriceCard">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Price Option</h2>
                                <div id="priceOptionsContainer">
                                    <div class="row price">
                                        <div class="col-md-12">
                                            @php
                                                // Determine selected price option
                                                $selectedOption = '';
                                                $disableFixed = false;
                                                $disableRigid = false;
                                                $disableRoll = false;

                                                if (
                                                    $price_range instanceof \Illuminate\Support\Collection &&
                                                    $price_range->isNotEmpty()
                                                ) {
                                                    $firstItem = $price_range->first();
                                                    $selectedOption = old(
                                                        'priceOption',
                                                        $firstItem->price_option ?? '',
                                                    );
                                                } elseif (
                                                    isset($product->fixed_price_options) &&
                                                    $product->fixed_price_options->isNotEmpty()
                                                ) {
                                                    $selectedOption = 'fixed';
                                                    $disableRigid = true;
                                                    $disableRoll = true;
                                                } elseif (
                                                    isset($product->rigidMedia) &&
                                                    $product->rigidMedia->isNotEmpty()
                                                ) {
                                                    $selectedOption = 'rigidMedia';
                                                    $disableFixed = true;
                                                    $disableRoll = true;
                                                } elseif (
                                                    isset($product->rollMedia) &&
                                                    $product->rollMedia->isNotEmpty()
                                                ) {
                                                    $selectedOption = 'rollMedia';
                                                    $disableFixed = true;
                                                    $disableRigid = true;
                                                } else {
                                                    $selectedOption = old('priceOption', '');
                                                }
                                            @endphp

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="priceOption"
                                                    id="priceOptionRollMedia" value="rollMedia"
                                                    {{ $selectedOption == 'rollMedia' ? 'checked' : '' }}
                                                    @if ($disableRoll) disabled @endif>
                                                <label class="form-check-label" for="priceOptionRollMedia">Roll
                                                    Media</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="priceOption"
                                                    id="priceOptionFixed" value="fixed"
                                                    {{ $selectedOption == 'fixed' ? 'checked' : '' }}
                                                    @if ($disableFixed) disabled @endif>
                                                <label class="form-check-label" for="priceOptionFixed">Fixed</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="priceOption"
                                                    id="priceOptionRigidMedia" value="rigidMedia"
                                                    {{ $selectedOption == 'rigidMedia' ? 'checked' : '' }}
                                                    @if ($disableRigid) disabled @endif>
                                                <label class="form-check-label" for="priceOptionRigidMedia">Rigid
                                                    Media</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>





                                <!-- Display all fields -->
                                <div id="rollMediaContainer"
                                    class="{{ $selectedOption != 'rollMedia' ? 'hidden' : '' }}">
                                    @foreach ($product->price_ranges as $index => $attribute)
                                        <div class="rollMediaFieldSet row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="min_range">Min Range (Select TSqM)</label>
                                                    <input type="number" name="min_range[]"
                                                        value="{{ old('min_range.' . $index, $attribute->min_range) }}"
                                                        class="form-control" placeholder="min mm" min="0"
                                                        step="0.01">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="max_range">Max Range (Select TSqM)</label>
                                                    <input type="number" name="max_range[]"
                                                        value="{{ old('max_range.' . $index, $attribute->max_range) }}"
                                                        class="form-control" placeholder="max mm" min="0"
                                                        step="0.01">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="roll_price">Price</label>
                                                    <input type="number" name="roll_price[]"
                                                        value="{{ old('roll_price.' . $index, $attribute->price) }}"
                                                        class="form-control" placeholder="Price" min="0"
                                                        step="0.01">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div id="fixedContainer" class="{{ $selectedOption != 'fixed' ? 'hidden' : '' }}">
                                    @if (isset($product->fixed_price_options) && $product->fixed_price_options->isNotEmpty())
                                        @foreach ($product->fixed_price_options as $index => $fixedOption)
                                            <div class="fixedFieldSet mb-3" data-index="{{ $index }}">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="mb-3">
                                                            <label
                                                                for="fixed_dimensions_{{ $index }}">Dimension</label>
                                                            <input type="text" name="fixed_dimensions[]"
                                                                id="fixed_dimensions_{{ $index }}"
                                                                value="{{ old('fixed_dimensions.' . $index, $fixedOption->width . ' X ' . $fixedOption->height) }}"
                                                                class="form-control"
                                                                placeholder="Size Dimensions (e.g. 1000 X 2000)">
                                                            <p id="dimension-error" class="error text-danger"
                                                                style="display: none;">Invalid dimension format. Please use
                                                                the format "1000 X 2000" or "1000*2000".</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="mb-3">
                                                            <label>Quantity Range & Prices</label>
                                                            @foreach ($fixedOption->fixed_price_ranges as $rangeIndex => $priceRange)
                                                                <div class="row mb-2 fixedFieldSet">
                                                                    <div class="col-md-3">
                                                                        <input type="number"
                                                                            name="fixed_min_qty[{{ $index }}][]"
                                                                            class="form-control" placeholder="Min Qty"
                                                                            min="1" step="0.01"
                                                                            value="{{ old('fixed_min_qty.' . $index . '.' . $rangeIndex, $priceRange->min_qty) }}">
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <input type="number"
                                                                            name="fixed_max_qty[{{ $index }}][]"
                                                                            class="form-control" placeholder="Max Qty"
                                                                            min="1" step="0.01"
                                                                            value="{{ old('fixed_max_qty.' . $index . '.' . $rangeIndex, $priceRange->max_qty) }}">
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <input type="number"
                                                                            name="fixed_price[{{ $index }}][]"
                                                                            class="form-control" placeholder="Price"
                                                                            min="0" step="0.01"
                                                                            value="{{ old('fixed_price.' . $index . '.' . $rangeIndex, $priceRange->price) }}">
                                                                    </div>
                                                                    <div
                                                                        class="col-md-3 d-flex justify-content-between align-items-center">
                                                                        @if ($loop->first)
                                                                            <button type="button"
                                                                                class="btn btn-success addMoreFixedBtn"
                                                                                data-id="[{{ $index }}]"><i
                                                                                    class="fas fa-plus"></i></button>
                                                                        @else
                                                                            <button type="button"
                                                                                class="btn btn-danger removeFixedBtn"><i
                                                                                    class="fas fa-minus"></i></button>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <!-- Rigid Media Section -->
                                <div id="rigidMediaContainer"
                                    class="{{ $selectedOption != 'rigidMedia' ? 'hidden' : '' }}">
                                    <h3>Rigid Media</h3>

                                    <!-- Checkbox Selection -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    name="rigidMediaOption[0][]" id="singleOption0" value="single"
                                                    @if ($product->rigidMedia->contains('media_type', 'single')) checked @endif>
                                                <label class="form-check-label" for="singleOption0">Single Side</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    name="rigidMediaOption[0][]" id="doubleOption0" value="double"
                                                    @if ($product->rigidMedia->contains('media_type', 'double')) checked @endif>
                                                <label class="form-check-label" for="doubleOption0">Double Side</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Two-Column Layout -->
                                    <div class="row">
                                        <!-- Single Side Column -->
                                        <div class="col-md-6">
                                            <div id="singleSideContainer"
                                                style="display: {{ $product->rigidMedia->contains('media_type', 'single') ? 'block' : 'none' }};">
                                                <h5>Single Side</h5>

                                               @foreach ($product->rigidMedia->where('media_type', 'single') as $index => $rigidMediaOption)
                                                   <div class="row price-fields">
                                                        <div class="col-md-4 mb-2">
                                                            <label>Min Qty</label>
                                                            <input type="number"
                                                                name="rigidMedia[single][{{ $index }}][min_range]"
                                                                value="{{ $rigidMediaOption->min_range }}"
                                                                class="form-control" step="0.01" min="0">
                                                        </div>
                                                        <div class="col-md-4 mb-2">
                                                            <label>Max Qty</label>
                                                            <input type="number"
                                                                name="rigidMedia[single][{{ $index }}][max_range]"
                                                                value="{{ $rigidMediaOption->max_range }}"
                                                                class="form-control" step="0.01" min="0">
                                                        </div>
                                                        <div class="col-md-4 mb-2">
                                                            <label>Price ($)</label>
                                                            <input type="number"
                                                                name="rigidMedia[single][{{ $index }}][price]"
                                                                value="{{ $rigidMediaOption->price }}"
                                                                class="form-control" step="0.01" min="0">
                                                        </div>
                                                        <div class="col-md-12 text-end">
                                                            <button type="button"
                                                                class="btn btn-danger btn-sm remove-price-field mt-2 mb-2">
                                                                <i class="fas fa-minus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                
                                            </div>
                                            <button type="button" class="btn btn-primary add-more-price-field mt-2"
                                                    data-side="single">
                                                    <i class="fas fa-plus"></i> Add More
                                            </button>
                                        </div>

                                        <!-- Double Side Column -->
                                        <div class="col-md-6">
                                            <div id="doubleSideContainer"
                                                style="display: {{ $product->rigidMedia->contains('media_type', 'double') ? 'block' : 'none' }};">
                                                <h5>Double Side</h5>

                                                <!-- Existing Entries -->
                                              @foreach ($product->rigidMedia->where('media_type', 'double') as $index => $rigidMediaOption)
                                                    
                                                        <div class="row price-fields">
                                                            <div class="col-md-4 mb-2">
                                                                <label>Min Range (Sq Mtr)</label>
                                                                <input type="number"
                                                                    name="rigidMedia[double][{{ $index }}][min_range]"
                                                                    value="{{ $rigidMediaOption->min_range }}"
                                                                    class="form-control" step="0.01" min="0">
                                                            </div>
                                                            <div class="col-md-4 mb-2">
                                                                <label>Max Range (Sq Mtr)</label>
                                                                <input type="number"
                                                                    name="rigidMedia[double][{{ $index }}][max_range]"
                                                                    value="{{ $rigidMediaOption->max_range }}"
                                                                    class="form-control" step="0.01" min="0">
                                                            </div>
                                                            <div class="col-md-4 mb-2">
                                                                <label>Price</label>
                                                                <input type="number"
                                                                    name="rigidMedia[double][{{ $index }}][price]"
                                                                    value="{{ $rigidMediaOption->price }}"
                                                                    class="form-control" step="0.01" min="0">
                                                            </div>
                                                            <div class="col-md-12 text-end">
                                                                <button type="button"
                                                                    class="btn btn-danger btn-sm remove-price-field mt-2">
                                                                    <i class="fas fa-minus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    
                                                @endforeach
                                               
                                            </div>
                                            <!-- Add More Button -->
                                            <button type="button" class="btn btn-primary add-more-price-field mt-2"
                                                data-side="double">
                                                <i class="fas fa-plus"></i> Add More
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>




                        <button type="button" id="addFixedFieldsBtn" class="btn btn-success mt-4">Add Fixed
                            Media</button>
                        <button type="button" id="addRollMediaFieldsBtn" class="btn btn-success mt-4">Add Roll Media
                        </button>
                    
                

                <!-- Product Size Option Card -->
                <div class="card mb-3" id="productSizeCard" style="display: none;">
                    <div class="card-body">
                        <h2 class="h4 mb-3">Product Size Option</h2>
                        <div id="sizeFieldsContainer">
                            <?php if (is_array($product->product_prices) || is_object($product->product_prices)): ?>
                            <?php if (count($product->product_prices) > 0): ?>
                            <?php foreach ($product->product_prices as $attribute): ?>
                            <div class="row size-fields">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="product_width">Width MM</label>
                                        <input type="number" name="product_width[]" class="form-control"
                                            value="{{ $attribute->product_width }}" placeholder="Width mm"
                                            min="0" step="0.01">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="product_height">Height MM</label>
                                        <input type="number" name="product_height[]" class="form-control"
                                            value="{{ $attribute->product_height }}" placeholder="Height mm"
                                            min="0" step="0.01">
                                    </div>
                                </div>
                                <div class="col-md-4" hidden>
                                    <div class="mb-3">
                                        <label for="product_price_quantity">Quantity</label>
                                        <input type="number" name="product_price_quantity[]"
                                            value="{{ $attribute->product_quantity }}" class="form-control"
                                            placeholder="Quantity" min="0" step="0.01">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger removeBtn mt-4">Remove</button>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <!-- If no product prices exist, display empty input fields -->
                            <div class="row size-fields">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="product_width">Width MM</label>
                                        <input type="number" name="product_width[]" class="form-control" value=""
                                            placeholder="Width mm" min="0" step="0.01">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="product_height">Height MM</label>
                                        <input type="number" name="product_height[]" class="form-control"
                                            value="" placeholder="Height mm" min="0" step="0.01">
                                    </div>
                                </div>
                                <div class="col-md-4" hidden>
                                    <div class="mb-3">
                                        <label for="product_price_quantity">Quantity</label>
                                        <input type="number" name="product_price_quantity[]" value=""
                                            class="form-control" placeholder="Quantity" min="0" step="0.01">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php else: ?>
                            <!-- If $product->product_prices is not set, show empty input fields -->
                            <div class="row size-fields">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="product_width">Width MM</label>
                                        <input type="number" name="product_width[]" class="form-control" value=""
                                            placeholder="Width mm" min="0" step="1">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="product_height">Height MM</label>
                                        <input type="number" name="product_height[]" class="form-control"
                                            value="" placeholder="Height mm" min="0" step="1">
                                    </div>
                                </div>
                                <div class="col-md-4" hidden>
                                    <div class="mb-3">
                                        <label for="product_price_quantity">Quantity</label>
                                        <input type="number" name="product_price_quantity[]" value=""
                                            class="form-control" placeholder="Quantity" min="0" step="1">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <button type="button" id="addFieldsBtn" class="btn btn-success">Add More</button>
                    </div>
                </div>

                <!-- Product Color Option Card -->
                <div class="card mb-3" id="productColorCard" style="display: none;">
                    <div class="card-body">
                        <h2 class="h4 mb-3">Product Color Option</h2>
                        <div id="colorFieldsContainer">
                            @foreach ($product->product_attribute as $attribute)
                                @if ($attribute->attribute_type == 'color')
                                    <div class="row color">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="product_color">Color</label>
                                                <input type="text" name="product_color[]" class="form-control"
                                                    value="{{ $attribute->attribute_value }}" placeholder="Color">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="color_price">Color Price</label>
                                                <input type="text" name="color_price[]" class="form-control"
                                                    value="{{ $attribute->attribute_price }}" placeholder="Color Price">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @if ($product->product_attribute->where('attribute_type', 'color')->isEmpty())
                                <div class="row color">
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="product_color">Color</label>
                                            <input type="text" name="product_color[]" class="form-control"
                                                placeholder="Color">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="color_price">Color Price</label>
                                            <input type="text" name="color_price[]" class="form-control"
                                                placeholder="Color Price">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                    </div>
                                </div>
                            @endif

                        </div>
                        <button type="button" id="addColorFieldsBtn" class="btn btn-success">Add More</button>
                    </div>
                </div>
                {{-- Color END --}}

                <!-- Product Print Side Option Card (Initially Hidden) -->
                <div class="card mb-3" id="productPrintSideCard" style="display: none;">
                    <div class="card-body">
                        <h2 class="h4 mb-3">Product Print Side Option</h2>
                        <div id="sideFieldsContainer">
                            @foreach ($product->product_attribute as $attribute)
                                @if ($attribute->attribute_type == 'print_side')
                                    <div class="row side">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="product_print_side">Print Side</label>
                                                <input type="text" name="product_print_side[]" class="form-control"
                                                    placeholder="Print Side" value="{{ $attribute->attribute_value }}">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="print_side_price">Print Side Price</label>
                                                <input type="text" name="print_side_price[]" class="form-control"
                                                    placeholder="Print Side Price"
                                                    value="{{ $attribute->attribute_price }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @if ($product->product_attribute->where('attribute_type', 'print_side')->isEmpty())
                                <div class="row side">
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="product_print_side">Print Side</label>
                                            <input type="text" name="product_print_side[]" class="form-control"
                                                placeholder="Print Side">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="print_side_price">Print Side Price</label>
                                            <input type="text" name="print_side_price[]" class="form-control"
                                                placeholder="Print Side Price">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <button type="button" id="addPrintSideBtn" class="btn btn-success">Add More</button>
                    </div>
                </div>

                <!-- Product Finishing Option Card (Initially Hidden) -->
                <div class="card mb-3" id="productFinishingCard" style="display: none;">
                    <div class="card-body">
                        <h2 class="h4 mb-3">Product Finishing Option</h2>
                        <div id="finishingFieldsContainer">
                            @foreach ($product->product_attribute as $attribute)
                                @if ($attribute->attribute_type == 'finishing')
                                    <div class="row finishing">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="product_finishing">Finishing</label>
                                                <input type="text" name="product_finishing[]" class="form-control"
                                                    placeholder="Finishing" value="{{ $attribute->attribute_value }}">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="finishing_price">Finishing Price</label>
                                                <input type="text" name="finishing_price[]" class="form-control"
                                                    placeholder="Finishing Price"
                                                    value="{{ $attribute->attribute_price }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger removeBtn mt-4">Remove</button>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @if ($product->product_attribute->where('attribute_type', 'finishing')->isEmpty())
                                <div class="row finishing">
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="product_finishing">Finishing</label>
                                            <input type="text" name="product_finishing[]" class="form-control"
                                                placeholder="Finishing">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="finishing_price">Finishing Price</label>
                                            <input type="text" name="finishing_price[]" class="form-control"
                                                placeholder="Finishing Price">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                    </div>
                                </div>
                            @endif

                        </div>
                        <button type="button" id="addFinishingBtn" class="btn btn-success">Add More</button>
                    </div>
                </div>

                <!-- Product Thickness Option Card (Initially Hidden) -->
                <div class="card mb-3" id="productThicknessCard" style="display: none;">
                    <div class="card-body">
                        <h2 class="h4 mb-3">Product Thickness Option</h2>
                        <div id="thicknessFieldsContainer">
                            @foreach ($product->product_attribute as $attribute)
                                @if ($attribute->attribute_type == 'thickness')
                                    <div class="row thickness">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="product_thickness">Thickness</label>
                                                <input type="text" name="product_thickness[]" class="form-control"
                                                    placeholder="Thickness" value="{{ $attribute->attribute_value }}">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="thickness_price">Thickness Price</label>
                                                <input type="text" name="thickness_price[]" class="form-control"
                                                    placeholder="Thickness Price"
                                                    value="{{ $attribute->attribute_price }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @if ($product->product_attribute->where('attribute_type', 'thickness')->isEmpty())
                                <div class="row thickness">
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="product_thickness">Thickness</label>
                                            <input type="text" name="product_thickness[]" class="form-control"
                                                placeholder="Thickness">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="thickness_price">Thickness Price</label>
                                            <input type="text" name="thickness_price[]" class="form-control"
                                                placeholder="Thickness Price">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <button type="button" id="addThicknessBtn" class="btn btn-success">Add More</button>
                    </div>
                </div>

                <!-- Wire Stakes QTY Option Card (Initially Hidden) -->
                <div class="card mb-3" id="productWireStakesQtyCard" style="display: none;">
                    <div class="card-body">
                        <h2 class="h4 mb-3">Product Wire Stakes QTY Option</h2>
                        <div id="wirestakesqtyFieldsContainer">
                            @foreach ($product->product_attribute as $attribute)
                                @if ($attribute->attribute_type == 'wirestakesqty')
                                    <div class="row wirestakesqty">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="product_wirestakesqty">Wire Stakes Qty</label>
                                                <input type="text" name="product_wirestakesqty[]" class="form-control"
                                                    placeholder="WireStakesQty"
                                                    value="{{ $attribute->attribute_value }}">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="wirestakesqty_price">Wire Stakes Qty Price</label>
                                                <input type="text" name="wirestakesqty_price[]" class="form-control"
                                                    placeholder="WireStakesQty Price"
                                                    value="{{ $attribute->attribute_price }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @if ($product->product_attribute->where('attribute_type', 'wirestakesqty')->isEmpty())
                                <div class="row wirestakesqty">
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="product_wirestakesqty">Wire Stakes Qty</label>
                                            <input type="text" name="product_wirestakesqty[]" class="form-control"
                                                placeholder="WireStakesQty">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="wirestakesqty_price">Wire Stakes Qty Price</label>
                                            <input type="text" name="wirestakesqty_price[]" class="form-control"
                                                placeholder="WireStakesQty Price">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <button type="button" id="addWireStakesQtyBtn" class="btn btn-success">Add More</button>
                    </div>
                </div>

                <!-- Product Frame Size Option Card (Initially Hidden) -->
                <div class="card mb-3" id="productFrameSizeCard" style="display: none;">
                    <div class="card-body">
                        <h2 class="h4 mb-3">Product Frame Size Option</h2>
                        <div id="framesizeFieldsContainer">
                            @foreach ($product->product_attribute as $attribute)
                                @if ($attribute->attribute_type == 'framesize')
                                    <div class="row framesize">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="product_framesize">Frame Size</label>
                                                <input type="text" name="product_framesize[]" class="form-control"
                                                    placeholder="FrameSize" value="{{ $attribute->attribute_value }}">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="framesize_price">Frame Size Price</label>
                                                <input type="text" name="framesize_price[]" class="form-control"
                                                    placeholder="Frame Size Price"
                                                    value="{{ $attribute->attribute_price }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @if ($product->product_attribute->where('attribute_type', 'framesize')->isEmpty())
                                <div class="row framesize">
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="product_framesize">Frame Size</label>
                                            <input type="text" name="product_framesize[]" class="form-control"
                                                placeholder="FrameSize">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="framesize_price">Frame Size Price</label>
                                            <input type="text" name="framesize_price[]" class="form-control"
                                                placeholder="Frame Size Price">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <button type="button" id="addFrameSizeBtn" class="btn btn-success">Add More</button>
                    </div>
                </div>
                <!-- Product displaytyp Option Card (Initially Hidden) -->
                <div class="card mb-3" id="productDisplayTypeCard" style="display: none;">
                    <div class="card-body">
                        <h2 class="h4 mb-3">Product Display Type Option</h2>
                        <div id="displaytypeFieldsContainer">
                            @foreach ($product->product_attribute as $attribute)
                                @if ($attribute->attribute_type == 'displaytype')
                                    <div class="row displaytype">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="product_displaytype">Display Type</label>
                                                <input type="text" name="product_displaytype[]" class="form-control"
                                                    placeholder="Display Type" value="{{ $attribute->attribute_value }}">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="displaytype_price">Display Type Price</label>
                                                <input type="text" name="displaytype_price[]" class="form-control"
                                                    placeholder="Display Type Price"
                                                    value="{{ $attribute->attribute_price }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @if ($product->product_attribute->where('attribute_type', 'displaytype')->isEmpty())
                                <div class="row displaytype">
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="product_displaytype">Display Type</label>
                                            <input type="text" name="product_displaytype[]" class="form-control"
                                                placeholder="Display Type">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="displaytype_price">Display Type Price</label>
                                            <input type="text" name="displaytype_price[]" class="form-control"
                                                placeholder="Display Type Price">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <button type="button" id="addDisplayTypeBtn" class="btn btn-success">Add More</button>
                    </div>
                </div>

                <!-- Product Installation Option Card (Initially Hidden) -->
                <div class="card mb-3" id="productInstallationCard" style="display: none;">
                    <div class="card-body">
                        <h2 class="h4 mb-3">Product Installation Option</h2>
                        <div id="installationFieldsContainer">
                            @foreach ($product->product_attribute as $attribute)
                                @if ($attribute->attribute_type == 'installation')
                                    <div class="row installation">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="product_installation">Installation</label>
                                                <input type="text" name="product_installation[]" class="form-control"
                                                    placeholder="Installation" value="{{ $attribute->attribute_value }}">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="installation_price">Installation Price</label>
                                                <input type="text" name="installation_price[]" class="form-control"
                                                    placeholder="Installation Price"
                                                    value="{{ $attribute->attribute_price }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @if ($product->product_attribute->where('attribute_type', 'finishing')->isEmpty())
                                <div class="row installation">
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="product_installation">Installation</label>
                                            <input type="text" name="product_installation[]" class="form-control"
                                                placeholder="Installation">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="installation_price">Installation Price</label>
                                            <input type="text" name="installation_price[]" class="form-control"
                                                placeholder="Installation Price">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <button type="button" id="addInstallationBtn" class="btn btn-success">Add More</button>
                    </div>
                </div>

                <!-- Product Material Option Card (Initially Hidden) -->
                <div class="card mb-3" id="productMaterialCard" style="display: none;">
                    <div class="card-body">
                        <h2 class="h4 mb-3">Product Material Option</h2>
                        <div id="materialFieldsContainer">
                            @foreach ($product->product_attribute as $attribute)
                                @if ($attribute->attribute_type == 'material')
                                    <div class="row material">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="product_material">Material</label>
                                                <input type="text" name="product_material[]" class="form-control"
                                                    placeholder="Material" value="{{ $attribute->attribute_value }}">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="material_price">Material Price</label>
                                                <input type="text" name="material_price[]" class="form-control"
                                                    placeholder="Material Price"
                                                    value="{{ $attribute->attribute_price }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @if ($product->product_attribute->where('attribute_type', 'material')->isEmpty())
                                <div class="row material">
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="product_material">Material</label>
                                            <input type="text" name="product_material[]" class="form-control"
                                                placeholder="Material">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="material_price">Material Price</label>
                                            <input type="text" name="material_price[]" class="form-control"
                                                placeholder="Material Price">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <button type="button" id="addMaterialBtn" class="btn btn-success">Add More</button>
                    </div>
                </div>

                <!-- Product Corners Option Card (Initially Hidden) -->
                <div class="card mb-3" id="productCornersCard" style="display: none;">
                    <div class="card-body">
                        <h2 class="h4 mb-3">Product Corners Option</h2>
                        <div id="cornersFieldsContainer">
                            @foreach ($product->product_attribute as $attribute)
                                @if ($attribute->attribute_type == 'corners')
                                    <div class="row corners">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="product_corners">Corners</label>
                                                <input type="text" name="product_corners[]" class="form-control"
                                                    placeholder="Corners" value="{{ $attribute->attribute_value }}">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="corners_price">Corners Price</label>
                                                <input type="text" name="corners_price[]" class="form-control"
                                                    placeholder="Corners Price"
                                                    value="{{ $attribute->attribute_price }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @if ($product->product_attribute->where('attribute_type', 'corners')->isEmpty())
                                <div class="row corners">
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="product_corners">Corners</label>
                                            <input type="text" name="product_corners[]" class="form-control"
                                                placeholder="Corners">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="corners_price">Corners Price</label>
                                            <input type="text" name="corners_price[]" class="form-control"
                                                placeholder="Corners Price">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <button type="button" id="addCornersBtn" class="btn btn-success">Add More</button>
                    </div>
                </div>

                <!-- Product Application Option Card (Initially Hidden) -->
                <div class="card mb-3" id="productApplicationCard" style="display: none;">
                    <div class="card-body">
                        <h2 class="h4 mb-3">Product Application Option</h2>
                        <div id="applicationFieldsContainer">
                            @foreach ($product->product_attribute as $attribute)
                                @if ($attribute->attribute_type == 'application')
                                    <div class="row application">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="product_application">Application</label>
                                                <input type="text" name="product_application[]"
                                                    class="form-control" placeholder="Application"
                                                    value="{{ $attribute->attribute_value }}">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="application_price">Application Price</label>
                                                <input type="text" name="application_price[]" class="form-control"
                                                    placeholder="Application Price"
                                                    value="{{ $attribute->attribute_price }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @if ($product->product_attribute->where('attribute_type', 'application')->isEmpty())
                                <div class="row application">
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="product_application">Application</label>
                                            <input type="text" name="product_application[]" class="form-control"
                                                placeholder="Application">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="application_price">Application Price</label>
                                            <input type="text" name="application_price[]" class="form-control"
                                                placeholder="Application Price">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <button type="button" id="addApplicationBtn" class="btn btn-success">Add
                            More</button>
                    </div>
                </div>

                <!-- Product Paper Thickness Option Card (Initially Hidden) -->
                <div class="card mb-3" id="productPaperThicknessCard" style="display: none;">
                    <div class="card-body">
                        <h2 class="h4 mb-3">Product Paper Thickness Option</h2>
                        <div id="paperthicknessFieldsContainer">
                            @foreach ($product->product_attribute as $attribute)
                                @if ($attribute->attribute_type == 'paperthickness')
                                    <div class="row paperthickness">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="product_paperthickness">Paper Thickness</label>
                                                <input type="text" name="product_paperthickness[]"
                                                    class="form-control" placeholder="PaperThickness"
                                                    value="{{ $attribute->attribute_value }}">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="paperthickness_price">Paper Thickness Price</label>
                                                <input type="text" name="paperthickness_price[]"
                                                    class="form-control" placeholder="Paper Thickness Price"
                                                    value="{{ $attribute->attribute_price }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @if ($product->product_attribute->where('attribute_type', 'paperthickness')->isEmpty())
                                <div class="row paperthickness">
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="product_paperthickness">Paper Thickness</label>
                                            <input type="text" name="product_paperthickness[]" class="form-control"
                                                placeholder="PaperThickness">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="paperthickness_price">Paper Thickness Price</label>
                                            <input type="text" name="paperthickness_price[]" class="form-control"
                                                placeholder="Paper Thickness Price">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <button type="button" id="addPaperThicknessBtn" class="btn btn-success">Add
                            More</button>
                    </div>
                </div>
                <!-- Product QTY Option Card (Initially Hidden) -->
                <div class="card mb-3" id="productQtyCard" style="display: none;">
                    <div class="card-body">
                        <h2 class="h4 mb-3">Qty Option</h2>
                        <div id="qtyFieldsContainer">
                            @foreach ($product->product_attribute as $attribute)
                                @if ($attribute->attribute_type == 'qty')
                                    <div class="row qty">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="product_qty">Qty</label>
                                                <input type="text" name="product_qty[]" class="form-control"
                                                    placeholder="Qty" value="{{ $attribute->attribute_value }}">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="qty_price">Qty Price</label>
                                                <input type="text" name="qty_price[]" class="form-control"
                                                    placeholder="Qty Price" value="{{ $attribute->attribute_price }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @if ($product->product_attribute->where('attribute_type', 'qty')->isEmpty())
                                <div class="row qty">
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="product_qty">Qty</label>
                                            <input type="text" name="product_qty[]" class="form-control"
                                                placeholder="Qty">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="qty_price">Qty Price</label>
                                            <input type="text" name="qty_price[]" class="form-control"
                                                placeholder="Qty Price">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <button type="button" id="addqtyBtn" class="btn btn-success">Add More</button>
                    </div>
                </div>

                <!-- Product Pages in Book Option Card (Initially Hidden) -->
                <div class="card mb-3" id="productPagesinBookCard" style="display: none;">
                    <div class="card-body">
                        <h2 class="h4 mb-3">Product Pages in Book Option</h2>
                        <div id="pagesinbookFieldsContainer">
                            @foreach ($product->product_attribute as $attribute)
                                @if ($attribute->attribute_type == 'pagesinbook')
                                    <div class="row pagesinbook">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="product_pagesinbook">Pages in Book</label>
                                                <input type="text" name="product_pagesinbook[]"
                                                    class="form-control" placeholder="Pages in Book"
                                                    value="{{ $attribute->attribute_value }}">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="pagesinbook_price">Pages in Book Price</label>
                                                <input type="text" name="pagesinbook_price[]" class="form-control"
                                                    placeholder="Pages in Book Price"
                                                    value="{{ $attribute->attribute_price }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @if ($product->product_attribute->where('attribute_type', 'pagesinbook')->isEmpty())
                                <div class="row pagesinbook">
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="product_pagesinbook">Pages in Book</label>
                                            <input type="text" name="product_pagesinbook[]" class="form-control"
                                                placeholder="Pages in Book">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="pagesinbook_price">Pages in Book Price</label>
                                            <input type="text" name="pagesinbook_price[]" class="form-control"
                                                placeholder="Pages in Book Price">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <button type="button" id="addPagesinBookBtn" class="btn btn-success">Add
                            More</button>
                    </div>
                </div>
                <!-- Product productCopiesRequiredCard Option Card (Initially Hidden) -->
                <div class="card mb-3" id="productCopiesRequiredCard" style="display: none;">
                    <div class="card-body">
                        <h2 class="h4 mb-3">Product Copies Required Option</h2>
                        <div id="copiesrequiredFieldsContainer">
                            @foreach ($product->product_attribute as $attribute)
                                @if ($attribute->attribute_type == 'copiesrequired')
                                    <div class="row copiesrequired">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="product_copiesrequired">Copies Required</label>
                                                <input type="text" name="product_copiesrequired[]"
                                                    class="form-control" placeholder="Copies"
                                                    value="{{ $attribute->attribute_value }}">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="copiesrequired_price">Copies Required Price</label>
                                                <input type="text" name="copiesrequired_price[]"
                                                    class="form-control" placeholder="Copies Required Price"
                                                    value="{{ $attribute->attribute_price }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @if ($product->product_attribute->where('attribute_type', 'copiesrequired')->isEmpty())
                                <div class="row copiesrequired">
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="product_copiesrequired">Copies Required</label>
                                            <input type="text" name="product_copiesrequired[]" class="form-control"
                                                placeholder="Copies">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="copiesrequired_price">Copies Required Price</label>
                                            <input type="text" name="copiesrequired_price[]" class="form-control"
                                                placeholder="Copies Required Price">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <button type="button" id="addCopiesRequiredBtn" class="btn btn-success">Add
                            More</button>
                    </div>
                </div>

                <!-- Product Pages in Notepad Option Card (Initially Hidden) -->
                <div class="card mb-3" id="productPagesinNotepadCard" style="display: none;">
                    <div class="card-body">
                        <h2 class="h4 mb-3">Product Pages in Notepad Option</h2>
                        <div id="pagesinnotepadFieldsContainer">
                            @foreach ($product->product_attribute as $attribute)
                                @if ($attribute->attribute_type == 'pagesinnotepad')
                                    <div class="row pagesinnotepad">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="product_pagesinnotepad">Thickness</label>
                                                <input type="text" name="product_pagesinnotepad[]"
                                                    class="form-control" placeholder="Pages in Notepad"
                                                    value="{{ $attribute->attribute_value }}">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="pagesinnotepad_price">Pages in Notepad Price</label>
                                                <input type="text" name="pagesinnotepad_price[]"
                                                    class="form-control" placeholder="Pages in Notepad Price"
                                                    value="{{ $attribute->attribute_price }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @if ($product->product_attribute->where('attribute_type', 'pagesinnotepad')->isEmpty())
                                <div class="row pagesinnotepad">
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="product_pagesinnotepad">Thickness</label>
                                            <input type="text" name="product_pagesinnotepad[]" class="form-control"
                                                placeholder="Pages in Notepad">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="pagesinnotepad_price">Pages in Notepad Price</label>
                                            <input type="text" name="pagesinnotepad_price[]" class="form-control"
                                                placeholder="Pages in Notepad Price">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <button type="button" id="addPagesinNotepadBtn" class="btn btn-success">Add
                            More</button>
                    </div>
                </div>

                <!-- Product Cutting Option Card (Initially Hidden) -->
                @php
                    $trimToSizeOptions = $cutting_options->where('cutting_type', 'trimtosize')->values();
                    $customShapeOptions = $cutting_options->where('cutting_type', 'customesize')->values();
                @endphp

                <div class="card shadow-sm border-0 mb-4" id="productcuttingCard" style="display: none;">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fas fa-cut me-2"></i> Cutting Options</h5>
                    </div>

                    <div class="card-body">
                        <div class="row gy-4">
                            <!-- Trim to Size Section -->
                            <div class="col-md-6">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="trimtosizeption"
                                        name="cuttingOption[]" value="trimtosize"
                                        {{ $trimToSizeOptions->isNotEmpty() ? 'checked' : '' }}>
                                    <label class="form-check-label fw-bold" for="trimtosizeption">
                                        <i class="fas fa-ruler-combined me-1"></i> Trim to Size
                                    </label>
                                </div>

                                <div id="trimToSizeFieldsContainer" class="bg-light p-3 rounded border"
                                    style="{{ $trimToSizeOptions->isNotEmpty() ? '' : 'display: none;' }}">
                                    @foreach ($trimToSizeOptions as $index => $option)
                                        <div class="row trimtosize-price-fields g-2 align-items-end mb-2">
                                            <div class="col-md-4">
                                                <label class="form-label">Min Qty</label>
                                                <input type="number"
                                                    name="cutting[trimtosize][{{ $index }}][min_qty]"
                                                    value="{{ $option->min_qty }}" class="form-control"
                                                    step="0.01" min="0">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Max Qty</label>
                                                <input type="number"
                                                    name="cutting[trimtosize][{{ $index }}][max_qty]"
                                                    value="{{ $option->max_qty }}" class="form-control"
                                                    step="0.01" min="0">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Price</label>
                                                <input type="number"
                                                    name="cutting[trimtosize][{{ $index }}][price]"
                                                    value="{{ $option->price }}" class="form-control" step="0.01"
                                                    min="0">
                                            </div>
                                            <div class="col-12 text-end mt-2">
                                                <button type="button"
                                                    class="btn btn-outline-danger btn-sm remove-trimtosize"
                                                    style="{{ $index === 0 ? 'display: none;' : '' }}">
                                                    <i class="fas fa-minus-circle"></i> Remove
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="mt-3 text-end">
                                        <button type="button" class="btn btn-outline-primary addTrimToSizeBtn btn-sm">
                                            <i class="fas fa-plus-circle"></i> Add More
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Custom Shape Section -->
                            <div class="col-md-6">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="customeshapeOption"
                                        name="cuttingOption[]" value="customesize"
                                        {{ $customShapeOptions->isNotEmpty() ? 'checked' : '' }}>
                                    <label class="form-check-label fw-bold" for="customeshapeOption">
                                        <i class="fas fa-shapes me-1"></i> Custom Shape
                                    </label>
                                </div>

                                <div id="customeshapeFieldsContainer" class="bg-light p-3 rounded border"
                                    style="{{ $customShapeOptions->isNotEmpty() ? '' : 'display: none;' }}">
                                    @foreach ($customShapeOptions as $index => $option)
                                        <div class="row customeshape-price-fields g-2 align-items-end mb-2">
                                            <div class="col-md-4">
                                                <label class="form-label">Min Qty</label>
                                                <input type="number"
                                                    name="cutting[customesize][{{ $index }}][min_qty]"
                                                    value="{{ $option->min_qty }}" class="form-control"
                                                    step="0.01" min="0">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Max Qty</label>
                                                <input type="number"
                                                    name="cutting[customesize][{{ $index }}][max_qty]"
                                                    value="{{ $option->max_qty }}" class="form-control"
                                                    step="0.01" min="0">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Price</label>
                                                <input type="number"
                                                    name="cutting[customesize][{{ $index }}][price]"
                                                    value="{{ $option->price }}" class="form-control" step="0.01"
                                                    min="0">
                                            </div>
                                            <div class="col-12 text-end mt-2">
                                                <button type="button"
                                                    class="btn btn-outline-danger btn-sm remove-customeshape"
                                                    style="{{ $index === 0 ? 'display: none;' : '' }}">
                                                    <i class="fas fa-minus-circle"></i> Remove
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="mt-3 text-end">
                                        <button type="button" class="btn btn-outline-primary btn-sm add-more-custome">
                                            <i class="fas fa-plus-circle"></i> Add More
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                {{-- Product FAQ --}}
                <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="h4 mb-3">Product FAQs</h2>
                        <div id="faqsContainer">
                            @php
                                $questions = explode('~', $product->product_question);
                                $answers = explode('~', $product->product_answer);
                            @endphp
                            @foreach ($questions as $key => $question)
                                <div class="row faqsContainer">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="question">Question</label>
                                            <textarea name="product_question[]" placeholder="Question" class="summernote" rows="3">{{ old('product_question', $question) }}</textarea>
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="answer">Answer</label>
                                            <textarea name="product_answer[]" placeholder="Answer" class="summernote" rows="3">{{ old('product_answer', $answers[$key] ?? '') }}</textarea>
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button type="button" class="btn btn-danger removeBtn"
                                            style="display:none;">Remove</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" id="addFaqsBtn" class="btn btn-success">Add More FAQs</button>
                    </div>
                </div>
                {{-- Related Products --}}
                <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="h4 mb-3">Related Products</h2>
                        <div class="mb-3">
                            <select multiple class="related_products w-100" name="related_products[]"
                                id="related_products">
                                @if (!empty($relatedProducts))
                                    @foreach ($relatedProducts as $relatedProduct)
                                        <option selected value="{{ $relatedProduct->id }}">
                                            {{ $relatedProduct->product_name }}</option>
                                    @endforeach
                                @endif
                            </select>

                        </div>
                    </div>
                </div>
        </div>
        {{-- Right Side Bar --}}
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h2 class="h4 mb-3">Product status</h2>
                    <div class="mb-3">
                        <select name="product_status" id="product_status" class="form-control">
                            <option {{ $product->product_status == 'inactive' ? 'selected' : '' }} value="inactive">
                                Block</option>
                            <option {{ $product->product_status == 'active' ? 'selected' : '' }} value="active">Active
                            </option>
                        </select>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    <h2 class="h4  mb-3">Product category</h2>
                    <div class="mb-3">
                        <label for="category_id">Category Name</label>
                        <select name="category_id" id="category_id" class="form-control">
                            @if ($categories->isNotEmpty())
                                @foreach ($categories as $item)
                                    <option {{ $product->category_id == $item->id ? 'selected' : '' }}
                                        value="{{ $item->id }}">{{ $item->cat_name }}</option>
                                @endforeach
                            @else
                                <option value="">No categories found</option>
                            @endif
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="subcategory_id">Sub Category Name</label>
                        <select name="subcategory_id" id="subcategory_id" class="form-control">
                            <option value="">Select Sub Category</option>
                            @if ($subcategories->isNotEmpty())
                                @foreach ($subcategories as $item)
                                    <option {{ $product->subcategory_id == $item->id ? 'selected' : '' }}
                                        value="{{ $item->id }}">{{ $item->cat_sub_name }}</option>
                                @endforeach
                            @else
                                <option value="">No subcategories found</option>
                            @endif
                        </select>
                    </div>
                </div>
            </div>


            <div class="card mb-3">
                <div class="card-body">
                    <h2 class="h4 mb-3">Most Popular product</h2>
                    <div class="mb-3">
                        <select name="product_feature" id="product_feature" class="form-control">
                            <option {{ $product->product_feature == '1' ? 'selected' : '' }} value="1">
                                Active</option>
                            <option {{ $product->product_feature == '0' ? 'selected' : '' }} value="0">
                                Block</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h2 class="h4 mb-3">Custom Size Allow</h2>
                    <div class="mb-3">
                        <select name="product_allows_custom_size" id="product_allows_custom_size"
                            class="form-control">
                            <option {{ $product->product_allows_custom_size == '1' ? 'selected' : '' }} value="1">
                                Allow</option>
                            <option {{ $product->product_allows_custom_size == '0' ? 'selected' : '' }} value="0">
                                Not Allow</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h2 class="h4 mb-3">Upload Guidelines</h2>

                    <label for="guidlines">Upload PDF Guidelines</label>
                    <div class="mb-3">
                        <input type="file" name="guidlines[]" id="guidlines" class="form-control"
                            accept="application/pdf">

                    </div>

                    @if (!empty($product->guidlines))
                        @php
                            $guidlines = explode('|', $product->guidlines);
                        @endphp

                        <div class="mt-3">
                            <h5>Existing Uploaded Guidelines:</h5>
                            @foreach ($guidlines as $value)
                                @if (!empty($value))
                                    <div class="mb-2">
                                        <a href="{{ $value }}" target="_blank" class="text-primary">
                                            <i class="fa fa-file-pdf"></i> {{ $value }}
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

        </div>
        {{-- Right Side Bar End --}}
        </div>


        <div class="pb-5 pt-3">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('products.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
        </div>
        </form>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
    <!-- /.content-wrapper -->

@endsection

@section('customjs')
    {{-- Product Price --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const priceOptions = document.querySelectorAll('input[name="priceOption"]');
            const rollMediaContainer = document.getElementById('rollMediaContainer');
            const fixedContainer = document.getElementById('fixedContainer');
            const rigidMediaContainer = document.getElementById('rigidMediaContainer');

            const addRollMediaFieldsBtn = document.getElementById('addRollMediaFieldsBtn');
            const addFixedFieldsBtn = document.getElementById('addFixedFieldsBtn');
            const toggleProductPriceBtn = document.getElementById('toggleProductPriceBtn');
            const productPriceCard = document.getElementById('productPriceCard');
            // Handle price option selection
            priceOptions.forEach(option => {
                option.addEventListener('change', function() {
                    toggleContainers(option.value);
                    disableOtherOptions(option.value); // Disable other price options
                });
                if (option.checked) option.dispatchEvent(new Event('change'));
            });

            function toggleContainers(selectedOption) {
                [rollMediaContainer, fixedContainer, rigidMediaContainer].forEach(container => container.classList
                    .add('hidden'));
                [addRollMediaFieldsBtn, addFixedFieldsBtn].forEach(btn => btn.style.display = 'none');

                if (selectedOption === 'rollMedia') {
                    rollMediaContainer.classList.remove('hidden');
                    addRollMediaFieldsBtn.style.display = 'block';
                }
                if (selectedOption === 'fixed') {
                    fixedContainer.classList.remove('hidden');
                    addFixedFieldsBtn.style.display = 'block';
                }
                if (selectedOption === 'rigidMedia') {
                    rigidMediaContainer.classList.remove('hidden');
                }

            }

            // Function to disable other options when one is selected
            function disableOtherOptions(selectedOption) {
                priceOptions.forEach(opt => {
                    if (opt.value !== selectedOption) {
                        opt.disabled = true; // Disable the unselected options
                    } else {
                        opt.disabled = false; // Enable the selected option
                    }
                });
            }

            // Roll and Fixed Media Field Additions
            addRollMediaFieldsBtn.addEventListener('click', addRollMediaFields);


            function addRollMediaFields() {
                const newFieldSet = createFieldSet('rollMediaFieldSet', [{
                        label: 'Min Range',
                        name: 'min_range[]',
                        type: 'number',
                        placeholder: 'Min Range'
                    },
                    {
                        label: 'Max Range',
                        name: 'max_range[]',
                        type: 'number',
                        placeholder: 'Max Range'
                    },
                    {
                        label: 'Price',
                        name: 'roll_price[]',
                        type: 'number',
                        placeholder: 'Price'
                    }
                ]);
                rollMediaContainer.appendChild(newFieldSet);
                updateRemoveButtons();
            }


            function createFieldSet(className, fields) {
                const newFieldSet = document.createElement('div');
                newFieldSet.classList.add(className, 'row', 'mb-3');
                fields.forEach(field => {
                    newFieldSet.innerHTML += `
                        <div class="col-md-4">
                            <label>${field.label}</label>
                            <input type="${field.type}" name="${field.name}" class="form-control" placeholder="${field.placeholder}" min="0" step="${field.type === 'number' ? '0.01' : '1'}">
                        </div>
                    `;
                });
                newFieldSet.innerHTML += `
                    <div class="col-md-12">
                        <button type="button" class="btn btn-danger ${className === 'rollMediaFieldSet' ? 'removeBtn' : 'removeFixedBtn'}">Remove</button>
                    </div>
                `;
                return newFieldSet;
            }

            

            function updateRemoveButtons(container) {
                const priceFields = container.querySelectorAll('.price-fields-container');

                // Toggle the visibility of remove buttons
                priceFields.forEach((field, index) => {
                    const removeButton = field.querySelector('.remove-price-field');
                    removeButton.style.display = priceFields.length > 1 ? 'inline-block' : 'none';
                });
            }



            // Ensure remove buttons are correctly initialized on page load
            document.addEventListener('DOMContentLoaded', () => {
                document.querySelectorAll('.price-fields-container').forEach(container => {
                    const side = container.closest('[id]').id.replace('SideContainer', '');
                    updateRemoveButtons(document.getElementById(`${side}SideContainer`));
                });
            });



            // Remove Buttons Event Delegation
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('removeBtn')) e.target.closest('.rollMediaFieldSet')
                    .remove();
                if (e.target.classList.contains('removeFixedBtn')) e.target.closest('.fixedFieldSet')
                    .remove();
                if (e.target.classList.contains('remove-price-field')) e.target.closest(
                    '.price-fields-container').remove();
                updateRemoveButtons();
            });

            function updateRemoveButtons() {
                ['rollMediaFieldSet', 'fixedFieldSet'].forEach(setClass => {
                    const fieldSets = document.querySelectorAll(`.${setClass}`);
                    fieldSets.forEach(fieldSet => {
                        fieldSet.querySelector('.btn-danger').style.display = fieldSets.length > 1 ?
                            'block' : 'none';
                    });
                });
                ['single', 'double'].forEach(side => {
                    const containers = document.querySelectorAll(
                        `#${side}SideContainer .price-fields-container`);
                    containers.forEach(container => {
                        const removeBtn = container.querySelector('.remove-price-field');
                        removeBtn.style.display = containers.length > 1 ? 'block' : 'none';
                    });
                });
            }

            // Product Price Card Toggle
            toggleProductPriceBtn.addEventListener('click', function() {
                toggleProductPriceBtn.classList.toggle('active');
                toggleCardVisibility(productPriceCard, toggleProductPriceBtn);
            });

            function toggleCardVisibility(card, button) {
                card.style.display = card.querySelectorAll(".row").length > 0 && button.classList.contains(
                    "active") ? 'block' : 'none';
            }

            // Initialize Input Field Checks
            initializeInputFieldChecks('#productPriceCard input[type="number"]', '#toggleProductPriceBtn');

            function initializeInputFieldChecks(inputSelector, buttonSelector) {
                disableCheckButtonOnLoad(inputSelector, buttonSelector);
                document.querySelectorAll(inputSelector).forEach(input => {
                    input.addEventListener('input', function() {
                        const isEmpty = !Array.from(document.querySelectorAll(inputSelector)).some(
                            input => input.value.trim() !== '');
                        buttonSelector.classList.toggle("active", !isEmpty);
                        productPriceCard.style.display = isEmpty ? 'none' : 'block';
                    });
                });
            }

            function disableCheckButtonOnLoad(inputSelector, buttonSelector) {
                const isDataPresent = Array.from(document.querySelectorAll(inputSelector)).some(input => input.value
                    .trim() !== '0');
                buttonSelector.disabled = !isDataPresent;
                productPriceCard.style.display = isDataPresent ? 'block' : 'none';
            }
        });
    </script>
    {{-- Product Price END --}}

    {{-- For Gidgit Media --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Bind Add More button
    document.querySelectorAll('.add-more-price-field').forEach(button => {
        const side = button.getAttribute('data-side');
        button.addEventListener('click', () => addRigidMediaFields(side));
    });

    function addRigidMediaFields(side) {
        const container = document.getElementById(`${side}SideContainer`);
        const fieldsContainerId = `${side}PriceFieldsContainer`;

        let targetContainer = container.querySelector(`#${fieldsContainerId}`);
        
        // If not exists, create one
        if (!targetContainer) {
            targetContainer = document.createElement('div');
            targetContainer.id = fieldsContainerId;
            container.appendChild(targetContainer);
        }

        // Count existing `.price-fields` to determine correct index
        const existingFields = container.querySelectorAll('.price-fields');
        const index = existingFields.length;

        const newFieldSet = document.createElement('div');
        newFieldSet.classList.add('row', 'price-fields', 'mt-3');
        newFieldSet.innerHTML = `
            <div class="col-md-4">
                <input type="number" name="rigidMedia[${side}][${index}][min_range]" class="form-control" placeholder="Min Qty" step="0.01" min="0">
            </div>
            <div class="col-md-4">
                <input type="number" name="rigidMedia[${side}][${index}][max_range]" class="form-control" placeholder="Max Qty" step="0.01" min="0">
            </div>
            <div class="col-md-4">
                <input type="number" name="rigidMedia[${side}][${index}][price]" class="form-control" placeholder="Price" step="0.01" min="0">
            </div>
            <div class="col-md-12 text-end mt-2">
                <button type="button" class="btn btn-danger btn-sm remove-price-field">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        `;

        // Append
        targetContainer.appendChild(newFieldSet);

        // Bind remove logic
        newFieldSet.querySelector('.remove-price-field').addEventListener('click', () => {
            newFieldSet.remove();
            updateRemoveButtons(container);
        });

        updateRemoveButtons(container);
    }

    function updateRemoveButtons(container) {
        const removeButtons = container.querySelectorAll('.remove-price-field');
        removeButtons.forEach(btn => {
            btn.style.display = (removeButtons.length > 1) ? 'inline-block' : 'none';
        });
    }

    // Bind existing remove buttons
    document.querySelectorAll('.remove-price-field').forEach(button => {
        button.addEventListener('click', function () {
            const fieldSet = button.closest('.price-fields');
            if (fieldSet) {
                fieldSet.remove();
                updateRemoveButtons(button.closest(`#singleSideContainer, #doubleSideContainer`));
            }
        });
    });
});
</script>



    {{-- product size  --}}
    <script>
        $(document).ready(function() {
            // Check if there is existing data in the input fields on page load
            var isDataPresent = false;
            $('#productSizeCard input[type="number"]').each(function() {
                if ($(this).val().trim() !== '') {
                    isDataPresent = true;
                    return false; // Exit the loop if any field has a value
                }
            });

            // If data is present, activate the card and button
            if (isDataPresent) {
                $("#toggleProductSizeBtn").addClass("active").prop('disabled', false);
                $('#productSizeCard').show();
            }

            // Toggle button click event to show/hide card (updated logic)
            $("#toggleProductSizeBtn").click(function() {
                $(this).toggleClass("active");

                // Check if the card is visible, and toggle its visibility accordingly
                if ($(this).hasClass("active")) {
                    $('#productSizeCard').show();
                } else {
                    $('#productSizeCard').hide();
                }
            });

            // Function to update the visibility of remove buttons for any group
            function updateRemoveButtons(containerSelector, buttonSelector) {
                if ($(containerSelector).children().length === 1) {
                    $(containerSelector).find(buttonSelector).hide();
                } else {
                    $(containerSelector).find(buttonSelector).show();
                }
            }

            // Add new fields
            function addFields(buttonSelector, containerSelector, classSelector) {
                $(buttonSelector).click(function() {
                    var clone = $(classSelector).first().clone();
                    clone.find('input[type="number"]').val(""); // Clear the input values
                    $(containerSelector).append(clone);
                    updateRemoveButtons(containerSelector,
                        '.removeBtn'); // Update visibility of remove buttons
                    $("#toggleProductSizeBtn").addClass(
                        "active"); // Ensure button is active when a new field is added
                    $('#productSizeCard').show(); // Show the card when a new field is added
                });
            }

            // Remove fields
            function setupRemoveButtons(containerSelector) {
                $(containerSelector).on('click', '.removeBtn', function() {
                    var inputField = $(this).closest('.row').find('input[type="number"]');
                    if (inputField.val().trim() === '') {
                        $(this).closest('.row').remove();
                        updateRemoveButtons(containerSelector,
                            '.removeBtn'); // Update visibility of remove buttons
                    } else {
                        inputField.val(''); // Clear the input field value if it's not empty
                    }
                });
            }

            // Initialize functionality for adding/removing fields
            addFields('#addFieldsBtn', '#sizeFieldsContainer', '.size-fields');
            setupRemoveButtons('#sizeFieldsContainer');

            // Initialize disable check button functionality for input fields
            disableCheckButton('#productSizeCard input[type="number"]', '#toggleProductSizeBtn');

            // Listen for input changes to enable/disable the button and show/hide the data
            $('#productSizeCard input[type="number"]').on('input', function() {
                var isEmpty = true;
                $('#productSizeCard input[type="number"]').each(function() {
                    if ($(this).val().trim() !== '') {
                        isEmpty = false;
                        return false; // Exit the loop if any field has a value
                    }
                });
                if (isEmpty) {
                    $("#toggleProductSizeBtn").removeClass("active").prop('disabled', true);
                    $('#productSizeCard').hide();
                } else {
                    $("#toggleProductSizeBtn").addClass("active").prop('disabled', false);
                    $('#productSizeCard').show();
                }
            });
        });

        // Function to disable check button if input field has value
        function disableCheckButton(inputSelector, buttonSelector) {
            // Check input values on page load
            $(inputSelector).each(function() {
                if ($(this).val().trim() === '0') {
                    $(buttonSelector).prop('disabled', true);
                    $(this).closest('.card').hide(); // Hide the container if input value is '0'
                }
            });

            // Listen for input changes
            $(inputSelector).on('input', function() {
                if ($(this).val().trim() === '0') {
                    $(buttonSelector).prop('disabled', true);
                    $(this).closest('.card').hide(); // Hide the container if input value is '0'
                } else {
                    $(buttonSelector).prop('disabled', false);
                    $(this).closest('.card').show(); // Show the container if input value is not '0'
                }
            });
        }
    </script>
    {{-- product size END --}}

    {{-- // color product  --}}
    <script>
        $(document).ready(function() {

            // Check if there is existing data in the input fields on page load
            var isDataPresent = false;
            $('#productColorCard input[type="text"]').each(function() {
                if ($(this).val().trim() !== '') {
                    isDataPresent = true;
                    return false; // Exit the loop if any field has a value
                }
            });

            // If data is present, activate the card and button
            if (isDataPresent) {
                $("#toggleProductColorBtn").addClass("active").prop('disabled', false);
                $('#productColorCard').show();
            }

            $("#toggleProductColorBtn").click(function() {
                $(this).toggleClass("active");
                toggleCardVisibility($('#productColorCard'), $(this));
            });

            // Add Color Fields
            function addColorFields(buttonSelector, containerSelector, classSelector) {
                $(buttonSelector).click(function() {
                    var clone = $(classSelector).first().clone();
                    clone.find('input[type="text"]').val(""); // Clear the input values
                    $(containerSelector).append(clone);
                    updateRemoveButtons(containerSelector,
                        '.removeBtn'); // Update visibility of remove buttons
                    $("#toggleProductColorBtn").addClass(
                        "active"); // Ensure button is active when a new field is added
                    toggleCardVisibility($('#productColorCard'), $(
                        "#toggleProductColorBtn")); // Show the card when a new field is added
                });
            }

            // Function to update the visibility of remove buttons
            function updateRemoveButtons(containerSelector, buttonSelector) {
                if ($(containerSelector).children().length === 1) {
                    $(containerSelector).find(buttonSelector).hide();
                } else {
                    $(containerSelector).find(buttonSelector).show();
                }
            }

            // Remove Color Fields
            function setupRemoveButtons(containerSelector) {
                $(containerSelector).on('click', '.removeBtn', function() {
                    var inputField = $(this).closest('.row').find('input[type="text"]');
                    if (inputField.val().trim() === '') {
                        $(this).closest('.row').remove();
                        updateRemoveButtons(containerSelector,
                            '.removeBtn'); // Update visibility of remove buttons
                    } else {
                        inputField.val(''); // Clear the input field value if it's not empty
                    }
                });
            }

            // Initialize functionality for different fields
            addColorFields('#addColorFieldsBtn', '#colorFieldsContainer', '.color');

            setupRemoveButtons('#colorFieldsContainer');

            // Define a function to handle toggling card visibility and button active state
            function toggleCardVisibility(card, button) {
                if (card.find(".row").length > 0 && button.hasClass("active")) {
                    card.show();
                } else {
                    card.hide();
                }
            }

            // Listen for input changes to enable/disable the button and show/hide the data
            $('#productColorCard input[type="text"]').on('input', function() {
                var isEmpty = true;
                $('#productColorCard input[type="text"]').each(function() {
                    if ($(this).val().trim() !== '') {
                        isEmpty = false;
                        return false; // Exit the loop if any field has a value
                    }
                });
                if (isEmpty) {
                    $("#toggleProductColorBtn").removeClass("active").prop('disabled', true);
                    $('#productColorCard').hide();
                } else {
                    $("#toggleProductColorBtn").addClass("active").prop('disabled', false);
                    $('#productColorCard').show();
                }
            });



        });
    </script>
    {{-- // color product END  --}}

    {{-- Print Side size  --}}

    <script>
        $(document).ready(function() {
            // Check if there is existing data in the input fields on page load
            var isDataPresent = false;
            $('#productPrintSideCard input[type="text"]').each(function() {
                if ($(this).val().trim() !== '') {
                    isDataPresent = true;
                    return false; // Exit the loop if any field has a value
                }
            });

            // If data is present, activate the card and button
            if (isDataPresent) {
                $("#toggleProductPrintSideBtn").addClass("active").prop('disabled', false);
                $('#productPrintSideCard').show();
            }

            $("#toggleProductPrintSideBtn").click(function(event) {
                event.preventDefault(); // Prevent default button behavior
                $(this).toggleClass("active");
                toggleCardVisibility($('#productPrintSideCard'), $(this));
            });

            // Add Print Side Fields
            function addPrintSideFields(buttonSelector, containerSelector, classSelector) {
                $(buttonSelector).click(function(event) {
                    event.preventDefault(); // Prevent default button behavior
                    var clone = $(classSelector).first().clone();
                    clone.find('input[type="text"]').val(""); // Clear the input values
                    $(containerSelector).append(clone);
                    updateRemoveButtons(containerSelector,
                        '.removeBtn'); // Update visibility of remove buttons
                    $("#toggleProductPrintSideBtn").addClass(
                        "active"); // Ensure button is active when a new field is added
                    toggleCardVisibility($('#productPrintSideCard'), $(
                        "#toggleProductPrintSideBtn")); // Show the card when a new field is added
                });
            }

            // Function to update the visibility of remove buttons
            function updateRemoveButtons(containerSelector, buttonSelector) {
                if ($(containerSelector).children().length === 1) {
                    $(containerSelector).find(buttonSelector).hide();
                } else {
                    $(containerSelector).find(buttonSelector).show();
                }
            }

            // Remove Print Side Fields
            function setupRemoveButtons(containerSelector) {
                $(containerSelector).on('click', '.removeBtn', function(event) {
                    event.preventDefault(); // Prevent default button behavior
                    var inputField = $(this).closest('.row').find('input[type="text"]');
                    if (inputField.val().trim() === '') {
                        $(this).closest('.row').remove();
                        updateRemoveButtons(containerSelector,
                            '.removeBtn'); // Update visibility of remove buttons
                    } else {
                        inputField.val(''); // Clear the input field value if it's not empty
                    }
                });
            }

            // Initialize functionality for different fields
            addPrintSideFields('#addPrintSideBtn', '#sideFieldsContainer', '.side');

            setupRemoveButtons('#sideFieldsContainer');

            // Define a function to handle toggling card visibility and button active state
            function toggleCardVisibility(card, button) {
                if (card.find(".row").length > 0 && button.hasClass("active")) {
                    card.show();
                } else {
                    card.hide();
                }
            }

            // Listen for input changes to enable/disable the button and show/hide the data
            $('#productPrintSideCard input[type="text"]').on('input', function() {
                var isEmpty = true;
                $('#productPrintSideCard input[type="text"]').each(function() {
                    if ($(this).val().trim() !== '') {
                        isEmpty = false;
                        return false; // Exit the loop if any field has a value
                    }
                });
                if (isEmpty) {
                    $("#toggleProductPrintSideBtn").removeClass("active").prop('disabled', true);
                    $('#productPrintSideCard').hide();
                } else {
                    $("#toggleProductPrintSideBtn").addClass("active").prop('disabled', false);
                    $('#productPrintSideCard').show();
                }
            });
        });
    </script>
    {{-- Print Side size END  --}}


    {{-- finnishing  --}}
    <script>
        $(document).ready(function() {

            // Check if there is existing data in the input fields on page load
            var isDataPresent = false;
            $('#productFinishingCard input[type="text"]').each(function() {
                if ($(this).val().trim() !== '') {
                    isDataPresent = true;
                    return false; // Exit the loop if any field has a value
                }
            });

            // If data is present, activate the card and button
            if (isDataPresent) {
                $("#toggleFinishingBtn").addClass("active").prop('disabled', false);
                $('#productFinishingCard').show();
            }

            $("#toggleFinishingBtn").click(function() {
                $(this).toggleClass("active");
                toggleCardVisibility($('#productFinishingCard'), $(this));
            });

            // Add Finishing Fields
            function addFinishingFields(buttonSelector, containerSelector, classSelector) {
                $(buttonSelector).click(function() {
                    var clone = $(classSelector).first().clone();
                    clone.find('input[type="text"]').val(""); // Clear the input values
                    $(containerSelector).append(clone);
                    updateRemoveButtons(containerSelector,
                        '.removeBtn'); // Update visibility of remove buttons
                    $("#toggleFinishingBtn").addClass(
                        "active"); // Ensure button is active when a new field is added
                    toggleCardVisibility($('#productFinishingCard'), $(
                        "#toggleFinishingBtn")); // Show the card when a new field is added
                });
            }

            // Function to update the visibility of remove buttons
            function updateRemoveButtons(containerSelector, buttonSelector) {
                if ($(containerSelector).children().length === 1) {
                    $(containerSelector).find(buttonSelector).hide();
                } else {
                    $(containerSelector).find(buttonSelector).show();
                }
            }

            // Remove Finishing Fields
            function setupRemoveButtons(containerSelector) {
                $(containerSelector).on('click', '.removeBtn', function() {
                    var inputField = $(this).closest('.row').find('input[type="text"]');
                    if (inputField.val().trim() === '') {
                        $(this).closest('.row').remove();
                        updateRemoveButtons(containerSelector,
                            '.removeBtn'); // Update visibility of remove buttons
                    } else {
                        inputField.val(''); // Clear the input field value if it's not empty
                    }
                });
            }

            // Initialize functionality for different fields
            addFinishingFields('#addFinishingBtn', '#finishingFieldsContainer', '.finishing');

            setupRemoveButtons('#finishingFieldsContainer');

            // Define a function to handle toggling card visibility and button active state
            function toggleCardVisibility(card, button) {
                if (card.find(".row").length > 0 && button.hasClass("active")) {
                    card.show();
                } else {
                    card.hide();
                }
            }

            // Listen for input changes to enable/disable the button and show/hide the data
            $('#productFinishingCard input[type="text"]').on('input', function() {
                var isEmpty = true;
                $('#productFinishingCard input[type="text"]').each(function() {
                    if ($(this).val().trim() !== '') {
                        isEmpty = false;
                        return false; // Exit the loop if any field has a value
                    }
                });
                if (isEmpty) {
                    $("#toggleFinishingBtn").removeClass("active").prop('disabled', true);
                    $('#productFinishingCard').hide();
                } else {
                    $("#toggleFinishingBtn").addClass("active").prop('disabled', false);
                    $('#productFinishingCard').show();
                }
            });

        });
    </script>
    {{-- finnishing END  --}}

    {{-- thickness  --}}
    <script>
        $(document).ready(function() {

            // Check if there is existing data in the input fields on page load
            var isDataPresent = false;
            $('#productThicknessCard input[type="text"]').each(function() {
                if ($(this).val().trim() !== '') {
                    isDataPresent = true;
                    return false; // Exit the loop if any field has a value
                }
            });

            // If data is present, activate the card and button
            if (isDataPresent) {
                $("#toggleThicknessBtn").addClass("active").prop('disabled', false);
                $('#productThicknessCard').show();
            }

            $("#toggleThicknessBtn").click(function() {
                $(this).toggleClass("active");
                toggleCardVisibility($('#productThicknessCard'), $(this));
            });

            // Add Thickness Fields
            function addThicknessFields(buttonSelector, containerSelector, classSelector) {
                $(buttonSelector).click(function() {
                    var clone = $(classSelector).first().clone();
                    clone.find('input[type="text"]').val(""); // Clear the input values
                    $(containerSelector).append(clone);
                    updateRemoveButtons(containerSelector,
                        '.removeBtn'); // Update visibility of remove buttons
                    $("#toggleThicknessBtn").addClass(
                        "active"); // Ensure button is active when a new field is added
                    toggleCardVisibility($('#productThicknessCard'), $(
                        "#toggleThicknessBtn")); // Show the card when a new field is added
                });
            }

            // Function to update the visibility of remove buttons
            function updateRemoveButtons(containerSelector, buttonSelector) {
                if ($(containerSelector).children().length === 1) {
                    $(containerSelector).find(buttonSelector).hide();
                } else {
                    $(containerSelector).find(buttonSelector).show();
                }
            }

            // Remove Thickness Fields
            function setupRemoveButtons(containerSelector) {
                $(containerSelector).on('click', '.removeBtn', function() {
                    var inputField = $(this).closest('.row').find('input[type="text"]');
                    if (inputField.val().trim() === '') {
                        $(this).closest('.row').remove();
                        updateRemoveButtons(containerSelector,
                            '.removeBtn'); // Update visibility of remove buttons
                    } else {
                        inputField.val(''); // Clear the input field value if it's not empty
                    }
                });
            }

            // Initialize functionality for different fields
            addThicknessFields('#addThicknessBtn', '#thicknessFieldsContainer', '.thickness');

            setupRemoveButtons('#thicknessFieldsContainer');

            // Define a function to handle toggling card visibility and button active state
            function toggleCardVisibility(card, button) {
                if (card.find(".row").length > 0 && button.hasClass("active")) {
                    card.show();
                } else {
                    card.hide();
                }
            }

            // Listen for input changes to enable/disable the button and show/hide the data
            $('#productThicknessCard input[type="text"]').on('input', function() {
                var isEmpty = true;
                $('#productThicknessCard input[type="text"]').each(function() {
                    if ($(this).val().trim() !== '') {
                        isEmpty = false;
                        return false; // Exit the loop if any field has a value
                    }
                });
                if (isEmpty) {
                    $("#toggleThicknessBtn").removeClass("active").prop('disabled', true);
                    $('#productThicknessCard').hide();
                } else {
                    $("#toggleThicknessBtn").addClass("active").prop('disabled', false);
                    $('#productThicknessCard').show();
                }
            });

        });
    </script>
    {{-- thickness END  --}}

    {{-- Wire Stakes Qty --}}
    <script>
        $(document).ready(function() {

            // Check if there is existing data in the input fields on page load
            var isDataPresent = false;
            $('#productWireStakesQtyCard input[type="text"]').each(function() {
                if ($(this).val().trim() !== '') {
                    isDataPresent = true;
                    return false; // Exit the loop if any field has a value
                }
            });

            // If data is present, activate the card and button
            if (isDataPresent) {
                $("#toggleWireStakesQtyBtn").addClass("active").prop('disabled', false);
                $('#productWireStakesQtyCard').show();
            }

            $("#toggleWireStakesQtyBtn").click(function() {
                $(this).toggleClass("active");
                toggleCardVisibility($('#productWireStakesQtyCard'), $(this));
            });

            // Add Wire Stakes Qty Fields
            function addWireStakesQtyFields(buttonSelector, containerSelector, classSelector) {
                $(buttonSelector).click(function() {
                    var clone = $(classSelector).first().clone();
                    clone.find('input[type="text"]').val(""); // Clear the input values
                    $(containerSelector).append(clone);
                    updateRemoveButtons(containerSelector,
                        '.removeBtn'); // Update visibility of remove buttons
                    $("#toggleWireStakesQtyBtn").addClass(
                        "active"); // Ensure button is active when a new field is added
                    toggleCardVisibility($('#productWireStakesQtyCard'), $(
                        "#toggleWireStakesQtyBtn")); // Show the card when a new field is added
                });
            }

            // Function to update the visibility of remove buttons
            function updateRemoveButtons(containerSelector, buttonSelector) {
                if ($(containerSelector).children().length === 1) {
                    $(containerSelector).find(buttonSelector).hide();
                } else {
                    $(containerSelector).find(buttonSelector).show();
                }
            }

            // Remove Wire Stakes Qty Fields
            function setupRemoveButtons(containerSelector) {
                $(containerSelector).on('click', '.removeBtn', function() {
                    var inputField = $(this).closest('.row').find('input[type="text"]');
                    if (inputField.val().trim() === '') {
                        $(this).closest('.row').remove();
                        updateRemoveButtons(containerSelector,
                            '.removeBtn'); // Update visibility of remove buttons
                    } else {
                        inputField.val(''); // Clear the input field value if it's not empty
                    }
                });
            }

            // Initialize functionality for different fields
            addWireStakesQtyFields('#addWireStakesQtyBtn', '#wirestakesqtyFieldsContainer', '.wirestakesqty');

            setupRemoveButtons('#wirestakesqtyFieldsContainer');

            // Define a function to handle toggling card visibility and button active state
            function toggleCardVisibility(card, button) {
                if (card.find(".row").length > 0 && button.hasClass("active")) {
                    card.show();
                } else {
                    card.hide();
                }
            }

            // Listen for input changes to enable/disable the button and show/hide the data
            $('#productWireStakesQtyCard input[type="text"]').on('input', function() {
                var isEmpty = true;
                $('#productWireStakesQtyCard input[type="text"]').each(function() {
                    if ($(this).val().trim() !== '') {
                        isEmpty = false;
                        return false; // Exit the loop if any field has a value
                    }
                });
                if (isEmpty) {
                    $("#toggleWireStakesQtyBtn").removeClass("active").prop('disabled', true);
                    $('#productWireStakesQtyCard').hide();
                } else {
                    $("#toggleWireStakesQtyBtn").addClass("active").prop('disabled', false);
                    $('#productWireStakesQtyCard').show();
                }
            });

        });
    </script>
    {{-- Wire Stakes Qty END --}}

    {{-- Frame Size --}}
    <script>
        $(document).ready(function() {

            // Check if there is existing data in the input fields on page load
            var isDataPresent = false;
            $('#productFrameSizeCard input[type="text"]').each(function() {
                if ($(this).val().trim() !== '') {
                    isDataPresent = true;
                    return false; // Exit the loop if any field has a value
                }
            });

            // If data is present, activate the card and button
            if (isDataPresent) {
                $("#toggleFrameSizeBtn").addClass("active").prop('disabled', false);
                $('#productFrameSizeCard').show();
            }

            $("#toggleFrameSizeBtn").click(function() {
                $(this).toggleClass("active");
                toggleCardVisibility($('#productFrameSizeCard'), $(this));
            });

            // Add Frame Size Fields
            function addFrameSizeFields(buttonSelector, containerSelector, classSelector) {
                $(buttonSelector).click(function() {
                    var clone = $(classSelector).first().clone();
                    clone.find('input[type="text"]').val(""); // Clear the input values
                    $(containerSelector).append(clone);
                    updateRemoveButtons(containerSelector,
                        '.removeBtn'); // Update visibility of remove buttons
                    $("#toggleFrameSizeBtn").addClass(
                        "active"); // Ensure button is active when a new field is added
                    toggleCardVisibility($('#productFrameSizeCard'), $(
                        "#toggleFrameSizeBtn")); // Show the card when a new field is added
                });
            }

            // Function to update the visibility of remove buttons
            function updateRemoveButtons(containerSelector, buttonSelector) {
                if ($(containerSelector).children().length === 1) {
                    $(containerSelector).find(buttonSelector).hide();
                } else {
                    $(containerSelector).find(buttonSelector).show();
                }
            }

            // Remove Frame Size Fields
            function setupRemoveButtons(containerSelector) {
                $(containerSelector).on('click', '.removeBtn', function() {
                    var inputField = $(this).closest('.row').find('input[type="text"]');
                    if (inputField.val().trim() === '') {
                        $(this).closest('.row').remove();
                        updateRemoveButtons(containerSelector,
                            '.removeBtn'); // Update visibility of remove buttons
                    } else {
                        inputField.val(''); // Clear the input field value if it's not empty
                    }
                });
            }

            // Initialize functionality for different fields
            addFrameSizeFields('#addFrameSizeBtn', '#framesizeFieldsContainer', '.framesize');

            setupRemoveButtons('#framesizeFieldsContainer');

            // Define a function to handle toggling card visibility and button active state
            function toggleCardVisibility(card, button) {
                if (card.find(".row").length > 0 && button.hasClass("active")) {
                    card.show();
                } else {
                    card.hide();
                }
            }

            // Listen for input changes to enable/disable the button and show/hide the data
            $('#productFrameSizeCard input[type="text"]').on('input', function() {
                var isEmpty = true;
                $('#productFrameSizeCard input[type="text"]').each(function() {
                    if ($(this).val().trim() !== '') {
                        isEmpty = false;
                        return false; // Exit the loop if any field has a value
                    }
                });
                if (isEmpty) {
                    $("#toggleFrameSizeBtn").removeClass("active").prop('disabled', true);
                    $('#productFrameSizeCard').hide();
                } else {
                    $("#toggleFrameSizeBtn").addClass("active").prop('disabled', false);
                    $('#productFrameSizeCard').show();
                }
            });

        });
    </script>
    {{-- Frame Size END --}}

    {{-- Display Type --}}
    <script>
        $(document).ready(function() {

            // Check if there is existing data in the input fields on page load
            var isDataPresent = false;
            $('#productDisplayTypeCard input[type="text"]').each(function() {
                if ($(this).val().trim() !== '') {
                    isDataPresent = true;
                    return false; // Exit the loop if any field has a value
                }
            });

            // If data is present, activate the card and button
            if (isDataPresent) {
                $("#toggleDisplayTypeBtn").addClass("active").prop('disabled', false);
                $('#productDisplayTypeCard').show();
            }

            $("#toggleDisplayTypeBtn").click(function() {
                $(this).toggleClass("active");
                toggleCardVisibility($('#productDisplayTypeCard'), $(this));
            });

            // Add Display Type Fields
            function addDisplayTypeFields(buttonSelector, containerSelector, classSelector) {
                $(buttonSelector).click(function() {
                    var clone = $(classSelector).first().clone();
                    clone.find('input[type="text"]').val(""); // Clear the input values
                    $(containerSelector).append(clone);
                    updateRemoveButtons(containerSelector,
                        '.removeBtn'); // Update visibility of remove buttons
                    $("#toggleDisplayTypeBtn").addClass(
                        "active"); // Ensure button is active when a new field is added
                    toggleCardVisibility($('#productDisplayTypeCard'), $(
                        "#toggleDisplayTypeBtn")); // Show the card when a new field is added
                });
            }

            // Function to update the visibility of remove buttons
            function updateRemoveButtons(containerSelector, buttonSelector) {
                if ($(containerSelector).children().length === 1) {
                    $(containerSelector).find(buttonSelector).hide();
                } else {
                    $(containerSelector).find(buttonSelector).show();
                }
            }

            // Remove Display Type Fields
            function setupRemoveButtons(containerSelector) {
                $(containerSelector).on('click', '.removeBtn', function() {
                    var inputField = $(this).closest('.row').find('input[type="text"]');
                    if (inputField.val().trim() === '') {
                        $(this).closest('.row').remove();
                        updateRemoveButtons(containerSelector,
                            '.removeBtn'); // Update visibility of remove buttons
                    } else {
                        inputField.val(''); // Clear the input field value if it's not empty
                    }
                });
            }

            // Initialize functionality for different fields
            addDisplayTypeFields('#addDisplayTypeBtn', '#displaytypeFieldsContainer', '.displaytype');

            setupRemoveButtons('#displaytypeFieldsContainer');

            // Define a function to handle toggling card visibility and button active state
            function toggleCardVisibility(card, button) {
                if (card.find(".row").length > 0 && button.hasClass("active")) {
                    card.show();
                } else {
                    card.hide();
                }
            }

            // Listen for input changes to enable/disable the button and show/hide the data
            $('#productDisplayTypeCard input[type="text"]').on('input', function() {
                var isEmpty = true;
                $('#productDisplayTypeCard input[type="text"]').each(function() {
                    if ($(this).val().trim() !== '') {
                        isEmpty = false;
                        return false; // Exit the loop if any field has a value
                    }
                });
                if (isEmpty) {
                    $("#toggleDisplayTypeBtn").removeClass("active").prop('disabled', true);
                    $('#productDisplayTypeCard').hide();
                } else {
                    $("#toggleDisplayTypeBtn").addClass("active").prop('disabled', false);
                    $('#productDisplayTypeCard').show();
                }
            });

        });
    </script>
    {{-- Display Type END --}}

    {{-- Product Installation --}}
    <script>
        $(document).ready(function() {

            // Check if there is existing data in the input fields on page load
            var isDataPresent = false;
            $('#productInstallationCard input[type="text"]').each(function() {
                if ($(this).val().trim() !== '') {
                    isDataPresent = true;
                    return false; // Exit the loop if any field has a value
                }
            });

            // If data is present, activate the card and button
            if (isDataPresent) {
                $("#toggleInstallationBtn").addClass("active").prop('disabled', false);
                $('#productInstallationCard').show();
            }

            $("#toggleInstallationBtn").click(function() {
                $(this).toggleClass("active");
                toggleCardVisibility($('#productInstallationCard'), $(this));
            });

            // Add Installation Fields
            function addInstallationFields(buttonSelector, containerSelector, classSelector) {
                $(buttonSelector).click(function() {
                    var clone = $(classSelector).first().clone();
                    clone.find('input[type="text"]').val(""); // Clear the input values
                    $(containerSelector).append(clone);
                    updateRemoveButtons(containerSelector,
                        '.removeBtn'); // Update visibility of remove buttons
                    $("#toggleInstallationBtn").addClass(
                        "active"); // Ensure button is active when a new field is added
                    toggleCardVisibility($('#productInstallationCard'), $(
                        "#toggleInstallationBtn")); // Show the card when a new field is added
                });
            }

            // Function to update the visibility of remove buttons
            function updateRemoveButtons(containerSelector, buttonSelector) {
                if ($(containerSelector).children().length === 1) {
                    $(containerSelector).find(buttonSelector).hide();
                } else {
                    $(containerSelector).find(buttonSelector).show();
                }
            }

            // Remove Installation Fields
            function setupRemoveButtons(containerSelector) {
                $(containerSelector).on('click', '.removeBtn', function() {
                    var inputField = $(this).closest('.row').find('input[type="text"]');
                    if (inputField.val().trim() === '') {
                        $(this).closest('.row').remove();
                        updateRemoveButtons(containerSelector,
                            '.removeBtn'); // Update visibility of remove buttons
                    } else {
                        inputField.val(''); // Clear the input field value if it's not empty
                    }
                });
            }

            // Initialize functionality for different fields
            addInstallationFields('#addInstallationBtn', '#installationFieldsContainer', '.installation');

            setupRemoveButtons('#installationFieldsContainer');

            // Define a function to handle toggling card visibility and button active state
            function toggleCardVisibility(card, button) {
                if (card.find(".row").length > 0 && button.hasClass("active")) {
                    card.show();
                } else {
                    card.hide();
                }
            }

            // Listen for input changes to enable/disable the button and show/hide the data
            $('#productInstallationCard input[type="text"]').on('input', function() {
                var isEmpty = true;
                $('#productInstallationCard input[type="text"]').each(function() {
                    if ($(this).val().trim() !== '') {
                        isEmpty = false;
                        return false; // Exit the loop if any field has a value
                    }
                });
                if (isEmpty) {
                    $("#toggleInstallationBtn").removeClass("active").prop('disabled', true);
                    $('#productInstallationCard').hide();
                } else {
                    $("#toggleInstallationBtn").addClass("active").prop('disabled', false);
                    $('#productInstallationCard').show();
                }
            });

        });
    </script>
    {{-- Product Installation END --}}

    {{-- Product Material --}}
    <script>
        $(document).ready(function() {

            // Check if there is existing data in the input fields on page load
            var isDataPresent = false;
            $('#productMaterialCard input[type="text"]').each(function() {
                if ($(this).val().trim() !== '') {
                    isDataPresent = true;
                    return false; // Exit the loop if any field has a value
                }
            });

            // If data is present, activate the card and button
            if (isDataPresent) {
                $("#toggleMaterialBtn").addClass("active").prop('disabled', false);
                $('#productMaterialCard').show();
            }

            $("#toggleMaterialBtn").click(function() {
                $(this).toggleClass("active");
                toggleCardVisibility($('#productMaterialCard'), $(this));
            });

            // Add Material Fields
            function addMaterialFields(buttonSelector, containerSelector, classSelector) {
                $(buttonSelector).click(function() {
                    var clone = $(classSelector).first().clone();
                    clone.find('input[type="text"]').val(""); // Clear the input values
                    $(containerSelector).append(clone);
                    updateRemoveButtons(containerSelector,
                        '.removeBtn'); // Update visibility of remove buttons
                    $("#toggleMaterialBtn").addClass(
                        "active"); // Ensure button is active when a new field is added
                    toggleCardVisibility($('#productMaterialCard'), $(
                        "#toggleMaterialBtn")); // Show the card when a new field is added
                });
            }

            // Function to update the visibility of remove buttons
            function updateRemoveButtons(containerSelector, buttonSelector) {
                if ($(containerSelector).children().length === 1) {
                    $(containerSelector).find(buttonSelector).hide();
                } else {
                    $(containerSelector).find(buttonSelector).show();
                }
            }

            // Remove Material Fields
            function setupRemoveButtons(containerSelector) {
                $(containerSelector).on('click', '.removeBtn', function() {
                    var inputField = $(this).closest('.row').find('input[type="text"]');
                    if (inputField.val().trim() === '') {
                        $(this).closest('.row').remove();
                        updateRemoveButtons(containerSelector,
                            '.removeBtn'); // Update visibility of remove buttons
                    } else {
                        inputField.val(''); // Clear the input field value if it's not empty
                    }
                });
            }

            // Initialize functionality for different fields
            addMaterialFields('#addMaterialBtn', '#materialFieldsContainer', '.material');

            setupRemoveButtons('#materialFieldsContainer');

            // Define a function to handle toggling card visibility and button active state
            function toggleCardVisibility(card, button) {
                if (card.find(".row").length > 0 && button.hasClass("active")) {
                    card.show();
                } else {
                    card.hide();
                }
            }

            // Listen for input changes to enable/disable the button and show/hide the data
            $('#productMaterialCard input[type="text"]').on('input', function() {
                var isEmpty = true;
                $('#productMaterialCard input[type="text"]').each(function() {
                    if ($(this).val().trim() !== '') {
                        isEmpty = false;
                        return false; // Exit the loop if any field has a value
                    }
                });
                if (isEmpty) {
                    $("#toggleMaterialBtn").removeClass("active").prop('disabled', true);
                    $('#productMaterialCard').hide();
                } else {
                    $("#toggleMaterialBtn").addClass("active").prop('disabled', false);
                    $('#productMaterialCard').show();
                }
            });

        });
    </script>
    {{-- Product Material END --}}

    {{-- Product Corners --}}
    <script>
        $(document).ready(function() {

            // Check if there is existing data in the input fields on page load
            var isDataPresent = false;
            $('#productCornersCard input[type="text"]').each(function() {
                if ($(this).val().trim() !== '') {
                    isDataPresent = true;
                    return false; // Exit the loop if any field has a value
                }
            });

            // If data is present, activate the card and button
            if (isDataPresent) {
                $("#toggleCornersBtn").addClass("active").prop('disabled', false);
                $('#productCornersCard').show();
            }

            $("#toggleCornersBtn").click(function() {
                $(this).toggleClass("active");
                toggleCardVisibility($('#productCornersCard'), $(this));
            });

            // Add Corners Fields
            function addCornersFields(buttonSelector, containerSelector, classSelector) {
                $(buttonSelector).click(function() {
                    var clone = $(classSelector).first().clone();
                    clone.find('input[type="text"]').val(""); // Clear the input values
                    $(containerSelector).append(clone);
                    updateRemoveButtons(containerSelector,
                        '.removeBtn'); // Update visibility of remove buttons
                    $("#toggleCornersBtn").addClass(
                        "active"); // Ensure button is active when a new field is added
                    toggleCardVisibility($('#productCornersCard'), $(
                        "#toggleCornersBtn")); // Show the card when a new field is added
                });
            }

            // Function to update the visibility of remove buttons
            function updateRemoveButtons(containerSelector, buttonSelector) {
                if ($(containerSelector).children().length === 1) {
                    $(containerSelector).find(buttonSelector).hide();
                } else {
                    $(containerSelector).find(buttonSelector).show();
                }
            }

            // Remove Corners Fields
            function setupRemoveButtons(containerSelector) {
                $(containerSelector).on('click', '.removeBtn', function() {
                    var inputField = $(this).closest('.row').find('input[type="text"]');
                    if (inputField.val().trim() === '') {
                        $(this).closest('.row').remove();
                        updateRemoveButtons(containerSelector,
                            '.removeBtn'); // Update visibility of remove buttons
                    } else {
                        inputField.val(''); // Clear the input field value if it's not empty
                    }
                });
            }

            // Initialize functionality for different fields
            addCornersFields('#addCornersBtn', '#cornersFieldsContainer', '.corners');

            setupRemoveButtons('#cornersFieldsContainer');

            // Define a function to handle toggling card visibility and button active state
            function toggleCardVisibility(card, button) {
                if (card.find(".row").length > 0 && button.hasClass("active")) {
                    card.show();
                } else {
                    card.hide();
                }
            }

            // Listen for input changes to enable/disable the button and show/hide the data
            $('#productCornersCard input[type="text"]').on('input', function() {
                var isEmpty = true;
                $('#productCornersCard input[type="text"]').each(function() {
                    if ($(this).val().trim() !== '') {
                        isEmpty = false;
                        return false; // Exit the loop if any field has a value
                    }
                });
                if (isEmpty) {
                    $("#toggleCornersBtn").removeClass("active").prop('disabled', true);
                    $('#productCornersCard').hide();
                } else {
                    $("#toggleCornersBtn").addClass("active").prop('disabled', false);
                    $('#productCornersCard').show();
                }
            });

        });
    </script>
    {{-- Product Corners END --}}

    {{-- Product Application --}}
    <script>
        $(document).ready(function() {

            // Check if there is existing data in the input fields on page load
            var isDataPresent = false;
            $('#productApplicationCard input[type="text"]').each(function() {
                if ($(this).val().trim() !== '') {
                    isDataPresent = true;
                    return false; // Exit the loop if any field has a value
                }
            });

            // If data is present, activate the card and button
            if (isDataPresent) {
                $("#toggleApplicationBtn").addClass("active").prop('disabled', false);
                $('#productApplicationCard').show();
            }

            $("#toggleApplicationBtn").click(function() {
                $(this).toggleClass("active");
                toggleCardVisibility($('#productApplicationCard'), $(this));
            });

            // Add Application Fields
            function addApplicationFields(buttonSelector, containerSelector, classSelector) {
                $(buttonSelector).click(function() {
                    var clone = $(classSelector).first().clone();
                    clone.find('input[type="text"]').val(""); // Clear the input values
                    $(containerSelector).append(clone);
                    updateRemoveButtons(containerSelector,
                        '.removeBtn'); // Update visibility of remove buttons
                    $("#toggleApplicationBtn").addClass(
                        "active"); // Ensure button is active when a new field is added
                    toggleCardVisibility($('#productApplicationCard'), $(
                        "#toggleApplicationBtn")); // Show the card when a new field is added
                });
            }

            // Function to update the visibility of remove buttons
            function updateRemoveButtons(containerSelector, buttonSelector) {
                if ($(containerSelector).children().length === 1) {
                    $(containerSelector).find(buttonSelector).hide();
                } else {
                    $(containerSelector).find(buttonSelector).show();
                }
            }

            // Remove Application Fields
            function setupRemoveButtons(containerSelector) {
                $(containerSelector).on('click', '.removeBtn', function() {
                    var inputField = $(this).closest('.row').find('input[type="text"]');
                    if (inputField.val().trim() === '') {
                        $(this).closest('.row').remove();
                        updateRemoveButtons(containerSelector,
                            '.removeBtn'); // Update visibility of remove buttons
                    } else {
                        inputField.val(''); // Clear the input field value if it's not empty
                    }
                });
            }

            // Initialize functionality for different fields
            addApplicationFields('#addApplicationBtn', '#applicationFieldsContainer', '.application');

            setupRemoveButtons('#applicationFieldsContainer');

            // Define a function to handle toggling card visibility and button active state
            function toggleCardVisibility(card, button) {
                if (card.find(".row").length > 0 && button.hasClass("active")) {
                    card.show();
                } else {
                    card.hide();
                }
            }

            // Listen for input changes to enable/disable the button and show/hide the data
            $('#productApplicationCard input[type="text"]').on('input', function() {
                var isEmpty = true;
                $('#productApplicationCard input[type="text"]').each(function() {
                    if ($(this).val().trim() !== '') {
                        isEmpty = false;
                        return false; // Exit the loop if any field has a value
                    }
                });
                if (isEmpty) {
                    $("#toggleApplicationBtn").removeClass("active").prop('disabled', true);
                    $('#productApplicationCard').hide();
                } else {
                    $("#toggleApplicationBtn").addClass("active").prop('disabled', false);
                    $('#productApplicationCard').show();
                }
            });

        });
    </script>
    {{-- Product Application END --}}

    {{-- Product Paper Thickness --}}
    <script>
        $(document).ready(function() {

            // Check if there is existing data in the input fields on page load
            var isDataPresent = false;
            $('#productPaperThicknessCard input[type="text"]').each(function() {
                if ($(this).val().trim() !== '') {
                    isDataPresent = true;
                    return false; // Exit the loop if any field has a value
                }
            });

            // If data is present, activate the card and button
            if (isDataPresent) {
                $("#togglePaperThicknessBtn").addClass("active").prop('disabled', false);
                $('#productPaperThicknessCard').show();
            }

            $("#togglePaperThicknessBtn").click(function() {
                $(this).toggleClass("active");
                toggleCardVisibility($('#productPaperThicknessCard'), $(this));
            });

            // Add Paper Thickness Fields
            function addPaperThicknessFields(buttonSelector, containerSelector, classSelector) {
                $(buttonSelector).click(function() {
                    var clone = $(classSelector).first().clone();
                    clone.find('input[type="text"]').val(""); // Clear the input values
                    $(containerSelector).append(clone);
                    updateRemoveButtons(containerSelector,
                        '.removeBtn'); // Update visibility of remove buttons
                    $("#togglePaperThicknessBtn").addClass(
                        "active"); // Ensure button is active when a new field is added
                    toggleCardVisibility($('#productPaperThicknessCard'), $(
                        "#togglePaperThicknessBtn")); // Show the card when a new field is added
                });
            }

            // Function to update the visibility of remove buttons
            function updateRemoveButtons(containerSelector, buttonSelector) {
                if ($(containerSelector).children().length === 1) {
                    $(containerSelector).find(buttonSelector).hide();
                } else {
                    $(containerSelector).find(buttonSelector).show();
                }
            }

            // Remove Paper Thickness Fields
            function setupRemoveButtons(containerSelector) {
                $(containerSelector).on('click', '.removeBtn', function() {
                    var inputField = $(this).closest('.row').find('input[type="text"]');
                    if (inputField.val().trim() === '') {
                        $(this).closest('.row').remove();
                        updateRemoveButtons(containerSelector,
                            '.removeBtn'); // Update visibility of remove buttons
                    } else {
                        inputField.val(''); // Clear the input field value if it's not empty
                    }
                });
            }

            // Initialize functionality for different fields
            addPaperThicknessFields('#addPaperThicknessBtn', '#paperthicknessFieldsContainer', '.paperthickness');

            setupRemoveButtons('#paperthicknessFieldsContainer');

            // Define a function to handle toggling card visibility and button active state
            function toggleCardVisibility(card, button) {
                if (card.find(".row").length > 0 && button.hasClass("active")) {
                    card.show();
                } else {
                    card.hide();
                }
            }

            // Listen for input changes to enable/disable the button and show/hide the data
            $('#productPaperThicknessCard input[type="text"]').on('input', function() {
                var isEmpty = true;
                $('#productPaperThicknessCard input[type="text"]').each(function() {
                    if ($(this).val().trim() !== '') {
                        isEmpty = false;
                        return false; // Exit the loop if any field has a value
                    }
                });
                if (isEmpty) {
                    $("#togglePaperThicknessBtn").removeClass("active").prop('disabled', true);
                    $('#productPaperThicknessCard').hide();
                } else {
                    $("#togglePaperThicknessBtn").addClass("active").prop('disabled', false);
                    $('#productPaperThicknessCard').show();
                }
            });

        });
    </script>
    {{-- Product Paper Thickness END --}}

    {{-- QTY --}}
    <script>
        $(document).ready(function() {

            // Check if there is existing data in the input fields on page load
            var isDataPresent = false;
            $('#productQtyCard input[type="text"]').each(function() {
                if ($(this).val().trim() !== '') {
                    isDataPresent = true;
                    return false; // Exit the loop if any field has a value
                }
            });

            // If data is present, activate the card and button
            if (isDataPresent) {
                $("#toggleQtyBtn").addClass("active").prop('disabled', false);
                $('#productQtyCard').show();
            }

            $("#toggleQtyBtn").click(function() {
                $(this).toggleClass("active");
                toggleCardVisibility($('#productQtyCard'), $(this));
            });

            // Add Quantity Fields
            function addQuantityFields(buttonSelector, containerSelector, classSelector) {
                $(buttonSelector).click(function() {
                    var clone = $(classSelector).first().clone();
                    clone.find('input[type="text"]').val(""); // Clear the input values
                    $(containerSelector).append(clone);
                    updateRemoveButtons(containerSelector,
                        '.removeBtn'); // Update visibility of remove buttons
                    $("#toggleQtyBtn").addClass(
                        "active"); // Ensure button is active when a new field is added
                    toggleCardVisibility($('#productQtyCard'), $(
                        "#toggleQtyBtn")); // Show the card when a new field is added
                });
            }

            // Function to update the visibility of remove buttons
            function updateRemoveButtons(containerSelector, buttonSelector) {
                if ($(containerSelector).children().length === 1) {
                    $(containerSelector).find(buttonSelector).hide();
                } else {
                    $(containerSelector).find(buttonSelector).show();
                }
            }

            // Remove Quantity Fields
            function setupRemoveButtons(containerSelector) {
                $(containerSelector).on('click', '.removeBtn', function() {
                    var inputField = $(this).closest('.row').find('input[type="text"]');
                    if (inputField.val().trim() === '') {
                        $(this).closest('.row').remove();
                        updateRemoveButtons(containerSelector,
                            '.removeBtn'); // Update visibility of remove buttons
                    } else {
                        inputField.val(''); // Clear the input field value if it's not empty
                    }
                });
            }

            // Initialize functionality for different fields
            addQuantityFields('#addQtyBtn', '#qtyFieldsContainer', '.qty');

            setupRemoveButtons('#qtyFieldsContainer');

            // Define a function to handle toggling card visibility and button active state
            function toggleCardVisibility(card, button) {
                if (card.find(".row").length > 0 && button.hasClass("active")) {
                    card.show();
                } else {
                    card.hide();
                }
            }

            // Listen for input changes to enable/disable the button and show/hide the data
            $('#productQtyCard input[type="text"]').on('input', function() {
                var isEmpty = true;
                $('#productQtyCard input[type="text"]').each(function() {
                    if ($(this).val().trim() !== '') {
                        isEmpty = false;
                        return false; // Exit the loop if any field has a value
                    }
                });
                if (isEmpty) {
                    $("#toggleQtyBtn").removeClass("active").prop('disabled', true);
                    $('#productQtyCard').hide();
                } else {
                    $("#toggleQtyBtn").addClass("active").prop('disabled', false);
                    $('#productQtyCard').show();
                }
            });

        });
    </script>
    {{-- QTY END --}}

    {{-- Product Pages in Book --}}
    <script>
        $(document).ready(function() {

            // Check if there is existing data in the input fields on page load
            var isDataPresent = false;
            $('#productPagesinBookCard input[type="text"]').each(function() {
                if ($(this).val().trim() !== '') {
                    isDataPresent = true;
                    return false; // Exit the loop if any field has a value
                }
            });

            // If data is present, activate the card and button
            if (isDataPresent) {
                $("#togglePagesinBookBtn").addClass("active").prop('disabled', false);
                $('#productPagesinBookCard').show();
            }

            $("#togglePagesinBookBtn").click(function() {
                $(this).toggleClass("active");
                toggleCardVisibility($('#productPagesinBookCard'), $(this));
            });

            // Add Pages in Book Fields
            function addPagesinBookFields(buttonSelector, containerSelector, classSelector) {
                $(buttonSelector).click(function() {
                    var clone = $(classSelector).first().clone();
                    clone.find('input[type="text"]').val(""); // Clear the input values
                    $(containerSelector).append(clone);
                    updateRemoveButtons(containerSelector,
                        '.removeBtn'); // Update visibility of remove buttons
                    $("#togglePagesinBookBtn").addClass(
                        "active"); // Ensure button is active when a new field is added
                    toggleCardVisibility($('#productPagesinBookCard'), $(
                        "#togglePagesinBookBtn")); // Show the card when a new field is added
                });
            }

            // Function to update the visibility of remove buttons
            function updateRemoveButtons(containerSelector, buttonSelector) {
                if ($(containerSelector).children().length === 1) {
                    $(containerSelector).find(buttonSelector).hide();
                } else {
                    $(containerSelector).find(buttonSelector).show();
                }
            }

            // Remove Pages in Book Fields
            function setupRemoveButtons(containerSelector) {
                $(containerSelector).on('click', '.removeBtn', function() {
                    var inputField = $(this).closest('.row').find('input[type="text"]');
                    if (inputField.val().trim() === '') {
                        $(this).closest('.row').remove();
                        updateRemoveButtons(containerSelector,
                            '.removeBtn'); // Update visibility of remove buttons
                    } else {
                        inputField.val(''); // Clear the input field value if it's not empty
                    }
                });
            }

            // Initialize functionality for different fields
            addPagesinBookFields('#addPagesinBookBtn', '#pagesinbookFieldsContainer', '.pagesinbook');

            setupRemoveButtons('#pagesinbookFieldsContainer');

            // Define a function to handle toggling card visibility and button active state
            function toggleCardVisibility(card, button) {
                if (card.find(".row").length > 0 && button.hasClass("active")) {
                    card.show();
                } else {
                    card.hide();
                }
            }

            // Listen for input changes to enable/disable the button and show/hide the data
            $('#productPagesinBookCard input[type="text"]').on('input', function() {
                var isEmpty = true;
                $('#productPagesinBookCard input[type="text"]').each(function() {
                    if ($(this).val().trim() !== '') {
                        isEmpty = false;
                        return false; // Exit the loop if any field has a value
                    }
                });
                if (isEmpty) {
                    $("#togglePagesinBookBtn").removeClass("active").prop('disabled', true);
                    $('#productPagesinBookCard').hide();
                } else {
                    $("#togglePagesinBookBtn").addClass("active").prop('disabled', false);
                    $('#productPagesinBookCard').show();
                }
            });

        });
    </script>
    {{-- Product Pages in Book END --}}

    {{-- Product Copies Required --}}
    <script>
        $(document).ready(function() {

            // Check if there is existing data in the input fields on page load
            var isDataPresent = false;
            $('#productCopiesRequiredCard input[type="text"]').each(function() {
                if ($(this).val().trim() !== '') {
                    isDataPresent = true;
                    return false; // Exit the loop if any field has a value
                }
            });

            // If data is present, activate the card and button
            if (isDataPresent) {
                $("#toggleCopiesRequiredBtn").addClass("active").prop('disabled', false);
                $('#productCopiesRequiredCard').show();
            }

            $("#toggleCopiesRequiredBtn").click(function() {
                $(this).toggleClass("active");
                toggleCardVisibility($('#productCopiesRequiredCard'), $(this));
            });

            // Add Copies Required Fields
            function addCopiesRequiredFields(buttonSelector, containerSelector, classSelector) {
                $(buttonSelector).click(function() {
                    var clone = $(classSelector).first().clone();
                    clone.find('input[type="text"]').val(""); // Clear the input values
                    $(containerSelector).append(clone);
                    updateRemoveButtons(containerSelector,
                        '.removeBtn'); // Update visibility of remove buttons
                    $("#toggleCopiesRequiredBtn").addClass(
                        "active"); // Ensure button is active when a new field is added
                    toggleCardVisibility($('#productCopiesRequiredCard'), $(
                        "#toggleCopiesRequiredBtn")); // Show the card when a new field is added
                });
            }

            // Function to update the visibility of remove buttons
            function updateRemoveButtons(containerSelector, buttonSelector) {
                if ($(containerSelector).children().length === 1) {
                    $(containerSelector).find(buttonSelector).hide();
                } else {
                    $(containerSelector).find(buttonSelector).show();
                }
            }

            // Remove Copies Required Fields
            function setupRemoveButtons(containerSelector) {
                $(containerSelector).on('click', '.removeBtn', function() {
                    var inputField = $(this).closest('.row').find('input[type="text"]');
                    if (inputField.val().trim() === '') {
                        $(this).closest('.row').remove();
                        updateRemoveButtons(containerSelector,
                            '.removeBtn'); // Update visibility of remove buttons
                    } else {
                        inputField.val(''); // Clear the input field value if it's not empty
                    }
                });
            }

            // Initialize functionality for different fields
            addCopiesRequiredFields('#addCopiesRequiredBtn', '#copiesrequiredFieldsContainer', '.copiesrequired');

            setupRemoveButtons('#copiesrequiredFieldsContainer');

            // Define a function to handle toggling card visibility and button active state
            function toggleCardVisibility(card, button) {
                if (card.find(".row").length > 0 && button.hasClass("active")) {
                    card.show();
                } else {
                    card.hide();
                }
            }

            // Listen for input changes to enable/disable the button and show/hide the data
            $('#productCopiesRequiredCard input[type="text"]').on('input', function() {
                var isEmpty = true;
                $('#productCopiesRequiredCard input[type="text"]').each(function() {
                    if ($(this).val().trim() !== '') {
                        isEmpty = false;
                        return false; // Exit the loop if any field has a value
                    }
                });
                if (isEmpty) {
                    $("#toggleCopiesRequiredBtn").removeClass("active").prop('disabled', true);
                    $('#productCopiesRequiredCard').hide();
                } else {
                    $("#toggleCopiesRequiredBtn").addClass("active").prop('disabled', false);
                    $('#productCopiesRequiredCard').show();
                }
            });

        });
    </script>
    {{-- Product Copies Required END --}}

    {{-- Product Pages in Notepad --}}
    <script>
        $(document).ready(function() {

            // Check if there is existing data in the input fields on page load
            var isDataPresent = false;
            $('#productPagesinNotepadCard input[type="text"]').each(function() {
                if ($(this).val().trim() !== '') {
                    isDataPresent = true;
                    return false; // Exit the loop if any field has a value
                }
            });

            // If data is present, activate the card and button
            if (isDataPresent) {
                $("#togglePagesinNotepadBtn").addClass("active").prop('disabled', false);
                $('#productPagesinNotepadCard').show();
            }

            $("#togglePagesinNotepadBtn").click(function() {
                $(this).toggleClass("active");
                toggleCardVisibility($('#productPagesinNotepadCard'), $(this));
            });

            // Add Pages in Notepad Fields
            function addPagesinNotepadFields(buttonSelector, containerSelector, classSelector) {
                $(buttonSelector).click(function() {
                    var clone = $(classSelector).first().clone();
                    clone.find('input[type="text"]').val(""); // Clear the input values
                    $(containerSelector).append(clone);
                    updateRemoveButtons(containerSelector,
                        '.removeBtn'); // Update visibility of remove buttons
                    $("#togglePagesinNotepadBtn").addClass(
                        "active"); // Ensure button is active when a new field is added
                    toggleCardVisibility($('#productPagesinNotepadCard'), $(
                        "#togglePagesinNotepadBtn")); // Show the card when a new field is added
                });
            }

            // Function to update the visibility of remove buttons
            function updateRemoveButtons(containerSelector, buttonSelector) {
                if ($(containerSelector).children().length === 1) {
                    $(containerSelector).find(buttonSelector).hide();
                } else {
                    $(containerSelector).find(buttonSelector).show();
                }
            }

            // Remove Pages in Notepad Fields
            function setupRemoveButtons(containerSelector) {
                $(containerSelector).on('click', '.removeBtn', function() {
                    var inputField = $(this).closest('.row').find('input[type="text"]');
                    if (inputField.val().trim() === '') {
                        $(this).closest('.row').remove();
                        updateRemoveButtons(containerSelector,
                            '.removeBtn'); // Update visibility of remove buttons
                    } else {
                        inputField.val(''); // Clear the input field value if it's not empty
                    }
                });
            }

            // Initialize functionality for different fields
            addPagesinNotepadFields('#addPagesinNotepadBtn', '#pagesinnotepadFieldsContainer', '.pagesinnotepad');

            setupRemoveButtons('#pagesinnotepadFieldsContainer');

            // Define a function to handle toggling card visibility and button active state
            function toggleCardVisibility(card, button) {
                if (card.find(".row").length > 0 && button.hasClass("active")) {
                    card.show();
                } else {
                    card.hide();
                }
            }

            // Listen for input changes to enable/disable the button and show/hide the data
            $('#productPagesinNotepadCard input[type="text"]').on('input', function() {
                var isEmpty = true;
                $('#productPagesinNotepadCard input[type="text"]').each(function() {
                    if ($(this).val().trim() !== '') {
                        isEmpty = false;
                        return false; // Exit the loop if any field has a value
                    }
                });
                if (isEmpty) {
                    $("#togglePagesinNotepadBtn").removeClass("active").prop('disabled', true);
                    $('#productPagesinNotepadCard').hide();
                } else {
                    $("#togglePagesinNotepadBtn").addClass("active").prop('disabled', false);
                    $('#productPagesinNotepadCard').show();
                }
            });

        });
    </script>
    {{-- Product Pages in Notepad END --}}

    {{-- Product cutting --}}
    <script>
        $(document).ready(function() {

            // Show cutting card if any input has a value
            if ($('#productcuttingCard input[type="number"]').filter(function() {
                    return $(this).val().trim() !== '';
                }).length > 0) {
                $('#toggleCuttingBtn').addClass('active').prop('disabled', false);
                $('#productcuttingCard').show();
            }

            // Toggle cutting card visibility
            $('#toggleCuttingBtn').click(function() {
                $(this).toggleClass('active');
                $('#productcuttingCard').slideToggle();
            });

            // Function to add new cutting input group
            function addCutting(buttonSelector, containerSelector, groupSelector, removeBtnSelector) {
                $(document).on('click', buttonSelector, function() {
                    const clone = $(groupSelector).first().clone().find('input').val('').end();
                    $(containerSelector).append(clone);
                    $(removeBtnSelector).show(); // show remove button on new item
                    $('#toggleCuttingBtn').addClass('active');
                    $('#productcuttingCard').slideDown();
                });
            }

            // Remove cutting input group
            $(document).on('click', '.remove-trimtosize, .remove-customeshape', function() {
                $(this).closest('.row').remove();
            });




            // Function to update the visibility of remove buttons
            function updateRemoveButtons(containerSelector, buttonSelector) {
                if ($(containerSelector).children().length === 1) {
                    $(containerSelector).find(buttonSelector).hide();
                } else {
                    $(containerSelector).find(buttonSelector).show();
                }
            }

            // Remove Pages in Notepad Fields
            function setupRemoveButtons(containerSelector) {
                $(containerSelector).on('click', '.removeBtn', function() {
                    var inputField = $(this).closest('.row').find('input[type="text"]');
                    if (inputField.val().trim() === '') {
                        $(this).closest('.row').remove();
                        updateRemoveButtons(containerSelector,
                            '.removeBtn'); // Update visibility of remove buttons
                    } else {
                        inputField.val(''); // Clear the input field value if it's not empty
                    }
                });
            }

            // Initialize functionality for different fields
            addCutting('#addcuttingBtn', '#cuttingFieldsContainer', '.cutting');

            setupRemoveButtons('#cuttingFieldsContainer');

            // Define a function to handle toggling card visibility and button active state
            function toggleCardVisibility(card, button) {
                if (card.find(".row").length > 0 && button.hasClass("active")) {
                    card.show();
                } else {
                    card.hide();
                }
            }

            // Listen for input changes to enable/disable the button and show/hide the data
            $('#productcuttingCard input[type="text"]').on('input', function() {
                var isEmpty = true;
                $('#productcuttingCard input[type="text"]').each(function() {
                    if ($(this).val().trim() !== '') {
                        isEmpty = false;
                        return false; // Exit the loop if any field has a value
                    }
                });
                if (isEmpty) {
                    $("#toggleCuttingBtn").removeClass("active").prop('disabled', true);
                    $('#productcuttingCard').hide();
                } else {
                    $("#toggleCuttingBtn").addClass("active").prop('disabled', false);
                    $('#productcuttingCard').show();
                }
            });

        });
    </script>
    {{-- Product cutting END --}}


    <script>
        $(document).ready(function() {
            function updateRemoveButtons() {
                const faqItems = $('#faqsContainer .faqsContainer');
                faqItems.each(function(index) {
                    const questionValue = $(this).find('[name="product_question[]"]').val().trim();
                    const answerValue = $(this).find('[name="product_answer[]"]').val().trim();
                    const removeBtn = $(this).find('.removeBtn');
                    if (faqItems.length > 1 || (questionValue !== '' && answerValue !== '')) {
                        removeBtn.show();
                    } else {
                        removeBtn.hide();
                    }
                });
            }

            function attachSummernoteHandlers(container) {
                container.find('.summernote').on('summernote.change', function() {
                    updateRemoveButtons();
                });
            }

            $("#addFaqsBtn").click(function() {
                var clone = `
            <div class="row faqsContainer">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="question">Question</label>
                        <textarea name="product_question[]" class="summernote" placeholder="Question" rows="3"></textarea>
                        <p></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="answer">Answer</label>
                        <textarea name="product_answer[]" class="summernote" placeholder="Answer" rows="3"></textarea>
                        <p></p>
                    </div>
                </div>
                <div class="col-md-12 text-right">
                    <button type="button" class="btn btn-danger removeBtn" style="display:none;">Remove</button>
                </div>
            </div>`;
                var $clone = $(clone); // Create jQuery object for the cloned HTML
                $("#faqsContainer").append($clone);

                // Initialize Summernote on the newly added textareas
                $clone.find('.summernote').summernote();
                attachSummernoteHandlers($clone);

                updateRemoveButtons();
            });

            // Remove button functionality
            $(document).on('click', '.removeBtn', function() {
                $(this).closest('.faqsContainer').remove();
                updateRemoveButtons();
            });

            // Initialize existing FAQ items
            $('#faqsContainer .faqsContainer').each(function() {
                attachSummernoteHandlers($(this));
            });

            updateRemoveButtons(); // Initial call to set correct visibility of remove buttons
        });
    </script>

    <script>
        $('.related_products').select2({
            ajax: {
                url: '{{ route('products.getProducts') }}',
                dataType: 'json',
                tags: true,
                multiple: true,
                minimumInputLength: 3,
                processResults: function(data) {
                    return {
                        results: data.tags
                    };
                }
            }
        });
    </script>

    <script>
        $('#category_id').change(function() {
            var category_id = $(this).val();
            $.ajax({
                url: '{{ route('products-subcategories.index') }}',
                type: 'get',
                data: {
                    category_id: category_id
                },
                dataType: 'json',
                success: function(response) {
                    // console.log(response);
                    $('#subcategory_id').find("option").not(":first").remove();
                    $.each(response["subcategories"], function(key, item) {
                        $('#subcategory_id').append(
                            `<option value='${item.id}' >${item.cat_sub_name}</option>`)
                    })

                },
                error: function() {
                    console.log("Something Went Wrong");
                }
            })

        });
        // $("#productform").submit(function(event) {
        //     event.preventDefault();
        //     var element = $(this);

        //     $("button[type=submit]").prop('disable', true);

        //     $.ajax({
        //         url: '{{ route('products.update', $product->id) }}',
        //         type: 'put',
        //         data: element.serializeArray(),
        //         dataType: 'json',
        //         success: function(response) {

        //             $("button[type=submit]").prop('disable', false);

        //             if (response["status"] == true) {

        //                 window.location.href = "{{ route('products.index') }}";
        //                 $('#product_name').removeClass('is-invalid').siblings('p').removeClass(
        //                     'invalid-feedback').html("");
        //                 $('#product_slug').removeClass('is-invalid').siblings('p').removeClass(
        //                     'invalid-feedback').html("");

        //             } else {
        //                 var errors = response['errors'];
        //                 // if (errors['product_name']) {
        //                 //     $('#product_name').addClass('is-invalid').siblings('p').addClass(
        //                 //             'invalid-feedback')
        //                 //         .html(errors['product_name']);
        //                 // } else {
        //                 //     $('#product_name').removeClass('is-invalid').siblings('p').removeClass(
        //                 //         'invalid-feedback').html("");
        //                 // }
        //                 // if (errors['product_slug']) {
        //                 //     $('#product_slug').addClass('is-invalid').siblings('p').addClass(
        //                 //             'invalid-feedback')
        //                 //         .html(errors['product_slug']);
        //                 // } else {
        //                 //     $('#product_slug').removeClass('is-invalid').siblings('p').removeClass(
        //                 //         'invalid-feedback').html("");
        //                 // }

        //                 $(".error").removeClass('invalid-feedback').html('');
        //                 $("input[type='text'], select").removeClass('is-invalid');

        //                 $.each(errors, function(key, value) {

        //                     $(`#${key}`)
        //                         .addClass('is-invalid')
        //                         .siblings('p')
        //                         .addClass('invalid-feedback').html(value);

        //                 });


        //             }
        //         },
        //         error: function(jqXHR, exception) {
        //             console.log("Something Went Wrong");
        //         }
        //     });
        // });

        $("#productform").submit(function(event) {
            event.preventDefault();

            var form = $(this)[0]; // raw DOM element
            var formData = new FormData(form);

            $("button[type=submit]").prop('disabled', true);

            $.ajax({
                url: '{{ route('products.update', $product->id) }}',
                type: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'X-HTTP-Method-Override': 'PUT'
                },
                success: function(response) {
                    $("button[type=submit]").prop('disabled', false);
                    if (response.status === true) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Product has been updated successfully!',
                            timer: 3000,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href = "{{ route('products.index') }}";
                        });
                    } else {
                        $('input, select, textarea').removeClass('is-invalid');
                        $('.invalid-feedback').remove();
                        let errorMessage = '';

                        $.each(response.errors, function(key, messages) {
                            const el = $(`#${key}`);
                            el.addClass('is-invalid');
                            if (el.next('.invalid-feedback').length === 0) {
                                el.after(
                                    `<div class="invalid-feedback">${messages.join('<br>')}</div>`
                                );
                            }
                            errorMessage += messages.join('<br>') + '<br>';
                        });

                        Swal.fire({
                            icon: 'error',
                            title: 'Validation Error',
                            html: errorMessage,
                            timer: 4000,
                            showConfirmButton: false
                        });
                    }
                },
                error: function(jqXHR) {
                    $("button[type=submit]").prop('disabled', false);
                    Swal.fire({
                        icon: 'error',
                        title: 'Server Error',
                        text: jqXHR.responseJSON?.message ||
                            'Something went wrong. Please try again later.',
                        timer: 3000,
                        showConfirmButton: false
                    });
                }
            });
        });



        $("#product_name").change(function() {
            var element = $(this);
            $("button[type=submit]").prop('disable', true);
            $.ajax({
                url: '{{ route('getslug') }}',
                type: 'get',
                data: {
                    title: element.val()
                },
                dataType: 'json',
                success: function(response) {
                    $("button[type=submit]").prop('disable', false);
                    if (response["status"] == true) {
                        $("#product_slug").val(response["slug"]);
                    }
                },
                error: function(jqXHR, exception) {
                    console.log("Something Went Wrong");
                }
            });
        });

        Dropzone.autoDiscover = false;
        const dropzone = new Dropzone("#image", {
            url: "{{ route('product-images.update') }}",
            maxFiles: 5,
            paramName: 'image',
            params: {
                'product_id': '{{ $product->id }}'
            },
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(file, response) {
                var html = `<div class="col-md-3" id="image-row-${response.image_id}">
            <div class="card">
                <input type="hidden" name="image_array[]" value="${response.image_id}">
                <img src="${response.ImagePath}" class="card-img-top" alt="">
                <div class="card-body">
                    <a href="javascript:void(0)" onclick="deleteImage(${response.image_id})" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>`;
                $('#product-image').append(html);
            },
            complete: function(file) {
                this.removeFile(file);
            }
        });

        function deleteImage(id) {
            $("#image-row-" + id).remove();
            if (confirm("Are You Sure You Want To Delete Image")) {
                $.ajax({
                    url: '{{ route('product-images.destroy') }}',
                    type: 'delete',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        if (response.status == true) {
                            alert(response.message);
                        } else {
                            alert(response.message);
                        }
                    }
                });
            }
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var priceOptions = document.querySelectorAll('.priceOption');
            var priceFields = document.querySelectorAll('.price-fields');

            // Function to show/hide price fields based on selected option
            function togglePriceFields() {
                var selectedOption = document.querySelector('input[name="priceOption"]:checked').value;
                priceFields.forEach(function(field) {
                    if (field.getAttribute('data-option') === selectedOption) {
                        field.classList.remove('hidden');
                    } else {
                        field.classList.add('hidden');
                    }
                });
            }

            // Initial setup
            togglePriceFields();

            // Event listener for radio button change
            priceOptions.forEach(function(option) {
                option.addEventListener('change', function() {
                    togglePriceFields();
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let fixedDimensionsIndex =
                {{ isset($product->fixed_price_options) ? $product->fixed_price_options->count() : 0 }};

            const addFixedFieldsBtn = document.getElementById('addFixedFieldsBtn');
            const fixedContainer = document.getElementById('fixedContainer');

            // Function to add fixed media fields
            function addFixedFields() {
                const newFieldSet = document.createElement('div');
                newFieldSet.classList.add('fixedFieldSet', 'mb-3');
                newFieldSet.setAttribute('data-index', fixedDimensionsIndex);

                newFieldSet.innerHTML = `
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                <label for="fixed_dimensions_${fixedDimensionsIndex}">Dimension</label>
                <input type="text" name="fixed_dimensions[]" id="fixed_dimensions_${fixedDimensionsIndex}" class="form-control" placeholder="Dimension (e.g., 1000 X 2000)">
                <p class="dimension-error text-danger" style="display: none;">Invalid dimension format. Please use the format "1000 X 2000" or "1000*2000".</p>
            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="mb-3">
                                <label>Quantity Range & Prices</label>
                                <div class="row fixedFieldSet">
                                    <div class="col-md-3">
                                        <input type="number" name="fixed_min_qty[${fixedDimensionsIndex}][]" class="form-control" placeholder="Min Qty" min="0" step="0.01">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="fixed_max_qty[${fixedDimensionsIndex}][]" class="form-control" placeholder="Max Qty" min="0" step="0.01">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="fixed_price[${fixedDimensionsIndex}][]" class="form-control" placeholder="Price" min="0" step="0.01">
                                    </div>
                                   <div class="col-md-3 d-flex justify-content-between align-items-center">
                                            <button type="button" class="btn btn-success addMoreFixedBtn"><i class="fas fa-plus"></i></button>
                                            <button type="button" class="btn btn-danger removeFixedBtn"><i class="fas fa-minus"></i></button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                fixedContainer.appendChild(newFieldSet);
                fixedDimensionsIndex++;
                updateRemoveButtons();
            }

            // Event listener for adding fixed media fields
            addFixedFieldsBtn.addEventListener('click', addFixedFields);

            // Event listener for adding quantity and price rows
            $(document).on('click', '.addMoreFixedBtn', function() {
                const parentFieldSet = $(this).closest('.fixedFieldSet');
                const dimensionIndex = parentFieldSet.data('index');

                const newQtyPriceRow = `
                    <div class="row fixedFieldSet mt-2">
                        <div class="col-md-3">
                            <input type="number" name="fixed_min_qty[${dimensionIndex}][]" class="form-control" placeholder="Min Qty" min="0" step="0.01">
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="fixed_max_qty[${dimensionIndex}][]" class="form-control" placeholder="Max Qty" min="0" step="0.01">
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="fixed_price[${dimensionIndex}][]" class="form-control" placeholder="Price" min="0" step="0.01">
                        </div>
                        <div class="col-md-3 d-flex justify-content-between align-items-center">
                            <button type="button" class="btn btn-danger removeFixedBtn"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                `;
                parentFieldSet.find('.mb-3:last').append(newQtyPriceRow);
            });

            // Event listener for removing fixed quantity and price rows
            $(document).on('click', '.removeFixedBtn', function() {
                $(this).closest('.fixedFieldSet').remove();
                updateRemoveButtons(); // Update buttons visibility after removal
            });

            // Function to update the visibility of remove buttons
            function updateRemoveButtons() {
                const fixedFields = document.querySelectorAll('.fixedFieldSet');

                fixedFields.forEach(field => {
                    const addButton = field.querySelector('.addMoreFixedBtn');
                    const removeButton = field.querySelector('.removeFixedBtn');

                    if (addButton) {
                        addButton.style.display = 'block';
                    }

                    if (removeButton) {
                        removeButton.style.display = fixedFields.length > 1 ? 'block' : 'none';
                    }
                });
            }

            // Initial call to update the remove buttons
            updateRemoveButtons();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const priceOptionRadioButtons = document.querySelectorAll('input[name="priceOption"]');
            const rigidMediaContainer = document.getElementById('rigidMediaContainer');

            function toggleRigidMediaVisibility() {
                const selectedOption = document.querySelector('input[name="priceOption"]:checked')?.value;
                if (selectedOption === 'rigidMedia') {
                    rigidMediaContainer.classList.remove('d-none');
                } else {
                    rigidMediaContainer.classList.add('d-none');
                }
            }

            priceOptionRadioButtons.forEach(button => {
                button.addEventListener('change', toggleRigidMediaVisibility);
            });

            toggleRigidMediaVisibility();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const singleCheckbox = document.getElementById('singleOption0');
            const singleContainer = document.getElementById('singleSideContainer');

            const doubleCheckbox = document.getElementById('doubleOption0');
            const doubleContainer = document.getElementById('doubleSideContainer');

            // Function to toggle container based on checkbox
            function toggleContainer(checkbox, container) {
                if (checkbox.checked) {
                    container.style.display = 'block';
                } else {
                    container.style.display = 'none';

                    // Optionally clear inputs
                    container.querySelectorAll('input[type="number"]').forEach(input => {
                        input.value = '';
                    });
                }
            }

            // Add event listeners
            singleCheckbox.addEventListener('change', () => toggleContainer(singleCheckbox, singleContainer));
            doubleCheckbox.addEventListener('change', () => toggleContainer(doubleCheckbox, doubleContainer));

            // Initial toggle on page load
            toggleContainer(singleCheckbox, singleContainer);
            toggleContainer(doubleCheckbox, doubleContainer);
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var priceOptions = document.querySelectorAll('.priceOption');
            var priceFields = document.querySelectorAll('.price-fields');

            // Function to show/hide price fields based on selected option
            function togglePriceFields() {
                var selectedOption = document.querySelector('input[name="priceOption"]:checked').value;
                priceFields.forEach(function(field) {
                    if (field.getAttribute('data-option') === selectedOption) {
                        field.classList.remove('hidden');
                    } else {
                        field.classList.add('hidden');
                    }
                });
            }

            // Initial setup
            togglePriceFields();

            // Event listener for radio button change
            priceOptions.forEach(function(option) {
                option.addEventListener('change', function() {
                    togglePriceFields();
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dimensionRegex = /^\d+(\.\d+)?\s*[x*]\s*\d+(\.\d+)?$/i;

            // Function to validate a dimension input field
            function validateDimension(input) {
                const errorElement = input.parentElement.querySelector(
                    '.dimension-error'); // Find error message within the same container

                if (input.value === "") {
                    input.classList.remove('is-invalid');
                    errorElement.style.display = 'none';
                    return;
                }

                if (!dimensionRegex.test(input.value)) {
                    input.classList.add('is-invalid');
                    errorElement.style.display = 'inline';
                } else {
                    input.classList.remove('is-invalid');
                    errorElement.style.display = 'none';
                }
            }

            // Attach validation to all current and future dimension inputs
            function attachValidationToDimensions() {
                document.querySelectorAll('input[name="fixed_dimensions[]"]').forEach(input => {
                    input.removeEventListener('input', validateDimensionHandler);
                    input.removeEventListener('blur', validateDimensionHandler);

                    input.addEventListener('input', validateDimensionHandler);
                    input.addEventListener('blur', validateDimensionHandler);
                });
            }

            // Event handler for validation
            function validateDimensionHandler(event) {
                validateDimension(event.target);
            }

            // Initial validation attachment
            attachValidationToDimensions();

            // MutationObserver to handle dynamically added fields
            const observer = new MutationObserver(attachValidationToDimensions);
            observer.observe(document.getElementById('fixedContainer'), {
                childList: true,
                subtree: true
            });

            // Optional: Validate dimensions before switching tabs if tabs are present
            const tabElements = document.querySelectorAll('.nav-link');
            if (tabElements.length > 0) {
                tabElements.forEach(tab => {
                    tab.addEventListener('click', function() {
                        document.querySelectorAll('input[name="fixed_dimensions[]"]').forEach(
                            input => {
                                validateDimension(input);
                            });
                    });
                });
            }
        });
    </script>


    {{-- For Cutting --}}
    <script>
        $(document).ready(function() {
            let trimIndex = 1;
            let customIndex = 1;

            // Toggle Trim to Size container
            $('#trimtosizeption').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#trimToSizeFieldsContainer').slideDown();
                } else {
                    $('#trimToSizeFieldsContainer').slideUp();
                }
            });

            // Toggle Custom Shape container
            $('#customeshapeOption').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#customeshapeFieldsContainer').slideDown();
                } else {
                    $('#customeshapeFieldsContainer').slideUp();
                }
            });

            // Add new row for Trim to Size
            $('.addTrimToSizeBtn').on('click', function() {
                let newRow = `
                <div class="row trimtosize-price-fields mt-2">
                    <div class="col-md-4">
                        <input type="number" name="cutting[trimtosize][${trimIndex}][min_qty]" class="form-control" placeholder="Min Qty" step="0.01" min="0">
                    </div>
                    <div class="col-md-4">
                        <input type="number" name="cutting[trimtosize][${trimIndex}][max_qty]" class="form-control" placeholder="Max Qty" step="0.01" min="0">
                    </div>
                    <div class="col-md-4">
                        <input type="number" name="cutting[trimtosize][${trimIndex}][price]" class="form-control" placeholder="Price" step="0.01" min="0">
                    </div>
                    <div class="col-md-12 text-end mt-2">
                        <button type="button" class="btn btn-danger remove-trimtosize"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
            `;
                $('#trimToSizeFieldsContainer').append(newRow);
                trimIndex++;
            });

            // Add new row for Custom Shape
            $('.add-more-custome').on('click', function() {
                let newRow = `
                <div class="row customeshape-price-fields mt-2">
                    <div class="col-md-4">
                        <input type="number" name="cutting[customesize][${customIndex}][min_qty]" class="form-control" placeholder="Min Qty" step="0.01" min="0">
                    </div>
                    <div class="col-md-4">
                        <input type="number" name="cutting[customesize][${customIndex}][max_qty]" class="form-control" placeholder="Max Qty" step="0.01" min="0">
                    </div>
                    <div class="col-md-4">
                        <input type="number" name="cutting[customesize][${customIndex}][price]" class="form-control" placeholder="Price" step="0.01" min="0">
                    </div>
                    <div class="col-md-12 text-end mt-2">
                        <button type="button" class="btn btn-danger remove-customeshape"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
            `;
                $('#customeshapeFieldsContainer').append(newRow);
                customIndex++;
            });

            // Remove row for Trim to Size
            $(document).on('click', '.remove-trimtosize', function() {
                $(this).closest('.trimtosize-price-fields').remove();
            });

            // Remove row for Custom Shape
            $(document).on('click', '.remove-customeshape', function() {
                $(this).closest('.customeshape-price-fields').remove();
            });
        });
    </script>
@endsection
