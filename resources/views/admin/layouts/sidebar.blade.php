<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown {{ setActive([
              'admin.dashboard'
              ])}}">
              <a href="{{route('admin.dashboard')}}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              
            </li>

            <li class="menu-header">Stisla</li>
            <li class="dropdown {{ setActive([
              'admin.slider.*',
              ])}}">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Manage Slider</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('admin.slider.index')}}">Lihat</a></li>                
                <li><a class="nav-link beep beep-sidebar" href="{{route('admin.slider.create')}}">Add</a></li>                
                <li><a class="nav-link" href="components-chat-box.html">Chat Box</a></li>                
                          
              </ul>
            </li>
            <li class="dropdown {{ setActive([
              'admin.category.*',
              'admin.sub-category.*',
              'admin.child-category.*'
              ])}}">
              <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Manage Category</span></a>
              <ul class="dropdown-menu">
                <li class="{{ setActive(['admin.category.*'])}}"><a class="nav-link" href="{{route('admin.category.index')}}">Category</a></li>
                <li class="{{ setActive(['admin.sub-category.*'])}}"><a class="nav-link" href="{{route('admin.sub-category.index')}}">Sub Category</a></li>
                <li class="{{ setActive(['admin.child-category.*'])}}"><a class="nav-link" href="{{route('admin.child-category.index')}}">Child Category</a></li>
              </ul>
            </li>
            <li class="dropdown {{ setActive([
              'admin.brand.*',
              ])}}">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marker-alt"></i> <span>Manage Brand</span></a>
              <ul class="dropdown-menu">
                <li class="{{ setActive(['admin.brand.*'])}}"><a href="{{route('admin.brand.index')}}">Brand</a></li>
              
              </ul>
            </li>   
            <li class="dropdown {{ setActive([
              'admin.product.*',
              'admin.seller.*',
              ])}}">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marker-alt"></i> <span>Manage Product</span></a>
              <ul class="dropdown-menu">
                <li class="{{ setActive(['admin.product.*'])}}"><a href="{{route('admin.product.index')}}">Product</a></li>
                <li class="{{ setActive(['admin.seller.product.*'])}}"><a href="{{route('admin.seller.product.index')}}">Seller Product</a></li>
                <li class="{{ setActive(['admin.seller.pending.product.*'])}}"><a href="{{route('admin.seller.pending.product.index')}}">Pending Product</a></li>
              
              </ul>
            </li>          
            <li class="dropdown {{ setActive([
              'admin.vendor-profile.*',
              ])}}">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-plug"></i> <span>Ecomerse</span></a>
              <ul class="dropdown-menu">
                <li class="{{ setActive(['admin.vendor-profile.index'])}}"><a class="nav-link" href="{{route('admin.vendor-profile.index')}}">Vendor Profile</a></li>
                <li class="{{ setActive(['admin.vendor-profile.index'])}}"><a class="nav-link" href="{{route('admin.flash-sale.index')}}">Flash Sale</a></li>
                <li><a class="nav-link" href="modules-chartjs.html">ChartJS</a></li>
                <li><a class="nav-link" href="modules-datatables.html">DataTables</a></li>
                <li><a class="nav-link" href="modules-flag.html">Flag</a></li>
                
              </ul>
            </li>
            <li class="menu-header">Pages</li>
            <li class="dropdown ">
              <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
              <ul class="dropdown-menu">
                <li><a href="auth-forgot-password.html">Forgot Password</a></li> 
                <li><a href="auth-login.html">Login</a></li> 
                <li><a href="auth-register.html">Register</a></li> 
                <li><a href="auth-reset-password.html">Reset Password</a></li> 
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-exclamation"></i> <span>Errors</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="errors-503.html">503</a></li> 
                <li><a class="nav-link" href="errors-403.html">403</a></li> 
                <li><a class="nav-link" href="errors-404.html">404</a></li> 
                <li><a class="nav-link" href="errors-500.html">500</a></li> 
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i> <span>Features</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="features-activities.html">Activities</a></li>
                <li><a class="nav-link" href="features-post-create.html">Post Create</a></li>
                <li><a class="nav-link" href="features-posts.html">Posts</a></li>
                <li><a class="nav-link" href="features-profile.html">Profile</a></li>
                <li><a class="nav-link" href="features-settings.html">Settings</a></li>
                <li><a class="nav-link" href="features-setting-detail.html">Setting Detail</a></li>
                <li><a class="nav-link" href="features-tickets.html">Tickets</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Utilities</span></a>
              <ul class="dropdown-menu">
                <li><a href="utilities-contact.html">Contact</a></li>
                <li><a class="nav-link" href="utilities-invoice.html">Invoice</a></li>
                <li><a href="utilities-subscribe.html">Subscribe</a></li>
              </ul>
            </li>            <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li>
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-rocket"></i> Documentation
            </a>
          </div>        </aside>
      </div>