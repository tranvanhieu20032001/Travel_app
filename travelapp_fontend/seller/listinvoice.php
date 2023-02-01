<?php
 if(!isset($_SESSION)) 
 { 
    session_start(); 
     
 } 
?>
<?php   
        if (isset($_SESSION['idAccount']))
            {$id=$_SESSION['idAccount'];
                if($_SESSION['typeAccount']==1)
                echo "<script> window.location.href='../user/index.php'; </script>";
            }
        else echo "<script> window.location.href='../login/signin.php'; </script>";;
        
        include './inc/header.php';
        include '../admin/api/api.php';
        $baseurl='http://localhost:8080/';
        $url=$baseurl.'invoice/myinvoiceseller/'.$id;
        $myListInvoice=get($url);
        
?>


<main>
<table class="table table-striped custab">
    <thead>
    <a href="listinvoice.php?menu=3&type=0" class="btn btn-success btn-xs pull-right"><b>+</b>Hóa đơn mới</a>
    <a href="listinvoice.php?menu=3&type=1" class="btn btn-danger btn-xs pull-right"><b>+</b>Chưa thanh toán</a>
    <a href="listinvoice.php?menu=3&type=2" class="btn btn-primary btn-xs pull-right"><b>+</b>Đã thanh toán</a>
    <a href="listinvoice.php?menu=3&type=3" class="btn btn-primary btn-xs pull-right"><b>+</b>Đã hủy</a>
    <h2><?php if($_GET['type']==0) echo "Hóa đơn chờ xác nhận";else if($_GET['type']==1) echo "Hóa đơn chưa thanh toán"; else if($_GET['type']==2) echo "Hóa đơn đã thanh toán"; else echo "Hóa đơn đã hủy"; ?></h2>
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
    <?php  $i=1; foreach($myListInvoice as $value){ if(isset($_GET['type'])) if($value['status']==$_GET['type']){ ?>
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
                    <a class='btn btn-success btn-xs' href="duyethd.php?id=<?php echo $value['id'];?>"><span class="glyphicon glyphicon-edit"></span>X.Nhận</a>
                    <a class='btn btn-danger btn-xs' href="huyhd.php?id=<?php echo $value['id'];?>" onclick="return confirm('Hủy hóa đơn <?php echo $value['id'];?>?')"><span class="glyphicon glyphicon-remove"></span>Hủy</a>
                    <a class='btn btn-info btn-xs' href="../user/chitiethoadon.php?id=<?php echo $value['id'];?>"><span class="glyphicon glyphicon-edit"></span>C.Tiết</a>
                    <?php } else if($value['status']==1){?>
                    <a class='btn btn-success btn-xs' href="thanhtoanhd.php?id=<?php echo $value['id'];?>" onclick="return confirm('Thanh toán hóa đơn <?php echo $value['id'];?> ?')"><span class="glyphicon glyphicon-edit"></span>TT</a>
                    <a class='btn btn-danger btn-xs' href="huyhd.php?id=<?php echo $value['id'];?>"><span class="glyphicon glyphicon-remove" onclick="return confirm('Hủy hóa đơn <?php echo $value['id'];?> ?')"></span>Hủy</a>
                    <a class='btn btn-info btn-xs' href="../user/chitiethoadon.php?id=<?php echo $value['id'];?>"><span class="glyphicon glyphicon-edit"></span>C.Tiết</a>     
                    <?php } else{?>
                    <a class='btn btn-info btn-xs' href="../user/chitiethoadon.php?id=<?php echo $value['id'];?>"><span class="glyphicon glyphicon-edit"></span>C.Tiết</a>               
                    <?php }?>
                </td>
            </tr>
           <?php } }?>
</table>
  

</main>

<?php include './inc/footer.php'?>