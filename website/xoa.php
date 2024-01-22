<?php 
    
    include 'sqlHelper.php';
        $id=$_GET['id'];
       $sql_txs="delete from sp where ma_sp='$id'";
       $txs=mysqli_query($conn,$sql_txs);
       header('location:txs.php');
    
?>