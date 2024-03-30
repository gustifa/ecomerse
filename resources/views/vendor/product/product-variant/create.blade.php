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
                  <form method="post" action="{{route('vendor.product-variant.store')}}" enctype="multipart/form-data">
                  	@csrf                  
                        <div class="row">
                          <div class="form-group col-md-12 col-12 wsus__input">
                            <label>Name <code>*</code></label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                            <input type="hidden" name="product" class="form-control" value="{{request()->product}}">                          
                          </div>                 
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12 col-12 wsus__input">
                                <label id="inputState">status <code>*</code></label>
                                <select id="inputState" class="form-control" name="status">
                                <option value="">Select</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group col-md-12 col-12 text-left" style="margin-top: 15px;">
                          <button class="btn btn-primary">Save</button>
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

