<?php 
function taocapcha($s,$cd)
   {
   	$cds=mb_strlen($s);
   	$capcha="";
   	for($i=0;$i<$cd-1;$i++)
   	{
   		$kt=$s[mt_rand(0,$cds-1)];
   		$capcha.=$kt;

   	}
   	return $capcha;
   } 

   if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
   

   $s="0123456789abcdefghiklmnopqzx";
   $m=taocapcha($s,5);
   $_SESSION['capcha']=$m;
?>