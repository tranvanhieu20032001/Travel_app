<?php include_once 'inc/header.php';?>
 
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
                                                            
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Content</label>
                      <textarea class="form-control" rows="3" id="content" name="content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Image</label><br>
                        <div  style="width: 200px;" > </div>
                        <input type="file" name="image"/>
                        <img id="myImg" src="#" alt="your image" width="100px" />
                    </div>
                    <div class="form-group">
                    <input type="radio" id="mo" name="status" value="true"  checked>
                        <label for="mo">Active</label>
                        <input type="radio" id="khoa" name="status" value="false" >
                        <label for="khoa">Block</label>
                    </div>
                    <button type="submit" class="btn btn-primary" name="create">Create</button>                    
                </form>
            </div>
            
            
            <!-- #/ container -->
        </div>
        <?php
                if(isset($_POST['create']))
                {
                    echo "xấc";
                    $name = $_POST['name'];
                    $content = $_POST['content'];
                    $status = $_POST['status'];
                    if($_FILES['image']['tmp_name']){
                        $file = $_FILES['image']['tmp_name'];
                        $path = "upload/".$_FILES['image']['name'];}
                        else $path="";
                        if(isset($_FILES["image"])){
                            move_uploaded_file($file, $path);
                        }else{                            
                        }
                    $data=array("name"=>$name,"content"=>$content,"status"=>$status,"image"=>$path);
                    include 'api/api.php';
                    $baseurl='http://localhost:8080/';
                    $result = post($baseurl.'category',$data);
                    if($result["status"] == 1) echo "<script> window.location.href='listcategory.php'; </script>";
                    else echo "<script> alert('ten danh muc da ton tai')</script>";
                    print_r($data);
                }
            ?>
        <!--**********************************
            Content body end
        ***********************************-->
<?php include 'inc/footer.php';?>