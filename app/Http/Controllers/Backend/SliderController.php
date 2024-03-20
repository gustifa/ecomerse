<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Traits\ImageUploadTrait;
use App\DataTables\SliderDataTable;

class SliderController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(SliderDataTable $dataTable)
    {
        // return view('admin.slider.index');
        return $dataTable->render('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'banner' => ['required','image', 'max:2000'],
            'type' => ['max:200'],
            'title' => ['max:200'],
            'btn_type' => ['url'],
            'starting_price' => ['max:200'],
            'serial' => ['required', 'integer'],
            'status' => ['required'],
        ]);

        $slider = new Slider();

        // Handel Image Upload
        $imagePath = $this->uploadImage($request, 'banner', 'uploads');
        $slider->banner = $imagePath; 
        $slider->type = $request->type;
        $slider->title = $request->title;
        $slider->starting_price = $request->starting_price;
        $slider->btn_url = $request->btn_url;
        $slider->serial = $request->serial;
        $slider->status = $request->status;
        $slider->save();

        toastr('Slider Baru Berhasil ditambahkan', 'success');
        return redirect()->route('admin.slider.index');
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
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'banner' => ['nullable','image', 'max:2000'],
            'type' => ['string','max:200'],
            'title' => ['required','max:200'],
            'btn_type' => ['url'],
            'starting_price' => ['max:200'],
            'serial' => ['required', 'integer'],
            'status' => ['required'],
        ]);

        $slider = Slider::findOrFail($id);

        // Handel Image Upload
        $imagePath = $this->updateImage($request, 'banner', 'uploads', $slider->banner );
        $slider->banner = empty(!$imagePath) ? $imagePath : $slider->banner ; 
        //$slider->banner = $imagePath; 
        $slider->type = $request->type;
        $slider->title = $request->title;
        $slider->starting_price = $request->starting_price;
        $slider->btn_url = $request->btn_url;
        $slider->serial = $request->serial;
        $slider->status = $request->status;
        $slider->save();

        toastr('Slider Berhasil ddiperbaiki', 'success');
        return redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);
        // $this->deleteImage($slider->banner);
        $this->deleteImage($slider->banner);
        $slider->delete();
        // toastr('Slider Berhasil dihapus', 'success');
        return response(['status' => 'success', 'message'=> 'Delete Sucsessfully']);
    }
}
