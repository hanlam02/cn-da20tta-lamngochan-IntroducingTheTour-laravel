<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VNpay extends Controller
{
    public function VNP(Request $request)
    {
        $vnp_TxnRef = time() . '_' . rand(1000, 9999);
        
        // Thông tin đơn hàng
        $vnp_OrderInfo = 'Thanh toán đơn hàng';
        $vnp_OrderType = 'billpayment';
    
        // Lấy tổng tiền từ giỏ hàng
        $totalAmount = 100000;
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
            "vnp_ReturnUrl" => Route('booktour.store'),
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