<?php
require_once("../admin/lib/class.trangchu.php");
$arrResponse = array();
$tc = new trangchu;
$idML = $_POST['idML'];

$chitiet_mucluc = $tc->chitiet_mucluc($idML);
$row_mucluc = mysql_fetch_assoc($chitiet_mucluc);
$idML_next = $tc->mucluc_next($idML,$row_mucluc['thutu'],$row_mucluc['idSach']);
$idML_pre = $tc->mucluc_pre($idML,$row_mucluc['thutu'],$row_mucluc['idSach']);

$idTrang_next = $tc->getIdTrangMin($idML_next);
$idTrang_pre = $tc->getIdTrangMin($idML_pre);

$row_sach = $tc->Sach_ChiTiet($_POST['idSach']);
$row_ct_s = mysql_fetch_assoc($row_sach);
$ten_sach = $row_ct_s['TenSach'];
$nxb_return = $row_ct_s['NhaXB'];
$nam_return = $row_ct_s['NamXB'];
$ten_tacgia = $tc->getTenTacGia($row_ct_s['idTG']);
$ten_mucluc = $tc->getTenMucLuc($idML);

$arrResponse = array(
    'idTrang_next' => $idTrang_next,
    'idTrang_pre' => $idTrang_pre,
    'nxb' => $nxb_return,
    'namxb' => $nam_return,
    'ten_sach' => $ten_sach,
    'ten_tacgia' => $ten_tacgia,
    'ten_mucluc' => $ten_mucluc,
    'mucluc_next' => $idML_next,
    'mucluc_pre' => $idML_pre,
);
echo json_encode($arrResponse);
?>