@extends('layouts.app')

@section('customcss')
    <style>
        .btn.btnchange {
            background-color: #543B8C !important;
            /* Change the background color when active */
            color: #fff;
            /* Change the text color when active */
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
    </style>
    <style>
        .hidden {
            display: none;
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
                    <h1>Create Product</h1>
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
            <form action="" method="POST" id="productform" name="productform">

                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="product_name">Product Name</label>
                                            <input type="text" name="product_name" id="product_name" class="form-control"
                                                placeholder="Product Name">
                                            <p class="error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="product_slug">Product Slug</label>
                                            <input type="text" readonly name="product_slug" id="product_slug"
                                                class="form-control" placeholder="Product Slug">
                                            <p class="error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="product_short_description">Short Description</label>
                                            <textarea name="product_short_description" id="product_short_description" cols="30" rows="10"
                                                class="summernote" data-placeholder="Enter your short description here"></textarea>
                                        </div>
                                    </div>                                    
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="product_description">Description</label>
                                            <textarea name="product_description" id="product_description" cols="30" rows="10" class="summernote"
                                                placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="product_key_feature">Key Feature</label>
                                            <textarea name="product_key_feature" id="product_key_feature" cols="30" rows="10" class="summernote"
                                                placeholder="Key Feature"></textarea>
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

                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Pricing</h2>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="product_price">Basics Price</label>
                                            <input type="text" name="product_price" id="product_price"
                                                class="form-control" placeholder="Price">
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="product_discounted_price">Discount Price</label>
                                            <input type="text" name="product_discounted_price"
                                                id="product_discounted_price" class="form-control"
                                                placeholder="Discount Price">
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
                                            <input type="text" name="product_sku" id="product_sku" class="form-control"
                                                placeholder="Product SKU    ">
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="barcode">Barcode</label>
                                        <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode">
                                    </div>
                                </div>    
                                    <div class="col-md-12">
                                        {{-- <div class="mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="track_qty" name="track_qty" checked>
                                            <label for="track_qty" class="custom-control-label">Track Quantity</label>
                                        </div>
                                    </div> 
                                        <div class="mb-3">
                                            <input type="number" min="0" name="product_quantity"
                                                id="product_quantity" class="form-control" placeholder="Qty">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>--}}
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Product Information</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="product_meta_title">Meta Title</label>
                                            <input type="text" name="product_meta_title" id="product_meta_title"
                                                class="form-control" placeholder="Category Title">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="product_meta_desp">meta Description</label>
                                            <input type="text" name="product_meta_desp" id="product_meta_desp"
                                                class="form-control" placeholder="Category Description">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="product_meta_keyword">Meta Keyword</label>
                                            <input type="text" name="product_meta_keyword" id="product_meta_keyword"
                                                class="form-control" placeholder="Meta Keyword">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="product_tag">Product Tag</label>
                                            <input type="text" name="product_tag" id="product_tag"
                                                class="form-control" placeholder="Product Tag">
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
                                                <button type="button" id="togglePriceCardBtn"
                                                    class="btn btn-info btnchange">Custom Product Price</button>
                                                <button type="button" id="toggleProductSizeBtn"
                                                    class="btn btn-info btnchange">Size Option</button>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product Price Option Card (Initially Hidden) -->
                        <div class="card mb-3" id="priceCard" style="display: none;">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Coustom Price Option</h2>
                                <div id="priceOptionsContainer">
                                    <div class="row price">
                                        <div class="col-md-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="priceOption"
                                                    id="priceOptionRollMedia" value="rollMedia">
                                                <label class="form-check-label" for="priceOptionRollMedia">Roll
                                                    Media</label>
                                            </div>
                                            {{-- <div class="form-check">
                                                <input class="form-check-input" type="radio" name="priceOption"
                                                    id="priceOptionRigidMedia" value="rigidMedia">
                                                <label class="form-check-label" for="priceOptionRigidMedia">Rigid
                                                    Media</label>
                                            </div> --}}
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="priceOption"
                                                    id="priceOptionFixed" value="fixed">
                                                <label class="form-check-label" for="priceOptionFixed">Fixed</label>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                <!-- Container for Roll Media Fields -->
                                <div id="rollMediaContainer" class="hidden">
                                    <div class="rollMediaFieldSet row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="min_range">Minimum Range (Total Sq Mtr.)</label>
                                                <input type="number" name="min_range[]" class="form-control"
                                                    placeholder="min mm" min="0" step="1">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="max_range">Maximum Range (Total Sq Mtr.)</label>
                                                <input type="number" name="max_range[]" class="form-control"
                                                    placeholder="max mm" min="0" step="1">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="roll_price">Price</label>
                                                <input type="number" name="roll_price[]" class="form-control"
                                                    placeholder="Price" min="0" step="1">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Container for Fixed Media Fields -->
                                <div id="fixedMediaContainer" class="hidden">
                                    <div class="fixedMediaFieldSet row mb-3">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="fixed_dimensions">Size Dimensions (W X H)</label>
                                                <input type="text" name="fixed_dimensions[]" class="form-control" placeholder="Size Dimensions" min="0" step="1">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="fixed_min_qty">Min Qty Range</label>
                                                <input type="number" name="fixed_min_qty[]" class="form-control" placeholder="Min Qty Range" min="0" step="1">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="fixed_max_qty">Max Qty Range</label>
                                                <input type="number" name="fixed_max_qty[]" class="form-control" placeholder="Max Qty Range" min="0" step="1">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="fixed_price">Price</label>
                                                <input type="number" name="fixed_price[]" class="form-control" placeholder="Price" min="0" step="1">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-danger removeFixedBtn">Remove</button>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" id="addRollMediaFieldsBtn" class="btn btn-success">Add
                                    More</button>
                                <button type="button" id="addFixedMediaFieldsBtn" class="btn btn-success">Add
                                    More</button>
                                
                            </div>
                          
                        </div>



                        <!-- Product Size Option Card (Initially Hidden) -->
                        <div class="card mb-3" id="productSizeCard" style="display: none;">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Product Size Option</h2>
                                <div id="sizeFieldsContainer">
                                    <div class="row size-fields">
                                        
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="product_width">Width MM</label>
                                                <input type="number" name="product_width[]" class="form-control"
                                                    placeholder="Width mm" min="0" step="1">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="product_height">Height MM</label>
                                                <input type="number" name="product_height[]" class="form-control"
                                                    placeholder="Height mm" min="0" step="1">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger removeBtn">Remove</button>
                                        </div>
                                    </div>

                                </div>
                                <button type="button" id="addFieldsBtn" class="btn btn-success">Add More</button>
                            </div>
                        </div>

                        <!-- Product Color Option Card (Initially Hidden) -->
                        <div class="card mb-3" id="productColorCard" style="display: none;">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Color Option</h2>
                                <div id="colorFieldsContainer">
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
                                </div>
                                <button type="button" id="addColurFieldsBtn" class="btn btn-success">Add More</button>
                            </div>
                        </div>

                        <!-- Product Print Side Option Card (Initially Hidden) -->
                        <div class="card mb-3" id="productPrintSideCard" style="display: none;">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Print Side Option</h2>
                                <div id="sideFieldsContainer">
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
                                </div>
                                <button type="button" id="addPrintSideBtn" class="btn btn-success">Add More</button>
                            </div>
                        </div>

                        <!-- Product Finishing Option Card (Initially Hidden) -->
                        <div class="card mb-3" id="productFinishingCard" style="display: none;">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Finishing Option</h2>
                                <div id="finishingFieldsContainer">
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
                                </div>
                                <button type="button" id="addFinishingBtn" class="btn btn-success">Add More</button>
                            </div>
                        </div>

                        <!-- Product Thickness Option Card (Initially Hidden) -->
                        <div class="card mb-3" id="productThicknessCard" style="display: none;">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Thickness Option</h2>
                                <div id="thicknessFieldsContainer">
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
                                </div>
                                <button type="button" id="addThicknessBtn" class="btn btn-success">Add More</button>
                            </div>
                        </div>
                        <!-- Wire Stakes QTY Option Card (Initially Hidden) -->
                        <div class="card mb-3" id="productWireStakesQtyCard" style="display: none;">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Wire Stakes QTY Option</h2>
                                <div id="wirestakesqtyFieldsContainer">
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
                                </div>
                                <button type="button" id="addWireStakesQtyBtn" class="btn btn-success">Add More</button>
                            </div>
                        </div>
                        <!-- Product Frame Size Option Card (Initially Hidden) -->
                        <div class="card mb-3" id="productFrameSizeCard" style="display: none;">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Frame Size Option</h2>
                                <div id="framesizeFieldsContainer">
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
                                </div>
                                <button type="button" id="addFrameSizeBtn" class="btn btn-success">Add More</button>
                            </div>
                        </div>
                        <!-- Product displaytyp Option Card (Initially Hidden) -->
                        <div class="card mb-3" id="productDisplayTypeCard" style="display: none;">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Display Type Option</h2>
                                <div id="displaytypeFieldsContainer">
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
                                </div>
                                <button type="button" id="addDisplayTypeBtn" class="btn btn-success">Add More</button>
                            </div>
                        </div>
                        <!-- Product Installation Option Card (Initially Hidden) -->
                        <div class="card mb-3" id="productInstallationCard" style="display: none;">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Installation Option</h2>
                                <div id="installationFieldsContainer">
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
                                </div>
                                <button type="button" id="addInstallationBtn" class="btn btn-success">Add More</button>
                            </div>
                        </div>
                        <!-- Product Material Option Card (Initially Hidden) -->
                        <div class="card mb-3" id="productMaterialCard" style="display: none;">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Material Option</h2>
                                <div id="materialFieldsContainer">
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
                                </div>
                                <button type="button" id="addMaterialBtn" class="btn btn-success">Add More</button>
                            </div>
                        </div>
                        <!-- Product Corners Option Card (Initially Hidden) -->
                        <div class="card mb-3" id="productCornersCard" style="display: none;">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Corners Option</h2>
                                <div id="cornersFieldsContainer">
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
                                </div>
                                <button type="button" id="addCornersBtn" class="btn btn-success">Add More</button>
                            </div>
                        </div>
                        <!-- Product Application Option Card (Initially Hidden) -->
                        <div class="card mb-3" id="productApplicationCard" style="display: none;">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Application Option</h2>
                                <div id="applicationFieldsContainer">
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
                                </div>
                                <button type="button" id="addApplicationBtn" class="btn btn-success">Add More</button>
                            </div>
                        </div>
                        <!-- Product Paper Thickness Option Card (Initially Hidden) -->
                        <div class="card mb-3" id="productPaperThicknessCard" style="display: none;">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Paper Thickness Option</h2>
                                <div id="paperthicknessFieldsContainer">
                                    <div class="row paperthickness">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="product_paperthickness">Paper Thickness</label>
                                                <input type="text" name="product_paperthickness[]"
                                                    class="form-control" placeholder="PaperThickness">
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
                                </div>
                                <button type="button" id="addqtyBtn" class="btn btn-success">Add More</button>
                            </div>
                        </div>

                        <!-- Product Pages in Book Option Card (Initially Hidden) -->
                        <div class="card mb-3" id="productPagesinBookCard" style="display: none;">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Pages in Book Option</h2>
                                <div id="pagesinbookFieldsContainer">
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
                                </div>
                                <button type="button" id="addPagesinBookBtn" class="btn btn-success">Add More</button>
                            </div>
                        </div>
                        <!-- Product Thickness Option Card (Initially Hidden) -->
                        <div class="card mb-3" id="productCopiesRequiredCard" style="display: none;">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Copies Required Option</h2>
                                <div id="copiesrequiredFieldsContainer">
                                    <div class="row copiesrequired">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="product_copiesrequired">Copies Required</label>
                                                <input type="text" name="product_copiesrequired[]"
                                                    class="form-control" placeholder="Thickness">
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
                                </div>
                                <button type="button" id="addCopiesRequiredBtn" class="btn btn-success">Add
                                    More</button>
                            </div>
                        </div>
                        <!-- Product Pages in Notepad Option Card (Initially Hidden) -->
                        <div class="card mb-3" id="productPagesinNotepadCard" style="display: none;">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Pages in Notepad Option</h2>
                                <div id="pagesinnotepadFieldsContainer">
                                    <div class="row pagesinnotepad">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="product_pagesinnotepad">Thickness</label>
                                                <input type="text" name="product_pagesinnotepad[]"
                                                    class="form-control" placeholder="Pages in Notepad">
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
                                </div>
                                <button type="button" id="addPagesinNotepadBtn" class="btn btn-success">Add
                                    More</button>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Product FAQs</h2>
                                <div id="faqsContainer">
                                    <div class="row faqsContainer">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="question">Question</label>
                                                <textarea name="product_question[]" id="product_question" cols="30" rows="10" class="summernote"
                                                    placeholder="Question"></textarea>
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="answer">Answer</label>
                                                <textarea name="product_answer[]" id="product_answer" cols="30" rows="10" class="summernote"
                                                    placeholder="Answer"></textarea>
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-right">
                                            <button type="button" class="btn btn-danger removeBtn" style="display:none;">Remove</button>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" id="addFaqsBtn" class="btn btn-success">Add More FAQs</button>
                            </div>
                        </div>



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
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Product status</h2>
                                <div class="mb-3">
                                    <select name="product_status" id="product_status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Block</option>
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
                                        @if ($category->isNotEmpty())
                                            <!-- Checking if the $category collection is not empty -->
                                            <option value="">Select Category</option>
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}">{{ $item->cat_name }}</option>
                                            @endforeach
                                        @else
                                            <option value="">No categories found</option>
                                        @endif
                                    </select>

                                </div>
                                <div class="mb-3">
                                    <label for="category">Sub Category Name</label>
                                    <select name="subcategory_id" id="subcategory_id" class="form-control">
                                        <option value="">Select Sub Category</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Most Popular product</h2>
                                <div class="mb-3">
                                    <select name="product_feature" id="product_feature" class="form-control">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Custom Size Allow</h2>
                                <div class="mb-3">
                                    <select name="product_allows_custom_size" id="product_allows_custom_size" class="form-control">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="products.html" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
    <!-- /.content-wrapper -->

@endsection

@section('customjs')
    <script>
        $(document).ready(function() {

            // Toggle Product Size Options
            $("#toggleProductSizeBtn").click(function() {
                $(this).toggleClass("active");
                disableCheckButton('#productSizeCard input[type="number"]', '#toggleProductSizeBtn');
            });

            // Toggle Product Color Options
            $("#toggleProductColorBtn").click(function() {
                $(this).toggleClass("active");
                disableCheckButton('#productColorCard input[type="text"]', '#toggleProductColorBtn');
            });

            // Toggle Product Print Side Options
            $("#toggleProductPrintSideBtn").click(function() {
                $(this).toggleClass("active");
                disableCheckButton('#productPrintSideCard input[type="text"]',
                '#toggleProductPrintSideBtn');
            });

            // Toggle Product Finishing Options
            $("#toggleFinishingBtn").click(function() {
                $(this).toggleClass("active");
                disableCheckButton('#productFinishingCard input[type="text"]', '#toggleFinishingBtn');
            });

            // Toggle Product Thickness Options
            $("#toggleThicknessBtn").click(function() {
                $(this).toggleClass("active");
                disableCheckButton('#productThicknessCard input[type="text"]', '#toggleThicknessBtn');
            });
            // Toggle Wire Stakes QTY Options
            $("#toggleWireStakesQtyBtn").click(function() {
                $(this).toggleClass("active");
                disableCheckButton('#productWireStakesQtyCard input[type="text"]',
                    '#toggleWireStakesQtyBtn');
            });
            // Toggle Frame Size Options
            $("#toggleFrameSizeBtn").click(function() {
                $(this).toggleClass("active");
                disableCheckButton('#productFrameSizeCard input[type="text"]', '#toggleFrameSizeBtn');
            });
            // Toggle Display Type Options
            $("#toggleDisplayTypeBtn").click(function() {
                $(this).toggleClass("active");
                disableCheckButton('#productDisplayTypeCard input[type="text"]', '#toggleDisplayTypeBtn');
            });
            // Toggle Installation Options
            $("#toggleInstallationBtn").click(function() {
                $(this).toggleClass("active");
                disableCheckButton('#productInstallationCard input[type="text"]', '#toggleInstallationBtn');
            });
            // Toggle Material Options
            $("#toggleMaterialBtn").click(function() {
                $(this).toggleClass("active");
                disableCheckButton('#productMaterialCard input[type="text"]', '#toggleMaterialBtn');
            });
            // Toggle Corners Options
            $("#toggleCornersBtn").click(function() {
                $(this).toggleClass("active");
                disableCheckButton('#productCornersCard input[type="text"]', '#toggleCornersBtn');
            });
            // Toggle Application Options
            $("#toggleApplicationBtn").click(function() {
                $(this).toggleClass("active");
                disableCheckButton('#productApplicationCard input[type="text"]', '#toggleApplicationBtn');
            });
            // Toggle Paper Thickness Options
            $("#togglePaperThicknessBtn").click(function() {
                $(this).toggleClass("active");
                disableCheckButton('#productPaperThicknessCard input[type="text"]',
                    '#togglePaperThicknessBtn');
            });
            // Toggle QTY Options
            $("#toggleQtyBtn").click(function() {
                $(this).toggleClass("active");
                disableCheckButton('#productQtyCard input[type="text"]', '#toggleQtyBtn');
            });
            // Toggle Pages in Book Options
            $("#togglePagesinBookBtn").click(function() {
                $(this).toggleClass("active");
                disableCheckButton('#productPagesinBookCard input[type="text"]', '#toggleThicknessBtn');
            });
            // Toggle Copies Required Options
            $("#toggleCopiesRequiredBtn").click(function() {
                $(this).toggleClass("active");
                disableCheckButton('#productCopiesRequiredCard input[type="text"]',
                    '#toggleCopiesRequiredBtn');
            });
            // Toggle Pages in Notepad Options
            $("#togglePagesinNotepadBtn").click(function() {
                $(this).toggleClass("active");
                disableCheckButton('#productPagesinNotepadCard input[type="text"]',
                    '#togglePagesinNotepadBtn');
            });

            // Function to toggle the visibility of a card section
            function toggleCardVisibility(buttonId, cardId) {
                $(buttonId).click(function() {
                    $(cardId).toggle(); // Toggle the visibility of the card section
                });
            }

            // Toggle Product Size Option
            toggleCardVisibility('#toggleProductSizeBtn', '#productSizeCard');

            // Toggle Product Color Option
            toggleCardVisibility('#toggleProductColorBtn', '#productColorCard');

            // Toggle Product Print Side Option
            toggleCardVisibility('#toggleProductPrintSideBtn', '#productPrintSideCard');

            // Toggle Finishing Option
            toggleCardVisibility('#toggleFinishingBtn', '#productFinishingCard');

            // Toggle Thickness Option
            toggleCardVisibility('#toggleThicknessBtn', '#productThicknessCard');

            // Toggle Wire Stakes QTY Option
            toggleCardVisibility('#toggleWireStakesQtyBtn', '#productWireStakesQtyCard');

            // Toggle Frame Size Options
            toggleCardVisibility('#toggleFrameSizeBtn', '#productFrameSizeCard');

            // Toggle Display Type Options
            toggleCardVisibility('#toggleDisplayTypeBtn', '#productDisplayTypeCard');

            // Toggle Installation Options
            toggleCardVisibility('#toggleInstallationBtn', '#productInstallationCard');

            // Toggle Material Options
            toggleCardVisibility('#toggleMaterialBtn', '#productMaterialCard');

            // Toggle Corners Options
            toggleCardVisibility('#toggleCornersBtn', '#productCornersCard');

            // Toggle Application Options
            toggleCardVisibility('#toggleApplicationBtn', '#productApplicationCard');

            // Toggle Paper Thickness Options
            toggleCardVisibility('#togglePaperThicknessBtn', '#productPaperThicknessCard');

            // Toggle QTY Options
            toggleCardVisibility('#toggleQtyBtn', '#productQtyCard');

            // Toggle Pages in Book Options
            toggleCardVisibility('#togglePagesinBookBtn', '#productPagesinBookCard');

            // Toggle Copies Required Options
            toggleCardVisibility('#toggleCopiesRequiredBtn', '#productCopiesRequiredCard');

            // Toggle Pages in Notepad Options
            toggleCardVisibility('#togglePagesinNotepadBtn', '#productPagesinNotepadCard');


            // Function to update the visibility of remove buttons for any group
            function updateRemoveButtons(containerSelector, buttonSelector) {
                if ($(containerSelector).children().length === 1) {
                    $(containerSelector).find(buttonSelector).hide();
                } else {
                    $(containerSelector).find(buttonSelector).show();
                }
            }

           // General function to add fields
            function addFields(buttonSelector, containerSelector, classSelector) {
                $(buttonSelector).click(function() {
                    var clone = $(classSelector).first().clone();
                    clone.find('input[type="text"], input[type="number"]').val(""); // Clear both text and number input values
                    $(containerSelector).append(clone);
                    updateRemoveButtons(containerSelector, '.removeBtn'); // Update visibility of remove buttons
                });
            }

            // Remove fields
            function setupRemoveButtons(containerSelector) {
                $(containerSelector).on('click', '.removeBtn', function() {
                    if ($(containerSelector).children().length > 1) {
                        var inputFields = $(this).closest('.row').find('input[type="text"], input[type="number"]');
                        // Only remove if all input fields are empty
                        var allFieldsEmpty = true;
                        inputFields.each(function() {
                            if ($(this).val().trim() !== '') {
                                allFieldsEmpty = false;
                            }
                        });

                        if (allFieldsEmpty) {
                            $(this).closest('.row').remove();
                            updateRemoveButtons(containerSelector, '.removeBtn'); // Update visibility of remove buttons
                        }
                    }
                });
            }


            // Function to disable check button if input field has value
            function disableCheckButton(inputSelector, buttonSelector) {
                $(inputSelector).on('input', function() {
                    if ($(this).val().trim() !== '') {
                        $(buttonSelector).prop('disabled', true);
                    } else {
                        $(buttonSelector).prop('disabled', false);
                    }
                });
            }

            // Initialize functionality for different fields
            addFields('#addFieldsBtn', '#sizeFieldsContainer', '.size-fields');
            addFields('#addColurFieldsBtn', '#colorFieldsContainer', '.color');
            addFields('#addPrintSideBtn', '#sideFieldsContainer', '.side');
            addFields('#addFinishingBtn', '#finishingFieldsContainer', '.finishing');
            addFields('#addThicknessBtn', '#thicknessFieldsContainer', '.thickness');
            addFields('#addWireStakesQtyBtn', '#wirestakesqtyFieldsContainer', '.wirestakesqty');
            addFields('#addFrameSizeBtn', '#framesizeFieldsContainer', '.framesize');
            addFields('#addDisplayTypeBtn', '#displaytypeFieldsContainer', '.displaytype');
            addFields('#addInstallationBtn', '#installationFieldsContainer', '.installation');
            addFields('#addMaterialBtn', '#materialFieldsContainer', '.material');
            addFields('#addCornersBtn', '#cornersFieldsContainer', '.Corners');
            addFields('#addApplicationBtn', '#applicationFieldsContainer', '.application');
            addFields('#addPaperThicknessBtn', '#paperthicknessFieldsContainer', '.paperthickness');
            addFields('#addqtyBtn', '#qtyFieldsContainer', '.qty');
            addFields('#addPagesinBookBtn', '#pagesinbookFieldsContainer', '.pagesinbook');
            addFields('#addCopiesRequiredBtn', '#copiesrequiredFieldsContainer', '.copiesrequired');
            addFields('#addPagesinNotepadBtn', '#pagesinnotepadFieldsContainer', '.pagesinnotepad');

            setupRemoveButtons('#sizeFieldsContainer');
            setupRemoveButtons('#colorFieldsContainer');
            setupRemoveButtons('#sideFieldsContainer');
            setupRemoveButtons('#finishingFieldsContainer');
            setupRemoveButtons('#thicknessFieldsContainer');
            setupRemoveButtons('#wirestakesqtyFieldsContainer');
            setupRemoveButtons('#framesizeFieldsContainer');
            setupRemoveButtons('#displaytypeFieldsContainer');
            setupRemoveButtons('#installationFieldsContainer');
            setupRemoveButtons('#materialFieldsContainer');
            setupRemoveButtons('#cornersFieldsContainer');
            setupRemoveButtons('#applicationFieldsContainer');
            setupRemoveButtons('#paperthicknessFieldsContainer');
            setupRemoveButtons('#qtyFieldsContainer');
            setupRemoveButtons('#pagesinbookFieldsContainer');
            setupRemoveButtons('#copiesrequiredFieldsContainer');
            setupRemoveButtons('#pagesinnotepadFieldsContainer');

            // Initialize disable check button functionality for input fields
            disableCheckButton('#productSizeCard input[type="number"]', '#toggleProductSizeBtn');
            disableCheckButton('#productColorCard input[type="text"]', '#toggleProductColorBtn');
            disableCheckButton('#productPrintSideCard input[type="text"]', '#toggleProductPrintSideBtn');
            disableCheckButton('#productFinishingCard input[type="text"]', '#toggleFinishingBtn');
            disableCheckButton('#productThicknessCard input[type="text"]', '#toggleThicknessBtn');
            disableCheckButton('#productWireStakesQtyCard input[type="text"]', '#toggleWireStakesQtyBtn');
            disableCheckButton('#productFrameSizeCard input[type="text"]', '#toggleFrameSizeBtn');
            disableCheckButton('#productDisplayTypeCard input[type="text"]', '#toggleDisplayTypeBtn');
            disableCheckButton('#productInstallationCard input[type="text"]', '#toggleInstallationBtn');
            disableCheckButton('#productMaterialCard input[type="text"]', '#toggleMaterialBtn');
            disableCheckButton('#productCornersCard input[type="text"]', '#toggleCornersBtn');
            disableCheckButton('#productApplicationCard input[type="text"]', '#toggleApplicationBtn');
            disableCheckButton('#productPaperThicknessCard input[type="text"]', '#togglePaperThicknessBtn');
            disableCheckButton('#productQtyCard input[type="text"]', '#toggleQtyBtn');
            disableCheckButton('#productPagesinBookCard input[type="text"]', '#togglePagesinBookBtn');
            disableCheckButton('#productCopiesRequiredCard input[type="text"]', '#toggleCopiesRequiredBtn');
            disableCheckButton('#productPagesinNotepadCard input[type="text"]', '#togglePagesinNotepadBtn');

            // Initial update calls
            updateRemoveButtons('#productSizeCard', '.removeBtn');
            updateRemoveButtons('#productColorCard', '.removeBtn');
            updateRemoveButtons('#productPrintSideCard', '.removeBtn');
            updateRemoveButtons('#productFinishingCard', '.removeBtn');
            updateRemoveButtons('#productThicknessCard', '.removeBtn');
            updateRemoveButtons('#productWireStakesQtyCard', '.removeBtn');
            updateRemoveButtons('#productFrameSizeCard', '.removeBtn');
            updateRemoveButtons('#productDisplayTypeCard', '.removeBtn');
            updateRemoveButtons('#productInstallationCard', '.removeBtn');
            updateRemoveButtons('#productMaterialCard', '.removeBtn');
            updateRemoveButtons('#productCornersCard', '.removeBtn');
            updateRemoveButtons('#productApplicationCard', '.removeBtn');
            updateRemoveButtons('#productPaperThicknessCard', '.removeBtn');
            updateRemoveButtons('#productQtyCard', '.removeBtn');
            updateRemoveButtons('#productPagesinBookCard', '.removeBtn');
            updateRemoveButtons('#productCopiesRequiredCard', '.removeBtn');
            updateRemoveButtons('#productPagesinNotepadCard', '.removeBtn');
        });
    </script>

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
        $("#productform").submit(function(event) {
            event.preventDefault();
            var element = $(this);

            $("button[type=submit]").prop('disabled', true);

            $.ajax({
                url: '{{ route('products.store') }}',
                type: 'post',
                data: element.serializeArray(),
                dataType: 'json',
                success: function(response) {

                    $("button[type=submit]").prop('disabled', false);

                    if (response["status"] == true) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Product has been saved successfully!',
                            timer: 3000,
                            showConfirmButton: false
                        });

                        window.location.href = "{{ route('products.index') }}";
                        $('#product_name').removeClass('is-invalid').siblings('p').removeClass(
                            'invalid-feedback').html("");
                        $('#product_slug').removeClass('is-invalid').siblings('p').removeClass(
                            'invalid-feedback').html("");

                    } else {
                        var errors = response['errors'];
                        $(".error").removeClass('invalid-feedback').html('');
                        $("input[type='text'], select").removeClass('is-invalid');

                        $.each(errors, function(key, value) {
                            $(`#${key}`)
                                .addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback').html(value);
                        });

                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Please correct the highlighted errors.',
                            timer: 3000,
                            showConfirmButton: false
                        });
                    }
                },
                error: function(jqXHR, exception) {
                    $("button[type=submit]").prop('disabled', false);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Something went wrong. Please try again later.',
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
            url: "{{ route('temp-images.create') }}",
            maxFiles: 5,
            paramName: 'image',
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
        }
    </script>

    <script>
       
       $(document).ready(function() {
       
        $("#togglePriceCardBtn").click(function() {
            $(this).toggleClass("active");
            $("#priceCard").toggle();
            disableCheckButton('#priceCard input[type="text"]', '#togglePriceCardBtn');
        });

        
        $('input[name="priceOption"]').change(function() {
            if ($('#priceOptionRollMedia').is(':checked')) {
                $('#rollMediaContainer').removeClass('hidden');
                $('#fixedMediaContainer').addClass('hidden');
                $('#addRollMediaFieldsBtn').show();
                $('#addFixedMediaFieldsBtn').hide();
                clearFixedMediaFields();  // Clear Fixed Media fields
            } else if ($('#priceOptionFixed').is(':checked')) {
                $('#fixedMediaContainer').removeClass('hidden');
                $('#rollMediaContainer').addClass('hidden');
                $('#addRollMediaFieldsBtn').hide();
                $('#addFixedMediaFieldsBtn').show();
                clearRollMediaFields();  // Clear Roll Media fields
            }
        });

        
        $('#addRollMediaFieldsBtn').click(function() {
            addRollMediaFields();
        });
        $('#addFixedMediaFieldsBtn').click(function() {
            addFixedMediaFields();
        });

        function addRollMediaFields() {
            const newFieldSet = $('.rollMediaFieldSet').first().clone();
            newFieldSet.find('input').val(''); 
            newFieldSet.find('.removeBtn').click(function() {
                $(this).closest('.rollMediaFieldSet').remove();
                checkRollMediaFields();
            });
            $('#rollMediaContainer').append(newFieldSet);
            checkRollMediaFields();
        }

        // Add Fixed Media fields function
        function addFixedMediaFields() {
            const newFieldSet = $('.fixedMediaFieldSet').first().clone();
            newFieldSet.find('input').val(''); 
            newFieldSet.find('.removeFixedBtn').click(function() {
                $(this).closest('.fixedMediaFieldSet').remove();
                checkFixedMediaFields();
            });
            $('#fixedMediaContainer').append(newFieldSet);
            checkFixedMediaFields();
        }

        $(document).on('click', '.removeBtn', function() {
            $(this).closest('.rollMediaFieldSet').remove();
            checkRollMediaFields();
        });

        
        $(document).on('click', '.removeFixedBtn', function() {
            $(this).closest('.fixedMediaFieldSet').remove();
            checkFixedMediaFields();
        });

        function checkRollMediaFields() {
            const rollMediaFieldSets = $('#rollMediaContainer').children('.rollMediaFieldSet');
            if (rollMediaFieldSets.length === 0) {
                addRollMediaFields(); 
            }
            if (rollMediaFieldSets.length === 1) {
                rollMediaFieldSets.find('.removeBtn').hide(); 
            } else {
                rollMediaFieldSets.find('.removeBtn').show(); 
            }
        }

        
        function checkFixedMediaFields() {
            const fixedMediaFieldSets = $('#fixedMediaContainer').children('.fixedMediaFieldSet');
            if (fixedMediaFieldSets.length === 0) {
                addFixedMediaFields(); 
            }
            if (fixedMediaFieldSets.length === 1) {
                fixedMediaFieldSets.find('.removeFixedBtn').hide(); 
            } else {
                fixedMediaFieldSets.find('.removeFixedBtn').show(); 
            }
        }
        function clearRollMediaFields() {
            $('#rollMediaContainer').find('input').val(''); 
        }

        
        function clearFixedMediaFields() {
            $('#fixedMediaContainer').find('input').val(''); 
        }

        function disableCheckButton(inputSelector, buttonSelector) {
            $(inputSelector).prop('disabled', function() {
                return !$(buttonSelector).hasClass('active');
            });
        }

        disableCheckButton('#priceCard input[type="text"]', '#togglePriceCardBtn');
        $('#rollMediaContainer').addClass('hidden');
        $('#fixedMediaContainer').addClass('hidden');
        $('#addRollMediaFieldsBtn').hide();
        $('#addFixedMediaFieldsBtn').hide();

        checkRollMediaFields();
        checkFixedMediaFields();
    });


    </script>
@endsection
