<?php
include '../admin/api/api.php';
$baseurl='http://localhost:8080/';
if(!isset($_SESSION)) 
{ 
session_start();
}
    if(isset($_POST['update']))
    {
        $name= $_POST['fullname'];
        $address=$_POST['address'];
        $phone = $_POST['phone'];
        $data= array("id"=>$_SESSION['idAccount'],"fullName"=>$name,"address"=>$address,"phoneNumber"=>$phone);
        $result = put($baseurl.'account/update/'.$_SESSION['idAccount'],$data);
         print_r($result);
          echo "<script>alert('Cập nhật thành công')</script>";
          header('Location: ' . $_SERVER['HTTP_REFERER']);
    }?>