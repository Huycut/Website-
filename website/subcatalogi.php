<?php
include 'sqlHelper.php';

// Lấy giá trị của combobox cha từ yêu cầu AJAX
$parent_id = $_GET['parent_id'];

// Thực hiện truy vấn để lấy danh sách các mục con
$sql = "SELECT * FROM menu WHERE parent='$parent_id'";
$result = mysqli_query($conn, $sql);

// Đưa kết quả vào một mảng
$subcategories = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Trả về dữ liệu dưới dạng JSON
echo json_encode($subcategories);
?>