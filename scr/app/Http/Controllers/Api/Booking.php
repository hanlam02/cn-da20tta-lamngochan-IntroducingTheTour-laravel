<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Booking extends Controller
{
    public function index()
    {
        return view('booking.index');
    }

    public function luuThongTin(Request $request)
    {
        // Lấy thông tin liên hệ từ form
        $customerName = $request->input('customer_name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $note = $request->input('note');

        // Lấy thông tin hành khách từ form
        $fullNames = $request->input('full_name');
        $genders = $request->input('gender');
        $ages = $request->input('type_guest_id');
        $guestNotes = $request->input('guest_note');

        // Gộp thông tin liên hệ và thông tin hành khách vào session
        $thongTinLienHe = [
            'customer_name' => $customerName,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'note' => $note,
            'hanh_khach' => [],
        ];

        foreach ($fullNames as $index => $fullName) {
            $thongTinLienHe['hanh_khach'][] = [
                'full_name' => $fullName,
                'gender' => $genders[$index],
                'age' => $ages[$index],
                'guest_note' => $guestNotes[$index],
            ];
        }

        // Lưu thông tin vào session
        $request->session()->put('thong_tin_lien_he', $thongTinLienHe);

        // Kiểm tra dữ liệu đã lưu vào session
        dd(session('thong_tin_lien_he'));

        // Redirect hoặc thực hiện bước tiếp theo
        return redirect()->route('buoc_tiep_theo');
    }
}
