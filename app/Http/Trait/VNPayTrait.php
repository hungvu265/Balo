<?php

namespace App\Http\Trait;

trait VNPayTrait
{
    public function createPayment() {
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('dathangpaythanhcong');
        $vnp_TmnCode = "";
        $vnp_HashSecret = "";

        $vnp_TxnRef = time().'';
        $vnp_OrderInfo = 'Noi dung thanh toan';
        $vnp_OrderType = 'topup';
        $vnp_Amount = 1000000;
        $vnp_Locale = 'vn';
        $vnp_BankCode = null;
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $vnp_ExpireDate = date('YmdHis',strtotime('+15 minutes',strtotime(date("YmdHis"))));

        //Billing
        $vnp_Bill_Mobile = '0934998386';
        $vnp_Bill_Email = 'NVA@vnpay.vn';
        $fullName = trim('NGUYEN VAN A');
        if (isset($fullName) && trim($fullName) != '') {
            $name = explode(' ', $fullName);
            $vnp_Bill_FirstName = array_shift($name);
            $vnp_Bill_LastName = array_pop($name);
        }
        $vnp_Bill_Address = 'Ha Noi 1111111';
        $vnp_Bill_City = 'Ha Noi';
        $vnp_Bill_Country = 'VN';
        $vnp_Bill_State = null;

        // Invoice
        $vnp_Inv_Phone = '02437764668';
        $vnp_Inv_Email = 'pholv@vnpay.vn';
        $vnp_Inv_Customer = 'Tran Van B';
        $vnp_Inv_Address = 'Dia chi 1';
        $vnp_Inv_Company = 'Cong ty co phan ..';
        $vnp_Inv_Taxcode = '0102182292';
        $vnp_Inv_Type = 'I';
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
            "vnp_ExpireDate" => $vnp_ExpireDate,
            "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
            "vnp_Bill_Email" => $vnp_Bill_Email,
            "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
            "vnp_Bill_LastName" => $vnp_Bill_LastName,
            "vnp_Bill_Address" => $vnp_Bill_Address,
            "vnp_Bill_City" => $vnp_Bill_City,
            "vnp_Bill_Country" => $vnp_Bill_Country,
            "vnp_Inv_Phone" => $vnp_Inv_Phone,
            "vnp_Inv_Email" => $vnp_Inv_Email,
            "vnp_Inv_Customer" => $vnp_Inv_Customer,
            "vnp_Inv_Address" => $vnp_Inv_Address,
            "vnp_Inv_Company" => $vnp_Inv_Company,
            "vnp_Inv_Taxcode" => $vnp_Inv_Taxcode,
            "vnp_Inv_Type" => $vnp_Inv_Type
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

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
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);

        return $returnData['data'];
    }
}
