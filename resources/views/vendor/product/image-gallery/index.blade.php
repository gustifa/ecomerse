@extends('vendor.layouts.master')
@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
      @include('vendor.layouts.sidebar')
      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="fa fa-product-hunt"></i> Product</h3>
            <div class="wsus__input">
                    <form method="post" action="{{route('vendor.product-image-gallery.store')}}" enctype="multipart/form-data">
                  	  @csrf
                          <div class="form-group">
                          	
                            <label>Image<code> (Multiple Image Supported!)</code></label>
                            <input type="file" name="image[]" class="form-control" multiple>
                            <input type="hidden" name="product" value="{{$product->id}}">
                            
                          </div>
                          <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
            </div>
            <div class="wsus__dashboard_profile" style="margin-top:15px;">
                <div class="wsus__dash_pro_area">
                {{ $dataTable->table() }}

                </div>
            </div>
          </div>
        </div>
      </div>

      
    </div>
</section>

@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script type="text/javascript">
      $(document).ready(function(){
        $('body').on('click', '.change-status', function(){
          let checked = $(this).is(':checked');
          let id = $(this).data('id');
          
          $.ajax({
            url: "{{route('vendor.product.change-status')}}",
            method: 'PUT',
            data: {
              status: checked,
              id: id
            },
            success: function(data){
              toastr.success(data.message)
            },
            error: function(xhr, status, error){
              console.log(error);
            }
          })
        })    
      })  
    </script>
@endpush