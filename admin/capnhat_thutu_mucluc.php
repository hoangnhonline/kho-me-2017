<?php
require "lib/class.danhmuc.php";
$dm =  new danhmuc;
$str_order = rtrim($_POST['str_order'],';;');
$idSach = $_POST['idSach'];
$arrDanhMucID = explode(';',$str_order);
$i=0;
foreach($arrDanhMucID as $idDM){
    $i++;
    $sql = "UPDATE danhmuc SET thutu = $i WHERE idDM = $idDM";
    mysql_query($sql) or die(mysql_error());
}
mysql_query("UPDATE danhmuc SET status=0 WHERE idSach = $idSach")

?>