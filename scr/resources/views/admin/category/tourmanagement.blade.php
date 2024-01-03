@extends('admin.master')
@section('title','danh sách tour')
@section('main-content')

      <section class="content">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
                 <a href="{{route('tour.create')}}" class="btn btn-success">Thêm mới danh mục</a>
                 
                 
                 <div class="box-tools">
                  <form action="{{ route('global.search') }}" method="get" class="input-group">
                    <input type="text" name="search" class="form-control pull-right" placeholder="Search">
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </form>
                </div>
                 
              </div>
            </div>
            <!-- /.box-header -->
            <div class="col_w960">
            <div class="body1">
              <ul>
                @foreach($tour as $tours)
                <li >
                  <img src="{{ asset('storage/images')}}/{{$tours->image}}" class="im1" alt="img">
                  
                <div style="padding: 15px">
                  <p class="p1">{{$tours->nametour}}</p>
                  <p class="p1">lịch trình: {{$tours->schedule}}</p>
                  <p class="p1">Giá: {{$tours->price}}</p>
                  <p class="p1">số chỗ: {{$tours->numberguests}}</p>

                  <p class="p1">Trạng thái:
                    @if ($tours->statustour == 0)
                        <span>chưa hoàn thành</span>
                        @endif
                  </p>

                  <div style="float:right;">
                    <a href="#" class="btn btn-sm btn-success"><i class="fa-regular fa-circle-check" style="color: black; width:15  px"></i></a>
                    <a href="{{route('tour.edit', ['id_tour' => $tours ->id_tour])}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                    <a href="{{route('tour.delete', ['id_tour' => $tours ->id_tour])}}" class="btn btn-sm btn-danger" ><i class="fas fa-trash" style="color: black"></i></a>
                    
                  </div>
                </div>
                </li>
                @endforeach
              </ul>
            </div>
            </div>
            <div class="col-md-12">
              {{$tour->links('pagination::bootstrap-4')}}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </section>
@endsection
  


