<form action="uploadimage.php" method="post" enctype="multipart/form-data">
    Select Image Files to Upload:
    <input type="file" name="files[]" multiple >
    <input type="submit" name="submit" value="UPLOAD" accept=".jpg,.png">
</form>

<?php
if(isset($_POST['submit'])){ 
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
                //move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath);                   
               
        } 
    }
    rtrim($listimage, ";");
}

?>