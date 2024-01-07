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
                
                <p style="text-align: center; font-size: 20px">{{$tourCount}}</p>
                
              </div>
              <div class="icon">
                <i class="fa fa-bars" style="color: darkturquoise"></i>
              </div>
              <a href="#" class="small-box-footer" style="background-color:darkturquoise; width: 100%; height: 30px;"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-transparent">
              <div class="inner">
                <h4>Doanh thu <sup style="font-size: 20px"></sup></h4>

                <p style="font-size: 20px">{{ number_format($totalCount, 0, '.', '.') }}đ</p>
              </div>  
              <div class="icon">
                <i class="fa fa-th-large" style="color:limegreen"></i>
              </div>
              <a href="#" class="small-box-footer" style="background-color:limegreen; width: 100%; height: 30px;"></i></a>
            </div>
          </div>
          </div>
          <canvas id="monthlyRevenueChart"></canvas>
        </div>
      </div>
    </section>
    <script src="{{ asset('js/chart.js') }}"></script>
    {{-- <script>
      document.addEventListener('DOMContentLoaded', function () {
          var dailyRevenue = @json($dailyRevenue);

          var labels = dailyRevenue.map(function (day) {
              return day.date;
          });

          var data = dailyRevenue.map(function (day) {
              return day.revenue;
          });

          var ctx = document.getElementById('monthlyRevenueChart').getContext('2d');
          var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                  labels: labels,
                  datasets: [{
                      label: 'Daily Revenue',
                      data: data,
                      backgroundColor: 'rgba(75, 192, 192, 0.7)',
                  }],
              },
          });
      });
  </script> --}}
@endsection
  


