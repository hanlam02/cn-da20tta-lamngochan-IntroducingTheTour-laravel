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
            {{-- <th>Trạng Thái</th> --}}
            <th></th>
        </tr>
        @foreach ($listbt as $item)
        <td>{{ $item->id_booktour }}</td>

        @foreach ($listt as $t)
        @if ($t->id_tour == $item->id_tour)
            <td>{{ $t->nametour }}</td>
        @endif
    @endforeach
            @foreach ($listlh as $contact)
                @if ($contact->id_contact == $item->id_contact)
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->adress }}</td>
                   
                    {{-- Thêm các thông tin khác từ $contact nếu cần --}}
                @endif
            @endforeach
            <td>{{ $item->quantityAdult + $item->quantityChild + $item->quantityBaby }}
                <i class="fa-solid fa-grid-2" style="color: #56acd7;"></i></>
                <a href="#" class="fa-sharp fa-solid fa-list" style=" text-decoration: none;"></a></td>
            <td>{{ number_format($item->total, 0, '.', '.') }}đ</td>
            {{-- <td>{{ $item->status }}</td> --}}
        </tr>
    @endforeach
        </tr>
    </table>
    </div>
</section>  
@endsection