<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

        // Lấy thông tin tour từ form
        $tenTour = $request->input('nametour');
        $idTour = $request->input('id_tour');
        $schedule = $request->input('schedule');
        $startDate = $request->input('startdate');
        $endDate = $request->input('enddate');
        $vehicle = $request->input('vehicle');
        $numberGuests = $request->input('numberguests');
        $price = $request->input('price');
        $salePrice = $request->input('sale_price');

        $priceForAdult = $salePrice ? $salePrice : $price;
        $priceForChild = $salePrice ? intval($salePrice * 0.7) : intval($price * 0.7);
        $priceForBaby = 0;
         // Lấy tên tour từ form

        // Gộp thông tin liên hệ và thông tin hành khách vào session
        $thongTinLienHe = [
            'customer_name' => $customerName,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'note' => $note,
            'hanh_khach' => [],
        ];
        $soLuongTheoDoTuoi = [
            '1' => 0, // Người lớn (>9 tuổi)
            '2' => 0, // Trẻ em (5-9 tuổi)
            '3' => 0, // Em bé (<5 tuổi)
        ];

        foreach ($fullNames as $index => $fullName) {
            $thongTinLienHe['hanh_khach'][] = [
                'full_name' => $fullName,
                'gender' => $genders[$index],
                'age' => $ages[$index],  // Giá trị 1, 2, 3 tương ứng với >9, 5-9, <5 tuổi
                'guest_note' => $guestNotes[$index],
            ];
        
            $soLuongTheoDoTuoi[$ages[$index]]++;
            
        }
        
        $thongTinTour = [
            'id_tour' => $idTour,
            'ten_tour' => $tenTour, // Thêm tên tour vào session
            'schedule' => $schedule,
            'startdate' => $startDate,
            'enddate' => $endDate,
            'vehicle' => $vehicle,
            'numberguests' => $numberGuests,
             'price'=> $price,
            // 'price' => [
            // '1' => $priceForAdult,
            // '2' => $priceForChild,
            // '3' => $priceForBaby,
        // ],
            'sale_price' => $salePrice,
            'price_ForAdult'=> $priceForAdult,
            'price_ForChild'=> $priceForChild,
            'price_ForBaby'=> $priceForBaby,
        ];
    //    dd($thongTinTour);
       // Chuyển đổi các giá trị trong mảng price thành số nguyên
    //   s $thongTinTour['price'] = array_map('intval', $thongTinTour['price']);
    //    $thongTinTour['price'] = $salePrice ? $salePrice : $thongTinTour['price'];
        
        $request->session()->put('thongtinlienhe', $thongTinLienHe);
        $request->session()->put('soLuongTheoDoTuoi', $soLuongTheoDoTuoi);
        $request->session()->put('thongTinTour', $thongTinTour);

        return redirect()->route('informationbooktour');
    }
}
