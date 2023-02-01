<?php
 if(!isset($_SESSION)) 
 { 
    session_start(); 
    if (isset($_SESSION['idAccount']))
        $id=$_SESSION['idAccount']; 
 } 
?>
<?php   include './inc/header.php';
        include '../admin/api/api.php';
        $baseurl='http://localhost:8080/';
        $myListTour=get($baseurl.'tour/getmytour/'.$id);
?>


<main>
<table class="table table-striped custab">
    <thead>
    <a href="input_tour.php?menu=2" class="btn btn-primary btn-xs pull-right"><b>+</b> Thêm mới tour</a>
        <tr>
            <th>STT</th>
            <th>Title</th>
            <th>Category</th>
            <th>Price</th>
            <th>Sale</th>
            <th>Status</th>           
            <th>Action</th>
        </tr>
    </thead>
    <?php  $i=1; foreach($myListTour as $value){?>
            <tr >
                <td style="<?php if ($value['slot']<3) echo 'color:red'?>"><?php echo $i++;?></td>
                <td style="<?php if ($value['slot']<3) echo 'color:red'?>"><?php echo $value['title'];?></td>
                <td style="<?php if ($value['slot']<3) echo 'color:red'?>"><?php if(!empty($value['category']['name'])) echo $value['category']['name']; ?></td>
                <td style="<?php if ($value['slot']<3) echo 'color:red'?>"><?php echo $english_format_number = number_format($value['price']);?> VNĐ</td>
                <td style="<?php if ($value['slot']<3) echo 'color:red'?>"><?php echo round( $value['sale'] * 100 ), '%'?></td>
                <td style="<?php if ($value['slot']<3) echo 'color:red'?>"><?php echo $value['status']?></td>
                
                <td class="text-center">
                    <a class='btn btn-info btn-xs' href="./edittour.php?id=<?php echo $value['id'];?>"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
                    <a href="./deletetour.php?id=<?php echo $value['id'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><span class="glyphicon glyphicon-remove"></span> Del</a>
                </td>
            </tr>
           <?php }?>
    </table>
  

</main>

<?php include './inc/footer.php'?>