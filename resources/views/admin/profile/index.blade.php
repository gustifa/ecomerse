@extends('admin.layouts.master')
@section('content')
        <section class="section">
          <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Profile</div>
            </div>
          </div>
          <div class="section-body">
            
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form method="post" class="needs-validation" novalidate="" action="{{route('admin.profile.update')}}" enctype="multipart/form-data">
                  	@csrf
                    <div class="card-header">
                      <h4>Update Profile</h4>
                    </div>
                    <div class="card-body">
                    	<div class="row">
                          <div class="form-group col-md-12 col-12">
                          	<div class="mb-3">
                          		<img width="100px" src="{{asset(Auth::user()->image)}}">
                          	</div>
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                            
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" required="">
                            <div class="invalid-feedback">
                              Please fill in the email
                            </div>
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}">
                          </div>
                        </div>
                      
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>


                 <div class="card">
                  <form method="post" class="needs-validation" novalidate="" action="{{route('admin.profile.update.password')}}" enctype="multipart/form-data">
                  	@csrf
                    <div class="card-header">
                      <h4>Update Password</h4>
                    </div>
                    <div class="card-body">
                    	
                        
                        <div class="row">
                          <div class="form-group col-md-12 col-12">
                            <label>Password Lama</label>
                            <input type="password" name="password_lama" class="form-control">
                            
                          </div>

                          <div class="form-group col-md-12 col-12">
                            <label>Password Baru</label>
                            <input type="password" name="password" class="form-control">
                            
                          </div>

                          <div class="form-group col-md-12 col-12">
                            <label>Konfirmasi Password</label>
                            <input type="password" name="konfirmasi_password" class="form-control">
                            
                          </div>
                          
                        </div>
                      
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>

@endsection