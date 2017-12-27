<?php

	require_once("admin/lib/class.db.php");	

        $d = new db;
		$rs = mysql_query("SELECT * FROM danhmuc WHERE status = 1") or die(mysql_error());
		$i = 0;
		while($row = mysql_fetch_assoc($rs)){
			$idDM = $row['idDM'];
			$idTrang = $row['idTrang'];
			$sql2 = "SELECT idSach,ThuTu FROM trang WHERE idTrang = $idTrang";
			$rs2 = mysql_query($sql2);
			$row2 = mysql_fetch_assoc($rs2);
			$thutu_trang = $row2['ThuTu'];
			$idSach = $row2['idSach'];
			
			if($idDM > 0 && $thutu_trang > 0 && $idSach > 0){
				$i++;
				$sql3 = "INSERT INTO trangdanhmuc VALUES($idDM,$thutu_trang,$idSach)";
				mysql_query($sql3); 
				
				echo $i."<hr />";
			}

			
		}
		
 ?>