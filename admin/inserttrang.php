<?php
ob_start();
session_start();
require "lib/class.trang.php";
$tr =  new trang;
$idSach = (int) $_POST['idSach']; 

$idDM = (int) $_POST['idDM'];

$idML = (int) $_POST['idML']; 

$GhiChu = trim($_POST['GhiChu']);
$NoiDung = addslashes($_POST['NoiDung']);
$user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO trang VALUES(NULL,'$NoiDung',$idDM,$idSach,'$GhiChu','',$idML,$user_id)";
    mysql_query($sql) or die(mysql_error() . $sql);
    $idtrang = mysql_insert_id();
    $sql2 = "SELECT * FROM danhmuc WHERE idDM= $idDM";
    $rs2 = mysql_query($sql2) or die(mysql_error());
    $row2 = mysql_fetch_assoc($rs2);
    $thutu = $row2['thutu'];

    $idSach = $row2['idSach'];

    mysql_query("UPDATE danhmuc SET status = 0 WHERE thutu >= $thutu AND idSach = $idSach") or die(mysql_error());
    
    
    
    echo $idtrang;
?>