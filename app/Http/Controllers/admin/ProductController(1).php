<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PriceRange;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductImage;
use App\Models\ProductPrice;
use App\Models\SubCategory;
use App\Models\TempImage;
use App\Models\FixedPriceOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        $products = Product::select('product.*', 'categories.cat_name as categoryName', 'sub_categories.cat_sub_name as subcategoryName')
            ->latest('id')
            ->leftJoin('categories', 'categories.id', '=', 'product.category_id')
            ->leftJoin('sub_categories', 'sub_categories.id', '=', 'product.subcategory_id')
        // ->leftJoin('products_attributes', 'products_attributes.id', '=', 'product.product_id')
            ->with('product_images');

            // dd($products);
        if (!empty($request->get('keyword'))) {
            $products = $products->where('product_name', 'like', '%' . $request->get('keyword') . '%');
        }

        $products = $products->paginate(5);

        return view('admin.products.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::orderBy('cat_name')->get();
        $data['category'] = $categories;
        $subcategories = Category::orderBy('cat_name')->get();
        $data['subcategory'] = $subcategories;

        // Uncomment the following line for debugging purposes
        // print_r($data['category']); die;

        return view('admin.products.create', $data);
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $rules = [
            'product_name' => 'required',
            'product_slug' => 'required|unique:product',
            // 'product_sku' => 'required|numeric',
            'category_id' => 'required|numeric',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            $product = new Product;
            $product->product_name = $request->product_name;
            $product->product_slug = $request->product_slug;
            $product->product_sku = $request->product_sku;
            $product->price_option = $request->priceOption;
            $product->product_description = $request->product_description;
            $product->product_rating_review = $request->product_rating_review;
            $product->product_price = $request->product_price;
            $product->product_discounted_price = $request->product_discounted_price;
            $product->category_id = $request->category_id;
            $product->subcategory_id = $request->subcategory_id;
            $product->product_meta_title = $request->product_meta_title;
            $product->product_meta_keyword = $request->product_meta_keyword;
            $product->product_meta_desp = $request->product_meta_desp;
            $product->product_status = $request->product_status;
            $product->product_tag = $request->product_tag;
            $product->product_short_description = $request->product_short_description;
            $product->product_feature = $request->product_feature;
            $product->product_allows_custom_size = $request->product_allows_custom_size;
            $product->product_key_feature = $request->product_key_feature;
            $product->product_question = $request->product_question;
            $product->product_answer = $request->product_answer;
            $product->related_products = (!empty($request->related_products)) ? implode(',', $request->related_products) : '';

            if (is_array($request->product_answer)) {
                $product->product_answer = implode('~', $request->product_answer);
            } else {
                $product->product_answer = $request->product_answer;
            }

            if (is_array($request->product_question)) {
                $product->product_question = implode('~', $request->product_question);
            } else {
                $product->product_question = $request->product_question;
            }
            $product->product_quantity = $request->product_quantity;
            $product->save();

            if (!empty($request->image_array)) {
                foreach ($request->image_array as $temp_image_id) {

                    $tempImageInfo = TempImage::find($temp_image_id);
                    $extArray = explode('.', $tempImageInfo->name);
                    $ext = last($extArray); // like jpg,gif,png etc

                    $productImage = new ProductImage();
                    $productImage->product_id = $product->id;
                    $productImage->image = 'NULL';
                    $productImage->save();

                    $imageName = $product->id . '-' . $productImage->id . '-' . time() . '.' . $ext;

                    $productImage->image = $imageName;
                    $productImage->save();

                    $sPath = public_path() . '/temp/' . $tempImageInfo->name;
                    $dPath = public_path() . '/uploads/product/' . $imageName;

                    File::copy($sPath, $dPath);

                    $product->product_image = $imageName;
                    $product->save();
                }
            }

            $this->createAttributes($request, $product);
            $this->createProductPriceDetail($request, $product);
            $this->createProductPriceRange($request, $product);
            $this->createFixedPrices($request, $product);

            $request->session()->flash('success', 'Product added successfully');

            return response()->json([
                'status' => true,
                'message' => 'Product added successfully',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }

    protected function createProductPriceDetail(Request $request, $product)
    {
        // dd($request->all());
        // Ensure $product is not null
        if (!is_null($product)) {
            // Retrieve the array inputs from the request
            $product_heights = $request->input('product_height');
            $product_widths = $request->input('product_width');

            // Ensure all arrays are not empty and have the same length
            if (!empty($product_heights) && !empty($product_widths)
                && count($product_heights) == count($product_widths)
               ) {

                // Iterate over each set of product dimensions
                foreach ($product_heights as $key => $height) {
                    $width = $product_widths[$key];
                    // $price_per_sq_meter_trim = $product_price_per_sq_meter_trims[$key];

                    // Check if detail values are not empty
                    if (!empty($height) && !empty($width)) {
                        // Calculate product_persqm based on width and height
                        $product_persqm = ($width * $height) / 1000000;

                        // Create and save product price detail
                        $productPriceDetail = new ProductPrice; // Assuming this is your model
                        $productPriceDetail->product_id = $product->id;
                        $productPriceDetail->product_width = $width;
                        $productPriceDetail->product_height = $height;
                        $productPriceDetail->product_persqm = $product_persqm;
                        $productPriceDetail->save();
                    }
                }
            } else {
                // Handle the case where any of the arrays are empty or have different lengths
                // Log an error, throw an exception, or handle it according to your application's logic
            }
        } else {
            // Handle the case where $product is null
            // Log an error, throw an exception, or handle it according to your application's logic
        }
    }


    protected function createProductPriceRange(Request $request, $product)
    {
        // Ensure $product is not null
        if (!is_null($product)) {

            // Retrieve the array inputs from the request
            $priceOption = $request->input('priceOption');
            $minRanges = $request->input('min_range', []);
            $maxRanges = $request->input('max_range', []);
            $prices = $request->input('roll_price', []);

            // dd(is_array($priceOption));
            // Ensure all inputs are arrays
            if (is_array($minRanges) && is_array($maxRanges) && is_array($prices)) {

                // dd($minRanges);
                // Ensure all arrays have the same length
                if (!empty($priceOption)) {
                    foreach ($minRanges as $index => $minRange) {
                        $maxRange = $maxRanges[$index];
                        $price = $prices[$index];

                        if ($minRange === null || $maxRange === null || $price === null) {
                            // Skip or handle missing or incomplete data entries
                            continue;
                        }

                        // Create and save each new Price Range entry
                        $priceRange = new PriceRange();
                        $priceRange->product_id = $product->id;
                        $priceRange->price_option = $priceOption;
                        $priceRange->min_range = $minRange;
                        $priceRange->max_range = $maxRange;
                        $priceRange->price = $price;
                        $priceRange->save();
                    }
                } else {
                    throw new \InvalidArgumentException("Price option is required.");
                }
            } else {

            }
        } else {

        }
    }

    protected function createAttributes(Request $request, $product)
    {
        // Define an array to hold all attribute arrays and their corresponding prices
        $attributeArrays = [
            'size' => $request->product_size,
            'color' => $request->product_color,
            'print_side' => $request->product_print_side,
            'finishing' => $request->product_finishing,
            'thickness' => $request->product_thickness,
            'wirestakesqty' => $request->product_wirestakesqty,
            'framesize' => $request->product_framesize,
            'displaytype' => $request->product_displaytype,
            'installation' => $request->product_installation,
            'material' => $request->product_material,
            'corners' => $request->product_corners,
            'application' => $request->product_application,
            'paperthickness' => $request->product_paperthickness,
            'qty' => $request->product_qty,
            'pagesinbook' => $request->product_pagesinbook,
            'copiesrequired' => $request->product_copiesrequired,
            'pagesinnotepad' => $request->product_pagesinnotepad,
        ];

        // Iterate over each attribute array and its corresponding price array
        foreach ($attributeArrays as $attributeName => $attributeArray) {
            // Check if the attribute array is not empty and has the same length as its corresponding price array
            if (!empty($attributeArray) && is_array($attributeArray) &&
                isset($request->{$attributeName . '_price'}) && is_array($request->{$attributeName . '_price'}) &&
                count($attributeArray) === count($request->{$attributeName . '_price'})) {
                // Iterate over the attribute array and create attributes
                foreach ($attributeArray as $index => $attribute) {
                    // Retrieve the corresponding price and quantity using the current index
                    $price = isset($request->{$attributeName . '_price'}[$index]) ? $request->{$attributeName . '_price'}[$index] : null;
                    // Create the attribute if its value is not empty
                    if (!empty($attribute)) {
                        $this->createAttribute($product->id, $attributeName, $attribute, $price);
                    }
                }
            }
        }
    }

    protected function createAttribute($productId, $attributeType, $attributeValue, $attributePrice)
    {
        // Check if attribute value is not empty before creating and saving the attribute
        if (!empty($attributeValue)) {
            $attribute = new ProductAttribute;
            $attribute->product_id = $productId;
            $attribute->attribute_type = $attributeType;
            $attribute->attribute_value = $attributeValue;
            $attribute->attribute_price = $attributePrice;
            $attribute->status = 1;
            $attribute->save();
        }
    }
    
    protected function createFixedPrices(Request $request, Product $product)
    {
        // Validation
        $request->validate([
            'fixed_dimensions' => 'required|array', // Must be an array of dimensions
            'fixed_dimensions.*' => 'regex:/^\d+(\.\d+)?\s?X\s?\d+(\.\d+)?$/', // Each value must match the format 'width X height'
            'fixed_price' => 'required|array', // Must be an array
            'fixed_price.*' => 'required|numeric|min:0', // Each price must be a number and at least 0
            'fixed_min_qty' => 'required|array', // Must be an array
            'fixed_min_qty.*' => 'required|integer|min:1', // Each min_qty must be an integer and at least 1
            'fixed_max_qty' => 'required|array', // Must be an array
            'fixed_max_qty.*' => 'required|integer|min:1', // Each max_qty must be an integer and at least 1
        ]);
    
        // Process the validated data
        if (!empty($request->fixed_dimensions) && !empty($request->fixed_price)) {
            foreach ($request->fixed_dimensions as $index => $dimension) {
                $dimensions = explode(' X ', $dimension); // Assuming '1000 X 5000' format
                $fixedPrice = new FixedPriceOption();
                $fixedPrice->product_id = $product->id;
                $fixedPrice->width = $dimensions[0]; // Assign width
                $fixedPrice->height = $dimensions[1]; // Assign height
                $fixedPrice->min_qty = $request->fixed_min_qty[$index]; // Corresponding min quantity
                $fixedPrice->max_qty = $request->fixed_max_qty[$index]; // Corresponding max quantity
                $fixedPrice->price = $request->fixed_price[$index]; 
                $fixedPrice->price_option = $request->priceOption;
                $fixedPrice->save();
            }
        }
    }
    


    public function edit($productId, Request $request)
    {
        // Retrieve the product with the given ID along with its related attributes and price ranges
        $product = Product::with(['product_attribute', 'price_ranges', 'fixed_price_options'])->find($productId);

        // dd($product);
        // If the product is not found, redirect back to the index page
        if (empty($product)) {
            return redirect()->route('products.index')->with('error', 'Product Not Found');
        }

        // fetch image
        $productImages = ProductImage::where('product_id', $product->id)->get();

        // Retrieve all categories and subcategories for populating dropdowns
        $categories = Category::orderBy('cat_name', 'ASC')->get();
        $subcategories = SubCategory::orderBy('cat_sub_name', 'ASC')->get();
        $price_range = PriceRange::where('product_id', $product->id)->get();

        // dd($price_range);
        $relatedProducts = [];

        // feach related products

        if ($product->related_products != '') {
            $productArray = explode(',', $product->related_products);
            $relatedProducts = Product::whereIn('id', $productArray)->get();

            // dd($relatedProducts);
        }

        // Pass the retrieved data to the view
        return view('admin.products.edit', compact('product', 'categories', 'subcategories', 'price_range','productImages', 'relatedProducts'));
    }
    public function update($productId, Request $request)
    {

        // dd($request);

        $product = Product::find($productId);

        // dd($product);

        if (empty($product)) {

            $request->session()->flash('error', 'Product Not Found');
            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => 'Product not found',
            ]);
        }

        $rules = [
            'product_name' => 'required',
            'product_slug' => 'required|unique:product,product_slug,' . $productId . ',id',
            // 'product_sku' => 'required|unique:product,product_sku,' . $productId . ',id',
            'category_id' => 'required|numeric',
            // 'product_size.*' => 'required|string',
            'product_price' => 'required|numeric',

        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {

            $product->product_name = $request->product_name;
            $product->product_slug = $request->product_slug;
            $product->product_sku = $request->product_sku;
            $product->product_description = $request->product_description;
            $product->product_price = $request->product_price;
            $product->product_rating_review = $request->product_rating_review;
            $product->product_image = $request->product_image;
            $product->product_discounted_price = $request->product_discounted_price;
            $product->category_id = $request->category_id;
            $product->subcategory_id = $request->subcategory_id;
            $product->product_meta_title = $request->product_meta_title;
            $product->product_meta_keyword = $request->product_meta_keyword;
            $product->product_meta_desp = $request->product_meta_desp;
            $product->product_status = $request->product_status;
            $product->product_tag = $request->product_tag;
            $product->product_feature = $request->product_feature;
            $product->product_allows_custom_size = $request->product_allows_custom_size;
            $product->product_quantity = $request->product_quantity;
            $product->product_short_description = $request->product_short_description;
            $product->product_key_feature = $request->product_key_feature;
            $product->product_question = $request->product_question;
            $product->product_answer = $request->product_answer;
            $product->related_products = (!empty($request->related_products)) ? implode(',', $request->related_products) : '';

            if (is_array($request->product_answer)) {
                // Assuming $request->product_color is an array of colors
                $product->product_answer = implode('~', $request->product_answer);
            } else {
                // If it's already a string, just assign it directly
                $product->product_answer = $request->product_answer;
            }
            if (is_array($request->product_question)) {
                // Assuming $request->product_color is an array of colors
                $product->product_question = implode('~', $request->product_question);
            } else {
                // If it's already a string, just assign it directly
                $product->product_question = $request->product_question;
            }

            $product->save();

            // Delete existing attributes and add new ones
            $product->product_attribute()->delete();
            $product->product_prices()->delete();
            $product->price_ranges()->delete();
            $product->fixed_price_options()->delete();

            $this->createAttributes($request, $product);
            $this->createProductPriceDetail($request, $product);
            $this->createProductPriceRange($request, $product);
            $this->createFixedPrices($request, $product);

            $request->session()->flash('success', 'product Updated Successfully');

            return response()->json([
                'status' => true,
                'message' => 'Product Updated Successfully',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }
    public function destroy($productId, Request $request)
    {
        $product = Product::find($productId);

        if (empty($product)) {
            // return redirect()->route('categories.index');
            $request->session()->flash('error', 'Product Not Found');
            return response()->json([
                'status' => true,
                'message' => 'Product Not Found',
            ]);
        }
        $productImages = ProductImage::where('product_id', $productId)->get();

        if (!empty($productImages)) {
            foreach ($productImages as $productimage) {
                File::delete(public_path() . '/uploads/product/' . $productimage->image);
            }
            ProductImage::where('product_id', $productId)->delete();

        }

        $product->delete();

        $request->session()->flash('success', 'Product Deleted Successfully');

        return response()->json([
            'status' => true,
            'message' => 'Product Deleted Successfully',
        ]);
    }

    public function getProducts(Request $request)
    {

        $tempProduct = [];

        if ($request->term != "") {
            $products = Product::where('product_name', 'like', '%' . $request->term . '%')->get();
            // $categoryProducts = Category::where('cat_name', 'like', '%' . $request->term . '%')->get();

            if ($products != null) {
                foreach ($products as $product) {
                    $tempProduct[] = array('id' => $product->id, 'text' => $product->product_name);
                }
                // foreach ($categoryProducts as $categoryProduct) {
                //     $tempProduct[] = array('id' => $categoryProduct->id, 'text' => $categoryProduct->cat_name);
                // }
            }
        }
        return response()->json([
            "tags" => $tempProduct,
            "status" => true,
        ]);
    }
}
