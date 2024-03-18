<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\SubCategoryDataTable;
use App\Models\Category;
use App\Models\SubCategory;
use Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.sub-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.sub-category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'category' => ['required', 'not_in:empty'],
            'name' => ['required','max:200'],
            'status' => ['required'],
        ]);

        $subcategory = new SubCategory();
        $subcategory->category_id = $request->category;
        $subcategory->name = $request->name;
        $subcategory->slug = Str::slug($request->name);
        $subcategory->status = $request->status;
        $subcategory->save();

        toastr('Sub Category Baru Berhasil ditambahkan', 'success');
        return redirect()->route('admin.sub-category.index');
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
        $subCategory = SubCategory::findOrFail($id);
        $category = Category::all();

        return view('admin.sub-category.edit', compact('subCategory', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category' => ['required', 'not_in:empty'],
            'name' => ['required','max:200'],
            'status' => ['required'],
        ]);
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->category_id = $request->category;
        $subcategory->name = $request->name;
        $subcategory->status = $request->status;
        $subcategory->save();

        toastr('Sub Category Berhasil diperbaharui', 'success');
        return redirect()->route('admin.sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete();
        return response(['status' =>'success', 'Hapus Sub Category Berhasil']);
    }

    public function changeStatus(Request $request){
        // dd($request->all());
        $subcategory = SubCategory::findOrFail($request->id);
        $subcategory->status = $request->status == 'true' ? 1 : 0;
        $subcategory->save();

        if($subcategory->status == 1){
            return response(['message'=> 'Sub Category <b>'.$subcategory->name.'</b> diaktifkan'] );
        }else{
            return response(['message'=> 'Sub Category <b>'.$subcategory->name.'</b> dinonaktifkan'] );
        }


        
    }
}
