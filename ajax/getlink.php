<?php
require_once("../admin/lib/class.db.php");
$d = new db;
$idSach = $_POST['idSach'];
$rs = mysql_query("SELECT * FROM sach WHERE idSach = $idSach") or die(mysql_error());
$row = mysql_fetch_assoc($rs);

$tensach_kd = $d->changeTitle($row['TenSach']);
echo 'http://vnbet.vn/'.$tensach_kd.'-'.$idSach.'.html';
?>