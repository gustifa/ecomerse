@extends('admin.layouts.master') 
@section('content')
<section class="section">
          <div class="section-header">
            <h1>Category</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Category</a></div>
              <div class="breadcrumb-item">Sub Category</div>
            </div>
          </div>
          <div class="section-body">

            
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form method="post" action="{{route('admin.sub-category.update', $subCategory->id)}}" enctype="multipart/form-data">
                  	@csrf
                      @method('PUT')
                    <div class="card-header">
                      <h4>Update Sub Category</h4>
                    </div>
                    
                    <div class="card-body">
                    	<div class="row">
                      <div class="form-group col-md-12 col-12">
                            <label>Status</label>
                            <select class="form-control" name="category">
                              @foreach($category as $item)
                                <option {{$item->id == $subCategory->category_id ? 'selected':  ''}} value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="form-group col-md-12 col-12">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{$subCategory->name}}">
                            
                          </div>
                          
                        </div>

                        

                        <div class="row">
                          
                          <div class="form-group col-md-12 col-12">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option {{$subCategory->status == 1 ? 'selected': ''}} value="1">Active</option>
                                <option {{$subCategory->status == 0 ? 'selected': ''}} value="0">Inactive</option>
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