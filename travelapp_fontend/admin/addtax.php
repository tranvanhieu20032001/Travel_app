<?php include_once 'inc/header.php';?>
<?php $baseurl='http://localhost:8080/';
include 'api/api.php';?>




        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid mt-3">                                                            
                <form method="POST"  action="addtax.php"> 
                    <input type="hidden" name="id" value=""></input>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Name</label>
                      <input class="form-control" name="txtname" placeholder="" value="">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Rate Tax</label>
                      <input class="form-control" type="number" step="0.001" name="txtrate" placeholder="" value="" required>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Date Start</label>
                      <input type="date" class="form-control" name="datestart"  >
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Date Start</label>
                      <input type="date" class="form-control" name="dateend"  >
                    </div>

                    <div class="form-group">
                    <input type="radio" id="mo" name="status" value="true"  checked>
                        <label for="mo">Active</label>
                        <input type="radio" id="khoa" name="status" value="false" >
                        <label for="khoa">Block</label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="submit">Save</button>
                    <a href="listtax.php"><button type="button" class="btn btn-danger" name="cancle">Cancle</button></a>
                </form>


            </div>           
            
            <!-- #/ container -->
        </div>
        <?php  
                
                if(isset($_POST['submit']))
                {
                    $name = $_POST['txtname'];
                    $ratetax = $_POST['txtrate'];
                    $datestart = $_POST['datestart'];
                    $dateend = $_POST['dateend'];
                    $status = $_POST['status'];
                    $data=array("name"=>$name,"rateTax"=>$ratetax,"dateStart"=>$datestart,"dateEnd"=>$dateend,"status"=>$status);               
                    $result=post($baseurl.'tax/create',$data);
                    if($result['status']=="1") { echo "<script> window.location.href='listtax.php'; </script>";}
                    else { echo "<script> alert('".$result["message"]."')</script>"; }
                }
                
        ?>


        <!--**********************************
            Content body end
        ***********************************-->
        
        <?php include 'inc/footer.php';?>