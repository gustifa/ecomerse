<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\ProductDataTable;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use App\Models\Brand;
use App\Models\Vendor;
use App\Models\Product;
use Auth;
use App\Traits\ImageUploadTrait;
use Str;

class ProductController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        $brand = Brand::all();
        $vendor = Vendor::all();
        return view('admin.product.create', compact('category', 'brand', 'vendor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // dd(Auth::user()->vendor);
        $request->validate([
            'category' => ['required', 'not_in:empty'],
            'sub_category' => ['required', 'not_in:empty'],
            'child_category' => ['required', 'not_in:empty'],
            'name' => ['required','max:200'],
            'status' => ['required'],
        ]);

        $product = new Product();

        $imagePath = $this->uploadImage($request, 'thumb_image', 'uploads');
        $product->thumb_image = $imagePath; 
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->vendor_id = Auth::user()->vendor->id;
        $product->category_id = $request->category;
        $product->sub_category_id = $request->sub_category;
        $product->child_category_id = $request->child_category;
        $product->brand_id = $request->brand;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->video_link = $request->video_link;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        $product->offer_start_date = $request->offer_start_date;
        $product->offer_end_date = $request->offer_end_date;
        $product->is_top = $request->is_top;
        $product->is_featured = $request->is_featured;
        $product->status = $request->status;
        $product->is_approved = $request->is_approved;
        $product->seo_title = $request->seo_title;
        $product->seo_description = $request->seo_description;
        $product->save();

        toastr('Product Baru Berhasil ditambahkan', 'success');
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $category = Category::all();
        $subCategory = SubCategory::all();
        $childCategory = ChildCategory::all();
        $brand = Brand::all();
        $vendor = Vendor::all();
        return view('admin.product.edit', compact('category', 'brand', 'vendor', 'product', 'subCategory', 'childCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'category' => ['required', 'not_in:empty'],
            'sub_category' => ['required', 'not_in:empty'],
            'child_category' => ['required', 'not_in:empty'],
            'name' => ['required','max:200'],
            'status' => ['required'],
        ]);

        $product = Product::findOrFail($id);

        $imagePath = $this->updateImage($request, 'thumb_image', 'uploads', $product->thumb_image);
        $product->thumb_image = empty(!$imagePath) ? $imagePath : $product->thumb_image ;  
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->vendor_id = Auth::user()->vendor->id;
        $product->category_id = $request->category;
        $product->sub_category_id = $request->sub_category;
        $product->child_category_id = $request->child_category;
        $product->brand_id = $request->brand;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->video_link = $request->video_link;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        $product->offer_start_date = $request->offer_start_date;
        $product->offer_end_date = $request->offer_end_date;
        $product->is_top = $request->is_top;
        $product->is_featured = $request->is_featured;
        $product->status = $request->status;
        $product->is_approved = $request->is_approved;
        $product->seo_title = $request->seo_title;
        $product->seo_description = $request->seo_description;
        $product->save();

        toastr('Product B Berhasil diperbaharui', 'success');
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getSubCategory(Request $request){
        $subCategory = SubCategory::where('category_id', $request->id)->where('status', 1)->get();
        return $subCategory;
    }

    public function getChildCategory(Request $request){
        $subCategory = ChildCategory::where('sub_category_id', $request->id)->where('status', 1)->get();
        return $subCategory;
    }
}