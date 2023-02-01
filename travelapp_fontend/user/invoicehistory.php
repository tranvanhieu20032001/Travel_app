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
        $idAccount=$_SESSION['idAccount'];
        $url=$baseurl.'invoice/myinvoice/'.$idAccount;
        $myListInvoice=get($url);
        

        
        
?>
<?php include './inc/header.php';?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="..seller/assets/css/style.css">

    <main style="margin-top:200px;margin-buttom:200px;min-height:690px">
        <h1></h1>
        <table class="table table-striped custab">
    <thead>
    <a href="invoicehistory.php?&type=3" class="btn btn-primary btn-xs pull-right" style="margin-left:30px"><b>+</b>Đã hủy</a>
    <a href="invoicehistory.php?&type=2" class="btn btn-primary btn-xs pull-right" style="margin-left:30px"><b>+</b>Đã thanh toán</a>
    <a href="invoicehistory.php?type=1" class="btn btn-danger btn-xs pull-right" style="margin-left:30px"><b>+</b>Chưa thanh toán</a>
    <a href="invoicehistory.php?type=0" class="btn btn-success btn-xs pull-right"><b>+</b>Hóa đơn mới</a>
    
    
    
    <h2><?php if($_GET['type']==0) echo "Hóa đơn chờ xác nhận";else if($_GET['type']==1) echo "Hóa đơn chưa thanh toán"; else if($_GET['type']==2) echo "Hóa đơn đã thanh toán"; else echo "Hóa đơn đã hủy";?></h2>
        <tr>
            <th>STT</th>
            <th>Số Hóa Đơn</th>
            <th>Họ Tên</th>
            <th>Số điện thoại</th>
            <th>Tour booking</th>
            <th>Tổng tiền</th>
            <th>Phương thức TT</th>
            <th>Trạng Thái</th>           
            <th>Action</th>
        </tr>
    </thead>
    <?php  $i=1; foreach($myListInvoice as $value){ if($value['status']==$_GET['type']){?>
            <tr>
                <td><?php echo $i++;?></td>
                <td>TTB<?php echo $value['id'];?></td>
                <td><?php echo $value['fullName'];?></td>
                <td><?php echo $value['phone'];?></td>
                <td><?php echo $value['tour']['title'];?></td>
                <td><?php echo $value['amount'];?></td>
                <td><?php echo $value['payments'];?></td>
                <td><?php if($value['status']==0) echo "Chờ xác nhận"; else if($value['status']==1) echo "Chưa thanh toán";else echo "Đã thanh toán"?></td>
                
                <td class="text-center">
                    <?php if($value['status']==0){?>
                    <a class='btn btn-danger btn-xs' href="userhuyhd.php?id=<?php echo $value['id'];?>" onclick="return confirm('Hủy hóa đơn <?php echo $value['id'];?> ?')"><span class="glyphicon glyphicon-remove"></span>Hủy</a>
                    <a class='btn btn-info btn-xs' href="./chitiethoadon.php?id=<?php echo $value['id'];?>"><span class="glyphicon glyphicon-edit"></span>C.Tiết</a>
                    <?php } else if($value['status']==1){?>
                        <a class='btn btn-danger btn-xs' href="userhuyhd.php?id=<?php echo $value['id'];?>" onclick="return confirm('Hủy hóa đơn <?php echo $value['id'];?> ?')"><span class="glyphicon glyphicon-remove"></span>Hủy</a>
                        <a class='btn btn-info btn-xs' href="./chitiethoadon.php?id=<?php echo $value['id'];?>"><span class="glyphicon glyphicon-edit"></span>C.Tiết</a>
                        <a class='btn btn-success btn-xs' href="thanhtoanvnpay.php?id=<?php echo $value['id'];?>" onclick="return confirm('Thanh toán hóa đơn <?php echo $value['id'];?> ?')" ><span class="glyphicon glyphicon-edit"></span>TT VNPAY</a>
                         
                    <?php } else{?>
                    <a class='btn btn-info btn-xs' href="./chitiethoadon.php?id=<?php echo $value['id'];?>"><span class="glyphicon glyphicon-edit"></span>C.Tiết</a>               
                    <?php }?>
                </td>
            </tr>
           <?php }}?>
</table>
                    </main>

<?php include './inc/footer.php';?>