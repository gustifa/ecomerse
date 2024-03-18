@extends('admin.layouts.master') 
@section('content')
<section class="section">
          <div class="section-header">
            <h1>Brand</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Form Brand</div>
            </div>
          </div>
          <div class="section-body">

            
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form method="post" action="{{route('admin.brand.store')}}" enctype="multipart/form-data">
                  	@csrf
                    <div class="card-header">
                      <h4>Update Profile</h4>
                    </div>
                    
                    <div class="card-body">
                    	<div class="row">
                          <div class="form-group col-md-12 col-12">
                          	
                            <label>Logo</label>
                            <input type="file" name="logo" class="form-control">
                            
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{old('type')}}">
                            
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>Is Featured</label>
                            <select class="form-control" name="is_fetured">
                                <option value="">Select</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                          </div>
                        </div>

                       

                        <div class="row">
                          <div class="form-group col-md-12 col-12">
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