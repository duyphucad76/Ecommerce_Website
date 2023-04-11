<?php
$act = "create_order";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
$vnp_TmnCode = "QQHXBSIZ"; //Website ID in VNPAY System
$vnp_HashSecret = "DSOCYZGBEUEZBLNFHSVJBINSEFNNSJXX"; //Secret key
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://localhost/PHP/PHP2/EcommerceWebsite/index.php?action=payment&act=response";
// $vnp_Returnurl = "https://caraonlineshop.000webhostapp.com/View/pages/vnpay_php/vnpay_return.php";
$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
//Config input format
//Expire
$startTime = date("YmdHis");
$expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));
switch ($act) {
    case 'create_order':
        if (!isset($_SESSION['user'])) {
            echo "<script>alert('Please log in to continue')
            location.href='index.php?action=user&act=login'
            </script>";
        } else {
            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            echo "";
            /**
             * Description of vnpay_ajax
             *
             * @author xonv
             */
            $vnp_TxnRef = $_POST['order_id']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = $_POST['order_desc'];
            $vnp_OrderType = $_POST['order_type'];
            $vnp_Amount = $_POST['amount'] * 100;
            $vnp_Locale = $_POST['language'];
            $vnp_BankCode = $_POST['bank_code'];
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            //Add Params of 2.0.1 Version
            $vnp_ExpireDate = $_POST['txtexpire'];
            //Billing
            $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
            $vnp_Bill_Email = $_POST['txt_billing_email'];
            $fullName = trim($_POST['txt_billing_fullname']);
            if (isset($fullName) && trim($fullName) != '') {
                $name = explode(' ', $fullName);
                $vnp_Bill_FirstName = array_shift($name);
                $vnp_Bill_LastName = array_pop($name);
            }
            $vnp_Bill_Address = $_POST['txt_inv_addr1'];
            $vnp_Bill_City = $_POST['txt_bill_city'];
            $vnp_Bill_Country = $_POST['txt_bill_country'];
            $vnp_Bill_State = $_POST['txt_bill_state'];
            // Invoice
            $vnp_Inv_Phone = $_POST['txt_inv_mobile'];
            $vnp_Inv_Email = $_POST['txt_inv_email'];
            $vnp_Inv_Customer = $_POST['txt_inv_customer'];
            $vnp_Inv_Address = $_POST['txt_inv_addr1'];
            $vnp_Inv_Company = $_POST['txt_inv_company'];
            $vnp_Inv_Taxcode = $_POST['txt_inv_taxcode'];
            $vnp_Inv_Type = $_POST['cbo_inv_type'];
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Command" => "pay",
                "vnp_Amount" => $vnp_Amount,
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

            //var_dump($inputData);
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
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array(
                'code' => '00', 'message' => 'success', 'data' => $vnp_Url
            );
            echo "3";
            if (isset($_POST['redirect'])) {
                // header("Refresh:0, url=$vnp_Url");
                header('Location: ' . $vnp_Url);
                echo "4";
                die();
            } else {
                echo json_encode($returnData);
            }
        }
        break;
    case 'response':
        include 'View/pages/vnpay_php/vnpay_return.php';
        break;
    // case 'order_details':
    //     include "View/pages/order_details.php";
    //     break;
}
