@extends('vendor.layouts.master')
@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
      @include('vendor.layouts.sidebar')
      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> profile</h3>
            <div class="wsus__dashboard_profile">
                <div class="wsus__dash_pro_area">
                    <h4>Preview</h4>
                        <form method="post" action="{{route('vendor.shop-profile.update', $vendorProfile->id)}}" enctype="multipart/form-data">
                  	        @csrf
                              @method('PUT')
                              <div class="col-xl-3 col-sm-6 col-md-6 wsus__input">
                                <div class="wsus__dash_pro_img">
                                    <img src="{{asset($vendorProfile->banner)}}" alt="img" class="img-fluid w-100">
                                    <input type="file" name="banner" class="form-control">
                                </div>
                              </div>

                              <!-- <div class="form-group col-md-12 col-12">
                          	
                              <label>Preview</label>
                              <br>
                              <img width="200px" src="{{asset($vendorProfile->banner)}}" alt="">
                              
                            </div>
                            <div class="form-group col-md-12 col-12">
                          	
                              <label>banner <code>*</code></label>
                              <input type="file" name="banner" class="form-control">
                              
                            </div> -->

                            <div class="form-group col-md-12 col-12 wsus__input">
                                <label>Shop Name <code>*</code></label>
                                <input type="text" name="shop_name" class="form-control" value="{{$vendorProfile->shop_name}}">
                            </div>
                            <div class="form-group col-md-12 col-12 wsus__input">
                                <label>Phone <code>*</code></label>
                                <input type="text" name="phone" class="form-control" value="{{$vendorProfile->phone}}">
                            </div>

                            <div class="form-group col-md-12 col-12 wsus__input">
                                <label>E-mail <code>*</code></label>
                                <input type="text" name="email" class="form-control" value="{{$vendorProfile->email}}">
                            </div>

                            <div class="form-group col-md-12 col-12 wsus__input">
                                <label>Address <code>*</code></label>
                                <input type="text" name="address" class="form-control" value="{{$vendorProfile->address}}">
                            </div>

                            <div class="form-group col-md-12 col-12 wsus__input">
                                <label>Description <code>*</code></label>
                                <br>
                                <textarea class="summernote" name="description">{!!$vendorProfile->description!!}</textarea>
                            
                            </div>

                            <div class="form-group col-md-12 col-12 wsus__input">
                                <label>Facebook <code>*</code></label>
                                <input type="text" name="fb_link" class="form-control" value="{{$vendorProfile->fb_link}}">
                            </div>

                            <div class="form-group col-md-12 col-12 wsus__input">
                                <label>Instagram <code>*</code></label>
                                <input type="text" name="insta_link" class="form-control" value="{{$vendorProfile->insta_link}}">
                            </div>

                            <div class="form-group col-md-12 col-12 wsus__input">
                                <label>Twitter <code>*</code></label>
                                <input type="text" name="tw_link" class="form-control" value="{{$vendorProfile->tw_link}}">
                            </div>

                            <div class="text-left">
                                <br>
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