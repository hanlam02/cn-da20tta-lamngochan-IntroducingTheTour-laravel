<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorybooktour;

class BookingController extends Controller
{
    public function confirmBooking($confirmation_code)
    {
        $booking = Categorybooktour::where('confirmation_code', $confirmation_code)->first();

        if (!$booking) {
            // Xử lý trường hợp không tìm thấy đặt tour
            return view('errors.booking-not-found');
        }

        // Cập nhật trạng thái khi xác nhận thành công
        $booking->status = 4; // Giả sử 4 là trạng thái xác nhận thành công
        $booking->save();

        // Chuyển hướng hoặc hiển thị thông báo xác nhận thành công
        return redirect()->route('interfacetour')->with('success', 'Xác nhận đặt tour thành công! Bạn có thể kiểm tra lại tour của mình đã bằng trong tra cứu');
    }
}
