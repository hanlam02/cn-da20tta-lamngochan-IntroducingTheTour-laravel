@include('homepage.userheader')
<form action="{{ url('/vnpay_payment') }}" method="POST">
    @csrf
    <div class="vnt-content">
        <div class="wrapCont">
            <div class="wrapper">
                <div class="mda-content">
                    <div class="mda-contents">
                        <div style="font-size: 18px; margin: auto; width: 99%;">
                            <h1 style="text-align: center">Thông Tin Đặt Tour</h1>
                            <div style="display: flex">
                            <div class="col-md-7">
                            <!-- Hiển thị thông tin liên hệ -->
                            <div>
                            <h2>Thông tin liên hệ</h2>
                            <hr>
                            <p><strong>Họ tên:</strong> {{ $thongTinLienHe['customer_name'] }}</p>
                            <p><strong>Email:</strong> {{ $thongTinLienHe['email'] }}</p>
                            <p><strong>Số điện thoại:</strong> {{ $thongTinLienHe['phone'] }}</p>
                            <p><strong>Địa chỉ:</strong> {{ $thongTinLienHe['address'] }}</p>
                            <p><strong>Ghi chú:</strong> {{ $thongTinLienHe['note'] }}</p>
                            <input type="hidden" name="customername" value="{{ $thongTinLienHe['customer_name'] }}">
                            <input type="hidden" name="email" value="{{ $thongTinLienHe['email'] }}">
                            <input type="hidden" name="phone" value="{{ $thongTinLienHe['phone'] }}">
                            <input type="hidden" name="address" value="{{ $thongTinLienHe['address'] }}">
                            <input type="hidden" name="note" value="{{ $thongTinLienHe['note'] }}">
                            </div>
                            <!-- Hiển thị thông tin hành khách -->
                            <div>
                                <br>
                            <h2>Thông tin hành khách</h2>
                            <hr>
                            @if(count($thongTinLienHe['hanh_khach']) > 0)
                                <table style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Họ tên</th>
                                            <th>Giới tính</th>
                                            <th>Độ tuổi</th>
                                            <th>Ghi chú</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($thongTinLienHe['hanh_khach'] as $hanhKhach)
                                            <tr>
                                                <td>{{ $hanhKhach['full_name'] }}</td>
                                                <td>{{ $hanhKhach['gender'] == 1 ? 'Nam' : 'Nữ' }}</td>
                                                <td>
                                                    {{
                                                        $hanhKhach['age'] == 1 ? 'Người lớn (> 9 tuổi)' :
                                                        ($hanhKhach['age'] == 2 ? 'Trẻ em (5 - 9 tuổi)' :
                                                        ($hanhKhach['age'] == 3 ? 'Em bé (< 5 tuổi)' : 'Loại không xác định'))
                                                    }}
                                                </td>   
                                                <td>{{ $hanhKhach['guest_note'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    
                                    <input type="hidden" name="name" value="{{ $hanhKhach['full_name'] }}">
                                    <input type="hidden" name="gender" value="{{ $hanhKhach['gender'] }}">
                                    <input type="hidden" name="age" value="{{ $hanhKhach['age'] }}">
                                    <input type="hidden" name="note" value="{{ $hanhKhach['guest_note'] }}">
                                </table>
                            @else
                                <p>Không có thông tin hành khách.</p>
                            @endif
                            </div>
                            </div>
                            <div>
                            <div>
                                <h2>Thông tin tour</h2>
                                <hr>
                                <p><strong>Tên tour:</strong> {{ $thongTinTour['ten_tour'] }}</p>
                                {{-- <p><strong>Mã tour:</strong> {{ $thongTinTour['id_tour'] }}</p> --}}
                                <p><strong>Thời gian:</strong> {{ $thongTinTour['schedule'] }}</p>
                                <p><strong>Ngày khởi hành:</strong> {{ $thongTinTour['startdate'] }}</p>
                                <p><strong>Ngày kết thúc:</strong> {{ $thongTinTour['enddate'] }}</p>
                                <p><strong>Phương tiện:</strong> {{ $thongTinTour['vehicle'] }}</p>
                                <p><strong>Giá:</strong>
                                    <input type="hidden" name="idtour" value="{{ $thongTinTour['id_tour'] }}">
                                    <span>{{ number_format(isset($thongTinTour['sale_price']) ? $thongTinTour['sale_price'] : $thongTinTour['price'], 0, '.', '.') }}đ</span>
                            </div>
                            <div>
                                <h2>Thông tin đặt tour</h2>
                                <hr>    
                                <table style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="width: 200px;"></th>
                                            <th  style="width: 200px;text-align: center">Số lượng</th>
                                            <th style="text-align: center">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        
                                            <tr>
                                                <td>
                                                
                                                    <p> Số lượng người lớn</p>    
                                                    <p> Số lượng trẻ em</p>
                                                    <p>Số lượng em bé</p>                                               
                                                </td>
                                                
                                                <td style="text-align: center">
                                                
                                                 <p>{{ $soLuongNguoiLon }}</p>
                                                 <p>{{ $soLuongTreEm }}</p>   
                                                 <p>{{ $soLuongEmBe }}</p>      
                                                </td>
                                                <td style="text-align: center">
                                                    <p>{{ number_format( $thongTinTour['price_ForAdult'] * $soLuongNguoiLon , 0, '.', '.') }}đ</p>
                                                    <p>{{ number_format( $thongTinTour['price_ForChild'] * $soLuongTreEm , 0, '.', '.') }}đ</p>
                                                    <p>{{ number_format(  $thongTinTour['price_ForBaby'] * $soLuongEmBe , 0, '.', '.') }}đ</p>
                                                    
                                                </td>
                                            </tr>    
                                            <tr>
                                                <td style="text-align: center; font-weight: bold; font-size: 20px"> <p>Tổng tiền</p></td>
                                                <td></td>
                                                <td style="text-align: center; font-weight: bold; font-size: 20px">
                                                    <p>
                                                    {{ number_format($thongTinTour['price_ForAdult'] * $soLuongNguoiLon + $thongTinTour['price_ForChild'] * $soLuongTreEm +  $thongTinTour['price_ForBaby'] * $soLuongEmBe, 0, '.', '.') }}
                                                        đ
                                                 </p>
                                                </td>
                                                 <input type="hidden" id="totalPriceInput" name="totalPrice" value="{{ $thongTinTour['price_ForAdult'] * $soLuongNguoiLon + $thongTinTour['price_ForChild'] * $soLuongTreEm +  $thongTinTour['price_ForBaby'] * $soLuongEmBe}}">
                                                 <input type="hidden" name="QuantityAdult" value="{{ $soLuongNguoiLon }}">
                                                 <input type="hidden" name="QuantityChild" value="{{ $soLuongTreEm }}">
                                                 <input type="hidden" name="QuantityBaby" value="{{ $soLuongEmBe }}">
                                                </tr>          
                                    </tbody>
                                   
                                </table>
                                
                            </div>
                            
                            </div>
                            
                        </div>
                        <br>
                        <button type="submit" name="redirect" class="btn btn-outline-primary-2 btn-order btn-block" style="width: 200px; height: 70px; background-color: lawngreen; font-weight: bold; font-size: 18px; margin: auto">
                            Thanh toán VNPAY
                        </button>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@include('homepage.footer')