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
                  <form method="post" action="{{route('admin.child-category.store')}}" enctype="multipart/form-data">
                  	@csrf
                    <div class="card-header">
                      <h4>Tambah Sub Category</h4>
                    </div>
                    
                    <div class="card-body">
                    	  <div class="row">
                          <div class="form-group col-md-12 col-12">
                              <label>Category</label>
                            <select id="inpuState" class="form-control main-category" name="category">
                              @foreach($category as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-12 col-12">
                              <label>Sub Category</label>
                            <select id="inpuState" class="form-control sub-category" name="sub_category">
                                <option value="">Select</option>
                            </select>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="form-group col-md-12 col-12">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                            
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
@push('scripts')

    <script type="text/javascript">
      $(document).ready(function(){
        $('body').on('change', '.main-category', function(){
          let id = $(this).val();
          $.ajax({
            method: 'GET',
            url: "{{route('admin.get-subcategory')}}",
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
@endpush