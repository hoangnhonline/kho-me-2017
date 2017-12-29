<?php

require_once("../admin/lib/class.mucluc.php");
require_once("../admin/lib/class.sach.php");
require_once("../admin/lib/class.danhmuc.php");
require_once("../admin/lib/class.album.php");
require_once("../admin/lib/class.trang.php");
$arrResponse = array();
$ml = new mucluc;
$s = new sach;
$dm = new danhmuc;
$tr = new trang;
$com = $coms = $noidung = "";
$page = $idML = $idTrang = $idAlbum = 1;
$mucluc = $ml->MucLuc_List();
if (isset($_GET['com']) && isset($_GET['coms'])) {
    $com = $_GET['coms'];
    $idAlbum = $_GET['idML'];
} else {
    $com = $_GET['com'];
}
$al = new album;
if ($com == "mucluc") {
    $link = "index.php?com=mucluc";
    
    $idML = (int) $_GET['idML'];    
    $mucluc_chitiet = $dm->DanhMuc_ChiTiet($idML);
    $row_mucluc_chitiet = mysql_fetch_assoc($mucluc_chitiet);
    
    $tongsotrang = $ml->TongSoTrangTrongMucLuc($idML);
    $page_show = 10;
    
    $idTrang = (int) $_GET['idTrang'];
     
    $thutu_trang_hientai = $tr->thutu_trang_hientai($idTrang);
    
    $thutu_trang_max = $tr ->thutu_trang_max($idML);
    $thutu_trang_min = $tr ->thutu_trang_min($idML);
   
    if ($tongsotrang > 0) {       
        // get chi tiet trang de tra ve data        
        $chitiet_trang = $tr->Trang_ChiTiet($idTrang);
         
        $row = mysql_fetch_assoc($chitiet_trang);
        $idSach = $row['idSach'];
        $idML = $row['idDM'];
        $idDM = $row['idML'];
        $noidung = $row['NoiDung'];        
        $trang_id = $row['idTrang'];
        // get chi tiet sach de hien trong phan trich dan
        $row_sach = $s->Sach_ChiTiet($idSach);

        $row_ct_s = mysql_fetch_assoc($row_sach);
        $ten_sach = $row_ct_s['TenSach'];
        $nxb_return = $row_ct_s['NhaXB'];
        $nam_return = $row_ct_s['NamXB'];
        $ten_tacgia = $s->getTenTacGia($row_ct_s['idTG']);
        $ten_mucluc = $s->getTenMucLuc($idML);
        
        // tinh muc luc tiep theo va pre
        $mucluc_next = $dm->danhmuc_next($idML,$idSach);
        $mucluc_pre = $dm->danhmuc_pre($idML,$idSach);
        
        $id_trang_next = $tr->trang_next($trang_id, $idML);
        $id_trang_pre = $tr->trang_pre($trang_id, $idML);
        
        $thutu_mucluc_hientai = $dm -> thutu_mucluc_hientai($idML);
        
        $TrangMax=$ml -> GetIdTrangMax($idML);
        $TrangMin=$row_mucluc_chitiet['idTrang'];
        
         $mucluc_next_chitiet = $dm->DanhMuc_ChiTiet($mucluc_next);
         $row_mucluc_next_chitiet = mysql_fetch_assoc($mucluc_next_chitiet);
         
         $mucluc_pre_chitiet = $dm->DanhMuc_ChiTiet($mucluc_pre);
         $row_mucluc_pre_chitiet = mysql_fetch_assoc($mucluc_pre_chitiet);
        
        
    } else {
        $noidung = "Chưa có 内容 !";
    }



    // muc luc pre
    if ($thutu_mucluc_hientai > 1){
        $idTrang_abc=$row_mucluc_pre_chitiet['idTrang'];
        $mucluc_prex = '<a href="javascript:void(0)" idTrang="'.$idTrang_abc.'" idML="' . $mucluc_pre . '" class="btn_pre_pa btn_next_pre" id="mucluc_pre">&nbsp;</a>';
    }
    else{
        $idTrang_abc=$row_mucluc_next_chitiet['idTrang'];;
        $mucluc_prex = '<a href="javascript:return false;"  class="btn_pre_pa btn_next_pre" id="mucluc_pre">&nbsp;</a>';
       
    }
     $idTrang_abcd=$row_mucluc_next_chitiet['idTrang'];
     $mucluc_nextx = '<a href="javascript:void(0)" idTrang="'.$idTrang_abcd.'" idML="' . $mucluc_next . '" class="btn_next_pa btn_next_pre" id="mucluc_next">&nbsp;</a>';
    // link page pre
    if ($thutu_trang_hientai > $thutu_trang_min) {        
        $page_prex = '<a href="javascript:void(0)" class="icon_next_pre pre" id="page_pre" 
							idML=' . $idML . ' idTrang=' .$id_trang_pre. ' >&nbsp;</a>';
    } else {           
        if ($thutu_mucluc_hientai > 1){ 
            $idTrang_abc=$row_mucluc_pre_chitiet['idTrang'];
            $page_prex = '<a href="javascript:void(0)" idML="' . $mucluc_pre . '" idTrang="'.$idTrang_abc.'" class="icon_next_pre pre" id="page_pre" >&nbsp;</a>';
        }
        else{
            $page_prex = '<a href="javascript:;" onlick="return false;"  class="icon_next_pre pre" id="page_pre" >&nbsp;</a>';
        }
    }
    
    
    //link page next
    if ($thutu_trang_hientai < $thutu_trang_max) {
        $page_nextx = '<a href="javascript:void(0)" class="icon_next_pre next" id="page_next" 
							idML=' . $idML . ' idTrang=' . $id_trang_next . ' >&nbsp;</a>';
    }else {
        $idTrang_abc=$row_mucluc_next_chitiet['idTrang'];
        $page_nextx = '<a href="javascript:void(0)" idML=' . $mucluc_next . ' idTrang="'.$idTrang_abc.'" class="icon_next_pre next" id="page_next">&nbsp;</a>';
    }

    //phan trang
   $dau=$TrangMin;
    $cuoi=0;
    $dau=$idTrang - floor($page_show/2);		
    if($dau<$TrangMin) $dau=$TrangMin;	
    $cuoi=$dau+$page_show;
    if($cuoi>$TrangMax)
    {	

            $cuoi=$TrangMax+1;
            $dau=$cuoi-$page_show;
            if($dau<$TrangMin) $dau=$TrangMin;
    }

$strPhanTrang = '<div id="pagination">';

    for($i=$dau; $i<$cuoi; $i++){ 
            if($i == $thutu_trang_hientai){$class = "selected";
            
            $strPhanTrang.='<a  href="javascript:void(0)">
                    <span class="pagination_h selected" idML='.$idML.' idTrang='.$idTrang.'>'.$i.'</span></a>';
}else {
    $idTrang_a = $tr->getIdTrang_theothutu($i,$idML);   
$strPhanTrang.='<a href="javascript:void(0)">
                    <span class="pagination_h"  idML='.$idML.' idTrang='.$idTrang_a.'>'.$i.'</span></a>';
} 
} 
$strPhanTrang.='</div>';
}

// return  data 
$arrResponse = array(
    'noidung' => $noidung,
    'page_next' => $page_nextx,
    'page_pre' => $page_prex,
    'idDM' => $idDM,
    'idSach' => $idSach,
    'idML' => $idML,
    'mucluc_next' => $mucluc_nextx,
    'mucluc_pre' => $mucluc_prex,
    'idTrang' => $idTrang,
    'strPhanTrang' => $strPhanTrang,
    'nxb' => $nxb_return,
    'namxb' => $nam_return,
    'ten_sach' => $ten_sach,
    'ten_tacgia' => $ten_tacgia,
    'ten_mucluc' => $ten_mucluc,
    'trang'=>$thutu_trang_hientai
);
echo json_encode($arrResponse);
?>