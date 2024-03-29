@extends('admin.layouts.master') 
@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Brand</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">All Brand</a></div>
              <!-- <div class="breadcrumb-item">Table</div> -->
            </div>
          </div>

          <div class="section-body">
           

            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Brand</h4>
                  </div>
                  <div class="card-footer text-right">
                      <a href="{{route('admin.brand.create')}}"><button class="btn btn-primary">Create</button></a>
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
            url: "{{route('admin.brand.change-status')}}",
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

<script type="text/javascript">
      $(document).ready(function(){
        $('body').on('click', '.change-isfetured', function(){
          let checked = $(this).is(':checked');
          let id = $(this).data('id');
          
          $.ajax({
            url: "{{route('admin.brand.change-isfetured')}}",
            method: 'PUT',
            data: {
              is_fetured: checked,
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