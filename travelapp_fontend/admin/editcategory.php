<?php include 'inc/header.php';?>
<?php $baseurl='http://localhost:8080/';;
include 'api/api.php';?>
<?php  
                $id=2;
                if(isset($_GET['id']))
                $id=$_GET['id'];       
                if(isset($_GET['submit']))
                {
                    //echo $id;
                    if(isset($_POST["txtname"])&& isset($_POST["txtcontent"]) && isset($_POST["status"]))
                    {
                    $name= $_POST["txtname"];
                    $content= $_POST["txtcontent"];
                    $status =$_POST['status'];
                    
                    }
                    
                    if($_FILES['image']['tmp_name']){
                        $file = $_FILES['image']['tmp_name'];
                        $path = "upload/".$_FILES['image']['name'];}
                        else $path=$_POST['pathhinh'];
                        if(isset($_FILES["image"])){
                            move_uploaded_file($file, $path);
                        }else{                            
                        }
                    $url=$baseurl."category/".$id;
                    $data=array("name"=>$name,"content"=>$content,"status"=>$status,"image"=>$path);
                    $result=put($url,$data);
                    if ($result==1)
                     echo "<script> window.location.href='listcategory.php'; </script>";
                    else 
                    echo "<script> alert('ten danh muc da ton tai')</script>";
                }
            ?>
<?php 
$record=get('http://localhost:8080/category/'.$id);
$path = $record["image"];
?>
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid mt-3">                                                            
                <form method="POST" enctype="multipart/form-data" action="editcategory.php?submit=true&id=<?php echo $record["id"];?>"> 
                    <input type="hidden" name="id" value="<?php echo $record["id"];?>"></input>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Name</label>
                      <input class="form-control" name="txtname" placeholder="" value="<?php echo $record["name"]?>">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Content</label>
                      <textarea class="form-control" name="txtcontent" rows="3"><?php echo $record["content"]?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Image</label><br>
                        <img src="./<?php echo $record['image']?>"  alt="" width="50px"> 
                        <input type="hidden" name="pathhinh" value='<?php echo $record['image']; ?>' />
                        <input type="file" name="image" />
                    </div>
                    <div class="form-group">                    
                        <input type="radio" id="mo" name="status" value="true" <?php if($record['status']==1) echo 'checked' ?>>
                        <label for="mo">Active</label>
                        <input type="radio" id="khoa" name="status" value="false" <?php if($record['status']==0) echo 'checked' ?> >
                        <label for="khoa">Block</label>
                    </div>
                    <button type="submit" class="btn btn-primary" name="btnSave">Save</button>
                    <button type="button" class="btn btn-danger">Cancle</button>
                </form>
            </div>           
            
            <!-- #/ container -->
        </div>
        
        <!--**********************************
            Content body end
        ***********************************-->
        
        <?php include 'inc/footer.php';?>