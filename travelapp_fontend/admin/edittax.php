<?php include 'inc/header.php';?>
<?php $baseurl='http://localhost:8080/';
include 'api/api.php';?>

<?php  
                $id=2;
                if(isset($_GET['id']))
                $id=$_GET['id'];       
                if(isset($_POST['submit']))
                {
                    $name = $_POST['txtname'];
                    $ratetax = $_POST['txtrate'];
                    $datestart = $_POST['datestart'];
                    $dateend = $_POST['dateend'];
                    $status = $_POST['status'];
                    $data=array("name"=>$name,"rateTax"=>$ratetax,"dateStart"=>$datestart,"dateEnd"=>$dateend,"status"=>$status);
                    $result=put($baseurl.'tax/'.$id,$data);
                    if($result=="1") { echo "<script> window.location.href='listtax.php'; </script>";}
                    else { echo "<script> alert('thue da ton tai')</script>"; }
                }
            ?>

<?php 
$record=get($baseurl.'tax/'.$_GET['id']);
?>
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid mt-3">                                                            
                <form method="POST" enctype="multipart/form-data" action="edittax.php?id=<?php echo $record["id"];?>"> 
                    <input type="hidden" name="id" value="<?php echo $record["id"];?>"></input>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Name</label>
                      <input class="form-control" name="txtname" placeholder="" value="<?php echo $record["name"]?>">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Rate Tax</label>
                      <input class="form-control" type="number" step="0.001" name="txtrate" placeholder="" value="<?php echo $record["rateTax"]?>">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Date Start</label>
                      <input type="date" class="form-control" name="datestart" placeholder="" value="<?php 
                            if($record['dateStart']==null) echo ""; else{ 
                            $date=date_create($record['dateStart']);
                            echo date_format($date,"Y-m-d");} ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Date Start</label>
                      <input type="date" class="form-control" name="dateend" placeholder="" value="<?php 
                            if($record['dateEnd']==null) echo ""; else{ 
                            $date=date_create($record['dateEnd']);
                            echo date_format($date,"Y-m-d");} ?>">
                    </div>

                    <div class="form-group">                    
                        <input type="radio" id="mo" name="status" value="true" <?php if($record['status']==1) echo 'checked' ?>>
                        <label for="mo">Active</label>
                        <input type="radio" id="khoa" name="status" value="false" <?php if($record['status']==0) echo 'checked' ?> >
                        <label for="khoa">Block</label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="submit">Save</button>
                    <a href="listtax.php"><button type="button" class="btn btn-danger" name="cancle">Cancle</button></a>
                </form>


            </div>           
            
            <!-- #/ container -->
        </div>
        


        <!--**********************************
            Content body end
        ***********************************-->
        
        <?php include 'inc/footer.php';?>