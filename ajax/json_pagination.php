<?php
require_once("../admin/lib/class.trangchu.php");
$arrResponse = array();
$tc = new trangchu;
$idML = $_POST['idML'];

$chitiet_mucluc = $tc->chitiet_mucluc($idML);
$row_mucluc = mysql_fetch_assoc($chitiet_mucluc);

$thutumax = $tc ->thutu_trang_max($idML);
$thutumin = $tc ->thutu_trang_min($idML);

$page_show = 10;

$page = (isset($_POST['page'])) ? (int) $_POST['page'] : $thutumin;
$cuoi = $thutumax;
$dau = $page - floor($page_show / 2);
if ($dau < $thutumin) $dau = $thutumin;
$cuoi = $dau + $page_show;
if ($cuoi > $thutumax) {
    $cuoi = $thutumax+1;
    $dau = $cuoi - $page_show;
    if ($dau < $thutumin) $dau = $thutumin;
}
$str = "<div id='pagination'>";
for ($i = $dau; $i < $cuoi; $i++) {
    ($page == $i) ? $class = " selected" : $class = "";
    $idTrang_a = $tc->getIdTrang_theothutu($i,$idML);   
    $str.='<a href="javascript:;"><span class="pagination_h '.$class.'"  idML='.$idML.' idTrang='.$idTrang_a.'>'.$i.'</span></a>';
}
$str.="</div>";

$arrResponse = array(
    'str_pagination' => $str 
);
echo json_encode($arrResponse);
?>