@extends('admin.master')
@section('title','Trang Quản Trị')
@section('main-content')

      <section class="content">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                 <a href="{{route('location.create')}}" class="btn btn-success">Add</a>
                 <div class="box-tools">
                  <form action="{{ route('product.search') }}" method="get" class="input-group">
                      <input type="text" name="search" class="form-control pull-right" placeholder="Search">
                      <div class="input-group-btn">
                          <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                      </div>
                  </form>
              </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              @if($locations->isEmpty())
              <p>Không tìm thấy địa điểm</p>
          @else
              <table class="table table-hover">
                <tbody><tr>
                  <th>STT</th>
                  <th>Tên Địa Điểm</th>
                  <th>Thao Tác</th>
                </tr>

                @foreach($locations as $location)
                <tr>
                  <td>{{$location->id_location}}</td>
                  <td>{{$location->name_location}}</td>
                  <td>
                  <a href="{{route('location.edit', ['id_location' => $location ->id_location])}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i>Edit</a>
                  <a href="{{route('location.delete', ['id_location' => $location ->id_location])}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>Delete</a>
                </td>
                </tr>
                @endforeach
              </tbody></table>
            </div>
            <div class="col-md-12">
              {{$locations->links('pagination::bootstrap-4')}}
            </div>
            @endif  
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </section>
@endsection
  


