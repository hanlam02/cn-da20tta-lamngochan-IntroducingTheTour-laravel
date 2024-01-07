<!-- resources/views/booktour.blade.php -->
@if (session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Tour</title>
    <!-- Include your CSS styles and scripts here -->
    <link rel="stylesheet" href="//dulichviet.com.vn/css_cu/your-styles.css">
</head>

<body>

    @include('homepage.userheader')

    <style>
        /* Thêm CSS tùy chỉnh nếu cần */
    </style>

    <div class="vnt-content">
        <div class="wrapCont">
            <div class="wrapper">
                <div class="mda-content">
                    <div class="mda-contents">
                        {{-- <form method="post" action="{{ route('booktour.store') }}"> --}}
                            <form action="{{ url('/luuthongtin') }}" method="POST">
                            @csrf
                            @if ($product)
                                <div class="bk"
                                    style="margin-left: 30px; margin-top: 30px; display: flex; border: 1px solid black">
                                    <div style="border: 1px solid black; width:100%">
                                        <div class="col-md-4" style="height: 300px; width:400px;">
                                            <img src="{{ asset('storage/images') }}/{{ $product->image }}"
                                                class="img1">
                                        </div>
                                        <div class="col-md-8">
                                            <div>
                                                <p>{{ $product->nametour }}</p>
                                                <hr>
                                                <p><span class="span1">Mã tour:</span> {{ $product->id_tour }}</p>
                                                <p><span class="span1">Thời gian:</span> {{ $product->schedule }}</p>
                                                <p><span class="span1">Ngày khởi hành:</span> {{ $product->startdate }}
                                                </p>
                                                <p><span class="span1">Ngày kết thúc:</span> {{ $product->enddate }}
                                                </p>
                                                <p><span class="span1">Phương tiện:</span> {{ $product->vehicle }}</p>
                                                <p><span class="span1">Số chỗ còn lại: </span><span
                                                        class="sochoconlai"></span>
                                                    {{ $product->numberguests }}</p>
                                                <p><span class="span1">Giá:</span>
                                                    @if ($product->sale_price)
                                                        <span
                                                            style="color: #000; font-size: 16px">{{ number_format($product->sale_price, 0, '.', '.') }}đ</span>
                                                        <span
                                                            style="text-decoration: line-through; font-size: 12px">{{ number_format($product->price, 0, '.', '.') }}đ</span>
                                                    @else
                                                    {{ number_format($product->price, 0, '.', '.') }}đ
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-12">
                                    <p>Không tìm thấy sản phẩm</p>
                                </div>
                            @endif
                            <br>
                            {{-- <div style="border: 1px solid black">
                                <ul class="mda-list-design">
                                    <li>
                                        <span style="color:#FF0000">Các khoản phí phát sinh (nếu có) như: phụ thu dành
                                            cho khách nước ngoài, việt kiều; phụ thu phòng đơn; phụ thu chênh lệch giá
                                            tour… Nhân viên Du Lịch Việt sẽ gọi điện thoại tư vấn cho quý khách ngay sau
                                            khi có phiếu xác nhận booking. (Trong giờ hành chính)</span>
                                    </li>
                                    <li style="text-align:justify">
                                        <span style="color:#FF0000">Trường hợp quý khách không đồng ý các khoản phát
                                            sinh, phiếu xác nhận booking của quý khách sẽ không có hiệu lực.</span>
                                    </li>
                                </ul>
                            </div> --}}
                            <br>

                            <input type="hidden" name="trap" id="trap" value="9iquhab84jqdqtujla59gvdm56">
                            <input type="hidden" name="nametour" value="{{ $product->nametour }}">
                            <input type="hidden" name="id_tour" value="{{ $product->id_tour }}">
                            <input type="hidden" name="startdate" value="{{ $product->startdate }}">
                            <input type="hidden" name="enddate" value="{{ $product->enddate }}">
                            <input type="hidden" name="vehicle" value="{{ $product->vehicle }}">
                            <input type="hidden" name="id_tour" value="{{ $product->id_tour }}">
                            <input type="hidden" name="schedule" value="{{ $product->schedule }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <input type="hidden" name="sale_price" value="{{ $product->sale_price }}">
                        
                            <div class="mda-tilte-3" style="text-align: center; font-size: 30px">
                                <span class="mda-tilte-name"><i class="fa fa-info-circle" aria-hidden="true"></i> Thông
                                    Tin Liên Hệ</span>
                            </div>

                            <div id="mda-guest-b" class="">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>HỌ TÊN *:<span id="bookNameError" class="error"></span></label>
                                        <input data-error="#bookNameError" type="text" name="customer_name"
                                            id="lname" class="form-control input-tracking1" placeholder="Họ tên"
                                            required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Email *:<span id="bookEmailError" class="error"></span></label>
                                        <input data-error="#bookEmailError" type="text" name="email" id="email"
                                            class="user-email form-control input-tracking1" placeholder="Email"
                                            required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Số điện thoại *:<span id="bookPhoneError" class="error"></span></label>
                                        <input data-error="#bookPhoneError" type="text" name="phone"
                                            class="form-control numeric  input-tracking1" placeholder="Số điện thoại"
                                            required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Địa chỉ *:<span id="bookAddressError" class="error"></span></label>
                                        <textarea data-error="#bookAddressError" type="text" name="address" class="form-control input-tracking1"
                                            placeholder="Địa chỉ" required></textarea>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label>Ghi chú:</label>
                                        <textarea name="note" class="form-control" placeholder="Ghi chú"></textarea>
                                    </div>
                                    <hr>
                                    {{-- <div class="form-group col-md-3">
                                        <label>Số chỗ:</label>
                                        <input type="number" name="quantity"
                                            class="form-control mda-quantity tour-quantity1 q-adult1" value="1"
                                            min="1" max="{{ $product->numberguests }}" placeholder="Số chỗ">
                                    </div> --}}
                                </div>

                                    <div class="mda-tilte-3" style="text-align: center; font-size: 30px;">
                                        <span class="mda-tilte-name"><i class="fa fa-info-circle" aria-hidden="true"></i> Thông
                                            Tin Hành Khách</span>
                                    </div>
                                    <div slass="tthk"  style="border: 1px solid black;">
                                        <div class="guest-content">
                                            <table class="list-table" id="list-guests" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th style="min-width: 150px;">Họ tên</th>
                                                        <th style="min-width: 85px;">Giới tính</th>
                                                        <th style="min-width: 150px;">Loại khách</th>
                                                        <th style="min-width: 150px;">Ghi chú</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr price="1986000" type="1" class="row-guest type-1">
                                                        <td>
                                                            <div class="form-st" style="margin-top: 1px">
                                                                <div class="form-group has-success">
                                                                <input type="text" id="sttInput" name="ss" class="form-control" value="1" style="width: 40px; text-align: center; border: none;">
                                                    
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group has-success">
                                                                <input type="text" name="full_name[]" class="form-control" placeholder="Nhập họ tên..." data-bv-field="full_name[]" required>
                                                                <small class="help-block" data-bv-validator="notEmpty" data-bv-for="full_name[]" data-bv-result="VALID" style="display: none;">Họ tên là bắt buộc</small>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <select name="gender[]" class="form-control">
                                                                    <option value="1">Nam</option>
                                                                    <option value="0">Nữ</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <select name="type_guest_id[]" class="type-guest form-control">
                                                                    <option value="1">Người lớn (&gt;9 tuổi)</option>
                                                                    <option value="2">Trẻ em (5-9 tuổi)</option>
                                                                    <option value="3">Em bé (&lt;5 tuổi)</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="text" name="guest_note[]" class="form-control" placeholder="Ghi chú...">
                                                            </div>
                                                        </td>
                                                        <input type="hidden" name="total[]" class="total_guest" value="1986000">
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        <div style="margin: 10px 0; overflow: hidden;">
                                            <button class="btn btn-danger btn-remove-guest pull-right" type="button" onclick="removeGuest()">Xóa</button>
                                            <button class="btn button-green btn-add-guest pull-right" type="button" onclick="addGuest()">Thêm</button>
                                        </div>
                                      </div>
                                    {{-- <div class="form-group col-md-12">
                                        <div class="txtTotal">Tổng giá tiền: <span id="sumary"
                                                name="total"></span> <span>đ</span><br>
                                            <div id="discount-price"></div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            {{-- <div> 
                                <button class="them" type="button">tiếp theo</button>
                            </div> --}}
                            <input type="hidden" name="total" id="sumary" value="{{ $product->price * 1 }}">
                            {{-- <input type="hidden" name="codeDay" id="codeDay" value="05-04-2018">
                        <input type="hidden" name="customerlistjson" id="customerlist-json">
                        <input type="hidden" id="valid-customerjson">
                        <input type="hidden" name="type" value="3">
                        {{-- <input type="hidden" name="total" id="total" value="{{ $product->price }}* QAdult"> --}}
                            {{-- <input type="hidden" id="sumary-post" name="sumary" value="{{ property_exists($product, 'price') && $product->price !== null ? $product->price : 0 }}">
                        <input type="hidden" name="scheduleid" value="5484r2631424e4c4y2d4y2"> --}}

                            <div class="clear"></div>
                            <br>
                            <button type="submit" name="redirect" class="btn btn-outline-primary-2 btn-order btn-block" style="width: 200px; background-color: lawngreen; margin-left: auto; font-size: 17px">
                                Tiếp theo
                            </button>
                            <br>
                    </div>
                    </form>
                    {{-- <form action="{{ url('/vnpay_payment') }}" method="POST">
                        @csrf
                        <input type="hidden" name="order_id" value="123456">
                        <input type="hidden" name="order_desc" value="Product Description">
                        <input type="hidden" name="order_type" value="your_order_type">
                        <input type="hidden" name="amount" value="your_order_amount">
                        <input type="hidden" name="language" value="your_language">
                        <button type="submit" name="redirect" class="btn btn-outline-primary-2 btn-order btn-block">
                            Thanh toán VNPAY
                        </button>
                    </form> --}} 
                </div>
            </div>
        </div>
    </div>

    <script defer="" src="//dulichviet.com.vn/css_cu/jquery.validate.js"></script>
    <script defer="" src="//dulichviet.com.vn/css_cu/jquery.inputmask.js"></script>
    <script defer="" src="//dulichviet.com.vn/css_cu/jquery.inputmask.date.extensions.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




    <script>
         

    function addGuest() {
        var newRow = $("#list-guests tbody tr:first").clone(); // Clone dòng đầu tiên
            newRow.find('input[name^="full_name"]').val('');
            $("#list-guests tbody").append(newRow);

            // Tăng giá trị sau khi thêm dòng mới
            var inputElement = document.getElementById('sttInput');
            var currentSttValue = parseInt(inputElement.value);
            var newSttValue = currentSttValue + 1;
            inputElement.value = newSttValue; // Thêm dòng mới vào cuối
    }

    function removeGuest() {
        var rowCount = $("#list-guests tbody tr").length;
        if (rowCount > 1) {
            $("#list-guests tbody tr:last").remove(); // Xóa dòng cuối cùng
        } else {
            alert("Không thể xóa nữa.");
        }
    }


        $(document).ready(function() {
            var initialQuantity = parseInt($('.q-adult1').val());

            if (initialQuantity === 1) {
                var remainingSeats = parseInt($('.sochoconlai').text());
                var newRemainingSeats = remainingSeats - 1;
                $('.sochoconlai').text(newRemainingSeats);
                updateTotal(newRemainingSeats);
            }
        });

        $('.q-adult1').change(function() {
            var quantity = parseInt($(this).val());
            var remainingSeats = parseInt($('.sochoconlai').text());

            console.log("Số lượng:", quantity);
            console.log("Số chỗ còn lại:", remainingSeats);

            if (quantity > {{ $product->numberguests }}) {
                alert("Số chỗ đặt vượt quá số lượng còn lại!");
                $(this).val(remainingSeats); // Đặt lại giá trị về số chỗ còn lại
                return false;
            } else if (quantity < 1) {
                alert("Số chỗ đặt không hợp lệ!");
                return false;
            }

            var newRemainingSeats = {{ $product->numberguests }} - quantity;
            console.log("Số chỗ còn lại mới:", newRemainingSeats);
            $('.sochoconlai').text(newRemainingSeats);

            updateTotal(newRemainingSeats);
        });

        function updateTotal(remainingSeats) {

            @if (isset($product->sale_price))
                var price = parseFloat({{ $product->sale_price }});
            @else
                var price = parseFloat({{ $product->price }});
            @endif

            var quantity = parseInt($('.q-adult1').val());
            var total = quantity * price;
            console.log("Tổng giá:", total);
            $('#sumary').text(total);
        }



        mePuzz('track', 'billing_info');
    </script>
    @if (session('alert'))
        @if (session('alert')['type'] === 'error')
            <script>
                alert("{{ session('alert')['message'] }}");
            </script>
        @endif
    @endif
    @include('homepage.footer')

</body>

</html>
