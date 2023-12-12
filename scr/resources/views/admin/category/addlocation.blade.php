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
            <div class="col-md-8">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Thêm mới location</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="{{route('location.store')}}">
                  @csrf
                  <div class="box-body">
                    <div class="form-group ">
                       {{-- //@error('name_location') has-error @enderror --}}
                      <label for="exampleInputEmail1">Tên Địa Điểm</label>
                      <input type="text" class="form-control" id="id" name="name_location">
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
  


