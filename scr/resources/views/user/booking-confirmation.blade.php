<p>Xin chào anh/chị {{ $details['customer_name'] }},</p>

<p>Cảm ơn anh/chị đã đặt tour du lịch bên Domestic travel. Đây là xác nhận đặt tour của anh/chị:</p>

<p>Tên tour: {{ $details['tourname'] }}</p>
<p>Số lượng: {{ $details['quantity'] }}</p>
<p>Thời gian bắt đầu: {{ $details['startdate'] }}</p>
<p>Thời gian kết thúc: {{ $details['enddate'] }}</p>

<p>Cảm ơn anh/chị đã đặt tour. Vui lòng xác nhận đặt tour bằng cách nhấp vào nút dưới đây:</p>

<a href="{{ route('confirm-booking', ['confirmation_code' => $details['confirmation_code']]) }}"
 style="display: inline-block; background-color: green; color: #fff; padding: 7px 25px;
 font-weight: bold">Xác nhận đặt tour</a>       