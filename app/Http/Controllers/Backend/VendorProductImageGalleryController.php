<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\VendorProductImageGalleryDataTable;
use App\Models\Product;
use App\Models\ProductImageGallery;
use App\Traits\ImageUploadTrait;

class VendorProductImageGalleryController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    
    public function index(Request $request, VendorProductImageGalleryDataTable $dataTable)
    {
        $product = Product::findOrFail($request->product);
        return $dataTable->render('vendor.product.image-gallery.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image.*' => ['required', 'image', 'max:2000', 'not_in:empty']
        ]);

        $imagePaths = $this->uploadMultiImage($request, 'image', 'uploads');
        foreach($imagePaths as $path){
            $productImageGallery = new ProductImageGallery();
            $productImageGallery->image = $path;
            $productImageGallery->product_id = $request->product;
            $productImageGallery->save();
        }

        toastr('Image Gallery Berhasil ditambahkan', 'success');
        return redirect()->back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $vendorProduct = ProductImageGallery::findOrFail($id);
        $vendorProduct->delete();
        return response(['status' =>'success', 'Hapus Galery Imagae Berhasil']);
    }
}
