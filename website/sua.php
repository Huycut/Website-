<?php 
include 'sqlHelper.php';
if($_POST['id']){
    $id=$_POST['id'];
    $ten_sp=$_POST['ten_sp'];
    $gia=$_POST['gia'];
   
   $s=" UPDATE `sp` SET `ten_sp`='$ten_sp',`gia`='$gia' WHERE ma_sp='$id'";
   $txs=mysqli_query($conn,$s);
    header("Location:txs.php");
    }
?>