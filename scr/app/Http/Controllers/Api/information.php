<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use Illuminate\Http\Request;

class information extends Controller
{
    public function index(){
        // $product = Category::where('id_tour', $id_tour)->firstOrFail(); 
        $thongTinLienHe = Session::get('thongtinlienhe', []);
      //  $thongTinLienHe = Session::get('thongtinlienhe', []);
      $soLuongNguoiLon = Session::get('soLuongTheoDoTuoi.1', 0);
        $soLuongTreEm = Session::get('soLuongTheoDoTuoi.2', 0);
        $soLuongEmBe = Session::get('soLuongTheoDoTuoi.3', 0);
        $thongTinTour = Session::get('thongTinTour', []);
        
        // Chuyển đến trang xem thông tin với thông tin liên hệ và hành khách
        return view('homepage.infobooktour', [
            'thongTinLienHe' => $thongTinLienHe,
            'soLuongNguoiLon' => $soLuongNguoiLon,
            'soLuongTreEm' => $soLuongTreEm,
            'soLuongEmBe' => $soLuongEmBe,
            'thongTinTour'=> $thongTinTour,
            
        ]);
    }    
}
