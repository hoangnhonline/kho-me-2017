<?php
require "lib/class.danhmuc.php";
$dm =  new danhmuc;
$idML = (int) $_POST['idML'];
$idSach = (int) $_POST['idSach'];
$chitiet = $dm->DanhMuc_ChiTiet($idML);
$row_ct = mysql_fetch_assoc($chitiet);
$thutu_mucluc_curr = $row_ct['thutu'];
$thutu_truoc = $thutu_mucluc_curr - 1;

if($thutu_truoc==0){
	$sql2 = "SELECT * FROM trang WHERE idDM = $idML AND idSach = $idSach ORDER BY idTrang ASC";
	$rs2 = mysql_query($sql2) or die(mysql_error());
	$i=0;
	while($row2 = mysql_fetch_assoc($rs2)){           
		$i++;
		$idTrang = $row2['idTrang'];
		mysql_query("UPDATE trang SET ThuTu = $i WHERE idTrang = $idTrang");
	}
	mysql_query("UPDATE danhmuc SET status = 1 WHERE idDM = $idML");
	echo "Update success!";
}else{
        $sql1 = "SELECT * FROM danhmuc WHERE thutu = $thutu_truoc AND idSach = $idSach";
        $rs1 = mysql_query($sql1);        
        $row1= mysql_fetch_assoc($rs1);
	//check coi da dc duyet hay chua
	if($row1['status']==0){
		echo "Bạn chưa duyệt 類目 trước đó. Vui lòng duyệt trước khi thao tác tiếp!";
		exit();
	}else{		
		$rs3 = mysql_query("SELECT MAX(ThuTu) as thutumax FROM trang WHERE idDM =".$row1['idDM']);
		$row3 = mysql_fetch_assoc($rs3);
		$thutu_curr_max = $row3['thutumax'];
                
                $sql5 = "SELECT idDM FROM danhmuc WHERE thutu= $thutu_mucluc_curr AND idSach = $idSach";
                $rs5 = mysql_query($sql5) or die(mysql_error());
                $row5 = mysql_fetch_assoc($rs5);
                $idDM_sau = $row5['idDM'];
                
		$sql4 = "SELECT * FROM trang WHERE idDM = $idDM_sau AND idSach = $idSach ORDER BY idTrang ASC";
		$rs4 = mysql_query($sql4) or die(mysql_error());
		$i=$thutu_curr_max;
		while($row4 = mysql_fetch_assoc($rs4)){
			$i++;
			$idTrang = $row4['idTrang'];
			mysql_query("UPDATE trang SET ThuTu = $i WHERE idTrang = $idTrang");
		}

		mysql_query("UPDATE danhmuc SET status = 1 WHERE idDM = $idML");
		echo "Update success";
	}
}

?>