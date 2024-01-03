@include('homepage.userheader')
<div >
    <div style="width: 100%;  height: 700px; ">
    <div >
    <div >
        <h2>Tra cứu tour</h2>
        <form method="post" action="{{route('seach')}}">
            @csrf
            <label for="phone">Số điện thoại:</label>
            <input type="text" name="phone" id="phone" required>
            <button type="submit">Search</button>
        </form>

        @if(isset($booktour) && count($booktour) > 0)
       <br> {{-- <h2></h2> --}}
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tbody>
                <tr>
                    <th>Mã tour</th>
                    <th>Tên tour</th>
                    <th>Số vé</th>
                    <th>Tổng tiền</th>
                    <th>Thời gian</th>
                    <th>Trạng thái</th>
                   
                    <th></th>
              </tr>
              @foreach($booktour as $booktours)
              <tr>
                <td>Book Tour ID: {{ $booktours->id_tour }}</td>
                <td>{{ $booktours->id_tour }}</td>
                <td>{{ $booktours->quantity }}</td>
                <td>{{ $booktours->total }}</td>
                <td>Từ {{ $booktours->startdate }} đến {{ $booktours->enddate }}</td>
                <td>
                    @if ($booktours->status == 0)
                        <span class="text-info">chưa xác nhận</span>
                    @elseif($booktours->status== 4)
                        <span class="text-info">đặt tour thành công</span>
                    @elseif ($booktours->status == 1)
                        <span class="text-danger">Đã hủy</span>
                    @endif
                </td>
                <td>
                    @if ($booktours->status == 0 || $booktours->status==4)
                        <a href="{{ route('cancelBooking', ['id_booktour' => $booktours->id_booktour]) }}" class="btn btn-sm btn-danger cancel-booking-btn" data-booking-id="{{ $booktours->id_booktour }}">
                            <i class="fas fa-trash"></i> Hủy tour
                        </a>
                    @endif
                </td>
            </tr>
          @endforeach
        </tbody></table>
    </div>
        @else
        {{-- <p>No booking found for the provided phone number.</p> --}}
    @endif
    </div>
   
    </div>
    </div>
</div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var cancelButtons = document.querySelectorAll('.cancel-booking-btn');
    
            cancelButtons.forEach(function(cancelButton) {
                cancelButton.addEventListener('click', function(event) {
                    event.preventDefault();
    
                    var confirmation = confirm('Bạn có chắc chắn muốn hủy tour?');
    
                    if (confirmation) {
                        var cancelUrl = this.getAttribute('href');
                        fetch(cancelUrl, {
                            method: 'GET'
                        }).then(function(response) {
                            if (response.ok) {
                                location.reload();
                            } else {
                                console.error('Yêu cầu hủy tour không thành công');
                            }
                        }).catch(function(error) {
                            console.error('Lỗi kết nối: ', error);
                        });
                    } else {
                    }
                });
            });
        });
    </script>
</body>
@include('homepage.footer')