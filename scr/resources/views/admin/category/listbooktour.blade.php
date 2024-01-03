@extends('admin.master')
@section('title','Trang Quản Trị')
@section('main-content')

<section class="list">
    <div class="box-body table-responsive no-padding">
    <table class="table table-hover" style="width:100%">    
        <tr>
            <th>Mã đặt tour</th>
            <th>tên Tour</th>
            <th>Tên Khách Hàng</th>
            <th>Số Điện Thoại</th>
            <th>Email</th>
            <th>Địa Chỉ</th>
            <th>Số Lượng vé</th>
            <th>Tổng Tiền</th>
            <th>Trạng Thái</th>
            <th></th>
        </tr>
        @foreach ($list as $item)
        <tr>
            <td>{{$item->id_booktour}}</td>
            <td>{{$item->id_tour}}</td>
            <td>{{$item->customer_name}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->address}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->total}}</td>
            <td>{{$item->status}}</td>
        @endforeach
        </tr>
    </table>
    </div>
</section>  
@endsection