<?php
    include_once '../admin/api/api.php';
    $baseurl='http://localhost:8080/';
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        delete($baseurl.'tour/'.$id);
    }
    echo "<script> window.location.href='index.php'; </script>";

?>
