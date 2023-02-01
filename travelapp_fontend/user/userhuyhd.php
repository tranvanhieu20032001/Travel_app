<?php
 if(!isset($_SESSION)) 
 { 
    session_start(); 
     
 } 
 if (isset($_SESSION['idAccount']))
            {
                if(isset($_GET['id'])) $id=$_GET['id'];
 include '../admin/api/api.php';
        $baseurl='http://localhost:8080/';
        $result=post($baseurl.'invoice/changestatus',array("id"=>$id,"status"=>3));
        $idtour=$result['tour']['id'];
        $slot=put($baseurl.'invoice/updateslot/'.$idtour,array("slot"=>-$result['people']));
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        else echo "<script> window.location.href='../login/signin.php'; </script>";;
 
    

?>