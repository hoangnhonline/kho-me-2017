<?php
require "lib/class.danhmuc.php";
$dm =  new danhmuc;
$idSach= (int) $_POST['idSach'];
$status = (int) $_POST['status'];

$sql1 = "UPDATE sach SET status = $status WHERE idSach = $idSach";
$rs1 = mysql_query($sql1);
echo "Cập nhật thành công!";
?>