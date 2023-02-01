<?php
 if(!isset($_SESSION)) 
 { 
    session_start(); 

 } 
    include_once '../admin/api/api.php';
    $baseurl='http://localhost:8080/';
    if(isset($_POST['submit'])){
        $category=$_POST['category'];
        $categoryarr=array("id" =>$category);
        $title=$_POST['title'];
        $subtitle=$_POST['subtitle'];
        $description=$_POST['description'];
        $interesting=$_POST['interesting'];
        $address=$_POST['address'];
        $inteval=$_POST['inteval'];
        $daystart=$_POST['daystart'];
        $vehicle=$_POST['vehicle'];
        $price=$_POST['price'];
        $sale=$_POST['sale'];
        $nameseller=$_POST['nameseller'];
        $phonecontact=$_POST['phonecontact'];
        $idseller=$_SESSION['idAccount'];
        $status = $_POST['status'];
        $slot = $_POST['slot'];
        // image
            // File upload configuration 
            $targetDir = "upload/"; 
            $allowTypes = array('jpg','png','jpeg','gif'); 
            $listimage=''; 
            $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
            $fileNames = array_filter($_FILES['files']['name']); 
            if(!empty($fileNames)){ 
                foreach($_FILES['files']['name'] as $key=>$val){ 
                    // File upload path 
                    $fileName = basename($_FILES['files']['name'][$key]);
                    $listimage= $listimage.$fileName.';';
                     
                    $targetFilePath = $targetDir . $fileName;             
                        move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath);                                         
                } 
            }
          $image = rtrim($listimage, ";");
        //
        $data = array("title" => $title,"category" => $categoryarr,"image" => $image, "subTitle" => $subtitle,"describe" => $description,"interesting" => $interesting,"address" => $address,"inteval" => $inteval,"vehicle" => $vehicle,"dayStart" => $daystart,"price" => $price,"sale" => $sale,"nameSeller" => $nameseller,"phoneContact" => $phonecontact,"status" => 1,"status"=>$status,"slot"=>$slot,"id_seller" => $idseller);
        $result=post($baseurl.'tour/create',$data);
        if(!empty ($_POST['service']))
             {  
                foreach($_POST['service'] as $service)
                {
                    $data1=array("tour"=> array("id"=>$result['id']),"service"=> array("id"=>$service));
                    post($baseurl.'tourservice/create',$data1);
                }

             }

          echo "<script> window.location.href='index.php'; </script>";
        

    }

?>