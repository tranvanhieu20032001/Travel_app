<?php 
 include './api/api.php';
$baseurl='http://localhost:8080/';
$g= get($baseurl.'account/'.$_GET['id']);
//print_r($g);
if($g['typeAccount']!=2)
{ 
    $r= post($baseurl.'account/lock/'.$_GET['id'],null);
   // print_r($r);
}
else {
    echo "<script> alert('Ban khong the khoa admin')</script>";    
}
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>