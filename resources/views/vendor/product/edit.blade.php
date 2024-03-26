
@extends('vendor.layouts.master')
@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
      @include('vendor.layouts.sidebar')
      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="fas fa-biking"></i> Tambah Product</h3>
            <div class="wsus__dashboard_profile">
                <div class="wsus__dash_pro_area">
                  <h4>Tambah Product</h4>
                  <form method="post" action="{{route('vendor.product.update', $product->id)}}" enctype="multipart/form-data">
                  	@csrf
                    @method('PUT')
                    <div class="card-header">
                      <h4>Update Product</h4>
                    </div>
                    
                    <div class="card-body">

                    <div class="row">
                          <div class="form-group col-md-12 col-12">
                          	
                            <label>Preview</label>
                            <br>
                            <img width="200px" src="{{asset($product->thumb_image)}}" alt="">
                            
                          </div>
                          <div class="form-group col-md-12 col-12">
                            <label>thumb_image</label>
                            <input type="file" name="thumb_image" class="form-control">
                          </div>
                        </div>

                        
                        <div class="row">
                          <div class="form-group col-md-12 col-12">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{$product->name}}">
                            
                          </div>
                          
                        </div>
                        

                        <div class="row">
                          
                          <div class="form-group col-md-4 col-12">
                            <label id="inputState">Category</label>
                            <select id="inputState" class="form-control main-category" name="category">
                            <option value="">Select</option>
                              @foreach($category as $item)
                              <option {{$item->id == $product->category_id ? 'selected':  ''}} value="{{$item->id}}">{{$item->name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group col-md-4 col-12">
                            <label id="inputState">Sub Category</label>
                            <select id="inputState" class="form-control sub-category" name="sub_category">
                              <option value="">Select</option>
                              @foreach($subCategory as $item)
                              <option {{$item->id == $product->sub_category_id ? 'selected':  ''}} value="{{$item->id}}">{{$item->name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group col-md-4 col-12">
                            <label id="inputState">Child Category</label>
                            <select id="inputState" class="form-control child-category" name="child_category">
                              <option value="">Select</option>
                              @foreach($childCategory as $item)
                              <option {{$item->id == $product->child_category_id ? 'selected':  ''}} value="{{$item->id}}">{{$item->name}}</option>
                              @endforeach
                            </select>
                          </div>
                          
                        </div>

                        <div class="row">
                          
                          <div class="form-group col-md-12 col-12">
                            <label id="inputState">Brand</label>
                            <select id="inputState" class="form-control" name="brand">
                            <option value="">Select</option>
                              @foreach($brand as $item)
                                <!-- <option value="{{$item->id}}">{{$item->name}}</option> -->
                                <option {{$item->id == $product->brand_id ? 'selected':  ''}} value="{{$item->id}}">{{$item->name}}</option>
                              @endforeach
                            </select>
                          </div>
                          
                          
                        </div>

                        <div class="row">
                          <div class="form-group col-md-12 col-12">
                            <label>Short Description</label>
                            <br>
                            <textarea class="summernote" name="short_description">{!!$product->short_description!!}</textarea>
                            
                          </div>
                          
                        </div>

                        <div class="row">
                          <div class="form-group col-md-12 col-12">
                            <label>Long Description</label>
                            <br>
                            <textarea class="summernote" name="long_description">{!! $product->long_description !!}</textarea>
                            
                          </div>
                          
                        </div>

                        <div class="row">
                          <div class="form-group col-md-12 col-12">
                            <label>video_link</label>
                            <input type="text" name="video_link" class="form-control" value="{{$product->video_link}}">
                          </div>
                          
                        </div>

                        <div class="row">
                          <div class="form-group col-md-4 col-12">
                            <label>SKU</label>
                            <input type="text" name="sku" class="form-control" value="{{$product->sku}}">
                            
                          </div>
                          <div class="form-group col-md-4 col-12">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control" value="{{$product->price}}">
                            
                          </div>
                          <div class="form-group col-md-4 col-12">
                            <label>offer_price</label>
                            <input type="text" name="offer_price" class="form-control" value="{{$product->offer_price}}">
                            
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Offer Start Date</label>
                            <input type="text" name="offer_start_date" class="form-control datepicker" value="{{$product->offer_start_date}}">
                            
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Offer End Date</label>
                            <input type="text" name="offer_end_date" class="form-control datepicker" value="{{$product->offer_end_date}}">
                            
                          </div>
                          
                        </div>

                        <div class="row">
                          <div class="form-group col-md-12 col-12">
                            <label>seo_title</label>
                            <br>
                            <textarea class="summernote" name="seo_title">{!! $product->seo_title !!}</textarea>
                            
                          </div>
                          
                        </div>

                        <div class="row">
                          <div class="form-group col-md-12 col-12">
                            <label>seo_description</label>
                            <br>
                            <textarea class="summernote" name="seo_description">{!! $product->seo_description !!}</textarea>
                            
                          </div>
                          
                        </div>

                        <div class="row">
                          
                          <div class="form-group col-md-3 col-12">
                            <label id="inputState">is_top</label>
                            <select id="inputState" class="form-control" name="is_top">
                            <option value="">Select</option>
                                <option {{$product->is_top == 1 ? 'selected': ''}} value="1">Yes</option>
                                <option {{$product->is_top  == 0 ? 'selected': ''}} value="0">No</option>

                            </select>
                          </div>
                          <div class="form-group col-md-3 col-12">
                            <label id="inputState">is_featured</label>
                            <select id="inputState" class="form-control" name="is_featured">
                            <option value="">Select</option>
                                <option {{$product->is_featured == 1 ? 'selected': ''}} value="1">Yes</option>
                                <option {{$product->is_featured  == 0 ? 'selected': ''}} value="0">No</option>

                            </select>
                          </div>
                          <div class="form-group col-md-3 col-12">
                            <label id="inputState">status</label>
                            <select id="inputState" class="form-control" name="status">
                              <option value="">Select</option>
                              <option {{$product->status == 1 ? 'selected': ''}} value="1">Active</option>
                              <option {{$product->status  == 0 ? 'selected': ''}} value="0">Inactive</option>
                            </select>
                          </div>
                          <div class="form-group col-md-3 col-12">
                            <label id="inputState">is_approved</label>
                            <select id="inputState" class="form-control" name="is_approved">
                              <option value="">Select</option>
                              <option {{$product->is_approved == 1 ? 'selected': ''}} value="1">Enable</option>
                              <option {{$product->is_approved  == 0 ? 'selected': ''}} value="0">Disable</option>
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
      </div>
    </div>
</section>

@endsection


@push('scripts')

    <script type="text/javascript">
      $(document).ready(function(){
        $('body').on('change', '.main-category', function(){
          let id = $(this).val();
          $.ajax({
            method: 'GET',
            url: "{{route('vendor.product.get-subcategory')}}",
            data: {
              id: id
            },

            success: function(data){
              $('.sub-category').html('<option value="">Select</option>')
              $.each(data, function(i, item){
                $('.sub-category').append(`<option value="${item.id}">${item.name}</option>`)
                // $('.sub-category').append('<option value="'+item.id+'">item.name</option>');
              })
            },
            error: function(xhr, status, error){
              console.log(error);
            }
          })
        })    
      })  
    </script>

<script type="text/javascript">
      $(document).ready(function(){
        $('body').on('change', '.sub-category', function(){
          let id = $(this).val();
          $.ajax({
            method: 'GET',
            url: "{{route('vendor.product.get-childcategory')}}",
            data: {
              id: id
            },

            success: function(data){
              $('.child-category').html('<option value="">Select</option>')
              $.each(data, function(i, item){
                $('.child-category').append(`<option value="${item.id}">${item.name}</option>`)
                // $('.sub-category').append('<option value="'+item.id+'">item.name</option>');
              })
            },
            error: function(xhr, status, error){
              console.log(error);
            }
          })
        })    
      })  
    </script>
@endpush