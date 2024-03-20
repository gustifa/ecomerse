<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use Auth;
use App\Traits\ImageUploadTrait;

class AdminVendorProfileController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendorProfile = Vendor::where('user_id', Auth::user()->id)->first();
        // dd($vendorProfile);
        return view('admin.vendor-profile.index', compact('vendorProfile'));
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
        // dd($request->all());
        $request->validate([
            'banner' => ['nullable','image', 'max:2000'],
            'phone' => ['required'],
            'email' => ['required'],
            'description' => ['required'],
            'address' => ['required'],
            'fb_link' => ['nullable','url'],
            'tw_link' => ['nullable','url'],
            'insta_link' => ['nullable','url'],
        ]);

        $vendor = Vendor::where('user_id', Auth::user()->id)->first();

        // Handel Image Upload
        $imagePath = $this->updateImage($request, 'banner', 'uploads', $vendor->banner);
        $vendor->banner = empty(!$imagePath) ? $imagePath : $vendor->banner ; 
        $vendor->phone = $request->phone;
        $vendor->email = $request->email;
        $vendor->description = $request->description;
        $vendor->address = $request->address;
        $vendor->fb_link = $request->fb_link;
        $vendor->tw_link = $request->tw_link;
        $vendor->insta_link = $request->insta_link;
        $vendor->save();

        toastr('Vendor Baru Berhasil ditambahkan', 'success');
        return redirect()->route('admin.vendor-profile.index');
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
