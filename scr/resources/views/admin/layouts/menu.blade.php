<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar" >
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="image">
          <img src="{{asset('assets')}}/dist/img/.jpg" class="img-circle elevation-2" alt="User Image">
        </div> --}}
        <div class="info" >
          <a href="#" class="d-block" style="margin-left: 10px; font-size: 25px">TRANG QUẢN TRỊ</a>
        </div>
      </div>
{{-- 
      <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input style="background-color: #1f2234" class="form-control form-control-sidebar" type="search"
                      placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                      <button style="background-color: #1f2234" class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>


      <!-- Sidebar Menu --> --}}
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="{{route('category.index')}}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Quản lý tour
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('categorylocations.index')}}" class="nav-link">
              <i class="nav-icon fas fa-map-marker-alt"></i>
              <p>
                Địa điểm
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('listbooktour')}}" class="nav-link">
                 <i class="nav-icon fas fa-book-open"></i>
              <p>
                Danh sách đặt tour
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{Route('revenue')}}" class="nav-link">
              <i class=""></i>
              <i class="nav-icon fa-solid fa-cash-register" style="color: azure"></i>
              <p>
                Doanh thu
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>