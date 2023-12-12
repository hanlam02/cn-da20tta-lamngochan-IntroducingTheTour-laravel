@extends('admin.master')
@section('title', 'Trang Quản Trị')
@section('title-page', 'Cập nhật danh mục')

@section('main-content')

<section class="content">
    <div class="col-xs-12">
        @if(Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert"></button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="box">
            <div class="box-header">
                <!-- /.box-header -->
                <div class="col-md-8">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cập nhật</h3>
                        </div>
                        <form role="form" method="POST" action="{{ route('location.update', ['id_location' => $location->id_location]) }}">
                            @method('PUT')
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Địa Điểm</label>
                                    <input type="text" class="form-control" id="name_location" value="{{ $location->name_location }}" name="name_location" required>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
