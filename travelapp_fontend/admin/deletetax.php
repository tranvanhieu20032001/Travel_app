<?php 
 include './api/api.php';
 $baseurl='http://localhost:8080/';
 
delete($baseurl."tax/delete/".$_GET['id']);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>