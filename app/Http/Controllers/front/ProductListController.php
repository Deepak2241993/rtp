<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductPrice;
use App\Models\RigidMedia;
use App\Models\PriceRange;
use App\Models\FixedPriceOption;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\alert;

class ProductListController extends Controller
{
    public function index(Request $request, $categorySlug = null, $subcategorySlug = null, $productSlug = null)
    {

        // dd($request->all());
        $categorySelected = "";
        $subCategorySelected = "";

        $categories = Category::orderBy('cat_name')->where('cat_status', 'Active')->get();
        $data['categories'] = $categories;
        $subcategories = SubCategory::orderBy('cat_sub_name')->get();
        $data['subcategories'] = $subcategories;
        $productsCount = Product::where('product_feature', 1)->where('product_status', 'active')->count();
        $data['productsCount'] = $productsCount;
        $currentproducts = Product::where('product_feature', 1)->where('product_status', 'active')->get();
        $data['currentProducts'] = $currentproducts;

        $products = Product::where('product_status', 'active');

        // apply filter

        if (!empty($categorySlug)) {
            $category = Category::where('cat_slug', $categorySlug)->first();
            $products = $products->where('category_id', $category->id);
            $categorySelected = $category->id;
        }
        if (!empty($subcategorySlug)) {
            $subcategory = SubCategory::where('cat_sub_slug', $subcategorySlug)->first();
            $products = $products->where('subcategory_id', $subcategory->id);
            $subCategorySelected = $subcategory->id;
        }
        if (!empty($productSlug)) {
            $products = Product::where('product_slug', $productSlug)->first();
        }

        $products = $products->orderBy('id', 'DESC');
        $products = $products->paginate(15);


        $data['products'] = $products;
        $data['categorySelected'] = $categorySelected;
        $data['subCategorySelected'] = $subCategorySelected;

        // dd($data);
        return (view('front.product-list', $data));
    }

    public function product($slug)
    {
        // slug 
        $product = Product::where('product_slug', $slug)
            ->withCount('product_ratings')
            ->withSum('product_ratings', 'rating')
            ->with(['product_images', 'product_ratings', 'product_attribute', 'product_prices', 'fixed_price_options','cuttingoption'])->first();

        if ($product == null) {
            abort(404);
        }

        $relatedProducts = [];

        // feach related products

        if ($product->related_products != '') {
            $productArray = explode(',', $product->related_products);
            $relatedProducts =  Product::whereIn('id', $productArray)->get();

            // dd($relatedProducts);
        }
        $token = date('YmdHis');

        $data['token'] = $token;
        $data['product'] = $product;
        $data['relatedProducts'] = $relatedProducts;

        // dd($data);

        // Rating Calulation
        // "product_ratings_count" => 0
        // "product_ratings_sum_rating" => null
        $avgRating = '0.00';
        $avgRatingPer = 0.00;
        if ($product->product_ratings_count > 0) {
            $avgRating = number_format(($product->product_ratings_sum_rating / $product->product_ratings_count), 2);
            $avgRatingPer = ($avgRating * 100) / 5;
        }
        $data['avgRating'] = $avgRating;
        $data['avgRatingPer'] = $avgRatingPer;


        // dd($data);
        return view('front.product', $data);
    }
    public function productlistAjax()
    {
        $products = Product::select('product_name')->where('product_status', 'active')->get();
        $categories = Category::select('cat_name')->where('cat_status', 'active')->get();
        $data = [];

        foreach ($products as $item) {
            $data[] = $item['product_name'];
        }
        foreach ($categories as $category) {
            $data[] = $category['cat_name'];
        }
        return $data;
    }
    public function searchProduct(Request $request)
    {

        $searched_product = $request->product_name;
        if ($searched_product != "") {
            $category = Category::where("cat_name", "LIKE", '%' . $searched_product . '%')->first();
            $product = Product::where("product_name", "LIKE", '%' . $searched_product . '%')->first();

            if ($category) {
                // Redirect to a page displaying products under this category
                return redirect()->route('front.product-list', $category->cat_slug);
            } elseif ($product) {
                // Redirect to the found product
                return redirect('product/' . $product->product_slug);
            } else {
                // No exact matches found, consider providing suggestions or refining the search
                return redirect()->back()->with("status", "No Categories or Products Matched Your Search");
            }
        } else {
            // Empty search query, redirect back
            return redirect()->back();
        }
    }

    // public function getPrice(Request $request)
    // {
    //     // Check if custom size is selected
    //     if ($request->size === 'Custom Size') {
    //         $height = $request->height;
    //         $width = $request->width;
    //         $quantity = $request->quantity;

