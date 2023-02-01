<?php 
 include './api/api.php';
 $baseurl='http://localhost:8080/';
 
 $result = delete($baseurl."category/".$_GET['id']);
echo $result;
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>