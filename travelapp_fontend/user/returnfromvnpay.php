<?php
if(isset($_GET['vnp_ResponseCode'])){
    $baseurl='http://localhost:8080/';
    include '../admin/api/api.php';
    $id=$_GET['vnp_TxnRef'];
    $invoice=get($baseurl.'invoice/'.$id);
    if($_GET['vnp_ResponseCode']=="00")
    {
    
    
    
    $bankTranNo=$_GET['vnp_BankTranNo'];
    //echo "Tổng tiền thanh toán:".$_GET['vnp_Amount'];
    $payDay=$_GET['vnp_PayDate'];
    $bank=$_GET['vnp_BankCode'];
    $data=array("id"=>$id,"bankTranNo"=>$bankTranNo,"payDay"=>$payDay,"bank"=>$bank,"payments"=>"Thanh toán trực tuyến");
    $result=put($baseurl.'invoice/paymentvnpay',$data);
    include_once '../sentemail.php';
    $content="<html>
    <head>
    <title>Thông báo thanh toán thành công</title>
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
    <td>TTB".$id."</td>
    <td>".$invoice['tour']['title']."</td>
    <td>".$invoice['people']."</td>
    <td>".$invoice['amount']."</td>
    <td>Thanh toán trực tuyến</td>
    <td>Đã thanh toán</td>
    </tr>
    </table>
    <p>Cảm ơn bạn đã tin tưởng Travel-app</p>
    <h3>Chúc quý khách có một chuyến đi vui vẻ!!</h3>
    </body>
    </html>";
    sentmail($invoice['email'],'Thong bao thanh toan thanh cong',$content);        
    echo "<script> window.location.href='chitiethoadon.php?id=".$id."'; </script>";
    }
    else{
        include_once '../sentemail.php';
        $content="<html>
        <head>
        <title>Thông báo thanh toán thất bại</title>
        </head>
        <body>
        <p> Thanh toán thất bại, Vui lòng thử lại</p>
        <p>Cảm ơn bạn đã tin tưởng Travel-app</p>
        </body>
        </html>";
        sentmail($invoice['email'],'Thong bao thanh toan that bai',$content);      
        echo "<script> window.location.href='chitiethoadon.php?id=".$id."'; </script>";  
    }
}
?>