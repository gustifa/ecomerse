<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\BrandDataTable;
use App\Models\Brand;
use App\Traits\ImageUploadTrait;
use Str;

class BrandController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(BrandDataTable $dataTable)
    {
        return $dataTable->render('admin.brand.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'logo' => ['required','image', 'max:2000'],
            'name' => ['max:200'],
            'is_fetured' => ['max:200'],
            'status' => ['required'],
        ]);

        $brand = new Brand();

        // Handel Image Upload
        $imagePath = $this->uploadImage($request, 'logo', 'uploads');
        $brand->logo = $imagePath; 
        $brand->name = $request->name;
        $brand->is_fetured = $request->is_fetured;
        $brand->slug = Str::slug($request->name);
        $brand->status = $request->status;
        $brand->save();

        toastr('Brand Baru Berhasil ditambahkan', 'success');
        return redirect()->route('admin.brand.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'logo' => ['nullable','image', 'max:2000'],
            'name' => ['string','max:200'],
            'is_fetured' => ['max:200'],
            'status' => ['required'],
        ]);

        $brand = Brand::findOrFail($id);

        // Handel Image Upload
        $imagePath = $this->updateImage($request, 'logo', 'uploads', $brand->logo);
        $brand->logo = empty(!$imagePath) ? $imagePath : $brand->logo ; 
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->is_fetured = $request->is_fetured;
        $brand->status = $request->status;
        $brand->save();

        toastr('Brand Berhasil diperbaiki', 'success');
        return redirect()->route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        $this->deleteImage($brand->logo);
        $brand->delete();
    }

    public function changeIsfetured(Request $request){
        // dd($request->all());
        $brand = Brand::findOrFail($request->id);
        $brand->is_fetured = $request->is_fetured == 'true' ? 1 : 0;
        $brand->save();

        return response(['message'=> 'isfetured Brand Diperbaharui'] );
    }

    public function changeStatus(Request $request){
        // dd($request->all());
        $brand = Brand::findOrFail($request->id);
        $brand->status = $request->status == 'true' ? 1 : 0;
        $brand->save();

        return response(['message'=> 'Status Brand Diperbaharui'] );
    }
}
