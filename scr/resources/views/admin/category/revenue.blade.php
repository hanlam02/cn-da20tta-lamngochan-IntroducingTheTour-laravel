@extends('admin.master')
@section('title','doanh thu')
@section('main-content')
<section class="list">
    <div class="box-body table-responsive no-padding">
        <h2>Doanh thu trong ngày</h2>
        <br>
    <form method="get" action="{{ route('revenue') }}">
        @csrf
        <label for="selectedDate">Ngày: </label>
        <input type="date" id="selectedDate" name="selectedDate" value="{{ $selectedDate->format('Y-m-d') }}">
        <button type="submit"> chọn</button>
    </form>
<br>
    <p style="font-size: 20px">Tổng doanh thu trong ngày: {{ number_format($revenueData['totalRevenue'], 0, '.', '.') }}đ</p>
    <table class="table table-hover" style="width:100%">    
        <tr>
            
            <th>Mã đặt tour</th>
            <th>Tên tour</th>
            <th>Tên khách hàng</th>
            <th>Liên hệ</th>
            <th>Số lượng</th>
            <th>Tổng Tiền</th>      
        </tr>
        @foreach($revenueData['bookTours'] as $bookTour)
        <tr>
            
            <td>{{ $bookTour->id_booktour }}</td>
            @foreach ($listt as $t)
            @if ($t->id_tour == $bookTour->id_tour)
                <td>{{ $t->nametour }}</td>
            @endif
            @endforeach
                @foreach ($listlh as $contact)
                    @if ($contact->id_contact == $bookTour->id_contact)
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->email }}</td>
                        {{-- Thêm các thông tin khác từ $contact nếu cần --}}
                    @endif
                @endforeach
                <td> {{ number_format($bookTour->total, 0, '.', '.') }}đ</td>    
        </tr>
        @endforeach
    </table>  
</section>  
@endsection