<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\ProductVariantDataTable;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ProductVariantDataTable $dataTable)
    {
        $product = Product::findOrFail($request->product);
        return $dataTable->render('admin.product.product-variant.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.product-variant.create');
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

        $product_variant = new ProductVariant();

        $product_variant->name = $request->name;
        $product_variant->product_id = $request->product;
        $product_variant->status = $request->status;
        $product_variant->save();

        toastr('Variant Product Baru Berhasil ditambahkan', 'success');
        return redirect()->route('admin.product-variant.index', ['product' => $product_variant->product_id]);
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
        $productVariant = ProductVariant::findOrFail($id);
        return view('admin.product.product-variant.edit', compact('productVariant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required','max:200'],
            'status' => ['required'],
        ]);

        $product_variant = ProductVariant::findOrFail($id);
        $product_variant->name = $request->name;
        $product_variant->product_id = $request->product;
        $product_variant->status = $request->status;
        $product_variant->save();

        toastr('Variant Product Berhasil diperbaharui', 'success');
        return redirect()->route('admin.product-variant.index', ['product' => $request->product]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productVariant = ProductVariant::findOrFail($id);
        $productVariantItemChek = ProductVariantItem::where('product_variant_id', $productVariant->id)->count();
        if($productVariantItemChek > 0){
            return response(['status' => 'error', 'message'=> 'Tidak Dapat dihapus, karena ada sub variant']);
        }
        $productVariant->delete();

        return response(['status' => 'success', 'message'=> 'Delete Sucsessfully']);
    }

    public function changeStatus(Request $request){
        // dd($request->all());
        $productVariant = ProductVariant::findOrFail($request->id);
        $productVariant->status = $request->status == 'true' ? 1 : 0;
        $productVariant->save();

        if($productVariant->status == 1){
            return response(['message'=> 'Child Category <b>'.$productVariant->name.'</b> diaktifkan'] );
        }else{
            return response(['message'=> 'Child Category <b>'.$productVariant->name.'</b> dinonaktifkan'] );
        }


        
    }
}
