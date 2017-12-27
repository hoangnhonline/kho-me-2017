<?php
require "lib/class.danhmuc.php";
$dm =  new danhmuc;

$sql = "SELECT * FROM mucluc ORDER BY idML ASC";
$rs_sach = mysql_query($sql);

while($row_sach=  mysql_fetch_assoc($rs_sach)){
    $idML = $row_sach['idML'];
    $sql2 = "SELECT * FROM sach WHERE idML = $idML ORDER BY idSach ASC";
    $rs_dm = mysql_query($sql2) or die(mysql_error());
    $i = 0;
    while($row_dm = mysql_fetch_assoc($rs_dm)){
        $i++;
        $idSach = $row_dm['idSach'];
        
        mysql_query("UPDATE sach SET thutu = $i WHERE idSach = $idSach") or die(mysql_error());
    }
}
?>