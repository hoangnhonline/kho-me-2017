<?php
require "lib/class.danhmuc.php";
$dm =  new danhmuc;
$str_order = rtrim($_POST['str_order'],';;');
$idML = $_POST['idML'];
$arrDanhMucID = explode(';',$str_order);
$i=0;
foreach($arrDanhMucID as $idSach){
    $i++;
    $sql = "UPDATE sach SET thutu = $i WHERE idSach = $idSach";
    mysql_query($sql);
}
?>