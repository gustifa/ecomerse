<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use Auth;
use App\Traits\ImageUploadTrait;

class VendorShopProfileController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendorProfile = Vendor::where('user_id', Auth::user()->id)->first();
        // dd($vendorProfile);
        return view('vendor.shop-profile.index', compact('vendorProfile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        // dd($request->all());
        $request->validate([
            'banner' => ['nullable','image', 'max:2000'],
            'shop_name' => ['required', 'max:200'],
            'phone' => ['required', 'max:20'],
            'email' => ['required', 'email', 'max:200'],
            'address' => ['required'],
            'description' => ['required'],
            'fb_link' => ['nullable','url'],
            'tw_link' => ['nullable','url'],
            'insta_link' => ['nullable','url'],
        ]);

        $vendor = Vendor::where('user_id', Auth::user()->id)->first();

        // Handel Image Upload
        $imagePath = $this->updateImage($request, 'banner', 'uploads', $vendor->banner);
        $vendor->banner = empty(!$imagePath) ? $imagePath : $vendor->banner ; 
        $vendor->shop_name = $request->shop_name;
        $vendor->phone = $request->phone;
        $vendor->email = $request->email;
        $vendor->description = $request->description;
        $vendor->address = $request->address;
        $vendor->fb_link = $request->fb_link;
        $vendor->tw_link = $request->tw_link;
        $vendor->insta_link = $request->insta_link;
        $vendor->save();

        toastr('Vendor Berhasil diperbaharui', 'success');
        return redirect()->route('vendor.shop-profile.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
