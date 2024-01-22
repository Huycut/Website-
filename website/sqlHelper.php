<?php
$servername = "localhost";
$username = "zb5kf362_db";
$password = "@29052003";
$dbname = "zb5kf362_db";
 
// tạo connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn, 'UTF8');
$sqlds="select *  from menu where parent='0'";
$ktds=$conn->query($sqlds);

/* chi tiết sản phẩm */
if(isset($_GET['sp'])){
    $sqlct="select * from sp where ma_sp='".$_GET['sp']."'";
    $sqlct=$conn->query($sqlct);
    $sqlct=$sqlct->fetch_array();
}
session_start();
function currency_format($number, $suffix = ' đ') {
    if (!empty($number)) {
        return number_format($number, 0, ',', '.') . "{$suffix}";
    }
}
?>