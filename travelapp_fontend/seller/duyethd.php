<?php
 if(!isset($_SESSION)) 
 { 
    session_start(); 
     
 } 
 if (isset($_SESSION['idAccount']))
            {$id=$_SESSION['idAccount'];
                if($_SESSION['typeAccount']==1)
                echo "<script> window.location.href='../user/index.php'; </script>";
            }
        else echo "<script> window.location.href='../login/signin.php'; </script>";;
 if(isset($_GET['id'])) $id=$_GET['id'];
 include '../admin/api/api.php';
        $baseurl='http://localhost:8080/';
        $result=post($baseurl.'invoice/changestatus',array("id"=>$id,"status"=>1));
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    

?>