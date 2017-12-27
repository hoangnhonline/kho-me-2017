<?php
require "lib/class.danhmuc.php";
$dm =  new danhmuc;

$sql = "SELECT * FROM sach ORDER BY idSach ASC";
$rs_sach = mysql_query($sql);
while($row_sach=  mysql_fetch_assoc($rs_sach)){
    $idSach = $row_sach['idSach'];
    $sql2 = "SELECT * FROM danhmuc WHERE idSach = $idSach ORDER BY idDM ASC";
    $rs_dm = mysql_query($sql2) or die(mysql_error());
    $i = 0;
    while($row_dm = mysql_fetch_assoc($rs_dm)){
        $idDM = $row_dm['idDM'];
        $i++;
        mysql_query("UPDATE danhmuc SET thutu = $i WHERE idDM = $idDM") or die(mysql_error());
    }
}

?>