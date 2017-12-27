<?php
require_once("../admin/lib/class.trangchu.php");
$arrResponse = array();
$tc = new trangchu;

$noidung = "";
    
$idML = (int) $_GET['idML'];    
$idTrang = (int) $_GET['idTrang'];    

// get chi tiet trang
$chitiet_trang = $tc->chitiet_trang($idTrang);
$row_trang = mysql_fetch_assoc($chitiet_trang);  

$id_trang_next = $tc->trang_next($idTrang,$row_trang['ThuTu'], $idML);
$id_trang_pre = $tc->trang_pre($idTrang,$row_trang['ThuTu'], $idML);

       
// return  data 
$arrResponse = array(
    'noidung' => $row_trang['NoiDung'],
    'page_next' => $id_trang_next,
    'page_pre' => $id_trang_pre,
    'idDM' => $row_trang['idDM'],
    'idSach' => $row_trang['idSach'],
    'idML' => $idML, 
    'idTrang' => $idTrang,       
    'trang'=>$row_trang['ThuTu']
);
echo json_encode($arrResponse);
?>