<?php
require_once "../admin/lib/class.db.php";
$d = new db;
$down = 1;
$rs = mysql_query('UPDATE tracking SET download = download + 1 ');
$rs1 = mysql_query ('SELECT download FROM tracking LIMIT 0,1');
$row = mysql_fetch_assoc($rs1);
echo $row['download'];
 ?>