    //         // Ensure height, width, and quantity are numeric and positive
    //         if (is_numeric($height) && $height > 0 && is_numeric($width) && $width > 0 && is_numeric($quantity) && $quantity > 0) {
    //             // Calculate area per square meter and total area based on quantity
    //             $perSqMeter = ($height * $width) / 1000000;
    //             $perSqMeterQty = $perSqMeter * $quantity;

    //             // Fetch price based on calculated area and quantity
    //             $price = DB::table('price_ranges')
    //                 ->where('product_id', $request->product_id)
    //                 ->where('min_range', '<=', $perSqMeterQty)
    //                 ->where('max_range', '>=', $perSqMeterQty)
    //                 ->value('price');

    //             if ($price !== null) {
    //                 // Calculate the total price based on the square meter price
    //                 $totalSquarePrice = $perSqMeterQty * $price;
    //                 $totalPrice = $totalSquarePrice;

    //                 // List of attributes for price adjustments
    //                 $attributes = [
    //                     'colors' => 'color',
    //                     'print_side' => 'print_side',
    //                     'finishings' => 'finishing',
    //                     'thickness' => 'thickness',
    //                     'wirestakesqtys' => 'wirestakesqty',
    //                     'framesizes' => 'framesize',
    //                     'displaytypes' => 'displaytype',
    //                     'installations' => 'installation',
    //                     'materials' => 'material',
    //                     'corners' => 'corners',
    //                     'applications' => 'application',
    //                     'paperthickness' => 'paperthickness',
    //                     'qtys' => 'qty',
    //                     'pagesinbooks' => 'pagesinbook',
    //                     'copiesrequireds' => 'copiesrequired',
    //                     'pagesinnotepads' => 'pagesinnotepad',
    //                 ];

    //                 // Adjust total price based on selected attributes
    //                 foreach ($attributes as $input => $type) {
    //                     $attributeValue = $request->input($input);
    //                     if (!empty($attributeValue)) {
    //                         $attribute = ProductAttribute::where('attribute_type', $type)
    //                             ->where('attribute_value', $attributeValue)
    //                             ->first();
    //                         if ($attribute) {
    //                             $totalPrice += $attribute->attribute_price;
    //                         }
    //                     }
    //                 }

    //                 // Return the total price including attribute adjustments
    //                 return response()->json(['price' => $totalPrice]);
    //             } else {
    //                 return response()->json(['error' => 'No price range found for the given area.'], 404);
    //             }
    //         } else {
    //             return response()->json(['error' => 'Height, width, and quantity must be numeric and positive values.'], 400);
    //         }
    //     }

    //     // Extract width and height from the size string
    //     $size = $request->size; // Example: "1000mm x 3000mm"
    //     list($width, $height) = array_map(function ($dimension) {
    //         return trim(str_replace('mm', '', $dimension));
    //     }, explode('x', $size));
    //     $quantity = $request->input('quantity');

    //     // Ensure width, height, and quantity are valid
    //     if (is_numeric($width) && $width > 0 && is_numeric($height) && $height > 0 && is_numeric($quantity) && $quantity > 0) {
    //         $perSqMeter = ($height * $width) / 1000000;
    //         $perSqMeterQty = $perSqMeter * $quantity;

    //         // Fetch price based on the calculated area and quantity
    //         $price = DB::table('price_ranges')
    //             ->where('product_id', $request->product_id)
    //             ->where('min_range', '<=', $perSqMeterQty)
    //             ->where('max_range', '>=', $perSqMeterQty)
    //             ->value('price');

    //         if ($price !== null) {
    //             // Calculate the total price based on square meter price
    //             $totalSquarePrice = $perSqMeterQty * $price;
    //             $totalPrice = $totalSquarePrice;

    //             // Adjust total price based on selected attributes
    //             $attributes = [
    //                 'colors' => 'color',
    //                 'print_side' => 'print_side',
    //                 'finishings' => 'finishing',
    //                 'thickness' => 'thickness',
    //                 'wirestakesqtys' => 'wirestakesqty',
    //                 'framesizes' => 'framesize',
    //                 'displaytypes' => 'displaytype',
    //                 'installations' => 'installation',
    //                 'materials' => 'material',
    //                 'corners' => 'corners',
    //                 'applications' => 'application',
    //                 'paperthickness' => 'paperthickness',
    //                 'qtys' => 'qty',
    //                 'pagesinbooks' => 'pagesinbook',
    //                 'copiesrequireds' => 'copiesrequired',
    //                 'pagesinnotepads' => 'pagesinnotepad',
    //             ];

    //             foreach ($attributes as $input => $type) {
    //                 $attributeValue = $request->input($input);
    //                 if (!empty($attributeValue)) {
    //                     $attribute = ProductAttribute::where('attribute_type', $type)
    //                         ->where('attribute_value', $attributeValue)
    //                         ->first();
    //                     if ($attribute) {
    //                         $totalPrice += $attribute->attribute_price;
    //                     }
    //                 }
    //             }

