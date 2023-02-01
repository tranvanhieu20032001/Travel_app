<?php
if(!isset($_SESSION)) 
{ 
session_start();
}
if(isset($_SESSION['idAccount'])){
    
}
?>

<?php  
        include '../admin/api/api.php';
        $baseurl='http://localhost:8080/';
        $id=1;
        if(isset($_GET['id']))
            $id=$_GET['id'];        
        $invoice =get($baseurl.'invoice/'.$id);
            if($invoice==null) echo "<script> window.location.href='notfound.php'; </script>";
        else{
        
            $tour=$invoice['tour'];
        }
        
?>
<?php include './inc/header.php';?>
<link rel="stylesheet" href="./assets/css/styleqltk.css">
<link rel="stylesheet" href="./assets/css/xacnhantour.css">
<div class="wrapper" style="margin-top:200px;margin-buttom:200px">
        <div class="thanhk-text">
            Cảm ơn quý khách đã sử dụng dịch vụ của chúng tôi
        </div>
        <div class="title-tour">
            <?php echo $tour['title']?>: <?php echo $tour['subTitle']?>
        </div>
        <div class="title-chitiet">
            <i class="fas fa-clipboard-check"></i><span>Xác nhận đặt tour</span>
        </div>
        <table class="table-fill">
            <thead>
            </thead>
            <tbody class="table-hover">
                <tr>
                    <td class="text-left">Mã tour</td>
                    <td class="text-left code-tour">TOUR<?php echo $tour['id']?></td>
                </tr>
                <tr>
                    <td class="text-left">Tên tour</td>
                    <td class="text-left desc"> <?php echo $tour['title']?>: <?php echo $tour['subTitle']?></td>
                </tr>
                <tr>
                    <td class="text-left">Ngày đi</td>
                    <td class="text-left time"><?php if($tour['dayStart']==null) echo ""; else{ 
                            $date=date_create($tour['dayStart']);
                            echo date_format($date,"d-m-Y");}?></td>
                </tr>
                <tr>
                    <td class="text-left">Thời gian</td>
                    <td class="text-left schedule"><?php echo $tour['inteval']?></td>
                </tr>
                <tr>
                    <td class="text-left">Điểm khởi hành</td>
                    <td class="text-left location"><?php echo $tour['address']?></td>
                </tr>
            </tbody>
        </table>

        <div class="title-chitiet">
            <i class="fas fa-suitcase"></i><span>Chi tiết đặt tour</span>
        </div>
        <table class="table-fill">
            <thead>
            </thead>
            <tbody class="table-hover">
                <tr>
                    <td class="text-left">Số booking</td>
                    <td class="text-left code-bk">TTB<?php echo $invoice['id']?></td>
                </tr>
                <tr>
                    <td class="text-left">Trị giá booking</td>
                    <td class="text-left price"> <?php echo $english_format_number = number_format($invoice["amount"]);?> VNĐ</td>
                </tr>
                <tr>
                    <td class="text-left">Ngày đăng kí</td>
                    <td class="text-left time-bk"><?php  $format = "Y-m-d\TH:i:s";
            echo $invoice['dateInvoice']; ?> (theo giờ việt nam)</td>
                </tr>
                <tr>
                    <td class="text-left">Hình thức thanh toán</td>
                    <td class="text-left hinhthuc-pk"><?php echo $invoice['payments']?></td>
                </tr>
                <tr>
                    <td class="text-left">Tình trạng</td>
                    <td class="text-left status"><?php if($invoice['status']==0)  echo "Đang chờ xác nhận";
                        else if($invoice['status']==1) echo "Chưa thanh toán"; else echo "Đã thanh toán";
                        ?></td>
                </tr>
            </tbody>
        </table>

        <div class="title-chitiet">
            <i class="fas fa-info-circle"></i><span>Thông tin liên lạc</span>
        </div>
        <table class="table-fill">
            <thead>
            </thead>
            <tbody class="table-hover">
                <tr>
                    <td class="text-left">Họ tên</td>
                    <td class="text-left custumer"><?php echo $invoice['fullName']?></td>
                </tr>
                <tr>
                    <td class="text-left">Địa chỉ</td>
                    <td class="text-left city"> <?php echo $invoice['address']?></td>
                </tr>
                <tr>
                    <td class="text-left">Email</td>
                    <td class="text-left email-custumer"><?php echo $invoice['email']?></td>
                </tr>
                <tr>
                    <td class="text-left">Điện thoại</td>
                    <td class="text-left sdt"><?php echo $invoice['phone']?></td>
                </tr>
                <tr>
                    <td class="text-left">Ghi chú</td>
                    <td class="text-left note"><?php echo $invoice['note']?></td>
                </tr>
                <tr>
                    <td class="text-left">Tổng số khách</td>
                    <td class="text-left quatity"><?php echo $invoice['people']?></td>
                </tr>
            </tbody>
        </table>
        <div class="corporation">ThanhTinh-Travel</div>
        <span>Kính chú quý khách có một chuyến du lịch thú vị và hấp dẫn</span>    
    </div>

<?php include './inc/footer.php';?>