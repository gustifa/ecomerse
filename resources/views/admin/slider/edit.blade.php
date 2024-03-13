@extends('admin.layouts.master') 
@section('content')
<section class="section">
          <div class="section-header">
            <h1>Edit Slider</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Update Slider</div>
            </div>
          </div>
          <div class="section-body">

            
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form method="post" action="{{route('admin.slider.update', $slider->id)}}" enctype="multipart/form-data">
                  	@csrf
                    @method('PUT')
                    <div class="card-header">
                      <h4>Update Slider</h4>
                    </div>
                    
                    <div class="card-body">
                    	<div class="row">
                          <div class="form-group col-md-12 col-12">
                          	
                            <label>Preview</label>
                            <br>
                            <img width="200px" src="{{asset($slider->banner)}}" alt="">
                            
                          </div>
                          <div class="form-group col-md-12 col-12">
                          	
                            <label>Image</label>
                            <input type="file" name="banner" class="form-control">
                            
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Type</label>
                            <input type="text" name="type" class="form-control" value="{{$slider->type}}">
                            
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{$slider->title}}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Starting Price</label>
                            <input type="text" name="starting_price" class="form-control" value="{{$slider->starting_price}}">
                           
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>Button URL</label>
                            <input type="text" name="btn_url" class="form-control" value="{{$slider->btn_url}}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Serial</label>
                            <input type="text" name="serial" class="form-control" value="{{$slider->serial}}">
                            
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option {{$slider->status == 1 ? 'selected': ''}} value="1">Active</option>
                                <option {{$slider->status == 0 ? 'selected': ''}} value="0">Inactive</option>
                            </select>
                          </div>

                          
                        </div>
                      
                    </div>
                    <div class="card-footer text-left">
                      <button class="btn btn-primary">Update</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection