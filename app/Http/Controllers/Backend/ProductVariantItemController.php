<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\ProductVariantItemDataTable;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;

class ProductVariantItemController extends Controller
{
    public function index(ProductVariantItemDataTable $dataTable, $productId, $variantId){
        $product = Product::findOrFail($productId);
        $productVariant = ProductVariant::findOrFail($variantId);
        return $dataTable->render('admin.product.product-variant-item.index', compact('product', 'productVariant'));
    }

    public function create(string $productId, string $variantId){
        $productVariant = ProductVariant::findOrFail($variantId);
        $product = Product::findOrFail($productId);
        return view('admin.product.product-variant-item.create', compact('productVariant', 'product'));
    }

    public function store(request $request){
        // dd($request->all());
        $request->validate([
            'name' => ['required','max:200'],
            'price' => ['required', 'integer'],
            'is_default' => ['required'],
            'status' => ['required'],
        ]);

        $product_variant_item = new ProductVariantItem();
        $product_variant_item->name = $request->name;
        $product_variant_item->product_variant_id = $request->product_variant_id;
        $product_variant_item->price = $request->price;
        $product_variant_item->is_default = $request->is_default;
        $product_variant_item->status = $request->status;
        $product_variant_item->save();

        toastr('Variant Product Item Berhasil ditambahkan', 'success');
        return redirect()->route('admin.product-variant-item.index', 
        ['productId' => $request->product_id, 'variantId' => $request->product_variant_id]);
    }

    public function edit(string $variantItemId){
        $productVariantItem = ProductVariantItem::findOrFail($variantItemId);
        return view('admin.product.product-variant-item.edit', compact('productVariantItem'));
    }

    public function update(request $request, string $variantItemId){
        // dd($request->all());
        $request->validate([
            'name' => ['required','max:200'],
            'price' => ['required', 'integer'],
            'is_default' => ['required'],
            'status' => ['required'],
        ]);

        $product_variant_item = ProductVariantItem::findOrFail($variantItemId);
        $product_variant_item->name = $request->name;
        $product_variant_item->product_variant_id = $request->product_variant_id;
        $product_variant_item->price = $request->price;
        $product_variant_item->is_default = $request->is_default;
        $product_variant_item->status = $request->status;
        $product_variant_item->save();

        toastr('Variant Product Item Berhasil diperbaharui', 'success');
        return redirect()->route('admin.product-variant-item.index', 
        ['productId' => $product_variant_item->productVariant->product_id, 'variantId' => $product_variant_item->product_variant_id]);
    }

    public function destroy(string $variantItemId){
        $productVariantItem = ProductVariantItem::findOrFail($variantItemId);
        $productVariantItem->delete();

        return response(['status' => 'success', 'message' => 'Hapus Berhasil']);
    }
}
