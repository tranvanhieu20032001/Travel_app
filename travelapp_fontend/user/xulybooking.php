<?php
    if(!isset($_SESSION)) 
    { 
    session_start();
    }
    require_once('./config_vnpay.php');
    if(isset($_SESSION['idAccount'])){
        if(isset($_POST['idtour']))
        {
            $baseurl='http://localhost:8080/';
            include '../admin/api/api.php';
            echo "Thanh toan tai cua hang";
            $idAccount=$_SESSION['idAccount']; 
            $idTour=$_POST['idtour'];               
            $format = "Y-m-d\TH:i:s";
            $dateinvoice = date($format, time());
            $fullName=$_POST['fullname'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $address=$_POST['address'];
            $note=$_POST['note'];            
            $people=$_POST['people'];
            $amount=$_POST['amount'];
            $account=array("id"=>$idAccount);
            $tour=array("id"=>$idTour);
            $pttt=$_POST['btn_pttt'];
            if($pttt=="1")
                $payments="Thanh toán tại cửa hàng";
            else $payments="Thanh toán trực tuyến";
            $data=array("dateInvoice"=>$dateinvoice,"status"=>0,"fullName"=>$fullName,"email"=>$email,"phone"=>$phone,"address"=>$address,"note"=>$note,"payments"=>$payments,"people"=>$people,"amount"=>$amount,"account"=>$account,"tour"=>$tour);
            if($pttt=="1")
            {               
                $slot=put($baseurl.'invoice/updateslot/'.$idTour,array("slot"=>$people));
                $result=post($baseurl.'invoice/create',$data);
                include_once '../sentemail.php';
                $content="<html>
                <head>
                <title>Thông báo booking thành công</title>
                </head>
                <body>
                <p>Hóa đơn booking</p>
                <table  border='1' cellspacing='0'>
                <tr>
                <th>Mã hóa đơn</th>
                <th>Tour bạn đã book</th>
                <th>Số lượng người</th>
                <th>Tổng tiền thanh toán</th>
                <th>Hình thức thanh toán</th>
                <th>Trạng thái</th>
                </tr>
                <tr>
                <td>TTB".$result['id']."</td>
                <td>".$idTour."</td>
                <td>".$people."</td>
                <td>".$amount."</td>
                <td>".$payments."</td>
                <td>Đang đợi xác nhận</td>
                </tr>
                </table>
                <p>Cảm ơn bạn đã tin tưởng Travel-app</p>
                </body>
                </html>";
                sentmail($email,'Thong bao booking thanh cong',$content);               
                echo "<script> window.location.href='chitiethoadon.php?id=".$result['invoice']['id']."'; </script>";

            }
            else {

    $result=post($baseurl.'invoice/create',$data);
    $slot=put($baseurl.'invoice/updateslot/'.$idTour,array("slot"=>$people));        
    $vnp_TxnRef = $result['invoice']['id']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    $vnp_OrderInfo = 'thanh toan';
    $vnp_OrderType = 'Thanh toán hóa đơn';
    $vnp_Amount = $amount * 100;
    $vnp_Locale = 'VN';
    $vnp_BankCode = 'NCB';
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    //Add Params of 2.0.1 Version
    $vnp_ExpireDate = $expire;
    //Billing
    // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
    // $vnp_Bill_Email = $_POST['txt_billing_email'];
    // $fullName = trim($_POST['txt_billing_fullname']);
    // if (isset($fullName) && trim($fullName) != '') {
    //     $name = explode(' ', $fullName);
    //     $vnp_Bill_FirstName = array_shift($name);
    //     $vnp_Bill_LastName = array_pop($name);
    // }
    // $vnp_Bill_Address=$_POST['txt_inv_addr1'];
    // $vnp_Bill_City=$_POST['txt_bill_city'];
    // $vnp_Bill_Country=$_POST['txt_bill_country'];
    // $vnp_Bill_State=$_POST['txt_bill_state'];
    // Invoice
    // $vnp_Inv_Phone=$_POST['txt_inv_mobile'];
    // $vnp_Inv_Email=$_POST['txt_inv_email'];
    // $vnp_Inv_Customer=$_POST['txt_inv_customer'];
    // $vnp_Inv_Address=$_POST['txt_inv_addr1'];
    // $vnp_Inv_Company=$_POST['txt_inv_company'];
    // $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
    // $vnp_Inv_Type=$_POST['cbo_inv_type'];
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
        "vnp_ExpireDate"=>$vnp_ExpireDate
        // "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
        // "vnp_Bill_Email"=>$vnp_Bill_Email,
        // "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
        // "vnp_Bill_LastName"=>$vnp_Bill_LastName,
        // "vnp_Bill_Address"=>$vnp_Bill_Address,
        // "vnp_Bill_City"=>$vnp_Bill_City,
        // "vnp_Bill_Country"=>$vnp_Bill_Country,
        // "vnp_Inv_Phone"=>$vnp_Inv_Phone,
        // "vnp_Inv_Email"=>$vnp_Inv_Email,
        // "vnp_Inv_Customer"=>$vnp_Inv_Customer,
        // "vnp_Inv_Address"=>$vnp_Inv_Address,
        // "vnp_Inv_Company"=>$vnp_Inv_Company,
        // "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
        // "vnp_Inv_Type"=>$vnp_Inv_Type
    );
    
    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
    //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    // }
    
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
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        // vui lòng tham khảo thêm tại code demo
            }
        }
        else{
            echo "<script> window.location.href='notfound.php'; </script>";
        }


    }
    else echo "<script> window.location.href='notfound.php'; </script>";
?>