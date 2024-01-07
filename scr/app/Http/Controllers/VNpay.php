<?php

namespace App\Http\Controllers;

use App\Models\Categorybooktour;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Category;
use App\Models\contact;
use Illuminate\Support\Facades\Session;
use App\Models\passen;

class VNpay extends Controller
{
    public function VNP(Request $request)
    {
        $vnp_TxnRef = time() . '_' . rand(1000, 9999);
        
        // Thông tin đơn hàng
        $vnp_OrderInfo = 'Thanh toán đơn hàng';
        $vnp_OrderType = 'billpayment';
    
        // Lấy tổng tiền từ giỏ hàng
        $totalAmount = isset($_POST['totalPrice']) ? $_POST['totalPrice'] : 0;
        $vnp_Amount = $totalAmount * 100;
    
        // Thông tin thanh toán
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            
        // TODO: Định nghĩa $vnp_TmnCode và $vnp_HashSecret
       
    
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html"; // TODO: Đặt giá trị chính xác từ VNPAY
        $vnp_Returnurl = "http://127.0.0.1:8000/homepage";// TODO: Đặt giá trị chính xác từ VNPAY
        $vnp_TmnCode = "YRAU9NHJ";
        $vnp_HashSecret = "FBXYQTLOAUKPJJMYVOQFXIMEETZFNIMC"; 
    
        // Các tham số thanh toán
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay", 
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );
    
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
    
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
    
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        
    //Lưu thông itn liên hệ
        $name = $request->input('customername');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $address = $request->input('address');
        $note = $request->input('note');

        // Tạo mới đối tượng Contact và lưu vào cơ sở dữ liệu
        $contact = new contact();
        $contact->name = $name;
        $contact->phone = $phone;
        $contact->email = $email;
        $contact->adress = $address;
        $contact->save();

        $id_contact = $contact->id_contact;

    //Lưu thôn gtin hành khách
    $thongTinLienHe = Session::get('thongtinlienhe', []);
    if ($thongTinLienHe && isset($thongTinLienHe['hanh_khach']) && !empty($thongTinLienHe['hanh_khach'])) {
        foreach ($thongTinLienHe['hanh_khach'] as $hanhKhach) {
            // Tạo đối tượng Passenger và lưu thông tin hành khách
            passen::create([
                'id_contact' => $contact->id_contact,
                'name'=> $hanhKhach['full_name'],
                'gender' => $hanhKhach['gender'],
                'Type_guest' => $hanhKhach['age'],
                'note' => $hanhKhach['guest_note'],
            ]);
        }
    }   
    //lưu payment
    $order = new payment();
    $order->vnp_TxnRef = $vnp_TxnRef;
    $order->vnp_amount = $totalAmount;
    $order->save();

    $id_vnpay = $order->id_vnpay;
    //Lưu đặt tour
    
    $booking = new Categorybooktour([
        'id_tour' => $request->input('idtour'), 
        'id_contact' => $contact->id_contact,
        'id_vnpay'=>$order->id_vnpay, 
        'quantityAdult' => $request->input('QuantityAdult'), 
        'quantityChild' => $request->input('QuantityChild'), 
        'quantityBaby' => $request->input('QuantityBaby'), 
        'total' => $request->input('totalPrice'), 
        'status' => '1', 
    ]);
    $booking->save();

   // Cập nhật thông tin số lượng chỗ của tour trong cơ sở dữ liệu
    $tour = Category::find($request->input('idtour'));
    $tour->numberguests -= $request->input('QuantityAdult');
    $tour->numberguests -= $request->input('QuantityChild');
    $tour->numberguests -= $request->input('QuantityBaby');
    $tour->save();

    
    
    
    
    
    
    
    
    
    
    $returnData = array(
            'code' => '00',
            'message' => 'success',
            'data' => $vnp_Url
        );
        
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }
}