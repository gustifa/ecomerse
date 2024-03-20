@extends('admin.layouts.master') 
@section('content')
<section class="section">
          <div class="section-header">
            <h1>Edit Brand</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Update Brand</div>
            </div>
          </div>
          <div class="section-body">

            
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form method="post" action="{{route('admin.brand.update', $brand->id)}}" enctype="multipart/form-data">
                  	@csrf
                    @method('PUT')
                    <div class="card-header">
                      <h4>Update Brand</h4>
                    </div>
                    
                    <div class="card-body">
                    	<div class="row">
                          <div class="form-group col-md-12 col-12">
                          	
                            <label>Preview</label>
                            <br>
                            <img width="200px" src="{{asset($brand->logo)}}" alt="">
                            
                          </div>
                          <div class="form-group col-md-12 col-12">
                          	
                            <label>Image</label>
                            <input type="file" name="logo" class="form-control">
                            
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="form-group col-md-12 col-12">
                            <label>Type</label>
                            <input type="text" name="name" class="form-control" value="{{$brand->name}}">
                            
                          </div>
                          
                        </div>

                        

                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                          <label>is_fetured</label>
                            <select class="form-control" name="is_fetured">
                                <option {{$brand->is_fetured == 1 ? 'selected': ''}} value="1">Yes</option>
                                <option {{$brand->is_fetured == 0 ? 'selected': ''}} value="0">No</option>
                            </select>
                            
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option {{$brand->status == 1 ? 'selected': ''}} value="1">Active</option>
                                <option {{$brand->status == 0 ? 'selected': ''}} value="0">Inactive</option>
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