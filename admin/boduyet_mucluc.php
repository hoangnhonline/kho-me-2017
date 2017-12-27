<?php
require "lib/class.danhmuc.php";
$dm =  new danhmuc;
$idML = (int) $_POST['idML'];
$chitiet = $dm ->DanhMuc_ChiTiet($idML);
$row = mysql_fetch_assoc($chitiet);
$idSach = $row['idSach'];
$thutu = $row['thutu'];
$sql1 = "UPDATE danhmuc SET status = 0 WHERE thutu >= $thutu AND idSach = $idSach";
$rs1 = mysql_query($sql1);
?>