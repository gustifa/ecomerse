@extends('admin.layouts.master') 
@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Product</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Slider</a></div>
              <!-- <div class="breadcrumb-item">Table</div> -->
            </div>
          </div>

          <div class="section-body">
            <div class="mb-3">
              <a href="{{route('admin.product.index')}}" class="btn btn-primary">Back</a>
            </div>
          <div class="row">
          <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <h4>Product: {{$product->name}}</h4>
                    </div>           
                    <div class="card-body">
                    <form method="post" action="{{route('admin.product-image-gallery.store')}}" enctype="multipart/form-data">
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
              </div>
            </div>


            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Product Image Gallery</h4>
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
@endpush