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
                  <h3 class="box-title">Cập nhật </h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {{-- {{ route('tour.edit', ['id_tour' => $tours->id_tour]) }} --}}
                <form role="form" method="POST" action="{{ route('tour.update', ['id_tour' => $tour->id_tour]) }}" enctype="multipart/form-data">
                @method('PUT')
                  @csrf
                  <div class="box-body">
                    <div class="form-group">
                       {{-- //@error('name_location') has-error @enderror --}}
                      <label for="exampleInputEmail1">Tên Tour</label>
                      <input type="text" class="form-control" id="nametour" value="{{ $tour->nametour }}" name="nametour" required>
                      <label for="start_point">Điểm xuất phát</label>
                      <select class="form-control" id="id_location" name="id_location">
                        <option value="">Chọn điểm xuất phát</option>
                        @foreach($locations as $location)
                            <option value="{{ $location->id_location }}">{{ $location->name_location }}</option>
                        @endforeach
                        <option value="4">Không có điểm xuất phát</option>
                    </select>
                    <label for="exampleInputEmail1">Tên miền</label>
                    <input type="text" class="form-control" id="domain" name="domain" value="{{ $tour->domain }}">                    
                      <label for="exampleInputEmail1">Hành trình</label>
                      <input type="text" class="form-control" id="itinerary" name="itinerary" value="{{ $tour->itinerary }}">
                      <label for="exampleInputEmail1">Lịch trình</label>
                      <input type="text" class="form-control" id="schedule" name="schedule" value="{{ $tour->schedule }}"><br>
                       <label for="birthdaytime">Khởi hành: </label>
                      <input type="datetime-local" id="startdate" name="startdate" value="{{ $tour->startdate}}"><br><br>
                      <label for="birthdaytime">Kết thúc:  </label>
                      <input type="datetime-local" id="enddate" name="enddate" value="{{ $tour->enddate}}"><br><br>
                      <label for="exampleInputEmail1">Số chỗ</label>
                      <input type="text" class="form-control" id="numberguests" name="numberguests" value="{{ $tour->numberguests }}">
                      <label for="exampleInputEmail1">Phương tiện</label>
                      <input type="text" class="form-control" id="vehicle" name="vehicle" value="{{ $tour->vehicle }}">
                      <label for="exampleInputEmail1">Giá</label>
                      <input type="text" class="form-control" id="price" name="price" value="{{ $tour->price }}">
                      <label for="exampleInputEmail1">Giá khuyến mãi</label>
                      <input type="text" class="form-control" id="sale_price" name="sale_price" value="{{ $tour->sale_price }}">
                      <label for="exampleInputEmail1">HOT</label>
                      <input type="checkbox" id="stock" name="stock" value="1" {{ $tour->stock ? 'checked' : '' }}><br>
                      <br>
                      <label for="exampleInputEmail1">Chọn ảnh mới</label>
                      <input type="file" class="form-control" id="image" name="image"><br>
                      <img src="{{ asset('storage/images')}}/{{$tour->image}}" style="width:50px;">
                      <br>
                      <br>
                      {{-- <label for="exampleInputEmail1">Ảnh chi tiết</label>
                      <input type="file" class="form-control" id="image_path" name="image_path" multiple> --}}
                      <label for="exampleInputEmail1">Mô tả</label>
                      <textarea class="form-control" id="editor1" name="description" rows="10" cols="80">{{ $tour->description }}</textarea>
                      
                      {{-- @error('name_location')
                      <span class="help-block" style="color: red">{{$message}}</span>
                      @enderror --}}  
                      
                    </div>
                    
                  </div>
                  <!-- /.box-body -->
    
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
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


