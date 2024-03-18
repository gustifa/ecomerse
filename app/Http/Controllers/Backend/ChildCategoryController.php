<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Datatables\ChildCategoryDatatable;
use App\Models\ChildCategory;
use App\Models\Category;
use App\Models\SubCategory;
use Str;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ChildCategoryDatatable $dataTable)
    {
        return $dataTable->render('admin.child-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        $subCategory = SubCategory::all();
        return view('admin.child-category.create', compact('category', 'subCategory'));
    }

    /* Get Sub Category */
    public function getSubCategory(Request $request){
        $subCategory = SubCategory::where('category_id', $request->id)->where('status', 1)->get();
        return $subCategory;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => ['required', 'not_in:empty'],
            'sub_category' => ['required', 'not_in:empty'],
            'name' => ['required','max:200'],
            'status' => ['required'],
        ]);

        $childcategory = new ChildCategory();
        $childcategory->category_id = $request->category;
        $childcategory->sub_category_id = $request->sub_category;
        $childcategory->name = $request->name;
        $childcategory->slug = Str::slug($request->name);
        $childcategory->status = $request->status;
        $childcategory->save();

        toastr('Child Category Baru Berhasil ditambahkan', 'success');
        return redirect()->route('admin.child-category.index');
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
        //
    }
}