    //             return response()->json(['price' => $totalPrice]);
    //         } else {
    //             return response()->json(['error' => 'No price range found for the given area.'], 404);
    //         }
    //     }

    //     return response()->json(['error' => 'Invalid size or quantity provided.'], 400);
    // }
    public function getPrice(Request $request)
    {
       
        // Check if custom size is selected
        if ($request->size === 'Custom Size') {
            // dd($request->all()); 

            $height = $request->height;
            $width = $request->width;
            $quantity = $request->quantity;
            $priceOption = $request->price_option;
            $mediaType = $request->print_sides; // Assuming 'print_sides' is the media type field

            // Ensure height, width, and quantity are numeric and positive
            if (is_numeric($height) && $height > 0 && is_numeric($width) && $width > 0 && is_numeric($quantity) && $quantity > 0) {
                // Calculate area per square meter and total area based on quantity
                $perSqMeter = ($height * $width) / 1000000; // Area in square meters
                $perSqMeterQty = $perSqMeter * $quantity; // Total area

                if ($priceOption === 'rigidMedia') {
                    // Use the rigidMedia price table/logic
                    if ($mediaType === 'single') {
                        // Fetch price for 'single' media type
                        $price = DB::table('rigid_media')
                            ->where('product_id', $request->product_id)
                            ->where('media_type', 'single') // Check for media_type 'single'
                            ->where('min_range', '<=', $perSqMeterQty)
                            ->where('max_range', '>=', $perSqMeterQty)
                            ->value('price');
                    } elseif ($mediaType === 'double') {
                        // Fetch price for 'double' media type
                        $price = DB::table('rigid_media')
                            ->where('product_id', $request->product_id)
                            ->where('media_type', 'double') // Check for media_type 'double'
                            ->where('min_range', '<=', $perSqMeterQty)
                            ->where('max_range', '>=', $perSqMeterQty)
                            ->value('price');
                    } else {
                        // Handle the case where media_type is not recognized
                        return response()->json(['error' => 'Invalid media type.'], 400);
                    }

                    // Debugging: Output the calculated area and the fetched price
                    // dd($perSqMeterQty, $price);
                } else {
                    // Use the default price_ranges table if price_option is not 'rigidMedia'
                    $price = DB::table('price_ranges')
                        ->where('product_id', $request->product_id)
                        ->where('min_range', '<=', $perSqMeterQty)
                        ->where('max_range', '>=', $perSqMeterQty)
                        ->value('price');

                    // Debugging: Output the calculated area and the fetched price
                    // dd($perSqMeterQty, $price);
                }

                if ($price !== null && $price > 0) {
                    // Calculate the total price based on the square meter price
                    $totalSquarePrice = $perSqMeterQty * $price;

                    // Adjust the price based on additional attributes, if necessary
                    $totalPrice = $this->adjustPriceBasedOnAttributes($request, $totalSquarePrice);

                    // Return the total price including attribute adjustments
                    return response()->json(['price' => $totalPrice]);
                } else {
                    // Handle case where the price does not exist in the range
                    return response()->json(['error' => 'The product is not in the price/quantity range.'], 404);
                }
            } else {
                // Handle invalid height, width, or quantity
                return response()->json(['error' => 'Height, width, and quantity must be numeric and positive values.'], 400);
            }
        }


        // Handle fixed sizes
        $size = $request->size;
        list($width, $height) = array_map(function ($dimension) {
            return trim(str_replace(['mm',','], '', $dimension));
        }, explode('x', $size));
        $quantity = $request->input('quantity');

        // Check if fixed price option logic applies
        if ($request->price_option === 'fixed') {
       
            // dd($request->all());
            // Retrieve the FixedPriceOption for the specified product
            $priceOption = FixedPriceOption::where('product_id', $request->product_id)
                ->where('price_option', $request->price_option)
                ->where('width', $width)
                ->where('height', $height)
                ->first();
                if ($priceOption) {
                    
                    $priceRange = $priceOption->fixed_price_ranges()
                    ->where('min_qty', '<=', $quantity)
                    ->where('max_qty', '>=', $quantity)
                    ->first();
                    
                    // dd($priceRange);
                if ($priceRange && $priceRange->price > 0) {
                    return response()->json([
                        'success' => true,
                        'price' => $priceRange->price * $quantity,
                        'message' => 'Price found for the given quantity and product'
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'The product is not in the price/quantity range.'
                    ], 404);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'No price option found for the given product'
                ], 404);
            }
        }
        // Check if rigid media price option logic applies
        if ($request->price_option === 'rigidMedia') {

            $mediaType = $request->input('print_sides');
            // dd($mediaType);
            // Calculate area per square meter and total area based on quantity
            if (is_numeric($width) && $width > 0 && is_numeric($height) && $height > 0 && is_numeric($quantity) && $quantity > 0) {
                $perSqMeter = ($height * $width) / 1000000;
                $perSqMeterQty = $perSqMeter * $quantity;

                // Retrieve price for rigid media based on area and media type
                $price = RigidMedia::where('product_id', $request->product_id)
                    ->where('media_type', $mediaType)
                    ->where('min_range', '<=', $perSqMeterQty)
                    ->where('max_range', '>=', $perSqMeterQty)
                    ->value('price');

                if ($price !== null && $price > 0) {
                    $totalSquarePrice = $perSqMeterQty * $price;
                    $totalPrice = $this->adjustPriceBasedOnAttributes($request, $totalSquarePrice);

                    return response()->json(['price' => $totalPrice]);
                } else {
                    return response()->json(['error' => 'The product is not in the price/quantity range for the selected rigid media type.'], 404);
                }
            } else {
                return response()->json(['error' => 'Width, height, and quantity must be numeric and positive values.'], 400);
            }
        }

