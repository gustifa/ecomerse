@extends('admin.layouts.master') 
@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Slider</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Slider</a></div>
              <!-- <div class="breadcrumb-item">Table</div> -->
            </div>
          </div>

          <div class="section-body">
           

            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data Slider</h4>
                  </div>
                  <div class="card-footer text-right">
                      <a href="{{route('admin.slider.create')}}"><button class="btn btn-primary"><i class="fas fa-plus"></i></button></a>
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