<?php
require_once("../admin/lib/class.db.php");
$d = new db;
$idSach = $_POST['idSach'];
$rs = mysql_query("SELECT idML FROM sach WHERE idSach = $idSach") or die(mysql_error());
$row = mysql_fetch_assoc($rs);
echo $row['idML'];
?>