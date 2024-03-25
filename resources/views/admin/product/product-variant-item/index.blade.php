@extends('admin.layouts.master') 
@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Product Variant Item</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Slider</a></div>
              <!-- <div class="breadcrumb-item">Table</div> -->
            </div>
          </div>

          <div class="section-body">
          <div class="mb-3">
              <a href="{{route('admin.product-variant.index', ['product' => $product->id])}}" class="btn btn-primary">Back</a>
            </div>

            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Product Variant Name: <code>{{$productVariant->name}}</code></h4>
                  </div>
                  <div class="card-footer text-right">
                      <a href="{{route('admin.product-variant-item.create', ['productId' => $product->id, 'variantId' => $productVariant->id])}}"><button class="btn btn-primary"><i class="fas fa-plus"></i></button></a>
                  </div>
                  <div class="card-body p-0">
                    {{ $dataTable->table() }}
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
            url: "{{route('admin.product-variant.change-status')}}",
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