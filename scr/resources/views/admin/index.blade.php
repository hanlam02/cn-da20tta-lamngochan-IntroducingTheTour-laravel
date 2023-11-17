@extends('admin.master')
@section('title','Trang Quản Trị')
@section('main-content')

      <section class="content">
      <div class="container-fluid" >
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-transparent">
              <div class="inner">
                <h4>Tổng số tour<sup style="font-size: 20px"></sup></h4>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="fa fa-bars" style="color: darkturquoise"></i>
              </div>
              <a href="#" class="small-box-footer" style="background-color:darkturquoise">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-transparent">
              <div class="inner">
                <h4>Tour đã đặt<sup style="font-size: 20px"></sup></h4>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="fa fa-th-large" style="color:limegreen"></i>
              </div>
              <a href="#" class="small-box-footer" style="background-color:limegreen">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3  col-6">
            <!-- small box -->
            <div class="small-box bg-transparent">
              <div class="inner">
                <h4>Tổng số thành viên</h4>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="fa fa-users" style="color:goldenrod"></i>
              </div>
              <a href="#" class="small-box-footer" style="background-color:goldenrod">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3  col-6">
            <!-- small box -->
            <div class="small-box bg-transparent">
              <div class="inner">
                <h4>Tổng số khách hàng</h4>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="fa fa-users" style="color:red"></i>
              </div>
              <a href="#" class="small-box-footer" style="background-color:red">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
  


