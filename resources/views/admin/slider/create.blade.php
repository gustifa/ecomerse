@extends('admin.layouts.master') 
@section('content')
<section class="section">
          <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Slider</a></div>
              <div class="breadcrumb-item">Tambah Slider</div>
            </div>
          </div>
          <div class="section-body">

            
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form method="post" action="{{route('admin.slider.store')}}" enctype="multipart/form-data">
                  	@csrf
                    <div class="card-header">
                      <h4>Update Profile</h4>
                    </div>
                    
                    <div class="card-body">
                    	<div class="row">
                          <div class="form-group col-md-12 col-12">
                          	
                            <label>Image</label>
                            <input type="file" name="banner" class="form-control">
                            
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Type</label>
                            <input type="text" name="type" class="form-control" value="{{old('type')}}">
                            
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{old('title')}}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Starting Price</label>
                            <input type="text" name="starting_price" class="form-control" value="{{old('starting_price')}}">
                           
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>Button URL</label>
                            <input type="text" name="btn_url" class="form-control" value="{{old('btn_url')}}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Serial</label>
                            <input type="text" name="serial" class="form-control" value="{{old('serial')}}">
                            
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                          </div>

                          
                        </div>
                      
                    </div>
                    <div class="card-footer text-left">
                      <button class="btn btn-primary">Save</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection