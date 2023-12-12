@extends('admin.master')
@section('title','Trang Quản Trị')
@section('title-page','Thêm mới danh mục')

@section('main-content')

      <section class="content">
        <div class="col-xs-12">
            @if(Session::get('success'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert"></button>
              <strong>{{$message}}</strong>
            </div>
            @endif
          <div class="box">
            <div class="box-header">

            <!-- /.box-header -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Thêm mới tour </h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="{{route('tour.store')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="box-body">
                    <div class="form-group">
                       {{-- //@error('name_location') has-error @enderror --}}
                      <label for="exampleInputEmail1">Tên Tour</label>
                      <input type="text" class="form-control" id="nametour" name="nametour" required><br>
                      <label for="start_point">Điểm xuất phát</label>
                      <select class="form-control" id="id_location" name="id_location">
                        <option value="">Chọn điểm xuất phát</option><br>
                        @foreach($locations as $location)
                            <option value="{{ $location->id_location }}">{{ $location->name_location }}</option>
                        @endforeach
                        <option value="4">Không có điểm xuất phát</option>
                    </select>
                    <label for="exampleInputEmail1">Tên miền</label>
                    <input type="text" class="form-control" id="domain" name="domain"><br>               
                      <label for="exampleInputEmail1">Hành trình</label>
                      <input type="text" class="form-control" id="itinerary" name="itinerary"><br>
                      <label for="exampleInputEmail1">Lịch trình</label>
                      <input type="text" class="form-control" id="schedule" name="schedule"><br>
                      <label for="exampleInputEmail1">Số chỗ</label>
                      <input type="text" class="form-control" id="numberguests" name="numberguests"><br>
                      <label for="exampleInputEmail1">Phương tiện</label>
                      <input type="text" class="form-control" id="vehicle" name="vehicle"><br>
                      <label for="exampleInputEmail1">Giá</label>
                      <input type="text" class="form-control" id="price" name="price"><br>
                      <label for="exampleInputEmail1">Giá khuyến mãi</label>
                      <input type="text" class="form-control" id="sale_price" name="sale_price"><br>
                      <label for="exampleInputEmail1">HOT</label>
                      <input type="checkbox" id="stock" name="stock" value="1"><br>
                      <label for="exampleInputEmail1">Ảnh tour</label>
                      <input type="file" class="form-control" id="image" name="image"><br>
                      <label for="exampleInputEmail1">Ảnh chi tiết</label>
                      <input type="file" class="form-control" id="image_path" name="image_path" multiple><br>
                      <label for="exampleInputEmail1">Mô tả</label>
                      <textarea class="form-control" id="editor1" name="description" rows="10" cols="80"></textarea>
                      
                      {{-- @error('name_location')
                      <span class="help-block" style="color: red">{{$message}}</span>
                      @enderror --}}  
                      
                    </div>
                    
                  </div>
                  <!-- /.box-body -->
    
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                  </div>
                </form>
              </div>
           
              <!-- /.box -->
    
            </div>
          </div>
        </div>
    </section>
@endsection

@section('custom-js')
<script src="http://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
     <script>
         CKEDITOR.replace('editor1');
      </script>
@endsection


