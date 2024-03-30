<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\VendorProductVariantDataTable;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantItemt;

class VendorProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, VendorProductVariantDataTable $dataTable)
    {
        $product = Product::findOrFail($request->product);
        return $dataTable->render('vendor.product.product-variant.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('vendor.product.product-variant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required','max:200'],
            'status' => ['required'],
        ]);

        $vendorProductVariant = new ProductVariant();

        $vendorProductVariant->name = $request->name;
        $vendorProductVariant->product_id = $request->product;
        $vendorProductVariant->status = $request->status;
        $vendorProductVariant->save();

        toastr('Variant Product Baru Berhasil ditambahkan', 'success');
        return redirect()->route('vendor.product-variant.index', ['product' => $vendorProductVariant->product_id]);
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
        $vendorProductVariant = ProductVariant::findOrFail($id);
        $vendorProductVariantChek = ProductVariantItem::where('product_variant_id', $vendorProductVariant->id)->count();
        if($vendorProductVariantChek > 0){
            return response(['status' => 'error', 'message'=> 'Tidak Dapat dihapus, karena ada sub variant']);
        }
        $vendorProductVariant->delete();

        return response(['status' => 'success', 'message'=> 'Delete Sucsessfully']);
    }

    public function changeStatus(Request $request){
        // dd($request->all());
        $productVariant = ProductVariant::findOrFail($request->id);
        $productVariant->status = $request->status == 'true' ? 1 : 0;
        $productVariant->save();

        if($productVariant->status == 1){
            return response(['message'=> 'Product Variant <b>'.$productVariant->name.'</b> diaktifkan'] );
        }else{
            return response(['message'=> 'Product Variant <b>'.$productVariant->name.'</b> dinonaktifkan'] );
        }


        
    }
}
