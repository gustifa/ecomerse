@extends('admin.layouts.master') 
@section('content')
<section class="section">
          <div class="section-header">
            <h1>Category</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Tambah Slider</div>
            </div>
          </div>
          <div class="section-body">

            
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form method="post" action="{{route('admin.vendor-profile.store')}}" enctype="multipart/form-data">
                  	@csrf
                    <div class="card-header">
                      <h4>Update Vendor Profile</h4>
                    </div>
                    
                    <div class="card-body">
                    	<div class="row">
                          <div class="form-group col-md-4 col-12">
                          	
                            <label>Preview</label>
                            <br>
                            <img width="200px" src="{{asset($vendorProfile->banner)}}" alt="">
                            
                          </div>
                          <div class="form-group col-md-8 col-12">
                          	
                            <label>Image</label>
                            <input type="file" name="banner" class="form-control">
                            
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{$vendorProfile->phone}}">
                            
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{$vendorProfile->email}}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-12 col-12">
                            <label>Description</label>
                            <br>
                            <textarea class="summernote" name="description">{{$vendorProfile->description}}</textarea>
                          </div>
                         
                        </div>
                        <div class="row">
                          <div class="form-group col-md-12 col-12">
                            <label>Address</label>
                            <br>
                            <textarea class="summernote-simple" name="address">{{$vendorProfile->address}}</textarea>
                            <!-- <input type="text" name="address" class="form-control" value="{{$vendorProfile->address}}"> -->
                            
                          </div>

                        </div>

                        <div class="row">
                          <div class="form-group col-md-12 col-12">
                            <label>Facebook</label>
                            <input type="text" name="fb_link" class="form-control" value="{{$vendorProfile->fb_link}}">
                            
                          </div> 
                        </div>
                        <div class="row">
                          <div class="form-group col-md-12 col-12">
                            <label>Twitter</label>
                            <input type="text" name="tw_link" class="form-control" value="{{$vendorProfile->tw_link}}">
                            
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-12 col-12">
                            <label>Instagram</label>
                            <input type="text" name="insta_link" class="form-control" value="{{$vendorProfile->insta_link}}">
                            
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