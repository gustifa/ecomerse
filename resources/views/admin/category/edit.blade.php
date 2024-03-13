@extends('admin.layouts.master') 
@section('content')
<section class="section">
          <div class="section-header">
            <h1>Category</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Category</a></div>
              <div class="breadcrumb-item">Tambah Category</div>
            </div>
          </div>
          <div class="section-body">

            
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form method="post" action="{{route('admin.category.update', $category->id)}}" enctype="multipart/form-data">
                  	@csrf
                      @method('PUT')
                    <div class="card-header">
                      <h4>Update Category</h4>
                    </div>
                    
                    <div class="card-body">
                    	<div class="row">
                          <div class="form-group col-md-12 col-12">
                            <label>Icon</label>
                            <div>
                                <button class="btn btn-primary" data-icon="{{$category->icon}}" data-selected-class="btn-danger" data-unselected-class="btn-info" role="iconpicker" name="icon"></button>
                            </div>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="form-group col-md-12 col-12">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{$category->name}}">
                            
                          </div>
                          
                        </div>

                        

                        <div class="row">
                          
                          <div class="form-group col-md-12 col-12">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option {{$category->status == 1 ? 'selected': ''}} value="1">Active</option>
                                <option {{$category->status == 0 ? 'selected': ''}} value="0">Inactive</option>
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