        if (is_numeric($width) && $width > 0 && is_numeric($height) && $height > 0 && is_numeric($quantity) && $quantity > 0) {
            $perSqMeter = ($height * $width) / 1000000;
            $perSqMeterQty = $perSqMeter * $quantity;

            $price = DB::table('price_ranges')
                ->where('product_id', $request->product_id)
                ->where('min_range', '<=', $perSqMeterQty)
                ->where('max_range', '>=', $perSqMeterQty)
                ->value('price');

            if ($price !== null && $price > 0) {
                $totalSquarePrice = $perSqMeterQty * $price;
                $totalPrice = $this->adjustPriceBasedOnAttributes($request, $totalSquarePrice);

                return response()->json(['price' => $totalPrice]);
            } else {
                return response()->json(['error' => 'The product is not in the price/quantity range.'], 404);
            }
        }

        return response()->json(['error' => 'Invalid size or quantity provided.'], 400);
    }


    private function adjustPriceBasedOnAttributes(Request $request, float $totalPrice): float
    {
        // List of attributes for price adjustments
        $attributes = [
            'colors' => 'color',
            'print_side' => 'print_side',
            'finishings' => 'finishing',
            'thickness' => 'thickness',
            'wirestakesqtys' => 'wirestakesqty',
            'framesizes' => 'framesize',
            'displaytypes' => 'displaytype',
            'installations' => 'installation',
            'materials' => 'material',
            'corners' => 'corners',
            'applications' => 'application',
            'paperthickness' => 'paperthickness',
            'qtys' => 'qty',
            'pagesinbooks' => 'pagesinbook',
            'copiesrequireds' => 'copiesrequired',
            'pagesinnotepads' => 'pagesinnotepad',
        ];

        // Iterate over each attribute for price adjustments
        foreach ($attributes as $inputKey => $type) {

            $attributeValue = $request->input($inputKey);

            if (!empty($attributeValue)) {
                $productId = $request->input('product_id');
                $quantity = $request->input('quantity');

                // Ensure quantity is a valid number
                if (!is_numeric($quantity)) {
                    continue; // Skip if quantity is invalid
                }

                // Look up the corresponding product attribute
                $attribute = ProductAttribute::where('attribute_type', $type)
                    ->where('attribute_value', $attributeValue)
                    ->where('product_id', $productId)
                    ->first();

                // Add the attribute price to the total price if found
                if ($attribute) {
                    $totalPrice += (float) $attribute->attribute_price * (int) $quantity;
                }
            }
        }

        // Return the adjusted total price
        return $totalPrice;
    }

    public function uploadFile(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048', // Adjust file type and size limits as needed
        ]);

        // Check if file was uploaded successfully
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $uploadedFile = $request->file('file');

            // Generate a unique filename to prevent conflicts
            $fileName = uniqid() . '_' . $uploadedFile->getClientOriginalName();

            // Store the file in the specified directory
            $filePath = $uploadedFile->storeAs('uploads', $fileName); // Change 'uploads' to your desired directory
            dd($filePath);

            // You can save the file path in your database or return it as a response
            return response()->json(['file_path' => $filePath]);
        } else {
            // Return error response if file upload fails
            return response()->json(['error' => 'File upload failed'], 500);
        }
    }

    public function fetchPrice(Request $request)
    {
        // dd($request->all()); die;
        $area = $request->query('area');

        if (is_numeric($area) && $area > 0) {
            $price = DB::table('price_ranges')
                ->where('min_range', '<=', $area)
                ->where('max_range', '>=', $area)
                ->value('price');

            if ($price !== null) {
                if ($price < 30) {
                    $price = 30; // Set the price to 30 if it's less than 30
                }
                return response()->json(['price' => $price]);
            } else {
                return response()->json(['error' => 'No price range found for the given area.'], 404);
            }
        } else {
            return response()->json(['error' => 'Invalid area.'], 400);
        }
    }
}
