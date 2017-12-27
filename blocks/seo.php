<?php 
require_once("admin/lib/class.trangchu.php");	
$tc = new trangchu;
$uri = str_replace("/vnbet/", "", $_SERVER['REQUEST_URI']);
$uri = str_replace(".html", "", $uri);
$uri = substr($uri,1);
$tmp_uri = explode("/",$uri);
$tmp_uri = explode("/", $uri);
if($tmp_uri[0]=='')  { 
	$c = 1;
        $is_home = 1;
}else{
	
	if(count($tmp_uri)==1){                
		if(in_array($tmp_uri[0],array('kinh','luat','luan','sach'))){
			switch ($tmp_uri[0]) {
				case 'kinh':
					$c = 1;
					$title = '经';
					break;

				case 'luat':
					$c = 2; 
					$title = '律'; 
					break;

				case 'luan':
					$title = '论';
					$c = 3;
					break;

				case 'sach':
					$title = '其他';
					$c = 4;
					break;	

				default:
					$c = 1;
					$title = '经';
					break;
			}                        
		}else{		
			$arrTmp = explode('-',$tmp_uri[0]);
			$s = (end($arrTmp) > 0) ? (int) end($arrTmp) : null;			
			$rs_sach = $tc->Sach_ChiTiet($s);
			$row_sach = mysql_fetch_assoc($rs_sach);
			$title = $row_sach['TenSach'];
			$c = $row_sach['idML'];
		}
	}elseif(count($tmp_uri)==2){ // muc luc	
		$arrTmp = explode('-',$tmp_uri[1]);
		$m = (end($arrTmp) > 0) ? (int) end($arrTmp) : null;

		$mucluc = $tc->chitiet_mucluc($m);
	    $row_mucluc = mysql_fetch_assoc($mucluc);
	    $title = $row_mucluc['DanhMuc'];
	    $c = $row_mucluc['idML'];
	    $s = $row_mucluc['idSach'];
	    $t = $row_mucluc['idTrang'];
	    $rs_sach = $tc->Sach_ChiTiet($s);
		$row_sach = mysql_fetch_assoc($rs_sach);
	    $idML_next = $tc->mucluc_next($m,$row_mucluc['thutu'],$s);
	    $idML_pre = $tc->mucluc_pre($m,$row_mucluc['thutu'],$s);
	    $str = $idML_next.",".$idML_pre;
	    $arrMucluc = $tc->get_detail_mucluc_bystr($str); 
	}
}
// tim kiem
parse_str($uri);
// $k = (isset($_GET['k'])) ? trim(strip_tags($_GET['k'])) : null;
// $id = (isset($_GET['id'])) ? (int) $_GET['id'] : null;
// var_dump($k);die;
if($k!='') $k = trim(strip_tags($k)); else $k = null;
if($id!='') $id = (int) $id; else $k = null;

$rsd = mysql_query ('SELECT download FROM tracking LIMIT 0,1') or die(mysql_error());
$rowd = mysql_fetch_assoc($rsd);
?>