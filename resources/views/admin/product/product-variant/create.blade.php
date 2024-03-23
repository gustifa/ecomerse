@extends('admin.layouts.master') 
@section('content')
<section class="section">
          <div class="section-header">
            <h1>Tambah Product</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Category</a></div>
              <div class="breadcrumb-item">Tambah Product</div>
            </div>
          </div>
          <div class="section-body">

            
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form method="post" action="{{route('admin.product-variant.store')}}" enctype="multipart/form-data">
                  	@csrf
                    <div class="card-header">
                      <h4>Tambah Product Variant</h4>
                    </div>
                    
                    <div class="card-body">
                        
                        <div class="row">
                          <div class="form-group col-md-12 col-12">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                            
                          </div>
                          <div class="form-group col-md-12 col-12">
                            <input type="hidden" name="product" class="form-control" value="{{request()->product}}">
                            
                          </div>
                          
                        </div>
        


                        <div class="row">
                          
                          <div class="form-group col-md-12 col-12">
                            <label id="inputState">Status</label>
                            <select id="inputState" class="form-control" name="status">
                              <option value="">Select</option>
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
